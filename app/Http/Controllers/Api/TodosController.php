<?php

namespace App\Http\Controllers\Api;

use App\Entity\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return Comment::latest()
			->get();
	}
	
	/**
	 * @param Request $request
	 * @return Comment
	 */
	public function store(Request $request)
	{
		$comment = new Comment();
		$comment->name = $request->name;
		$comment->save();
		
		return $comment;
	}
	
	/**
	 * Update the comment in storage.
	 *
	 * @param Request $request
	 * @param $id
	 * @return Comment|Comment[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
	 */
	public function update(Request $request, $id)
	{
		$comment = Comment::findOrFail($id);
		$comment->completed = $request->completed;
		$comment->update();
		
		return $comment;
	}
	
	public function destroy($id)
	{
		$comment = Comment::findOrFail($id);
		$comment->delete();
		
		return 204;
	}
}
