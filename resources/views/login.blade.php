<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
     <div class="row container-1 justify-content-center align-items-center">
        <div class="col-12 col-sm-10  shadow col-md-5 col-lg-4  container2  p-4 rounded-lg">
           <p class="text-danger"> {{Session('flash')}}</p>
            <form action="{{route('login')}}" method="post">
            <h3 class="head">Login</h3>
            <hr class="div">
            @csrf
            <div class="inputbox  rounded-lg mb-3 col-12 mx-auto">
                <small>P</small>
                <input type="text" name="email" class="" placeholder="Username or Email" required/>
            </div>
            <div class="inputbox mb-3 rounded-lg  col-12 mx-auto">
                <small>P</small>
                <input type="password" name="password" class="" placeholder="Password" required/>
            </div>
            <div class="checbox ">
                <input name="remember" type="checkbox">
                <span class="rmtext">Remember me</span>
            </div>
            <span class="cacc">Create an account </span>
            <input class="submit  rounded-lg" type="submit"   value="Login">
            </form>
        </div>
    </div>   
    </div>
    
</body>
</html>