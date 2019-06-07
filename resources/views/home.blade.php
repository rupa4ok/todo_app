@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="row card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @foreach($todo as $key => $item)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header card-title">{{ $key }}</div>
                                <div class="card-body">
                                    <ul>
                                        @foreach($item as $data)
                                            <li><a href="{{ route('admin.show', $data->id) }}">{{ $data->name }}</a></li>
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
