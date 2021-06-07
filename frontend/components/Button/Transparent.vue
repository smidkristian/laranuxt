<template>
  <button :type="type" class="px-2 py-1 rounded text-gray-400 focus:outline-none hover:text-gray-800">
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
