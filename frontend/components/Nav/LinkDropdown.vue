<template>
    <div @mouseover="showSubLinks = true" @mouseleave="showSubLinks = false">
        <div>
            <NuxtLink :to="href" :class="classes"
                class="flex justify-between px-2 py-2 mb-2 leading-5 text-sm rounded w-full">

                <div class="flex items-center">
                    <slot></slot>
                </div>
                <div class="flex items-center" >
                    <IconDropdown />
                </div>

            </NuxtLink>
        </div>
        <div v-if="showSubLinks || $route.name.includes('admin-leads')" class="text-gray-900 text-sm pb-2 border-b mb-2">
            <ul class="flex flex-col ml-10">
                <NuxtLink :to=" { name: link.link }"
                    v-for="(link, index) in sublinks" :key="index"
                    :class="{ 'underline' : $route.name == link.link }" 
                    class="px-2 py-1 hover:underline">{{ link.title }}</NuxtLink>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            href: Object,
            active: Boolean,
            sublinks: Array
        },
        data() {
            return {
                showSubLinks: false,
            }
        },
        computed: {
            classes() {
                return this.active
                            ? 'bg-gray-100 text-gray-900 focus:outline-none transition duration-150 ease-in-out'
                            : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700 focus:outline-none focus:text-gray-700 transition duration-150 ease-in-out'
            },
        }
    }
</script>

<style scoped>

</style>