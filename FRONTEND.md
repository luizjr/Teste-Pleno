# Laravel 12 + React + shadcn/ui + Tailwind CSS + Radix UI

Este projeto foi atualizado para usar a stack moderna completa com Laravel 12, React 18, Inertia.js, shadcn/ui, Tailwind CSS v4 e Radix UI.

## 🚀 Tecnologias

- **Laravel 12** - Framework PHP mais recente
- **React 18** - Biblioteca UI moderna
- **Inertia.js** - Cria SPAs sem API
- **Tailwind CSS v4** - Framework CSS utility-first
- **shadcn/ui** - Componentes lindos e acessíveis
- **Radix UI** - Primitivos de UI acessíveis
- **Vite** - Build tool ultra-rápido

## 📦 Componentes shadcn/ui Disponíveis

Os seguintes componentes foram implementados e estão prontos para uso:

### Button (`@/Components/ui/button.jsx`)
```jsx
import { Button } from '@/Components/ui/button';

// Variantes
<Button variant="default">Default</Button>
<Button variant="destructive">Destructive</Button>
<Button variant="outline">Outline</Button>
<Button variant="secondary">Secondary</Button>
<Button variant="ghost">Ghost</Button>
<Button variant="link">Link</Button>

// Tamanhos
<Button size="default">Default</Button>
<Button size="sm">Small</Button>
<Button size="lg">Large</Button>
<Button size="icon">Icon</Button>
```

### Card (`@/Components/ui/card.jsx`)
```jsx
import { Card, CardHeader, CardTitle, CardDescription, CardContent, CardFooter } from '@/Components/ui/card';

<Card>
  <CardHeader>
    <CardTitle>Card Title</CardTitle>
    <CardDescription>Card description</CardDescription>
  </CardHeader>
  <CardContent>
    Content here
  </CardContent>
  <CardFooter>
    Footer actions
  </CardFooter>
</Card>
```

### Input (`@/Components/ui/input.jsx`)
```jsx
import { Input } from '@/Components/ui/input';

<Input type="text" placeholder="Enter text" />
<Input type="email" placeholder="Enter email" />
```

### Label (`@/Components/ui/label.jsx`)
```jsx
import { Label } from '@/Components/ui/label';

<Label htmlFor="email">Email</Label>
```

### Dialog (`@/Components/ui/dialog.jsx`)
```jsx
import {
  Dialog,
  DialogContent,
  DialogDescription,
  DialogHeader,
  DialogTitle,
  DialogTrigger,
  DialogFooter,
} from '@/Components/ui/dialog';

<Dialog>
  <DialogTrigger asChild>
    <Button>Open Dialog</Button>
  </DialogTrigger>
  <DialogContent>
    <DialogHeader>
      <DialogTitle>Title</DialogTitle>
      <DialogDescription>Description</DialogDescription>
    </DialogHeader>
    <div>Content</div>
    <DialogFooter>
      <Button>Action</Button>
    </DialogFooter>
  </DialogContent>
</Dialog>
```

## 🛠️ Instalação

```bash
# Instalar dependências PHP
composer install

# Instalar dependências Node.js
npm install

# Configurar ambiente
cp .env.example .env
php artisan key:generate

# Criar banco de dados
touch database/database.sqlite
php artisan migrate

# Build do frontend
npm run build

# Ou para desenvolvimento
npm run dev
```

## 🎨 Estrutura de Pastas

```
resources/
├── css/
│   └── app.css              # Estilos Tailwind CSS
├── js/
│   ├── Components/
│   │   ├── ui/              # Componentes shadcn/ui
│   │   │   ├── button.jsx
│   │   │   ├── card.jsx
│   │   │   ├── dialog.jsx
│   │   │   ├── input.jsx
│   │   │   └── label.jsx
│   │   └── Layout.jsx       # Layout principal
│   ├── Pages/
│   │   └── Welcome.jsx      # Página inicial
│   ├── lib/
│   │   └── utils.js         # Utilitários (cn)
│   ├── app.jsx              # Entry point Inertia
│   └── bootstrap.js
└── views/
    └── app.blade.php        # Template root Inertia
```

## 🎯 Criando Novas Páginas

1. Crie um arquivo em `resources/js/Pages/`:

```jsx
// resources/js/Pages/About.jsx
import { Head } from '@inertiajs/react';
import Layout from '@/Components/Layout';

export default function About({ auth }) {
    return (
        <Layout auth={auth}>
            <Head title="About" />
            <div className="container mx-auto py-12">
                <h1 className="text-4xl font-bold">About Page</h1>
            </div>
        </Layout>
    );
}
```

2. Adicione a rota em `routes/web.php`:

```php
use Inertia\Inertia;

Route::get('/about', function () {
    return Inertia::render('About');
});
```

## 🎨 Adicionando Mais Componentes shadcn/ui

Para adicionar mais componentes do shadcn/ui:

1. Instale as dependências Radix UI necessárias (se ainda não instaladas)
2. Copie o código do componente de [ui.shadcn.com](https://ui.shadcn.com)
3. Adapte para JSX (se necessário)
4. Coloque em `resources/js/Components/ui/`

## 📝 Utilitário `cn()`

O utilitário `cn()` em `lib/utils.js` combina classes Tailwind CSS de forma inteligente:

```jsx
import { cn } from '@/lib/utils';

<div className={cn(
  "base-classes",
  condition && "conditional-classes",
  className // de props
)} />
```

## 🚦 Comandos Úteis

```bash
# Desenvolvimento
npm run dev              # Inicia Vite dev server
php artisan serve        # Inicia Laravel server

# Build
npm run build           # Build de produção

# Linting
./vendor/bin/pint       # Laravel Pint (PHP)

# Testes
php artisan test        # Testes PHPUnit
```

## 📚 Recursos

- [Laravel Documentation](https://laravel.com/docs)
- [React Documentation](https://react.dev)
- [Inertia.js Documentation](https://inertiajs.com)
- [Tailwind CSS Documentation](https://tailwindcss.com)
- [shadcn/ui Documentation](https://ui.shadcn.com)
- [Radix UI Documentation](https://www.radix-ui.com)

## 🤝 Contribuindo

Sinta-se à vontade para contribuir com novos componentes ou melhorias!
