@extends('layouts.dashboard')
@section('content')
    <table class="table">
        <tr>
            <td>#</td>
            <td>اسم المتقدم بالكامل</td>
            <td>ملف سيرتة الذاتية</td>
            <td>تاريخ تقديمة</td>
            <td>ازالة</td>
        </tr>
        @foreach ($AllCV as $CV)
            <tr>
                <td>{{ $CV->id }}</td>
                <td>{{ $CV->name }}</td>
                <td><a href="{{ route('dashboard.MyCv', $CV->id) }}" class="btn btn-link"> {{ $CV->CV }}</a></td>
                <td>{{ $CV->created_at->format('Y-m-d') }}</td>
                <td>
                    <form action="{{ route('dashboard.destroy', $CV->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <input type="submit" class="btn btn-outline-danger" value="حذف">
                    </form>
                </td>
                {{-- <a href="{{ route('dashboard.destroy', $CV->id) }}" class="btn btn-outline-danger"> حذف</a> --}}
            </tr>
        @endforeach
    </table>
@endsection
