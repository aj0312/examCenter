@extends('layouts.app')



@section('content')



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
                    <div class="card-header">{{ __('Add a Question') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('questions.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="question" class="col-md-4 col-form-label text-md-right">{{ __('Question') }}</label>

                                <div class="col-md-6">
                                    <textarea name="question" class="form-control @error('question') is-invalid @enderror" id="question" cols="30" rows="4" required autofocus></textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-4 text-md-right">
                                    <button type="button" class="btn btn-info" onclick="addOptions(this);">
                                        {{ __('Add Option') }}
                                    </button>
                                </div>
                                <label class="col-md-6 col-form-label text-danger">Please click on the radio button in front of
                                     the Correct Option for the Question</label>
                            </div>

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
