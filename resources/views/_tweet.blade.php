<div class="flex p-4 {{$loop->last?'':'border-b border-b-gray-400'}}">
    <div class="avatar mr-2 flex-shrink-0">
        <a href="{{$tweet->user->path()}}">
            <img 
            src="{{$tweet->user->getAvatar()}}"
            class="rounded-full border"
            style="width:40px" 
            >  
        </a>
    </div>

    <div class="tweet-body">
        <a href="{{$tweet->user->path()}}">
            <h5 class="text-bold mb-2">{{$tweet->user->name}}</h5>
        </a>
        

        <p class="text-sm mb-2">
            {{$tweet->body}}
        </p>

        <div class="like-buttons flex items-center text-sm"
        >
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
                <form action="{{ route('tweet_like', $tweet->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button>
                        dislike: 
                    </button>       
                </form>  
                <p>{{ ($tweet->dislikes==Null ? 0 : $tweet->dislikes) }}</p>
            </div>
        </div> <!-- end like-buttons -->
    </div>  
</div>