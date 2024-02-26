<x-app-layout>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Titulo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nº de Autores
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nº de Albumes
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Año
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Duracion
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acción
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($temas as $tema)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $tema->titulo }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $tema->artistas->count() }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $tema->artistas->count() }}

                        </td>
                        <td class="px-6 py-4">
                            {{ $tema->anyo }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $tema->formatear() }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('temas.edit', $tema) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar tema</a><br>
                            <br>
                            <form method="POST" action="{{ route('temas.destroy', $tema) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Borrar tema
                                </button>
                            </form><br>
                            <a href="{{ route('temas.añadirArtista', $tema) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Añadir autor
                            </a>
                            <a href="{{ route('temas.añadirAlbum', $tema) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Añadir Album
                            </a><br>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <a href="{{ route('temas.create') }}"
            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Crear</a>

    </div>
    {{ $temas->links() }}


    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</x-app-layout>
