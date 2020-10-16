<x-app>
	<form action="{{ $user->path() }}" method="post">
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
			>

			@error('username')
				<p class="text-red-200 text-xs mt-2">{{ $message }}</p>
			@enderror
		</div> <!-- end username-input -->

		<div class="email-input mb-6">
			<label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
				email
			</label>

			<input class="border border-gray-400 p-2 w-full"
				type="email" 
				name="email" 
				id="email"
				required 
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

		<div class="password_comfirmation-input mb-6">
			<label for="password_comfirmation" class="block mb-2 uppercase font-bold text-xs text-gray-700">
				password_comfirmation
			</label>

			<input class="border border-gray-400 p-2 w-full"
				type="password" 
				name="password_comfirmation" 
				id="password_comfirmation"
				required 
			>

			@error('password_comfirmation')
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