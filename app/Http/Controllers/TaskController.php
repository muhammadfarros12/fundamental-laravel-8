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
        // if ($request->search) {
        //     return $this -> taskList[$request->search];
        // }
        // return $this -> taskList;
        if ($request->search) {
            return $task = DB::table('tasks')
            ->where('task', 'LIKE', "%$request->search%")
            ->get();

            return $task;
        }
        $task = DB::table('tasks')->get();
        return $task;
    }

    public function show($id) {
        $task = DB::table('tasks')->where('id', $id)->first();
         return ddd($task);
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

    public function update(Request $request, $id){
        // $this -> taskList[$key] = $request -> task;
        // return $this -> taskList;
        $task = DB::table('tasks')->where('id', $id)->update([
            'task' => $request -> task,
            'user' => $request -> user
        ]);

        return 'success';
    }


    public function delete($key){
        unset($this -> taskList[$key]);
        return $this -> taskList;
    }
}
