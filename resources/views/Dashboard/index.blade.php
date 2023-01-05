@extends('layouts.dashboard')

<!-- Start Section Title  -->
@section('title', 'لوحة التحكم')
<!-- End Section Title  -->

<!-- Start Section Breadcrump  -->
@section('breadcrump')
    @parent
    <!---  Inheret From Layout -->
@endsection
<!-- End Section Breadcrump  -->

<!-- Start Section Content  -->
@section('content')
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-store"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">التصنيفات</span>
                    <span class="info-box-number">{{ $catsCount }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>


        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-bullhorn"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">المنتجات</span>
                    <span class="info-box-number">{{ $productsCount }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>


        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-gift"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">العروض</span>
                    <span class="info-box-number">{{ $offersCount }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>


        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-hourglass"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">الوظائف</span>
                    <span class="info-box-number">{{ $jobsCount }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>



        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-gradient-danger elevation-1"><i class="fas fa-user-plus"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">عملاؤنا</span>
                    <span class="info-box-number">{{ $customersCount }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>


        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-gradient-danger elevation-1"><i class="fas fa-user-plus"></i></span>

                <a href="{{ route('dashboard.orders.index') }}">
                    <div class="info-box-content">
                        <span class="info-box-text">الطلبات</span>
                        <span class="info-box-number">{{ $orders }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </a>
            </div>
            <!-- /.info-box -->
        </div>


        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-gradient-warning elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">المستخدمين</span>
                    <span class="info-box-number">{{ $usersCount }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

    </div>
@endsection
<!-- End Section Breadcrump  -->
