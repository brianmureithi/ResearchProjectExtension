@extends('back-end.layout.template')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">

 <!--start of card -->
 @foreach ($showpost as $post)
     
 
 <div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            @if(Session::get('success-post'))
            <div class="alert alert-success">
                {{ Session::get('success-post')}}
            </div>
            
                        @endif
                        @if(Session::get('fail-post'))
            <div class="alert alert-danger">
                {{ Session::get('fail-post')}}
            </div>
            @endif
            
            <div class="header">
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-6">
                        <h2>Post Title: {{$post->title }}</h2>
                    </div>
                    <div class="col-xs-12 col-sm-6 align-right">
                        
                    </div>
                </div>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                           
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
                
                <div class="post-content">
                    <div class="post-item">
                    <h3>Created at</h3>
                   <p> {{ $post->created_at->diffForHumans() }}</p>
                    </div>
                    <div class="post-item">
                        <h3>Post</h3>
                       <p> {!! $post->post !!}</p>
                        </div>
                        
            </div>
            <a href="#" data-toggle="modal" data-target="#edit-post-{{$post->id}}" class="btn btn-success btn-sm p-5">edit</a>
            @include('back-end.pages.editPostPopup')
        </div>
    </div>
</div>
@endforeach
<!-- #END# CPU Usage -->
<div class="container-fluid">
    <!-- Image Gallery -->
    <div class="block-header">
        
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                @if(Session::get('success'))
                <div class="alert alert-success">
                    {{ Session::get('success')}}
                </div>
                
                            @endif
                            @if(Session::get('fail'))
                <div class="alert alert-danger">
                    {{ Session::get('fail')}}
                </div>
                @endif
                
                <div class="header">
                    <h2>
                        Post's Pictures
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                               
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                            @foreach ($showpost->first()->postimages as $postimage)
                                
                            
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <a href="{{URL:: asset('/storage/img/blog/'.$postimage->filename) }}" data-sub-html="Demo Description">
                                <img class="img-responsive thumbnail" src="{{URL:: asset('/storage/img/blog/'.$postimage->filename) }}">
                            </a>
                        </div>
                        @endforeach
                        <a href="#" data-toggle="modal" data-target="#add-image" class="btn btn-success btn-sm p-5">Add Image</a>
                        <a href="#" class="btn btn-danger btn-sm" onclick="  confirm('You are about to delete images for {{$post->title }} ?') ? document.getElementById('delete-post-{{$post->id}}').submit() : ''  ">delete images</a>
                        <form action="{{ route('destroy-post-images-route',$post->id) }}" method="post" id="delete-post-{{$post->id}}">
                            @csrf
                            @method('DELETE')
                        </form>
                        @include('back-end.pages.addpostimage')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        </div>
        </div>
      
</section>