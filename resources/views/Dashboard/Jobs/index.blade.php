@extends('layouts.dashboard')
@section('content')
    <x-alert type="success" color="success" />
    <x-alert type="deleted" color="danger" />
    <x-alert type="updated" color="primary" />


    <div class="container">
        {{-- {{ route('dashboard.create') }} --}}
        <form action="{{ route('dashboard.jobs.create') }}" method="get" class="mb-2">
            @csrf
            <input type="submit" class="btn btn-success" value="أضافة وظيفة جديدة" />
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">رقم الوظيفة</th>
                    <th scope="col">اسم الوظيفة</th>
                    <th scope="col">المسمى الوظيفى</th>
                    <th scope="col">صورة الوظيفة</th>
                    <th scope="col">تعديل</th>
                    <th scope="col">ازالة</th>
                    <th scope="col">عرض</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jops as $jop)
                    <tr>
                        <td> {{ $jop->id }} </td>
                        <td><a href="{{ route('dashboard.allCV', $jop->id) }}" class="btn btn-link">
                                {{ $jop->name }}</a></td>
                        <td>{{ $jop->joptitle }}</td>
                        <td><img src="{{ asset('uploads/Jops/' . $jop->image) }}" width="70px" /> </td>
                        <td>
                            <form action="{{ route('dashboard.jobs.edit', $jop->id) }}" method="get">
                                <button class="btn btn-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('dashboard.jobs.destroy', $jop->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('dashboard.jobs.show', $jop->id) }}" method="get">
                                @csrf
                                <button class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-reply-all-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M8.021 11.9 3.453 8.62a.719.719 0 0 1 0-1.238L8.021 4.1a.716.716 0 0 1 1.079.619V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z" />
                                        <path
                                            d="M5.232 4.293a.5.5 0 0 1-.106.7L1.114 7.945a.5.5 0 0 1-.042.028.147.147 0 0 0 0 .252.503.503 0 0 1 .042.028l4.012 2.954a.5.5 0 1 1-.593.805L.539 9.073a1.147 1.147 0 0 1 0-1.946l3.994-2.94a.5.5 0 0 1 .699.106z" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


        {{ $jops->links() }}
    </div>
@endsection
