<template>
  <div
    class="flex flex-col justify-center min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8"
  >
    <h2
      class="mt-6 text-3xl font-extrabold leading-9 text-center text-gray-900"
    >
      Search for a keyword
    </h2>
    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
      <form @submit.prevent="search">
        <div class="grid grid-cols-4">
          <div class="col-span-3">
            <t-input
              v-model="form.keyword"
              class="h-full border-r-0 rounded-r-none"
              placeholder="E.g Tenerife Holidays"
              :disabled.sync="loading"
            ></t-input>
          </div>
          <!-- ... -->
          <div>
            <t-select
              v-model="form.location"
              class="h-full rounded-l-none"
              :options="locations"
              text-attribute="label"
              value-attribute="value"
              :disabled.sync="loading"
            >
            </t-select>
          </div>
        </div>

        <div class="mt-5">
          <t-button
            :class="[
              loading
                ? 'disabled'
                : 'relative  content-center px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out border border-transparent rounded-md bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700',
            ]"
            class="mx-auto"
          >
            <template v-if="loading">
              <spinner class="mx-auto"></spinner
            ></template>
            <template v-else> Search </template>
          </t-button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Dashboard',

  data() {
    return {
      loading: false,
      locations: [
        { label: 'US', value: 'us' },
        { label: 'UK', value: 'uk' },
      ],
      form: { location: 'uk', keyword: 'Tenerife Holidays' },
    }
  },
  methods: {
    search() {
      this.loading = true

      this.$axios
        .get(`api/search/${this.form.keyword}`, this.form)
        .then((response) => {})
        .finally(() => {
          this.loading = false
        })
    },
  },
}
</script>

<style scoped></style>
