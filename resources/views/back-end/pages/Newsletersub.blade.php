@extends('back-end.layout.template')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                              Subscribers
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
            <div class="table-responsive">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                            <p>{{ $message }}</p>
                </div>
           @elseif($message = Session::get('fail'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                  </div>              
            @endif 
                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    <thead>
                        <tr>
                                <th>Id</th>
                                <th>Email</th>
                                <th>Category</th>
                                <th>Created</th>
                                <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tfoot>

                        <tr>
                            <th>Id</th>
                            <th>Email</th>
                            <th>Category</th>        
                            <th>Created</th>
                            <th>Action</th>
                        
                                
                        </tr>
                    </tfoot>
                   
                    <tbody>
                        @forelse ($newslettersubscribers as $subscriber)
                        <tr>
                                <td>{{ $subscriber->id}}</td>
                                <td>{{ $subscriber->email}}</td>
                                <td>{{$subscriber->category}}</td>
                                <td>{{ $subscriber->created_at->diffForHumans() }}</td>
                                
                              
                               
                            
                                <td>
                                    
                            
                                    <a href="#" class="btn btn-danger btn-sm" onclick="  confirm('You are about to delete subscriber {{$subscriber->email }} ?') ? document.getElementById('delete-subscriber-{{$subscriber->id}}').submit() : ''  ">delete</a>
                                    <form action="{{ route('destroy-subscriber-route',$subscriber->id) }}" method="post" id="delete-subscriber-{{$subscriber->id}}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @empty
                          
                            <div> <span class="alert alert-danger">No Subscribers records found</span></div><br>

                      
                   
               
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