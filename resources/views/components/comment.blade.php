@props(['comment'])

<article class="border border-gray-200 p-6 rounded-xl bg-gray-50">

  <header class="flex justify-between items-center mb-4">
    <h3 class="font-bold">{{ $comment->author->name }}</h3>
    <p class="text-xs">
      <time>{{ $comment->created_at->format('Y年m月d日 g:i a') }}</time>
    </p>
  </header>
    
  <div x-data="{ show: false }" @click.away="show = false">
    <div x-show="! show" @click="show = ! show">
      <p>
        {{ $comment->body }}
      </p>

      @can('edit', $comment)
        <footer class="mt-4 flex justify-end space-x-4">
          <div x-data="{ show: false }" @click.away="show = false" class="relative">
            <div @click="show = ! show">
              <button class="text-xs text-green-400 cursor-pointer">編集</button>
            </div>

            <div x-show="show" class="py-2 absolute bg-gray-100 mt-2 rounded-xl w-full z-50 overflow-auto max-h-52" style="display: none">
                {{ $slot }}
            </div>
          </div>

          <form method="POST" action="/comments/{{ $comment->id }}">
            @csrf
            @method('DELETE')

            <button class="text-xs text-gray-400 cursor-pointer">削除</button>
          </form>
        </footer>
      @endcan
    </div>

    <div x-show="show" style="display: none" class="border border-gray-200 p-6 bg-white">
      <form method="POST" action="/comments/{{ $comment->id }}">
        @csrf
        @method('PATCH')

        <div>
          <textarea
            name="body"
            class="w-full text-sm focus:outline-4 outline-blue-200"
            rows="5"
            required
          >{{ old('body', $comment->body) }}</textarea>

          @error('body')
            <span class="text-xs text-red-500">{{ $message }}</span>
          @enderror
        </div>

        <div class="flex justify-end mt-6 border-t border-gray-200">
          <x-form.button>送信</x-form.button>
        </div>
      </form>
    </div>
  </div>
</article>