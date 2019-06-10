@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">New TODO</div>
                    
                    <div class="row card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        
                        <ul class="nav ml-2">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('todo.index') }}">TODO LIST</a>
                            </li>
                        </ul>
                        
                        <div class="col-md-12">
                            <form method="POST" action="{{ route('todo.update', $todo->id) }}">
                                @csrf
                                @method('PUT')
                                
                                <div class="form-group">
                                    <label for="" class="col-form-label">Name</label>
                                    <input id="name" type="text"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name" value="{{ old('name', $todo->name) }}" required>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong>
                </span>
                                    @endif
                                </div>
                                
                                <div class="form-group">
                                    <label for="description" class="col-form-label">Description</label>
                                    <input id="description" type="description"
                                           class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                           name="description" value="{{ old('description', $todo->description) }}" required>
                                    @if ($errors->has('description'))
                                        <span
                                        class="invalid-feedback"><strong>{{ $errors->first('description') }}</strong></span>
                                    @endif
                                </div>
    
                                <div class="form-group">
                                    <label for="status" class="col-form-label">Status</label>
                                    <select name="status" id="status"
                                            class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}">
                                        @foreach($statuses as $value => $label)
                                            <option value="{{ $value }}" {{ $value === old('status', $todo->status) ? 'selected' : '' }}>
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('status'))
                                        <span
                                        class="invalid-feedback"><strong>{{ $errors->first('status') }}</strong></span>
                                    @endif
                                </div>
                                
                                <div class="form-group">
                                    <button class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                        
                        <div class="col-md-12 mt-4">
                            <h4>Last TODO</h4>
                        </div>
                        @foreach($todoList as $value)
                            <div class="col-md-12">
                                {{ $value->id }}. <a href="{{ route('todo.show', $value->id) }}">{{ $value->name }}</a>
                            </div>
                        @endforeach
                    </div>
                
                </div>
            </div>
        </div>
    </div>
@endsection