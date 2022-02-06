@extends('layouts.app')
@section('content')
<div class="row">
        <div class="col-md-12">
                    @if (Session::has('message'))
                         <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                      <form action="{{ route('handle_reset_password') }}" method="POST" class="form-horizontal">
                          @csrf
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

                          <div class="footer pull-right">
                           <input class="btn btn-primary" type="submit" value="{{trans('app.Send Password Reset Link')}}"/>
                         </div>
                    </form>
                  </div>
              </div>


@endsection
