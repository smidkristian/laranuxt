<template>
  <button :type="type" class="px-2 py-1 rounded font-bold focus:outline-none hover:bg-gray-50">
    <slot></slot>
  </button>
</template>
<script>
    export default {
        props: {
            type: String
        }
    }
</script>

<style scoped>

</style>
