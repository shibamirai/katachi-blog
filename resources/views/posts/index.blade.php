<x-layout>
  @include ('posts.__header')

  <main class="max-w-6xl mx-auto my-6">
    <x-posts-grid :posts="$posts" />

    <div class="px-4">
      {{ $posts->links() }}
    </div>
  </main>
</x-layout>
