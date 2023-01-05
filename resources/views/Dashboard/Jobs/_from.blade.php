<div class="mb-3">
    <label for="namejop" class="form-label">أسم الوظيفة :-</label>
    <input type="text" name="name" value="{{ isset($myjop->name) ? $myjop->name : '' }}" @class(['form-control', 'is-invalid' => $errors->has('name')])
        id="namejop">
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="titlejop" class="form-label"> المسمى الوظيفى :-</label>
    <input type="text" name="joptitle" value="{{ isset($myjop->joptitle) ? $myjop->joptitle : '' }}"
        @class(['form-control', 'is-invalid' => $errors->has('joptitle')]) id="titlejop">
    @error('joptitle')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="formFileLg" class="form-label"> صورة الوظيفة :-</label>
    <input class="form-control" name="image" id="formFileLg" value="{{ isset($myjop->image) ? $myjop->image : '' }}"
        type="file" @class(['form-control', 'is-invalid' => $errors->has('image')])>
    @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <div class="form-floating">
        <label for="formFileLg" class="form-label"> الوصف الوظيفى :-</label>
        <textarea @class([
            'form-control',
            'is-invalid' => $errors->has('jopdescription'),
        ]) name="jopdescription" id="editor" rows="5" style="height: 100px">{{ isset($myjop->jopdescription) ? $myjop->jopdescription : '' }}</textarea>
        @error('jopdescription')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="mb-3">
    <div class="form-floating">
        <label for="formFileLg" class="form-label"> المتطلبات الوظيفية :-</label>
        <textarea @class([
            'form-control',
            'is-invalid' => $errors->has('joprequirement'),
        ]) name="joprequirement" id="editor" rows="5" style="height: 100px">{{ isset($myjop->joprequirement) ? $myjop->joprequirement : '' }}</textarea>
        @error('joprequirement')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<input type="submit" class="btn btn-primary" value="أنشأ الوظيفة">
