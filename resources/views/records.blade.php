<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pig Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" >


</head>
<body>



<div class="container">
        <h1>Pig Records Model</h1>
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

        <div class="d-flex justify-content-between">
        <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
   Enter Pig Records
    </button>
    
    <!--Export Records Button-->
   
            <a class="btn btn-info " href="{{ URL::to('/pigs/pdf') }}">Export to PDF</a>
      

        </div>
    <br>
    <hr>

    <table id="datatable" class="table table-red table-striped">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Litter Size</th>
      <th scope="col">Birth Weight</th>
      <th scope="col">Live</th>
      <th scope="col">Weaning Weight</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Litter Size</th>
      <th scope="col">Birth Weight</th>
      <th scope="col">Live</th>
      <th scope="col">Weaning Weight</th>
      <th scope="col">Action</th>
    </tr>
  </tfoot>
  <tbody>
      @foreach($pigs as $pigdata)
    <tr>
      <th>{{$pigdata->id}}</th>
      <td>{{$pigdata->name}}</td>
      <td>{{$pigdata->litter_size}}</td>
      <td>{{$pigdata->birth_weight}}</td>
      <td>{{$pigdata->live}}</td>
      <td>{{$pigdata->weaning_weight}}</td>
      <td> 
          <a href="#" class="btn btn-success edit">Edit</a>
          <a href="#" class="btn btn-danger delete" >Delete</a>
      </td>
    </tr>
      @endforeach
    
  </tbody>
</table>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" ></script>





</body>
</html>