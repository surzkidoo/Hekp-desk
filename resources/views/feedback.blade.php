<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
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
    @if(auth()->user()->role->id=="1")
    <div class="container-fluid bg-success  header2">
        
        <ul class="category-container d-inline  justify-content-end" style="flex-wrap: nowrap;">
            <li><a href="http://127.0.0.1:8000/request" class="text-decoration-none text-dark ">Requests</a></li>
            <li><a href="http://127.0.0.1:8000/request/new" class="text-decoration-none text-dark">Create Request</a></li>
            <li><a href="http://127.0.0.1:8000/user/changepassword"class="text-decoration-none text-dark" >Change password</a></li>
            <li><a href="http://127.0.0.1:8000/logout"class="text-decoration-none text-dark" >Logout</a></li>

        </ul>
        <span class="float-right mt-2">
        @if (!auth()->user())
        <li class="menuitem ><a href="" class="btn-sm btn btn-warning">Login</a></li>
        <li class="menuitem "><a href="" class="btn-sm btn btn-warning">Register</a>
        @else
        <li class="menuitem text-light">Welcome, {{auth()->user()->username}}</a>
        @endif
        </span>
    </div>
    @else


    @endif
        

    

    <div class="overlay">
        <div class="post-comment d-flex justify-content-center align-items-center flex-column p-4 rounded-lg" >
            <div class="cancel text-danger align-self-end ">
                x
            </div>
            <form action="{{route('addreply')}}" method="post">
                @csrf
                   <textarea name="content" id="" class="form-control rpl" cols="40" rows="15"  placeholder="Type here..."></textarea>
                   <input type="hidden" name="id" value="{{$request->id}}">
                   <input type="submit" class="btn btn-sm cl mt-1" value="Reply">
                </form>
        </div>
    </div>


    <div class="container-fluid mt-4">
        <div class="row justify-content-center">

            <div class="newsection  col-6 mr-2">
                

                <div class=" bg-white p-2 mb-2">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span>RequestID {{$request->id}}</span>
                            <span class="text-avatar"> By {{$request->user->username}}</span>

                        </div>
                        <div class="d-inline-block float-right post-time">{{$request->created_at->diffForHumans()}}</div>
                    </div>

                    <div>
                        <h1 class="post-title d-inline-block">{{$request->title}}</h1>
                    </div>
                    @if(auth()->user()->role->id=="2")
                    <span class="d-flex justify-content-between">
                        <button
                            class="btn btn-sm btn-success reply">reply</button>
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
                    @else
                    <span class="d-flex justify-content-end">
                        <span><small class="mr-2 ">Status: <span class="p-1 bg-{{$request->status->color}}">{{$request->status->status}}</span> </small></span>
                        <form id="form" class="d-inline" action="{{route('editstatus')}}" method="post">
                                @csrf
                        <input type="hidden" name="id" value="{{$request->id}}">
                        <input type="hidden" name="status" value="2" >
                        <input type="submit" @if($request->status->color=='danger' && !auth()->user())disabled @endif value="x"
                            class="btn btn-danger btn-sm">
                        </form>
                       
                    </span>
                    @endif
                    




                </div>
                @foreach($request->reply as $reply)
                <div class="reply-sec  ml-5 rounded-lg p-2 mb-2">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="iden">ReplyID {{$reply->id}}</span>
                            <span class="text-avatar text-white">FACILITY_HEAD {{$reply->user->username}}</span>

                        </div>
                        <div class="d-inline-block float-right post-time">{{$reply->created_at->diffForHumans()}}</div>
                    </div>

                    <div class="rpl">
                    {{$reply->Content}}
                    </div>


                </div>
                @endforeach

            </div>

        </div>
    </div>
</body>
<script>
    $(".reply").on("click",function(){
        $(".overlay").css("display","flex");
        
    })

    $(".cancel").on("click",function(){
        $(".overlay").css("display","none");
    })

    $('#form').on("change",function(){
        this.submit();
        
    });
</script>
</html>