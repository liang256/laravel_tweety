<x-app>
	@foreach ($users as $user)
		<div class="flex items-center">
			<a href="{{ $user->path() }}">
				<div class="user flex items-center mb-4">
					<div class="avatar">
						<img src="{{ $user->getAvatar() }}" alt="" style="width: 50px">
					</div>

					<div class="name items-center">
						{{ $user->name }}
					</div>
				</div>
			</a>

			<div class="ml-auto mr-0"></div>
			<x-follow-button :user="$user"></x-follow-button>	
		</div>
	@endforeach
</x-app>