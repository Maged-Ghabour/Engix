@extends('layouts.dashboard')

@section('title', 'إضافة مستخدم جديد')



@section('breadcrump')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('dashboard.users.index') }}">المستخدمين</a></li>
    <li class="breadcrumb-item"><a href="{{ route('dashboard.users.create') }}">إضافة مستخدم جديد</a></li>
@endsection





@section('content')
    <form id="form" action="{{ route('dashboard.users.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('Dashboard.Users._from')
    </form>

@endsection


@push('scripts')
    {{-- inputs Validation --}}
    <script>
        $(document).ready(function() {

            $("#form").on("submit", function(e) {
                $("input.name").each(function() {
                        $(this).rules("add", {
                            required: true,
                        });
                    }),
                    $("input.email").each(function() {
                        $(this).rules("add", {
                            required: true
                        });
                    }),
                    $("input.password").each(function() {
                        $(this).rules("add", {
                            required: true
                        });
                    }),
                    e.preventDefault();
            });

            // Start Form Validation
            $("#form").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 3,
                        maxlength: 50
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                        minlength: 8

                    },
                },
                submitHandler: function(form) {
                    form.submit();
                },
            });
        });
    </script>
@endpush
