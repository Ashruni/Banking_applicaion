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
<div class="container">
    @csrf
  <h2>Bank Statement</h2>

  <table class="table">
    <thead>
      <tr>
        <th>Date</th>
        <th>Deposits</th>
        <th>Withdrawal</th>
        <th>Amount Transferred to</th>
        <!-- <th>Amount Transferred to</th> -->
        <!-- <th>Amount Transferred from</th> -->


      </tr>

    <tbody>


    @foreach( $bankDetails as  $bankDetail)
      <tr class="">

        <td>{{$bankDetail->created_at}}</td>
        <td>{{$bankDetail->deposit}}</td>
        <td>{{$bankDetail->withdraw}}</td>
        <td>{{$bankDetail->transfer}} - {{{$bankDetail->email}}}</td>
        <!-- <td><td> -->

        @endforeach

      </tr>

    </tbody>
  </table>
  <table class="table">
  <thead>
    <tr>
        <th>Transfer</th>
        <th>Credited To</th>
    </tr>
  </thead>
  <tbody>
  @foreach( $bankDepositDetails as  $bankDepositDetail)
    <tr>
        <td>{{$bankDepositDetail->transfer}}</td>
        <td>{{$bankDepositDetail->email}}</td>
        @endforeach
        <th>BALANCE</th>
        <td>₹{{$currentBalance}}</td>
    </tr>

  </tbody>


  </table>
</div>
</body>
</html>
