<div class="like-buttons flex items-center text-sm">
    <div class="flex mr-2
    {{ ($tweet->isLikedBy(current_user()) ? 'text-blue-400' : 'text-gray-500') }}
    ">
        <form action="{{ route('tweet_like', $tweet->id) }}" method="post">
            @csrf
            <button>
                like: 
            </button>
        </form>
        <p>{{ ($tweet->likes==Null ? 0 : $tweet->likes) }}</p>
    </div>

    <div class="flex
    {{ ($tweet->isDislikedBy(current_user()) ? 'text-blue-400' : 'text-gray-500') }}
    ">
        <form action="{{ route('tweet_dislike', $tweet->id) }}" method="post">
            @csrf
            @method('delete')
            <button>
                dislike: 
            </button>       
        </form>  
        <p>{{ ($tweet->dislikes==Null ? 0 : $tweet->dislikes) }}</p>
    </div>
</div> <!-- end like-buttons -->