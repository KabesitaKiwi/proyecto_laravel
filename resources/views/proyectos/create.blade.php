<x-layouts.layout>
    <div class="flex flex-row justify-center items-center min-h-full bg-gray-300">
        <div class="bg-white p-3 rounded-2xl">
            <form action="{{ route('proyectos.store') }}" method="POST">
                @csrf
                <div>
                    <x-input-label for="titulo" value="Título del Proyecto"/>
                    <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" required />
                </div>

                <div>
                    <x-input-label for="horas_previstas" value="Horas Previstas"/>
                    <x-text-input id="horas_previstas" class="block mt-1 w-full" type="number" name="horas_previstas" required />
                </div>

                <div>
                    <x-input-label for="fecha_de_comienzo" value="Fecha de Comienzo"/>
                    <x-text-input id="fecha_de_comienzo" class="block mt-1 w-full" type="date" name="fecha_de_comienzo" required />
                </div>

                <div class="flex flex-row justify-between p-3">
                    <button class="btn btn-warning" type="submit">Guardar</button>
                    <a href="{{ route('proyectos.index') }}" class="btn btn-warning">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.layout>
