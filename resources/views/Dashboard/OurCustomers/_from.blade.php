<div class="mb-3">
    <label for="title">اسم العميل</label>
    <input type="text" name="title" @class(['form-control', 'is-invalid' => $errors->has('title')]) value="{{ $customer->title }}" />
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

{{--
<div class="mb-3">
    <label for="parent_id">اسم العرض التابع</label>
    <select name="parent_id" id="name" @class([ 'form-control p-1' , 'is-invalid'=> $errors->has('parent_id'),
        ])>
        <option value="">العرض الرئيسي</option>
        @foreach ($parents as $parent)
        <option value="{{ $parent->id }}" @selected($offer->parent_id == $parent->id)>{{ $parent->name }}</option>
        @endforeach
    </select>
    @error('parent_id')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div> --}}



<div class="mb-3">
    <label for="description">وصف العميل</label>
    <textarea name="description" id="editor" rows="7" @class([
        'form-control p-1',
        'is-invalid' => $errors->has('description'),
    ])>{{ $customer->description }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


{{--
<div class="mb-3">
    <label for="features">مميزات العرض</label>
    <textarea name="features" id="editor" rows="7" @class(['form-control p-1', 'is-invalid' => $errors->has('features')])>{{ $offer->description }}</textarea>
    @error('features')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div> --}}


<div class="mb-3">
    <label for="image">رفع صورة العميل</label>
    <input type="file" name="image" id="image" @class(['form-control p-1', 'is-invalid' => $errors->has('image')]) />

    @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

@if ($customer->image)
    <img src="{{ asset('uploads/Customers/' . $customer->image) }}" class="img-fluid rounded mb-2 d-block"
        style="height: 150px ; wight:150px" alt="">
@endif


{{--

<div class="mb-3">
    <label for="expire_date">تاريخ الانتهاء</label>
    <input type="date" name="expire_date" id="expire_date" @class([
        'form-control p-1',
        'is-invalid' => $errors->has('expire_date'),
    ]) />

    @error('expire_date')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div> --}}






<button type="submit" class="btn btn-primary">حفظ</button>
