@extends('layouts.app')

@section('content')
<div class="flex min-h-[calc(100vh-4rem)] items-center justify-center px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md space-y-8">
        <!-- Header -->
        <div class="text-center">
            <h2 class="text-3xl font-bold tracking-tight text-foreground">
                {{ __('Bem-vindo de volta') }}
            </h2>
            <p class="mt-2 text-sm text-muted-foreground">
                {{ __('Faça login na sua conta') }}
            </p>
        </div>

        <!-- Form Card -->
        <div class="rounded-lg border border-border bg-card p-8 shadow-sm">
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Field -->
                <div class="space-y-2">
                    <label for="email" class="text-sm font-medium text-foreground">
                        {{ __('Endereço de e-mail') }}
                    </label>
                    <input 
                        id="email" 
                        type="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        required 
                        autocomplete="email" 
                        autofocus
                        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 @error('email') border-destructive @enderror"
                    >
                    @error('email')
                        <p class="text-sm text-destructive">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="space-y-2">
                    <label for="password" class="text-sm font-medium text-foreground">
                        {{ __('Senha') }}
                    </label>
                    <input 
                        id="password" 
                        type="password" 
                        name="password" 
                        required 
                        autocomplete="current-password"
                        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 @error('password') border-destructive @enderror"
                    >
                    @error('password')
                        <p class="text-sm text-destructive">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <input 
                            type="checkbox" 
                            name="remember" 
                            id="remember" 
                            {{ old('remember') ? 'checked' : '' }}
                            class="h-4 w-4 rounded border-input text-primary focus:ring-2 focus:ring-ring focus:ring-offset-2"
                        >
                        <label for="remember" class="text-sm text-muted-foreground">
                            {{ __('Lembre de mim') }}
                        </label>
                    </div>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm font-medium text-primary hover:underline">
                            {{ __('Esqueceu sua senha?') }}
                        </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="inline-flex h-10 w-full items-center justify-center rounded-md bg-primary px-4 py-2 text-sm font-medium text-primary-foreground ring-offset-background transition hover:bg-primary/90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2"
                >
                    {{ __('Entrar') }}
                </button>
            </form>
        </div>

        <!-- Register Link -->
        @if (Route::has('register'))
            <p class="text-center text-sm text-muted-foreground">
                {{ __('Não tem uma conta?') }}
                <a href="{{ route('register') }}" class="font-medium text-primary hover:underline">
                    {{ __('Cadastre-se') }}
                </a>
            </p>
        @endif
    </div>
</div>
@endsection
