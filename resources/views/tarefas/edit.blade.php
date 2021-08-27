@extends('layouts.admin')

@section('title', 'Edição de Tarefas')

@section('content')
    <h1>Edição</h1>

    @if (session('warning'))
        <x-alert>
            {{session('warning')}}
        </x-alert>
    @endif

    <form method="post">
        @csrf
        <label for="title">Titulo<br></label>
        <input type="text" name="title" id="title" value="{{$data->titulo}}">
        <input type="submit" value="Salvar">
    </form>
@endsection