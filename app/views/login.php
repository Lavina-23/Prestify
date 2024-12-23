<div class="mx-10 lg:mx-0 h-screen grid md:flex items-center justify-center gap-0 md:gap-6">
  <div class="w-full max-w-md">
    <img src="<?= env("BASEURL") ?>/img/login.png" alt="">
  </div>
  <div class="w-full max-w-sm">
    <a href="<?= env("BASEURL") ?>" class="flex items-center text-gray-900 group gap-2 mb-5">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-900">
        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
      </svg>
      <span class="text-sm font-medium text-gray-900">Back</span>
    </a>
    <h1 class="text-3xl md:text-4xl font-bold text-gray-900">Keep your success story up to date.</h1>
    <p class="text-sm font-normal text-gray-500 mt-1 mb-5">Use Prestify ✨ and start tracking your wins effortlessly</p>
    <form method="POST" action="<?= env("BASEURL") ?>/user/login">
      <div class="mb-5">
        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
        <input type="text" id="username" name="username" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500" placeholder="2341******" required />
      </div>
      <div class="mb-5">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
        <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500" required />
      </div>
      <button type="submit" class="text-white bg-gray-900 font-medium rounded-lg text-sm px-6 py-2 text-center border-2 border-transparent hover:bg-white hover:text-gray-900 hover:border-2 hover:border-gray-900">Log In</button>
    </form>
  </div>
</div>