@extends('layouts.app')
@section('content')
    <table border="5px;" width="100%">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>File</th>
            <th>Link</th>
            <th>View</th>
            <th>Download</th>
        </tr>
     @foreach($notes_resources as $Notes)
        <tr>
            <td>{{$Notes->id}}</td>
            <td>{{$Notes->title}}</td>
            <td>{{$Notes->file}}</td>
            <td><a href=""></a></td>
            <td><a href="{{url('/view', $Notes->id)}}">view</a></td>

            <td><a href="{{url('/download', $Notes->file)}}">Download</a></td>
        </tr>

    @endforeach
    </table>
    <br>
    <a href="{{url('/admin/notes/add')}}"><button class="btn btn-lg btn-success">Add Notes</button></a>
    <a href="{{url('/Update')}}"><button class="btn btn-lg btn-success">Update Notes</button></a>

@endsection
