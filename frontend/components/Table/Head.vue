<template>
    <thead class="bg-gray-100 shadow-sm uppercase text-gray-400">
        <tr>
            <th class="pl-3"><InputCheckbox /></th>
            <th v-for="(header, index) in tableHeaders" :key="index" @click="$emit('sort-by', header); sortBy = header"
                class="text-left text-sm pl-2 py-3 rounded cursor-pointer hover:bg-gray-50 hover:shadow">
                <div class="flex">{{ header }}<IconDropdownSmall :class="{ 'invisible': sortBy != header}" /></div>
            </th>
            
        </tr>
    </thead>
</template>

<script>
    export default {
        props: [
            'tableHeaders'
        ],
        data() {
            return {
                sortBy: this.tableHeaders[0]
            }
        }

    }
</script>

<style scoped>

    tr {
        border-bottom: solid 0.5px rgb(209, 209, 209);
    }

</style>
