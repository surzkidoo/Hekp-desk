<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://127.0.0.1:8000/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/index.css">
    <script src="http://127.0.0.1:8000/jquery.js"></script>
    <script async="true" src="http://127.0.0.1:8000/index.js"></script>

    <style>
            .iden{
                font-size:12px;
            }
            .reply-sec{
                background-color: rgb(136, 219, 147);
            }
            .rpl{
                font-size:13px;
            }
            
            .cl{
                background-color: rgb(136, 219, 147) !important;
            }
            
    </style>
</head>

<body>
<div class="container-fluid bg-success  header2">
        
        <ul class="category-container d-inline  justify-content-end" style="flex-wrap: nowrap;">
            <li class="active text-success"><a href="" class="text-decoration-none text-dark ">Incomming Requests</a></li>
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
    
        

    

    <div class="overlay">
        <div class="post-comment d-flex justify-content-center align-items-center flex-column p-4 rounded-lg" >
            <div class="cancel text-danger align-self-end ">
                x
            </div>
            <form action="{{route('addreply')}}" method="post">
                @csrf
                   <textarea name="content" id="" class="form-control rpl" cols="40" rows="15"  placeholder="Type here..."></textarea>
                   <input type="hidden" id="requestid" name="id" value="">
                   <input type="submit" class="btn btn-sm cl mt-1" value="Reply">
                </form>
        </div>
    </div>


    <div class="container-fluid mt-4">
        <div class="row justify-content-center">

            <div class="newsection  col-5 mr-2">
            
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
                    <span class="d-flex justify-content-between">
                        <button
                           id="{{$request->id}}" class="btn btn-sm btn-success reply">reply</button>
                        <span>
                            <span><small class="ml-1">change Status:</small></span>
                            <form id="form" class="d-inline" action="{{route('editstatus')}}" method="post">
                                @csrf
                            <input type="hidden" name="id" value="{{$request->id}}">
                            <select name="status" id="">
                                @foreach($status as $sts)
                                @if($sts->status==$request->status->status)
                                <option value="{{$sts->id}}" selected>{{$request->status->status}}</option>
                                @else
                                <option value="{{$sts->id}}">{{$sts->status}}</option>
                                @endif
                                @endforeach
                               
                            </select>
                            
                        </form>
                    </span>
                    




                </div>
                @endforeach
               

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