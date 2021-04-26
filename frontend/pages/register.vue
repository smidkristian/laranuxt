<template>
    <div class="flex justify-center mt-20">
        <form v-if="!loading" @submit.prevent="register" class="flex flex-col bg-gray-200 rounded-md shadow-sm px-4 py-2">
            <h1 class="my-2 text-md text-gray-400">Register</h1>
            <input type="text" id="name" v-model="form.name" class="mb-2 rounded p-2" placeholder="name" />
            <div v-if="errors && errors.name" class="text-xs mb-2 text-red-600">
                <span>{{ errors.name[0] }}</span>
            </div>
            <input type="text" id="email" v-model="form.email" class="mb-2 rounded p-2" placeholder="email" />
            <div v-if="errors && errors.email" class="text-xs mb-2 text-red-600">
                <span>{{ errors.email[0] }}</span>
            </div>
            <input type="password" id="password" v-model="form.password" class="mb-2 rounded p-2" placeholder="password" />
            <div v-if="errors && errors.password" class="text-xs mb-2 text-red-600">
                <span>{{ errors.password[0] }}</span>
            </div>
            <input type="password" id="password_confirmation" v-model="form.password_confirmation" class="mb-2 rounded p-2" placeholder="confirm password" />
            <button type=submit class="rounded py-1 px-4 my-1 text-xs bg-gray-400 text-white">Confirm</button>
        </form>
        <div v-else class="flex justify-center mt-20 text-md bg-gray-300 rounded-xl shadow-inner py-4 px-6">
            {{ process }}
        </div>
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
                },
                errors: null,
                loading: false,
                process: '',
            }
        },
        methods: {
            async register() {
                try {
                    await this.$nuxt.$loading.start()
                    this.loading = true
                    this.process = 'Validating...'

                    await this.$axios.get('sanctum/csrf-cookie')

                    await this.$axios.post('api/register', this.form)

                    this.process = 'Logging in...'

                    await this.$auth.loginWith('laravelSanctum', {
                        data: {
                            email: this.form.email,
                            password: this.form.password
                        }
                    })

                    await this.$nuxt.$loading.finish()

                } catch (error) {
                    await this.$nuxt.$loading.finish()
                    if (error.response) {
                        this.errors = error.response.data.errors;
                    }
                }
            },
        }
    }
</script>

<style scoped>

</style>