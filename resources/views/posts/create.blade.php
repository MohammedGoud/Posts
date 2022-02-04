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


    <form action="{{ route('posts.store') }}" method="POST">
    	@csrf


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>{{trans('app.Title')}}:</strong>
		            <input type="text" name="title" class="form-control" placeholder="Post Title">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>{{trans('app.Blog')}}:</strong>
		            <textarea class="form-control" style="height:150px" name="blog" placeholder="blog"></textarea>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">{{trans('app.Add')}}</button>
		    </div>
		</div>


    </form>


@endsection