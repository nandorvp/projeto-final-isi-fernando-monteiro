@extends('layout.main')
@section('content')
    <style>
        .formLogin {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top:100px;
        }

        form label, form input, form a {
            color: black;
            font-size: 20px;
            padding:15px;
        }

        form button {
            font-size: 20px;
        }
    </style>
    <form method="post" action="{{route('password.email')}}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input value="" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        @error('email')
        {{$errors}}
        @enderror
        <button type="submit" class="editButton">Recuperar</button>
        <a href="/home">Voltar</a>
    </form>
@endsection
