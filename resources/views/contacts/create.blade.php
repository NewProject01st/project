
<div class="container pt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-9 border shadow p-3 mb-5 bg-body rounded" style="border:1px solid red">
<div class="card">
  <div class="card-header">Contact</div>
  <div class="card-body">
      
      <form action="{{ url('contact') }}" method="post">
        {!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control">
      
      </br>
        <label>Address</label></br>
        <input type="text" name="address" id="address" class="form-control"></br>
        <label>Mobile</label></br>
        <input type="text" name="mobile" id="mobile" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
</div>
</div>
</div>

