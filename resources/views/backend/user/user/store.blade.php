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
    $url = ($config['method'] == 'create') ? route('user.store') : route('user.update',
        $user->id);
@endphp

<form action="{{$url}}" method="post" class="box">
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
                                        value="{{old('email',($user->email) ?? '')}}"
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
                                        value="{{old('name',($user->name) ?? '')}}"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off">
                                </div>
                            </div>
                        </div>

                        @php
                            $roles = \Spatie\Permission\Models\Role::all();
                        @endphp
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-label text-left">Nhóm thành viên
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <select name="role_ids[]" id="" class="form-control setupSelect2">
                                        <option value="0">[Chọn nhóm thành viên]</option>
                                        @foreach($roles as $role)
                                            <option
                                                value="{{ $role['id'] }}"
                                                {{ old('role_id', isset($user->role_id) ? $user->role_id : '') == $role['id'] ? 'selected' : '' }}
                                            >
                                                {{ $role['name'] }}
                                            </option>
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
                                        value="{{old('birthday',(isset($user->birthday)) ?
                                        date('Y-m-d',strtotime($user->birthday)):'')}}"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off">
                                </div>
                            </div>
                        </div>
                        @if($config['method']=='create')
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
                        @endif
{{--                        <div class="row mb15">--}}
{{--                            <div class="col-lg-12">--}}
{{--                                <div class="form-row">--}}
{{--                                    <label class="control-label text-left saveContent">Ảnh đại diện--}}
{{--                                        <span class="text-danger"></span>--}}
{{--                                    </label>--}}
{{--                                    <input--}}
{{--                                        type="text"--}}
{{--                                        name="image"--}}
{{--                                        value="{{old('image',($user->image) ?? '')}}"--}}
{{--                                        class="form-control"--}}
{{--                                        placeholder=""--}}
{{--                                        autocomplete="off"--}}
{{--                                        data-upload="Images">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
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
                                    <select name="province_id" id="" class="form-control setupSelect2 province location"
                                            data-target="districts">
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
                                    <select name="district_id" id=""
                                            class="form-control districts setupSelect2 location" data-target="wards">
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
                                        value="{{old('address',($user->address) ?? '')}}"
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
                                        value="{{old('phone',($user->phone) ?? '')}}"
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
                                        value="{{old('description',($user->description) ?? '')}}"
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


<script>
    var province_id = '{{(isset($user->province_id)) ? $user->province_id : old('province_id')}}'
    var district_id = '{{(isset($user->district_id)) ? $user->district_id : old('district_id')}}'
    var ward_id = '{{(isset($user->ward_id)) ? $user->ward_id : old('ward_id')}}'
</script>
