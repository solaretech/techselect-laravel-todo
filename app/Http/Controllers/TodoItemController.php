<?php

namespace App\Http\Controllers;

use App\Models\TodoItem;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class TodoItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todoItems = TodoItem::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return $todoItems;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'item-contents' => 'required|max:100',
        ]);
        TodoItem::create([
            'user_id' => Auth::user()->id,
            'title' => $request->input('item-contents'),
            'is_done' => false,
        ]);
        return array('success' => true);
    }

    /**
     * Display the specified resource.
     */
    public function show(TodoItem $todoItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TodoItem $todoItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TodoItem $todoItem)
    {
        //
    }
}