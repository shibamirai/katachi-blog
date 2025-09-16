<x-layout>
  <main class="px-4 py-4">
    <section class="max-w-lg mx-auto my-10 border border-gray-200 p-6 rounded-xl">
      <h1 class="text-center font-bold text-xl">ログイン</h1>

      <form method="POST" action="/login" class="mt-10">
          @csrf

          <x-form.input name="email" type="email" autocomplete="username" required />
          <x-form.input name="password" type="password" autocomplete="current-password" required />

          <div class="text-center">
            <x-form.button class="mx-auto">ログイン</x-form.button>
          </div>
      </form>
    </section>
  </main>
</x-layout>
