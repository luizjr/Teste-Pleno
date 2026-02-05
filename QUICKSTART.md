# 🚀 Quick Start Guide

## Setup Inicial

```bash
# 1. Instalar dependências
composer install
npm install

# 2. Configurar ambiente
cp .env.example .env
php artisan key:generate

# 3. Configurar banco de dados
touch database/database.sqlite
php artisan migrate

# 4. Build do frontend
npm run build
```

## Desenvolvimento

Para desenvolvimento, rode os seguintes comandos em terminais separados:

```bash
# Terminal 1 - Laravel Server
php artisan serve

# Terminal 2 - Vite Dev Server
npm run dev
```

Acesse: http://localhost:8000

## Criando uma Nova Página React

### 1. Criar o componente da página

Crie um arquivo em `resources/js/Pages/`:

```jsx
// resources/js/Pages/Dashboard.jsx
import { Head } from '@inertiajs/react';
import Layout from '@/Components/Layout';
import { Card, CardHeader, CardTitle, CardContent } from '@/Components/ui/card';
import { Button } from '@/Components/ui/button';

export default function Dashboard({ auth }) {
    return (
        <Layout auth={auth}>
            <Head title="Dashboard" />
            
            <div className="container mx-auto py-12 px-4">
                <h1 className="text-4xl font-bold mb-8">Dashboard</h1>
                
                <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <Card>
                        <CardHeader>
                            <CardTitle>Total Users</CardTitle>
                        </CardHeader>
                        <CardContent>
                            <p className="text-3xl font-bold">1,234</p>
                        </CardContent>
                    </Card>
                    
                    <Card>
                        <CardHeader>
                            <CardTitle>Revenue</CardTitle>
                        </CardHeader>
                        <CardContent>
                            <p className="text-3xl font-bold">$12,345</p>
                        </CardContent>
                    </Card>
                    
                    <Card>
                        <CardHeader>
                            <CardTitle>Orders</CardTitle>
                        </CardHeader>
                        <CardContent>
                            <p className="text-3xl font-bold">567</p>
                        </CardContent>
                    </Card>
                </div>
                
                <div className="mt-8">
                    <Button>Create New</Button>
                </div>
            </div>
        </Layout>
    );
}
```

### 2. Adicionar a rota

Em `routes/web.php`:

```php
use Inertia\Inertia;

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
```

### 3. Passar dados do Laravel para React

```php
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard', [
        'users' => User::count(),
        'revenue' => Order::sum('total'),
        'orders' => Order::count(),
    ]);
});
```

E use no componente:

```jsx
export default function Dashboard({ auth, users, revenue, orders }) {
    return (
        <Layout auth={auth}>
            <p className="text-3xl font-bold">{users}</p>
            <p className="text-3xl font-bold">${revenue}</p>
            <p className="text-3xl font-bold">{orders}</p>
        </Layout>
    );
}
```

## Usando Links do Inertia

Use `Link` ao invés de `<a>` para navegação SPA:

```jsx
import { Link } from '@inertiajs/react';

<Link href="/dashboard" className="text-blue-500">
    Go to Dashboard
</Link>
```

## Formulários com Inertia

```jsx
import { useForm } from '@inertiajs/react';
import { Button } from '@/Components/ui/button';
import { Input } from '@/Components/ui/input';
import { Label } from '@/Components/ui/label';

export default function CreateUser() {
    const { data, setData, post, processing, errors } = useForm({
        name: '',
        email: '',
    });

    const submit = (e) => {
        e.preventDefault();
        post('/users');
    };

    return (
        <form onSubmit={submit} className="space-y-4">
            <div>
                <Label htmlFor="name">Name</Label>
                <Input
                    id="name"
                    value={data.name}
                    onChange={e => setData('name', e.target.value)}
                />
                {errors.name && <p className="text-red-500 text-sm">{errors.name}</p>}
            </div>
            
            <div>
                <Label htmlFor="email">Email</Label>
                <Input
                    id="email"
                    type="email"
                    value={data.email}
                    onChange={e => setData('email', e.target.value)}
                />
                {errors.email && <p className="text-red-500 text-sm">{errors.email}</p>}
            </div>
            
            <Button type="submit" disabled={processing}>
                Create User
            </Button>
        </form>
    );
}
```

## Componentes Disponíveis

Todos os componentes estão em `resources/js/Components/ui/`:

- `button` - Botão com variantes
- `card` - Card com header, content e footer
- `input` - Input de texto
- `label` - Label para formulários
- `dialog` - Modal/Dialog

Exemplos de uso estão em `FRONTEND.md`.

## Build de Produção

```bash
# Build otimizado
npm run build

# O Laravel servirá automaticamente os assets do diretório public/build
```

## Dicas

1. **Hot Reload**: Com `npm run dev`, as mudanças são refletidas automaticamente
2. **Props**: Dados passados do Laravel estão disponíveis como props
3. **@/**: É um alias para `resources/js/`
4. **Tailwind**: Use classes do Tailwind CSS diretamente nos componentes
5. **Dark Mode**: Os componentes suportam dark mode automaticamente

## Troubleshooting

### Erro: "Vite manifest not found"
Execute: `npm run build`

### Erro: "Database not found"
Execute: `touch database/database.sqlite && php artisan migrate`

### Componentes não renderizam
Verifique se o Vite está rodando: `npm run dev`
