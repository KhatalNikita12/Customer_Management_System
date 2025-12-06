<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <div class="flex items-start gap-6">
                        @if($customer->profile_image)
                            <img src="{{ asset('storage/' . $customer->profile_image) }}" 
                                 alt="{{ $customer->name }}" class="w-32 h-32 rounded">
                        @else
                            <div class="w-32 h-32 bg-gray-300 rounded"></div>
                        @endif

                        <div class="flex-1">
                            <h3 class="text-2xl font-bold mb-4">{{ $customer->name }}</h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <p class="text-gray-600">Email:</p>
                                    <p class="font-semibold">{{ $customer->email }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-600">Phone:</p>
                                    <p class="font-semibold">{{ $customer->phone }}</p>
                                </div>
                                <div class="col-span-2">
                                    <p class="text-gray-600">Address:</p>
                                    <p class="font-semibold">{{ $customer->address }}</p>
                                </div>
                            </div>

                            <div class="mt-4 flex gap-2">
                                <a href="{{ route('customers.edit', $customer) }}" 
                                   class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                    Edit
                                </a>
                                <a href="{{ route('customers.index') }}" 
                                   class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                    Back
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Orders Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-4">Orders</h3>
                    
                    @if($customer->orders->count() > 0)
                        <table class="min-w-full table-auto">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="px-4 py-2">Order Number</th>
                                    <th class="px-4 py-2">Amount</th>
                                    <th class="px-4 py-2">Status</th>
                                    <th class="px-4 py-2">Order Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customer->orders as $order)
                                    <tr class="border-b">
                                        <td class="px-4 py-2">{{ $order->order_number }}</td>
                                        <td class="px-4 py-2">₹{{ number_format($order->amount, 2) }}</td>
                                        <td class="px-4 py-2">
                                            <span class="px-2 py-1 rounded text-white text-xs
                                                @if($order->status === 'completed') bg-green-500
                                                @elseif($order->status === 'pending') bg-yellow-500
                                                @else bg-red-500
                                                @endif">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-2">{{ $order->order_date->format('M d, Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-gray-600">No orders yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>