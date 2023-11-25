<div class="modal-header bg-success">
    <h5 class="modal-title text-white" id="viewModalLongTitle">{{ __('Hóa đơn') }}</h5>
    <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Đóng">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body" id="printDiv">
    <p><img src="{{ asset(IMG_LOGO_PATH . allsetting()['main_logo']) }}" alt="{{ __('Logo') }}"/>
    </p>
    @php
        $bill = json_decode($order->billing_address, true);
    @endphp
    <p>
        <b>{{ __('Số đơn hàng:') }}</b> <a href="javascript:void(0)">{{ $order->Order_Number }}</a><br>
        <b>{{ __('Tên:') }}</b> {{ $bill['name'] ?? null }}<br>
        <b>{{ __('Email:') }}</b> {{ $bill['email'] ?? null }}<br>
        <b>{{ __('Phương thức thanh toán: ') }}</b> {{ $order->Payment_Method }}<br>
        <b>{{ __('TXN: ') }}</b> {{ $order->txn }}
    </p>
    <div class="row">
        <div class="col-md-6">
            <p>
                <b>{{ __('Địa chỉ thanh toán:') }}</b><br>
                <small>
                    {{ $bill['name'] ?? null }} <br>
                    {{ $bill['email'] ?? null }} <br>
                    {{ $bill['street'] ?? null }} <br>
                    {{ $bill['state'] ?? null }} <br>
                    {{ $bill['country'] ?? null . __(',') }} {{ $bill['zipcode'] ?? null }}
                </small>
            </p>
        </div>
        @php
            $ship = json_decode($order->shipping_address, true);
        @endphp
        <div class="col-md-6">
            <p>
                <b>{{ __('Địa chỉ giao hàng:') }}</b><br>
                <small>
                    {{ $ship['name']??null }} <br>
                    {{ $ship['email']??null }} <br>
                    {{ $ship['street']??null }} <br>
                    {{ $ship['state']??null }} <br>
                    {{ $ship['country']??null . __(',') }} {{ $ship['zipcode']??null }}
                </small>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('Sản phẩm') }}</h6>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th>{{ __('Tên') }}</th>
                            <th>{{ __('Ảnh') }}</th>
                            <th>{{ __('Số lượng') }}</th>
                            <th>{{ __('Kích thước') }}</th>
                            <th>{{ __('Màu') }}</th>
                            <th>{{ __('Giá') }}</th>
                            <th>{{ __('Tổng cộng') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($order->order_details as $od)
                            <tr>
                                <td>{{ $od->product->en_Product_Name }}</td>
                                <td><img src="{{ asset(IMG_PRODUCT_PATH . $od->product->Primary_Image) }}"
                                         height="50" class="img-rounded mr-1"/></td>
                                <td>{{ $od->Quantity }}</td>
                                <td>{{ is_null($od->Size) ? __('Không có') : $od->Size }}</td>
                                <td>{{ is_null($od->Color) ? __('Không có') : $od->Color }}</td>
                                <td>{{ $od->Price }}</td>
                                <td>{{ $od->Total_Price }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{ __('Tổng phụ') }}</td>
                            <td>{{ $order->Sub_Total }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{ __('Phí vận chuyển') }}</td>
                            <td>{{ $order->Delivery_Charge }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{ __('Thuế') }}</td>
                            <td>{{ $order->Tax }}</td>
                        </tr>
                        @if (!is_null($order->Coupon_Id))
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>{{ __('Giảm giá (-)') }}</td>
                                <td>{{ $order->Coupon_Amount }}</td>
                            </tr>
                        @endif
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{ __('Tổng cộng') }}</td>
                            <td>{{ $order->Grand_Total }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                {{--                <div class="card-footer">--}}
                {{--                    <small class="text-danger">{{ __('*Tất cả số tiền được tính bằng đơn vị tiền tệ USD.') }}</small>--}}
                {{--                </div>--}}
            </div>
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-danger me-2" data-bs-dismiss="modal">{{ __('Đóng') }}</button>
    <a href="{{ route('admin.order.print', $order->id) }}" class="btn btn-info"
       target="_blank">{{ __('In') }}</a>
</div>
