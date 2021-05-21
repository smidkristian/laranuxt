<template>
  <div class="flex justify-between">
      <div class="flex p-3">
          {{ currentTablePage }} of {{ tablePageTotal }}
      </div>
      <div class="p-2">
          <ButtonBorder :type="'button'" @click.native="$emit('prev-page')">
              <IconLeft />
          </ButtonBorder>
          <ButtonBorder :type="'button'" class="ml-2" @click.native="$emit('next-page')">
              <IconRight />
          </ButtonBorder>
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
