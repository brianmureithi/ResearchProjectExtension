@extends('back-end.layout.template')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
   <!-- Vertical Layout -->
   <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            @if($errors->any())
                <div class="alert alert-danger">
                    <p><strong>Opps Something went wrong</strong></p>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </div>
                    @endif
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
                   Add New Post
                </h2>
            </div>
            <div class="body">
                <form method="post" action="{{ route('add-new-post-route.store') }}" enctype="multipart/form-data">
                    @csrf
                    <label for="title">Title</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="title" name="title" class="form-control" placeholder="Enter post title">
                        </div>
                    </div>
                   
                    <div>
                    <label for="post">Post content</label>

                        <div class="form-line">

                            <textarea  id="ckeditor" name="post" >
                            </textarea>
                        </div>

                    </div>

                     <!-- File Upload | Drag & Drop OR With Click & Choose -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Add images
                               
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="dropzone">
                                <div class="dz-message">
                                    <div class="drag-icon-cph">
                                        <i class="material-icons">touch_app</i>
                                    </div>
                                    <h3>Drop files here or click to upload.</h3>
                                 
                                </div>
                                <div class="fallback">
                                    <input name="filename[]" type="file" multiple />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# File Upload | Drag & Drop OR With Click & Choose -->

                
                    <br>
                    <button type="submit" name="submit" class="btn btn-primary m-t-15 waves-effect">Add Post</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- #END# Vertical Layout -->
                  



        </div>
        </div>
</section>


@endsection