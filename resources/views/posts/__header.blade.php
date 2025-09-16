<header class="px-4 py-15 bg-blue-100 text-center">
  <h1 class="text-2xl font-bold">
    お知らせ一覧
  </h1>
  
  <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">
    <div class="relative md:inline-flex bg-gray-100 rounded-xl">
      <x-category-dropdown />
    </div>
    <div class="relative md:inline-flex bg-gray-100 rounded-xl px-3 py-2">
      <form method="GET" action="/">
          @if (request('category'))
              <input type="hidden" name="category" value="{{ request('category') }}">
          @endif
          <input type="text"
                  name="search"
                  placeholder="検索"
                  class="bg-transparent placeholder-glay font-semibold text-sm w-full outline-none"
                  value="{{ request('search') }}"
          >
      </form>
    </div>
  </div>
</header>
