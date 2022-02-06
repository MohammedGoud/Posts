@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>{{trans('app.Posts')}}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('posts.create') }}"> {{trans('app.Create_new_post')}}</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success text-center">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>{{trans("app.No")}}</th>
            <th>{{trans('app.Title')}}</th>
            <th>{{trans('app.Username')}}</th>
            <th>{{trans('app.Blog')}}</th>
            <th width="280px">{{trans('app.Actions')}}</th>
        </tr>
	    @foreach ($posts as $post)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $post->title }}</td>
            <td> <a href="{{url('posts?user_id='.$post->user_id)}}">{{ $post->user->name }} </a> </td>
	        <td>{{ $post->blog }}</td>
	        <td>
                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                    @if($post->user_id == auth()->id()  )
                     <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">{{trans('app.Edit')}}</a>
                    @endif

                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">{{trans('app.Delete')}}</button>
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


@endsection
