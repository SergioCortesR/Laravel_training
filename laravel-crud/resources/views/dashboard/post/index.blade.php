@extends('dashboard.layout')

@section('content')
<nav>
    <a href="{{ route("post.create") }}">Crear nuevo post</a>
</nav>
<br>
<table border="1">
    <thead>
        <tr>
            <th> Titulo </th>
            <th> Categoria </th>
            <th> Posted </th>
            <th> Acciones </th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $item)
        <tr>
            <td> {{ $item->title }} </td>
            <td> {{ $item->category->title }} </td>
            <td> {{ $item->posted }} </td>
            <td>
                <a href="{{ route("post.show", $item) }}">Ver</a>
                <a href="{{ route("post.edit", $item) }}">Editar</a>
                {{--  <a href="{{ route("post.destroy", $item) }}"> Eliminar </a>  --}}
                <form action="{{ route("post.destroy", $item) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit">Eliminar</button>
                </form> 
            </td>
        </tr>


        @endforeach
    </tbody>
</table>

{{ $posts->links() }}

@endsection