<form action="{{ route('update_tweet',$tweet->id) }}" method="post">
	@csrf
	@method('patch')

	<input type="text"
		name="body"
		id="body" 
		value="{{ $tweet->body }}">

	<button class="rounded bg-blue-400 shadow text-white text-xs flex items-center px-3 my-1 hover:bg-blue-600 flex">
		submit
	</button>
</form>