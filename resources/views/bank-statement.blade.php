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
        background-color:#ffff;
    }
</style>
<body>
@include('navbar', ['name' => $name, 'id' => $user->id, 'currentBalance' => $currentBalance])
<div class="container">
    @csrf
  <h2>Bank Statement</h2>

  <div class="row">
    <div class="col-md-6">
      <table class="table">
        <thead>
          <tr>
            <th>Date</th>
            <th>Deposits</th>
            <th>Debit</th>
            <th>Amount Transferred to</th>

          </tr>
        </thead>
        <tbody>
          @foreach($bankDetails as $bankDetail)
          <tr>
            <td>{{ date('d-m-Y', strtotime($bankDetail->created_at)) }}</td>
            <td>{{ $bankDetail->deposit }}</td>
            <td>{{ $bankDetail->withdraw }}</td>
            <td>{{ $bankDetail->transfer }} - {{ $bankDetail->email }}</td>
            <!-- If you have a column for "Credits" here, you can add it as well -->
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-md-6" style="margin-top:-65px;" >
      <h2>Bank Deposit Details</h2>
      <table class="table" >
        <thead>
          <tr>
            <!-- <th>Email</th> -->
            <th>Credited</th>
          </tr>
        </thead>
        <tbody>
          @foreach($bankDepositDetails as $bankDepositDetail)
          <tr>
            <!-- <td>{{ $bankDepositDetail->email }}</td> -->
            <td>{{ $bankDepositDetail->transfer }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
</body>
</html>
