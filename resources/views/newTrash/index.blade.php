@extends('layouts.structure')

@section('content')
<form method="post" action="/trash/creates">
    <div class="form-group row">
      <label for="inputName" class="col-sm-2 col-form-label">Nome</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="name" id="inputName" required>
      </div>
    </div>

    
    <div class="form-group row">
        <label for="inputLitigation" class="col-sm-2 col-form-label">Litragem</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="supports" id="inputLitigation" placeholder="Ex: 35" required>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputLatitude" class="col-sm-2 col-form-label">Latitude</label>
        <div class="col-sm-10">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="text" class="form-control" name="latitude" id="inputLatitudade" required>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputLongitude" class="col-sm-2 col-form-label">Longitude</label>
        <div class="col-sm-10">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="text" class="form-control" name="longitude" id="inputLongitude" required>
        </div>
      </div>
      
    <div class="form-group row">
        <label for="inputRegion" class="col-sm-2 col-form-label">Região</label>
        <div class="col-sm-10">
          <div class="mb-3">
            <div class="input-group is-invalid">
              
              <select class="custom-select" name="region" id="validatedInputGroupSelect" required>
                <option value="">Escolha a região...</option>
                <option value="1">Sul</option>
                <option value="2">Norte</option>
                <option value="3">Leste</option>
                <option value="4">Oeste</option>
              </select>
            </div>
          </div>
        </div>
         <button class="btn btn-primary" type="submit">Cadastrar Lixeira</button>
       
       


        
    </div>
   



    
  </form>
  
  @stop
