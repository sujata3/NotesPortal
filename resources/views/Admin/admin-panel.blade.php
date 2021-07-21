<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel
    </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{url('css/notes.css')}}">


</head>
<body>
{{--    header part--}}
<header>
    <div class="tophead">
        <div class="left_area">
            <h3>Notes An<span>d Resources</span></h3>
        </div>
        <div>
            <span class="menulines" onclick="openNav()">&#9776;</span>
        </div>
    </div>
</header>
{{--header end--}}

{{--    sidebar start--}}
<div class="sidenav" id="navbar">
    <span href="javascript:void(0)" class="closebtn" onclick="closeNav()">
        &times;
    </span>

   <span class="user"> <i class="fa fa-user-circle" aria-hidden="true"></i> {{ Auth::user()->name }}</span>
    <a href="{{ route('home.page') }}"><i class="fa fa-home" aria-hidden="true"></i><span> Home</span></a>
    <a href="{{ route('admin.viewNotes') }}"><i class="fa fa-file" aria-hidden="true"></i><span> Notes</span></a>
    @if(auth()->check())

        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i>
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
@endif
</div>
<div class="content">
   @yield('content')
</div>
<script>
    const openNav=()=>{
        document.getElementById('navbar').style.width="250px";
    }
    const closeNav=()=>{
        document.getElementById('navbar').style.width="0";
    }
</script>
</body>
</html>
