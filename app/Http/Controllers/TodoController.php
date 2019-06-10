<?php

namespace App\Http\Controllers;

use App\Entity\Comment;
use App\Entity\Todo;
use App\Http\Requests\TodoRequest;
use Auth;

class TodoController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	/**
	 * Получение списка задач с сортировкой по дате создания, групировка по статусу
	 * Метод list() - scope в Todo->scopeList
	 *
	 * @param Todo $todo
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index(Todo $todo)
	{
		$todo = $todo->list();
		$status = Todo::statusList();
		
		return view('todo.index', compact('todo', 'status'));
	}
	
    public function create(Todo $todo)
    {
    	$statuses = $todo->statusList();
	    $todoList = $todo->latest()->get();
        return view('todo.create', compact('statuses', 'todoList'));
    }
    
    public function store(TodoRequest $request, Todo $todo)
    {
	    $todo->create([
		    'name' => $request['name'],
		    'description' => $request['description'] ?? '',
		    'status' => $request['status'],
		    'user_id' => Auth::id()
	    ]);
	    return redirect()->route('todo.show', compact('todo'));
    }
	
	/**
	 * Страница отдельной личной задачи со списком комментариев к задаче
	 *
	 * @param Todo $todo
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function show(Todo $todo, Comment $comment)
    {
    	$userId = Auth::id();
    	$comments = $comment->where(
    		[
			    'parent_id' => $todo->id,
			    'user_id' => $userId
		    ]
	    )
		    ->orderByDesc('created_at')
		    ->get();
        return view('todo.show', compact('todo', 'comments'));
    }
    
    public function edit(Todo $todo)
    {
	    $todoList = $todo->latest()->get();
	    $statuses = $todo->statusList();
        return view('todo.edit', compact('todo', 'todoList', 'statuses'));
    }
    
    public function update(TodoRequest $request, Todo $todo)
    {
	    $todo->update([
		    'name' => $request['name'],
		    'description' => $request['description'] ?? '',
		    'status' => $request['status'],
	    ]);
	    return redirect()->route('todo.index', $todo);
    }
    
    public function destroy(Todo $todo)
    {
	    $todo->delete();
	
	    return redirect()->route('todo.index', $todo);
    }
}
