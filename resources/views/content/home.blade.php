@extends('master')

@section('content')

<div class="bg-primary rounded py-2 px-4 mb-3">
    <div style="display: inline-block"><h2 class="mt-3 mb-4 text-white">All Blogs</h2></div>
    <input type="text" class="form-control mt-4" style="width: 400px; float: right;" placeholder="Seach?">
</div>



@foreach ($blogs as $blog)
<div class="bg-white p-3 rounded-3 mb-5 d-flex flex-row" style="max-height: 300px;">
    <div style="width: 20%; max-height: 300px; display: block; overflow: hidden;">
        <img src="{{asset("storage/images/".$blog->image_name)}}" width="100%" height="" alt="">
    </div>
    <div style="width: 80%">
        <a href="#" style="float: right; font-size: 30px"><i class="bi-heart"></i></a>
        <a href="{{url('/blog/edit/'.$blog->id)}}" style="float: right; font-size: 30px"><i class="bi-pencil mx-3"></i></a>
        <div><h2 style="word-wrap: break-word;" class="mb-3 mx-4">{{$blog->topic}}</h2></div>
        <div class="d-inline mx-3"><span><i class="bi-calendar"></i> {{$blog->last_update}}</span></div>
        <div class="d-inline mx-3"><span><i class="bi-folder"></i>  </span></div>
        <div class="d-inline mx-3"><span><i class="bi-chat-left-text"> 5 Comment</i></span></div>
    
        <div class="mx-5 my-3" style="font-size: 20px; color: #888; max-height: 90px; word-wrap: break-word; text-overflow: ellipsis; overflow: hidden;">{{$blog->content}}</div>
        <div class="mx-5"><a class="text-decoration-none" style="font-weight: bold" href="#">See more</a></div>
    </div>
    

</div>
@endforeach

@endsection
@section('writeblog')
<a role="button" href="{{url('/create')}}" style="font-size: 20px; background-color: #22a" class="text-white text-decoration-none py-2 px-3 rounded">+ Write your blog</a>
@endsection
