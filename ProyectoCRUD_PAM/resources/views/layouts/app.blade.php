<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const titleText = @json(__('ui.delete_confirm_title'));
                const yesText = @json(__('ui.delete_confirm_yes'));
                const noText = @json(__('ui.delete_confirm_no'));

                // plantilla con marcador :name (se sustituye en JS)
                const textTemplate = @json(__('ui.delete_confirm_text', ['name' => ':name']));

                document.querySelectorAll('form.js-delete').forEach((form) => {
                    form.addEventListener('submit', (e) => {
                        e.preventDefault();

                        const btn = form.querySelector('button[type="submit"]');
                        const nombre = btn?.dataset?.nombre ?? '...';

                        const text = textTemplate.replace(':name', nombre);

                        Swal.fire({
                            title: titleText,
                            text: text,
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: yesText,
                            cancelButtonText: noText
                        }).then((result) => {
                            if (result.isConfirmed) form.submit();
                        });
                    });
                });
            });
        </script>
    </body>
</html>
