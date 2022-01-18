@extends('back-end.layout.template')
@section('content')


    @section('content')


    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
    
    <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                           All Posts
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
                            
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                            <th>Id</th>
                                            <th>Title </th>
                                            <th>Created</th>
                                            <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tfoot>
    
                                    <tr>
                                            <th>Id</th>
                                            <th>Title </th>
                                           
                                            <th>Created</th>
                                            <th>Action</th>
                                            
                                    </tr>
                                </tfoot>
                               
                                <tbody>
                                    @forelse ($showposts as $post)
                                    <tr>
                                            <td>{{ $post->id}}</td>
                                            <td>{{ $post->title}}</td>
                                            
                                            <td>{{ $post->created_at->diffForHumans() }}</td>
                                            
                                          
                                           
                                        
                                            <td>
                                                <a href="{{ route('view-post',$post->id)}}"  class="btn btn-primary btn-sm p-5">View</a>
                                            {{--  <a href="#" data-toggle="modal" data-target="#edit-post-{{$post->id}}" class="btn btn-success btn-sm p-5">edit</a> --}}
                                                <a href="#" class="btn btn-danger btn-sm" onclick="  confirm('You are about to delete {{$post->title }} ?') ? document.getElementById('delete-post-{{$post->id}}').submit() : ''  ">delete</a>
                                                <form action="{{route('destroy-post-route',$post->id)}}" method="post" id="delete-post-{{$post->id}}">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                              {{--   @include('admin.dashboard.editPostPopup') --}}
                                            </td>
                                        </tr>
                                        @empty
                                      
                                        <div> <span class="alert alert-danger">No Post found</span></div><br>
    
                                        <button type="button" onclick="window.location='{{ route('add-post') }}'" class="btn bg-teal waves-effect">Add Post</button>
                                   
                                    @endforelse
                                   
                                 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->
    
    
                
            </div>
            </div>
    </section>
@endsection
