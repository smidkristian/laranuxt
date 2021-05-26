<template>
    <div class="flex flex-col justify-center w-full">
        <label class="uppercase text-xs text-gray-400">
            {{ label }}
        </label>
        <input :type="type" 
            v-bind:value="value"
            v-on:input="$emit('input', $event.target.value)"
            :placeholder="placeholder"
            class="my-1 rounded py-1 px-2 border text-sm focus:outline-none" />
    </div>
</template>

<script>
    export default {
        props: [
            'type',
            'value',
            'label',
            'placeholder'
        ]
    }
</script>

<style scoped>

</style>