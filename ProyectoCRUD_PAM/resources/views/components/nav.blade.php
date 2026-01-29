<nav class="py-4 flex gap-4 text-sm">
    <a href="{{ route('main') }}" class="hover:underline">Inicio</a>
    <span class="text-gray-600">|</span>

    @auth
        <a href="{{ route('projects.index') }}" class="hover:underline">Proyectos</a>
        <a href="{{ route('alumnos.index') }}" class="hover:underline">Alumnos</a>
    @endauth

    @guest
        <span class="text-gray-500">Proyectos</span>
        <span class="text-gray-500">Alumnos</span>
    @endguest
</nav>
