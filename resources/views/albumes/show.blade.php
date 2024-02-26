<x-app-layout>
    <p>Titulo: {{$album->titulo}}</p>
    <br>
    <p>Temas:</p>
    <br>
    @foreach ($album->temas as $tema)
        <p>{{$tema->titulo}} Duracion: {{$tema->formatear()}}</p>
    @endforeach
    <br>
    <p>Duracion total: {{$album->tiempo()}}<p>


</x-app-layout>
