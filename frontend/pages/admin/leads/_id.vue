<template>
    <div class="flex justify-center items-center h-screen">
        {{ lead.customer }}
    </div>
</template>

<script>
    export default {
        layout: 'admin',
        data() {
            return {
                //
            }
        },
        async asyncData({ params, $axios }) {
            const getLead = await $axios.get(`/api/leads/${params.id}`);
            let lead = getLead.data;
            return { lead }
        }
    }
</script>

<style scoped>

</style>