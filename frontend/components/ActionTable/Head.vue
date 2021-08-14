<template>
    <thead class="bg-gray-100 shadow-sm uppercase text-gray-400">
        <tr>
            <th v-for="(header, index) in tableHeaders" :key="index" @click="$emit('sort-by', header[1]); sortBy = header[1]"
                class="text-left text-sm pl-2 py-3 rounded cursor-pointer hover:bg-gray-50 hover:shadow"
                :class="{ 'pl-6' : index == 0 }">
                <div class="flex">{{ header[0] }}<IconDropdownSmall :class="{ 'invisible': sortBy != header}" /></div>
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
                sortBy: this.tableHeaders[0][1]
            }
        }

    }
</script>

<style scoped>

    tr {
        border-bottom: solid 0.5px rgb(227, 228, 230);
    }

</style>
