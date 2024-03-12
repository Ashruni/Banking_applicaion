<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
    body{
        background-color:#e6ffee;
    }
    .btn{
        background-color:#1a75ff;
        width:375px;
    }
    .container{
        background-color:white;
        height:360px;
        width:400px;
        margin-top:100px;
        border-radius:10px;
    }
    h4{
        font-family:cursive;
        /* color:; */
     }

 </style>

<body>
    <!-- <h4>Success</h4> -->
<div class="container">
  <h2>Login To Your Account</h2>
  <form action="{{route('login-content-posting')}}" method="post">
    @csrf

    <div class="form-group">
      <label >Email:</label>
      <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label >Password:</label>
      <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>