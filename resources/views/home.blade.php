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
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">TODO</div>
                                <div class="card-body">
                                
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">DOING</div>
                                <div class="card-body">
                                
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">DONE</div>
                                <div class="card-body">
                                
                                </div>
                            </div>
                        </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
