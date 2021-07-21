@extends('Admin.admin-panel')
@section('content')
    {{$NotesAndResources->title}}
    {{$NotesAndResources->file}}
    <iframe height="500" width="100%" src="/Files/{{$NotesAndResources->file}}"></iframe>
@endsection
