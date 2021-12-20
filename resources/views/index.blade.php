<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="index.css">
    <script src="jquery.js"></script>
    <script async="true" src="index.js"></script>


    <style>
        .active{
            background-color:white;
            color:
        }
    </style>
</head>

<body>
    <div class="container-fluid bg-success  header2">
        
        <ul class="category-container d-inline  justify-content-end" style="flex-wrap: nowrap;">
            <li class="active text-success"><a href="" class="text-decoration-none text-dark ">Requests</a></li>
            <li><a href="http://127.0.0.1:8000/request/new" class="text-decoration-none text-dark">Create Request</a></li>
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
            <p class="text-success"> {{Session('flash')}}</p>
            @foreach($requests as $request)
                <div class="post bg-white p-2 mb-2">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span>RequestID_{{$request->id}}</span>
                            <span class="text-avatar"> By {{$request->user->username}}</span>

                        </div>
                        <div class="d-inline-block float-right post-time">{{$request->created_at->diffForHumans()}}</div>
                    </div>

                    <div>
                        <h1 class="post-title d-inline-block"><a href="http://127.0.0.1:8000/request/{{$request->id}}">{{$request->title}}</a></h1>
                    </div>
                    <span class="d-flex justify-content-end">
                        <span><small class="mr-2 ">Status: <span class="p-1 bg-{{$request->status->color}}">{{$request->status->status}}</span> </small></span>
                        <form id="form" class="d-inline" action="{{route('editstatus')}}" method="post">
                                @csrf
                        <input type="hidden" name="id" value="{{$request->id}}">
                        <input type="hidden" name="status" value="2" >
                             <input type="submit" @if($request->status->color=='danger' || !auth()->user()) disabled @endif value="x" class="btn btn-danger btn-sm">
                        </form>
                       
                    </span>




                </div>
                @endforeach

                

            </div>

        </div>
    </div>
</body>

</html>