<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @if($name === 'Sergio')
    Tu nombre es: {{ $name }}
    @else
    Tu nombre no es Sergio :/
    @endif

    {{--  Al reves que el v-for de vue aqui primero se indica el arreglo y luego el elemento  --}}
    @foreach ($array as $item)
    <div class="box item">
        <p>{{ $item }}</p>
    </div>
    @endforeach

    @forelse ($array as $item)
        <p>*{{$item}}</p>
    @empty
        Array vacio, no hay datos
    @endforelse

    <br>
    {{-- Edad: {{ $age }} --}}
    Edad: {{ $age }}
    <br>
    {{-- Forma de escapar html --}}
    HTML: {!! $html !!}
</body>

</html>