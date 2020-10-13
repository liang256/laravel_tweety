<div class="flex p-4 border-b border-b-gray-400">
    <div class="mr-2 flex-shrink-0">
        <a href="{{route('profile',$tweet->user)}}">
            <img 
            src="{{$tweet->user->getAvatar()}}"
            class="rounded-full border"
            >  
        </a>

    </div>

    <div class="">
        <a href="{{route('profile',$tweet->user)}}">
            <h5 class="text-bold mb-2">{{$tweet->user->name}}</h5>
        </a>
        

        <p class="text-sm">
            {{$tweet->body}}
        </p>
    </div>
</div>