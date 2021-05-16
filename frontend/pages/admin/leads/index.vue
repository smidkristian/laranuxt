<template>
    <div class="m-10">
        <div class="mt-20 ml-10 w-full max-w-7xl">
            <div class="flex text-left text-4xl font-bold border-b">
                <h1 class="pb-6">Leads</h1>
            </div>
            <!-- <AdminTable :tableData="leads" :tableHeaders="ths" class="mt-6" /> -->
        </div>
    </div>
</template>

<script>
    export default {
        layout: 'admin',

        data() {
            return {
                leads: [],
                ths: [ 'Lead Num.', 'Customer', 'Country', 'Brand', 'Promoevent', 'Agency', 'Date', 'Status' ]
            }
        },

        
    }
</script>

<style scoped>

</style>