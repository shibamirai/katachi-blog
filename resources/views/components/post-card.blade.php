@props(['post'])

<article class="transition-colors duration-300 hover:bg-gray-100 border border-black/0 hover:border-opacity-5 rounded-xl">
  <div class="py-6 px-4 h-full flex flex-col">
    <div>
      <img src="https://miraino-katachi.co.jp/wp-content/uploads/2024/04/l_1945ba85-a2b9-4574-b9aa-3ac67970eafc.webp" alt="ブログ画像">
    </div>
    <h1 class="mt-2 font-bold line-clamp-1">
      <a href="/posts/{{ $post->slug }}">
          {{ $post->title }}
      </a>
    </h1>
    <div class="mt-2 flex justify-between items-center">
      <a href="/"
        class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
        style="font-size: 10px"
      >{{ $post->category->name }}</a>

      <span class="block text-gray-400 text-xs">
          <time>{{ $post->created_at->diffForHumans() }}</time>
      </span>
    </div>
  </div>
</article>
