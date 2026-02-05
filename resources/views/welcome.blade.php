<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Pleno') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
    <div class="relative min-h-screen bg-background">
        <!-- Header -->
        <header class="absolute inset-x-0 top-0 z-10">
            <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8">
                <div class="flex lg:flex-1">
                    <a href="{{ url('/') }}" class="-m-1.5 p-1.5">
                        <span class="text-2xl font-bold text-foreground">{{ config('app.name', 'Pleno') }}</span>
                    </a>
                </div>
                
                @if (Route::has('login'))
                    <div class="flex items-center gap-x-4">
                        <!-- Dark Mode Toggle -->
                        <button 
                            onclick="toggleDarkMode()" 
                            class="inline-flex items-center justify-center rounded-md p-2 text-muted-foreground hover:bg-accent hover:text-accent-foreground"
                        >
                            <svg class="h-5 w-5 hidden dark:block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <svg class="h-5 w-5 dark:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                            </svg>
                        </button>

                        @auth
                            <a href="{{ url('/home') }}" class="text-sm font-semibold text-foreground hover:text-foreground/80">
                                {{ __('Painel') }}
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-semibold text-foreground hover:text-foreground/80">
                                {{ __('Login') }}
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="inline-flex items-center justify-center rounded-md bg-primary px-4 py-2 text-sm font-semibold text-primary-foreground shadow hover:bg-primary/90">
                                    {{ __('Cadastro') }}
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif
            </nav>
        </header>

        <!-- Hero Section -->
        <div class="relative isolate px-6 pt-14 lg:px-8">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-primary to-primary/50 opacity-20 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"></div>
            </div>

            <div class="mx-auto max-w-4xl py-32 sm:py-48 lg:py-56">
                <div class="text-center">
                    <h1 class="text-5xl font-bold tracking-tight text-foreground sm:text-7xl">
                        Sistema de Gerenciamento de Produtos
                    </h1>
                    <p class="mt-6 text-lg leading-8 text-muted-foreground">
                        Gerencie seus produtos e categorias de forma simples e eficiente. Uma plataforma moderna e intuitiva para o seu negócio.
                    </p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <a href="{{ route('produtos.index') }}" class="inline-flex items-center justify-center rounded-md bg-primary px-6 py-3 text-base font-semibold text-primary-foreground shadow-sm hover:bg-primary/90 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary">
                            {{ __('Ver Produtos') }}
                        </a>
                        <a href="{{ route('categorias.index') }}" class="inline-flex items-center text-base font-semibold leading-6 text-foreground hover:text-foreground/80">
                            {{ __('Ver Categorias') }}
                            <svg class="ml-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Features Section -->
            <div class="mx-auto max-w-7xl px-6 lg:px-8 pb-24">
                <div class="mx-auto grid max-w-2xl grid-cols-1 gap-8 lg:max-w-none lg:grid-cols-3">
                    <!-- Feature 1 -->
                    <div class="rounded-2xl border border-border bg-card p-8 shadow-sm">
                        <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-primary/10">
                            <svg class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                            </svg>
                        </div>
                        <h3 class="mt-4 text-lg font-semibold text-foreground">Gestão de Produtos</h3>
                        <p class="mt-2 text-sm text-muted-foreground">
                            Organize e gerencie todos os seus produtos em um só lugar com interface intuitiva.
                        </p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="rounded-2xl border border-border bg-card p-8 shadow-sm">
                        <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-primary/10">
                            <svg class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                            </svg>
                        </div>
                        <h3 class="mt-4 text-lg font-semibold text-foreground">Categorização</h3>
                        <p class="mt-2 text-sm text-muted-foreground">
                            Organize produtos por categorias para facilitar a navegação e busca.
                        </p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="rounded-2xl border border-border bg-card p-8 shadow-sm">
                        <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-primary/10">
                            <svg class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </div>
                        <h3 class="mt-4 text-lg font-semibold text-foreground">Busca Rápida</h3>
                        <p class="mt-2 text-sm text-muted-foreground">
                            Encontre rapidamente qualquer produto com nosso sistema de busca avançado.
                        </p>
                    </div>
                </div>
            </div>

            <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
                <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-primary to-primary/50 opacity-20 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"></div>
            </div>
        </div>
    </div>
</body>
</html>
