<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facades\Generator;
use App\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($display = null)
    {
        $tasks = Task::orderBy('finish_at', 'asc')->get();

        return view('tasks.index', [
            'display' => $display,
            'tasks' => $tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Task::class);

        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Task::class);

        $request->validate([
            'content' => ['required', 'max:255'],
            'finish' => ['required', 'date']
        ]);

        // Generate unique Hash
        $hash = Generator::random();

        while(Task::where('hash', $hash)->first()) {
            $hash = Generator::random();
        }

        $task = new Task;
        $task->hash = $hash;
        $task->content = $request->get('content');
        $task->user_id = \Auth::user()->id;
        $task->finish_at = date("Y-m-d H:i:s", strtotime($request->get('finish')));
        $task->save();

        return redirect()->route('home')->with('success', 'A new task has been added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);

        if($task) {

            $this->authorize('delete', $task);

            $task->delete();

            return response()->json(['status' => 'ok']);
        }

        return response()->json(['status' => 'err']);
    }

    /**
     * Change task status
     * @param $id
     * @param $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function status($id, $status)
    {
        $task = Task::find($id);

        if($task) {

            $this->authorize('update', $task);

            $task->status = $status;
            $task->save();

            return response()->json(['status' => 'ok']);
        }

        return response()->json(['status' => 'err']);
    }
}
