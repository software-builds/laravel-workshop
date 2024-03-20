@php use Illuminate\Support\Str; @endphp

<a href="{{ route('show', $post) }}">
    <div href="{{ route('show', $post) }}" class="hover:bg-gray-200 p-5 transition-colors duration-300">
        <div class="space-y-5">
            <h1 class="text-3xl mb-5 font-bold font-serif">{{ $post->title }}</h1>
            <p>{{ Str::limit($post->content, 150) }}</p>
            <div class="flex justify-between items-center">
                <span class="inline-block text-xs font-light">
                    von <span class="font-bold">{{ $post->user->name }}</span>
                    {{ $post->created_at->diffForHumans() }}
                </span>
                @auth
                <div class="inline-flex gap-2 items-center">
                    <!-- delete button -->
                    <form action="{{ route('destroy', $post) }}" method="post" class="mb-0">
                        @csrf
                        @method('delete')
                        <button type="submit" onclick="return confirm('Wollen Sie den Beitrag wirklich löschen?')" class="text-red-500 hover:text-red-700">Löschen</button>
                    </form>
                    <!-- edit button -->
                    <a href="{{ route('update-form', $post) }}" class="text-blue-500 hover:text-blue-700">Ändern</a>
                </div>
                @endauth
            </div>
        </div>
    </div>
</a>
