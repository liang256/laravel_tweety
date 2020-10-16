<x-app>
	@foreach ($users as $user)
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
	@endforeach
</x-app>