@props(['post'])

<article class="transition-colors duration-300 hover:bg-gray-100 border border-black/0 hover:border-opacity-5 rounded-xl">
  <div class="py-6 px-4 h-full flex flex-col">
    <a href="/posts/{{ $post->slug }}">
      <div>
        <img src="{{ isset($post->thumbnail) ? asset('storage/' . $post->thumbnail) : asset('img/logo.png') }}" alt="ブログ画像">
      </div>
      <h1 class="mt-2 font-bold line-clamp-1">
        {{ $post->title }}
      </h1>
    </a>

    <div class="mt-2 flex justify-between items-center">
      <a href="/?category={{ $post->category->id }}"
        class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold hover:bg-blue-300 hover:text-white"
        style="font-size: 10px"
          >{{ $post->category->name }}
      </a>
      
      <span class="block text-gray-400 text-xs">
        <time>{{ $post->created_at->diffForHumans() }}</time>
      </span>
    </div>
  </div>
</article>
