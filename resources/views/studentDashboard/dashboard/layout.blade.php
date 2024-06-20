<!DOCTYPE html>
<html lang="en">

<head>
    @include('studentDashboard.dashboard.component.head')
</head>
@include('studentDashboard.dashboard.component.styleCourse')
<body>

<!-- ============ BEGIN NAVBAR =============-->
<nav>
    @include('studentDashboard.dashboard.component.nav')
</nav>
<!-- ============ END OF NAVBAR =============-->

<section class="courses">
    @include($template)
</section>

<footer>
    @include('studentDashboard.dashboard.component.footer')
</footer>
@include('studentDashboard.dashboard.component.script')
</body>

</html>


