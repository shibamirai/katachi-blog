<header class="bg-blue-100 px-3 py-15 text-center">
  <h1 class="text-2xl font-bold">
    お知らせ一覧
  </h1>
  <div class="bg-gray-100 max-w-xl mt-4 mx-auto rounded-xl px-3 py-2">
    <form method="GET" action="/">
        <!-- @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
        @endif -->

        <input type="text"
                name="search"
                placeholder="検索"
                class="bg-transparent placeholder-glay font-semibold text-sm w-full"
                value="{{ request('search') }}"
        >
    </form>
  </div>
</header>
