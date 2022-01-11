<ul class="{{ config('language.flags.ul_class') }} text-sm">
@foreach (language()->allowed() as $code => $name)
    <li class="{{ config('language.flags.li_class') }} opacity-25 hover:opacity-100 mb-1">
        <a href="{{ language()->back($code) }}" class="flex">
            <img src="{{ asset('vendor/akaunting/language/src/Resources/assets/img/flags/'. language()->country($code) .'.png') }}" alt="{{ $name }}" class="rounded-full w-6 h-auto"/> &nbsp; {{ $name }}
        </a>
    </li>
@endforeach
</ul>