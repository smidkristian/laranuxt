<template>
    <div class="flex flex-col w-full">
        <PageTitle>Lead detail</PageTitle>
        <div class="flex">
             <div class="flex flex-col w-full max-w-6xl">
                <CardComponent>
                    <template #body>
                        <ListComponent :object="lead" :filter="keys" />
                    </template>
                </CardComponent>
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
                keys: ['promoevent']
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