
<section class="max-container mt-20">
  <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 grid lg:grid-cols-2 gap-8 lg:gap-16">
    <section class="max-container mt-20 pt-20 md:hidden">
      <div class="relative">
        <img src="<?= env("BASEURL") ?>/img/home.png" alt="Home Hero" class="w-full h-auto max-w-3xl max-h-[400px] mx-auto" />

        <div class="absolute top-0 left-0 right-0 bottom-0 flex justify-center items-center">
          <img src="<?= env('BASEURL') ?>/img/home.png" alt="Home Hero" class="w-full h-full object-cover" />
        </div>
      </div>
    </section>

    <div class="flex flex-col justify-center gap-6">
      <h1 class="text-4xl font-rubik font-extrabold tracking-tight leading-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
        Welcome Champion!
      </h1>
    <p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">
        Here at <span class="font-bold text-gray-900 dark:text-white">Flowbite</span>, we focus on markets where <span class="underline decoration-wavy decoration-gray-400">technology</span>, <span class="italic text-gray-600 dark:text-gray-400">innovation</span>, and <span class="font-semibold">capital</span> can unlock long-term value and drive economic growth.      
    </p>
      <div class="flex -space-x-4 rtl:space-x-reverse">
        <img class="w-14 h-14 border-2 border-white rounded-full dark:border-gray-800" src="<?= env('BASEURL') ?>/img/person1.png" alt="Person 1">
        <img class="w-14 h-14 border-2 border-white rounded-full dark:border-gray-800" src="<?= env('BASEURL') ?>/img/person2.png" alt="Person 2">
        <img class="w-14 h-14 border-2 border-white rounded-full dark:border-gray-800" src="<?= env('BASEURL') ?>/img/person3.png" alt="Person 3">
      </div>
      <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0">
        <a href="#" class="inline-flex justify-center items-center py-3 px-6 text-base font-medium text-center border-2 border-transparent text-white rounded-lg bg-gray-900 hover:text-gray-900 hover:border-gray-900 hover:bg-white focus:ring-1 focus:ring-gray-900 dark:focus:ring-gray-900">
          Get started
          <svg class="w-4 h-4 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
          </svg>
        </a>
      </div>
    </div>

    <section class="max-container mt-20 pt-20 hidden md:block">
      <div class="relative">
        <img src="<?= env("BASEURL") ?>/img/home.png" alt="Home Hero" class="w-full h-auto max-w-3xl max-h-[400px] mx-auto" />

        <div class="absolute top-0 left-0 right-0 bottom-0 flex justify-center items-center">
          <img src="<?= env('BASEURL') ?>/img/home.png" alt="Home Hero" class="w-full h-full object-cover" />
        </div>
      </div>
    </section>
  </div>
</section>