@extends('Front.layouts.app')

@section('title', $customer->title)

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-4">
                <div class="card">

                    <div class="card-body">
                        <div class="col-8 mx-auto d-flex  mw-100 text-center">
                            <h2 class="mt-5 text-center mw-100 "><?= $customer->title ?></h2>
                        </div>

                        <div class="col-8 mx-auto d-flex  mw-100">
                            <h4 class="mt-5 mw-100"><?= $customer->description ?></h4>
                        </div>


                    </div>
                </div>
            </div>


        </div>
    </div>

@endsection
