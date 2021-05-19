<template>
    <div class="flex w-full">
        <input type="checkbox" class="flex self-start my-1 mr-2 rounded border text-sm" />
        <label class="flex self-center text-xs text-gray-400">
            {{ label }}
        </label>
    </div>
</template>

<script>
    export default {
        props: {
            label: String
        }
    }
</script>

<style scoped>

</style>