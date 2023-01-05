@extends('layouts.dashboard')

@section('title', 'التصنيفات المتاحة')



@section('breadcrump')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('dashboard.categories.index') }}">التصنيفات</a></li>
@endsection





@section('content')



    <x-alert type="success" color="success" />
    <x-alert type="deleted" color="danger" />
    <x-alert type="updated" color="primary" />



    <div class="row mb-3">
        <div class="col-6">
            <form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between">
                <x-form.input name="name" placeholder="البحث عن طريق اسم التصنيف" :value="request('name')" />
                <button class="btn btn-dark mx-3">ابحث</button>
            </form>
        </div>

        <div class="col-6">
            <a class="btn btn-success mb-2 float-right" href="{{ route('dashboard.categories.create') }}">إضافة تصنيف جديد
                <i class="fas fa-plus fa-sm"></i>
            </a>
        </div>

    </div>
    <table class="table">
        <thead>
            <th>#</th>
            <th>اسم التصنيف</th>
            <th>اسم التصنيف التابع</th>
            <th>عدد المنتجات</th>
            <th>الوصف</th>
            <th>الصورة</th>
            <th>تاريخ الاضافة</th>
            <th>التعديل</th>
            <th>الحذف</th>
        </thead>

        <tbody>

            @forelse ($categories as $key => $category)
                <tr>

                    <td>{{ $categories->firstItem() + $loop->index }}</td>

                    <td><a class="btn btn-info" href="{{ route('dashboard.categories.show', $category->id) }}">
                            {{ $category->name }}</a></td>
                    <td><span class="bg-teal color-palette rounded p-1">{{ $category->parent->name }}</span></td>
                    <td>{{ $category->products_count }}</td>
                    <td>{{ $category->description }}</td>

                    <td><img src="{{ asset('uploads/Categories/' . $category->image) }}" width="70px" height="70px"
                            alt=""></td>

                    <td>
                        <small class="badge badge-secondary">
                            {{ $category->created_at->diffForHumans() }}
                            <li class="far fa-clock"></li>
                        </small>
                    </td>
                    {{-- <td>
                <form action="{{route('dashboard.categories.edit' , $category->id)}}" method="get">
                    <button class="btn btn-outline-primary">تعديل</button>
                </form>
            </td> --}}

                    <td>
                        <a class="btn btn-outline-primary"
                            href="{{ route('dashboard.categories.edit', $category->id) }}">تعديل</a>
                    </td>
                    <td>
                        <form action="{{ route('dashboard.categories.destroy', $category->id) }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-outline-danger">حذف</button>
                        </form>
                    </td>

                </tr>


            @empty

                <tr>
                    <td colspan="9" class="text-center bg-dark text-white font-weight-bold">لا يوجد تصنيفات متاحة</td>
                </tr>
            @endforelse

        </tbody>

    </table>

    {{ $categories->withQueryString()->links() }}

@endsection
