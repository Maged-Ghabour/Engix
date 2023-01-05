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
                    $("select.parent_id").each(function() {
                        $(this).rules("add", {
                            required: true
                        });
                    }),
                    $("textarea.description").each(function() {
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
                    parent_id: {
                        required: true,
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
