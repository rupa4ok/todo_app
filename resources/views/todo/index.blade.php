@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>
                
                    <div class="col-sm-2 mt-3 ml-1">
                        <a href="{{ route('todo.create') }}" class="btn btn-primary" type="submit">NEW TODO</a>
                    </div>

                <div class="row card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @foreach($todo as $key => $item)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header card-title">{{ $status[$key] }}</div>
                                <div class="card-body">
                                    <ul>
                                        @foreach($item as $key => $data)
                                            <li>{{ ++$key }}.<a href="{{ route('todo.show', $data->id) }}">
                                                {{ $data->name }}</a>
                                                Comments: {{ $data->comments_count }}<br>
                                                {{ $data->created_at }}<br>
                                                <form method="POST" action="{{ route('todo.destroy', $data->id) }}" class="mr-1 button-delete">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger">x</button>
                                                </form>
                                                <a href="{{ route('todo.edit', $data->id) }}" class="btn btn-primary mr-1">Edit</a>
                                                <hr>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
