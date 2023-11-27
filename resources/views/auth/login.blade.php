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

    <div class="container">
        <form action="{{route('login')}}" method="post">
            @csrf
            @error('email')
            {{$errors}}
            @enderror
            <div class="form-row">
                <div class="input-data">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <br>
                    <br>
                    <input value="" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                </div>
                <div class="input-data">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <br>
                    <br>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    @error('password')
                    {{$errors}}
                    @enderror
                </div>
            </div>
            <br>
            <button type="submit" class="editButton">Submit</button>
            <a href="{{route('password.request')}}">Esqueceu-se da palavra passe?</a>
        </form>
    </div>

@endsection
