<div>
<!-- resources/views/items/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Itens</h1>

    @if(count($items) > 0)
        <ul>
            @foreach($items as $item)
                <li>{{ $item->name }} - {{ $item->description }}</li>
            @endforeach
        </ul>
    @else
        <p>Nenhum item encontrado.</p>
    @endif
@endsection
</div>
