<?php

namespace App\Http\Controllers;

use App\Entity\Todo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function index()
	{
		$collection = Todo::all();
		$todo = $collection->groupBy('status');
		
		return view('home', compact('todo'));
	}
	
	public function create()
	{
		//
	}
	
	public function store(Request $request)
	{
		//
	}
	
	public function show($id)
	{
		$id = 1;
		
		return view('admin.show', compact('id'));
	}
	
	public function edit($id)
	{
		//
	}
	
	public function update(Request $request, $id)
	{
		//
	}
	
	public function destroy($id)
	{
		//
	}
}
