<x-app>
	<form action="{{ $user->path() }}" method="post" enctype="multipart/form-data ">
		@csrf
		@method('patch')

		<div class="name-input mb-6">
			<label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
				name
			</label>

			<input class="border border-gray-400 p-2 w-full"
				type="text" 
				name="name" 
				id="name"
				required 
				value="{{ $user->name }}" 
			>

			@error('name')
				<p class="text-red-200 text-xs mt-2">{{ $message }}</p>
			@enderror
		</div> <!-- end name-input -->

		<div class="username-input mb-6">
			<label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">
				username
			</label>

			<input class="border border-gray-400 p-2 w-full"
				type="text" 
				name="username" 
				id="username"
				required 
				value="{{ $user->username }}"
			>

			@error('username')
				<p class="text-red-200 text-xs mt-2">{{ $message }}</p>
			@enderror
		</div> <!-- end username-input -->

		<div class="avatar-input mb-6">
			<label for="avatar" class="block mb-2 uppercase font-bold text-xs text-gray-700">
				avtar
			</label>

			<input class="border border-gray-400 p-2 w-full"
				type="file" 
				name="avatar" 
				id="avatar"
			>

			@error('avatar')
				<p class="text-red-200 text-xs mt-2">{{ $message }}</p>
			@enderror

			<img 
				src="{{ $user->getAvatar() }}"
				style="width:100px" 
				alt="your avatar"
			>
		</div> <!-- end avtar-input -->

		<div class="email-input mb-6">
			<label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
				email
			</label>

			<input class="border border-gray-400 p-2 w-full"
				type="email" 
				name="email" 
				id="email"
				required 
				value="{{ $user->email }}"
			>

			@error('email')
				<p class="text-red-200 text-xs mt-2">{{ $message }}</p>
			@enderror
		</div> <!-- end email-input -->

		<div class="password-input mb-6">
			<label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
				password
			</label>

			<input class="border border-gray-400 p-2 w-full"
				type="password" 
				name="password" 
				id="password"
				required 
			>

			@error('password')
				<p class="text-red-200 text-xs mt-2">{{ $message }}</p>
			@enderror
		</div> <!-- end password-input -->

		<div class="password_confirmation-input mb-6">
			<label for="password_confirmation" class="block mb-2 uppercase font-bold text-xs text-gray-700">
				password confirmation
			</label>

			<input class="border border-gray-400 p-2 w-full"
				type="password" 
				name="password_confirmation" 
				id="password_confirmation"
				required 
			>

			@error('password_confirmation')
				<p class="text-red-200 text-xs mt-2">{{ $message }}</p>
			@enderror
		</div> <!-- end password_comfirmation-input -->

		<div class="">
			<button class="bg-blue-400 text-white rounded px-4 py-2 hover:bg-blue-600" type="submit">
				submit
			</button>
		</div>
	</form>
</x-app>