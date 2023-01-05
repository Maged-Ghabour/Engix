@extends('layouts.dashboard')

@section('title', 'تعديل تصنيف')



@section('breadcrump')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('dashboard.ourCustomers.index') }}">عملاؤنا</a></li>
    <li class="breadcrumb-item"><a href="{{ route('dashboard.ourCustomers.edit', $customer->id) }}">تعديل عميل</a></li>
@endsection





@section('content')
    <form id="form" action="{{ route('dashboard.ourCustomers.update', $customer->id) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        @method('put')
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

                },
                submitHandler: function(form) {
                    form.submit();
                },
            });
        });
    </script>
@endpush
