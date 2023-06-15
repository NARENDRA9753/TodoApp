<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Exception;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::paginate(2);
        return view('task',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_task');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:tasks|max:255',
            'description' => 'required',
            'due_date' => 'required',
            'status' => 'required'
        ]);
        try{
            $task = new Task;
            $task->title = $request->title;
            $task->description = $request->description;
            $task->due_date = $request->due_date;
            $task->status = $request->status;
            $task->save();
            return redirect()->back()->withSuccess('Task Add Successfully');
        }catch(Exception $e){
            return $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        return view('task_view',compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        return view('edit_task',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255|unique:tasks,title,'.$id,
            'description' => 'required',
            'due_date' => 'required',
            'status' => 'required'
        ]);
        try{
            $task = Task::find($id);
            $task->title = $request->title;
            $task->description = $request->description;
            $task->due_date = $request->due_date;
            $task->status = $request->status;
            $task->save();
            return redirect()->route('task.index')->withSuccess('Task Update Successfully');
        }catch(Exception $e){
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->back()->withSuccess('Task Delete Successull');
    }
}
