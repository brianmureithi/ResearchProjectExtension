@extends('back-end.layout.template')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <!-- Vertical Layout -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <p><strong>Opps Something went wrong</strong></p>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                        @endif
                        {{-- Alert messages --}}
                        @if ($message = Session::get('success-add'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @elseif($message = Session::get('fail-add'))
                            <div class="alert alert-danger">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <div class="card">
                            <div class="header">
                                <h2>
                                    Add Course
                                </h2>
                                {{-- <ul class="header-dropdown m-r--5">
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
                </ul> --}}
                            </div>
                            <div class="body">
                                <form action="{{ route('add-courses-save') }}" method="post" enctype="multipart/form-data"
                                    autocomplete="off">
                                    @csrf
                                    <label for="email_address">Name</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="name" name="name" class="form-control"
                                                placeholder="Enter the course name">
                                        </div>
                                    </div>
                                    <label for="email_address">Description</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="description" name="description" class="form-control"
                                                placeholder="Enter a short description of course">
                                        </div>
                                    </div>
                                    <label for="email_address">Amount</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="amount" name="amount" class="form-control"
                                                placeholder="Enter the cost of the course. If free enter zero(0)">
                                        </div>
                                    </div>
                                    <!-- File Upload | Drag & Drop OR With Click & Choose -->
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="card">
                                                <div class="header">

                                                </div>
                                                <div class="body">

                                                    <div class="dz-message">
                                                        <div class="drag-icon-cph">
                                                            <i class="material-icons">touch_app</i>
                                                        </div>
                                                        <h4>Drop files here or click to upload.</h4>
                                                        <small>Image depicting the course</small>
                                                    </div>
                                                    <div class="fallback">
                                                        <input name="image" type="file" multiple />
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- #END# File Upload | Drag & Drop OR With Click & Choose -->


                                    <br>
                                    <button type="submit" class="btn btn-primary m-t-7 waves-effect">Add Course</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Vertical Layout -->
                <!-- Vertical Layout -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">


                            {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <p><strong>Opps Something went wrong</strong></p>
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                @endif --}}
                            {{-- Alert messages --}}
                            @if ($message = Session::get('success-video'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @elseif($message = Session::get('fail-video'))
                                <div class="alert alert-danger">
                                    <p>{{ $message }}</p>
                                </div>


                            @endif
                            <div class="header">
                                <h2>
                                    Enter Course Videos
                                </h2>
                                {{-- <ul class="header-dropdown m-r--5">
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
                </ul> --}}
                            </div>
                            <div class="body">
                                <form action="{{ route('add-video-in-course-add') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-12">
                                        <p>
                                            <b>Course</b>
                                        </p>
                                        <select name="course_id" class="form-control show-tick">

                                            @forelse($showCourses as $showcourse)
                                                <option value="{{ $showcourse->id }}">{{ $showcourse->id }}.
                                                    {{ $showcourse->name }}</option>
                                            @empty
                                                <div class="alert alert-warning">
                                                    No Courses Present
                                                </div>
                                            @endforelse
                                        </select>

                                    </div>
                                    <div class="col-md-12">
                                        <label for="description"> Video description</label>
                                        <input name="description" class="form-control" placeholder="Enter description Eg. Lession 1 etc"id="description" type="text"/>

                                    </div>
                                    <!-- File Upload | Drag & Drop OR With Click & Choose -->
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="card">
                                                <div class="header">

                                                </div>
                                                <div class="body">

                                                    <div class="dz-message">
                                                        <div class="drag-icon-cph">
                                                            <i class="material-icons">touch_app</i>
                                                        </div>
                                                        <h4>Drop files here or click to upload.</h4>

                                                    </div>
                                                    <div class="fallback">
                                                        <input name="video" type="file" multiple />
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- #END# File Upload | Drag & Drop OR With Click & Choose -->


                                    <br>
                                    <button type="submit" class="btn btn-primary m-t-7 waves-effect">Add Video</button>
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
