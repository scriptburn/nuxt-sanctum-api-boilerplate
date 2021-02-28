<template>
  <div>
    <nav class="bg-gray-800">
      <div class="px-2 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
          <div
            v-if="isLoggedIn"
            class="flex items-center justify-center flex-1 sm:items-stretch sm:justify-end"
          >
            <a
              class="anchor-btn hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 hover:text-white focus:outline-none focus:text-white"
              @click="logout"
              >Logout</a
            >
          </div>
        </div>
      </div>

      <!--
        Mobile menu, toggle classes based on menu state.

        Menu open: "block", Menu closed: "hidden"
      -->
    </nav>
    <nuxt />
  </div>
</template>

<script>
export default {
  computed: {
    isLoggedIn() {
      return this.$auth.user && this.$auth.user.email
    },
  },

  methods: {
    logout() {
      this.$auth.logout()
    },
  },
}
</script>
