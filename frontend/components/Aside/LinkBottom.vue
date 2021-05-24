<template>
    <NuxtLink :to="href" :class="classes"
        class="inline-flex items-center px-2 py-2 mt-2 w-full leading-5 text-sm rounded">
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
                        ? 'bg-gray-100 text-gray-900 focus:outline-none transition duration-150 ease-in-out'
                        : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700 focus:outline-none focus:text-gray-700 transition duration-150 ease-in-out'
        }
    }
}
</script>
