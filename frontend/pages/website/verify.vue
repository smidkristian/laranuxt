<template>
    <div>
        <div class="flex flex-col items-center mt-6">
            <p class="m-2">Please verify your email first.</p>
            <form @submit.prevent="resendEmailVerification">
                <button type="submit" class="rounded py-1 px-4 my-1 text-xs bg-gray-400 text-white">Resend Verification Email</button>
            </form>
        </div>
    </div>
</template>
<script>
export default {
    methods: {
        async resendEmailVerification() {
            await this.$axios.post('email/verification-notification');
        }
    }
}
</script>