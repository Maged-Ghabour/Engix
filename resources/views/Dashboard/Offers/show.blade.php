@extends("layouts.dashboard")

@section("title" , $category->name)



    @section("breadcrump")
    @parent
        <li class="breadcrumb-item"><a href="{{route('dashboard.categories.index')}}">التصنيفات</a></li>
        <li class="breadcrumb-item"><a href="{{route('dashboard.categories.edit' , $category->id)}}">{{$category->name}}</a></li>
    @endsection





@section("content")


<table class="table">
    <thead>
        <th>#</th>
        <th>اسم المنتج</th>
        <th>سعر المنتج</th>
        <th>الوصف</th>
        <th>الصورة</th>
        <th>تاريخ الاضافة</th>

    </thead>

    <tbody>
        @forelse ($category->products as $product )

        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->description}}</td>
            <td><img src="{{asset('uploads/Products/'.$product->image)}}" width="70px" height="70px" alt=""></td>

            <td>{{$product->created_at->diffForHumans()}}</td>


        </tr>


        @empty

            <tr>
                <td colspan="6" class="text-center bg-dark text-white font-weight-bold" >لا يوجد منتجات متاحة</td>
            </tr>
        @endforelse


    </tbody>



</table>

@endsection
