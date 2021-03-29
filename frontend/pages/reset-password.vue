<template>
    <div class="flex justify-center mt-20">
        <form @submit.prevent="resetPassword" class="flex flex-col bg-gray-200 rounded-md shadow-sm px-4 py-2">
            <h1 class="my-2 text-md text-gray-400">Password reset</h1>
            <input type="text" id="email" v-model="form.email" class="my-2 rounded p-2" placeholder="email" />
            <input type="password" id="password" v-model="form.password" class="mb-2 rounded p-2" placeholder="password" />
            <input type="password" id="password_confirmation" v-model="form.password_confirmation" class="mb-2 rounded p-2" placeholder="password confirmation" />
            
            <button type=submit class="rounded py-1 px-4 my-2 text-xs bg-gray-400 text-white">Confirm</button>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    email: this.$route.query.email || '',
                    password: '',
                    password_confirmation: '',
                    token: this.$route.query.token || ''
                }
            }
        },
        methods: {
            async resetPassword() {
                try {
                    await this.$axios.get('sanctum/csrf-cookie')
                    await this.$axios.post('reset-password', this.form)
                    
                    this.$router.replace({ name: 'login' });
                } catch (error) {
                    console.log(error);
                }
            },
        }
    }
</script>

<style scoped>

</style>