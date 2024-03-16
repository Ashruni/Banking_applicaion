<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bank Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <style>

    table {
      font-family: Arial, sans-serif;
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

  </style>
</head>
<body style="background-color:#e6ffff">



@include('navbar', ['name' => $name, 'id' => $user->id, 'currentBalance' => $currentBalance])
<!-- Including the navigation bar -->

<div class="container">
  <h2>Bank Details</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Current Balance</th>
      </tr>
    </thead>
    <tbody>

      <tr>
        <td>{{$name}}</td>
        <td>{{$email}}</td>
        <td>{{$currentBalance}}</td>
      </tr>
    </tbody>
  </table>
</div>

</body>
</html>
