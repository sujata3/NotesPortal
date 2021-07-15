@extends('layouts.app')
@section('content')
    {{$data->title}}
    {{$data->file}}
    <iframe height="500" width="100%" src="/Files/{{$data->file}}"></iframe>
@endsection
