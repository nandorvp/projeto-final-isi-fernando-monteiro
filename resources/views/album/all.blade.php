@extends('layout.main')
@section('content')
    @if(isset($albums[0]->bandName))
        <h1>Albúns da banda {{$albums[0]->bandName}}</h1>
    @else
        <h1>Lista de Álbuns</h1>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Album</th>
            <th scope="col">Nome</th>
            <th scope="col">Lançamento</th>
        </tr>
        </thead>
        <tbody>
        @foreach($albums as $album)
            <tr>
                <td><img src="{{asset('storage/'. $album->picture)}}" alt="{{$album->name}}"></td>
                <td>{{$album->name}}</td>
                <td>{{$album->data_lancamento}}</td>
                @auth()
                    <td><a href="{{route('view_album', $album->id)}}">
                            <button type="button" class="editButton">Ver/Editar</button>
                        </a></td>
                @if(Auth::user()->isAdmin)
                        <td><a href="{{route('delete_album',$album->id)}}">
                                <button type="button" class="deleteButton">Apagar</button>
                            </a></td>
                @endif
                @endauth
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

