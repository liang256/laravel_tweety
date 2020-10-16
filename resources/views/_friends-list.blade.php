<h3 class="font-bold text-xl mb-4">Following</h3>

<ul class="">

	@forelse(auth()->user()->following as $user)
		<li class="mb-4">
			<div class="flex items-center">
				<a href="{{route('profile',$user)}}">
					<img 
					src="{{$user->getAvatar()}}" 
					alt="avatar"
					class="rounded-full mr-2"
					>
				</a>

				<a href="{{route('profile',$user)}}">
					{{$user->name}}
				</a>
			</div>
		</li>
	@empty
		<p>No friends yet</p>
	@endforelse
</ul>