<template>
    <div class="flex justify-center mt-20">
        <form @submit.prevent="sendForgotPasswordEmail" class="flex flex-col bg-gray-200 rounded-md shadow-sm px-4 py-2">
            <h1 class="my-2 text-md text-gray-400">Forgot password</h1>
            <input type="text" id="email" v-model="form.email" class="my-2 rounded p-2" placeholder="email" />
            <div v-if="errors && errors.email" class="text-xs mb-2 text-red-600">
                <span>{{ errors.email[0] }}</span>
            </div>
            <button type=submit class="rounded py-1 px-4 my-2 text-xs bg-gray-400 text-white">Send password</button>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    email: '',
                },
                errors: null
            }
        },
        methods: {
            async sendForgotPasswordEmail() {
                try {
                    await this.$axios.get('sanctum/csrf-cookie')
                    await this.$axios.post('forgot-password', this.form)
                    
                } catch (error) {
                    this.errors = error.response.data.errors;
                }
            },
        }
    }
</script>