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


    <title>Stock Management</title>
</head>
<body>
<h4>Stock records</h4>
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


  <div class="col-auto">
    <label for="Feed Name" class="visually-hidden">Feed Name</label>
    <input type="feed_name" class="form-control" name="feed_name" placeholder="Feed Name">
  </div>
  <div class="col-auto">
    <label for="Amount" class="visually-hidden">Amount</label>
    <input type="amount" class="form-control" name="amount" placeholder="amount">
  </div>

  <div class="col-auto">
    <label for="Dat" celass="visually-hidden">Date</label>
    <input type="date" class="form-control" name="date" placeholder="Select Date">
    <div class='input-group date' name='date' id='datetimepicker'>
            <span class="input-group-addon">
              <span class="glyphicon glyphicon-calendar"></span>
            </span>
            </div>
  </div>

  <div class="col-auto" style="margin-top: 30px;">
    <button type="submit" class="btn btn-success mb-3">Add Stock</button>
  </div>

   <div class="col-auto" style="margin-top: 30px;">
    <a  class="btn btn-primary mb-3" href="{{ URL::to('/reduceStock/{id}') }}">Update Stock</a>
  </div>

   <div class="col-auto" style="margin-top: 30px;">
    <a  class="btn btn-dark mb-3" href="{{ URL::to('/stock-report') }} " style="background-color: purple;">Export PDF</a>
  </div>
</form>

<table id="datatable" class="table table-red table-striped">
  <thead>
    <tr class="bg-primary">
      <th scope="col">Id</th>
      <th scope="col">Feed Name</th>
      <th scope="col">Amount</th>
      <th scope="col">Date</th>
   
    </tr>
  </thead>
  <tfoot>
    <tr class="bg-primary">
      <th scope="col">Id</th>
      <th scope="col">Feed Name</th>
      <th scope="col">Amount</th>
      <th scope="col">Date</th>
     
    </tr>
  </tfoot>
  <tbody>
      @foreach($stocks as $stockdata)
    <tr >
      <th >{{$stockdata->id}}</th>
      <td >{{$stockdata->feed_name}}</td>
      <td>{{$stockdata->amount}}</td>
      <td>{{$stockdata->date}}</td>
    
      </td>
    </tr>
      @endforeach
    
  </tbody>
</table>

 
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
