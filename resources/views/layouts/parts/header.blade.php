<header class="shadow-sm bg-gray-100 flex justify-center">
    <nav class="w-screen max-w-[80ch] w-full">
       <ul class="flex justify-between items-center h-12">
           <li class="hover:bg-gray-200">
               <a class="px-2 h-full" href="{{ route('home') }}">News</a>
           </li>
           <li class="hover:bg-gray-200">
               <a class="px-2 h-full" href="{{ route('shop') }}">Shop</a>
           </li>
           <li class="hover:bg-gray-200">
               <a class="px-2 h-full" href="{{ route('shop-sales') }}">Sonderangebote</a>
           </li>
           <li class="hover:bg-gray-200">
               <a class="px-2 h-full" href="{{ route('checkout') }}">Warenkorb</a>
           </li>
           @auth
               <li class="hover:bg-gray-200">
                   <form action="{{ route('logout') }}" class="m-0" method="post">
                       @csrf
                       <button class="px-2" type="submit">Abmelden</button>
                   </form>
               </li>
           @endauth
           @guest
               <li class="hover:bg-gray-200">
                   <a class="px-2 h-full" href="{{ route('login') }}">Anmelden</a>
               </li>
           @endguest
       </ul>
    </nav>

</header>
