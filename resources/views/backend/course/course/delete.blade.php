@include('backend.dashboard.component.breadcrumb',['title' => $config['seo']['create']['title']])

<form action="{{route('course.destroy',$course->id)}}" method="post" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">Không thể khôi phục sau khi xóa</div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-label text-left">Title
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                        type="text"
                                        name="course"
                                        value="{{old('course',($course->title) ?? '')}}"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-label text-left">Description
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                        type="text"
                                        name="description"
                                        value="{{old('description',($course->description) ?? '')}}"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                        readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mb15">
            <button class="btn btn-danger" type="submit" name="send" value="send">Delete</button>
        </div>
    </div>
</form>





