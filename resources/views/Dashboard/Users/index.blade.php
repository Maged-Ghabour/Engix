@extends('layouts.dashboard')

@section('title', 'المستخدمين ')



@section('breadcrump')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('dashboard.users.index') }}">المستخدمين</a></li>
@endsection





@section('content')


    <x-alert type="success" color="success" />
    <x-alert type="deleted" color="danger" />
    <x-alert type="updated" color="primary" />


    <div class="row mb-3">
        <div class="col-6">
            <form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between">
                <x-form.input name="name" placeholder="البحث عن طريق اسم المستخدم" :value="request('name')" />
                <button class="btn btn-dark mx-3">ابحث</button>
            </form>
        </div>

        <div class="col-6">
            <a class="btn btn-success mb-2 float-right" href="{{ route('dashboard.users.create') }}">إضافة مستخدم جديد
                <i class="fas fa-plus fa-sm"></i>
            </a>
        </div>

    </div>


    <table class="table">
        <thead>
            <th>#</th>
            <th>اسم المستخدم</th>
            <th>البريد الالكتروني </th>
            {{-- <th>كلمة المرور </th> --}}
            <th>تاريخ الاضافة</th>
            <th>الحذف</th>
        </thead>

        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>

                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    {{-- <td>{{ $user->password }}</td> --}}





                    <td>{{ $user->created_at->diffForHumans() }}</td>
                    {{-- <td>
                <form action="{{route('dashboard.categories.edit' , $category->id)}}" method="get">
                    <button class="btn btn-outline-primary">تعديل</button>
                </form>
            </td> --}}


                    <td>
                        <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-outline-danger">حذف</button>
                        </form>
                    </td>

                </tr>


            @empty

                <tr>
                    <td colspan="9" class="text-center bg-dark text-white font-weight-bold">لا يوجد مستخدمين حاليا</td>
                </tr>
            @endforelse


        </tbody>



    </table>


    {{ $users->links() }}
@endsection
