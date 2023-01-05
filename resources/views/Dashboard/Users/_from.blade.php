<div class="mb-3">
    <label for="name">اسم المستخدم</label>
    <input type="text" name="name" @class(['form-control', 'is-invalid' => $errors->has('name')]) value="{{ $user->name }}" />
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="email">البريد الالكتروني </label>
    <input type="text" name="email" @class(['form-control', 'is-invalid' => $errors->has('email')]) value="{{ $user->email }}" />
    @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="email">كلمة المرور </label>
    <input type="password" name="password" @class(['form-control', 'is-invalid' => $errors->has('password')]) value="{{ $user->password }}" />
    @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>



<button type="submit" class="btn btn-primary">حفظ</button>
