<x-layout>
  <main class="px-4 py-4">
    <section class="max-w-lg mx-auto my-10 border border-gray-200 p-6 rounded-xl">
      <h1 class="text-center font-bold text-xl">アカウント登録</h1>

      <form method="POST" action="/register" class="mt-10">
          @csrf

          <x-form.input name="name" required />
          <x-form.input name="email" type="email" required />
          <x-form.input name="password" type="password" required />
          <x-form.input name="password_confirmation" type="password" required />

          <div class="text-center">
            <x-form.button class="mx-auto">登録</x-form.button>
          </div>
      </form>
    </section>
  </main>
</x-layout>
