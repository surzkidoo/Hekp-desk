<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="http://127.0.0.1:8000/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href='http://127.0.0.1:8000/dindex.css'>
</head>
<body>
    <header>
        
    </header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-2   d-md-block m-0 p-0 dash ">
                
                <input type="checkbox" class="float-right" name="" id="rad">
                <div class="">
                <h5 class="text-white py-2">Dashboard</h5>  
                    
                </div>
                <ul class="menu-container">
                <ul class="menu-container">
                <a class="text-decoration-none" href="http://127.0.0.1:8000/dashboard/user"><li class="p-2">  <span class="p-2 dash-icon">1</span>User</li></a> 
                  <a class="text-decoration-none" href="http://127.0.0.1:8000/dashboard/facility"><li class="p-2 "> <span class="p-2 dash-icon">2</span>Facility Head </li></a>  
                  <a class="text-decoration-none" href="http://127.0.0.1:8000/dashboard/request"><li class="p-2 dash-active"> <span class="p-2 dash-icon">3</span> Request </li></a> 
                  <a class="text-decoration-none" href="http://127.0.0.1:8000/logout"><li class="p-2"> <span class="p-2 dash-icon">4</span>Login </li></a> 
                
                    
                </ul>
                </li>
                    
                </ul>
            </div>
            <div id="display" class="col-md-7 col-lg-10 col-12 render">
                <div class="mt-5 ml-2row justify-content-center">
                   <div class="w-100 table-responsive">
                        <table class="table border">
                            <th>ID</th>
                            <th>Title</th>
                            <th>Created_by</th>
                            <th>Created_at</th>
                            
                            <th>Action</th>
                            @foreach($requests as $request)
                            <tr>
                                <td>{{$request->id}}</td>
                                <td>{{$request->title}}</td>
                                <td>{{$request->user->username}}</td>
                                <td>{{$request->created_at->diffForHumans()}}</td>
                                <td>
                                <form action="{{route('requestdelete',$request->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                  <input type="submit" id='' value="delete" class="btn btn-sm btn-danger">
                                </form>
                                </td>
                            </tr>
                            @endforeach
                            
                        </table>
                   </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>