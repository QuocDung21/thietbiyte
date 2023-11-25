@extends('front.layouts.master')
@section('title', isset($title) ? $title : 'Home')
@section('description', isset($description) ? $description : '')
@section('keywords', isset($keywords) ? $keywords : '')
@section('content')

    <!-- Thankyou Page area start here  -->
    <section class="thankyou-page-area section-top pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-6">
                    <div class="thankyou-content text-center">
                        <img src="{{asset('frontend/assets/images/thankyou-img.png')}}" alt="img">
                        <h2>{{__('Cảm ơn bạn đã đặt hàng!')}}</h2>
                        <p>{{__('Đơn đặt hàng của bạn đã được đặt và sẽ được xử lý ngay lập tức. Bạn sẽ nhận được một email xác nhận đơn hàng trong thời gian sớm nhất.')}}</p>
                        <a href="{{route('all.product')}}" class="primary-btn">{{__('Xem lại sản phẩm của chúng tôi')}}</a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Thankyou Page area end here  -->
@endsection

