<template>
  <div class="flex justify-between bg-white text-gray-400">
      <div class="flex p-3 ml-4">
          {{ currentTablePage }} / {{ tablePageTotal }}
      </div>
      <div class="p-2">
          <ButtonTransparent :type="'button'" @click.native="$emit('prev-page')">
              <IconLeft />
          </ButtonTransparent>
          <ButtonTransparent :type="'button'" class="ml-2" @click.native="$emit('next-page')">
              <IconRight />
          </ButtonTransparent>
      </div>
  </div>
</template>

<script>
    export default {
        props: [
          'currentTablePage',
          'tablePageTotal'
        ]
    }
</script>

<style scoped>

</style>
