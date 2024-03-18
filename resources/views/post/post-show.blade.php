<div>
        <!-- list all posts -->
            <div class="card">
                <div class="card-header">
                    <h3>{{ $post->title }}</h3>
                </div>
                <div class="card-body">
                    <p>{{ $post->content }}</p>
                </div>
                <span>{{ $post->created_at->diffForHumans() }}</span>
                <div class="card-footer">
                    <form action="{{ route('destroy', $post->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Löschen</button>
                    </form>
                    <a href="{{ route('update-form', $post->id) }}" class="btn btn-primary">Bearbeiten</a>
                </div>
            </div>
</div>

