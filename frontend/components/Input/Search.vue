<template>
    <div class="flex items-center w-full rounded" :class="{ 'bg-white' : searching, 'shadow' : searching }">
        <IconSearch class="text-gray-400"/>
        <input :type="type" 
            v-bind:value="value"
            @input="$emit('input', $event.target.value)"
            @focus="searching = true"
            @blur="searching = false"
            :placeholder="placeholder"
            class="bg-transparent my-1 py-1 px-2 text-sm focus:outline-none focus:rounded focus:bg-white" />
    </div>
</template>

<script>
    export default {
        props: [
            'type',
            'value',
            'label',
            'placeholder'
        ],
        data() {
            return {
                searching: false
            }
        }
    }
</script>

<style scoped>

</style>