@extends('layouts.dashboard')

@section('title', 'تعديل مستخدم')



@section('breadcrump')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('dashboard.users.index') }}">المستخدمين</a></li>
    <li class="breadcrumb-item"><a href="{{ route('dashboard.users.edit', $user->id) }}">تعديل مستخدم</a></li>
@endsection





@section('content')
    <form id="form" action="{{ route('dashboard.users.update', $user->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
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
                    },
                    password: {
                        required: true,

                    },
                },
                submitHandler: function(form) {
                    form.submit();
                },
            });
        });
    </script>
@endpush
