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

                <a class="btn" href="{{ url('posts') }}"> {{trans('app.Posts')}}</a>
                <a class="btn" href="{{ url('users') }}"> {{trans('app.Users')}}</a>
                @if(\Session::get('locale') == 'en' || \Session::get('locale') == '')
                                <a class="btn" href="{{ url('locale/ar') }}"  ><i class="fa fa-language"></i> {{trans('app.AR')}}</a>
                            @else
                                <a class="btn" href="{{ url('locale/en') }}" ><i class="fa fa-language"></i> {{trans('app.EN')}}</a>
                        @endif    

            </div>
    @yield('content')
</div>

</body>
</html>
