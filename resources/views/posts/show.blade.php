<x-layout>
  <main class="my-10 px-6 max-w-6xl mx-auto">
    <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
      <div class="col-span-4 lg:pt-14 mb-10">
        <img src="{{ isset($post->thumbnail) ? asset('storage/' . $post->thumbnail) : asset('img/logo.png') }}" alt="" class="rounded-xl">
        
        <div class="flex items-center justify-between mt-4">
          <a href="/?category={{ $post->category->id }}"
            class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold hover:bg-blue-300 hover:text-white"
            style="font-size: 10px"
          >{{ $post->category->name }}
          </a>
          <p class="block text-gray-400 text-xs">
            <time>{{ $post->created_at->diffForHumans() }}</time>
          </p>
        </div>
      </div>
      <div class="col-span-8">
        <div class="hidden lg:flex justify-between mb-6">
          <a href="/"
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

            一覧へ戻る
          </a>
        </div>
        <h1 class="font-bold text-3xl lg:text-4xl mb-4">
          {{ $post->title }}
        </h1>
        <div class="font-bold flex justify-end">
          <a href="/?author={{ $post->author->id }}">{{ $post->author->name }}</a>
        </div>
        <div class="lg:text-lg leading-loose mt-8">
          {!! $post->body !!}
        </div>
      </div>
        
      <section class="col-span-8 col-start-5 mt-10 space-y-6">
        @include ('posts._add-comment-form')

        @foreach ($post->comments as $comment)
          <x-comment :comment="$comment" />
        @endforeach
      </section>
    </article>
  </main>
</x-layout>
