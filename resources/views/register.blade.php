<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/login.css">
</head>
<body>
    <div class="container">
     <div class="row container-1 justify-content-center align-items-center">
        <div class="col-12 col-sm-10  shadow col-md-5 col-lg-4  container2  p-4 rounded-lg">
            <form action="{{route('register')}}" method="post">
            <h3 class="head">Register Now!</h3>
            <hr class="div">
            @csrf
           
            <div class="inputbox mb-3 rounded-lg  col-12 mx-auto">
                <span>P</span>
                <input type="text" class="" name="name" value="{{old('name')}}" placeholder="Choose username" />
                @error('name')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>

            
            <div class="inputbox  rounded-lg mb-3 col-12 mx-auto">
                <span>P</span>
                <input type="email" name="email" value="{{old('email')}}" class="" placeholder="Email" />
                @error('email')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="inputbox mb-3 rounded-lg  col-12 mx-auto">
                <span>P</span>
                <input type="password" name="password" class="" placeholder="Password" />
                @error('password')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="inputbox mb-3 rounded-lg  col-12 mx-auto">
                <span>P</span>
                <input type="password" name="password_confirmation" class="" placeholder="Again Password" />
            </div>
           <input type="hidden" name="role" value="1">
            <div class="checbox ">
                <input type="checkbox">
                <small class="rmtext">You have read and agree to our terms and condition</small>
            </div>
            <small class="cacc mb-2"> Already have an Account <a href="http://127.0.0.1:8000/login"> here</a></small> 
            <input class="submit rounded-lg" type="submit" value="Create an Account">
    </form>
        </div>
    </div>   
    </div>
    
</body>
</html>