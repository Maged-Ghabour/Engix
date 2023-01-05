@extends('layouts.dashboard')

@section('title', 'تعديل العرض')



@section('breadcrump')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('dashboard.offers.index') }}">العروض</a></li>
    <li class="breadcrumb-item"><a href="{{ route('dashboard.offers.edit', $offer->id) }}">تعديل العرض</a></li>
@endsection





@section('content')
    <form id="form" action="{{ route('dashboard.offers.update', $offer->id) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        @method('put')
        @include('Dashboard.Offers._from')
    </form>

@endsection


@push('scripts')
    {{-- inputs Validation --}}
    <script>
        $(document).ready(function() {

            $("#form").on("submit", function(e) {
                $("textarea.description").each(function() {
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
