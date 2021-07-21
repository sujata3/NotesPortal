@extends('Admin.admin-panel')
@section('content')

<div class="container-fluid mt-5">
    <h3>Editable notes</h3>

    <div class="table-responsive" >
        <table class="table table-hover">

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
                    <a href="{{route('edit.note',['id'=> $notes_data->id])}}"><i class="fas fa-spell-check"></i> Edit</a> | |
                    <a href="{{route('delete.note',['id'=> $notes_data->id])}}"><i class="fas fa-trash-alt"></i> Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
    </div>
</div>
    <br>
@endsection
