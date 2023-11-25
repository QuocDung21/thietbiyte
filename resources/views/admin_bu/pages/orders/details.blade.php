@extends('admin.master')
@section('title', __('Bảng điều khiển'))
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>{{__('Hồ sơ')}}</h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Trang chủ')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{__('Hồ sơ')}}</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="gallery__area bg-style">
                <div class="gallery__content">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-one" role="tabpanel"
                             aria-labelledby="nav-one-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <form enctype="multipart/form-data" method="POST"
                                          action="{{route('admin.profile.update')}}">
                                        @csrf
                                        <div class="form-vertical__item bg-style">
                                            <div class="item-top mb-30">
                                                <h2>{{__('Chỉnh sửa Hồ sơ')}}</h2>
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Tên Admin')}}</label>
                                                <input type="text" class="form-control" id="admin_name"
                                                       name="admin_name" value="{{$user->name}}" required="">
                                            </div>

                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Email Admin')}}</label>
                                                <input type="text" class="form-control" id="admin_email"
                                                       name="admin_email" value="{{$user->email}}" required="">
                                            </div>

                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Hình ảnh')}}</label>
                                                <input type="file" class="form-control putImage1" name="image"
                                                       id="image">
                                                <img class="admin_image"
                                                     src="{{asset(AdminProfilePicture().$user->image)}}" id="target1"/>
                                            </div>
                                            <div class="input__button">
                                                <button type="submit" class="btn btn-blue">{{ __('Cập nhật')}}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <form enctype="multipart/form-data" method="POST"
                                          action="{{route('admin.change_password')}}">
                                        @csrf
                                        <div class="form-vertical__item bg-style">
                                            <div class="item-top mb-30">
                                                <h2>{{__('Thay đổi Mật khẩu')}}</h2>
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Mật khẩu hiện tại')}}</label>
                                                <input type="password" class="form-control" id="current_password"
                                                       name="password"/>
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Mật khẩu mới')}}</label>
                                                <input type="password" class="form-control" id="new_password"
                                                       name="new_password"/>
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Xác nhận Mật khẩu')}}</label>
                                                <input type="password" class="form-control" id="confirm_password"
                                                       name="confirm_password"/>
                                            </div>
                                            <div class="input__button">
                                                <button type="submit" class="btn btn-blue">{{ __('Cập nhật')}}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
