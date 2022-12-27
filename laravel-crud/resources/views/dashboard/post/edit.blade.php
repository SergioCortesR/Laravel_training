@extends('dashboard.layout')

@section('content')
<h1>Actualizar mi post: {{ $post->title }} </h1>

@include('dashboard.fragments._errors-form')

<form action="{{ route('post.update',$post->id) }}" method="post" enctype="multipart/form-data">
    @method('PUT')

    @include('dashboard.post._form',["task" => "edit"])

</form>

@endsection