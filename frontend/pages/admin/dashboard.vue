<template>
    <div class="flex">
        <div class="flex flex-col items-center m-8">
            Dashboard
        </div>
        <div class="flex flex-col items-center">
            <button
                class="bg-blue-600 text-white my-4 px-4 py-2 text-xs tracking-wide font-bold rounded-lg"
                @click="modalShowing = true"
            >
                Show Modal
            </button>
            <Modal :showing="modalShowing" @close="modalShowing = false">
                <AdminRegisterForm></AdminRegisterForm>
            </Modal>
        </div>
    </div>
</template>

<script>
    export default {
        layout: 'admin',

        data() {
            return {
                modalShowing: false,
            }
        }
    }
</script>

<style scoped>

</style>