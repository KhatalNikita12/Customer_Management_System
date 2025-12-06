

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <a href="{{ route('customers.index') }}" class="mr-4 text-gray-600 hover:text-gray-900 transition duration-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <div>
                <h2 class="font-bold text-3xl text-gray-900 leading-tight flex items-center">
                    <svg class="w-8 h-8 mr-3 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                    Add New Customer
                </h2>
                <p class="text-sm text-gray-600 mt-1">Fill in the details below to create a new customer</p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="bg-gradient-to-r from-indigo-500 to-purple-600 px-6 py-4">
                    <h3 class="text-white font-bold text-xl">Customer Information</h3>
                    <p class="text-indigo-100 text-sm mt-1">Please provide accurate customer details</p>
                </div>

                <form method="POST" action="{{ route('customers.store') }}" enctype="multipart/form-data" class="p-8">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Full Name -->
                        <div class="col-span-2 md:col-span-1">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Full Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="name" value="{{ old('name') }}" 
                                   placeholder="Enter customer name"
                                   class="w-full border-2 @error('name') border-red-500 @else border-gray-300 focus:border-indigo-500 @enderror rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-200 transition duration-200">
                            @error('name')
                                <p class="text-red-500 text-xs mt-1 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="col-span-2 md:col-span-1">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                Email Address <span class="text-red-500">*</span>
                            </label>
                            <input type="email" name="email" value="{{ old('email') }}" 
                                   placeholder="customer@example.com"
                                   class="w-full border-2 @error('email') border-red-500 @else border-gray-300 focus:border-indigo-500 @enderror rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-200 transition duration-200">
                            @error('email')
                                <p class="text-red-500 text-xs mt-1 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div class="col-span-2 md:col-span-1">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                Phone Number <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="phone" value="{{ old('phone') }}" 
                                   placeholder="+91 1234567890"
                                   class="w-full border-2 @error('phone') border-red-500 @else border-gray-300 focus:border-indigo-500 @enderror rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-200 transition duration-200">
                            @error('phone')
                                <p class="text-red-500 text-xs mt-1 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Profile Image -->
                        <div class="col-span-2 md:col-span-1">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Profile Image
                            </label>
                            <div class="relative">
                                <input type="file" name="profile_image" accept="image/*" id="profile_image"
                                       class="hidden"
                                       onchange="previewImage(event)">
                                <label for="profile_image" class="flex items-center justify-center w-full border-2 border-dashed @error('profile_image') border-red-500 @else border-gray-300 hover:border-indigo-500 @enderror rounded-lg px-4 py-3 cursor-pointer transition duration-200 hover:bg-indigo-50">
                                    <svg class="w-6 h-6 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <span class="text-gray-600">Click to upload image</span>
                                </label>
                            </div>
                            <div id="image_preview" class="mt-2 hidden">
                                <img src="" alt="Preview" class="w-24 h-24 rounded-lg object-cover shadow-md">
                            </div>
                            @error('profile_image')
                                <p class="text-red-500 text-xs mt-1 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Address -->
                        <div class="col-span-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Full Address <span class="text-red-500">*</span>
                            </label>
                            <textarea name="address" rows="4" 
                                      placeholder="Enter complete address with city, state, and pincode"
                                      class="w-full border-2 @error('address') border-red-500 @else border-gray-300 focus:border-indigo-500 @enderror rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-200 transition duration-200">{{ old('address') }}</textarea>
                            @error('address')
                                <p class="text-red-500 text-xs mt-1 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-4 mt-8 pt-6 border-t border-gray-200">
                        <button type="submit" class="flex-1 inline-flex justify-center items-center px-6 py-3 bg-gradient-to-r from-indigo-500 to-indigo-600 hover:from-indigo-600 hover:to-indigo-700 text-white font-bold rounded-xl shadow-lg transition duration-300 transform hover:scale-105">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Create Customer
                        </button>
                        <a href="{{ route('customers.index') }}" class="flex-1 inline-flex justify-center items-center px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold rounded-xl shadow-lg transition duration-300 transform hover:scale-105">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Cancel
                        </a>
                    </div>
                </form>
            </div>

            <!-- Helper Text -->
            <div class="mt-6 bg-blue-50 border-l-4 border-blue-500 p-4 rounded-r-lg">
                <div class="flex items-start">
                    <svg class="w-5 h-5 text-blue-500 mt-0.5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <p class="text-sm text-blue-800 font-semibold">Quick Tips:</p>
                        <ul class="text-sm text-blue-700 mt-1 list-disc list-inside">
                            <li>Fields marked with <span class="text-red-500">*</span> are required</li>
                            <li>Use a valid email address for notifications</li>
                            <li>Profile image should be JPG, PNG (max 2MB)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    
    // Name: Only alphabets + spaces
    document.querySelector('input[name="name"]').addEventListener('input', function() {
        // Auto-remove numbers/special chars
        this.value = this.value.replace(/[^a-zA-Z\s]/g, '');
        
        const val = this.value.trim();
        let error = '';
        if (!val) error = 'Name required';
        else if (val.length < 2) error = 'Min 2 characters';
        else if (!/^[a-zA-Z\s]+$/.test(val)) error = 'Only alphabets allowed';
        
        showError(this, error);
    });

    // Email validation
    document.querySelector('input[name="email"]').addEventListener('input', function() {
        const val = this.value.trim();
        let error = '';
        if (!val) error = 'Email required';
        else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val)) error = 'Invalid email';
        
        showError(this, error);
    });

    // Phone: Indian 10-digit
    document.querySelector('input[name="phone"]').addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9]/g, ''); // Only digits
        
        const val = this.value;
        let error = '';
        if (!val) error = 'Phone required';
        else if (!/^[6-9]\d{9}$/.test(val)) error = 'Valid 10-digit mobile';
        
        showError(this, error);
    });

    // Address
    document.querySelector('textarea[name="address"]').addEventListener('input', function() {
        const val = this.value.trim();
        let error = '';
        if (!val) error = 'Address required';
        else if (val.length < 10) error = 'Min 10 characters';
        
        showError(this, error);
    });

    function showError(input, msg) {
        let errDiv = input.parentElement.querySelector('.err-msg');
        if (!errDiv) {
            errDiv = document.createElement('p');
            errDiv.className = 'err-msg text-red-500 text-xs mt-1 flex items-center hidden';
            input.parentElement.appendChild(errDiv);
        }
        
        errDiv.innerHTML = msg ? `<svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
        </svg>${msg}` : '';
        
        errDiv.classList.toggle('hidden', !msg);
        
        // Border colors
        if (msg) {
            input.classList.add('border-red-500', 'ring-2', 'ring-red-200');
            input.classList.remove('border-gray-300');
        } else {
            input.classList.remove('border-red-500', 'ring-2', 'ring-red-200');
            input.classList.add('border-gray-300');
        }
    }
});
function previewImage(event) {
        const input = event.target;
        const previewDiv = document.getElementById('image_preview');
        const previewImg = previewDiv.querySelector('img');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                previewDiv.classList.remove('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            previewImg.src = '';
            previewDiv.classList.add('hidden');
        }
    }
</script>

    
</x-app-layout>