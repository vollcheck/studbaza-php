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
                <div class="card-header">{{ __('All the subjects') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

		    <!-- will be used to show any messages -->
		    @if (Session::has('message'))
			<div class="alert alert-info">{{ Session::get('message') }}</div>
		    @endif

		   <table class="table table-striped table-bordered">
		       <thead>
			   <tr>
			       <td>Name</td>
			       <td>Lecturer</td>
			       <td>Exam Date</td>
			       <td>Group</td>

                               @if (Auth::user()->is_admin)
				   <td>Actions</td>
			       @endif
			   </tr>
		       </thead>
		       <tbody>
		       @foreach($subjects as $key => $value)
			   <tr>
			       <td>{{ $value->name }}</td>
			       <td>{{ $value->lecturer }}</td>
			       <td>{{ $value->exam_date }}</td> <!-- TODO: format as a date -->
			       <td>{{ $value->group() }}</td>

			       @if (Auth::user()->is_admin)
				   <td>
				       {{ Form::open(array('url' => 'subjects/' . $value->id, 'class' => 'pull-right')) }}
					   {{ Form::hidden('_method', 'DELETE') }}
					   {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
				       {{ Form::close() }}
				       <a class="btn btn-small btn-success" href="{{ URL::to('subjects/' . $value->id) }}">Show</a>
				       <a class="btn btn-small btn-info" href="{{ URL::to('subjects/' . $value->id . '/edit') }}">Edit</a>
				   </td>
			       @endif
			   </tr>
		       @endforeach
		       <tr>
			   <td colspan="5" class="text-center"><a href="{{ URL::to('subjects/create') }}">Create another subject</a></td>
		       </tr>
		       </tbody>
		   </table>
                </div>
		@endguest
            </div>
        </div>
    </div>
</div>
@endsection
