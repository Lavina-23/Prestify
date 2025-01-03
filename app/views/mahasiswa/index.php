<div class="grid h-full md:h-screen w-full p-10" style="max-width: 750px">
  <div class="grid md:flex items-center justify-between h-24">
    <div>
      <h1 class="text-3xl md:text-5xl font-bold text-gray-900">Halo <?= $data['nama'] ?> !</h1>
      <p class="text-sm font-normal text-gray-500 mt-1">Sudahkah Anda sholat ?</p>
    </div>
  </div>

  <!-- <hr class="my-5">

  <div class="flex flex-col lg:flex-row gap-2 w-full">
    <a href="#"
      class="flex gap-4 items-center w-full p-4 bg-white rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
      <div class="bg-blue-100 rounded-full p-3">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
          class="w-7 h-7 text-blue-500">
          <path stroke-linecap=" round" stroke-linejoin="round"
            d="M16.5 18.75h-9m9 0a3 3 0 0 1 3 3h-15a3 3 0 0 1 3-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 0 1-.982-3.172M9.497 14.25a7.454 7.454 0 0 0 .981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 0 0 7.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 0 0 2.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 0 1 2.916.52 6.003 6.003 0 0 1-5.395 4.972m0 0a6.726 6.726 0 0 1-2.749 1.35m0 0a6.772 6.772 0 0 1-3.044 0" />
        </svg>
      </div>
      <div class="grid">
        <h5 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">10</h5>
        <p class="text-sm font-medium text-gray-900 dark:text-gray-400">Achievements</p>
      </div>
    </a>
    <a href="#"
      class="flex gap-4 items-center w-full p-4 bg-white rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
      <div class="bg-green-100 rounded-full p-3">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
          class="w-7 h-7 text-green-500">
          <path stroke-linecap=" round" stroke-linejoin="round"
            d="M16.5 18.75h-9m9 0a3 3 0 0 1 3 3h-15a3 3 0 0 1 3-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 0 1-.982-3.172M9.497 14.25a7.454 7.454 0 0 0 .981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 0 0 7.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 0 0 2.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 0 1 2.916.52 6.003 6.003 0 0 1-5.395 4.972m0 0a6.726 6.726 0 0 1-2.749 1.35m0 0a6.772 6.772 0 0 1-3.044 0" />
        </svg>
      </div>
      <div class="grid">
        <h5 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">10</h5>
        <p class="text-sm font-medium text-gray-900 dark:text-gray-400">Achievements</p>
      </div>
    </a>
    <a href="#"
      class="flex gap-4 items-center w-full p-4 bg-white rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
      <div class="bg-yellow-100 rounded-full p-3">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
          class="w-7 h-7 text-yellow-500">
          <path stroke-linecap=" round" stroke-linejoin="round"
            d="M16.5 18.75h-9m9 0a3 3 0 0 1 3 3h-15a3 3 0 0 1 3-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 0 1-.982-3.172M9.497 14.25a7.454 7.454 0 0 0 .981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 0 0 7.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 0 0 2.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 0 1 2.916.52 6.003 6.003 0 0 1-5.395 4.972m0 0a6.726 6.726 0 0 1-2.749 1.35m0 0a6.772 6.772 0 0 1-3.044 0" />
        </svg>
      </div>
      <div class="grid">
        <h5 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">10</h5>
        <p class="text-sm font-medium text-gray-900 dark:text-gray-400">Volunteer</p>
      </div>
    </a>
  </div> -->

  <hr class="my-5">

  <div class="bg-white h-fit rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
    <div class="flex justify-between">
      <div>
        <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2"><?= $data['totalPrestasi'] ?> Prestasi</h5>
        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Semester Ini</p>
      </div>
      <!-- <div
        class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
        12%
        <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M5 13V1m0 0L1 5m4-4 4 4" />
        </svg>
      </div> -->
    </div>
    <div id="area-chart"></div>
  </div>
</div>