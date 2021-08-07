<input type="hidden" name="{{ $attributes['name'] }}" value="off">
<input
	{{ $attributes->merge(['class' => 'align-middle border border-gray-400 cursor-pointer h-5 inline-block rounded w-5']) }}
	@if($checked) checked @endif
	type="checkbox"
/>
