@extends('Admin.admin-panel')

@section('content')
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
                    <th>Actions</th>
                </tr>
                </thead>

                @foreach($notes_resources as $Notes)
                    <tr>
                        <td>{{$Notes->id}}</td>
                        <td>{{$Notes->title}}</td>
                        <td>{{$Notes->file}}</td>
                        <td><a href="{{url('/link')}}">{{$Notes->link}}</a></td>
                        <td><a href="{{url('/view', $Notes->id)}}"><i class="fas fa-eye"></i></a></td>

                        <td><a href="{{url('/download', $Notes->file)}}"><i class="fas fa-download"></i></a></td>
                        <td>
                            <a href="{{url('/admin/notes/add')}}"><i class="fas fa-plus ml-2"></i></a> | |
                            <a href="{{url('/Update')}}"> <i class="fas fa-edit"></i></a>
                        </td>
                    </tr>

                @endforeach
            </table>
        </div>
</div>
@endsection
