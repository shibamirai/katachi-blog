<x-layout>
  <main class="px-4 py-4 max-w-6xl mx-auto">
    <section class="max-w-2xl mx-auto border border-gray-200 p-6 rounded-xl">
      <h1 class="text-center font-bold text-xl">お知らせ投稿</h1>

      <form method="POST" action="/admin/posts" enctype="multipart/form-data">
          @csrf

          <x-form.input name="title" required />
          <x-form.file name="thumbnail" />
          <x-form.textarea name="body" required />

          <x-form.field>
            <x-form.label name="category_id" />

            <select name="category_id" id="category_id"
              class="border border-gray-200 p-2 w-full rounded"
              required
            >
              @foreach (\App\Models\Category::all() as $category)
                <option
                  value="{{ $category->id }}"
                  {{ old('category_id') == $category->id ? 'selected' : '' }}
                >
                  {{ $category->name }}
                </option>
              @endforeach
            </select>

            <x-form.error name="category_id"/>
          </x-form.field>

          <div class="text-center">
            <x-form.button class="mx-auto">投稿</x-form.button>
          </div>
      </form>
    </section>
  </main>
</x-layout>