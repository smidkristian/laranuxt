<template lang="html">
  <div class="fixed loading-page flex justify-center items-center w-screen h-screen" v-if="loading">
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
  .loading-page {
    background: rgb(255,255,255);
    background: radial-gradient(circle, rgba(255,255,255, 0.8) 0%, rgba(255,255,255,0) 8%);
  }
</style>
