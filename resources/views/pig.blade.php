<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pig Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

</head>
<body>

<!-- Start Add Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ action('App\Http\Controllers\PigsController@store') }}" method="POST">
          {{csrf_field()}}
      <div class="modal-body">

 <div class="form-group">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Enter Pigs' Name" >
  </div>

  <div class="form-group">
    <label for="litter_size" class="form-label">Litter Size</label>
    <input type="text" class="form-control" name="litter_size" placeholder="Enter Litter Size" >
  </div>

  <div class="form-group">
    <label for="birth_weight" class="form-label">Birth Weight</label>
    <input type="text" class="form-control" name="birth_weight" placeholder="Enter Birth Weight" >
  </div>

  <div class="form-group">
    <label for="live" class="form-label">Live</label>
    <input type="text" class="form-control" name="live" placeholder="Enter Pigs' Live" >
  </div>

  <div class="form-group">
    <label for="weaning_weight" class="form-label">Weaning Weight</label>
    <input type="text" class="form-control" name="weaning_weight" placeholder="Enter Weaning Weight" >
  </div>

 </div>
 
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Record</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Add Modal -->

<!-- Start Edit Modal -->
<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="/pigs" method="POST" id="editForm">
          {{csrf_field()}}
          {{method_field('PUT')}}
      <div class="modal-body">

 <div class="form-group">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" name="name"  id="name" placeholder="Enter Pigs' Name" >
  </div>

  <div class="form-group">
    <label for="litter_size" class="form-label">Litter Size</label>
    <input type="text" class="form-control" name="litter_size"  id="litter_size" placeholder="Enter Litter Size" >
  </div>

  <div class="form-group">
    <label for="birth_weight" class="form-label">Birth Weight</label>
    <input type="text" class="form-control" name="birth_weight"  id="birth_weight" placeholder="Enter Birth Weight" >
  </div>

  <div class="form-group">
    <label for="live" class="form-label">Live</label>
    <input type="text" class="form-control" name="live" id="live" placeholder="Enter Pigs' Live" >
  </div>

  <div class="form-group">
    <label for="weaning_weight" class="form-label">Weaning Weight</label>
    <input type="text" class="form-control" name="weaning_weight"  id="weaning_weight" placeholder="Enter Weaning Weight" >
  </div>

 </div>
 
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update Record</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Edit Modal -->



<!-- Start Delete Modal -->
<div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="/pigs" method="POST" id="deleteForm">
          {{csrf_field()}}
          {{method_field('DELETE')}}
      <div class="modal-body">

      <input type="hidden" name="_method" value="DELETE">
      <p>Are You Sure?..You want to Delete Record</p>
      </div>
 
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Yes, Delete Record</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Delete Modal -->

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
   
            <a class="btn btn-info " href="{{ URL::to('/pigs-report') }}">Export to PDF</a>
      

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
        <a href="/pigshow" class="btn btn-primary" >View</a>
          <a href="#" class="btn btn-success edit">Edit</a>
          <a href="#" class="btn btn-danger delete" >Delete</a>
      </td>
    </tr>
      @endforeach
    
  </tbody>
</table>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" ></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>


<script type="text/javascript">
    $(document).ready( function() {

        var table=$('#datatable').DataTable();

        //start editing record
       table.on('click', '.edit', function(){
        $tr=$(this).closest('tr');
        if($($tr).hasClass('child')){
            $tr=$tr.prev('.parent');
        }
        var data=table.row($tr).data();
        console.log(data);

        $('#name').val(data[1]);
        $('#litter_size').val(data[2]);
        $('#birth_weight').val(data[3]);
        $('#live').val(data[4]);
        $('#weaning_weight').val(data[5]);
        
        $('#editForm').attr('action', '/pigs/'+data[0]);
        $('#editModal').modal('show');

       });
       //end Edit Record

       var table=$('#datatable').DataTable();

//start deleting record
table.on('click', '.delete', function(){
$tr=$(this).closest('tr');
if($($tr).hasClass('child')){
    $tr=$tr.prev('.parent');
}
var data=table.row($tr).data();
console.log(data);

$('#id').val(data[0]);

$('#deleteForm').attr('action', '/pigs/'+data[0]);
$('#deleteModal').modal('show');

});
//end delete Record

    })
</script>


</body>
</html>