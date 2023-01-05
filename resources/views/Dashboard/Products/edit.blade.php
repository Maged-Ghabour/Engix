@extends('layouts.dashboard')

@section('title', 'تعديل تصنيف')



@section('breadcrump')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('dashboard.products.index') }}">التصنيفات</a></li>
    <li class="breadcrumb-item"><a href="{{ route('dashboard.products.edit', $product->id) }}">تعديل تصنيف</a></li>
@endsection





@section('content')
    <form id="form" action="{{ route('dashboard.products.update', $product->id) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        @method('put')
        @include('Dashboard.Products._from')
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
                    $("select.category_id").each(function() {
                        $(this).rules("add", {
                            required: true
                        });
                    }),
                    $("input.price").each(function() {
                        $(this).rules("add", {
                            required: true
                        });
                    }),
                    $("input.compare_price").each(function() {
                        $(this).rules("add", {
                            required: true
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
                    name: {
                        required: true,
                        minlength: 3,
                        maxlength: 50
                    },
                    category_id: {
                        required: true,
                    },
                    description: {
                        required: true,

                    },

                    price: {
                        required: true
                    },
                    compare_price: {
                        required: true
                    },
                },
                submitHandler: function(form) {
                    form.submit();
                },
            });
        });
    </script>
@endpush
