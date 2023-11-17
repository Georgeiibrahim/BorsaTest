<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Dashboard</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="dashboard" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('product')}}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">All user wallet </span>
                            </a></li>
                            <li> <a href="index-02.html">Dashboard 02</a> </li>
                            <li> <a href="index-03.html">Dashboard 03</a> </li>
                            <li> <a href="index-04.html">Dashboard 04</a> </li>
                            <li> <a href="index-05.html">Dashboard 05</a> </li>
                        </ul>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Components </li>
                    <!-- menu item Posts-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#abouts">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">About</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="abouts" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('create.about')}}">Add About</a></li>
                            <li><a href="{{route('about.all')}}">Show Abouts</a></li>
                        </ul>
                    </li>
                    <!-- menu item Projects-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#projects">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">Projects</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="projects" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('project.create')}}">Add Project </a> </li>
                            <li> <a href="{{route('projects.all')}}">All Projects</a> </li>
                            <li> <a href="{{route('request_projects.all')}}">Project Requests</a> </li>
                            {{-- <li> <a href="{{route('request_projects.all')}}">Showig Project Requests by user</a> </li> --}}

                        </ul>
                    </li>
                    <!-- menu item Charts-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#features">
                            <div class="pull-left"><i class="ti-pie-chart"></i><span
                                    class="right-nav-text">Features</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="features" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="chart-js.html">Add Features</a> </li>
                            <li> <a href="chart-morris.html">All Features</a> </li>
                            <li> <a href="chart-sparkline.html">Chart Sparkline</a> </li>
                        </ul>
                    </li>

                    <!-- menu font icon-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#contacts">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Contacts</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="contacts" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="fontawesome-icon.html">All Contacts</a> </li>
                            <li> <a href="themify-icons.html">Add Contacts</a> </li>
                            <li> <a href="weather-icon.html">Weather icons</a> </li>
                        </ul>
                    </li>
                    <!-- menu title -->
                    {{-- <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Widgets, Forms & Tables </li> --}}
                    <!-- menu item Widgets-->
                    {{-- <li>
                        <a href="widgets.html"><i class="ti-blackboard"></i><span class="right-nav-text">Widgets</span>
                            <span class="badge badge-pill badge-danger float-right mt-1">59</span> </a>
                    </li> --}}
                    <!-- menu item Form-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#socialmedia">
                            <div class="pull-left"><i class="ti-layout-media-right-alt"></i><span class="right-nav-text">Socail Media</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="socialmedia" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="editor.html">All Social Media</a> </li>
                        </ul>
                    </li>
                    <!-- menu item table -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#post">
                            <div class="pull-left"><i class="ti-layout-tab-window"></i><span class="right-nav-text">Posts</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="post" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('create.post')}}">Add Post </a </li>
                            <li> <a href="{{route('post.all')}}">All Post</a> </li>
                            
                        </ul>
                    </li>
                    
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
