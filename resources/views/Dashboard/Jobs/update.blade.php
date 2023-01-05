@extends('layouts.dashboard')
@section('content')
    <form action="{{ route('dashboard.jobs.update', $myjop->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @include('Dashboard.Jobs._from')
    </form>
@endsection
