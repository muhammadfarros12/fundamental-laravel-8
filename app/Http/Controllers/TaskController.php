<?php

namespace App\Http\Controllers;

use App\Models\Task;
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
            return $task = Task::where('task', 'LIKE', "%$request->search%")
            ->get();

            return $task;
        }
        $task = Task::all();
        return $task;
    }

    public function show($id) {
        // $task = DB::table('tasks')->where('id', $id)->first();
        $task = Task::find($id);
         return $task;
    }

    public function store(Request $request) {
        Task::create([
            'task' => $request->task,
            'user' => $request->user
        ]);
        return 'success';
    }

    public function update(Request $request, $id){
        $task = Task::find($id);

        $task->update([
            'task' => $request -> task,
            'user' => $request -> user
        ]);

        return $task;
    }


    public function delete($id){
        $task = Task::find($id);
        $task -> delete();
        return 'success';
    }
}
