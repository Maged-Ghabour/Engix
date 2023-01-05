@extends('layouts.dashboard')

@section('title', $customer->name)



@section('breadcrump')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('dashboard.ourCustomers.index') }}">عملاؤنا</a></li>
    <li class="breadcrumb-item"><a href="{{ route('dashboard.ourCustomers.edit', $customer->id) }}">{{ $customer->name }}</a>
    </li>
@endsection





@section('content')


    <table class="table">
        <thead>

            <th>اسم العميل</th>
            <th>الوصف</th>
            <th>الصورة</th>
            <th>تاريخ الاضافة</th>

        </thead>

        <tbody>
            @forelse ($category->products as $product)
                <tr>

                    <td>{{ $product->name }}</td>
                    <td>{{ $product->parent->name }}</td>
                    <td>{{ $product->products_count }}</td>
                    <td>{{ $product->description }}</td>

                    <td><img src="{{ asset('uploads/Categories/' . $product->image) }}" width="70px" height="70px"
                            alt=""></td>

                    <td>{{ $product->created_at->diffForHumans() }}</td>



                </tr>


            @empty

                <tr>
                    <td colspan="6" class="text-center bg-dark text-white font-weight-bold">لا يوجد منتج</td>
                </tr>
            @endforelse


        </tbody>



    </table>

@endsection
