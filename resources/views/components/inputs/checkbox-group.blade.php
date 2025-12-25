@props([
    'idPrefix' => null,
    'name',
    'groupLabel' => null,
    'options' => [],
    'selected' => [],
])
{{--  --}}
@php
$current = old($name, $selected);
// dump([$current]);
$idPrefix = $idPrefix ?? $name;
@endphp
{{--  --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4 ">
@foreach ($options as $optionValue => $optionLabel)
    @php
        // am slugs ca optionValue: manufacturer, inf_services...
        $inputId = "$idPrefix-$optionValue";
            // dump([
            //     'optionValue' => $optionValue,
            //     'optionLabel' => $optionLabel,
            //     'inputId' => $inputId,
            // ]);
    @endphp

          <div class="flex items-center">
                    <input id="{{ $inputId }}"  name="{{$name}}[]" type="checkbox" value="{{$optionValue}}"
                        class="w-4 h-4 border border-gray-400 rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft"
                        {{ in_array($optionValue, $current) ? 'checked' : '' }}>

                        <label for="{{ $inputId }}" 
                        class="select-none ms-2 text-sm font-medium text-heading">{{ $optionLabel }}</label>
                </div>
@endforeach
    
</div>