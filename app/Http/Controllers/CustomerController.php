<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $query = Customer::query();

        // Search functionality
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $customers = $query->latest()->paginate(10);

        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    // public function store(StoreCustomerRequest $request)
    // {
    //     $data = $request->validated();

    //     if ($request->hasFile('profile_image')) {
    //         $data['profile_image'] = $request->file('profile_image')->store('customers', 'public');
    //     }

    //     Customer::create($data);

    //     return redirect()->route('customers.index')
    //         ->with('success', 'Customer created successfully.');
    // }
public function store(Request $request)
{
    $validated = $request->validate([
        'name'          => ['required', 'string', 'max:255','regex:/^[A-Za-z\s]+$/'],
        'email'         => ['required', 'email', 'max:255', 'unique:customers,email'],
        'phone'         => ['required', 'regex:/^[6-9]\d{9}$/'], // Indian 10‑digit mobile
        'profile_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        'address'       => ['required', 'string', 'min:10'],
    ], [
        'name.required'          => 'Full name is required.',
        'email.required'         => 'Email address is required.',
        'email.email'            => 'Please enter a valid email address.',
        'email.unique'           => 'This email is already registered.',
        'phone.required'         => 'Phone number is required.',
        'phone.regex'            => 'Enter a valid 10 digit Indian mobile number starting with 6–9.',
        'profile_image.image'    => 'The profile file must be an image.',
        'profile_image.mimes'    => 'Profile image must be JPG or PNG.',
        'profile_image.max'      => 'Profile image size must not exceed 2MB.',
        'address.required'       => 'Address is required.',
        'address.min'            => 'Address must be at least 10 characters.',
    ]);
 $data = $validated;

        if ($request->hasFile('profile_image')) {
            $data['profile_image'] = $request->file('profile_image')->store('customers', 'public');
        }

        Customer::create($data);

        return redirect()->route('customers.index')
            ->with('success', 'Customer created successfully.');
    // Save customer using $validated...
}

    public function show(Customer $customer)
    {
        $customer->load('orders');
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $data = $request->validated();

        if ($request->hasFile('profile_image')) {
            // Delete old image
            if ($customer->profile_image) {
                Storage::disk('public')->delete($customer->profile_image);
            }
            $data['profile_image'] = $request->file('profile_image')->store('customers', 'public');
        }

        $customer->update($data);

        return redirect()->route('customers.index')
            ->with('success', 'Customer updated successfully.');
    }

    public function destroy(Customer $customer)
    {
        // Only admin can delete
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        if ($customer->profile_image) {
            Storage::disk('public')->delete($customer->profile_image);
        }

        $customer->delete();

        return redirect()->route('customers.index')
            ->with('success', 'Customer deleted successfully.');
    }

    public function export(Request $request)
    {
        $format = $request->get('format', 'csv');
        $customers = Customer::all();

        if ($format === 'csv') {
            return $this->exportCsv($customers);
        } else {
            return $this->exportPdf($customers);
        }
    }

    private function exportCsv($customers)
    {
        $filename = 'customers_' . date('Y-m-d') . '.csv';
        $handle = fopen('php://output', 'w');

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        fputcsv($handle, ['ID', 'Name', 'Email', 'Phone', 'Address', 'Created At']);

        foreach ($customers as $customer) {
            fputcsv($handle, [
                $customer->id,
                $customer->name,
                $customer->email,
                $customer->phone,
                $customer->address,
                $customer->created_at,
            ]);
        }

        fclose($handle);
        exit;
    }

    private function exportPdf($customers)
    {
        // You'll need to install barryvdh/laravel-dompdf
        // composer require barryvdh/laravel-dompdf
        $pdf = \PDF::loadView('customers.pdf', compact('customers'));
        return $pdf->download('customers_' . date('Y-m-d') . '.pdf');
    }
}