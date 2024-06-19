<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ Auth::user()->name }}</strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="{{route('auth.logout')}}">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            @can('view user list')
            <li class="active">
                <a href=""><i class="fa fa-th-large"></i> <span class="nav-label">Quản Lí thành viên</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{route('user.index')}}">QL thành viên</a></li>
                    <li><a href="{{route('user.catalogue.index')}}">QL nhóm thành viên</a></li>
                </ul>
            </li>
            @endcan

            <li class="active">
                <a href=""><i class="fa fa-th-large"></i> <span class="nav-label">Quản Lí Khóa Học</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{route('course.index')}}">QL khóa học</a></li>
{{--                    <li><a href="{{route('course.catalogue.index')}}">QL nhóm hàng hóa</a></li>--}}
                </ul>
            </li>
        </ul>
    </div>
</nav>
