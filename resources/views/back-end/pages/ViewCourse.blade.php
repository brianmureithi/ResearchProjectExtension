@extends('back-end.layout.template')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">

        </div>
      
             <!-- display success message  -->
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
             

      

         @if (count($showcoursedetails) >= 1)
             @foreach ($showcoursedetails as $showcourse)
                 

             <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
              <div class="card">
                  <div class="header bg-light-green">
                      <h2>
                        Course details
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
                      
                      @if($showcourse != null)
                    <h5> Course name:</h5> <p>{{ $showcourse->name }}</p>
                    <h5> Amount: </h5> <p>{{ $showcourse->amount }}</p>
                   <h5>Description:</h5>  <p>{{ $showcourse->description }}</p>
                  
                      <a href="#" data-toggle="modal" data-target="#edit-course-{{$showcourse->id}}" class="btn bg-deep-orange btn-md p-5 mb-5">Edit course details</a>
                      <a href="#" data-toggle="modal"  onclick="  confirm('Are you sure you want delete records for course {{$showcourse->name }}? This will delete the course permanently. Try editing instead') ? document.getElementById('delete-course-{{$showcourse->id}}').submit() : ''  "class="btn btn-danger btn-md p-5 ">Delete Course</a>
                       <form action="{{route('destroy-course', $showcourse->id)}}" method="post" id="delete-course-{{$showcourse->id}}">
                           @csrf
                           @method('DELETE')
                       </form>
                       @include('back-end.pages.CourseEdit') 
                     
                     @elseif($showcourse == null)
                     <h5> Name:</h5> <p> no records</p>
                     <h5> Description: </h5> <p> no records</p>
                     <h5> Amount:</h5> <p> no records</p>
                     
                     
                     
                     
                     <a href="#" data-toggle="modal" data-target="{{ route('add-courses') }}" class="btn btn-success btn-md p-5 mb-5">Add Course details</a>
                     {{-- <a href="#" data-toggle="modal"  onclick="  confirm('You are about to delete course {{$showcourse->name }} ?') ? document.getElementById('delete-course-{{$showcourse->id}}').submit() : ''  "class="btn btn-danger btn-md p-5 ">Delete course</a>
                      <form action="/product-tech-specs-delete/{{ $showcourse->id }}" method="post" id="delete-product-tech-specs-{{$showProducts->id}}">
                          @csrf
                          @method('DELETE')
                      </form> --}}

                     
                  @endif
                  </div>
                 
                  @include('back-end.pages.CourseAddPopup')  
              </div>
          </div>
     
          
          
          <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
              <div class="card">
                  <div class="header bg-red">
                      <h2>
                         
                          Course Image <small></small>
                      </h2>
                      <ul class="header-dropdown m-r--5">
                          
                          <li class="dropdown">
                              <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                  <i class="material-icons">more_vert</i>
                              </a>
                              
                          </li>
                      </ul>
                  </div>
                  <div class="body">
                    <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                       
                            
                        
                        <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                            <a href="{{URL:: asset('/storage/img/product/'.$showcourse->image) }}" data-sub-html="Demo Description">
                                <img class="img-responsive thumbnail" alt="product image" src="{{URL:: asset('/storage/img/courseImages/'.$showcourse->image) }}">
                            </a>                  
                        </div>
                        
                    
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <a href="#" data-toggle="modal" data-target="#update-course-image" class="btn btn-success btn-sm p-5">Update Image</a>
                    {{-- <a href="{{route('delete-image',$showcourse->id)}}" class="btn btn-danger btn-sm">Delete</a> --}}
                    <a href="#" class="btn btn-danger btn-sm" onclick="  confirm('You are about to delete image for course {{$showcourse->name  }} ?') ? document.getElementById('delete-course-image-{{$showcourse->id}}').submit() : ''  ">delete image</a>
                    <form action="{{route('destroy-image-route', $showcourse->id)}}" method="post" id="delete-course-image-{{$showcourse->id}}">
                        @csrf
                        @method('DELETE')
                    </form> 
                    @include('back-end.pages.UpdateImagePopup')
                      
          </div>
          </div>
          </div>
          </div>
           <!-- Image Gallery -->
           <div>
  <div class="block-header">
  </div>
  <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
              <div class="header">
                  <h2>
                      Course Videos
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
                          @foreach ($showcourse->videos as $video )
                              
                          
                          <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                              {{-- <a href="{{URL:: asset('/storage/img/product/'.$image->filename) }}" data-sub-html="Demo Description">
                                  <img class="img-responsive thumbnail" alt="product image" src="{{URL:: asset('/storage/img/product/'.$image->filename) }}">
                              </a> --}}
                              
                              <a href="{{route('delete-video',$video->id)}}" class="btn btn-danger btn-sm">Delete</a>
                              <a href="#" class="btn btn-danger btn-sm" onclick="  
                              confirm('Are you sure you want to delete this video ?') ? document.getElementById('delete-video-{{$video->id}}').submit() : ''  ">delete images</a>
                          </div>
                          <form action="{{route('delete-video',$video->id)}}" method="post" id="delete-video-{{$video->id}}">
                            @csrf
                            @method('DELETE')
                        </form> 
                      @endforeach
                      
                      <a href="#" data-toggle="modal" data-target="#add-video-{{ $showcourse->id }}" class="btn btn-success btn-sm p-5">Add video</a>
                      {{-- <a href="#" class="btn btn-danger btn-sm" onclick="  confirm('You are about to delete images for {{$showProducts->name  }} ?') ? document.getElementById('delete-product-image-{{$showProducts->id}}').submit() : ''  ">delete images</a>--}}
                     
                      @include('back-end.pages.VideoAdd')
                     
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
         
  
          @endforeach
         
          @else
         
         
@endif
                       
           
             

           





    </div>
   </section>
  @endsection