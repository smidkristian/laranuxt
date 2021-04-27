<template>
    <div class="grid grid-cols-2">
        <div class="grid col-span-1">
            <div class="max-w-lg">
                <div class="flex flex-col items-center bg-white rounded-t-md">
                    <form @submit.prevent="register" class="flex flex-col bg-white rounded w-full px-12">
                        <h1 class="font-bold text-4xl mb-2 pb-4">Sign up</h1>

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

                        <div class="mb-2">
                            <InputsBasicInput :type="'password'" :label="'Confirm Password'" id="password_confirmation" v-model="form.password_confirmation" />
                        </div>

                        <div class="mb-2">
                            <InputsCheckbox name="gdpr" class="mb-2" :label="'I agree with GDPR'" />
                            <InputsCheckbox name="terms" 
                                :label="'By signing up you will create GroupeSEB account which you can use also on our other pormo websites: promo.tefal.cz, promo.rowenta.cz, promo.wmf.cz, promo.krups.cz.'" />
                        </div>
                        
                        <Button :type="'submit'" class="mt-2 mb-4">Sign up</Button>
                    </form>
                </div>

                <div class="flex flex-col items-center py-4 text-gray-500 text-xs rounded-b-md w-full">
                    <Nuxt-Link :to="{ name: 'forgot-password' }" class="hover:text-gray-400 mb-2">Already have an account? Log in!</Nuxt-Link>
                </div>
            </div>
        </div>
        <div class="grid col-span-1">
            <div class="flex justify-center">
                <!-- <logos-login-form></logos-login-form> -->
                GroupeSEB logo
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    email: '',
                    password: '',
                    password_confirmation: ''
                },
                errors: null
            }
        },
        methods: {
            async register() {
                try {
                    await this.$axios.get('sanctum/csrf-cookie')

                    await this.$axios.post('api/register', this.form)

                    await this.$auth.loginWith('laravelSanctum', {
                        data: {
                            email: this.form.email,
                            password: this.form.password
                        }
                    })

                } catch (error) {
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