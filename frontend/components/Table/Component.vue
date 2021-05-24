<template>
  <!-- 
      USAGE:
        <TableComponent
            :tableHeaders="ths"
            :tableData="leads"
            :defaultSortBy="'id'" -> lowercase of the name of the header
                you want to sort the table by
            :tablePageSize="7"
            :detailPageUrlName="'admin-lead-id'" -> parameter by which
                the url is specified is set in Table/Head.vue component 
        /> 
      
      DEPENDENCIES: 
      InputCheckbox, IconDropdownSmall, ButtonBorder, IconLeft/Right
    -->

    <div class="w-full overflow-x-auto rounded shadow">
        <table class="table-auto w-full mx-auto text-sm">
            <TableHead :tableHeaders="tableHeaders" @sort-by="sortBy($event)" />
            <TableBody :tableData="sortedTableData" @row-detail="rowDetail($event)" />
        </table>
        <TableNavigation :currentTablePage="currentTablePage" :tablePageTotal="tablePageTotal"
            @next-page="nextPage()" @prev-page="prevPage()"/>
    </div>
</template>

<script>

    export default {
        props: [
            'tableHeaders',
            'tableData',
            'defaultSortBy',
            'tablePageSize',
            'detailPageUrlName'
        ],
        data() {
            return {
                currentSortBy: this.defaultSortBy,
                currentSortDir: 'asc',
                currentTablePage: 1,
            }
        },
        methods: {
            sortBy(header) {
                // reversing order when clicking the same header twice
                if(header.toLowerCase() === this.currentSortBy) {
                    this.currentSortDir = this.currentSortDir === 'asc'
                        ? 'desc'
                        : 'asc';
                }
                this.currentSortBy = header.toLowerCase();
            },
            rowDetail(id) {
                this.$router.push({ name: this.detailPageUrlName, params: { id: id } });
            },
            nextPage() {
                if(this.currentTablePage < this.tablePageTotal) this.currentTablePage++;
            },
            prevPage() {
                if(this.currentTablePage > 1) this.currentTablePage--;
            }

        },
        computed: {
            sortedTableData() {
            return this.tableData.sort((a,b) => {
                let modifier = 1;
                if(this.currentSortDir === 'desc') modifier = -1;
                if(a[this.currentSortBy] < b[this.currentSortBy]) return -1 * modifier;
                if(a[this.currentSortBy] > b[this.currentSortBy]) return 1 * modifier;
                return 0;
            }).filter((element, index) => {
                let start = (this.currentTablePage - 1) * this.tablePageSize;
                let end = this.currentTablePage * this.tablePageSize;
                if(index >= start && index < end) return true;
            });
            },
            tablePageTotal() {
                return Math.round(this.tableData.length / this.tablePageSize)
            }
        }
    }
</script>

<style scoped>

</style>
