@auth
  <div class="border border-gray-200 p-6 rounded-xl">
    <form method="POST" action="/posts/{{ $post->slug }}/comments">
      @csrf

      <div>
        <textarea
          name="body"
          class="w-full text-sm focus:outline-4 outline-blue-200"
          rows="5"
          placeholder="コメントを残す"
          required></textarea>

        @error('body')
          <span class="text-xs text-red-500">{{ $message }}</span>
        @enderror
      </div>

      <div class="flex justify-end mt-6 border-t border-gray-200">
        <x-form.button>送信</x-form.button>
      </div>
    </form>
  </div>
@else
  <p class="font-semibold">
    コメントを残すには
    <a href="/register" class="hover:underline">アカウント登録</a> か
    <a href="/login" class="hover:underline">ログイン</a> をしてください。
  </p>
@endauth
