@extends('layouts.dashboard')

@section('title', 'إضافة عرض جديد')



@section('breadcrump')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('dashboard.offers.index') }}">العروض</a></li>
    <li class="breadcrumb-item"><a href="{{ route('dashboard.offers.create') }}">إضافة عرض جديد</a></li>
@endsection





@section('content')
    <form id="form" action="{{ route('dashboard.offers.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('Dashboard.Offers._from')
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
                    $("textarea.features").each(function() {
                        $(this).rules("add", {
                            required: true
                        });
                    }),
                    $("input.image").each(function() {
                        $(this).rules("add", {
                            required: true
                        });
                    }),
                    $("input.expire_date").each(function() {
                        $(this).rules("add", {
                            required: true
                        });
                    }),
                    e.preventDefault();
            });

            // Start Form Validation
            $("#form").validate({
                rules: {
                    description: {
                        required: true,
                        minlength: 3,
                        maxlength: 50
                    },
                    features: {
                        required: true,
                    },
                    image: {
                        required: true,

                    },
                    expire_date: {
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
