@extends('layouts.app')
@section('title')
Crear {{trans('messages.publishes')}}
@endsection
@section('content')
 <div class="list-group">
    <form class="form-horizontal" action="{{url("publishes")}}" method="post">
             {{ csrf_field() }}
         <div class="input-group">
               Slug <input type="text" class="form-control" name="slug" placeholder="slug" aria-describedby="basic-addon1">
             </div>
            <div class="input-group">
               Label <input type="text" class="form-control" name="label" placeholder="label" aria-describedby="basic-addon1">
             </div>
             <br/>
             <div >
                 Is Publish: <input type="radio" class="radio-inline" name="is_publish" value="1"> Si<input type="radio" name="is_publish" value="0" class="radio-inline"> No
             </div>
             
             <div class="input-group">
                  <input type="submit" name="" class="btn btn-info pull-right" value="Crear">
             </div>
        </form>
</div>
@endsection
