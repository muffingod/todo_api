<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoListRequest;
use App\Http\Requests\UpdateTodoListRequest;
use App\Models\TodoList;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class TodoListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(TodoList::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTodoListRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTodoListRequest $request)
    {
        $validated = $request->validated();

        $list = TodoList::create($validated);

        return response()->json($list)->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $list = TodoList::findOrFail($id);
        return response()->json($list);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTodoListRequest  $request
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTodoListRequest $request, $id)
    {
        $validated = $request->validated();

        TodoList::where('id', $id)->firstOrFail()->update($validated);

        return response()->noContent();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //TodoList::destroy($id);
        TodoList::where('id', $id)->firstOrFail()->delete();

        return response()->noContent();
    }
}
