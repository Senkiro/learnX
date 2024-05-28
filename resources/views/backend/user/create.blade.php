@include('backend.dashboard.component.breadcrumb',['title' => $config['seo']['create']['title']])

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('user.store')}}" method="post" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">Nhập thông tin chung của người sử dụng</div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-label text-left">Email
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                        type="text"
                                        name="email"
                                        value="{{old('email')}}"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-label text-left">Họ tên
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                        type="text"
                                        name="name"
                                        value="{{old('name')}}"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off">
                                </div>
                            </div>
                        </div>
                        @php
                            $userCatalogue = [
                                    '[Chọn nhóm thành viên]',
                                    'Quản trị viên',
                                    'Cộng tác viên'
                            ];
                        @endphp
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-label text-left">Nhóm thành viên
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <select name="user_catalogue_id" id="" class="form-control setupSelect2">
                                        @foreach($userCatalogue as $key => $item)
                                            <option @if(old('user_catalogue_id')== $key) selected @endif
                                            value="{{$key}}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-label text-left">Ngày sinh
                                        <span class="text-danger">  </span>
                                    </label>
                                    <input
                                        type="date"
                                        name="birthday"
                                        value="{{old('birthday')}}"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-label text-left">Mật khẩu
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                        type="password"
                                        name="password"
                                        value=""
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-label text-left">Nhập lại mật khẩu
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                        type="password"
                                        name="re_password"
                                        value=""
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label class="control-label text-left saveContent">Ảnh đại diện
                                        <span class="text-danger"></span>
                                    </label>
                                    <input
                                        type="text"
                                        name="image"
                                        value="{{old('image')}}"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                        data-upload="Images">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin liên hệ</div>
                    <div class="panel-description">Nhập thông tin liên hệ cuả người sử dụng</div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-label text-left">Thành phố
                                    </label>
                                    <select name="province_id" id="" class="form-control setupSelect2 province location" data-target="districts">
                                        <option value="0">[Chọn thành phố]</option>
                                        @if(isset($provinces))
                                            @foreach($provinces as $province)
                                                <option @if(old('province_id')== $province->code) selected @endif
                                                value="{{$province->code}}">{{$province->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-label text-left">Quận/Huyện
                                    </label>
                                    <select name="district_id" id="" class="form-control districts setupSelect2 location" data-target="wards">
                                        <option value="0">[Chọn Quận/huyện]</option>
                                    </select>

                                </div>
                            </div>
                    </div>
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-label text-left">Phường/Xã
                                    </label>
                                    <select name="ward_id" id="" class="form-control wards setupSelect2 ">
                                        <option value="0">[Chọn Phường/Xã]</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-label text-left">Địa chỉ
                                    </label>
                                    <input
                                        type="text"
                                        name="address"
                                        value="{{old('address')}}"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off">

                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-label text-left">Số điện thoại
                                    </label>
                                    <input
                                        type="number"
                                        name="phone"
                                        value="{{old('phone')}}"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-label text-left">Ghi chú
                                    </label>
                                    <input
                                        type="text"
                                        name="description"
                                        value="{{old('description')}}"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off">
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

#Select2 js
{{--<script>--}}
{{--    (function ($) {--}}
{{--        "use strict";--}}
{{--        var HT = {};--}}
{{--        var document = $(document)--}}

{{--        HT.select2 = () => {--}}
{{--            $('.setupSelect2').select2();--}}
{{--        }--}}

{{--        document.ready(function () {--}}
{{--            HT.select2();--}}
{{--        });--}}
{{--    })(jQuery)--}}

{{--</script>--}}

<script>
    var province_id = '{{old('province_id')}}'
    var district_id = '{{old('district_id')}}'
    var ward_id = '{{old('ward_id')}}'
</script>
