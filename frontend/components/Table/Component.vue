<template>
    <div class="w-full overflow-x-auto rounded shadow">
        <table class="table-auto w-full mx-auto text-sm">
            <TableHead :tableHeaders="tableHeaders" />
            <TableBody :tableData="tableData" :chunk="chunk" />
        </table>
        <TableFoot @next-chunk="nextChunk()" @previous-chunk="previousChunk()" />
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
