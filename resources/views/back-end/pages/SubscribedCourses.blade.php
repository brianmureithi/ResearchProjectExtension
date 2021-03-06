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
                                    Subscribed Courses

                                </h2>

                            </div>
                            <div class="body table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Course Name</th>
                                            <th>User Name</th>
                                            <th>Amount</th>
                                            <th>Subscribed</th>
                                         

                                        </tr>
                                    </thead>
                                    <tfoot>

                                        <tr>
                                            <th>Id</th>
                                            <th>Course Name</th>
                                            <th>User Name</th>
                                            <th>Amount</th>
                                            <th>Subscribed</th>
                                          



                                        </tr>
                                    </tfoot>

                                    <tbody>
                                        @forelse($subscribedCourses as $Course)
                                            <tr>
                                                
                                                <td>{{ $Course->id }}</td>
                                                <td>{{ $Course->course->name }}</td>
                                                <td>{{ $Course->user->name }}</td>
                                                @if($Course->course->amount == 0)
                                                <td>Free</td>
                                                @else
                                                <td>{{ $Course->course->amount }}</td>
                                                @endif
                                                <td>{{ $Course->created_at->diffForHumans() }}</td>


                                               {{--  <td>
                                                    {{-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                    <button type="button" onclick="window.location='{{route('')}}'" class="btn btn-success btn-block waves-effect" data-toggle="tooltip" data-placement="top" title="View Course">Unsubscribe</button>
                                                
                                                </div> --}}
                                                    {{-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                    <button type="button" onclick="  confirm('Are you sure you want to Unsubscribe ({{$Course->users->name }}) completely?') ? document.getElementById('unsubscribe-course-{{$Course->id}}').submit() : ''  "class="btn btn-danger btn-block waves-effect" data-toggle="tooltip" data-placement="top" title="Delete ">Delete</button>
                                                </div>
                                               
                                                
                                               
                                                <form action="{{ route('destroy-course',$course->id) }}" method="post" id="delete-course-{{$course->id}}">
                                                    @csrf
                                                    @method('DELETE')
                                                </form> 
                                                </td> --}}
                                            </tr>

                                        @empty
                                            <div> <span class="alert alert-success">No Courses available</span>

                                            </div><br>
                                            <a href="{{ route('add-courses') }}" class="btn btn-primary btn-sm p-5">Add
                                                Course</a>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Hover Rows -->
            </div>
        </div>
    </section>
@endsection
