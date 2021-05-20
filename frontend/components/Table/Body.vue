<template>
    <tbody>
        <tr :key="index" v-for="(object, index) in tableData[chunk]">
            <td class="px-2"><input type="checkbox" class="border opacity-50 cursor-pointer"></td>
            <td :key="index" v-for="(keyName, index) in objectKeys"  @click="rowDetail(object.id)"
                class="text-left py-3 pl-3" :class="{ 'dots' : keyName == 'promoevent'}">
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
                detailPageUrlName: 'admin-leads-id'
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
            rowDetail(id) {
                this.$router.push({ name: this.detailPageUrlName, params: { id: id } });
            }
        }
    }
</script>

<style scoped>

    tr {
        border-bottom: solid 0.5px rgb(209, 209, 209);
        background-color: rgb(255, 255, 255);
    }
    tr:hover {
        background-color: rgb(243, 244, 246);
        cursor: pointer;
    }

    /* zkrácení bunky tabulky */
    .dots {
        max-width: 18vw !important;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

</style>
