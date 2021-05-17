<template>
    <tbody>
        <tr :key="index" v-for="(object, index) in tableData[chunk]">
            <td>
                <input type="checkbox" class="opacity-50" />
            </td>
            <td :key="index" v-for="(keyName, index) in objectKeys" class="text-left py-4 px-2" :class="{ 'dots' : keyName == 'promoevent'}">
                {{ object[keyName] }}
            </td>
        </tr>
    </tbody>
</template>

<script>
    export default {
        props: [
            'tableData',
            'chunk'
        ],
        data() {
            return {
                objectKeys: [],
            }
        },
        fetch() {
            this.getKeyNames();
        },
        methods: {
            getKeyNames() {
                Object.keys(this.tableData[0][0]).forEach( keyName => {
                    this.objectKeys.push(keyName);
                });
            },
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
        max-width: 18vw !important;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

</style>