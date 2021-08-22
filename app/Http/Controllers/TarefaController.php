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

    public function edit(){
        return view('tarefas.edit');
    }

    public function editAction(Request $request){

    }

    public function del(){

    }

    public function done(){

    }
}
