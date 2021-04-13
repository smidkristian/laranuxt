<template lang="html">
  <div class="loading-page fixed flex justify-center items-center" v-if="loading">
    <looping-rhombuses-spinner
      :animation-duration="2500"
      :rhombus-size="15"
      color="#e2e2e2"
    />
  </div>
</template>

<script>
    import { LoopingRhombusesSpinner } from '../node_modules/epic-spinners'
  export default {
    data: () => ({
      loading: false
    }),
    components: {
      LoopingRhombusesSpinner
    },
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
    width: 100%;
    height: 100%;
    background: rgb(255,255,255);
    background: linear-gradient(145deg, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
  }
</style>