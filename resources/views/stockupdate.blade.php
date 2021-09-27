<?php
use \Carbon\Carbon;
$date=Carbon::now();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <title>Update Stock</title>
</head>
<body>
<h1>Stock Records Model</h1>
        @if(count($errors)>0)
        
        <div class="alert alert-danger">
           <ul>
               @foreach($errors->all() as $error)
               <li>{{$error}}</li>
               @endforeach
           </ul>
        </div>
        @endif

        @if(\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success')}}</p>
        </div>
        @endif
<form class="row g-3" action="{{ action('App\Http\Controllers\StockController@store') }}" method="POST">
          {{csrf_field()}} 
         
 <!-- <div class="col-auto" style="background-color:grey">
    <label for="Stock" class="visually-hidden">In Stock</label>
    @foreach($stocks as $stockdata)
    <input type="text" readonly class="form-control-plaintext"  value="{{$stockdata->amount}}"  style="background-color:white">
    @endforeach
  </div>-->

  <input type="hidden" value="{{$stockdata->id}}" name="id">

  <div class="col-auto">
    <label for="Feed Name" class="visually-hidden">Feed Name</label>
    <input type="feed_name" class="form-control" name="feed_name" value="<?php echo $stockdata->feed_name ?>" placeholder="Feed Name">
  </div>
  <div class="col-auto">
    <label for="Amount" class="visually-hidden">Amount</label>
    <input type="amount" class="form-control" value="<?php echo $stockdata->amount ?>" name="amount" placeholder="amount">
  </div>

  <div class="col-auto">
    <label for="Date" class="visually-hidden">Date</label>
  <input type="text" class="form-control" name="date"  value="<?php echo $date->toRfc850String();?>"placeholder="Select Date">

  
  </div>

  <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">Add Stock</button>
  </div>

</form>


 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript">
  $(function () {
    $('#datetimepicker').datepicker({
      viewMode: 'years'
    });
  });
 </script>
    
</body>
</html>
