<div class="relative w-80 bg-white shadow-lg rounded-lg overflow-hidden">
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
    <div class="flex flex-col items-center justify-center w-full p-4">
        <div>
            <!-- Title -->
            <h3 class="text-lg font-semibold">{{ $product->title }}</h3>
            <!-- Description -->
            <p class="text-sm text-gray-600 leading-relaxed">{{ $product->description }}</p>
            <!-- Color Indicator -->
        </div>
        <div class="flex items-center justify-center w-full mt-2">
            <div class="w-4 h-4 rounded-full mr-2" style="background-color: {{ $product->color }}"></div>
            <!-- Pricing -->
            <div class="flex items-center">
                <!-- Discounted Price -->
                @if($product->rabattPrice)
                    <p class="text-lg font-semibold text-gray-800">{{ $product->rabattPrice }} €</p>
                    <!-- Original Price with Strike Through -->
                    <p class="ml-2 text-sm text-gray-500 line-through">{{ $product->price }} €</p>
                @else
                    <p class="text-lg font-semibold text-gray-800">{{ $product->price }} €</p>
                @endif
            </div>
        </div>
        <!-- add remove button if checkout -->
        @if(isset($checkout) && $checkout)
            <a href="{{ route('checkout-remove', $product) }}" class="mt-4 px-4 py-2 bg-red-500 text-white rounded-md focus:outline-none hover:bg-red-600">Remove from Cart</a>
        @else
            <!-- add to card button with form -->
            <a href="{{ route('checkout-add', $product) }}" class="mt-4 px-4 py-2 bg-red-500 text-white rounded-md focus:outline-none hover:bg-blue-600">Add to Cart</a>
        @endif
    </div>
</div>
