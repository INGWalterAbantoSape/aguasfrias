<div {{ $attributes->merge(['class' => 'bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5']) }}>
    <div class="flex justify-between mb-6">
        <div>
            <div class="flex items-center mb-1">
                <div class="text-2xl font-semibold">{{ $cantidad }}</div>
            </div>
            <div class="text-sm font-medium text-gray-400">{{ $titulo }}</div>
        </div>
        <div class="dropdown">
            <button type="button" class="dropdown-toggle text-gray-400 hover:text-gray-600"><i
                    class="ri-more-fill"></i></button>
            <ul
                class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                @foreach ($items as $item)
                    <li>
                        <a href="{{ $item['link'] }}"
                            class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">{{ $item['text'] }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <a href="{{ $link }}" class="text-[#f84525] font-medium text-sm hover:text-red-800">Ver</a>
</div>
