@extends('layouts.dashboard')

@section('title', 'عملاؤنا ')



@section('breadcrump')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('dashboard.ourCustomers.index') }}">عملاؤنا</a></li>
@endsection





@section('content')


    <x-alert type="success" color="success" />
    <x-alert type="deleted" color="danger" />
    <x-alert type="updated" color="primary" />


    <a class="btn btn-success mb-2 float-right" href="{{ route('dashboard.ourCustomers.create') }}">إضافة عميل جديد
        <i class="fas fa-plus fa-sm"></i>

    </a>



    <table class="table">
        <thead>
            <th>#</th>
            <th>اسم العميل</th>
            <th>الوصف</th>
            <th>الصورة</th>
            <th>تاريخ الاضافة</th>
            <th>التعديل</th>
            <th>الحذف</th>
        </thead>

        <tbody>
            @forelse ($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td><a href="{{ route('dashboard.ourCustomers.show', $customer->id) }}"> {{ $customer->title }}</a></td>

                    <td>{!! $customer->description !!}</td>

                    <td><img src="{{ asset('uploads/Customers/' . $customer->image) }}" width="70px" height="70px"
                            alt=""></td>

                    <td>{{ $customer->created_at->diffForHumans() }}</td>
                    {{-- <td>
                <form action="{{route('dashboard.categories.edit' , $category->id)}}" method="get">
                    <button class="btn btn-outline-primary">تعديل</button>
                </form>
            </td> --}}

                    <td>
                        <a class="btn btn-outline-primary"
                            href="{{ route('dashboard.ourCustomers.edit', $customer->id) }}">تعديل</a>
                    </td>
                    <td>
                        <form action="{{ route('dashboard.ourCustomers.destroy', $customer->id) }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-outline-danger">حذف</button>
                        </form>
                    </td>

                </tr>


            @empty

                <tr>
                    <td colspan="9" class="text-center bg-dark text-white font-weight-bold">لا يوجد عملاء حاليا</td>
                </tr>
            @endforelse


        </tbody>



    </table>
@endsection
