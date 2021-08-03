@extends('Admin.admin-panel')
<link rel="stylesheet" type="text/css" href="{{url('css/drag.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>

@section('content')

    <div class="card-body">
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
    </div>
        @endif

        @if(Session::has('fail'))
            <div class="alert alert-danger">
                {{Session::get('fail')}}
            </div>
        @endif
    <div class="container-fluid mt-3">


        <div class="table-responsive" >


            <div class="card-header text-center">
                Add new notes
            </div>
        <form method="post" action="{{route('admin.notes.store')}}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Title:</label>
                <input type="text" class="form-control" placeholder="Enter note title" name="title"  required>
                <span style="color:red">@error('title'){{$message}} @enderror </span>
            </div>

        <div class="drop-zone">
            <span class="drop-zone__prompt"> Drop a file here or click to upload</span>
            <input type="file" name="file" class="drop-zone__input">
        </div>
        <span style="color:red">@error('file'){{$message}} @enderror </span>


                        <div class="form-group">
                            <label>Link:</label>
                            <input type="text" class="form-control" placeholder="Provide file link" name="link">


                        </div>
            <div class="col-md-6 offset-5">
                <button type="submit" class="btn btn-lg btn-primary" name="submit">Enter</button>
            </div>
        </form>

        </div>
    </div>
    <script src="{{url('js/script.js')}}"></script>

@endsection
