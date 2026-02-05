@extends('layouts.app')
@section('title', __('Listar Produtos'))

@section('content')
<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <!-- Header -->
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold tracking-tight text-foreground">{{ __('Produtos') }}</h1>
            <p class="mt-2 text-sm text-muted-foreground">Gerencie todos os seus produtos aqui.</p>
        </div>
        <a href="{{ route('produtos.create') }}" class="inline-flex items-center justify-center rounded-md bg-primary px-4 py-2 text-sm font-medium text-primary-foreground ring-offset-background transition hover:bg-primary/90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring">
            <svg class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            {{ __('Criar Produto') }}
        </a>
    </div>

    @if ($produtos->isEmpty())
        <!-- Empty State -->
        <div class="rounded-lg border border-border bg-card p-12 text-center">
            <svg class="mx-auto h-12 w-12 text-muted-foreground" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
            </svg>
            <h3 class="mt-4 text-lg font-semibold text-foreground">Nenhum Produto Encontrado</h3>
            <p class="mt-2 text-sm text-muted-foreground">Você pode criar um novo produto clicando no botão abaixo.</p>
            <a href="{{ route('produtos.create') }}" class="mt-6 inline-flex items-center justify-center rounded-md bg-primary px-4 py-2 text-sm font-medium text-primary-foreground ring-offset-background transition hover:bg-primary/90">
                {{ __('Criar Produto') }}
            </a>
        </div>
    @else
        <!-- Products Table -->
        <div class="overflow-hidden rounded-lg border border-border bg-card shadow">
            <table class="min-w-full divide-y divide-border">
                <thead class="bg-muted/50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-muted-foreground">{{ __('Unidades') }}</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-muted-foreground">{{ __('Nome') }}</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-muted-foreground">{{ __('Descrição') }}</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-muted-foreground">{{ __('Categoria') }}</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-muted-foreground">{{ __('Preço') }}</th>
                        <th class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider text-muted-foreground">{{ __('Ações') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border bg-card">
                    @foreach ($produtos as $produto)
                    <tr class="transition hover:bg-muted/50">
                        <td class="whitespace-nowrap px-6 py-4 text-sm text-foreground">{{ $produto->quantidade }}</td>
                        <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-foreground">{{ $produto->nome }}</td>
                        <td class="px-6 py-4 text-sm text-muted-foreground">{{ Str::limit($produto->descricao, 50) }}</td>
                        <td class="whitespace-nowrap px-6 py-4 text-sm text-muted-foreground">{{ $produto->categoria->nome }}</td>
                        <td class="whitespace-nowrap px-6 py-4 text-sm text-foreground">R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                        <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium">
                            <div class="flex items-center justify-end space-x-2">
                                <a href="{{ route('produtos.show', $produto->id) }}" class="inline-flex items-center rounded-md px-3 py-1.5 text-sm text-muted-foreground hover:bg-accent hover:text-accent-foreground">
                                    {{ __('Ver') }}
                                </a>
                                <a href="{{ route('produtos.edit', $produto->id) }}" class="inline-flex items-center rounded-md px-3 py-1.5 text-sm text-muted-foreground hover:bg-accent hover:text-accent-foreground">
                                    {{ __('Editar') }}
                                </a>
                                <button 
                                    onclick="if(confirm('{{ __('Tem certeza que deseja Excluir o :item, está ação será irreversível.', ['item' => $produto->nome]) }}')) { document.getElementById('delete-form-{{ $produto->id }}').submit(); }"
                                    class="inline-flex items-center rounded-md px-3 py-1.5 text-sm text-destructive hover:bg-destructive/10"
                                >
                                    {{ __('Excluir') }}
                                </button>
                                <form id="delete-form-{{ $produto->id }}" action="{{ route('produtos.destroy', $produto->id) }}" method="POST" class="hidden">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($produtos->hasPages())
            <div class="mt-6">
                {{ $produtos->links() }}
            </div>
        @endif
    @endif
</div>
@endsection
