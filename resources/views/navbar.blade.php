<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bank Navigation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Welcome {{$name}} </a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="{{route('deposit-page',['id'=>$id])}}"  >Deposit</a></li>
      <li><a href="{{route('withdraw-page',['id'=>$id,'currentBalance'=>$currentBalance])}}">Withdrawals</a></li>
      <li><a href="{{route('transfer-page',['id'=>$id,'currentBalance'=>$currentBalance])}}">Transfer</a></li>
      <li><a href="{{route('bank-statement',['id'=>$id,'currentBalance'=>$currentBalance])}}">Statement</a></li>
      <li><a href="{{route('logout')}}">Logout</a></li>
    </ul>
  </div>
</nav>

</body>
</html>
