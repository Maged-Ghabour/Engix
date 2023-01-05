@extends('layouts.dashboard')

@section('title', 'إضافة عميل جديد')



@section('breadcrump')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('dashboard.ourCustomers.index') }}">عملاؤنا</a></li>
    <li class="breadcrumb-item"><a href="{{ route('dashboard.ourCustomers.create') }}">إضافة عميل جديد</a></li>
@endsection





@section('content')
    <form id="form" action="{{ route('dashboard.ourCustomers.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('Dashboard.OurCustomers._from')
    </form>

@endsection

@push('scripts')
    {{-- inputs Validation --}}
    <script>
        $(document).ready(function() {

            $("#form").on("submit", function(e) {
                $("input.title").each(function() {
                        $(this).rules("add", {
                            required: true,
                        });
                    }),
                    $("textarea.description").each(function() {
                        $(this).rules("add", {
                            required: true
                        });
                    }),
                    $("input.image").each(function() {
                        $(this).rules("add", {
                            required: true
                        });
                    }),

                    e.preventDefault();
            });

            // Start Form Validation
            $("#form").validate({
                rules: {
                    title: {
                        required: true,
                        minlength: 3,
                        maxlength: 50
                    },
                    description: {
                        required: true,
                    },
                    image: {
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
