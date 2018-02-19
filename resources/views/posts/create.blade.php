<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bears</title>


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <form class="form-horizontal" action="{{url("bears")}}" method="post">
                     {{ csrf_field() }}


                     <div class="input-group">
                       <input type="text" class="form-control" name="name" placeholder="name" aria-describedby="basic-addon1">
                     </div>

                     <div class="input-group">
                         @for ($i = 1; $i < 10; $i++)
                            <span class="input-group-addon">
                              <input type="radio" aria-label="..." name="danger_level" value="{{ $i}}">
                        </span> {{ $i}}

                         @endfor
                     </div>

                     <div class="input-group">
                          <input type="submit" name="" class="btn btn-info pull-right" value="Crear">
                     </div>

                </form>
            </div>
        </div>
    </body>
</html>
