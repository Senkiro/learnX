<!-- Mainly scripts -->

<script src="backend/js/bootstrap.min.js"></script>
<script src="backend/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="backend/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="backend/library/library.js"></script>

#library.js
{{--<script>--}}
{{--    (function ($){--}}
{{--        "use strict";--}}
{{--        var HT = {};--}}
{{--        var document = $(document)--}}

{{--        HT.switchery = () => {--}}
{{--            $('.js-switch').each(function (){--}}
{{--                // let _this  = $(this)--}}
{{--                var switchery = new Switchery(this, { color: '#1AB394' });--}}
{{--            })--}}
{{--        }--}}

{{--        document.ready(function (){--}}
{{--            HT.switchery();--}}
{{--        })--}}
{{--    })(jQuery)--}}

{{--</script>--}}


@if(isset($config['js'])&& is_array($config['js']))
    @foreach($config['js'] as $key => $val)
    {!! '<script src="'.$val.'" ></script>' !!}
    @endforeach
@endif
