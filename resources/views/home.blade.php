@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Exams</h5>
                                <p class="card-text">You can Add, Delete, View Exams</p>
                                <a href="{{ route('exams.index') }}" class="btn btn-primary">Take me to Exams page</a>
                            </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Questions</h5>
                                <p class="card-text">You can Add, Delete, View Questions</p>
                                <a href="{{ route('exams.index') }}" class="btn btn-primary">Take me to Questions page</a>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Users</h5>
                                <p class="card-text">You can Add, Delete, View Users to Exams</p>
                                <a href="{{ route('exams.index') }}" class="btn btn-primary">Take me to Users page</a>
                            </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Scores</h5>
                                <p class="card-text">View User Scores here</p>
                                <a href="{{ route('exams.index') }}" class="btn btn-primary">Go to Scores</a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
