@props(['posts'])

<div class="md:grid md:grid-cols-3">
  @foreach ($posts as $post)
    <x-post-card :post="$post"/>
  @endforeach
</div>
