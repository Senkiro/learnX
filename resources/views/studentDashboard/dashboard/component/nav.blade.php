<div class="container nav__container">
    <a href="index.html">
        <h4>EGATOR</h4>
    </a>
    <ul class="nav__menu">
        <li><a href="{{ route('student_dashboard.index') }}">Courses</a></li>
        <li><a href="{{route('myCourse.index')}}">My Courses</a></li>
        <li><a href="{{route('cart.index')}}">Cart</a></li>
        <li><a href="{{ route('auth.logout') }}">
                <i class="fa fa-sign-out"></i> Log out
            </a>
        </li>
    </ul>
    <button id="open-menu-btn"><i class="uil uil-bars"></i></button>
    <button id="close-menu-btn"><i class="uil uil-multiply"></i></button>
</div>
