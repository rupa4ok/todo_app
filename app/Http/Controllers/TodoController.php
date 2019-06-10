<?php

namespace App\Http\Controllers;

use App\Entity\Comment;
use App\Entity\Todo;
use App\Http\Requests\TodoRequest;
use Auth;
use Illuminate\Http\Request;

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
	
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$statuses = Todo::statusList();
    	
        return view('todo.create', compact('statuses'));
    }

    /**
     * Store a newly created todo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $request)
    {
 	    $todo = Todo::create([
		    'name' => $request['name'],
		    'description' => $request['description'] ?? '',
		    'status' => $request['status'],
		    'user_id' => Auth::id()
	    ]);
	    return redirect()->route('todo.show', $todo);
    }
	
	/**
	 * Страница отдельной личной задачи со списком комментариев к задаче
	 *
	 * @param Todo $todo
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function show(Todo $todo)
    {
    	$userId = Auth::id();
    	
    	$comments = Comment::where(
    		[
			    'parent_id' => $todo->id,
			    'user_id' => $userId
		    ]
	    )
		    ->orderByDesc('created_at')
		    ->get();
    	
        return view('todo.show', compact('todo', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
