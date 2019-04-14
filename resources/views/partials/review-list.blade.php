@forelse ($reviews as $review)
    <div class="card mb-3">
        <div class="card-header">
            <h5 class="font-weight-bold">{{ $review->movie->title }}</h5>
            <h5>{{ $review->author ? $review->author : $review->user->name }}</h5>
        </div>
        <div class="card-body">
            <p class="card-text">{{ $review->content }}</p>
        </div>
    </div>
@empty
    <div class="py-3">No reviews found.</div>
@endforelse
