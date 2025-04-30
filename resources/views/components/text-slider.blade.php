<div class="section-text-slider overflow-hidden">
    <div class="bg-black py-5">
        <div class="horizontal-slide flex items-center gap-x-6 whitespace-nowrap animate-slide">
            @foreach ($items as $item)
                <div class="flex items-center gap-x-6">
                    <!-- Text -->
                    <div class="font-syne text-[35px] font-bold leading-none tracking-[1px] text-colorLightLime">
                        {{ $item['text'] }}
                    </div>
                    <!-- Icon -->
                    @if (!empty($item['icon']))
                        <div class="h-10 min-w-[42px]">
                            <img src="{{ asset($item['icon']) }}" alt="separator-icon" width="74" height="70" class="h-10 w-auto" />
                        </div>
                    @endif
                </div>
            @endforeach

            {{-- Duplicate the same set for infinite scroll illusion --}}
            @foreach ($items as $item)
                <div class="flex items-center gap-x-6">
                    <!-- Text -->
                    <div class="font-syne text-[35px] font-bold leading-none tracking-[1px] text-colorLightLime">
                        {{ $item['text'] }}
                    </div>
                    <!-- Icon -->
                    @if (!empty($item['icon']))
                        <div class="h-10 min-w-[42px]">
                            <img src="{{ asset($item['icon']) }}" alt="separator-icon" width="74" height="70" class="h-10 w-auto" />
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>
