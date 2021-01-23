@extends('layouts.structure')


@section('content')

<style>#mapid { height: 450px; }</style>
<div class="row">
<div class="col">

<div id="mapid"></div>

</div>
</div>

<script src="{{asset('/js/trashes_list.js')}}"></script>

@endsection


