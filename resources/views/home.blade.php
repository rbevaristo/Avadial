@extends('layouts.app')
@section('styles')
<style>
    .btn-size {
        width: 100px;
        height: 100px;
        padding: 5px;
    }
</style>
@endsection
@section('content')
<div class="container-fluid">
    @include('components.messages')
    @include('components.sidebar')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <span class="float-right">
                        <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#exampleModalCenter">Add</button>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            @foreach(\App\Category::all() as $category)
            <div class="card">
                <div class="card-header">
                    {{ $category->name }}
                </div>
                <div class="card-body">
                    @forelse($category->audios as $audio)
                    <div class="col-md-3">
                        <button type="button" class="btn-md btn-size btn-info" data-info="{{$audio}}" id="not-playing" data-toggle="tooltip" title="{{$audio->content}}" data-placement="bottom">
                            <i class="fa fa-play"></i><br>
                            {{$audio->tagname}}
                        </button>
                    </div>
                    
                    @empty
                    <p>No Item</p>
                    @endforelse
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@include('components.modal')
@endsection
@section('scripts')
<script src="{{ asset('js/custom.js') }}"></script>
@endsection