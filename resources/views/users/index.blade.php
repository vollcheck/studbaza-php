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
		<div class="card-header">{{ __('Users table') }}</div>
                <div class="card-body">
			<!-- not sure which message should I use -->
		    @if (Session::has('message'))
			<div class="alert alert-info">{{ Session::get('message') }}</div>
		    @endif
		    @if (session('status'))
			<div class="alert alert-success" role="alert">
			    {{ session('status') }}
			</div>
		    @endif

		    <table class="table table-striped table-bordered">
			<thead>
			    <tr>
				<td>Name</td>
				<td>Email</td>
				<td>Group ID</td>
				@if (Auth::user()->is_admin)
				    <td>Actions</td>
				@endif
			    </tr>
			</thead>
			<tbody>
			@foreach($users as $key => $value)
			    <tr>
				<td>{{ $value->name }}</td>
				<td>{{ $value->email }}</td>
				<td>{{ $value->group_id }}</td>

				@if (Auth::user()->is_admin)
				    <td>
					{{ Form::open(array('url' => 'users/' . $value->id, 'class' => 'pull-right')) }}
					    {{ Form::hidden('_method', 'DELETE') }}
					    {{ Form::submit('Delete this user', array('class' => 'btn btn-warning')) }}
					{{ Form::close() }}
					<a class="btn btn-small btn-success" href="{{ URL::to('users/' . $value->id) }}">Show</a>
					<a class="btn btn-small btn-info" href="{{ URL::to('users/' . $value->id . '/edit') }}">Edit</a>
				    </td>
				@endif
			    </tr>
			@endforeach
			</tbody>
		    </table>
		</div>
		@endguest
            </div>
        </div>
    </div>
</div>
@endsection
