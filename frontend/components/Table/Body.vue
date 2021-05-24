<template>
    <tbody>
        <tr :key="index" v-for="(object, index) in tableData">
            <td class="pl-3"><InputCheckbox /></td>
            <td :key="index" v-for="(keyName, index) in objectKeys"  @click="$emit('row-detail', object.id)"
                class="text-left py-3 pl-2" 
                :class="{   
                            'min-w-long' : keyName == 'customer',
                            'max-w-short' : keyName == 'country',
                            'max-w-long' : keyName == 'promoevent', 
                        }">
                {{ object[keyName] }}
            </td>
        </tr>
    </tbody>
</template>

<script>
    export default {
        props: [
            'tableData',
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
                Object.keys(this.tableData[0]).forEach( keyName => {
                    this.objectKeys.push(keyName);
                });
            },
        }
    }
</script>

<style scoped>

    tr {
        border-bottom: solid 0.5px rgb(243, 244, 246);
        background-color: rgb(255, 255, 255);
    }
    tr:hover {
        background-color: rgb(243, 244, 246);
        cursor: pointer;
    }

    /* table columns width customatization */
    .max-w-long {
        max-width: 18vw !important;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .max-w-short {
        max-width: 6vw !important;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .min-w-long {
        min-width: 8vw !important;
    }
    .min-w-short {
        min-width: 2vw !important;
    }

</style>
