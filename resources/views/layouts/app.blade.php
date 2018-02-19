<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Proyecto ORM Cesar Herbas</title>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!--<a class="navbar-brand" href="#">Blog</a>-->
        </div>        
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li>
              <a href="{{ url('/') }}">{{trans('messages.home')}}</a>
            </li>
             <li>
              <a href="{{ route('publishes.index') }}">{{trans('messages.publishes')}}</a>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{trans('messages.language')}}:{{App::getLocale()}} <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                 <?php $languages=App\Models\Language::get(); ?> 
                @foreach ($languages as $language)
                <li>
                  <a href="{{ route('cambiaridioma',$language->iso6391) }}">{{$language->iso6391.' | '.$language->label}}</a>
                </li>
                @endforeach
                
              </ul>
            </li>  
            @if (Auth::guest())
            <li>
              <a href="{{ route('login') }}">{{trans('messages.login')}}</a>
            </li>
            <li>
              <a href="{{ route('register') }}">{{trans('messages.register')}}</a>
            </li>
            @else
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li>
                  <a href="{{ url('/new-post') }}">Add new post</a>
                </li>
                <li>
                  <a href="{{ route('user-post',Auth::id()) }}">My Posts</a>
                </li>
                
                <li>
                  <a href="{{ route('user',Auth::id()) }}">My Profile</a>
                </li>
                <li>
                  <a href="{{ route('logout') }}">Logout</a>
                </li>
              </ul>
            </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      @if (Session::has('message'))
      <div class="flash alert-info">
        <p class="panel-body">
          {{ Session::get('message') }}
        </p>
      </div>
      @endif
      @if ($errors->any())
      <div class='flash alert-danger'>
        <ul class="panel-body">
          @foreach ( $errors->all() as $error )
          <li>
            {{ $error }}
          </li>
          @endforeach
        </ul>
      </div>
      @endif
      <div class="row">
        <div class="col-md-9 ">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2>@yield('title')</h2>
              @yield('title-meta')
            </div>
            <div class="panel-body">
              @yield('content')
            </div>
          </div>
         </div>    
        <div class="col-md-3 ">    
            <div class="panel panel-default">
            <div class="panel-heading">
              <h4>{{trans('messages.categories')}}</h4>
              
            </div>
                <div class="panel-body">
                   <?php $categories=App\Models\Category::get()?>
                    <ul>
                        <li><a href="{{ url('/') }}">Todas las categorias</a></li>     
                   @foreach ($categories as $category)
                   <li><a href="{{ route('category-post',$category->language(App::getLocale())->first()->pivot->slug) }}">{{ $category->language(App::getLocale())->first()->pivot->label }}</a></li>
                   @endforeach
                    </ul>
                </div>
            </div>   
             <div class="panel panel-default">
            <div class="panel-heading">
              <h4>{{trans('messages.publishes')}}</h4>
              
            </div>
                <div class="panel-body">
                   <?php $publishes=App\Models\Publish::get()?>
                    <ul>
                        <li><a href="{{ url('/') }}">Todas las publicaciones</a></li>     
                   @foreach ($publishes as $publish)
                   <li> @if ($publish->is_publish==1  ) 
                       <a href="{{ route('publish-post',$publish->id) }}">{{ $publish->label }}   </a>
                       @else
                       {{ $publish->label }} 
                       @if (!Auth::guest())
                       <a href="{{route('publishes.edit',$publish)}}">(No Publicado)</a>
                       @else
                       (No Publicado)
                       @endif
                       @endif
                   </li>
                   @endforeach
                    </ul>
                </div>
            </div>  
        </div>
       
      </div>
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <p>Copyright © 2018 | </p>
        </div>
      </div>
    </div>
    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>