<?php

namespace App\Http\Controllers\Api;

use App\Entity\Todo;
use App\Http\Resources\TodoResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Todo $todo)
    {
	    TodoResource::withoutWrapping();
	    return new TodoResource($todo);
    }
}
