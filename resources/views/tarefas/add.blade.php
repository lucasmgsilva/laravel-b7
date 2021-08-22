@extends('layouts.admin')

@section('title', 'Adição de Tarefas')

@section('content')
    <h1>Adição</h1>

    <form method="post">
        @csrf
        <label for="title">Titulo<br></label>
        <input type="text" name="title" id="title">
        <input type="submit" value="Adicionar">
    </form>
@endsection