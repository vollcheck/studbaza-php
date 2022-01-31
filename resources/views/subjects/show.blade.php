@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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

		    <div class="jumbotron text-center">
			<p>
			    <strong>Lecturer:</strong> {{ $subject->lecturer }}<br>
			    <strong>Exam date:</strong> {{ $subject->exam_date }}
			</p>
		    </div>

                </div>
		@endguest
            </div>
        </div>
    </div>
</div>
@endsection
