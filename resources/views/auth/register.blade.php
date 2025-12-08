<x-guest-layout>
    <div class="max-w-md mx-auto p-6">
     

        <!-- Form Card -->
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-100/50 p-8 space-y-6">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-900 mb-3 flex items-center gap-2">
                        <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        {{ __('Name') }}
                    </label>
                    <x-text-input 
                        id="name" 
                        class="block w-full px-4 py-3 border-2 border-gray-200/50 rounded-2xl focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all duration-300 shadow-sm hover:shadow-md bg-gradient-to-r from-gray-50/50 to-white/50" 
                        type="text" 
                        name="name" 
                        :value="old('name')" 
                        required 
                        autofocus 
                        autocomplete="name"
                        placeholder="Enter your full name"
                    />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600 text-sm bg-red-50/80 p-3 rounded-xl border-l-4 border-red-400 shadow-sm" />
                </div>

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-900 mb-3 flex items-center gap-2">
                        <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                        </svg>
                        {{ __('Email') }}
                    </label>
                    <x-text-input 
                        id="email" 
                        class="block w-full px-4 py-3 border-2 border-gray-200/50 rounded-2xl focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all duration-300 shadow-sm hover:shadow-md bg-gradient-to-r from-gray-50/50 to-white/50" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required 
                        autocomplete="username"
                        placeholder="your.email@example.com"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600 text-sm bg-red-50/80 p-3 rounded-xl border-l-4 border-red-400 shadow-sm" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-900 mb-3 flex items-center gap-2">
                        <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        {{ __('Password') }}
                    </label>
                    <x-text-input 
                        id="password" 
                        class="block w-full px-4 py-3 border-2 border-gray-200/50 rounded-2xl focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all duration-300 shadow-sm hover:shadow-md pr-12 bg-gradient-to-r from-gray-50/50 to-white/50" 
                        type="password"
                        name="password"
                        required 
                        autocomplete="new-password"
                        placeholder="••••••••"
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600 text-sm bg-red-50/80 p-3 rounded-xl border-l-4 border-red-400 shadow-sm" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-semibold text-gray-900 mb-3 flex items-center gap-2">
                        <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ __('Confirm Password') }}
                    </label>
                    <x-text-input 
                        id="password_confirmation" 
                        class="block w-full px-4 py-3 border-2 border-gray-200/50 rounded-2xl focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all duration-300 shadow-sm hover:shadow-md pr-12 bg-gradient-to-r from-gray-50/50 to-white/50" 
                        type="password"
                        name="password_confirmation" 
                        required 
                        autocomplete="new-password"
                        placeholder="••••••••"
                    />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600 text-sm bg-red-50/80 p-3 rounded-xl border-l-4 border-red-400 shadow-sm" />
                </div>

                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 pt-2">
                    <a href="{{ route('login') }}" class="flex-1 text-center text-sm font-semibold text-gray-700 hover:text-gray-900 bg-white/80 border border-gray-200/50 hover:border-emerald-200 rounded-2xl px-6 py-3 shadow-sm hover:shadow-md hover:scale-[1.02] backdrop-blur-sm transition-all duration-200">
                        {{ __('Already registered?') }}
                    </a>
                    <x-primary-button class="flex-1 bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white font-semibold py-3 px-6 rounded-2xl shadow-xl hover:shadow-2xl focus:ring-4 focus:ring-emerald-500/30 hover:scale-[1.02] transition-all duration-300 text-lg border-0">
                        {{ __('Get Started') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
