@extends('layouts.app')
@section('title')
{{$title}}
@endsection
@section('content')
<div class="">
  @foreach( $posts as $post )
  <?php //dd($post->publish->is_publish)?>
    @if ($post->publish->is_publish==1)  
  <div class="list-group">
      
    <div class="list-group-item">
      <h3><a href="{{ route('posts.show',$post) }}">{{ $post->languages()->where('iso6391',App::getLocale())->first()->pivot->title }}</a>
       @if ( $post->autor_id==Auth::id())   
          <a href="{{ route('publishes.edit',$post->id)}}" class="btn btn-default" style="float: right">Edit Post</a>
       @endif
      
      </h3>
        <?php $photos=$post->photos()->get();  ?>
        <div>
        @foreach ($photos as $photo)
           <img  src="{{ asset('/images/') }}/{{ $photo->filename }}"> 
        @endforeach 
        </div>
        {{$post->languages()->where('iso6391',App::getLocale())->first()->pivot->content}}
      <p>{{ $post->created_at->format('M d,Y \a\t h:i a') }} By <a href="{{ route('user',$post->autor_id)}}">{{ $post->author->name }}</a>
      {{trans('messages.comments')}}->{{$post->comments()->count()}} </p>
    </div>
    
    <div class="list-group-item">
      <article>
        {!! str_limit($post->body, $limit = 1500, $end = '....... <a href='.url("/".$post->languages()->first()->pivot->slug).'>Read More</a>') !!}
      </article>
    </div>
  </div>
  @endif
  @endforeach
   <a href="{{ route('posts.create')}}" class="btn btn-default" >Add Post</a>
</div>
@endsection