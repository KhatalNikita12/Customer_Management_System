<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <a href="{{ route('orders.index') }}" class="mr-4 text-gray-600 hover:text-gray-900 transition duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </a>
                <div>
                    <h2 class="font-bold text-3xl text-gray-900 leading-tight flex items-center">
                        <svg class="w-8 h-8 mr-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Order Details
                    </h2>
                    <p class="text-sm text-gray-600 mt-1">Complete order information</p>
                </div>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('orders.edit', $order) }}" 
                   class="inline-flex items-center px-5 py-2.5 bg-yellow-500 hover:bg-yellow-600 text-white font-bold rounded-lg shadow-lg transition duration-300 transform hover:scale-105">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit Order
                </a>
                @if(auth()->user()->role === 'admin')
                    <form method="POST" action="{{ route('orders.destroy', $order) }}" 
                          onsubmit="return confirm('Are you sure you want to delete this order?')" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="inline-flex items-center px-5 py-2.5 bg-red-500 hover:bg-red-600 text-white font-bold rounded-lg shadow-lg transition duration-300 transform hover:scale-105">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            Delete
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Main Order Information -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                        <div class="bg-gradient-to-r from-green-500 to-green-600 px-6 py-4">
                            <h3 class="text-white font-bold text-xl flex items-center">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Order Information
                            </h3>
                        </div>

                        <div class="p-8">
                            <!-- Order Number -->
                            <div class="mb-6 p-6 bg-gradient-to-r from-green-50 to-green-100 rounded-xl border-l-4 border-green-500">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm text-green-700 font-semibold uppercase tracking-wide">Order Number</p>
                                        <p class="text-3xl font-bold text-green-900 mt-1">{{ $order->order_number }}</p>
                                    </div>
                                    <div class="bg-green-500 p-4 rounded-full">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Order Details Grid -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Amount -->
                                <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-6 rounded-xl border border-purple-200">
                                    <div class="flex items-center mb-2">
                                        <svg class="w-5 h-5 text-purple-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <p class="text-sm font-semibold text-purple-700 uppercase">Amount</p>
                                    </div>
                                    <p class="text-3xl font-bold text-purple-900">₹{{ number_format($order->amount, 2) }}</p>
                                </div>

                                <!-- Status -->
                                <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-6 rounded-xl border border-blue-200">
                                    <div class="flex items-center mb-2">
                                        <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <p class="text-sm font-semibold text-blue-700 uppercase">Status</p>
                                    </div>
                                    @if($order->status === 'completed')
                                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold bg-green-100 text-green-800 border-2 border-green-300">
                                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                            </svg>
                                            Completed
                                        </span>
                                    @elseif($order->status === 'pending')
                                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold bg-yellow-100 text-yellow-800 border-2 border-yellow-300">
                                            <svg class="w-5 h-5 mr-2 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            Pending
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold bg-red-100 text-red-800 border-2 border-red-300">
                                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                            </svg>
                                            Cancelled
                                        </span>
                                    @endif
                                </div>

                                <!-- Order Date -->
                                <div class="bg-gradient-to-br from-indigo-50 to-indigo-100 p-6 rounded-xl border border-indigo-200">
                                    <div class="flex items-center mb-2">
                                        <svg class="w-5 h-5 text-indigo-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <p class="text-sm font-semibold text-indigo-700 uppercase">Order Date</p>
                                    </div>
                                    <p class="text-xl font-bold text-indigo-900">{{ $order->order_date->format('F d, Y') }}</p>
                                </div>

                                <!-- Created At -->
                                <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-6 rounded-xl border border-gray-200">
                                    <div class="flex items-center mb-2">
                                        <svg class="w-5 h-5 text-gray-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <p class="text-sm font-semibold text-gray-700 uppercase">Created At</p>
                                    </div>
                                    <p class="text-lg font-semibold text-gray-900">{{ $order->created_at->format('M d, Y H:i A') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Customer Information -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                        <div class="bg-gradient-to-r from-indigo-500 to-indigo-600 px-6 py-4">
                            <h3 class="text-white font-bold text-xl flex items-center">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Customer Details
                            </h3>
                        </div>

                        <div class="p-6">
                            <div class="text-center mb-6">
                                @if($order->customer->profile_image)
                                    <img src="{{ asset('storage/' . $order->customer->profile_image) }}" 
                                         alt="{{ $order->customer->name }}" 
                                         class="w-24 h-24 rounded-full object-cover mx-auto ring-4 ring-indigo-500 shadow-lg">
                                @else
                                    <div class="w-24 h-24 bg-gradient-to-br from-indigo-400 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-3xl mx-auto ring-4 ring-indigo-500 shadow-lg">
                                        {{ substr($order->customer->name, 0, 2) }}
                                    </div>
                                @endif
                                <h4 class="text-xl font-bold text-gray-900 mt-4">{{ $order->customer->name }}</h4>
                                <p class="text-sm text-gray-500">Customer ID: #{{ $order->customer->id }}</p>
                            </div>

                            <div class="space-y-4">
                                <!-- Email -->
                                <div class="flex items-start p-4 bg-gray-50 rounded-lg border border-gray-200">
                                    <svg class="w-5 h-5 text-indigo-600 mr-3 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    <div class="flex-1">
                                        <p class="text-xs text-gray-500 uppercase font-semibold">Email</p>
                                        <p class="text-sm text-gray-900 font-medium break-all">{{ $order->customer->email }}</p>
                                    </div>
                                </div>

                                <!-- Phone -->
                                <div class="flex items-start p-4 bg-gray-50 rounded-lg border border-gray-200">
                                    <svg class="w-5 h-5 text-indigo-600 mr-3 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                    <div class="flex-1">
                                        <p class="text-xs text-gray-500 uppercase font-semibold">Phone</p>
                                        <p class="text-sm text-gray-900 font-medium">{{ $order->customer->phone }}</p>
                                    </div>
                                </div>

                                <!-- Address -->
                                <div class="flex items-start p-4 bg-gray-50 rounded-lg border border-gray-200">
                                    <svg class="w-5 h-5 text-indigo-600 mr-3 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <div class="flex-1">
                                        <p class="text-xs text-gray-500 uppercase font-semibold">Address</p>
                                        <p class="text-sm text-gray-900 font-medium">{{ $order->customer->address }}</p>
                                    </div>
                                </div>

                                <!-- View Customer Button -->
                                <a href="{{ route('customers.show', $order->customer) }}" 
                                   class="block w-full text-center px-4 py-3 bg-indigo-500 hover:bg-indigo-600 text-white font-bold rounded-lg shadow-lg transition duration-300 transform hover:scale-105">
                                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    View Full Customer Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>