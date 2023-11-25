@extends('front.layouts.master')
@section('title', isset($title) ? $title : 'Trang chủ')
@section('description', isset($description) ? $description : '')
@section('keywords', isset($keywords) ? $keywords : '')
@section('content')
    <!-- Khu vực breadcrumb bắt đầu  -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-wrap text-center">
                <h2 class="page-title">{{__('Hồ sơ người dùng')}}</h2>
                <ul class="breadcrumb-pages">
                    <li class="page-item"><a class="page-item-link" href="{{route('front')}}">{{__('Trang chủ')}}</a></li>
                    <li class="page-item">{{__('Hồ sơ người dùng')}}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Khu vực breadcrumb kết thúc  -->

    <!-- Khu vực trang hồ sơ bắt đầu  -->
    <div class="profile-page-area section">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    @include('front.layouts.include.user_profile_sidebar', ['menu' => 'profile'])
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="user-profile-right-part">
                        <div class="user-profile-content-box">
                            <div class="d-flex justify-content-between align-items-center text-black mb-5">
                                <h2 class="user-profile-content-title">{{__('Hồ sơ của tôi')}}</h2>
                                <a href="{{route('user.profile.edit')}}" class="text-black">{{__('Chỉnh sửa hồ sơ của tôi')}}</a>
                            </div>

                            <div class="row">
                                <!-- Hộp địa chỉ hồ sơ -->
                                <div class="col-md-4">
                                    <div class="address-box card">
                                        <h3 class="text-black">{{__('Thông tin cá nhân')}}</h3>
                                        <ul>
                                            <li>{{__('Tên:')}} {{$user->name}}</li>
                                            <li>{{__('Ngày sinh:')}} {{is_null($user->DOB) ? __('N/A') : $user->DOB}}</li>
                                            <li>{{__('Giới tính:')}} {{is_null($user->Gender) ? __('N/A') : $user->Gender}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Hộp địa chỉ hồ sơ -->
                                <div class="col-md-4">
                                    <div class="address-box card">
                                        <h3 class="text-black">{{__('Địa chỉ & Liên hệ')}}s</h3>
                                        <ul>
                                            <li>{{$user->email}}</li>
                                            <li>{{is_null($user->street_address) ? __('Chưa cập nhật') : $user->street_address}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Hộp địa chỉ hồ sơ -->
                                <div class="col-md-4">
                                    <div class="address-box card">
                                        <h3 class="text-black">{{__('Địa chỉ thanh toán mặc định')}}</h3>
                                        <ul>
                                            <li>{{$user->email}}</li>
                                            <li>{{is_null($user->street_address) ? __('Chưa cập nhật') : $user->street_address}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Khu vực trang hồ sơ kết thúc  -->
@endsection
