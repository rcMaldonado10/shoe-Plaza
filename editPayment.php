<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sign Up/Sign In Form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
  <h1>Select Payment Method</h1><br>
  <div class="col-md-6" >
<table class="table table-striped">
  <tbody>
    <tr>
      <td>
        <div class="col-md-8">
        <label>Credit Card Num. :</label><br>
        <label>Credit Card Name</label><br>
        <label>Expiration Date</label>
        </div>
        <div class="col-md-4">
          <br>
          <button class="btn btn-primary">Select</button>
        </div>
            <tr>
      <td>
        <div class="col-md-8">
        <label>Credit Card Num. :</label><br>
        <label>Credit Card Name</label><br>
        <label>Expiration Date</label>
        </div>
        <div class="col-md-4">
          <br>
          <button class="btn btn-primary">Select</button>
          <button class="btn btn-danger">
        </div>
      </td>
    </tr>
  </tbody>
</table>
</div>
    <div class="col-md-6">
      <h3>Please Verify Information, If Correct Press DONE</h3><br>
      <label>Credit Card Number:</label><br>
      <input class="form-control" type="text" placeholder="Credit Card Number"/><br>
      <label>Credit Card Name:</label>
      <input class="form-control" type="text" placeholder="Credit Card Name"/><br>
      <label>Expiration Date:</label>
      <input class="form-control" type="text" placeholder="Credit Card Expiration Date"/><br>
      <label>Credit Card CVC:</label>
      <input class="form-control" type="text" placeholder="Credit Card CVC"/><br>
      <button class="btn btn-success btn-lg btn-block">DONE</button>
    </div>
</div>
</body>
</html>