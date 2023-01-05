@extends('layouts.dashboard')

@section('title', 'كل الطلبات')



@section('breadcrump')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('dashboard.orders.index') }}">الطلبات</a></li>

    </li>
@endsection





@section('content')
    <x-alert type="success" color="success" />
    <x-alert type="deleted" color="danger" />
    <x-alert type="updated" color="primary" />
    <table class="table">
        <thead class="text-center">

            <th>رقم الطلب</th>
            <th>اسم العميل</th>
            <th>هاتف العميل</th>
            <th>تاريخ الاضافة</th>
            <th>حالة الطلب</th>
            <th>تغيير الحالة</th>
            <th>العمليات</th>

        </thead>

        <tbody class='text-center'>
            @forelse ($orders as $order)
                <tr>

                    <td><a href="{{ route('dashboard.orders.show', $order->id) }}"> {{ $order->order_number }}</a></td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->customer_mobile }}</td>
                    <td>{{ $order->created_at->diffForHumans() }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        <div class="dropdown">
                            <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary btn-sm"
                                data-toggle="dropdown" id="dropdownMenuButton" type="button">تغيير حالة الطلب<i
                                    class="fas fa-caret-down mr-1"></i></button>
                            <div class="dropdown-menu tx-13">
                                <a class="dropdown-item" href="{{ route('dashboard.delivering', $order->id) }}"><i
                                        class="fa fa-clock text-primary"></i> قيد التوصيل</a>
                                <a class="dropdown-item" href="{{ route('dashboard.completed', $order->id) }}"><i
                                        class="fa fa-check text-success"></i> اكتمل التوصيل</a>
                                <a class="dropdown-item" href="{{ route('dashboard.cancelled', $order->id) }}"><i
                                        class="fa fa-times text-warning"></i> إالغاء الطلب</a>
                                <a class="dropdown-item" href="{{ route('dashboard.refunded', $order->id) }}"><i
                                        class="fa fa-money-check-dollar"></i>تم الدفع</a>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex justify-content-center">

                            <form class="mr-1" action="{{ route('dashboard.orders.edit', $order->id) }}" method="get">
                                <button class="btn btn-outline-primary btn-sm">تعديل</button>
                            </form>
                            <a class="btn btn-sm btn-success" href="{{ route('dashboard.orders.show', $order->id) }}">عرض
                                الطلب</a>

                            @if ($order->status == 'refunded')
                                <form class="mr-1" action="{{ route('dashboard.orders.destroy', $order->id) }}"
                                    method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-outline-danger btn-sm">حذف</button>
                                </form>
                            @endif
                        </div>
                    </td>

                </tr>


            @empty

                <tr>
                    <td colspan="9" class="text-center bg-dark text-white font-weight-bold">لا يوجد طلبات حاليا</td>
                </tr>
            @endforelse


        </tbody>



    </table>

@endsection
