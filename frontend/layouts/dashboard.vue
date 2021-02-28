<template>
  <div class="flex h-screen overflow-hidden bg-gray-100">
    <!-- Static sidebar for desktop -->
    <div class="hidden md:flex md:flex-shrink-0">
      <div class="flex flex-col w-64">
        <div class="flex items-center flex-shrink-0 h-20 px-4 bg-gray-900">
          <logo></logo>
        </div>
        <div class="flex flex-col flex-1 h-0 overflow-y-auto">
          <nav class="flex-1 px-2 py-4 bg-gray-800">
            <nuxt-link
              v-for="(item, index) in items"
              :key="index"
              :to="item.to"
              class="flex items-center px-2 py-2 text-sm font-medium leading-5 text-gray-300 transition duration-150 ease-in-out rounded-md group hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700"
              :class="item.classes"
            >
              <component :is="item.logo" />
              {{ item.name }}
            </nuxt-link>
          </nav>
        </div>
      </div>
    </div>

    <div class="flex flex-col flex-1 w-0 overflow-hidden">
      <div class="relative z-10 flex flex-shrink-0 h-16 bg-white shadow">
        <button
          class="px-4 text-gray-500 border-r border-gray-200 focus:outline-none focus:bg-gray-100 focus:text-gray-600 md:hidden"
          aria-label="Open sidebar"
          @click="mobileSideBar = true"
        >
          <svg
            class="w-6 h-6"
            stroke="currentColor"
            fill="none"
            viewBox="0 0 24 24"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M4 6h16M4 12h16M4 18h7"
            />
          </svg>
        </button>

        <div class="flex justify-between flex-1 px-4">
          <div class="flex flex-1">
            <form class="flex w-full md:ml-0" action="#" method="GET">
              <label for="search_field" class="sr-only">Search</label>
              <div
                class="relative w-full text-gray-400 focus-within:text-gray-600"
              >
                <div
                  class="absolute inset-y-0 left-0 flex items-center pointer-events-none"
                >
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                    />
                  </svg>
                </div>
                <input
                  id="search_field"
                  class="block w-full h-full py-2 pl-8 pr-3 text-gray-900 placeholder-gray-500 rounded-md focus:outline-none focus:placeholder-gray-400 sm:text-sm"
                  placeholder="Search"
                  type="search"
                />
              </div>
            </form>
          </div>

          <div class="flex items-center ml-4 md:ml-6">
            <button
              class="p-1 text-gray-400 rounded-full hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:shadow-outline focus:text-gray-500"
              aria-label="Notifications"
            >
              <svg
                class="w-6 h-6"
                stroke="currentColor"
                fill="none"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                />
              </svg>
            </button>

            <!-- Profile dropdown -->
            <div class="relative ml-3">
              <div>
                <button
                  id="user-menu"
                  class="flex items-center max-w-xs text-sm rounded-full focus:outline-none focus:shadow-outline"
                  aria-label="User menu"
                  aria-haspopup="true"
                  @click="showDropDown = !showDropDown"
                >
                  <img
                    class="w-8 h-8 rounded-full"
                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                    alt="Profile Image"
                  />
                </button>
              </div>

              <transition
                enter-active-class="transition duration-100 ease-out"
                enter-class="transform scale-95 opacity-0"
                enter-to-class="transform scale-100 opacity-100"
                leave-active-class="transition duration-75 ease-in"
                leave-class="transform scale-100 opacity-100"
                leave-to-class="transform scale-95 opacity-0"
              >
                <div
                  v-show="showDropDown"
                  class="absolute right-0 w-48 mt-2 origin-top-right rounded-md shadow-lg"
                >
                  <div
                    class="py-1 bg-white rounded-md shadow-xs"
                    role="menu"
                    aria-orientation="vertical"
                    aria-labelledby="user-menu"
                  >
                    <a
                      href="#"
                      class="block px-4 py-2 text-sm text-gray-700 transition duration-150 ease-in-out hover:bg-gray-100"
                      role="menuitem"
                      >Your Profile</a
                    >
                    <a
                      href="#"
                      class="block px-4 py-2 text-sm text-gray-700 transition duration-150 ease-in-out hover:bg-gray-100"
                      role="menuitem"
                      >Settings</a
                    >
                    <button
                      class="block w-full px-4 py-2 text-sm text-left text-gray-700 transition duration-150 ease-in-out hover:bg-gray-100"
                      role="menuitem"
                      @click="logout"
                    >
                      Log out
                    </button>
                  </div>
                </div>
              </transition>
            </div>
          </div>
        </div>
      </div>

      <nuxt />
    </div>
  </div>
</template>

<script>
import DashboardLogo from '../components/DashboardLogo'

export default {
  name: 'DashboardLayout',
  components: {
    DashboardLogo,
  },
  middleware: 'user',
  data() {
    return {
      showDropDown: false,
      mobileSideBar: false,
      items: [
        {
          name: 'Dashboard',
          logo: 'dashboard-logo',
          to: '/dashboard',
          classes: '',
        },
      ],
    }
  },

  methods: {
    async logout() {
      await this.$auth.logout()
    },
  },
}
</script>

<style>
.nuxt-link-active {
  @apply bg-gray-900 text-white;
}
</style>
