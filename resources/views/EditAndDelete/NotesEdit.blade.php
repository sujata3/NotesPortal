@extends('layouts.app')
@section('content')

    <table border="5px;" width="100%">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>File</th>
            <th>For changes</th>
        </tr>
        @foreach($data as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->title}}</td>
                <td>{{$data->file}}</td>
                <td>
                    <a href="{{route('edit.note',['id'=> $data->id])}}"><button class="btn btn-success">Edit</button> </a> ||
                    <a href="{{route('delete.note',['id'=> $data->id])}}"><button class="btn btn-danger">Delete</button></a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
