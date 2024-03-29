<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bank Application</title>
  <meta charset="utf-8">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
    body{
        background-color:#e6ffff;
    }
    .btn{
        background-color:#1a75ff;
        width:375px;
    }
    .container{
        background-color:white;
        height:380px;
        width:420px;
        margin-top:100px;
        border-radius:10px;
    }
    #eyeIcon{
        /* margin-bottom:-500px; */
        margin-left:370px;
    }



 </style>

<body>
<div class="container">
  <h2>Create your account</h2>
  <form action="{{route('registration_content')}}" method="post">
    @csrf
  <div class="form-group">
      <label for="">Name:</label>
      <input type="text" name="name" class="form-control"  placeholder="Enter name"  required>
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" name="email" class="form-control" id="email" placeholder="Enter email"  required>
    </div>

    <div class="form-group">
<label>Password: (minimum 8 characters ) </label>

    <input type="password" id="password" name= "password" class="form-control" pattern=".{8,}" placeholder="Enter password" required>
    <label for="password" id="eyeIcon" onclick="document.getElementById('password').type = (document.getElementById('password').type === 'password') ? 'text' : 'password'; this.innerHTML = (document.getElementById('password').type === 'password') ? '<i class=&quot;fas fa-eye&quot;></i>' : '<i class=&quot;fas fa-eye-slash&quot;></i>';">
        <i class="fas fa-eye"></i>

    </label>
</div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
