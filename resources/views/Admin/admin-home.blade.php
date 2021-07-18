<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title> Admin panel </title>
{{--    <link rel="stylesheet" href="style.css">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
    <body>

    <input type="checkbox" id="check">
{{--    header part--}}
    <header>
        <label for="check">
             <i class="fa fa-bars" aria-hidden="true" id="sidebar_btn"></i>
        </label>
        <div class="left_area">
            <h3>Admin <span>Panel</span></h3>
        </div>
        <div class="right_area">
            <a href="{{ route('login') }}" class="logout-btn"><i class="fa fa-logout" aria-hidden="true"></i>Logout</a>
        </div>
        <div class="content"></div>
    </header>
{{--header end--}}

{{--    sidebar start--}}
   <div class="sidebar">
    <center>
        <h4><i class="fa fa-user-circle" aria-hidden="true"></i><span>Profile</span></h4>
    </center>
        <a href="{{ route('home.page') }}"><i class="fa fa-home" aria-hidden="true"><span>HomePage</span></i></a>
        <a href="{{ route('admin.viewNotes') }}"><i class="fa fa-file" aria-hidden="true"><span>Notes</span></i></a>

   </div>
    </body>


{{--CSS part--}}
<style>
    body{
        margin:0;
        padding:0;
        font-family: "Roboto", sans-serif;
    }
    header{
        position: fixed;
        background: #22242A;
        padding: 20px;
        width:100%;
        height: 30px;
    }
    .left_area h3{
        color: #fff;
        margin:0;
        text-transform: uppercase;
        font-size: 22px;
        font-weight:900;
    }
    .left_area span{
        color: #1DC4E7;
    }

    .logout-btn{
        padding:5px;
        background: #1983D3;
        text-decoration: none;
        float: right;
        margin-top: -30px;
        margin-right: 40px;
        font-size: 15px;
        font-weight:600;
        color: #fff;
        transition:0.5s;
        transition-property:background;
    }
    .logout-btn:hover{
        background: #0D9DBB;
    }
    .sidebar{
        background: #2F323A;
        margin-top: 70px;
        padding-top: 30px;
        position: fixed;
        left: 0;
        width: 250px;
        height: 100%;
        transition: 0.5s;
        transition-property: left;
    }
    .sidebar h4{
        color: #ccc;
        margin-top:0;
        margin-bottom: 20px;
    }
    .sidebar a{
        color: #fff;
        display: block;
        width: 100%;
        line-height: 60px;
        padding-left: 40px;
        box-sizing: border-box;
    }
    .sidebar a:hover{
        background: #1983D3;
    }
    .sidebar i{
        padding-right: 10px;
    }
    label #sidebar_btn{
        z-index:1;
        color: #fff;
        position: fixed;
        cursor: pointer;
        left: 300px;
        font-size: 20px;
        margin: 5px 0;
        transition: 0.5s;
        transition-property: color;
    }
    label #sidebar_btn:hover{
        color: #1983D3;
    }
    #check:checked ~ .sidebar{
        left: -190px;
    }
    #check:checked ~ .sidebar a span{
        display: none;
    }
    #check:checked~.sidebar a{
        font-size: 20px;
        margin-left: 170px;
        width: 80px;
    }
    .content{
        margin-left: 250px;
        background-color: #6cb2eb;

    }

</style>


</html>

