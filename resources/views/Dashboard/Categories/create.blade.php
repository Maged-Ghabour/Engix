@extends('layouts.dashboard')

@section('title', 'إضافة تصنيف جديد')



@section('breadcrump')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('dashboard.categories.index') }}">التصنيفات</a></li>
    <li class="breadcrumb-item"><a href="{{ route('dashboard.categories.create') }}">إضافة تصنيف جديد</a></li>
@endsection





@section('content')
    <form id="form"  action="{{ route('dashboard.categories.store') }}" method="post" enctype="multipart/form-data">
        @csrf
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

                    description: {
                        required: true,

                    },
                    image: {
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
