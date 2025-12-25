@props([
    'id',
    'name',
    'label' => null,
    'value' => '',
    'options' => [],
])

<div class="mb-4">
    @if ($label)
           <label class="block text-gray-700 font-bold" for="{{$id}}">{{ $label }}</label>
    @endif
     
{{-- @php dump($options); @endphp --}}

 <select id="{{$id}}" name="{{ $name }}"
            class="w-2xs px-4 py-2 border rounded focus:outline-none @error($name) border-red-500 @enderror">
     @foreach ($options as $optionValue => $optionLabel)
         <option value="{{$optionValue}}" {{old($name, $value) == $optionValue ? 'selected' : ''}}> {{$optionLabel}}
                </option>
    @endforeach  
        </select>
{{-- @php
dump([
        'optionValue' => $optionValue,
        'optionlabel' => $optionLabel,
    ]);
@endphp --}}
    @error($name)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>