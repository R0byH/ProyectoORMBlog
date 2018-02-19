@extends('layouts.app')
@section('title')
<?php $post=App\Post::get()->find($id);?>
{{$post->languages()->where('iso6391',App::getLocale())->first()->pivot->title}}
@endsection
@section('content')
 <div class="list-group">
     
     {{$post->languages()->where('iso6391',App::getLocale())->first()->pivot->content}}
    <form class="form-horizontal" action="{{route("comments.store")}}" method="post">
             {{ csrf_field() }}
         <div class="input-group">
               comment <input type="text" class="form-control" name="comment" placeholder="comment" aria-describedby="basic-addon1" >
             </div>
             <input type="hidden" name="id_post" value="{{$id}}">
             <div class="input-group">
                  <input type="submit" name="" class="btn btn-info pull-right" value="Crear">
             </div>
        </form>
</div>
@endsection
