<x-layouts.layout>
    <div class="container">
        <h1 class="text-2xl font-bold my-4">Lista de Proyectos</h1>

        @if(session('mensaje'))
            <div class="alert alert-success">
                {{ session('mensaje') }}
            </div>
        @endif

        <a href="{{ route('proyectos.create') }}" class="btn btn-primary">Nuevo Proyecto</a>

        <table class="table-auto w-full mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Horas Previstas</th>
                    <th>Fecha de Comienzo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($proyectos as $proyecto)
                <tr>
                    <td>{{ $proyecto->id }}</td>
                    <td>{{ $proyecto->titulo }}</td>
                    <td>{{ $proyecto->horas_previstas }}</td>
                    <td>{{ $proyecto->fecha_de_comienzo }}</td>
                    <td>
                        <a href="{{ route('proyectos.edit', $proyecto->id) }}" class="btn btn-warning">Editar</a>

                        <!-- Botón de eliminación fuera del formulario -->
                        <button class="btn btn-danger" onclick="confirmDelete({{ $proyecto->id }})">Eliminar</button>

                        <!-- Formulario oculto para eliminar -->
                        <form id="form-eliminar-{{ $proyecto->id }}" action="{{ route('proyectos.destroy', $proyecto->id) }}" method="POST" style="display: none;">
                            @csrf @method('DELETE')
                        </form>

                        <a href="{{ route('proyectos.show', $proyecto->id) }}" class="btn btn-info">Ver</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Script para mostrar el SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(proyectoId) {
            Swal.fire({
                title: "¿Estás seguro?",
                text: "Esta acción no se puede deshacer.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Sí, eliminar",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById("form-eliminar-" + proyectoId).submit();
                }
            });
        }
    </script>

</x-layouts.layout>
