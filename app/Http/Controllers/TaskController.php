<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    private $taskList = [
        'first' => 'sleep',
        'second' => 'Eat',
        'third' => 'Work'
    ];

    public function index(Request $request){
        if ($request->search) {
            return $this -> taskList[$request->search];
        }
    
        return $this -> taskList;
    }

    public function show($param) {
        return $this->taskList[$param];
    }

    public function store(Request $request) {
        // $this -> taskList[$request -> label] = $request -> task;
        // return $this -> taskList;
        DB::table('tasks')->insert([
            'task' => $request->task,
            'user' => $request->user
        ]);
        return 'success';
    }

    public function update(Request $request, $key){
        $this -> taskList[$key] = $request -> task;
        return $this -> taskList;
    }


    public function delete($key){
        unset($this -> taskList[$key]);
        return $this -> taskList;
    }
}
