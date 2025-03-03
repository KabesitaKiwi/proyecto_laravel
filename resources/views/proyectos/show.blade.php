<x-layouts.layout>
    <div class="container">
        <h1 class="text-2xl font-bold my-4">{{ $proyecto->titulo }}</h1>
        <p><strong>Horas Previstas:</strong> {{ $proyecto->horas_previstas }}</p>
        <p><strong>Fecha de Comienzo:</strong> {{ $proyecto->fecha_de_comienzo }}</p>

        <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">Volver</a>
    </div>
</x-layouts.layout>
