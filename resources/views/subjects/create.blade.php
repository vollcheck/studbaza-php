@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create subject') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
			<!-- if there are creation errors, they will show here -->
			{{ HTML::ul($errors->all()) }}

			{{ Form::open(array('url' => 'subjects')) }}

			    <div class="form-group">
				{{ Form::label('name', 'Name') }}
				{{ Form::text('name', Request::old('name'), array('class' => 'form-control')) }}
			    </div>

			    <div class="form-group">
				{{ Form::label('lecturer', 'Lecturer') }}
				{{ Form::text('lecturer', Request::old('lecturer'), array('class' => 'form-control')) }}
			    </div>

			    <div class="form-group">
				{{ Form::label('exam_date', 'Exam Date') }}
				{{ Form::text('exam_date', Request::old('exam_date'), array('class' => 'form-control')) }}
			    </div>

			    {{ Form::submit('Create the subject!', array('class' => 'btn btn-primary')) }}

			{{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
