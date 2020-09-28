<h3 class="font-bold text-xl mb-4">Frineds</h3>

<ul class="">
	@foreach (range(1,8) as $index)
		<li class="mb-4">
			<div class="flex items-center">
				<img 
					src="{{}}" 
					alt=""
					class="rounded-full mr-2"
				>

				Joe Don
			</div>
		</li>
	@endforeach
</ul>