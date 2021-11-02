<x-layout>
  <section class="px-6 py-8">
    <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">

      <h1 class="text-center font-bold text-xl">Login</h1>

      <form method="POST" action="{{ url('/sessions') }}" class="mt-10">

        @csrf

        <x-form.input name="email" type="email"/>
        <x-form.input name="password" type="password"/>

        <x-form.field>
          <x-form.button>Login</x-form.button>
        </x-form.field>

        @if ($errors->any())
          <ul>
            @foreach ($errors->all() as $error)
              <li class="list-none text-red-500 text-xs mt-1">{{ $error }}</li>
            @endforeach
          </ul>
        @endif

      </form>
    </main>
  </section>
</x-layout>
