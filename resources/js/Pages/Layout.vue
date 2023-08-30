<script setup>
import { Link } from '@inertiajs/vue3'
//* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;
for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>

<template>
  <main>
    <div class="drawer lg:drawer-open">
      <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
      <div class="drawer-content block overflow-x-hidden max-w-full">
        <!-- Page content here -->
        <div data-theme="fantasy" class="block min-h-screen ">
          <div class="navbar bg-base-100">
            <div class="flex-none">
              <label for="my-drawer-2" class="btn btn-primary drawer-button btn-square btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                  class="inline-block w-5 h-5 stroke-current">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                  </path>
                </svg>
              </label>
            </div>
            <div class="flex-1">
              <a class="btn btn-ghost normal-case text-xl">Bilpro|JNCX</a>
            </div>
            <div class="flex-none">
              <button class="btn btn-square btn-ghost">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                  class="inline-block w-5 h-5 stroke-current">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z">
                  </path>
                </svg>
              </button>
            </div>
          </div>
          <div class="flex flex-col p-10 ">
            <slot />
          </div>
        </div>
      </div>
      <div class="drawer-side">
        <label for="my-drawer-2" class="drawer-overlay"></label>
        <ul class="menu p-4 w-80 min-h-full bg-base-200 text-base-content">
          <!-- Sidebar content here -->
          <li>
            <Link href="/">Home</Link>
          </li>
          <li>
            <Link href="/about">About</Link>
          </li>
          <li>
            <Link href="/contact">Contact</Link>
          </li>
          <li>
            <Link href="/fuady">Fuady</Link>
          </li>
          <li>
            <Link href="/ica">Annisa</Link>
          </li>
          <li>
            <Link href="/irfan">Irfan</Link>
          </li>
          <li>
            <Link href="/ivan">Ivan</Link>
          </li>
          <li>
            <Link href="/riza">Riza</Link>
          </li>
          <li>
            <Link href="/rifqi">Rifqi</Link>
          </li>
        </ul>

      </div>
    </div>

  </main>
</template>