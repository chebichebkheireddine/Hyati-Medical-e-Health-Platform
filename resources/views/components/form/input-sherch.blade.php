@props(['name', 'type' => 'text', 'req' => 'required', 'icon'])
<input class="w-full border h-8 shadow p-4 rounded-full  " type="{{ $type }}" name="{{ $name }}"
    placeholder="Search">
<x-form.error name="{{ $name }}" />
<button type="submit">
    <i class="fa fa-search text-teal-400 h-5 w-5 absolute top-3.5 right-3 fill-current "></i>
</button>
