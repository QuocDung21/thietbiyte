@extends('admin.master', ['menu' => 'catbad', 'submenu' => 'category'])
@section('title', isset($title) ? $title : '')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>{{ __('Cập nhật danh mục') }}</h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Trang chủ') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Danh mục') }}</li>
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
                        <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-vertical__item bg-style">
                                        <form enctype="multipart/form-data" method="POST"
                                            action="{{ route('admin.category.update') }}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $edit->id }}">
                                            <div class="input__group mb-25">
                                                <label>{{ __('Tên danh mục ') }}</label>
                                                <input type="text" id="en_category_name" name="en_category_name"
                                                    value="{{ $edit->en_Category_Name }}" placeholder="Tên">
                                            </div>
                                            {{-- <div class="input__group mb-25">
                                                <label>{{ __('Tên danh mục ' . langString('fr')) }}</label>
                                                <input type="text" id="fr_category_name" name="fr_category_name"
                                                    value="{{ $edit->fr_Category_Name }}" placeholder="Tên (Tiếng Pháp)">
                                            </div> --}}
                                            <div class="input__group mb-25">
                                                <label>{{ __('Lớp biểu tượng') }}</label>
                                                <input type="text" id="icon_class" name="icon_class"
                                                    value="{{ $edit->Category_Icon }}" placeholder="Biểu tượng">
                                            </div>
                                            <div class="input__group mb-25">
                                                <label>{{ __('Mô tả ') }}</label>
                                                <textarea name="en_description" id="en_description" placeholder="Mô tả ">{{ $edit->en_Description }}</textarea>
                                            </div>
                                            {{-- <div class="input__group mb-25">
                                                <label>{{ __('Mô tả ' . langString('fr')) }}</label>
                                                <textarea name="fr_description" id="fr_description" placeholder="Mô tả (Tiếng Pháp)">{{ $edit->fr_Description }}</textarea>
                                            </div> --}}
                                            <div class="input__button">
                                                <button type="submit" class="btn btn-blue">{{ __('Cập nhật') }}</button>
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
    </div>
@endsection
