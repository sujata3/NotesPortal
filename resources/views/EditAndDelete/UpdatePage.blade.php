@extends('layouts.app')

@section('content')


    <div class="card-header text-center">
        Edit
    </div>
    <div class="card-body">
        @if(Session::has('update_fail'))
            <div class="alert alert-danger">
                {{Session::get('update_fail')}}
            </div>
        @endif

        <form method="post" action="{{route('update.data',["id" => $NotesAndResources->id])}}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Title:</label>
                <input type="text" class="form-control" value="{{$NotesAndResources->title}}"  name="title"  required>
                <div style="color:red">@error('title'){{$message}} @enderror </div>

            </div>
            <div class="form-group">
                <label>File:</label>
                <input type="file" value="{{$NotesAndResources->file}}" name="file" required>
                <div style="color:red">@error('file'){{$message}} @enderror </div>

            </div>
                        Or<br>
                        <div class="form-group">
                            <label>Link:</label>
                            <input type="text" class="form-control" placeholder="Provide file link" name="link">


                        </div>
            <div class="col-md-6 offset-5">
                <button type="submit" class="btn btn-lg btn-primary" name="submit">Enter</button>
            </div>
        </form>
    </div>
@endsection
