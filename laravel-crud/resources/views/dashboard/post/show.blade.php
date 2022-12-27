@extends('dashboard.layout')

@section('content')
<h1>Viendo mi post: {{ $post->title }} </h1>

<p>Esta Posteado? {{ $post->posted }}</p>

<p>Descripcion del post: {{ $post->description }}</p>

<div>
    <h3> Aqui va el contenido del post: </h3>
    {{ $post->content }}
</div>



@endsection