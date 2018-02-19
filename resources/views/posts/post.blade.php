@extends('layouts.app')
@section('title')
{{ $post->languages()->where('iso6391',App::getLocale())->first()->pivot->title }}
@endsection
@section('content')
<div class="">
  <div class="list-group">
      <?php $photos=$post->photos()->get();  ?>
        <div class="list-group-item">
        @foreach ($photos as $photo)
          <img  src="{{ asset('/images/') }}/{{ $photo->filename }}"> 
        @endforeach 
        </div>
    <div class="list-group-item">
{{ $post->languages()->where('iso6391',App::getLocale())->first()->pivot->content }}

    </div>
      Coments
      <?php $comments=$post->comments()->get();?>
      <ul>
      @foreach ($comments as $comment)
      <li> {{$comment->comment}}
      {{ $post->created_at->format('M d,Y \a\t h:i a') }} By <a href="{{ route('user',$comment->autor_id)}}">{{ $comment->author->name }}</a> 
      @if ( $comment->autor_id==Auth::id())   
      | <a href="{{ route('comments.edit',$comment)}}" >Edit</a> | 
      <form  action="{{ route('comments.destroy',$comment)}}" method="post" style="display: inline">
            <input type="hidden" name="_method" value="delete">
            <input type="submit" name="" style="display: inline" class="btn-link" value="Eliminar">
      {{ csrf_field() }}
      </form>
      @endif
      </li>
      @endforeach        
      </ul>  
      @if (!Auth::guest())
       <a href="{{ route('comments.create',$post)}}" style="float: left" class="btn  btn-default" >Add Comment</a></button>
      @endif
  </div>
</div>
@endsection