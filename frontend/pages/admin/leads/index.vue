<template>
    <div class="m-10">
        <div class="mt-20 ml-10 max-w-7xl">
            <div class="flex text-left text-4xl font-bold border-b">
                <h1 class="pb-6">Leads</h1>
            </div>
            <AdminTable :tableData="leads" :tableHeaders="ths" class="mt-6" />
        </div>
    </div>
</template>

<script>
    export default {
        layout: 'admin',

        data() {
            return {
                leads: [
                    {
                        id: 2001,
                        customer: 'Joseph Noviack',
                        country: 'Tefal',
                        brand: 183,
                        promoevent: '60 dní záruka vrácení peněz na multifunkční hrnce Tefal',
                        agency: 'Eventuality',
                        date: '1.3.2021',
                        status: 'Processing'
                    },
                    {
                        id: 8004,
                        customer: 'Joseph Noviack',
                        country: 'Tefal',
                        brand: 183,
                        promoevent: '50 dní záruka vrácení peněz na multifunkční hrnce Tefal',
                        agency: 'Eventuality',
                        date: '1.3.2021',
                        status: 'Processing'
                    },
                    {
                        id: 6045,
                        customer: 'Cool Person',
                        country: 'Tefal',
                        brand: 183,
                        promoevent: '60 dní záruka vrácení peněz na multifunkční hrnce Tefal',
                        agency: 'Eventuality',
                        date: '2.3.2021',
                        status: 'Done'
                    }
                ],
                ths: [ 'Lead Num.', 'Customer', 'Country', 'Brand', 'Promoevent', 'Agency', 'Date', 'Status' ]
            }
        }
    }
</script>

<style scoped>

</style>