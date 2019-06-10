@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">{{ $todo->name }}</div>
                            <div class="col-md-6 date">{{ $todo->created_at }}</div>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    <div class="container" id="app">
                        <div class="row">
                            <tasks></tasks>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
