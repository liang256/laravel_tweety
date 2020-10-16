<div class="flex p-4 {{$loop->last?'':'border-b border-b-gray-400'}}">
    <div class="mr-2 flex-shrink-0">
        <a href="{{$tweet->user->path()}}">
            <img 
            src="{{$tweet->user->getAvatar()}}"
            class="rounded-full border"
            style="width:40px" 
            >  
        </a>

    </div>

    <div class="">
        <a href="{{$tweet->user->path()}}">
            <h5 class="text-bold mb-2">{{$tweet->user->name}}</h5>
        </a>
        

        <p class="text-sm">
            {{$tweet->body}}
        </p>
    </div>
</div>