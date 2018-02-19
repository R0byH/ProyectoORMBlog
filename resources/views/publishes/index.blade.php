@extends('layouts.app')
@section('title')
{{trans('messages.publishes')}}
@endsection
@section('content')

@foreach ($publishes as $publish)
  <div class="list-group">
    <div class="list-group-item">
    <div>slug <span class="badge">{{ $publish->slug}}</span></div>
    <div>label {{ $publish->label}} </div>
    <p>is publishs {{ $publish->is_publish}}
      @if (!Auth::guest())  
            <a href="{{ route('publishes.edit',$publish) }}" class="btn btn-default" style="float: right">Edit Publish</a>
            @endif
    
    </p>
    </div>
  </div>
@endforeach
      @if (!Auth::guest())  
      <a href="{{ route('publishes.create')}}" class="btn btn-default" >Create Publish</a>
            
      @endif
      
@endsection

