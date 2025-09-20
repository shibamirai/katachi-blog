<x-layout>
  <main class="px-4 py-4 max-w-3xl mx-auto">
    <div class="mb-6">
      <a href="/admin/posts"
        class="transition-colors duration-300 relative inline-flex items-center hover:text-blue-500">
        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
            <g fill="none" fill-rule="evenodd">
                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                </path>
                <path class="fill-current"
                      d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                </path>
            </g>
        </svg>

        投稿記事一覧に戻る
      </a>
    </div>

    <section class="max-w-2xl mx-auto border border-gray-200 p-6 rounded-xl">
      <h1 class="text-center font-bold text-xl">記事の更新</h1>

      <form method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
          @csrf
          @method('PATCH')

          <x-form.input name="title" :value="old('title', $post->title)" required />

          <div class="mt-6">
            <x-form.file name="thumbnail" :value="old('thumbnail', $post->thumbnail)" />
            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="border border-gray-200 rounded w-full mt-2">
          </div>

          <x-form.textarea name="body" required>{{ old('body', $post->body) }}</x-form.textarea>

          <x-form.field>
            <x-form.label name="category_id" />

            <select name="category_id" id="category_id"
              class="border border-gray-200 p-2 w-full rounded"
              required
            >
              @foreach (\App\Models\Category::all() as $category)
                <option
                  value="{{ $category->id }}"
                  {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                >
                  {{ $category->name }}
                </option>
              @endforeach
            </select>

            <x-form.error name="category_id"/>
          </x-form.field>

          <div class="text-center">
            <x-form.button class="mx-auto">更新</x-form.button>
          </div>
      </form>
    </section>
  </main>
</x-layout>