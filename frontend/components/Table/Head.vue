<template>
    <thead class="bg-gray-100 shadow-sm uppercase text-gray-400">
        <tr>
            <th class="pl-2"><input type="checkbox" class="border"></th>
            <th v-for="(header, index) in tableHeaders" :key="index" class="text-left text-sm pl-3 py-3">
                {{ header }}
            </th>
        </tr>
    </thead>
</template>

<script>
    export default {
        props: [
            'tableHeaders'
        ]

    }
</script>

<style scoped>

    tr {
        border-bottom: solid 0.5px rgb(209, 209, 209);
    }

</style>
