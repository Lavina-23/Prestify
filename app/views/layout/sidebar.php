  <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
      <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
  </button>

  <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="flex flex-col justify-between h-full px-3 py-4 overflow-y-auto bg-white border-2 border-gray-100">
      <div>
        <a href="<?= env("BASEURL") ?>" class="flex items-center justify-center space-x-3 rtl:space-x-reverse">
          <img src="<?= env("BASEURL") ?>/img/logo.png" class="h-12" alt="Flowbite Logo">
        </a>
        <ul class="space-y-2 font-medium">
          <li>

            <a href="<?= getMenu($_SESSION['level_id'], 'menu1')['route'] ?>"

              class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-white hover:shadow-sm group mt-8">
              <svg class="w-5 h-5 text-gray-900 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                <?= getMenu($_SESSION['level_id'], 'menu1')['icon'] ?>
              </svg>
              <span class="ms-3 text-sm-s text-gray-900"><?= getMenu($_SESSION['level_id'], 'menu1',)['label'] ?></span>
            </a>
          </li>
          <li>
            <a href="<?= getMenu($_SESSION['level_id'], 'menu2')['route'] ?>" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-white hover:shadow-sm group">
              <svg class="w-5 h-5 text-gray-900 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                <?= getMenu($_SESSION['level_id'], 'menu2')['icon']; ?>
              </svg>
              <span class="ms-3 text-sm-s text-gray-900"><?= getMenu($_SESSION['level_id'], 'menu2')['label']; ?></span>
            </a>
          </li>
          <li>
            <a href="<?= getMenu($_SESSION['level_id'], 'menu3')['route'] ?>" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-white hover:shadow-sm group">
              <svg class="w-5 h-5 text-gray-900 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                <?= getMenu($_SESSION['level_id'], 'menu3')['icon']; ?>
              </svg>
              <span class="ms-3 text-sm-s">
                <?= getMenu($_SESSION['level_id'], 'menu3')['label']; ?>
              </span>
            </a>
          </li>
          <!-- <li>
            <a href="<?= env("BASEURL") ?>/prestasi/index" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-white hover:shadow-sm group">
              <svg class="w-5 h-5 text-gray-900 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm11.378-3.917c-.89-.777-2.366-.777-3.255 0a.75.75 0 0 1-.988-1.129c1.454-1.272 3.776-1.272 5.23 0 1.513 1.324 1.513 3.518 0 4.842a3.75 3.75 0 0 1-.837.552c-.676.328-1.028.774-1.028 1.152v.75a.75.75 0 0 1-1.5 0v-.75c0-1.279 1.06-2.107 1.875-2.502.182-.088.351-.199.503-.331.83-.727.83-1.857 0-2.584ZM12 18a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
              </svg>
              <span class="ms-3 text-sm-s">Panduan</span>
            </a>
          </li> -->
        </ul>
      </div>

      <div>
        <a href="<?= env("BASEURL") ?>/user/logout" class="flex items-center p-2 text-gray-900">
          <svg class="w-5 h-5 text-gray-900 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
            <path fill-rule="evenodd" d="M7.5 3.75A1.5 1.5 0 0 0 6 5.25v13.5a1.5 1.5 0 0 0 1.5 1.5h6a1.5 1.5 0 0 0 1.5-1.5V15a.75.75 0 0 1 1.5 0v3.75a3 3 0 0 1-3 3h-6a3 3 0 0 1-3-3V5.25a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3V9A.75.75 0 0 1 15 9V5.25a1.5 1.5 0 0 0-1.5-1.5h-6Zm10.72 4.72a.75.75 0 0 1 1.06 0l3 3a.75.75 0 0 1 0 1.06l-3 3a.75.75 0 1 1-1.06-1.06l1.72-1.72H9a.75.75 0 0 1 0-1.5h10.94l-1.72-1.72a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
          </svg>
          <span class="ms-3 text-sm-s font-medium text-gray-900">Log out</span>
        </a>
      </div>
    </div>
  </aside>
  <section class="grid md:flex sm:ml-64">