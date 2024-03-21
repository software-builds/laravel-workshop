<div class="flex flex-col items-center justify-center w-full p-4">
    <div class="max-w-md h-full flex flex-col bg-white rounded-lg shadow-md overflow-hidden">
        <!-- Image Carousel -->
        <div x-data="{ activeSlide: 0, slideCount: {{ count(json_decode($product->images)) }} }" class="relative w-full h-64 overflow-hidden">
            <!-- Slides -->
            @foreach(json_decode($product->images) as $index => $image)
                <img src="{{ $image }}" alt="Product Image" class="absolute inset-0 w-full h-full object-cover object-center transition-transform duration-500 transform translate-x-{{ $index * 100 }}%" x-show="activeSlide === {{ $index }}" x-transition:enter="transition ease-in-out duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-500" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
            @endforeach
            <!-- Previous Button -->
            <button @click="activeSlide = (activeSlide === 0 ? slideCount - 1 : activeSlide - 1)" class="absolute inset-y-0 left-0 flex items-center justify-center w-12 bg-black bg-opacity-25 text-white focus:outline-none hover:bg-opacity-50 z-10">&lt;</button>
            <!-- Next Button -->
            <button @click="activeSlide = (activeSlide === slideCount - 1 ? 0 : activeSlide + 1)" class="absolute inset-y-0 right-0 flex items-center justify-center w-12 bg-black bg-opacity-25 text-white focus:outline-none hover:bg-opacity-50 z-10">&gt;</button>
        </div>

        <!-- Product Information -->
        <div class="flex flex-col flex-1 items-center justify-center p-4">
            <div class="text-center flex-1">
                <!-- Title -->
                <h1 class="text-xl text-gray-900 font-semibold mb-2 h-14">{{ $product->title }}</h1>
                <!-- Description -->
                <p class="text-gray-600 line-clamp-3 font-light leading-relaxed">{{ $product->description }}</p>
            </div>
            <!-- Color Indicator -->
            <div class="flex items-center justify-center mt-4">
                <!-- Pricing -->
                <div class="flex flex-col items-center gap-5">
                    <div class="flex items-center">
                        <div class="w-4 h-4 rounded-full mr-2" style="background-color: {{ $product->color }}"></div>
                        <!-- Discounted Price -->
                        @if($product->rabattPrice)
                            <p class="text-lg font-semibold text-gray-900">{{ $product->rabattPrice }} €</p>
                            <!-- Original Price with Strike Through -->
                            <p class="ml-2 text-sm text-gray-600 line-through">{{ $product->price }} €</p>
                        @else
                            <p class="text-lg font-semibold text-gray-900">{{ $product->price }} €</p>
                        @endif
                    </div>
                    <!-- add in stock -->
                    @if($product->stock > 0)
                        <p class="ml-2 text-sm text-green-600">Auf Lager ({{ $product->stock }})</p>
                    @else
                        <p class="ml-2 text-sm text-red-600">Ausverkauft</p>
                    @endif
                </div>
            </div>
            <!-- Add/Remove button based on checkout -->
            <div class="mt-4 flex items-center">
                <!-- VIEW detail page -->
                @if(isset($detail) && $detail)
                    <a href="{{ route('shop-view', $product) }}" class="inline-block px-4 py-2 text-blue-600 rounded-md focus:outline-none hover:opacity-50">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11 10.9794C11 10.4271 11.4477 9.97937 12 9.97937C12.5523 9.97937 13 10.4271 13 10.9794V16.9794C13 17.5317 12.5523 17.9794 12 17.9794C11.4477 17.9794 11 17.5317 11 16.9794V10.9794Z" fill="currentColor" /><path d="M12 6.05115C11.4477 6.05115 11 6.49886 11 7.05115C11 7.60343 11.4477 8.05115 12 8.05115C12.5523 8.05115 13 7.60343 13 7.05115C13 6.49886 12.5523 6.05115 12 6.05115Z" fill="currentColor" /><path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2ZM4 12C4 16.4183 7.58172 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12Z" fill="currentColor" /></svg>
                    </a>
                @endif
                @if(isset($checkout) && $checkout && (!isset($order) || !$order))
                    <a href="{{ route('checkout-remove', $product) }}" class="inline-block px-4 py-2 text-red-600 rounded-md focus:outline-none hover:opacity-50">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 11C7.44772 11 7 11.4477 7 12C7 12.5523 7.44772 13 8 13H16C16.5523 13 17 12.5523 17 12C17 11.4477 16.5523 11 16 11H8Z" fill="currentColor" /><path fill-rule="evenodd" clip-rule="evenodd" d="M23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12ZM21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" fill="currentColor" /></svg>
                    </a>
                @elseif($product->stock > 0 && (!isset($order) || !$order))
                    <!-- Add to Cart button with form -->
                    <a href="{{ route('checkout-add', $product) }}" class="inline-block px-4 py-2 text-primary rounded-md focus:outline-none hover:opacity-50">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.79166 2H1V4H4.2184L6.9872 16.6776H7V17H20V16.7519L22.1932 7.09095L22.5308 6H6.6552L6.08485 3.38852L5.79166 2ZM19.9869 8H7.092L8.62081 15H18.3978L19.9869 8Z" fill="currentColor" /><path d="M10 22C11.1046 22 12 21.1046 12 20C12 18.8954 11.1046 18 10 18C8.89543 18 8 18.8954 8 20C8 21.1046 8.89543 22 10 22Z" fill="currentColor" /><path d="M19 20C19 21.1046 18.1046 22 17 22C15.8954 22 15 21.1046 15 20C15 18.8954 15.8954 18 17 18C18.1046 18 19 18.8954 19 20Z" fill="currentColor" /></svg>
                    </a>
                @endif
            </div>
            @if(isset($quantity) && $quantity)
                <p class="inline-block px-4 py-2 text-gray-600 rounded-md focus:outline-none">{{ $quantity }}x</p>
            @endif
            @if(session('success_' . $product->id))
                <p class="inline-block px-4 py-2 text-green-600 rounded-md focus:outline-none">{{ session('success_' . $product->id) }}</p>
            @elseif(session('error_' . $product->id))
                <p class="inline-block px-4 py-2 text-red-600 rounded-md focus:outline-none">{{ session('error_' . $product->id) }}</p>
            @endif
        </div>
    </div>
</div>
