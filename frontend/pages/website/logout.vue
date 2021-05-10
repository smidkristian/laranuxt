<template>
    <div class="flex justify-center">
        <button type=button @click="logout" class="rounded py-1 px-4 text-xs bg-gray-400 text-white">Logout</button>
    </div>
</template>

<script>
    export default {
        methods: {
            logout() {
                this.$store.dispatch("auth/logout");
                this.$router.replace({ name: 'website-login' });
            },
        }
    }
</script>

<style scoped>

</style>