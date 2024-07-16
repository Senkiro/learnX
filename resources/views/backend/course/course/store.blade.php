@if($config['method']=='create')
    @include('backend.dashboard.component.breadcrumb',['title' => $config['seo']['create']['title']])
@endif

@if($config['method']=='edit')
    @include('backend.dashboard.component.breadcrumb',['title' => $config['seo']['update']['title']])
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@php
    $url = ($config['method'] == 'create') ? route('course.store') : route('course.update',
        $course->id);
@endphp


<form action="{{$url}}" method="post" class="box" enctype="multipart/form-data">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">Nhập thông tin chung của khóa học</div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-label text-left">Tiêu đề
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                        type="text"
                                        name="title"
                                        value="{{ old('title', $course->title ?? '') }}"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-label text-left">Mô tả
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                        type="text"
                                        name="description"
                                        value="{{ old('description', $course->description ?? '') }}"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-label text-left">Giá
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                        type="number"
                                        step="0.01"
                                        name="price"
                                        value="{{ old('price', $course->price ?? '') }}"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-label text-left saveContent">Ảnh
                                        <span class="text-danger"></span>
                                    </label>
                                    <input
                                        type="file"
                                        name="image"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off">
                                    @if(isset($course) && $course->image)
                                        <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}"
                                             width="100%" height="150px">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-right mb15">
            <button class="btn btn-primary" type="submit" name="send" value="send">Save</button>
        </div>
    </div>
</form>
