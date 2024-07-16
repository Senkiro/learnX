<!-- Mainly scripts -->

<script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
<script src="backend/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="backend/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="backend/library/library.js?v={{config('app.version')}}"></script>

<script src="backend/js/inspinia.js"></script>
<script src="backend/js/plugins/pace/pace.min.js"></script>



@if(isset($config['js'])&& is_array($config['js']))
    @foreach($config['js'] as $key => $val)
    {!! '<script src="'.$val.'" ></script>' !!}
    @endforeach
@endif
{{--<script>--}}
{{--    var url = '{{route('course.store')}}';--}}
{{--</script>--}}
