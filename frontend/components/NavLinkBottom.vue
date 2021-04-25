<template>
    <!-- asi trochu zbytecny mit special navlink component pro dva linky, ale zatim me nic lepsiho nenapadlo -->
    <NuxtLink :to="href" :class="classes" 
        class="inline-flex items-center px-2 py-2 leading-5 text-sm w-full">
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
                            : 'text-gray-500 hover:text-gray-700 hover:bg-gray-100 focus:outline-none focus:text-gray-700 transition duration-150 ease-in-out'
            }
        }
}
</script>