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
    table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
    body{
        background-color:#ebfaeb;
    }
</style>
<body>


<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Welcome {{$name}}</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="{{route('deposit-page',['id'=>$user->id])}}"  >Deposit</a></li>
      <li><a href="{{route('withdraw-page',['id'=>$user->id])}}">Withdrawals</a></li>
      <li><a href="{{route('transfer-page',['id'=>$user->id])}}">Transfer</a></li>
      <li><a href="#">Statement</a></li>
      <li><a href="#">Logout</a></li>
    </ul>

  </div>
</nav>

<div class="container">
<h2>Bank Details</h2>

<table>
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Current Balance</th>
  </tr>
  <tr>
  <h2></h2>

    <td>{{$name}}</td>
    <td>{{$email}}</td>
    <td>---</td>

    {{$user->id}}
  </tr>




</table>


</body>
</html>


</div>

</body>
</html>
