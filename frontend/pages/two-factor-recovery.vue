<template>
    <div class="flex justify-center mt-20">
        <form @submit.prevent="twoFactorChallenge" class="flex flex-col bg-gray-200 rounded-md shadow-sm px-4 py-2">
            <h1 class="my-2 text-md text-gray-400">Recovery code</h1>
            <input type="text" id="recovery_code" v-model="form.recovery_code" class="mb-2 rounded p-2" placeholder="recovery code" />
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
                }
            }
        },
        methods: {
            async twoFactorChallenge() {
                try {
                    await this.$axios.get('sanctum/csrf-cookie')
                    await this.$axios.post('two-factor-challenge', this.form)

                    await this.$auth.fetchUser()
                    this.$router.replace({ name: 'dashboard' })
                } catch (error) {
                    console.log(error);
                }
            },
        }
    }
</script>

<style scoped>

</style>