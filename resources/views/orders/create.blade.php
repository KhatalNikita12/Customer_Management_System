<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-900 tracking-tight">
                <i class="fas fa-shopping-cart mr-3 text-blue-600"></i>
                {{ __('Create Order') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto">
            <div class="bg-gradient-to-br from-white to-blue-50 shadow-xl border border-gray-200 rounded-2xl overflow-hidden">
                <div class="p-8">
                    <!-- Header Card -->
                    <div class="text-center mb-8">
                        <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl mx-auto mb-4 flex items-center justify-center shadow-lg">
                            <i class="fas fa-file-invoice-dollar text-2xl text-white"></i>
                        </div>
                        <h3 class="text-3xl font-bold bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent mb-2">
                            New Order
                        </h3>
                        <p class="text-gray-600">Fill in the details to create a new order</p>
                    </div>

                    <form method="POST" action="{{ route('orders.store') }}" class="space-y-6">
                        @csrf

                        <!-- Customer Field -->
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                                <i class="fas fa-user-circle mr-2 text-blue-500"></i>
                                Customer
                            </label>
                            <div class="relative">
                                <select name="customer_id" 
                                        class="w-full appearance-none bg-white border-2 border-gray-200 rounded-xl px-4 py-4 text-lg shadow-sm focus:ring-4 focus:ring-blue-100 focus:border-blue-400 transition-all duration-300 hover:border-gray-300 hover:shadow-md @error('customer_id') border-red-400 ring-2 ring-red-200 focus:ring-red-200 @enderror">
                                    <option value="">👤 Select Customer</option>
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                                            {{ $customer->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3">
                                    <i class="fas fa-chevron-down text-gray-400"></i>
                                </div>
                            </div>
                            @error('customer_id')
                                <p class="mt-2 text-red-500 text-sm flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Amount Field -->
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                                <i class="fas fa-rupee-sign mr-2 text-green-500"></i>
                                Amount
                            </label>
                            <input type="number" name="amount" step="0.01" 
                                   value="{{ old('amount') }}" 
                                   placeholder="0.00"
                                   class="w-full bg-white border-2 border-gray-200 rounded-xl px-4 py-4 text-lg shadow-sm focus:ring-4 focus:ring-green-100 focus:border-green-400 transition-all duration-300 hover:border-gray-300 hover:shadow-md @error('amount') border-red-400 ring-2 ring-red-200 focus:ring-red-200 @enderror">
                            @error('amount')
                                <p class="mt-2 text-red-500 text-sm flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Status Field -->
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                                <i class="fas fa-toggle-on mr-2 text-purple-500"></i>
                                Status
                            </label>
                            <select name="status" 
                                    class="w-full appearance-none bg-white border-2 border-gray-200 rounded-xl px-4 py-4 text-lg shadow-sm focus:ring-4 focus:ring-purple-100 focus:border-purple-400 transition-all duration-300 hover:border-gray-300 hover:shadow-md @error('status') border-red-400 ring-2 ring-red-200 focus:ring-red-200 @enderror">
                                <option value="pending" {{ old('status') === 'pending' ? 'selected' : '' }}>⏳ Pending</option>
                                <option value="completed" {{ old('status') === 'completed' ? 'selected' : '' }}>✅ Completed</option>
                                <option value="cancelled" {{ old('status') === 'cancelled' ? 'selected' : '' }}>❌ Cancelled</option>
                            </select>
                            @error('status')
                                <p class="mt-2 text-red-500 text-sm flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Order Date Field -->
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                                <i class="fas fa-calendar-alt mr-2 text-indigo-500"></i>
                                Order Date
                            </label>
                            <input type="date" name="order_date" 
                                   value="{{ old('order_date', date('Y-m-d')) }}" 
                                   class="w-full bg-white border-2 border-gray-200 rounded-xl px-4 py-4 text-lg shadow-sm focus:ring-4 focus:ring-indigo-100 focus:border-indigo-400 transition-all duration-300 hover:border-gray-300 hover:shadow-md @error('order_date') border-red-400 ring-2 ring-red-200 focus:ring-red-200 @enderror">
                            @error('order_date')
                                <p class="mt-2 text-red-500 text-sm flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-100">
                            <button type="submit" 
                                    class="flex-1 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-bold py-4 px-6 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center text-lg">
                                <i class="fas fa-plus-circle mr-2"></i>
                                Create Order
                            </button>
                            <a href="{{ route('orders.index') }}" 
                               class="flex-1 bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white font-bold py-4 px-6 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center text-lg">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
