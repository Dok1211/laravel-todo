@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="page-header">ToDo作成</h2>
    {!! Form::open(['route' => 'todo.store']) !!}
    <div class="form-group">
        {!! Form::input('text', 'title', null, ['required', 'class' => 'form-control', 'placeholder' =>'ToDo内容']) !!}
    </div>
    <button type="submit" class="btn btn-success pull-right">追加</button>
    {!! Form::close() !!}
    <!-- Scripts -->
</div>
@endsection