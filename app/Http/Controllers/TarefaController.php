<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TarefaController extends Controller
{
    public function list(){
        $list = DB::select('select * from tarefas');

        return view('tarefas.list', compact('list'));
    }

    public function add(){
        return view('tarefas.add');
    }

    public function addAction(Request $request){
        $data = $request->all();

        if(!empty($data['title'])){
            DB::insert('insert into tarefas (titulo) values (:titulo)', 
            [
                'titulo' => $data['title']
            ]);

            return redirect()->route('tarefas.list');
        } else {
            return redirect()->route('tarefas.list')->with('warning', 'Você não preencheu o título!');
        }
    }

    public function edit($id){
        $data = DB::select('select * from tarefas where id = :id', [
            'id' => $id
        ]);

        if (count($data) > 0){
            return view('tarefas.edit', ['data' => $data[0]]);
        } else {
            return redirect()->back()->with('warning', 'Essa tarefa não foi encontrada!');
        }
    }

    public function editAction(Request $request, $id){
        if($request->filled('title')){
            $titulo = $request->input('title');

            $data = DB::select('select * from tarefas where id = :id', [
                'id' => $id
            ]);

            if (count($data) > 0){
                DB::update('update tarefas set titulo = :titulo where id = :id', [
                    'titulo' => $titulo,
                    'id' => $id
                ]);
            }

            return redirect()->route('tarefas.list');
        } else {
            return redirect()->route('tarefas.edit', compact('id'))->with('warning', 'O campo título não foi preenchido!');
        }
    }

    public function del($id){
        DB::delete('delete from tarefas where id = :id', [
            'id' => $id
        ]);

        return redirect()->route('tarefas.list');
    }

    public function done($id){
         DB::update('UPDATE tarefas set resolvido = 1 - resolvido where id = :id', [
             'id' => $id
            ]);

            return redirect()->route('tarefas.list');
    }
}
