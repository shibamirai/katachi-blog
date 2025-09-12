<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name', 'かたち Blog') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  <nav class="px-3 sm:px-6 py-4 md:flex md:justify-between md:items-center">
    <div>
      <a href="/">
        <img class="w-24 md:w-30"
          src="{{ asset('img/logo.png') }}"
          alt="大阪就労移行支援 未来のかたち｜プログラミング・IT特化"
        >
      </a>
    </div>
    <div class="mt-8 md:mt-0 flex items-center">
      @auth
      @else
        <a href="/register"
            class="text-xs font-bold uppercase {{ request()->is('register') ? 'text-blue-500' : '' }}">
            アカウント登録
        </a>

        <a href="/login"
            class="ml-6 text-xs font-bold uppercase {{ request()->is('login') ? 'text-blue-500' : '' }}">
            ログイン
        </a>
      @endauth
    </div>
  </nav>

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

  <main class="max-w-6xl mx-auto my-6">
    <div class="md:grid md:grid-cols-3">
      @foreach ($posts as $post)
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
      @endforeach
    </div>
    <div class="px-4">
      {{ $posts->links() }}
    </div>
  </main>

  <footer class="bg-blue-400 text-white">
    <div class="max-w-6xl mx-auto px-4 py-6">
      <p class="text-2xl font-bold">
        株式会社かたち
      </p>
      <ul class="mt-4 text-sm">
        <li>〒550-0005</li>
        <li>大阪市西区西本町1-7-7 CE西本町ビル9階</li>
        <li>TEL: 06-6626-9983 / FAX: 06-6626-9984</li>
        <li><a href="https://katachi-corp.jp">https://katachi-corp.jp</a></li>
      </ul>
    </div>
  </footer>
</body>
</html>
