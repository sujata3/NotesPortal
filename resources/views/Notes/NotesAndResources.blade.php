@extends('Admin.admin-panel')

@section('content')

        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            @endif
    <div class="container-fluid mt-5">
        <h3>All available notes</h3>

        <div class="table-responsive" >
            <table class="table table-hover">
                <thead >
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>File</th>
                    <th>Link</th>
                    <th>View</th>
                    <th>Download</th>
                </tr>
                </thead>

                @foreach($notes_resources as $Notes)
                    <tr>
                        <td>{{$Notes->id}}</td>
                        <td>{{$Notes->title}}</td>
                        <td>{{$Notes->file}}</td>
                        <td><a href="{{url('/link', $Notes->id)}}"target="_blank">{{$Notes->link}}</a></td>
                        <td><a href="{{url('/view', $Notes->id)}}" target="_blank"><i class="fas fa-eye"></i></a></td>

                        <td><a href="{{url('/download', $Notes->file)}}"><i class="fas fa-download"></i></a></td>

                    </tr>

                @endforeach
            </table>
        </div>
        <div class="action">
            <a href="{{url('/admin/notes/add')}}"><button type="add" class="btn btn-secondary" name="add"><i class="fas fa-plus ml-2"></i>Add New Notes</button></a>
            <a href="{{url('/Update')}}"><button type="edit" class="btn btn-secondary" name="edit"> <i class="fas fa-edit"></i> Edit or Delete Available Notes</button></a>
        </div>
</div>
@endsection
