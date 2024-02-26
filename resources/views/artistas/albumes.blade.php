<x-app-layout>
    <p>Nombre: {{$artista->nombre}}</p>
    <br>
    <p>Albunes en los que participa:</p>
    <br>
    @foreach ($artista->temas()->with('albumes')->get()->pluck('albumes')->flatten()->unique('id') as $album)
        <p>{{$album->titulo}} </p>
    @endforeach


</x-app-layout>
