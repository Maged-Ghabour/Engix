@extends('layouts.PDF.dashboardPDF')
@section('content')
    <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="{{ asset('uploads/CV/' . $CV->CV) }}" allowfullscreen></iframe>
    </div>
@endsection
