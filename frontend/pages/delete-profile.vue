<template>
    <div class="flex justify-center mt-20">
        <form @submit.prevent="deleteProfile" class="flex flex-col bg-gray-200 rounded-md shadow-sm px-4 py-2">
            <h1 class="my-2 text-md text-gray-400">Are you sure?</h1>
            <button type=submit class="rounded py-1 px-4 my-2 text-xs bg-gray-400 text-white">Delete account</button>
        </form>
    </div>
</template>

<script>
    export default {
        methods: {
            async deleteProfile() {
                try {
                    await this.$axios.delete('api/user');
                    await this.$auth.logout();

                } catch (error) {
                   //
                }
            },
        }
    }
</script>

<style scoped>

</style>