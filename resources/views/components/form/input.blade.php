@props([
    'label' => '',
    'name',
    'type' => 'text',
    'required' => false,
    'value' => '',
    'placeholder' => '',
])

<div>
    @if ($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-muted-foreground mb-2">
            {{ $label }}
            @if ($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <input
        {{ $attributes->merge([
            'type' => $type,
            'name' => $name,
            'id' => $name,
            'value' => old($name, $value),
            'required' => $required,
            'placeholder' => $placeholder,
            'class' =>
                'w-full rounded-lg border border-border bg-background text-foreground py-2 px-3 focus:ring-2 focus:ring-primary focus:border-primary transition-colors',
        ]) }} />

    @error($name)
        <p class="mt-1 text-sm text-destructive">{{ $message }}</p>
    @enderror
</div>
