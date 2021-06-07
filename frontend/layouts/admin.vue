<template>
  <div class="flex flex-col h-screen lg:flex-row bg-gray-100 font-inter">
      <div class="w-full lg:w-72">
        <NavBar/>
      </div>

      <div class="bg-gray-100 w-full m-2 lg:ml-12 lg:mr-40 lg:mt-20">
        <Nuxt />
      </div>
  </div>
</template>
<script>
export default {
}
</script>
<style scoped>
  .colored{
    background-color: black;
  }
</style>