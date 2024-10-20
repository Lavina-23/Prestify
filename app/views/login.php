<div class="mx-10 lg:mx-0 h-screen grid md:flex items-center justify-center gap-0 md:gap-6">
  <div class="w-full max-w-md">
    <img src="<?= env("BASEURL") ?>/img/hero-login.png" alt="">
  </div>
  <div class="w-full max-w-sm">
    <h1 class="text-3xl font-bold text-gray-900 mb-5">Keep your success story up to date.</h1>
    <form method="POST" action="<?= env("BASEURL") ?>/user/login">
      <div class="mb-5">
        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
        <input type="text" id="username" name="username" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500" placeholder="2341******" required />
      </div>
      <div class="mb-5">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
        <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500" required />
      </div>
      <button type="submit" class="text-white bg-gray-900 font-medium rounded-lg text-sm px-6 py-2 text-center border-2 border-transparent hover:bg-white hover:text-darkBlue hover:border-2 hover:border-darkBlue">Log In</button>
    </form>
  </div>
</div>