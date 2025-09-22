<x-layout>
  @include ('posts._header')

  <main class="px-4 py-4 max-w-6xl mx-auto">
    <x-posts-grid :posts="$posts" />

    <div>
      {{ $posts->links() }}
    </div>
  </main>
</x-layout>
