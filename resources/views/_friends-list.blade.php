<h3 class="font-bold text-xl mb-4">Following</h3>

<ul class="">
	@foreach (auth()->user()->following as $user)
		<li class="mb-4">
			<div class="flex items-center">
				<img 
					src="{{$user->getAvatar()}}" 
					alt="avatar"
					class="rounded-full mr-2"
				>

				{{$user->name}}
			</div>
		</li>
	@endforeach
</ul>