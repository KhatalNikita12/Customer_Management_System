<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Customer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('customers.update', $customer) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                            <input type="text" name="name" value="{{ old('name', $customer->name) }}" 
                                   class="w-full border rounded px-3 py-2 @error('name') border-red-500 @enderror">
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                            <input type="email" name="email" value="{{ old('email', $customer->email) }}" 
                                   class="w-full border rounded px-3 py-2 @error('email') border-red-500 @enderror">
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Phone</label>
                            <input type="text" name="phone" value="{{ old('phone', $customer->phone) }}" 
                                   class="w-full border rounded px-3 py-2 @error('phone') border-red-500 @enderror">
                            @error('phone')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Address</label>
                            <textarea name="address" rows="3" 
                                      class="w-full border rounded px-3 py-2 @error('address') border-red-500 @enderror">{{ old('address', $customer->address) }}</textarea>
                            @error('address')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            @if($customer->profile_image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $customer->profile_image) }}" 
                                         alt="{{ $customer->name }}" class="w-20 h-20 rounded">
                                </div>
                            @endif
                            <label class="block text-gray-700 text-sm font-bold mb-2">Profile Image</label>
                            <input type="file" name="profile_image" accept="image/*"
                                   class="w-full border rounded px-3 py-2 @error('profile_image') border-red-500 @enderror">
                            @error('profile_image')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex gap-2">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Update Customer
                            </button>
                            <a href="{{ route('customers.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>