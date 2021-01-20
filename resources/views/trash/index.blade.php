@extends('layouts.structure')


@section('content')

<div class="row">
  @foreach($trashes as $trash)
  <div class="col-sm-3 col-md-3 col-xs-3">

  @component('components.trash', [
    'idtrash'=>$trash["id_trash"],
    'name'=>$trash["trashes_name"],
    'latitude'=>$trash["trashes_latitude"],
    'longitude'=>$trash["trashes_longitude"],
    'capacity'=>$trash["trashes_supports"],
    'capacity_used'=>$trash["capacity_used"],
    'region'=>$trash["region_location"]
    ])
    @endcomponent
  
  </div>
  @endforeach

</div>

<br>
<hr>





<div class="table-responsive-sm">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">Região</th>
        <th scope="col">Capacidade</th>
        <th scope="col">Editar</th>
      </tr>
    </thead>
    <tbody>
      @foreach($trashes as $trash)
      <tr>
        <th scope="row">{{$trash['id_trash']}}</th>
        <td>{{$trash['trashes_name']}}</td>
        <td>{{$trash['region_location']}}</td>
        <td>{{$trash['trashes_supports']}}</td>
        <td><a href="/trash/edit/{{$trash['id_trash']}}"><i class="fa fa-edit" style="cursor:pointer;"></i></a></td>
      </tr>
     @endforeach
    </tbody>
  </table>
</div>
@endsection


