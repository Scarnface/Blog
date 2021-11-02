@auth
  <x-panel>
    <form action="/posts/{{ $post->slug }}/comments" method="post" class="space-x-4">
      @csrf

      <header class="flex items-center">
        <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="User Avatar" width="40" height="40"
             class="rounded-full"/>
        <h2 class="ml-4 font-bold">Want to participate?</h2>
      </header>

      <div class="mt-6">
                    <textarea name="body"
                              class="w-full border border-gray-200 p-3 text-sm"
                              rows="5"
                              placeholder="Enter your comment here..."
                              required
                    ></textarea>

        @error('body')
        <span class="text-xs text-red-500">{{ $message }}</span>
        @enderror
      </div>

      <div class="flex justify-end mt-6">
        <x-form.button>Post</x-form.button>
      </div>
    </form>
  </x-panel>
@else
  <p>
    <a href="{{ url('/register') }}" class="hover:underline text-xs font-bold uppercase">Register</a>
    <span> or </span>
    <a href="{{ url('/login') }}" class="hover:underline text-xs font-bold uppercase">login</a>
    <span> to comment.</span>
  </p>
@endauth
