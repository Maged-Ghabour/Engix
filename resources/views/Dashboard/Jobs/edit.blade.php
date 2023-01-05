@extends('layouts.dashboard')

@section('title', 'تعديل تصنيف')



@section('breadcrump')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('dashboard.categories.index') }}">التصنيفات</a></li>
    <li class="breadcrumb-item"><a href="{{ route('dashboard.categories.edit', $category->id) }}">تعديل تصنيف</a></li>
@endsection





@section('content')
    <form id="form" action="{{ route('dashboard.categories.update', $category->id) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        @method('put')
        @include('Dashboard.Categories._from')
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
                    $("input.joptitle").each(function() {
                        $(this).rules("add", {
                            required: true
                        });
                    }),
                    $("input.image").each(function() {
                        $(this).rules("add", {
                            required: true
                        });
                    }),
                    $("input.jopdescription").each(function() {
                        $(this).rules("add", {
                            required: true
                        });
                    }),
                    $("input.joprequirement").each(function() {
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
                    joptitle: {
                        required: true,
                    },
                    image: {
                        required: true,

                    },
                    jopdescription: {
                        required: true
                    },
                    joprequirement: {
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
