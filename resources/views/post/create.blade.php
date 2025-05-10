@extends('layouts.MAIN')

@section('title') Create @endsection
@section('content')
    <form >
        <div class="form-group mb-3">
            <label for="title" >Title</label>
            <input type="text" class="form-control" id="title"  placeholder="title">
        </div>
        <div class="form-group mb-3">
            <label for="content" >Content</label>
            <textarea  id="content" class="form-control"  placeholder="content"></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="image" >Image</label>
            <input type="text"  class="form-control" id="image"  placeholder="image">
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-primary mb-3">Submit</button>
        </div>
    </form>
@endsection
