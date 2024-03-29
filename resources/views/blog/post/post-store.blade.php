<!-- create form for post -->
<h1 class="text-3xl font-bold">Beitrag erstellen</h1>
<form class="flex flex-col space-y-5 w-full" action="{{ route('store') }}" method="post">
    @csrf
    <input type="text" name="title" class="font-bold p-3" id="title" placeholder="Beitragstitel">
    @error('title')
        <div class="w-full p-4 bg-red-600 text-white">
            {{ $message }}
        </div>
    @enderror
    <textarea name="content" class="p-3" id="content" placeholder="Beitragsbeschreibung"></textarea>
    @error('content')
        <div class="w-full p-4 bg-red-600 text-white">
            {{ $message }}
        </div>
    @enderror
    <button type="submit" class="bg-gray-400 text-white font-bold p-2">Speichern</button>
    <hr />
</form>
