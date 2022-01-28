@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
		@guest
		<div class="card-body">
		    In order to see the content, please
		    <a href="{{ route('login') }}">{{ __('log in') }}</a>
		    or
		    <a href="{{ route('register') }}">{{ __('register') }}</a>
		    .
		</div>

		@else
                <div class="card-header">{{ $subject->name }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

		    <!-- if there are creation errors, they will show here -->
		    {{ HTML::ul($errors->all()) }}

		    {{ Form::model($subject, array('route' => array('subjects.update', $subject->id), 'method' => 'PUT')) }}

			<div class="form-group">
			    {{ Form::label('name', 'Name') }}
			    {{ Form::text('name', null, array('class' => 'form-control')) }}
			</div>

			<div class="form-group">
			    {{ Form::label('lecturer', 'Lecturer') }}
			    {{ Form::lecturer('lecturer', null, array('class' => 'form-control')) }}
			</div>

			<div class="form-group">
			    {{ Form::label('exam_date', 'Exam Date') }}
			    {{ Form::exam_date('exam_date', null, array('class' => 'form-control')) }}
			</div>

			{{ Form::submit('Edit the subject!', array('class' => 'btn btn-primary')) }}

		    {{ Form::close() }}
		</div>
		@endguest
            </div>
        </div>
    </div>
</div>
@endsection
