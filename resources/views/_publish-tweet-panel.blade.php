<div class="border border-blue-400 rounded-lg p-6 mb-4">
    <form action="/tweets" method="post">
        @csrf

        <textarea 
            name="body" 
            class="w-full" 
            placeholder="type something"
            required 
        ></textarea>
    

        <hr class="my-4">

        <footer class="flex justify-between">
            <a href="{{ current_user()->path() }}">
                <img 
                    src="{{ current_user()->getAvatar() }}" 
                    alt=""
                    class="border rounded-full"
                    style="width: 40px" 
                >
            </a>
            <button 
                type="submit"
                class="bg-blue-400 rounded-lg shadow p-2 text-white" 
                >tweet
            </button>   
        </footer>
    </form>
    @error ('body')
        <p class="text-red-500 text-sm">{{$message}}</p>
    @enderror
</div>