@extends('layouts.app')
@section('title')
Editar {{trans('messages.publishes')}}
@endsection
@section('content')
 <div class="list-group">
    <form class="form-horizontal" action="{{route("publishes.update",$publish->id)}}" method="post">
             {{ csrf_field() }}
           <input type="hidden" name="_method" value="patch">  
         <div class="input-group">
               Slug <input type="text" class="form-control" name="slug" placeholder="slug" aria-describedby="basic-addon1" value="{{$publish->slug}}">
             </div>
            <div class="input-group">
               Label <input type="text" class="form-control" name="label" placeholder="label" aria-describedby="basic-addon1" value="{{$publish->label}}" >
             </div>
             <br/>
             <div >
                 Is Publish: <input type="radio" class="radio-inline"  name="is_publish" value="1" @if ($publish->is_publish==1) checked="checked" @endif> Si<input type="radio" name="is_publish" value="0" class="radio-inline" @if ($publish->is_publish==0) checked="checked" @endif> No
             </div>
             
             <div class="input-group">
                  <input type="submit" name="" class="btn btn-info pull-right" value="Editar">
             </div>
        </form>
</div>
@endsection
