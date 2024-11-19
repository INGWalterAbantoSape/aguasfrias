<nav class="flex space-x-4 justify-items-end">
    @auth
        <a
            href="{{ url('/principal') }}"
            class="rounded-md px-3 py-2  text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-slate-900 dark:hover:text-white/80 dark:focus-visible:ring-white"
        >
            Inicio de sesión
        </a>
    @else
        <a
            href="{{ route('login') }}"
            class="rounded-lg px-3 py-2  text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
        >
            INICIO
        </a>

        @if (Route::has('register'))
            <a
                href="{{ route('register') }}"
                class="rounded-md px-3 py-2  text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
            >
                REGISTRAR
            </a>
        @endif
    @endauth
</nav>
