@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                {{ $onejop->name }}
            </div>
            <div class="card-body">
                <h5>الوصف الوظيفى :- </h5>
                <p><?php echo "$onejop->jopdescription"; ?></p>
                <h5>المهارات المطلوبة :- </h5>
                <p><?php echo "$onejop->joprequirement"; ?></p>
                <p class="card-text">تاريخ الناشر :- {{ $onejop->created_at->format('Y-m-d') }}</p>
            </div>
        </div>
    </div>
@endsection
