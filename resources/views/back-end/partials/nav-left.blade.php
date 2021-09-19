<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{asset('assets/admin/images/user.png')}}" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Research Production Extension</div>
            <div class="email">
               {{--  @if(count($LoggedUserInfo['email']) = 1)
                {{ $LoggedUserInfo['email'] }}
                @elseif($LoggedUserInfo['email'] == 0)
                no user logged in
                @endif --}}
            </div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="">
                    <i class="material-icons">home</i>
                    <span>Dashboard</span>
                </a>
            </li>
            
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">storage</i>
                    <span>Courses</span>
                </a>

                <ul class="ml-menu">
                    
                    <li>
                        <a href="{{ route('add-courses') }}" >
                            <span>Add Course</span>
                        </a>
                    </li>
                    <li>
                        <a href="" >
                            <span>View Courses</span>
                        </a>
                    </li>
                  
                    {{-- <li>
                        <a href="javascript:void(0);" >
                            <span>Deals & Offers</span>
                        </a>
                    </li> --}}
                </ul>
            </li>

            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">local_post_office</i>
                    <span>Messages</span>
                   </a>
                <ul class="ml-menu">
                    <li>
                        <a href="" >
                            <span>View messages</span>               
                        </a>
                    </li>
                   
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">event_note</i>
                    <span>Posts</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="" >
                            <span>Manage Posts</span>
                        </a>
                    </li>
                    <li>
                        <a href="" >
                            <span>New Post</span>
                        </a>
                    </li>
                </ul>
            </li>

         

          
          

            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">info_outline</i>
                    <span>Frequent Questions</span>
                </a>

                <ul class="ml-menu">
                    <li>
                        <a href="" >
                            <span>Manage FAQS</span>
                        </a>
                    </li>
                    <li>
                        <a href="" >
                            <span>New FAQS</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="">
                    <i class="material-icons">group</i>
                    <span>Subscribers</span>
                </a>
            </li>
            <li>
                <a href="" >
                    <i class="material-icons">settings_power</i>
                    <span>Logout</span>
                </a>
            </li>

          
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            <a href="/" target="_blank">Back to website </a>.
        </div>
    </div>
    <!-- #Footer -->
</aside>

<!-- #END# Left Sidebar -->