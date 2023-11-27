@extends('layout.main')
@section('content')
    <div class="container">
        @if(isset($album))
            <h1>Detalhes do Àlbum {{$album->name}}</h1>
        @else
            <h1>Adicionar um Àlbum</h1>
        @endif
        <form action="{{route('store_album')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="album_id" value="{{isset($album) ? $album->id : null}}">
            <div class="form-row">
                <div class="input-data">
                    <label for="name" class="form-label">Nome:</label>
                    <br>
                    <br>
                    <input type="text" class="form-control" id="name" name="name" value="{{isset($album) ? $album->name : null}}" required>
                </div>
                <div class="input-data">
                    <label for="duration" class="form-label">Duração:</label>
                    <br>
                    <br>
                    <input type="number" class="form-control" id="duration" name="duration" value="{{isset($album) ? $album->duration : null}}">
                </div>
            </div>
            <div class="form-row">
                <div class="input-data">
                    <label for="picture" class="form-label">Photo</label>
                    <br>
                    <br>
                    <input type="file" class="form-control" id="picture" name="picture" accept="image/*">
                </div>
                <div class="input-data">
                    <label for="data_lancamento" class="form-label">Data Lançamento:</label>
                    <br>
                    <br>
                    <input type="date" class="form-control" id="data_lancamento" name="data_lancamento" value="{{isset($album) ? $album->data_lancamento : null}}">
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="input-data">
                    <label for="banda_atual" class="form-label">Banda Atual: {{isset($album) ? $album->bandName : ""}}</label>
                </div>
                <div class="form-select">
                    <label for="band_id" class="form-label">
                        <select id="band_id" name="band_id" required>
                            <option value="" selected>Escolha uma Banda</option>
                            @foreach($bands as $band)
                                <option value="{{$band->id}}">
                                    {{$band->name}}
                                </option>
                            @endforeach
                        </select>
                    </label>
                </div>
            </div>
            <div class="form-row" style="margin-top: 50px;">
                <div class="input-data">
                    @if(isset($album))
                        <button type="submit" class="editButton" style="font-size: 30px;">Update</button>
                    @else
                        <button type="submit" class="editButton" style="font-size: 30px;">Adicionar</button>
                    @endif
                </div>
            </div>
            <br>
            <br>
        </form>
    </div>
@endsection

