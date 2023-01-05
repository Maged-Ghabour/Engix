@extends('layouts.dashboard')

@section('title', 'المنتجات')



@section('breadcrump')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('dashboard.products.index') }}">المنتجات</a></li>
@endsection





@section('content')


    <x-alert type="success" color="success" />
    <x-alert type="deleted" color="danger" />
    <x-alert type="updated" color="primary" />





    <div class="row mb-3">
        <div class="col-6">
            <form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between">
                <x-form.input name="name" placeholder="البحث عن طريق اسم المنتج" :value="request('name')" />
                <button class="btn btn-dark mx-3">ابحث</button>
            </form>
        </div>

        <div class="col-6">
            <a class="btn btn-success mb-2 float-right" href="{{ route('dashboard.products.create') }}">إضافة منتج جديد
                <i class="fas fa-plus fa-sm"></i>
            </a>
        </div>

    </div>


    <table class="table">
        <thead>
            <th>#</th>
            <th>اسم المنتج</th>
            <th>التصنيف</th>
            <th>سعر المنتج</th>
            <th>الوصف</th>
            <th>الصورة</th>
            <th>تاريخ الاضافة</th>
            <th>التعديل</th>
            <th>الحذف</th>
        </thead>


        <tbody>
            @forelse ($products as $product)
                <tr>

                    <td>{{$products->firstItem()+$loop->index}}</td>
                    <td><span class="bg bg-info p-1 rounded">{{ $product->name }}</span></td>
                    <td> <span class="bg-teal color-palette rounded p-1">{{ $product->category->name }}</span></td>

                    <td>{{ $product->price }}</td>
                    <td>{!! $product->description !!}</td>
                    <td><img src="{{ asset('uploads/Products/' . $product->image) }}" width="70px" height="70px"
                            alt=""></td>

                    <td>
                        <small class="badge badge-secondary">
                            {{ $product->created_at->diffForHumans() }}
                            <li class="far fa-clock"></li>
                        </small>
                    </td>




                    {{-- <td>
                <form action="{{route('dashboard.products.edit' , $product->id)}}" method="get">
                    <button class="btn btn-outline-primary">تعديل</button>
                </form>
            </td> --}}

                    <td>
                        <a class="btn btn-outline-primary"
                            href="{{ route('dashboard.products.edit', $product->id) }}">تعديل</a>
                    </td>
                    <td>
                        <form action="{{ route('dashboard.products.destroy', $product->id) }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-outline-danger">حذف</button>
                        </form>
                    </td>

                </tr>


            @empty

                <tr>
                    <td colspan="9" class="text-center bg-dark text-white font-weight-bold">لا يوجد منتجات متاحة</td>
                </tr>
            @endforelse


        </tbody>




    </table>



    {{ $products->withQueryString()->links() }}

    </table>

@endsection
