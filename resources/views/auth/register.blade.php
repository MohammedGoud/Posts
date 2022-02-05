@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-md-12">


        
    <form method="post" action="{{ route('register_handle') }}" class="form-horizontal">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <div class="form-group">
                    <label  for="email">
                    {{trans("app.email")}}
                    </label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="name@example.com" required="required" autofocus>
                    @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                 @endif
        </div>


        <div class="form-group">
                    <label  for="name">
                    {{trans("app.name")}}
                    </label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="" required="required" autofocus>
                    @if ($errors->has('name'))
                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                 @endif
        </div>



        <div class="form-group">
                    <label for="password">
                    {{trans("app.password")}}
                    </label>
                    <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="" required="required" autofocus>
                    @if ($errors->has('password'))
                    <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                 @endif
        </div>




        <div class="form-group">
                    <label for="password_confirmation">
                    {{trans("app.password_confirmation")}}
                    </label>
                    <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="" required="required" autofocus>
                    @if ($errors->has('password_confirmation'))
                <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                 @endif
        </div>


              <div class="footer">
                   <input class="btn btn-primary" type="submit" value="{{trans('app.Register')}}"/>
               </div>

    </form>
    </div>
    </div>
@endsection
