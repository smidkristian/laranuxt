<template>
    <thead class="bg-gray-100 shadow-sm uppercase text-gray-400">
        <tr>
            <th>
                <input type="checkbox" />
            </th>
            <th v-for="(header, index) in tableHeaders" :key="index" class="text-left text-sm py-4 px-2">
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
    th {
        padding-left: 1rem;
    }
    td {
        padding-left: 1rem;
    }
    td:hover {
        background-color: rgb(235, 235, 235);
    }

    /* zkrácení bunky tabulky */
    .dots {
        max-width: 18vw !important;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

</style>