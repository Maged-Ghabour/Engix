@extends('Front.layouts.app')


@section('content')
    <div class="row justify-content-center">
        <div class="single-product col-6">
            <div class="product-image ">
                <img src="{{ asset('uploads/jops/' . $jop->image) }}" alt="#" />
            </div>
        </div>
    </div>

    <div class="col-5 mt-5 pt-5">
        <p class="d-block fs-2 fw-bold text-center "><u>الوصف الوظيفى</u></p>
    </div>
    <div class="col-8 mx-auto d-flex ">
        <div class="mt-5"><?= $jop->jopdescription ?></div>
    </div>
    <div class="col-5 mt-5 pt-5">
        <p class=" fs-2 fw-bold text-center">
            <u>
                المتطلبات الوظيفية
            </u>
        </p>
    </div>
    <div class="col-8 mx-auto d-flex pb-5">
        <div class="mt-5 ">
            <?= $jop->joprequirement ?>
        </div>
    </div>


    <hr width="100%" class="hr">

    <div class="text-danger p-5  col-5">
        <p class="d-block fs-2 fw-bold text-center">تقديم للوظيفة</p>
    </div>
    <div class="col-8 mx-auto bg-light px-2 mb-5">
        <div class="p-5">
            <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group  p-1">
                    <label for="exampleInputEmail1" class="form-label font-weight-bold">الاسم بالكامل</label>
                    <input type="text" name="name" @class(['form-control', 'is-invalid' => $errors->has('name')]) id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group p-1">
                    <label for="exampleFormControlFile1" class="form-label font-weight-bold">ارسال السيرة
                        الذاتية</label>
                    <input type="file" name="CV" class="form-control form-control" id="exampleFormControlFile1">
                    @error('CV')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <input type="hidden" name="id" value="{{ $jop->id }}">
                <div class="col-12 text-center  p-1">
                    <button type="submit" class="btn btn-danger w-25">ارسال</button>
                </div>
            </form>
        </div>
    </div>
@endsection
