@include('backend.dashboard.component.breadcrumb',['title' => $config['seo']['index']['title']])
<div class="row mt20">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5> {{$config['seo']['index']['table']?? 'Default Table Title'}}</h5>
                @include('backend.dashboard.component.toolbox',['model'=>'Course'])

            </div>
            <div class="ibox-content">
                @include('backend.course.course.component.filter')
                @include('backend.course.course.component.table')
            </div>
        </div>
    </div>
</div>



