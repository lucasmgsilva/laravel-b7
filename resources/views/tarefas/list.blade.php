@extends('layouts.admin')

@section('title', 'Listagem de Tarefas')

@section('content')
    <h1>Listagem</h1>

    <a href="{{route('tarefas.add')}}">Adicionar Tarefa</a>

    @if (count($list) > 0)
        <ul>
        @foreach ($list as $item)
            <li>
                [<a href="{{route('tarefas.done', $item->id)}}">
                    {{$item->resolvido == 0 ? 'marcar' : 'desmarcar'}}
                </a>]
                {{$item->titulo }}
                [<a href="{{route('tarefas.edit', $item->id)}}">Editar</a>]
                [<a href="{{route('tarefas.del', $item->id)}}" onclick="return confirm('Você tem certeza que deseja excluir?')">Excluir</a>]
            </li>
        @endforeach
        </ul>
    @else
        Não há tarefas cadastradas!
    @endif
@endsection