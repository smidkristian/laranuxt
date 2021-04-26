<template>
    <div class="flex flex-col justify-center w-full">
        <label class="uppercase text-xs text-gray-400">
            {{ label }}
        </label>
        <input :type="text" class="my-1 rounded py-1 px-2 border text-sm" />
    </div>
</template>

<script>
    export default {
        props: {
            type: String,
            label: String
        }
    }
</script>

<style scoped>

</style>