@extends('layouts.app')
@section('content')
<div class="row">
        <div class="col-md-12">


    <form method="post" action="{{ route('login_handle') }}" class="form-horizontal">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <div class="form-group ">
                 <label  for="email">
                    {{trans("app.email")}}
                    </label>
            <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="email" required="required" autofocus>
            @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div class="form-group ">
        <label  for="email">
                    {{trans("app.password")}}
                    </label>
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="footer">
                   <input class="btn btn-primary" type="submit" value="{{trans('app.Login')}}"/>
                   <a  href="{{url('forgot')}}"   class="btn btn-primary"  >{{trans('app.forgot_password')}}</a>

        </div>

    </form>
    </div>
    </div>
@endsection
