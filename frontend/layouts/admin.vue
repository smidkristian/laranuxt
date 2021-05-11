<template>
  <div class="flex flex-col lg:grid lg:grid-cols-8 h-screen bg-gray-100">
      <div class="w-full lg:grid lg:col-span-1 min-w-min">
        <AdminNavBar/>
      </div>

      <div class="bg-gray-100 h-full lg:grid lg:col-span-7">
        <Nuxt />
      </div>
  </div>
</template>
<script>
export default {
}
</script>