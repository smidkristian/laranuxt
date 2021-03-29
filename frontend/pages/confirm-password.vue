<template>
    <div class="flex justify-center mt-20">
        <form @submit.prevent="confirmPassword" class="flex flex-col bg-gray-200 rounded-md shadow-sm px-4 py-2">
            <h1 class="my-2 text-md text-gray-400">Password confirmation</h1>
            <input type="password" id="password" v-model="form.password" class="mb-2 rounded p-2" placeholder="password" />
            <button type=submit class="rounded py-1 px-4 my-2 text-xs bg-gray-400 text-white">Confirm</button>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    password: ''
                }
            }
        },
        methods: {
            async confirmPassword() {
                try {
                    await this.$axios.get('sanctum/csrf-cookie')
                    await this.$axios.post('user/confirm-password', this.form)

                    this.$router.replace({ name: this.$route.query.return || 'index' });
                } catch (error) {
                    console.log(error);
                }
            },
        }
    }
</script>

<style scoped>

</style>