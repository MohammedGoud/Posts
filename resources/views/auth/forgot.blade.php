@extends('layouts.app')
@section('content')



<div class="row">
        <div class="col-md-12">

                    @if (Session::has('message'))
                         <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif

                      <form action="{{ route('forgot') }}" method="POST" class="form-horizontal">
                          @csrf
                          <div class="form-group">
                          <label  for="email"> {{trans("app.email")}} </label>
                                  <input type="text" id="email" class="form-control" name="email" required autofocus>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                          </div>

                          <div class="footer pull-right">
                           <input class="btn btn-primary" type="submit" value="{{trans('app.Send Password Reset Link')}}"/>
                         </div>
                    </form>
                  </div>
              </div>


@endsection
