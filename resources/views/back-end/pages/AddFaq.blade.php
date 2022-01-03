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
                    @endif -
     @if(Session::get('success-faq'))
            <div class="alert alert-success">
                {{ Session::get('success-faq')}}
            </div>
            
                        @endif
                        @if(Session::get('fail-faq'))
            <div class="alert alert-danger">
                {{ Session::get('fail-faq')}}
            </div>
            @endif  
            <div class="header">
                <h2>
                   Add New F.A.Q
                </h2>
            </div>
            <div class="body">
                <form method="post" action="{{route('addfaqs.store')}}" enctype="multipart/form-data">
                    @csrf
                    <label for="question">Question</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="question" name="question" class="form-control" placeholder="Enter question">
                        </div>
                    </div>
                    <label for="answer">Answer</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="answer" name="answer" class="form-control" placeholder="Enter answer">
                        </div>
                    </div>               
                    <br>
                    <button type="submit" name="submit" class="btn btn-primary m-t-15 waves-effect">Add F.A.Q</button>
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