<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\User;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Notifications\NewOrderNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with('customer');

        // Filter by status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $orders = $query->latest()->paginate(10);

        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('orders.create', compact('customers'));
    }

    public function store(StoreOrderRequest $request)
    {
        $order = Order::create($request->validated());

        // Send notification to admin users
        $admins = User::where('role', 'admin')->get();
        Notification::send($admins, new NewOrderNotification($order));

        return redirect()->route('orders.index')
            ->with('success', 'Order created successfully.');
    }

    public function show(Order $order)
    {
        $order->load('customer');
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $customers = Customer::all();
        return view('orders.edit', compact('order', 'customers'));
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->validated());

        return redirect()->route('orders.index')
            ->with('success', 'Order updated successfully.');
    }

    public function destroy(Order $order)
    {
        // Only admin can delete
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $order->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Order deleted successfully.');
    }

    public function export(Request $request)
    {
        $format = $request->get('format', 'csv');
        
        $query = Order::with('customer');
        
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }
        
        $orders = $query->get();

        if ($format === 'csv') {
            return $this->exportCsv($orders);
        } else {
            return $this->exportPdf($orders);
        }
    }

    private function exportCsv($orders)
    {
        $filename = 'orders_' . date('Y-m-d') . '.csv';
        $handle = fopen('php://output', 'w');

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        fputcsv($handle, ['Order Number', 'Customer', 'Amount', 'Status', 'Order Date', 'Created At']);

        foreach ($orders as $order) {
            fputcsv($handle, [
                $order->order_number,
                $order->customer->name,
                $order->amount,
                $order->status,
                $order->order_date->format('Y-m-d'),
                $order->created_at,
            ]);
        }

        fclose($handle);
        exit;
    }

    private function exportPdf($orders)
    {
        $pdf = \PDF::loadView('orders.pdf', compact('orders'));
        return $pdf->download('orders_' . date('Y-m-d') . '.pdf');
    }
}