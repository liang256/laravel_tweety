<x-app>
	<header class="mb-6 relative">
		<div class="banner mb-2 rounded-lg flex justify-center bg-gray-400 w-full" style="height:220px;">
			@if($user['cover'])
				<img src="{{ $user['cover'] }}" alt="cover">
			@else
				<div class="text-white mt-2">No Cover Yet</div>
			@endif
		</div>

		<div class="avatar-img">
			<a href="{{ $user->path() }}">
				<img 
					src="{{$user->getAvatar()}}" 
					alt=""
					class="rounded-full mr-2 absolute border bg-gray-100"
					style="width: 150px; left: 40%; top: 30%;" 
				>
			</a>
		</div>

		<div class="flex justify-between items-center px-4">
			<div>
				<h2 class="font-bold text-2xl mb-0">{{$user->name}}</h2>
				<p class="text-sm text-gray-400">Joined at {{$user->created_at->diffForHumans()}}</p>
			</div>

			<div class="flex justify-between">
				@can('edit',$user)
					<a href="{{ $user->path('edit') }}" class="bg-blue-400 rounded-full shadow p-2 text-white text-xs">
						Edit Profile
					</a>
				@endcan

				<div class="">
					<x-follow-button :user="$user"></x-follow-button>
				</div>
			</div>
		</div>
		
		<div class="mt-2 text-sm px-4">
			<p>{{$user->self_description}}</p>
		</div>

	</header>

	@include('_timeline')
</x-app>