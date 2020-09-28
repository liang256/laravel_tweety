<div class="border border-blue-400 rounded-lg p-6 mb-4">
    <form action="/tweets" method="post">
        @csrf
        
        <textarea 
            name="body" 
            class="w-full" 
            placeholder="type something"
        ></textarea>
    

        <hr class="my-4">

        <footer class="flex justify-between">
            <img 
                src="{{Illuminate\Support\Facades\Auth::user()->getAvatar()}}" 
                alt=""
                class="border rounded-full"
            >
            <button 
                type="submit"
                class="bg-blue-400 rounded-lg shadow p-2 text-white" 
                >tweet
            </button>   
        </footer>
    </form>
</div>