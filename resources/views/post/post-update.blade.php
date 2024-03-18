<!-- create form for post -->
<form action="{{ route('update', $post) }}" method="post">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" value="{{ $post->title }}" class="form-control" id="title" placeholder="Enter title">
    </div>
    @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" class="form-control" id="content" placeholder="Enter description">{{ $post->content }}</textarea>
    </div>
    @error('content')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
