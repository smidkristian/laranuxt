<template>
    <NuxtLink :to="href" :class="classes" 
        class="inline-flex items-center px-2 py-1 mb-2 leading-5 text-sm">
        <slot></slot>
    </NuxtLink>
</template>
<script>
export default {
    props: [
        'href', 'active'
    ],
    computed: {
            classes() {
                return this.active
                            ? 'bg-gray-100 border-b-2 border-red-400 text-gray-900 focus:outline-none focus:border-red-400 transition duration-150 ease-in-out'
                            : 'border-b-2 border-transparent text-gray-500 hover:bg-gray-100 hover:text-gray-700 hover:border-red-100 focus:outline-none focus:text-gray-700 focus:border-red-200 transition duration-150 ease-in-out'
            }
        }
}
</script>