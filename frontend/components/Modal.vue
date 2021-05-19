<template>
    <transition name="fade">
        <div v-if="showing"
            class="fixed inset-0 w-full h-screen flex items-center justify-center colored"
            @click.self="close"
            @keyup.esc="close"
            tabindex="0"
        >
            <div class="flex flex-col bg-white p-2 rounded-md max-w-content shadow-lg">
                <div class="flex justify-end">
                    <button @click.prevent="close" class="text-xl text-gray-500 p-2" aria-label="close">
                        <IconClose />
                    </button>
                </div>
                <slot />
            </div>
        </div>
  </transition>
</template>

<script>
    export default {
        props: {
            showing: {
            required: true,
            type: Boolean
            }
        },

        methods: {
            // escape works only after the modal is clicked
            close() {
                this.$emit('close');
            }
        }
    };
</script>

<style scoped>
    .fade-enter-active,
    .fade-leave-active {
        transition: all 0.3s;
    }
    .fade-enter,
    .fade-leave-to {
        opacity: 0;
    }
    .colored {
        background-color: rgba(255, 255, 255, 0.75);
    }
</style>