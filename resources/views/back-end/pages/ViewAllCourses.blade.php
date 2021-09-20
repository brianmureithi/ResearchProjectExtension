@extends('back-end.layout.template')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                         {{-- Alert messages --}}
       @if ($message = Session::get('success'))
       <div class="alert alert-success">
                   <p>{{ $message }}</p>
       </div>
       @elseif($message = Session::get('fail'))
           <div class="alert alert-danger">
               <p>{{ $message }}</p>
   </div>
               
       
       @endif  
                        <div class="header">
                            <h2>
                              All Courses
                        
                            </h2>
                        
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Course Name</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($showCourses as $course)
                                    <tr>
                                        <th scope="row">{{$course->id}}</th>
                                        <td>{{$course->name}}</td>
                                        <td>{{$course->description}}</td>
                                        <td>{{$course->amount}}</td>
                                        <td>
                                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                <button type="button" onclick="  confirm('Are you sure you want to delete ({{$course->name }}) completely?') ? document.getElementById('delete-course-{{$course->id}}').submit() : ''  "class="btn btn-danger btn-block waves-effect" data-toggle="tooltip" data-placement="top" title="Delete ">Delete</button>
                                            </div>
                                            <button type="button" onclick="window.location='{{route('view-course',$course->id)}}'" class="btn btn-primary btn-block waves-effect" data-toggle="tooltip" data-placement="top" title="View Course">View</button>
                                            
                                            
                                           
                                            <form action="{{ route('destroy-course',$course->id) }}" method="post" id="delete-course-{{$course->id}}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>

                                    @empty
                                    <div> <span class="alert alert-success">No Courses available</span>
                                    
                                    </div><br>
                                    <a href="{{route('add-courses')}}"  class="btn btn-primary btn-sm p-5">Add Course</a>
                                @endforelse
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Hover Rows -->


        </section>
    </div>
    </div>


            @endsection