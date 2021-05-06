<template>
    <transition>
        <div>
            <div>
                <NuxtLink :to="href" :class="classes"
                    class="flex justify-between px-2 py-2 mb-2 leading-5 text-sm rounded w-full">

                    <div class="flex items-center">
                        <slot></slot>
                    </div>
                    <div class="flex items-center" >
                        <button @click="toggleDropdown" :class="classes"><icons-dropdown /></button>
                    </div>

                </NuxtLink>
            </div>
            <div v-if="subLinks || $route.name == 'admin-options'">
                <ul>
                    <li>Link 1</li>
                    <li>Link 2</li>
                    <li>Link 3</li>
                    <li>Link 4</li>
                </ul>
            </div>
        </div>
    </transition>
</template>

<script>
    export default {
        props: {
            href: Object,
            active: Boolean,
        },
        data() {
            return {
                subLinks: false,
            }
        },
        methods: {
            toggleDropdown: function() {
                this.subLinks = !this.subLinks;
            }
        },
        computed: {
            classes() {
                return this.active
                            ? 'bg-gray-100 text-gray-900 focus:outline-none transition duration-150 ease-in-out'
                            : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700 focus:outline-none focus:text-gray-700 transition duration-150 ease-in-out'
            }
        }
    }
</script>

<style scoped>
    /* Enter and leave animations can use different */
    /* durations and timing functions.              */
    .slide-fade-enter-active {
        transition: all .3s ease;
    }
    .slide-fade-leave-active {
        transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }
    .slide-fade-enter, .slide-fade-leave-to
    /* .slide-fade-leave-active below version 2.1.8 */ {
        transform: translateX(10px);
        opacity: 0;
    }
</style>