@auth
	@if(auth()->user()->isNot($user))
		<form action="{{ route('follow',$user->username) }}" method="post">
			@csrf
			<button class="
				{{ auth()->user()->isFollow($user)?'bg-gray-400':'bg-blue-400' }}
				rounded-full shadow p-2 text-white text-xs"
			>	
				{{auth()->user()->isFollow($user)? "Unfollow" : "Follow Me"}}
			</button>
		</form>
	@endif
@endauth