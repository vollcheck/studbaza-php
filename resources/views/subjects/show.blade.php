@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
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
            </div>
        </div>
    </div>
</div>
@endsection
