<!DOCTYPE html>
<html lang="en">
<head>
  <title>deposit</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
        height:240px;
        width:300px;
        margin-top:100px;
        border-radius:10px;
    }
    h4{
        font-family:cursive;
        /* color:; */
     }
     form{
        width:370px;
        /* margin-left:400px; */


     }

 </style>
</head>


<body style="background-color:#e6ffff;">
@include('navbar',['name' => $name,'userId' => $user->id,'user' => $user->id, 'currentBalance' => $currentBalance])
@if(session('success'))
    <div class="alert alert-success" style="margin-top:-20px;">
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger" style="margin-top:-20px;">
        {{ session('error') }}
    </div>
@endif

<div class="container" style="width:400px;height:200px;" >
  <h2 style="margin-left:80px;">Deposit Money</h2>
  <form action="{{route('depositing_money',['id' => request('id')]) }}" method="post">
    @csrf


    <div class="form-group">
      <label >Amount</label>
      <input type="number"  name="deposit" class="form-control" max="10000000" placeholder="Enter deposit money" required>
    </div>

    <button type="submit" class="btn btn-default" style=" background-color:#1a75ff;width:375px;">Deposit</button>
  </form>
</div>

</body>
</html>
