<template>
  <div class="flex flex-col lg:grid lg:grid-cols-12 h-screen">
      <div class="w-full lg:grid lg:col-span-2">
        <AdminNavBar/>
      </div>

      <div class="bg-gray-100 h-full lg:grid lg:col-span-10">
        <Nuxt />
      </div>
  </div>
</template>
<script>
export default {
}
</script>