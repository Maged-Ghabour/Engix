@extends('layouts.dashboard')
@section('content')
    <form id="form" action="{{ route('dashboard.jobs.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('Dashboard.Jobs._from')
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
