@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2 class="text-center">{{trans('app.Edit_post')}}</h2>
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


    <form action="{{ route('posts.update',$post->id) }}" method="POST">
    	@csrf
        @method('PUT')
        <input type="hidden" value="{{ $post->id }}" name="id" >
        <div class="form-group ">
        <label  for="title"> {{trans("app.Title")}} </label>
        <input type="text" class="form-control" name="title" value="{{ $post->title }}" placeholder="{{trans("app.Title")}}" required="required">
            @if ($errors->has('title'))
                <span class="text-danger text-left">{{ $errors->first('title') }}</span>
            @endif
        </div>


        <div class="form-group ">
        <label  for="title">{{trans("app.Blog")}} </label>
            <textarea class="form-control" style="height:150px" name="blog" placeholder="blog">{{ $post->blog }}</textarea>
            @if ($errors->has('blog'))
                <span class="text-danger text-left">{{ $errors->first('blog') }}</span>
            @endif
        </div>


        

        <div class="footer">
            <input class="btn btn-primary" type="submit" value="{{trans('app.Edit')}}"/>
        </div>


    </form>


@endsection
