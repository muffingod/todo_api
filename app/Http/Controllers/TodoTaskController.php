<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoTaskRequest;
use App\Http\Requests\UpdateTodoTaskRequest;
use App\Models\TodoTask;

class TodoTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTodoTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTodoTaskRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TodoTask  $todoTask
     * @return \Illuminate\Http\Response
     */
    public function show(TodoTask $todoTask)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TodoTask  $todoTask
     * @return \Illuminate\Http\Response
     */
    public function edit(TodoTask $todoTask)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTodoTaskRequest  $request
     * @param  \App\Models\TodoTask  $todoTask
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTodoTaskRequest $request, TodoTask $todoTask)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TodoTask  $todoTask
     * @return \Illuminate\Http\Response
     */
    public function destroy(TodoTask $todoTask)
    {
        //
    }
}
