<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Todo;
use App\User;

use Illuminate\Support\Facades\Auth;


class TodoController extends Controller
{
	private $todo;
    private $user;

	public function __construct(Todo $todo, User $user)
	{
        $this->middleware('auth');
        $this->todo = $todo;
		$this->user = $user;
	}

    public function index()
    {
        $user_id = Auth::id();
        $todos = $this->user->find($user_id)->todo;
        return view('todo.index', compact('todos'));
    }

    public function create()
    {
    	return view('todo.create');
    }

    public function store(Request $request)
    {
        $user_id = Auth::id();
        $input = $request->all() + array('user_id' => $user_id);

    	$this->todo->fill($input);
    	$this->todo->save();

    	return redirect()->to('todo');
    }

    public function edit($id)
    {
        $todo = $this->todo->find($id);
    	return view('todo.edit',compact('todo'));
    }

    public function update(Request $request,$id)
    {
    	$input = $request->all();
    	$this->todo->where('id', $id)->update(['title' => $input['title']]);

    	return redirect()->to('todo/');
    }

    public function destroy($id)
    {
    	$data = $this->todo->find($id);
    	$data->delete();

    	return redirect()->to('todo/');
    }
}
