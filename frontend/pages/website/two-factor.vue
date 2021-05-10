<template>
    <div class="flex justify-center mt-20">
        <template v-if="$auth.user.two_factor_enabled">
            <form @submit.prevent="disableTwoFactorAuthtentication" class="flex flex-col bg-gray-200 rounded-md shadow-sm px-6 py-2">
                <h1 class="my-2 text-md text-gray-400">Two factor authtentication</h1>

                <button type=submit class="rounded py-1 px-4 my-2 text-xs bg-gray-400 text-white">Disable</button>

                <div v-if="qrCode" v-html="qrCode" class="m-6" />

                <div v-if="recoveryCodes" class="">
                    <h1 class="text-md text-gray-400 mt-4 mb-2">Recovery codes:</h1>
                    <div class="my-2">
                        <div v-for="(code, index) in recoveryCodes" :key="index" class="flex flex-col py-2 pl-2 text-xs text-gray-800">
                            {{ code }}
                        </div>
                    </div>
                </div>
            </form>
        </template>
        <template v-if="!$auth.user.two_factor_enabled">
            <form @submit.prevent="enableTwoFactorAuthtentication" class="flex flex-col bg-gray-200 rounded-md shadow-sm px-4 py-2">
                <h1 class="my-2 text-md text-gray-400">Two factor authtentication</h1>
                <button type=submit class="rounded py-1 px-4 my-2 text-xs bg-gray-400 text-white">Enable</button>
            </form>
        </template>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                qrCode: null,
                recoveryCodes: null
            }
        },
        // async mounted() {
        //     if( this.$auth.user.two_factor_enabled ) {
        //         this.getRecoveryCodes();
        //     }
        // },
        methods: {
            async enableTwoFactorAuthtentication() {
                try {
                    await this.$axios.get('sanctum/csrf-cookie')
                    await this.$axios.post('user/two-factor-authentication')

                    await this.$auth.fetchUser()

                    this.qrCode = (await this.$axios.get('user/two-factor-qr-code')).data.svg
                    this.recoveryCodes = (await this.$axios.get('user/two-factor-recovery-codes')).data

                } catch (error) {
                   //
                }
            },
            async disableTwoFactorAuthtentication() {
                try {
                    await this.$axios.delete('user/two-factor-authentication')
                    await this.$auth.fetchUser()

                } catch (error) {
                   //
                }
            },

            // async getRecoveryCodes() {
            //     this.recoveryCodes = (await this.$axios.get('user/two-factor-recovery-codes')).data
            // }
        }
    }
</script>

<style scoped>

</style>