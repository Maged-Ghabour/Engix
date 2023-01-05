@props(['name', 'value' => ''])


<textarea name="{{ $name }}"
    {{ $attributes->class(['form-control features', 'p-1', 'is-invalid' => $errors->has($name)]) }}>{{ old($name, $value) }}
</textarea>

@error($name)
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
