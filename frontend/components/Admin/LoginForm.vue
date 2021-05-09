<template>
    <div class="flex flex-col">
        <div class="flex flex-col items-center bg-white rounded-t-md shadow">
            <form @submit.prevent="login" class="flex flex-col bg-white rounded-t-md w-full px-12">
                <div class="flex justify-center">
                    <logos-login-form></logos-login-form>
                </div>

                <div class="mb-2">
                    <InputsBasicInput :type="'email'" :label="'E-mail'" id="email" v-model="form.email" />
                    <div v-if="errors && errors.email" class="text-xs mb-2 text-red-600">
                        <span>{{ errors.email[0] }}</span>
                    </div>
                </div>

                <div class="mb-2">
                    <InputsBasicInput :type="'password'" :label="'Password'" id="password" v-model="form.password" />
                    <div v-if="errors && errors.password" class="text-xs mb-2 text-red-600">
                        <span>{{ errors.password[0] }}</span>
                    </div>
                </div>
                
                <Button :type="'submit'" class="mt-2 mb-4">Login</Button>
            </form>
        </div>

        <div class="flex flex-col items-center py-4 bg-gray-50 text-gray-500 text-xs rounded-b-md shadow w-full">
            <Nuxt-Link :to="{ name: 'forgot-password' }" class="hover:text-gray-400 mb-2">Do not have an accout? Sign up!</Nuxt-Link>
            <Nuxt-Link :to="{ name: 'forgot-password' }" class="hover:text-gray-400">Forgot your password?</Nuxt-Link>
        </div>
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