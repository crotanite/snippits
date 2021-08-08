<div {{ $attributes->merge(['class' => '']) }}data-masonry='{ "gutter": ".gutter-sizer", "itemSelector": ".grid-item", "percentPosition": true }'>
    <div class="gutter-sizer md:w-gutter"></div>
    {{ $slot }}
</div>
