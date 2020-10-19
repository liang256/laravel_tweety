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

        <x-like-buttons :tweet="$tweet"></x-like-buttons>
    </div> <!-- end tweet-body --> 

    @can('edit', $tweet->user)
        <div class="delete-button mr-0 ml-auto ">
            <div class="delete-button rounded bg-blue-400 shadow text-white text-xs flex items-center px-3 my-1 hover:bg-blue-600 justify-between">
                <form action="{{ route('delete_tweet', $tweet->id) }}" method="post">
                    @csrf
                    @method('delete')

                    <button class="">
                        Delete
                    </button>
                </form>  
            </div>

            <div class="edit-button rounded bg-blue-400 shadow text-white text-xs flex items-center px-3 my-1 hover:bg-blue-600 flex">
                <form action="{{ route('edit_tweet', $tweet->id) }}" method="get">
                    @csrf

                    <button class="">
                        Edit
                    </button>
                </form>  
            </div>
        </div>
    @endcan
</div>