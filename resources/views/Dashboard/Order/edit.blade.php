@extends('layouts.dashboard')

@section('title', 'تعديل الطلب')

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
@endsection

@section('content')
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-9">
                <div class="card ">
                    <div class="card-header d-flex justify-content-between">
                        <h3>تعديل الطلب رقم {{ $order->order_number }}</h3>
                        <a href=" {{ route('dashboard.orders.index') }}" class="btn btn-success">عودة لكل الطلبات</a>
                    </div>

                    <div class="card-body">
                        <form id="form" action="{{ route('dashboard.orders.update', $order->id) }}" method="POST">
                            @method('PATCH')
                            <input type="hidden" name="id" value="{{ $order->id }}">
                            @csrf
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="Name">إسم العميل</label>
                                    <input type="text" name="customer_name"
                                        class="@error('customer_name') is-invalid @enderror form-control"
                                        value="{{ $order->customer_name }}" placeholder="أدخل إسم العميل">
                                    @error('customer_name')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="Name">هاتف العميل</label>
                                    <input type="text" name="customer_mobile"
                                        class="@error('customer_mobile') is-invalid @enderror form-control"
                                        value="{{ $order->customer_mobile }}" placeholder="أدخل هاتف العميل">
                                    @error('customer_mobile')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">

                                <div class="col-md-6">
                                    <label for="order_number">رقم الفاتورة</label>
                                    <input type="text" name="order_number"
                                        class="@error('order_number') is-invalid @enderror form-control"
                                        value="{{ $order->order_number }}" placeholder="أدخل رقم الفاتورة">
                                    @error('order_number')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="date">تاريخ الفاتورة</label>
                                    <input type="text" name="order_date"
                                        class="@error('order_date') is-invalid @enderror form-control pickdate"
                                        value="{{ $order->order_date }}" placeholder="أدخل تاريخ الفاتورة">
                                    @error('order_date')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table text-center" id="order-details">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>إسم المنتج</th>
                                            <th>الكمية</th>
                                            <th>سعر الوحدة</th>
                                            <th>المبلغ الكلى</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->details as $details)
                                            <tr class='cloning_row' id="{{ $loop->index }}">
                                                <td>
                                                    @if ($loop->index == 0)
                                                        {{ $loop->iteration }}
                                                    @else
                                                        <button class="btn btn-sm btn-danger new_product"> <i
                                                                class="fa fa-close"></i></button>
                                                    @endif
                                                </td>
                                                <td>
                                                    <input type="text" name="product_name[{{ $loop->index }}]"
                                                        value="{{ $details->product_name }}"
                                                        class="product_name form-control" id="product_name">
                                                    @error('product_name')
                                                        <span class="alert alert-danger">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input type="number" step="0.01"
                                                        name="quantity[{{ $loop->index }}]"
                                                        value="{{ $details->quantity }}" class="quantity form-control"
                                                        id="quantity">
                                                    @error('quantity')
                                                        <span class="alert alert-danger">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input type="number" step="0.01"
                                                        name="unit_price[{{ $loop->index }}]"
                                                        value="{{ $details->unit_price }}" class="unit_price form-control"
                                                        id="unit_price">
                                                    @error('unit_price')
                                                        <span class="alert alert-danger">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input type="number" step="0.01"
                                                        name="product_total[{{ $loop->index }}]"
                                                        value="{{ $details->product_total }}"
                                                        class="product_total form-control" id="product_total"
                                                        readonly="readonly">
                                                    @error('product_total')
                                                        <span class="alert alert-danger">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <td colspan="6">
                                                <button type="button" class="float-left btn btn-primary btn_add">إضافة منتج
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"></td>
                                            <td colspan="2">المبلغ المطلوب</td>
                                            <td>
                                                <input type="number" name="total" value="{{ $order->total }}"
                                                    step="0.01" class="form-control total" id="total"
                                                    readonly="readonly">
                                            </td>
                                        </tr>
                                    </tfoot>

                                </table>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3" name="update">تحديث الطلب</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




@push('scripts')
    {{-- Jquery Validation Library --}}
    <script src="{{ asset('Front/js/validation/jquery.form.js') }}"></script>
    <script src="{{ asset('Front/js/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('Front/js/validation/additional-methods.min.js') }}"></script>

    {{-- js Pickadate Library  --}}
    <script src="{{ asset('Front/js/date-package/picker.js') }}"></script>
    <script src="{{ asset('Front/js/date-package/picker.date.js') }}"></script>
    <script src="{{ asset('Front/js/mine.js') }}"></script>
@endpush
