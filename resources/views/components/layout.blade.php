<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name', 'かたち Blog') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  <nav class="px-4 py-4 md:flex md:justify-between md:items-center">
    <div>
      <a href="/">
        <img class="w-24 md:w-30"
          src="{{ asset('img/logo.png') }}"
          alt="大阪就労移行支援 未来のかたち｜プログラミング・IT特化"
        >
      </a>
    </div>
    <div class="mt-4 md:mt-0 flex items-center">
      @auth
        <x-dropdown>
          <x-slot name="trigger">
            <button class="text-sm font-bold">
              ようこそ {{ auth()->user()->name }}
            </button>
          </x-slot>

          <x-dropdown-item
            href="#"
            x-data="{}"
            @click.prevent="document.querySelector('#logout-form').submit()"
          >
            ログアウト
          </x-dropdown-item>

          <form id="logout-form" method="POST" action="/logout" class="hidden">
            @csrf
          </form>
        </x-dropdown>
      @else
        <a href="/register"
          class="text-sm font-bold uppercase {{ request()->is('register') ? 'text-blue-500' : '' }}">
          アカウント登録
        </a>

        <a href="/login"
          class="ml-6 text-sm font-bold uppercase {{ request()->is('login') ? 'text-blue-500' : '' }}">
          ログイン
        </a>
      @endauth
    </div>
  </nav>

  {{ $slot }}

  <footer class="px-4 py-6 bg-blue-400 text-white">
    <div class="max-w-6xl mx-auto">
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

  <x-flash/>
</body>
</html>
