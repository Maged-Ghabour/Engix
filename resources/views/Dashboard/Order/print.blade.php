@extends('layouts.dashboard')

@section('title', 'طباعة الطلب')

@push('styles')
    {{-- css pickadate Package --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('Front/css/date-package/classic.css') }}">
    <link rel="stylesheet" href="{{ asset('Front/css/date-package/classic.date.css') }}">
    @if (config('app.locale') == 'ar')
        <link rel="stylesheet" href="{{ asset('Front/css/date-package/rtl.css') }}">
    @endif

    <style>
        form.form label.error,
        label.error {
            margin-top: 2px;
            color: red;
        }
    </style>
@endpush

@section('breadcrump')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('dashboard.orders.index') }}">الطلبات</a></li>
    <li class="breadcrumb-item">{{ $order->name }}</a>
    </li>
    <li class="breadcrumb-item">طباعة الطلب</li>
@endsection


@section('content')
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card card-default">
                    <div class="card-header">
                        <h3>طباعة الطلب رقم {{ $order->order_number }}</h3>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-center">
                                <tr>
                                    <th>إسم العميل</th>
                                    <td>{{ $order->customer_name }}</td>
                                </tr>
                                <tr>
                                    <th>هاتف العميل</th>
                                    <td>{{ $order->customer_mobile }}</td>
                                </tr>
                                <tr>
                                    <th>قم الطلب</th>
                                    <td>{{ $order->order_number }}</td>
                                </tr>
                            </table>
                            <h3 class="text-center mb-3">تفاصيل الطلب</h3>
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th class="text-danger">#</th>
                                        <th class="text-danger">إسم المنتج</th>
                                        <th class="text-danger">الكمية</th>
                                        <th class="text-danger">سعر الوحدة</th>
                                        <th class="text-danger">المبلغ الكلي</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->details as $details)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $details->product_name }}</td>
                                            <td>{{ $details->quantity }}</td>
                                            <td>{{ $details->unit_price }}</td>
                                            <td>{{ $details->product_total }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <table class="table table-bordered text-center">
                                <tr>
                                    <th>المبلغ الكلي</th>
                                    <td>{{ $order->total }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        window.print()
    </script>
@endpush
