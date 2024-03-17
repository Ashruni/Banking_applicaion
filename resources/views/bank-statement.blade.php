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
        background-color: #e6f5ff;
    }
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }

</style>
<body style="background-color: #e6f5ff;">
@include('navbar', ['name' => $name, 'id' => $user->id, 'currentBalance' => $currentBalance])
<div class="container">
    @csrf
    <h2>Current Account Balance</h2>

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

    <h2>Your Transaction Actions</h2>

    <div class="row">
        <div class="col-md-4">
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Deposits</th>
                        <th>Debit</th>
                        <th>Amount - Transferred to Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bankDetails as $bankDetail)
                    <tr>
                        <td>{{ date('d-m-Y', strtotime($bankDetail->created_at)) }}</td>
                        <td>{{ $bankDetail->deposit }}</td>
                        <td>{{ $bankDetail->withdraw }}</td>
                        <td>{{ $bankDetail->transfer }} - {{ $bankDetail->email }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-4" style="margin-top:-60px;">
            <h2>Credited To Your Account </h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Credited</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bankDepositDetails as $bankDepositDetail)
                    <tr>
                        <td>{{ date('d-m-Y', strtotime($bankDepositDetail->created_at)) }}</td>
                        <td>{{ $bankDepositDetail->transfer }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-4">


        </div>
    </div>
</div>
</body>
</html>
