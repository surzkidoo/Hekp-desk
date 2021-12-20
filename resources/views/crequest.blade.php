<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/index.css">
    <script src="jquery.js"></script>
    <script async="true" src="index.js"></script>
    <style >
    input,textarea{
        font-size:15px !important;
    }
    </style>
</head>

<body>
<div class="container-fluid bg-success  header2">
        
        <ul class="category-container d-inline  justify-content-end" style="flex-wrap: nowrap;">
            <li ><a href="http://127.0.0.1:8000/request" class="text-decoration-none text-dark ">Requests</a></li>
            <li class="active text-success"><a href="http://127.0.0.1:8000/request/new" class="text-decoration-none text-dark">Create Request</a></li>
            <li><a href="http://127.0.0.1:8000/user/changepassword"class="text-decoration-none text-dark" >Change password</a></li>
            <li><a href="http://127.0.0.1:8000/logout"class="text-decoration-none text-dark" >Logout</a></li>
           

        </ul>
        <span class="float-right mt-2">
        @if (!auth()->user())
        <li class="menuitem "><a href="http://127.0.0.1:8000/login" class="btn-sm btn btn-warning">Login</a></li>
        <li class="menuitem "><a href="http://127.0.0.1:8000/register" class="btn-sm btn btn-warning">Register</a>
        @else
        <li class="menuitem text-light">Welcome, {{auth()->user()->username}}</a>
        @endif
        </span>
    </div>
    
    
        

    




    <div class="container-fluid mt-4">
        <div class="row justify-content-center">

            <div class="newsection  col-5 mr-2">
                <form class="bg-light p-3" action="{{route('rcreate')}}" method="post">
                @csrf
                <h6>Title</h6>
                <input type="text" name="title" class="form-control my-2" placeholder="Request title here">
                <h6>Description</h6>
                <textarea cols="30" rows="10" name="description" class="form-control my-2" placeholder="Enter your request details"></textarea>
                    <input type="submit" class="btn btn-sm btn-primary" value="Create">
                </form>
            </div>

        </div>
    </div>
</body>

</html>