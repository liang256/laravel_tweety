@if(auth()->user()->isNot($user))
	<form action="{{$user->username}}/follow" method="post">
		@csrf
		<button class="bg-blue-400 rounded-full shadow p-2 text-white text-xs">	
			{{auth()->user()->isFollow($user)? "Unfollow" : "Follow Me"}}
		</button>
	</form>
@endif