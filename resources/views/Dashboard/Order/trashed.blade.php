@extends('layouts.dashboard')

@section('title', 'ارشيف الطلبات')



@section('breadcrump')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('dashboard.trashedOrders') }}">ارشيف الطلبات</a></li>

    </li>
@endsection

@section('content')
    <table class="table">
        <thead class="text-center">

            <th>رقم الطلب</th>
            <th>اسم العميل</th>
            <th>هاتف العميل</th>
            <th>تاريخ الاضافة</th>
            <th>حالة الطلب</th>
            <th>العمليات</th>

        </thead>

        <tbody class='text-center'>
            @forelse ($trashedOrders as $order)
                <tr>
                    <td><a href="{{ route('dashboard.orders.show', $order->id) }}"> {{ $order->order_number }}</a></td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->customer_mobile }}</td>
                    <td>{{ $order->created_at->diffForHumans() }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-outline-primary btn-sm"
                                href="{{ route('dashboard.restoreOrder', $order->id) }}">
                                إسترجاع</a>
                            @if ($order->status == 'completed')
                                <form class="mr-1" action="{{ route('dashboard.orders.destroy', $order->id) }}"
                                    method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-outline-danger btn-sm">حذف</button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center bg-dark text-white font-weight-bold">لا يوجد طلبات مؤرشفة حاليا
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
