<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class TaskNote extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(auth()->user()->user_id);
        $tasks = Task::select('task_slug as slug', 'title', 'description', 'updated_at as created_at', )
            ->where('task_owner', '=', auth()->user()->user_id)
            ->orderBy('created_at', 'desc')
            ->get();

        // print('<pre>');
        // print_r($tasks);
        return view('pages.home', ['tasks' => $tasks]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),
            [
                "task_title" => 'required | string | max:100 ',
                "task_description" => 'required| string ',

            ],
            [
                'task_title.required' => "Title Is Needed",
                'task_title.max' => "Title Is Too Long",
                'task_description.required' => "Description Is Needed",

            ]

        )->validate();
        $slug = SlugService::createSlug(Task::class, 'task_slug', $request->task_title);

        Task::create([
            'title' => $request->task_title,
            'description' => $request->task_description,
            'task_owner' => auth()->user()->user_id,
            'task_slug' => $slug,
        ]);

        Toastr::info('Task Created Successfully', 'User Notification', [
            "positionClass" => "toast-top-right",
            "closeButton" => 'true',
            "progressBar" => 'true',

        ]);
        // return redirect('user/task')->with('success', 'Task Saved Success\Fully');
        return redirect('user/task');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('pages.show_task', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {

        $validate = Validator::make($request->all(),
            [
                "task_title" => 'required | string | max:100 ',
                "task_description" => 'required| string ',

            ],
            [
                'task_title.required' => "Title Is Needed",
                'task_title.max' => "Title Is Too Long",
                'task_description.required' => "Description Is Needed",

            ]

        )->validate();

        $slug = SlugService::createSlug(Task::class, 'task_slug', $request->task_title);
        $task_update = Task::where('task_slug', $task->task_slug)->first();
        $task_update->title = $request->input('task_title');
        $task_update->description = $request->input('task_description');
        $task_update->task_slug = $slug;
        $task_update->save();

        /* update toast message here  */
        Toastr::success('Task updated Successfully', 'User Notification', [
            "positionClass" => "toast-top-right",
            "closeButton" => 'true',
            "progressBar" => 'true',

        ]);
        // return redirect('user/task')->with('success', 'Task Saved Success\Fully');
        return redirect('user/task');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $req)
    {
        // dd($req->task);
        $task_res = Task::where('task_slug', $req->task)->delete();
        Toastr::warning('Task Been Removed ', 'User Notification', [
            "positionClass" => "toast-top-right",
            "closeButton" => 'true',
            "progressBar" => 'true',

        ]);
        // return redirect('user/task')->with('success', 'Task Saved Success\Fully');
        return redirect('user/task');
    }

}
