<x-layout>
  <x-panel class="max-w-lg mx-auto mt-10">
    <section class="px-6 py-8">
      <h1 class="text-lg text-center font-bold mb-6">Publish New Post</h1>
      <form method="POST" action="{{ url('/admin/posts') }}" enctype="multipart/form-data">
        @csrf

        <x-form.input name="title"/>
        <x-form.input name="slug"/>
        <x-form.input name="thumbnail" type="file"/>
        <x-form.text name="excerpt"/>
        <x-form.text name="body"/>

        <x-form.field>
          <x-form.label name="category"></x-form.label>

          <select name="category_id" id="category_id">
            @foreach (\App\Models\Category::all() as $category)
              <option
                value="{{ $category->id }}"
                {{ old('category') == $category->id ? 'selected' : '' }}
              >{{ ucwords($category->name) }}</option>
            @endforeach
          </select>
{{--          test--}}

          <x-form.error name="category" />
        </x-form.field>

        <x-form.field>
          <x-form.button>Publish</x-form.button>
        </x-form.field>

        @if ($errors->any())
          <ul>
            @foreach ($errors->all() as $error)
              <li class="list-none text-red-500 text-xs mt-1">{{ $error }}</li>
            @endforeach
          </ul>
        @endif
      </form>
    </section>
  </x-panel>
</x-layout>
