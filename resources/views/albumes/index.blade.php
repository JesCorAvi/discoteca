<x-app-layout>



    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Titulo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Año
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acción
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($albumes as $album)

                <tr
                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <a href="{{route("albumes.show", $album)}}">{{$album->titulo}}</a>
                    </th>
                    <td class="px-6 py-4">
                        {{$album->anyo}}
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{route("albumes.edit", $album)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a><br>
                    <br>
                    <form method="POST" action="{{ route('albumes.destroy', $album) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Borrar</button>
                    </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        <a href="{{route("albumes.create")}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Crear</a>

    </div>


    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</x-app-layout>
