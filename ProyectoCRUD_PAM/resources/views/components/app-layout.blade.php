<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-950 text-gray-100">
<x-header />

<div class="mx-auto max-w-6xl px-4">
    <x-nav />

    <main class="py-8">
        {{ $slot }}
    </main>
</div>

<x-footer />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('form.js-delete').forEach((form) => {
            form.addEventListener('submit', (e) => {
                e.preventDefault();

                const btn = form.querySelector('button[type="submit"]');
                const nombre = btn?.dataset?.nombre ?? 'este alumno';

                Swal.fire({
                    title: '¿Eliminar?',
                    text: `Vas a eliminar a ${nombre}. Esta acción no se puede deshacer.`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) form.submit();
                });
            });
        });
    });
</script>
</body>
</html>
