<template>
    <div class="w-full bg-gray-50 overflow-x-auto rounded shadow">
        <table class="table-auto w-full mx-auto">
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
            <tbody>
                <tr :key="index" v-for="(object, index) in tableData">
                    <td>
                        <input type="checkbox" class="opacity-50" />
                    </td>
                    <td :key="index" v-for="(keyName, index) in objectKeys" class="text-left py-4 px-2">
                        {{ object[keyName] }}
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="flex justify-between">
            <div class="p-4">
                Showing 5 of 10
            </div>
            <div class="p-4">
                <button>
                    Previous
                </button>
                <button class="ml-4">
                    Next
                </button>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        props: [
            'tableData',
            'tableHeaders'
        ],
        data() {
            return {
                objectKeys: []
            }
        },
        fetch() {
            this.getKeyNames();
        },
        methods: {
            getKeyNames() {
                Object.keys(this.tableData[0]).forEach( keyName => {
                    this.objectKeys.push(keyName);
                });
            }
        }

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
        max-width: 5vw !important;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>