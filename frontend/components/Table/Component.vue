<template>
    <div class="w-full bg-gray-50 overflow-x-auto rounded shadow">
        <table class="table-auto w-full mx-auto text-sm">
            <TableHead :tableHeaders="tableHeaders" />
            <TableBody :tableData="tableData" :chunk="chunk" />
        </table>
        <div class="flex justify-between">
            <div class="p-4">
                Showing 5 of 10
            </div>
            <div class="p-4">
                <button @click="previousChunk()">
                    Previous
                </button>
                <button class="ml-4" @click="nextChunk()">
                    Next
                </button>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        props: [
            'tableHeaders',
            'tableData'
        ],
        data() {
            return {
                chunk: 0
            }
        },
        methods: {
            nextChunk() {
                this.chunk =  ( this.chunk + 1 ) % this.tableData.length;
            },
            previousChunk() {
                if(this.chunk > 0) {
                    this.chunk =  ( this.chunk - 1 ) % this.tableData.length;
                }
            }
        }
    }
</script>

<style scoped>

</style>