@extends('layout.main')
@section('content')
    <div class="container">
        @if(isset($band))
            <h1>Detalhes da Banda {{$band->name}}</h1>
        @else
            <h1>Adicionar uma Banda</h1>
        @endif
        <form action="{{route('store_band')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="band_id" value="{{isset($band) ? $band->id : null}}">
            <div class="form-row">
                <div class="input-data">
                    <label for="name" class="form-label">Nome:</label>
                    <br>
                    <br>
                    <input type="text" class="form-control" id="name" name="name" value="{{isset($band) ? $band->name : null}}" required>
                </div>
                <div class="input-data">
                    <label for="pais" class="form-label">País:</label>
                    <br>
                    <br>
                    <input type="text" class="form-control" id="pais" name="country" value="{{isset($band) ? $band->country : null}}">
                </div>
            </div>
            <div class="form-row">
                <div class="input-data">
                    <label for="picture" class="form-label">Photo</label>
                    <br>
                    <br>
                    <input type="file" class="form-control" id="picture" name="picture" accept="image/*">
                </div>
            </div>
            <div class="form-row" style="margin-top: 50px;">
                <div class="input-data">
                    @if(isset($band))
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

