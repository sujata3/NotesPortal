@extends('layouts.app')
@section('content')

    <table border="5px;" width="100%">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>File</th>
            <th>Link</th>
            <th>For changes</th>
        </tr>
        @foreach($NotesAndResources as $notes_data)
            <tr>
                <td>{{$notes_data->id}}</td>
                <td>{{$notes_data->title}}</td>
                <td>{{$notes_data->file}}</td>
                <td>{{$notes_data->link}}</td>
                <td>
                    <a href="{{route('edit.note',['id'=> $notes_data->id])}}"><button class="btn btn-success">Edit</button> </a> ||
                    <a href="{{route('delete.note',['id'=> $notes_data->id])}}"><button class="btn btn-danger">Delete</button></a>
                </td>
            </tr>
        @endforeach
    </table>
    <br>
    <a href="{{url('/admin/notes')}}"><button class="btn btn-lg btn-success">View Notes</button></a>
@endsection
