@extends('layouts.dashboard')

@section('title', 'العروض المتاحة')



@section('breadcrump')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('dashboard.offers.index') }}">العروض</a></li>
@endsection





@section('content')



    <x-alert type="success" color="success" />
    <x-alert type="deleted" color="danger" />
    <x-alert type="updated" color="primary" />




    <div class="row mb-3">
        <div class="col-6">
            <form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between">
                <x-form.input name="name" placeholder="البحث عن طريق اسم العرض" :value="request('name')" />
                <button class="btn btn-dark mx-3">ابحث</button>
            </form>
        </div>

        <div class="col-6">
            <a class="btn btn-success mb-2 float-right" href="{{ route('dashboard.offers.create') }}">إضافة عرض جديد
                <i class="fas fa-plus fa-sm"></i>
            </a>
        </div>

    </div>


    <table class="table">
        <thead>
            <th>#</th>
            <th>اسم العرض</th>
            {{-- <th>اسم التصنيف التابع</th> --}}
            {{-- <th>عدد المنتجات</th> --}}
            <th>الوصف</th>
            <th>صورة العرض</th>
            <th>تاريخ الانتهاء</th>
            <th>مميزات العرض</th>
            <th>تاريخ الاضافة</th>
            <th>التعديل</th>
            <th>الحذف</th>
        </thead>

        <tbody>
            @forelse ($offers as $offer)
                <tr>
                    <td>{{ $offer->id }}</td>
                    <td>
                        <a href="{{ route('dashboard.offers.show', $offer->id) }}">
                            {{ $offer->title }}
                        </a>
                    </td>
                    {{-- <td>{{$offer->parent->name}}</td>
            <td>{{$offer->products_count}}</td> --}}


                    <td>{!! $offer->description !!}</td>

                    <td><img src="{{ asset('uploads/Offers/' . $offer->image) }}" width="70px" height="70px"
                            alt=""></td>

                    <td>{{ $offer->expire_date }}</td>
                    <td>{!! $offer->features !!}</td>
                    <td>
                        <small class="badge badge-secondary">
                            {{ $offer->created_at->diffForHumans() }}
                            <li class="far fa-clock"></li>
                        </small>
                    </td>

                    <td>
                        <a class="btn btn-outline-primary" href="{{ route('dashboard.offers.edit', $offer->id) }}">تعديل</a>
                    </td>
                    <td>
                        <form action="{{ route('dashboard.offers.destroy', $offer->id) }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-outline-danger">حذف</button>
                        </form>
                    </td>

                </tr>


            @empty

                <tr>
                    <td colspan="9" class="text-center bg-dark text-white font-weight-bold">لا يوجد عروض متاحة</td>
                </tr>
            @endforelse


        </tbody>



    </table>


    {{ $offers->withQueryString()->links() }}
@endsection
