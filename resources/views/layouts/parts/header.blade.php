<header class="shadow-md flex items-center justify-around sticky z-50 top-0 bg-white py-3">
    @include('layouts.parts.logo')
    <nav>
        <ul class="font-serif text-lg flex flex-col md:flex-row h-full items-center gap-10 text-primary">
            <li>
                <a href="{{ route('home') }}" class="hover:opacity-75">News</a>
            </li>
            <li>
                <a href="{{ route('shop') }}" class="hover:opacity-75">Unser Shop</a>
            </li>
            <li>
                <a href="{{ route('shop-sales') }}" class="hover:opacity-75">Angebote</a>
            </li>
            <li>
                <a href="{{ route('checkout') }}" class="flex items-center gap-2 justify-center hover:opacity-75">
                    Warenkorb
                    <div class="flex gap-1">
                        <div class="relative my-auto">
                            <div class="w-4 h-4 relative rounded-full bg-primary animate-pulse"></div>
                            <div class="w-2 h-2 absolute top-1 left-1 rounded-full bg-pink-700 animate-pulse"></div>
                        </div>
                        @if(session('card'))
                            <span class="relative">{{ count(session('card') ) }}</span>
                        @endif
                    </div>
                </a>
            </li>
        </ul>
    </nav>
</header>
