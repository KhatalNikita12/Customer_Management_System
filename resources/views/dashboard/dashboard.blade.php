<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-1">
                                <p class="text-gray-600 text-sm">Total Customers</p>
                                <p class="text-3xl font-bold">{{ $totalCustomers }}</p>
                            </div>
                            <div class="bg-blue-100 p-3 rounded">
                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-1">
                                <p class="text-gray-600 text-sm">Total Orders</p>
                                <p class="text-3xl font-bold">{{ $totalOrders }}</p>
                            </div>
                            <div class="bg-green-100 p-3 rounded">
                                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-1">
                                <p class="text-gray-600 text-sm">Total Revenue</p>
                                <p class="text-3xl font-bold">₹{{ number_format($totalRevenue, 2) }}</p>
                            </div>
                            <div class="bg-yellow-100 p-3 rounded">
                                <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Status Chart -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="text-lg font-bold mb-4">Orders by Status</h3>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="text-center p-4 bg-yellow-50 rounded">
                            <p class="text-2xl font-bold text-yellow-600">{{ $ordersByStatus['pending'] ?? 0 }}</p>
                            <p class="text-sm text-gray-600">Pending</p>
                        </div>
                        <div class="text-center p-4 bg-green-50 rounded">
                            <p class="text-2xl font-bold text-green-600">{{ $ordersByStatus['completed'] ?? 0 }}</p>
                            <p class="text-sm text-gray-600">Completed</p>
                        </div>
                        <div class="text-center p-4 bg-red-50 rounded">
                            <p class="text-2xl font-bold text-red-600">{{ $ordersByStatus['cancelled'] ?? 0 }}</p>
                            <p class="text-sm text-gray-600">Cancelled</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Customers -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-bold mb-4">Recent Customers</h3>
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Phone</th>
                                <th class="px-4 py-2">Joined</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentCustomers as $customer)
                                <tr class="border-b">
                                    <td class="px-4 py-2">{{ $customer->name }}</td>
                                    <td class="px-4 py-2">{{ $customer->email }}</td>
                                    <td class="px-4 py-2">{{ $customer->phone }}</td>
                                    <td class="px-4 py-2">{{ $customer->created_at->format('M d, Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>