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

	public function __construct(Todo $todo)
	{
        $this->middleware('auth');
		$this->todo = $todo;
	}

    public function index()
    {
        $id = Auth::id();
        $todos = User::find($id)->todo;
        return view('todo.index', compact('todos'));
    }

    public function create()
    {
    	return view('todo.create');
    }

    public function store(Request $request)
    {
    	$id = Auth::id();
        $input = $request->all() + array('user_id'=>$id);

    	$this->todo->fill($input);
    	$this->todo->save();

    	return redirect()->to('todo');
    }

    public function edit($id)
    {
        $todo = $this->todo->find($id);
    	return view('todo.edit')->with(compact('todo'));
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
