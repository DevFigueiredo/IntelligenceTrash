@extends('layouts.structure')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/chart.js@2/dist/Chart.min.js"></script>
<script src="{{asset('/js/dashboard.js')}}"></script>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>
<div class="row justify-content-center d-flex">
<div class="h-25 w-25 mw-50 mh-50"> 
  <canvas id="horario" width="1" height="1" ></canvas>
  <script>
  var ctx = document.getElementById('horario').getContext('2d');
  var myChart = new Chart(ctx, {
      type: 'line',
      data: {
          labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
          datasets: [{
              label: 'Lixeiras cheias no total por horário',
              data: [7, 2, 3, 5, 2, 3],
              borderColor:'rgb(30,108,199)',
              borderWidth: 1
          }]
      },
      options: {
    
            scales: {
                ticks: {
                    max:1,
                    min:0,
                    stepSize:0,
                    precision:0
                }
            }
        }
  });
  </script>
</div>

<div class="h-25 w-25 mw-50 mh-50"> 
  <canvas id="regioes" width="1" height="1" ></canvas>
</div>

<div class="h-25 w-25 mw-50 mh-50"> 
  <canvas id="lixeiras" width="1" height="1" ></canvas>
</div>
</div>
  
@stop
