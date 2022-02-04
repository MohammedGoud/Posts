<!DOCTYPE html>
<html>
<head>
	<title>{{trans('app.Posts Application')}}</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
<style>
</style>
</head>

<body>

<div class="container" style="margin-top: 20px;">

<div class="pull-left" style="margin-bottom: 20px;">

                @if(\Session::get('locale') == 'en' || \Session::get('locale') == '')
                                <a class="btn" href="{{ url('locale/ar') }}"  ><i class="fa fa-language"></i> {{trans('app.AR')}}</a>
                            @else
                                <a class="btn" href="{{ url('locale/en') }}" ><i class="fa fa-language"></i> {{trans('app.EN')}}</a>
                        @endif


        @auth
        {{auth()->user()->name}}
        <div class="text-end">
          <a href="{{ route('logout_handle') }}" class="btn btn-outline-light me-2">Logout</a>
        </div>
      @endauth


      @guest
        <div class="text-end">
          <a href="{{ url('login') }}" class="btn btn-outline-light me-2">Login</a>
          <a href="{{ url('register') }}" class="btn btn-warning">Sign-up</a>
        </div>
      @endguest

            </div>
    @yield('content')
</div>

</body>
</html>
