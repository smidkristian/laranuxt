<template>
    <div class="flex justify-center mt-20">
        <form @submit.prevent="login" class="flex flex-col bg-gray-200 rounded-md shadow-sm px-4 py-2">
            <h1 class="my-2 text-md text-gray-400">Login</h1>
            <input type="text" id="email" v-model="form.email" class="my-2 rounded p-2" placeholder="email" />
            <div v-if="errors && errors.email" class="text-xs mb-2 text-red-600">
                <span>{{ errors.email[0] }}</span>
            </div>
            <input type="password" id="password" v-model="form.password" class="mb-2 rounded p-2" placeholder="password" />
            <div v-if="errors && errors.password" class="text-xs mb-2 text-red-600">
                <span>{{ errors.password[0] }}</span>
            </div>
            <div class="flex justify-end my-1">
                <Nuxt-Link :to="{ name: 'website-forgot-password' }" class="text-xs text-gray-800 hover:text-gray-400">I forgot my password</Nuxt-Link>
            </div>
            <button type=submit class="rounded py-1 px-4 my-2 text-xs bg-gray-400 text-white">Confirm</button>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    email: '',
                    password: ''
                },
                errors: null
            }
        },
        methods: {
            async login() {
                try {
                    await this.$auth.loginWith('laravelSanctum', {
                        data: this.form
                    })
                } catch (error) {
                    this.errors = error.response.data.errors;
                }
            },
        }
    }
</script>

<style scoped>

</style>