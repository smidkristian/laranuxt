<template>
    <button :type="type" class="rounded bg-blue-400 px-4 py-1 text-white text-sm">
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