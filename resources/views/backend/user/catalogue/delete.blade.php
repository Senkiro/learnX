@include('backend.dashboard.component.breadcrumb',['title' => $config['seo']['create']['title']])

<form action="{{route('user.catalogue.destroy',$userCatalogue->id)}}" method="post" class="box">
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
                                    <label class="control-label text-left">Ten nhom
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                        type="text"
                                        name="name"
                                        value="{{old('email',($userCatalogue->name) ?? '')}}"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-label text-left">Ghi chu
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                        type="text"
                                        name="description"
                                        value="{{old('name',($userCatalogue->description) ?? '')}}"
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





