import { Head } from '@inertiajs/react';
import Layout from '@/Components/Layout';
import { Button } from '@/Components/ui/button';
import { Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle } from '@/Components/ui/card';
import { Input } from '@/Components/ui/input';
import { Label } from '@/Components/ui/label';
import { Dialog, DialogContent, DialogDescription, DialogFooter, DialogHeader, DialogTitle, DialogTrigger } from '@/Components/ui/dialog';
import { ArrowRight, Code2, Database, Rocket, Shield, Zap } from 'lucide-react';

export default function Welcome({ auth }) {
    const features = [
        {
            icon: Rocket,
            title: 'Fast Development',
            description: 'Build applications quickly with Laravel and React',
        },
        {
            icon: Shield,
            title: 'Secure by Default',
            description: 'Built-in security features to protect your app',
        },
        {
            icon: Database,
            title: 'Powerful ORM',
            description: 'Eloquent ORM makes database interactions easy',
        },
        {
            icon: Code2,
            title: 'Modern Stack',
            description: 'Laravel 12 + React + Tailwind CSS + shadcn/ui',
        },
        {
            icon: Zap,
            title: 'High Performance',
            description: 'Optimized for speed and scalability',
        },
        {
            icon: ArrowRight,
            title: 'Easy to Learn',
            description: 'Great documentation and community support',
        },
    ];

    return (
        <Layout auth={auth}>
            <Head title="Welcome" />

            <div className="relative isolate">
                {/* Hero Section */}
                <div className="py-24 sm:py-32">
                    <div className="mx-auto max-w-7xl px-6 lg:px-8">
                        <div className="mx-auto max-w-2xl text-center">
                            <h1 className="text-4xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-6xl">
                                Laravel + React + shadcn/ui
                            </h1>
                            <p className="mt-6 text-lg leading-8 text-gray-600 dark:text-gray-400">
                                A modern full-stack application using Laravel 12, React, Inertia.js, Tailwind CSS, and shadcn/ui components with Radix UI primitives.
                            </p>
                            <div className="mt-10 flex items-center justify-center gap-x-6">
                                <Button size="lg" className="gap-2">
                                    Get Started <ArrowRight className="h-4 w-4" />
                                </Button>
                                <Dialog>
                                    <DialogTrigger asChild>
                                        <Button variant="outline" size="lg">
                                            Learn More
                                        </Button>
                                    </DialogTrigger>
                                    <DialogContent>
                                        <DialogHeader>
                                            <DialogTitle>About This Stack</DialogTitle>
                                            <DialogDescription>
                                                This project combines the best of modern web development tools.
                                            </DialogDescription>
                                        </DialogHeader>
                                        <div className="grid gap-4 py-4">
                                            <div className="space-y-2">
                                                <h4 className="font-medium">Technologies Used:</h4>
                                                <ul className="list-disc list-inside space-y-1 text-sm text-gray-600 dark:text-gray-400">
                                                    <li>Laravel 12 - Latest PHP framework</li>
                                                    <li>React 18 - Modern UI library</li>
                                                    <li>Inertia.js - SPA without API</li>
                                                    <li>Tailwind CSS v4 - Utility-first CSS</li>
                                                    <li>shadcn/ui - Beautiful components</li>
                                                    <li>Radix UI - Accessible primitives</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <DialogFooter>
                                            <Button type="button">Got it!</Button>
                                        </DialogFooter>
                                    </DialogContent>
                                </Dialog>
                            </div>
                        </div>

                        {/* Features Grid */}
                        <div className="mx-auto mt-16 max-w-7xl">
                            <div className="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                                {features.map((feature, index) => (
                                    <Card key={index} className="hover:shadow-lg transition-shadow">
                                        <CardHeader>
                                            <div className="flex items-center gap-4">
                                                <div className="flex h-12 w-12 items-center justify-center rounded-lg bg-gray-900 dark:bg-gray-50">
                                                    <feature.icon className="h-6 w-6 text-white dark:text-gray-900" />
                                                </div>
                                                <CardTitle>{feature.title}</CardTitle>
                                            </div>
                                        </CardHeader>
                                        <CardContent>
                                            <CardDescription>{feature.description}</CardDescription>
                                        </CardContent>
                                    </Card>
                                ))}
                            </div>
                        </div>

                        {/* Demo Form */}
                        <div className="mx-auto mt-16 max-w-xl">
                            <Card>
                                <CardHeader>
                                    <CardTitle>Try shadcn/ui Components</CardTitle>
                                    <CardDescription>
                                        See how beautiful and accessible the components are.
                                    </CardDescription>
                                </CardHeader>
                                <CardContent className="space-y-4">
                                    <div className="space-y-2">
                                        <Label htmlFor="name">Name</Label>
                                        <Input id="name" placeholder="Enter your name" />
                                    </div>
                                    <div className="space-y-2">
                                        <Label htmlFor="email">Email</Label>
                                        <Input id="email" type="email" placeholder="Enter your email" />
                                    </div>
                                </CardContent>
                                <CardFooter className="flex justify-between">
                                    <Button variant="outline">Cancel</Button>
                                    <Button>Submit</Button>
                                </CardFooter>
                            </Card>
                        </div>
                    </div>
                </div>
            </div>
        </Layout>
    );
}
