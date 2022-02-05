@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2 class="text-center">{{trans('app.Create_new_post')}}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('posts.index') }}"> {{trans('app.Back')}}</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger text-center">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('posts.store') }}" method="POST" class="form-horizontal">
    	@csrf


        <div class="form-group ">
        <label  for="title"> {{trans("app.Title")}} </label>
        <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="{{trans("app.Title")}}" required="required">
            @if ($errors->has('title'))
                <span class="text-danger text-left">{{ $errors->first('title') }}</span>
            @endif
        </div>

        <div class="form-group ">
        <label  for="title">{{trans("app.Blog")}} </label>
            <textarea class="form-control" style="height:150px" name="blog" placeholder="blog"></textarea>
            @if ($errors->has('blog'))
                <span class="text-danger text-left">{{ $errors->first('blog') }}</span>
            @endif
        </div>
        
        <div class="footer pull-right">
            <input class="btn btn-primary" type="submit" value="{{trans('app.Add')}}"/>
        </div>

    </form>


@endsection