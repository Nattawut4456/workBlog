<?php
    $isCreate = empty($blog->id);
    $title = $isCreate ? 'Write your Blog' : 'Edit Blog';
?>
<style>
    .textarea {
        border: 1px solid #ccc;
        font-family: inherit;
        font-size: 25px;
        padding: 1px 6px;
        min-height: 500px;
        display: block;
        width: 100%;
        overflow: hidden;
        resize: both;
        line-height: 20px;
    }
</style>
@extends('master')
@section('title',$title)

@section('content')
<h2>{{$title}}</h2>
<div class="bg-white p-3 mt-5 rounded">

    <form action="{{ $isCreate ? url('/blog/store') : url('/blog/update/'.$blog->id)}}" method="POST" enctype="multipart/form-data">
        @if (!$isCreate)
            @method('put')
        @endif
        @csrf
        @if (!$isCreate)
            <div class="mb-5" style="text-align: center">
                <img class="mb-3" src="{{asset('storage/images/'.$blog->image_name)}}" height="300px"/>
                <div style="text-align: center">
                    <div>
                        <h5>Select image to change</h5>
                        <input type="file" name="image"/>
                    </div>
                    
                </div>
            </div>
        @else
        <div style="float: right">
            <h5>Add cover image</h5>
            <input type="file" name="image"/>
            @error('image')
            <div class="invalid-feedback d-block"><h6>{{ $errors->first('image') }}</h6></div>
            @enderror
        </div>
        @endif
        

        

        <h5>Topic</h5>
        <input type="text" name="topic" class="form-control w-50 mb-3" style="font-size: 25px" value="{{old('topic',$blog->topic)}}">
        @error('topic')
            <div class="invalid-feedback d-block"><h6>{{ $errors->first('topic') }}</h6></div>
        @enderror
        <div>
            <label ><h5>Choose Category : </h5></label>
            <select class="form-control w-25 d-inline" style="background-color: #fafafa" name="category">
                @foreach ($cats as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
              </select>
        </div>
        <h5 class="mt-3">Content</h5>
        <textarea class="form-control w-100" style="min-height: 500px; font-size: 20px" name="content" >{{old('content')}}</textarea>
        @error('content')
            <div class="invalid-feedback d-block"><h6>{{ $errors->first('content') }}</h6></div>
        @enderror
        <button class="d-block mx-auto mt-3 btn btn-primary btn-lg" type="submit">{{$isCreate ? 'Create Blog' : 'Save'}}</button>
    </form>
</div>

@endsection
