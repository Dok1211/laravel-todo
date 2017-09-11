<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Todo;

class TodoController extends Controller
{
	private $todo;

	public function __construct(Todo $todo)
	{
		$this->todo = $todo;
	}

    public function index()
    {
    	$todos = $this->todo->all();
    	return view('todo.index',compact('todos'));
    }
}
