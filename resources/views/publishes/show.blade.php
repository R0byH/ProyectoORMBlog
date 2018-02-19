@extends('layouts.app')
@section('title')
Mostrar Publicacion
@endsection
@section('content')
<div class="">
  <div class="list-group">
    <div>slug: {{$publish->slug}} </div>
    <div>label: {{$publish->label}} </div>
    <div>is publish? {{$publish->is_publish}} </div>
  
  </div>
</div>
@endsection