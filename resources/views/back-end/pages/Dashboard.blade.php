@extends('back-end.layout.template')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">

            <div class="stats">
         
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="cursor:pointer">
                    <a href="{{ route('view-courses') }}" style="text-decoration:none;">
                    <div class="info-box hover-zoom-effect">
                        <div class="icon bg-red">
                            <i class="material-icons">shopping_cart</i>
                        </div>
                        <div class="content">
                            <div class="text">Courses</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20">{{ $countcourses }}</div>
                        </div>
                    </div>
                </a>
                </div>
                
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="cursor:pointer">
                    <a href="{{ route('admin-subscribed-courses') }}" style="text-decoration:none;">
                    <div class="info-box hover-zoom-effect">
                        <div class="icon bg-teal">
                            <i class="material-icons">equalizer</i>
                        </div>
                        <div class="content">
                            <div class="text">Course subscriptions</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20"> {{ $countsubscriptions }}</div>
                        </div>
                    </div>
                </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="cursor:pointer">
                    <a href="{{ route('contacts-backend') }}" style="text-decoration:none;">
                    <div class="info-box hover-zoom-effect">
                        <div class="icon bg-blue">
                            <i class="material-icons">email</i>
                        </div>
                        <div class="content">
                            <div class="text">Messages</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20"> {{ $countmessages }}</div>
                        </div>
                    </div>
                </a>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="cursor:pointer">
                    <a href="{{ route('newsletter-backend') }}" style="text-decoration:none;cursor:pointer">
                    <div class="info-box hover-zoom-effect">
                        <div class="icon bg-indigo">
                            <i class="material-icons">face</i>
                        </div>
                        <div class="content">
                            <div class="text">Newsletter subscriptions</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20"> {{ $countnewslettersubscriptions }}</div>
                        </div>
                    </div>
                </a>
                </div>


                
        
        </div>

        </div>
    </div>

        </section>
    

            @endsection