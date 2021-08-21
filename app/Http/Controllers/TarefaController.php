<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function list(){
        return view('tarefas.list');
    }

    public function add(){
        return view('tarefas.add');
    }

    public function addAction(Request $request){

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
