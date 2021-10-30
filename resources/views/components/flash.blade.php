@if (session()->has('success'))
  <div x-data="{ show: true }"
       x-init="setTimeout(() => show = false, 4000)"
       x-show="show"
       class="fixed bg-blue-500 text-white text-sm py-2 px-4 rounded-xl right-3 bottom-3"
  >
    <p>{{ session('success') }}</p>
  </div>
@endif
