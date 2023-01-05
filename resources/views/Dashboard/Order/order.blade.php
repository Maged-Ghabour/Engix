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
        <thead>
            <th>الاسم الأول</th>
            <th>الاسم الاخير</th>
            <th>الايميل</th>
            <th>رقم الموبيل</th>
            <th>العنوان</th>
            <th>الرقم البريدي</th>
            <th>النوع</th>
            <th>المدينة</th>
            <th>تاريخ الإضافة</th>
            <th>التعديل</th>
            <th>الحذف</th>
        </thead>

        <tbody>
            @forelse ($orders as $order)

                <tr>
                    {{-- <td><a href="{{ route('dashboard.orders.show', $order->id) }}"> {{ $order->order_number }}</a></td> --}}
                    <td>{{ $order->first_name }}</td>
                    <td>{{ $order->last_name}}</td>
                    <td>{{ $order->email}}</td>
                    <td>{{ $order->phone_number}}</td>
                    <td>{{ $order->street_address}}</td>
                    <td>{{ $order->postal_code}}</td>
                    <td>{{ $order->type}}</td>
                    <td>{{ $order->city}}</td>
                    <td>{{ $order->created_at->diffForHumans() }}</td>
                    <td>
                        <form action="{{ route('dashboard.orders.edit', $order->id) }}" method="get">
                            <button class="btn btn-outline-primary">تعديل</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('dashboard.orders.destroy', $order->id) }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-outline-danger">حذف</button>
                        </form>
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
