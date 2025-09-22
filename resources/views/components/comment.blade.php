@props(['comment'])

<article class="border border-gray-200 p-6 rounded-xl bg-gray-50">
  <header class="flex justify-between items-center mb-4">
    <h3 class="font-bold">{{ $comment->author->name }}</h3>
    <p class="text-xs">
      <time>{{ $comment->created_at->format('Y年m月d日 g:i a') }}</time>
    </p>
  </header>
  
  <p>
    {{ $comment->body }}
  </p>
</article>