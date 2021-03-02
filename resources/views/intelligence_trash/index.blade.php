@extends('layouts.structure')


@section('content')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.11.6/xlsx.core.min.js"></script>
  <script src="https://cdn.jsdelivr.net/alasql/0.3/alasql.min.js"></script>
 <script src="{{asset('/js/trash_list_filters.js')}}"></script>

<div class="d-flex justify-content-center">
    <h2>Intelligence Trash</h2>
</div>
<hr>

<div class="container-fluid">
  <div class="row">
   <div class="col-md-12">
    <div class="custom-control custom-checkbox">
      <div>
        <input type="checkbox" class="custom-control-input" id="customCheck1">
        <label class="custom-control-label" for="customCheck1"><b>ID</b></label>
      </div>
      <div>
        <input type="checkbox" class="custom-control-input" id="customCheck2">
        <label class="custom-control-label" for="customCheck2"><b>ID</b></label>
      </div>
  
    
    </div>
    
    
    
    
    </div>
  
  
  
  
  </div>


</div>

@endsection


