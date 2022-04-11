<div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        @if ($data)
        <div class="intro-y col-span-12 lg:col-span-12">
            <div class="alert alert-dark show intro-y">
                <div class="mt-2">
                    @if ($data)
                    @foreach ($data as $item)
                    <div class="intro-x">
                        <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                            <div class="mr-auto">
                                <div class="font-medium">
                                    <a href="/subordinate?key={{ $item->getKey() }}" class="text-gray-700">{{ $item->username }}</a>
                                </div>
                                <div class="text-gray-600 text-xs mt-0.5">Level {!! ($item->level) !!}</div>
                            </div>
                            <div class="text-gray-700">
                                {{ number_format($item->contract->value) }}<br>
                                @if ($item->actived_at)
                                    <small>Active</small>
                                @else
                                    <small>Inactive</small>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    {{-- <a href="" class="intro-x w-full block text-center rounded-md py-3 border border-dotted border-theme-15 dark:border-dark-5 text-theme-16 dark:text-gray-600">View More</a> --}}
                </div>
            </div>
        </div>
        @else
        <div class="text-center box bg-theme-12">
            <h4>Member Data not found</h4>
        </div>
        @endif
    </div>
</div>
