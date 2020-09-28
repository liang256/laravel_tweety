<div class="flex p-4 border-b border-b-gray-400">
    <div class="mr-2 flex-shrink-0">
        <img 
            src="{{$tweet->user->getAvatar()}}"
            class="rounded-full border"
        >
    </div>

    <div class="">
        <h5 class="text-bold mb-2">{{$tweet->user->name}}</h5>

        <p class="text-sm">
            {{$tweet->body}}
        </p>
    </div>
</div>