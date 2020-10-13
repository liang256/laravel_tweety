<div class="border border-gray-400 rounded-lg">
    @foreach ($tweets as $tweet)
        @include ('_tweet')
    @endforeach
</div>