@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 ">
            <div class="panel panel-default">
                <div class="panel-heading">Profile</div>

                <div class="panel-body">
                            <div class="col-md-8">
                                First Name <strong class="text-capitalize"> {{ $user->first_name }} </strong>
                            </div>
                            <div class="col-md-8">
                                Last Name <strong>{{ $user->last_name }} </strong>
                            </div>
                            <div class="col-md-8">
                                Email <strong>{{ $user->email }}  </strong>
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
