<template lang="html">
  <div class="bg-gray-100 fixed flex justify-center items-center w-screen h-screen" v-if="loading">
    <LoadingSpinner
      :animation-duration="2500"
      :rhombus-size="15"
      color="#EB322F"
    />
  </div>
</template>

<script>
  export default {
    data: () => ({
      loading: false
    }),
    methods: {
      start() {
        this.loading = true
      },
      finish() {
        this.loading = false
      }
    }
  }
</script>

<style scoped>
  /* .loading-page {
    width: 100%;
    height: 100%;
    background: rgb(255,255,255);
    background: linear-gradient(145deg, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
  } */
</style>
