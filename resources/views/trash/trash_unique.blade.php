@extends('layouts.structure')


@section('content')

<div class="container">
    <div style="float:left;">
        <div class="card text-center">
        <div class="card-header">
            <b>{{$trash['trash_name']}}</b>
        </div>
        <div class="card-body justify-content-start">
            <h5 class="card-title">Informações</h5>
            <label><b>Endereço: </b></label>
            <span> {{$trash['trash_address']}}</span>
            </br>
            <label"><b>Capacidade: </b></label>
            <span"> {{$trash['trash_capacity_used']}}/{{$trash['trash_max_support']}}L</span>
            </br>
            <label"><b>Região: </b></label>
            <span"> {{$trash['regiao']}}</span>
            </br>
            <label"><b>Organização: </b></label>
            <span"> {{$trash['organizacao']}}</span>
            </br>
        </div>
        <div class="card-footer text-muted">
            {{$trash['created_at']}}
        </div>
        </div>
    </div>
    <div>
        <div class="row">
        <div class="col">

        <div id="mapid" style="height: 60vh;"></div>

        </div>
        </div>
    </div>
</div>
<hr>
<div class="d-flex justify-content-center">
    <button class="btn btn-primary"> Gráficos </button>
    <button class="btn btn-primary ml-4"> Histórico </button>
</div>


<div style="display: none; margin-top: 10px;">
    AEEEEEEEEEEEEEEEEEEEE CARAIO
</div>

<div style="display: block; margin-top: 10px;">
    Mostra esse
</div>

<script>
ready = (callback) => {
    if (document.readyState != "loading") callback();
    else document.addEventListener("DOMContentLoaded", callback);
}
ready(() => {
//Importando a biblioteca do Maps
var map = L.map('mapid').setView([{{$trash['trash_latitude']}}, {{$trash['trash_latitude']}}], 15);


//Link da APi que retorna a renderização do mapa
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

//Aqui estou definindo algumas regras para o icone que irá aparecer no mapa
var LeafIcon = L.Icon.extend({
    options: {
        iconSize:     [48, 45],
        shadowSize:   [50, 64],
        iconAnchor:   [22, 94],
        shadowAnchor: [4, 62],
        popupAnchor:  [-3, -76]
    }
});

L.marker([{{$trash['trash_latitude']}}, {{$trash['trash_latitude']}}])
.addTo(map)
.bindPopup("<b>Hello world!</b><br>I am a popup.")
.openPopup();

})
</script>










@endsection