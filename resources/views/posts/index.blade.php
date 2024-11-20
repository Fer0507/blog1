@extends('layouts.app')

@section('content')
    <style>
        /* Estilos para el contenedor principal */
        .anime-container {
            background: url('https://example.com/your-anime-background.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #333;
            font-family: 'Comic Sans MS', sans-serif;
            padding: 20px;
            border-radius: 15px;
            height: 100vh;
            /* Hace que ocupe toda la pantalla */
            position: relative;
        }

        /* Filtro para oscurecer el fondo para mejorar la legibilidad */
        .anime-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
            /* Oscurece ligeramente el fondo */
            border-radius: 15px;
            z-index: 1;
        }

        /* Barra de título */
        .titlebar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            position: relative;
            z-index: 2;
        }

        .anime-title {
            font-size: 2rem;
            font-weight: bold;
            color: #ff66b2;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }

        /* Estilo para el botón */
        .btn-anime {
            background-color: #ff66b2;
            color: white;
            font-weight: bold;
            border-radius: 50px;
            padding: 10px 20px;
            transition: background-color 0.3s ease;
            position: relative;
            z-index: 2;
        }

        .btn-anime:hover {
            background-color: #ff3385;
        }

        /* Estilos para los posts */
        .anime-post {
            background-color: rgba(255, 255, 255, 0.8);
            /* Fondo semitransparente */
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 2;
        }

        .anime-image {
            border-radius: 10px;
            border: 3px solid #ff66b2;
        }

        .anime-post-title {
            font-size: 1.5rem;
            color: #ff66b2;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .anime-description {
            font-size: 1rem;
            line-height: 1.6;
            color: #555;
        }

        .anime-divider {
            border-top: 2px dashed #ff66b2;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .anime-message {
            font-size: 1.2rem;
            color: #ff66b2;
            text-align: center;
            position: relative;
            z-index: 2;
        }
    </style>

    <div class="container anime-container">
        <div class="titlebar">
            <a class="btn btn-anime float-end mt-3" href="{{ route('posts.create') }}" role="button">Add Post</a>
            <h1 class="anime-title">Mini Post List</h1>
        </div>

        <hr>

        @if ($message = Session::get('success'))
            <div class="alert alert-success anime-alert">
                <p>{{ $message }}</p>
            </div>
        @endif

        @if (count($posts) > 0)
            @foreach ($posts as $post)
                <div class="anime-post">
                    <div class="row">
                        <div class="col-2">
                            <img class="img-fluid anime-image" style="max-width:50%;"
                                src="{{ asset('images/' . $post->image) }}" alt="">
                        </div>
                        <div class="col-10">
                            <h4 class="anime-post-title">{{ $post->title }}</h4>
                        </div>
                    </div>
                    <p class="anime-description">{{ $post->description }}</p>
                    <hr class="anime-divider">
                </div>
            @endforeach
        @else
            <p class="anime-message">No Posts found</p>
        @endif
    </div>
@endsection
