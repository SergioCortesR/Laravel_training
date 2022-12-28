@extends('dashboard.layout')

@section('content')
<nav>
    <a href="{{ route("category.create") }}">Crear nuevo post</a>
</nav>
<br>
<table border="1">
    <thead>
        <tr>
            <th> Titulo </th>
            <th> Acciones </th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $item)
        <tr>
            <td> {{ $item->title }} </td>
            <td>
                <a href="{{ route("category.show", $item) }}">Ver</a>
                <a href="{{ route("category.edit", $item) }}">Editar</a>
                {{--  <a href="{{ route("category.destroy", $item) }}"> Eliminar </a>  --}}
                <form action="{{ route("category.destroy", $item) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit">Eliminar</button>
                </form> 
            </td>
        </tr>


        @endforeach
    </tbody>
</table>

{{ $categories->links() }}

@endsection