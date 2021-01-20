@extends('layouts.structure')

@section('content')
<form method="GET" action="/trash/edit/{{$trashInfo[0]['id_trash']}}">
    <div class="form-group row">
      <label for="inputName" class="col-sm-2 col-form-label">Nome</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="name" id="inputName" value="{{$trashInfo[0]['trashes_name']}}" disabled>
      </div>
    </div>

    
    <div class="form-group row">
        <label for="inputLitigation" class="col-sm-2 col-form-label">Litragem</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="supports" id="inputLitigation" placeholder="Ex: 35" value="{{$trashInfo[0]['trashes_supports']}}" disabled>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputLitigation" class="col-sm-2 col-form-label">Litragem Atual</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="supports" id="inputLitigation" value="{{$trashInfo[0]['capacity_used']}}" disabled>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputLatitude" class="col-sm-2 col-form-label">Latitude</label>
        <div class="col-sm-10">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="text" class="form-control" name="latitude" id="inputLatitudade" value="{{$trashInfo[0]['trashes_latitude']}}" disabled>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputLongitude" class="col-sm-2 col-form-label">Longitude</label>
        <div class="col-sm-10">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="text" class="form-control" name="longitude" id="inputLongitude" value="{{$trashInfo[0]['trashes_longitude']}}" disabled>
        </div>
      </div>

      
    <div class="form-group row">
        <label for="inputRegion" class="col-sm-2 col-form-label">Região</label>
        <div class="col-sm-10">
          <div class="mb-3">
            <div class="input-group is-invalid">
              
              <select class="custom-select" name="region" id="validatedInputGroupSelect" disabled>
                
              <option value="{{$trashInfo[0]['id_region']}}">{{$trashInfo[0]['region_name']}}</option>
                 
                @foreach ($regions as $item)
                @if ($item['id_region']!=$trashInfo[0]['id_region'])
                <option value="1">{{$item['name']}}</option>                    
                @endif
                @endforeach
              
              </select>
            </div>
          </div>
        </div>
         <button class="btn btn-primary" type="submit">Editar Dados</button>
       
       


        
    </div>
   



    
  </form>
  
  @endsection
