@extends('dashboard.layout')

@section('content')
<h1>Actualizar mi category: {{ $category->title }} </h1>

@include('dashboard.fragments._errors-form')

<form action="{{ route('category.update',$category->id) }}" method="post">
    @method('PUT')

    @include('dashboard.category._form')

</form>

@endsection