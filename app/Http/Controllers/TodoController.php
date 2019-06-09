<?php

namespace App\Http\Controllers;

use App\Entity\Todo;
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
		
		return view('home', compact('todo', 'status'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Todo $todo)
    {
    	$userId = Auth::id();
	
	    $todo = $todo->where('id', $id)->get();
    	
    	dd($todo);
    	
        return view('admin.show', compact('comments', 'todo'));
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
