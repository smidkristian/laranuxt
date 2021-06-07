<template>
    <div class="flex flex-col w-full">
        <div class="flex items-center">
            <PageTitle>Lead detail</PageTitle>
            <p class="pl-6 text-2xl text-gray-600">#16458234</p>
        </div>
        <div class="flex">
             <div class="flex flex-col w-full max-w-6xl">
                <CardComponent>
                    <template #body>
                        <ListComponent :object="lead" :filter="listKeys" />
                    </template>
                </CardComponent>

                <ActionTableComponent
                :tableHeaders="ths"
                :tableData="products"
                :defaultSortBy="'country'"
                :tablePageSize="4"
                class="mt-6" />
            </div>
            <div>
                <AsideCard :object="lead"/>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        layout: 'admin',
        data(){
            return {
                listKeys: ['promoevent'],
                ths: [ // two values, the first for header, the second - object property - for sorting
                    ['Place', 'country'], ['Vendor', 'brand'], ['Product Name', 'promoevent'], 
                    ['Part Number', 'date'], ['Receipt', 'receipt'], ['Action', 'action']
                    ]
            }
        },
        async asyncData({ params, $axios }) {
            const getLead = await $axios.get(`/api/leads/${params.id}`);
            let lead = getLead.data;
            const getProducts = await $axios.get('/api/leads-products');
            let products = getProducts.data;
            return { lead, products}
        },
    }
</script>

<style scoped>

</style>