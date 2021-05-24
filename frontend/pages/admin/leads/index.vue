<template>
    <div class="w-full max-w-7xl">
        <div class="flex text-left text-4xl font-bold border-b">
            <h1 class="pb-4">Leads</h1>
        </div>
        <TableComponent
        :tableHeaders="ths"
        :tableData="leads"
        :defaultSortBy="'id'"
        :tablePageSize="10"
        :detailPageUrlName="'admin-leads-id'"
        class="mt-6" />
    </div>
</template>

<script>
    export default {
        layout: 'admin',

        data() {
            return {
                ths: [ 'ID', 'Customer', 'Country', 'Brand', 'Promoevent', 'Agency', 'Date', 'Status' ]
            }
        },

        async asyncData({ $axios }) {
            const getLeads = await $axios.get('/api/leads');
            let leads = getLeads.data;
            return { leads }
        },
    }
</script>

<style scoped>

</style>