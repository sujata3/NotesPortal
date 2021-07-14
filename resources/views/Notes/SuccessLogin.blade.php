@extends('layouts.app')

@section('content')
{{--<div class="card col-md-6 offset-3" style="margin-top: 40px;">--}}
{{--  </div>--}}

		<div class="card-header text-center">
            Notes and Resources
        </div>
		<div class="card-body">
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
    @endif

    @if(Session::has('fail'))
    <div class="alert alert-danger">
        {{Session::get('fail')}}
    </div>
    @endif

        <form method="post" action="{{route('data.store')}}" enctype="multipart/form-data">
            @csrf

				<div class="form-group">
					<label>Title:</label>
					<input type="text" class="form-control" placeholder="Enter note title" name="title"  required>
                    <span style="color:red">@error('password'){{$message}} @enderror </span>

				</div>
                <div class="form-group">
					<label>File:</label>
{{--					<input type="text" class="form-control" placeholder="file link or pdf" name="link"  required> <br>--}}
                    <input type="file" name="file" required>
                    <span style="color:red">@error('password'){{$message}} @enderror </span>

				</div>
				<div class="col-md-6 offset-5">
					<button type="submit" class="btn btn-lg btn-primary" name="submit">Enter</button>
				</div>
			</form>
		</div>
@endsection
