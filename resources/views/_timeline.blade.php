<div class="border border-gray-200 rounded-lg">
    @forelse ($tweets as $tweet)
        @include ('_tweet')
    @empty
    	<div class="p-4 text-gray-200">
    		<p>No tweets yet</p>
    	</div>
    @endforelse

</div>

<div class="page-links mt-3 mb-10">
	{{ $tweets->links() }}
</div>
