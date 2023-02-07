<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = Task::orderBy('created_at', 'desc')->get();
        if (Session::missing('tasks')) {
            Session::put('tasks', $tasks);
        }
        return view('task.index');
    }

    public function save(Task $task, Request $request)
    {
        $task->uuid = (string) Str::uuid();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->created_at = Carbon::now()->toDateTimeString();
        $task->updated_at = Carbon::now()->toDateTimeString();
        $sessionData = Session::get('tasks');
        $sessionData->push($task);
        $sortedData = collect($sessionData->sortByDesc('created_at'));
        Session::put('tasks', $sortedData);
        return redirect()->route('tasks');
    }

    public function reset()
    {
        session()->flush();
        return redirect()->back();
    }

    /* public function delete(Task $task)
    {
    } */
}
