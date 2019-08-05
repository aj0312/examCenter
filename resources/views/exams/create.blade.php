@extends('layouts.app')



@section('content')


@if ($message = Session::get('fail'))

<div class="alert alert-danger">

    <p>{{ $message }}</p>

</div>

@endif


@if ($errors->any())

    <div class="alert alert-danger">

        <strong>Whoops!</strong> There were some problems with your input.<br><br>

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif


<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add an Exam') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('exams.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Exam') }}</label>

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" required autofocus />
                                </div>
                            </div>
                            <div class="form-group row">
                                <h5 class="col-md-12 text-md-center">Add Questions to Exam</h5>
                            </div>
                            <div class="form-group row">
                                <div class="card-text col-md-6 text-md-center">Add Question</div>
                                <div class="card-text col-md-4 text-md-center">Marks</div>
                            </div>
                            @foreach($questions as $question)
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 text-md-right">
                                        <input type="checkbox" name="exam_questions[]" value="{{ $question->id }}" />
                                        <label for="exam_questions[]" >{{ __($question->question) }}</label>
                                    </div>
                                    <div class="col-md-4 col-md-offset-1">
                                        <input type="text" name="marks[{{ $question->id }}]" class="form-control col-md-4" />
                                    </div>
                                </div>

                            @endforeach

                            <div class="form-group row">
                                <h5 class="col-md-12 text-md-center">Assign users to Exam</h5>
                            </div>
                            @foreach($users as $user)
                                <div class="form-group row mb-0">
                                    <div class="col-md-12 text-md-center">
                                        <input type="checkbox" name="exam_users[]" value="{{ $question->id }}" />
                                        <label for="exam_users[]" >{{ __($user->username) }}</label>
                                    </div>
                                </div>

                            @endforeach

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
