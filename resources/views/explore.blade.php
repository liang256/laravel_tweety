<x-app>
	<div class="border border-gray-200 px-4 py-2 mb-4 rounded-lg">
	@foreach ($users as $user)
		<div class="flex items-center {{$loop->last ? '':'border-b'}} border-gray-200 py-2">
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
	</div>

	<div class="my-4 py-6">
		{{ $users->links() }}
	</div>
</x-app>