<!--<div class="card">
            <div class="card-body">
                <h5 class="card-title">Lixeira - {{$name}} <a href="/trash/{{$idtrash}}"><i class="fa fa-edit" style="margin-left: 1vh;float: right;color: blue;cursor:pointer;"></i></a></h5>
            <p class="card-text"></p>
            <a href="/region/{{$region}}" class="btn btn-primary">Localizar</a>
            <footer class="blockquote-footer">Capacidade: {{$capacity}}L</footer>
            </div>
        -->
            <div class="card" style="width: 18rem; margin-bottom: 10px">
                <div class="card-body">
                    @if($capacity_used >= $capacity)
                    <h5 class="card-title"><a href="/trash/info/{{$idtrash}}" style="color: black;"> Lixeira - {{$name}} <i class="fa fa-circle" style="margin-left: 1vh;float: right;color: red;cursor:pointer;"></i></a></h5>
                   @else
                   <h5 class="card-title"><a href="/trash/info/{{$idtrash}}" style="color: black;">Lixeira - {{$name}} <i class="fa fa-circle" style="margin-left: 1vh;float: right;color: green;cursor:pointer;"></i></a></h5>
                  @endif
                  <footer class="footer" style="font-size: 12px">Capacidade: {{$capacity}}L</footer>
                  @if($capacity_used!=0)
                  <footer class="footer" style="font-size: 12px">Utilização: {{$capacity_used}} L</footer>
                  @else
                  <footer class="footer" style="font-size: 12px">Utilização: 0 L</footer>

                  @endif
                  <a target="__blank" href="http://www.google.com/maps/dir/?api=1&destination={{$latitude}},{{$longitude}}" style="color: black;">Localizar</a>

            <!--            <p class="card-text">
                .</p>
            <a href="/region/{{$region}}" class="btn btn-primary">Localizar</a>
            <footer class="blockquote-footer">Capacidade: {{$capacity}}L</footer>
            <footer class="blockquote-footer">Utilização: 
                @if ($capacity_used!=0)
                    {{$capacity_used}}
                @else
                    0
                @endif
                L</footer>
-->
                </div>
              </div>