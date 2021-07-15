@extends('layouts.app')
@section('content')
    <table broder="1px" width="100%">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>File</th>
            <th>Link</th>
            <th>View</th>
            <th>Download</th>
        </tr>
     @foreach($data as $data)
        <tr>
            <td>{{$data->id}}</td>
            <td>{{$data->title}}</td>
            <td>{{$data->file}}</td>
            <td><a href="">{{$data->link}}</a></td>
            <td><a href="{{url('/view', $data->id)}}">view</a></td>

            <td><a href="{{url('/download', $data->file)}}">Download</a></td>
        </tr>

    @endforeach
    </table>
@endsection
