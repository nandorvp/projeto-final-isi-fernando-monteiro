@extends('layout.main')
@section('content')
    <h1>Lista de Bandas</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Banda</th>
            <th scope="col">Nome</th>
            <th scope="col">Nº Albúns</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bands as $band)
            <tr>
                <td><img src="{{asset('storage/'.$band->picture)}}" alt="{{$band->name}}"></td>
                <td>{{$band->name}}</td>
                <td>{{$band->albunsNumber}}</td>
                @auth()
                    <td><a href="{{route('view_band', $band->id)}}">
                            <button type="button" class="editButton">Ver/Editar</button>
                        </a></td>
                    <td><a href="{{route('view_bandAlbums', $band->id)}}">
                            <button type="button" class="editButton">Ver Àlbuns</button>
                        </a></td>
                    @if(Auth::user()->isAdmin)
                        <td><a href="{{route('delete_band',$band->id)}}">
                                <button type="button" class="deleteButton">Apagar</button>
                            </a></td>
                    @endif
                @endauth
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

