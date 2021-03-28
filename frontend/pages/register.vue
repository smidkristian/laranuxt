<template>
    <div class="flex justify-center mt-20">
        <form @submit.prevent="register" class="flex flex-col bg-gray-200 rounded-md shadow-sm px-4 py-2">
            <h1 class="my-2 text-md text-gray-400">Login</h1>

            <input type="text" id="name" v-model="form.name" class="mb-2 rounded p-2" placeholder="name" />
            <input type="text" id="email" v-model="form.email" class="mb-2 rounded p-2" placeholder="email" />
            <input type="password" id="password" v-model="form.password" class="mb-2 rounded p-2" placeholder="password" />
            <input type="password" id="password_confirmation" v-model="form.password_confirmation" class="mb-2 rounded p-2" placeholder="confirm password" />
            <button type=submit class="rounded py-1 px-4 my-1 text-xs bg-gray-400 text-white">Confirm</button>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: ''
                }
            }
        },
        methods: {
            async register() {
                try {
                    await this.$axios.get('sanctum/csrf-cookie')
                    await this.$axios.post('register', this.form)

                    await this.$auth.loginWith('laravelSanctum', {
                        data: {
                            email: this.form.email,
                            password: this.form.password
                        }
                    })
                } catch (error) {
                    console.log(error);
                }
            },
        }
    }
</script>

<style scoped>

</style>