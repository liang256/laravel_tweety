<x-app>
	<header class="mb-6 relative">
		<div class="banner mb-2 rounded">
			<img src="/images/profile-banner.jpg" alt="">
		</div>

		<div class="flex justify-between items-center">
			<div>
				<h2 class="font-bold text-2xl mb-0">{{$user->name}}</h2>
				<p class="text-sm">Joined at {{$user->created_at->diffForHumans()}}</p>
			</div>

			<div class="">
				<a href="" class="bg-blue-400 rounded-full shadow p-2 text-white text-xs">Edit Profile</a>
				<a href="" class="bg-blue-400 rounded-full shadow p-2 text-white text-xs">Follow Me</a>
			</div>
		</div>

		<img 
			src="{{$user->getAvatar()}}" 
			alt=""
			class="rounded-full mr-2 absolute border bg-gray-100"
			style="width: 150px; left: 40%; top: 30%;" 
		>
		
		<div class="mt-2 text-sm">
			<p>
				Hi, I'm Jeffrey. I'm the creator of Laracasts and spend most of my days building the site and thinking of new ways to teach confusing concepts. I live in Orlando, Florida with my wife and two kids.
			</p>
		</div>

	</header>

	@include('_timeline')
</x-app>