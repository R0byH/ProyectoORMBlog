@extends('layouts.app')
@section('title')
{{$comment->post->languages()->where('iso6391',App::getLocale())->first()->pivot->title}}
@endsection
@section('content')
 <div class="list-group">
     
     {{$comment->post->languages()->where('iso6391',App::getLocale())->first()->pivot->title}}
    <form class="form-horizontal" action="{{route("comments.update",$comment)}}" method="post">
             {{ csrf_field() }}
               <input type="hidden" name="_method" value="patch">
         <div class="input-group">
               comment <input type="text" class="form-control" name="comment" placeholder="comment" aria-describedby="basic-addon1" value="{{$comment->comment}}" >
             </div>
           
             <div class="input-group">
                  <input type="submit" name="" class="btn btn-info pull-right" value="Editar">
             </div>
        </form>
</div>
@endsection


