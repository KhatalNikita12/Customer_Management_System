<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-6 p-4 bg-blue-50 border border-blue-200 rounded-xl text-blue-800 text-sm" :status="session('status')" />

    <div class="max-w-md mx-auto">
        <div class="bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 bg-clip-text text-transparent text-4xl font-bold text-center mb-8 tracking-tight">
            Welcome Back
        </div>

        <div class="bg-white/80 backdrop-blur-xl shadow-2xl rounded-3xl p-8 border border-white/50">
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-900 mb-3 flex items-center gap-2">
                        <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                        </svg>
                        {{ __('Email Address') }}
                    </label>
                    <div class="relative">
                        <x-text-input 
                            id="email" 
                            class="block w-full px-4 py-4 text-lg border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all duration-300 bg-gradient-to-r from-slate-50 to-gray-50 shadow-inner hover:shadow-lg" 
                            type="email" 
                            name="email" 
                            :value="old('email')" 
                            required 
                            autofocus 
                            autocomplete="username"
                            placeholder="Enter your email"
                        />
                        <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.27 7.27c.396.397.916.596 1.44.596.524 0 1.044-.2 1.44-.596L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600 text-sm bg-red-50 p-2 rounded-xl border border-red-200" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-900 mb-3 flex items-center gap-2">
                        <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        {{ __('Password') }}
                    </label>
                    <div class="relative">
                        <x-text-input 
                            id="password" 
                            class="block w-full px-4 py-4 text-lg border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all duration-300 bg-gradient-to-r from-slate-50 to-gray-50 shadow-inner hover:shadow-lg pr-12" 
                            type="password"
                            name="password"
                            required 
                            autocomplete="current-password"
                            placeholder="Enter your password"
                        />
                        <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17M6.187 17H5c-.1 0-.19.07-.26.141"></path>
                            </svg>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600 text-sm bg-red-50 p-2 rounded-xl border border-red-200" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                    <label for="remember_me" class="flex items-center gap-3 cursor-pointer group">
                        <div class="relative">
                            <input id="remember_me" type="checkbox" class="w-5 h-5 text-indigo-600 border-2 border-gray-300 rounded-lg focus:ring-indigo-500 focus:ring-2 bg-white shadow-sm transition-all duration-200 peer" name="remember">
                            <div class="absolute inset-0 w-5 h-5 border-2 border-indigo-500 rounded-lg bg-indigo-50 opacity-0 peer-checked:opacity-100 peer-focus:opacity-100 transition-all duration-200"></div>
                        </div>
                        <span class="text-sm text-gray-700 font-medium group-hover:text-gray-900 transition-colors">{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm font-semibold text-indigo-600 hover:text-indigo-500 transition-colors bg-gradient-to-r from-indigo-50 to-purple-50 px-4 py-2 rounded-xl backdrop-blur-sm border border-indigo-100 hover:shadow-md hover:scale-[1.02] active:scale-[0.98] transform transition-all duration-200" href="{{ route('password.request') }}">
                            {{ __('Forgot Password?') }}
                        </a>
                    @endif
                </div>

                <!-- Login Button -->
                <div class="pt-6">
                    <x-primary-button class="w-full bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 hover:from-indigo-700 hover:via-purple-700 hover:to-pink-700 text-white font-bold py-4 px-8 rounded-2xl text-lg shadow-2xl hover:shadow-3xl hover:scale-[1.02] active:scale-[0.98] transform transition-all duration-300 focus:ring-4 focus:ring-indigo-500/30 border-0">
                        {{ __('Sign In') }}
                    </x-primary-button>
                </div>


              
            </form>
        </div>

        <!-- Sign Up Link -->
        <div class="mt-8 text-center text-sm text-gray-600">
            <p>Don't have an account? 
                <a href="{{ route('register') }}" class="font-semibold text-indigo-600 hover:text-indigo-500 transition-colors bg-gradient-to-r from-indigo-50 to-purple-50 px-4 py-2 rounded-xl hover:shadow-md transform hover:scale-[1.02] transition-all duration-200">Create Account</a>
            </p>
        </div>
    </div>
</x-guest-layout>
