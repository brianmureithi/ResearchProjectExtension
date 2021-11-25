@extends('back-end.layout.template')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="col-xs-12 col-sm-12">
                <div class="card">
                    <div class="body">
                        <div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Unread</a></li>
                                {{-- <li role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Read</a></li> --}}
                               
                            </ul>

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="home">
                                    <div class="panel panel-default panel-post">
                                        <div class="panel-heading">
                                           
                                        </div>
                                        <div class="panel-body">
                                            <div class="post">
                                                <div class="post-heading">
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
                                                      
                                                </div>
                                                <div class="post-content">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                            <thead>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>Email </th>
                                                                    <th>Subject</th>
                                                                    <th>Sent at</th>
                                                                    <th>Action</th>
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tfoot>
                                
                                                                <tr>
                                                                        <th>Name</th>
                                                                        <th>Email </th>
                                                                        <th>Subject</th>
                                                                        <th>Sent</th>
                                                                        <th>Action</th>
                                                                        
                                                                </tr>
                                                            </tfoot>
                                                           
                                                            <tbody>
                                                   @forelse ($showMessages as $message)
                                                   <tr>
                                                    <td>{{ $message->name}}</td>
                                                    <td style="max-width:100px !important; overflow-x:hidden"><p>{{ $message->email}}</p></td>
                                                    <td  style="max-width:100px !important;overflow-x:hidden"><p>{{ $message->subject}}</p></td>
                                                    <td>{{ $message->created_at->diffForHumans() }}</td>
                                                    
                                                  
                                                   
                                                
                                                    <td>
                                                      {{--   <a href="/view-post/{{ $message->id}}"  class="btn btn-primary btn-sm p-5">View</a> --}}
                                                    <a href="#" data-toggle="modal" data-target="#view-message-{{$message->id}}"  class="btn btn-success btn-sm p-5">View</a> 
                                                   {{--  <script>
                                                        page-script
                                                        
                                                                </script> --}}
                                                    <a href="#" class="btn btn-danger btn-sm" onclick="  confirm('You are about to delete a message from {{$message->name }}  ?') ? document.getElementById('delete-messsage-{{$message->id}}').submit() : ''  ">delete</a>
                                                        <form action="{{ route('destroy-message-route',$message->id)}}" method="post" id="delete-messsage-{{$message->id}}">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                        {{-- <form action="{{ route('',)}}/message-status-update/{{ $message->id }}" method="post" id="update-status">
                                                            @csrf
                                                            @method('PUT')
                                                        </form> --}}
                                                        @include('back-end.pages.viewmessagePopup')
                                                    </td>
                                                </tr>
                                            
                                   
                                                       
                                                   @empty
                                                   <div> <span class="alert alert-success">No unread messages</span></div><br>

                                                                   
                                                   @endforelse
                                                </tbody>
                                            </table>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>

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
   


            @endsection