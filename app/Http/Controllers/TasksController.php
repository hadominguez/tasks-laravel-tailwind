<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    public function all()
    {
        $tasks = Task::all();
        $priorities = Priority::all();
        $users = User::all();
        return view('welcome', ['tasks' => $tasks, 'priorities' => $priorities, 'users' => $users]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:4',
            'description' => 'required|min:4'
        ]);

        $task = new Task;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->priority_id = $request->priority_id;
        $task->user_id = Auth::id();
        $task->save();

        return redirect()->route('task')->with('success', 'Created Task');
    }

    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        $priorities = Priority::all();
        $users = User::all();
        return view('task.index', ['tasks' => $tasks, 'priorities' => $priorities, 'users' => $users]);
    }

    public function show($id)
    {
        $task = Task::find($id);
        $priorities = Priority::all();
        if($task->user_id == Auth::id()){
            return view('task.show', ['task' => $task, 'priorities' => $priorities]);
        }
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        if($task->user_id == Auth::id()){
            $task->title = $request->title;
            $task->description = $request->description;
            $task->priority_id = $request->priority_id;
            $task->save();
            return redirect()->route('task')->with('success', 'Updated Task');
        }
        return redirect()->back();
    }

    public function delete($id)
    {
        $task = Task::find($id);
        if($task->user_id == Auth::id()){
            $task->delete();
            return redirect()->route('task')->with('success', 'Deleted Task');
        }
        return redirect()->back();
    }
}
