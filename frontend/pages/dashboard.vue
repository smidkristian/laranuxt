<template>
    <div class="flex justify-center m-4">
        Dashboard
    </div>
</template>

<script>
    export default {
        middleware: ['auth', 'verified'],
        async mounted() {
            await this.$axios.get('api/dashboard');
        }
    }
</script>

<style scoped>

</style>