<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://127.0.0.1:8000/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/index.css">
    <link rel="stylesheet" href="{{url('dindex.css')}}">
    
    <script src="http://127.0.0.1:8000/jquery.js"></script>
    <script async="true" src="http://127.0.0.1:8000/index.js"></script>
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
                <a class="text-decoration-none" href="http://127.0.0.1:8000/dashboard/user"><li class="p-2 ">  <span class="p-2 dash-icon">1</span>User</li></a> 
                  <a class="text-decoration-none" href="http://127.0.0.1:8000/dashboard/facility"><li class="p-2 dash-active"> <span class="p-2 dash-icon">2</span>Facility Head</li></a>  
                  <a class="text-decoration-none" href="http://127.0.0.1:8000/dashboard/request"><li class="p-2"> <span class="p-2 dash-icon">3</span> Request </li></a> 
                  <a class="text-decoration-none" href="http://127.0.0.1:8000/logout"><li class="p-2"> <span class="p-2 dash-icon">4</span>Login </li></a> 
                
                    
                </ul>
            </div>
            <div id="display" class="col-md-7 col-lg-10 col-12 render mb-4">
           
            
                <div class="mt-4">
                <span class=""> Add Facity head</span>
                <form action="{{route('register')}}" method="post">
                    @csrf
                <input type="text" name="name" class="col-2 form-control d-inline" placeholder="Username">
                    <input type="text" name="email" class="col-2 form-control d-inline" placeholder="Email">
                    <input type="password" name="password" class="col-2 form-control d-inline"  placeholder="Choose password">
                    <input type="password" name="password_confirmation" class="col-2 form-control d-inline"  placeholder="Again password">
                    <input type="hidden" name="role" value="2">
                    <input type="submit" class="btn btn-sm btn-primary col-1" value="create" />
                </form>
               
                </div>
      
                <div class="mt-1 ml-2row justify-content-center">
                   <div class="w-100 table-responsive">
                        <table class="table border">
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
            
                            <th>Action</th>
                            @foreach($user as $usr)
                            <tr>
                                <td>{{$usr->id}}</td>
                                <td>{{$usr->username}}</td>
                                <td>{{$usr->email}}</td>
                               
                                <td>
                                <form action="{{route('userdelete',$usr->id)}}" method="post">
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
<script>
$(".reply").on("click",function(){
        $(".overlay").css("display","flex");
        $('#requestid').attr('value',this.id);
    })

    $(".cancel").on("click",function(){
        $(".overlay").css("display","none");
    });

    $('#form').on("change",function(){
        this.submit();
        
    });
</script>

</html>