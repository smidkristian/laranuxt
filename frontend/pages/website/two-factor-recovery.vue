<template>
    <div class="flex justify-center mt-20">
        <form @submit.prevent="twoFactorChallenge" class="flex flex-col bg-gray-200 rounded-md shadow-sm px-4 py-2">
            <h1 class="my-2 text-md text-gray-400">Recovery code</h1>
            <input type="text" id="recovery_code" v-model="form.recovery_code" class="mb-2 rounded p-2" placeholder="recovery code" />
            <div v-if="errors && errors.code" class="text-xs mb-2 text-red-600">
                <span>{{ errors.code[0] }}</span>
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
                    recovery_code: ''
                },
                errors: null
            }
        },
        methods: {
            async twoFactorChallenge() {
                try {
                    await this.$axios.get('sanctum/csrf-cookie')
                    await this.$axios.post('two-factor-challenge', this.form)

                    await this.$auth.fetchUser()
                    this.$router.replace({ name: 'website-dashboard' })
                } catch (error) {
                    this.errors = error.response.data.errors;
                }
            },
        }
    }
</script>

<style scoped>

</style>