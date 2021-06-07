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
        <div class="max-w-xs m-2">
            <InputSearch :type="'text'" v-model="searchQuery" :placeholder="'Search'" />
        </div>
        <table class="table-auto w-full mx-auto text-sm">
            <ActionTableHead :tableHeaders="tableHeaders" @sort-by="sortBy($event)" />
            <ActionTableBody :tableData="searchedTableData" />
        </table>
        <ActionTableNavigation :currentTablePage="currentTablePage" :tablePageTotal="tablePageTotal"
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
        ],
        data() {
            return {
                currentSortBy: this.defaultSortBy,
                currentSortDir: 'asc',
                currentTablePage: 1,
                // currentTablePageTotal: null,
                searchQuery: null
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
            nextPage() {
                if(this.currentTablePage < this.tablePageTotal) this.currentTablePage++;
            },
            prevPage() {
                if(this.currentTablePage > 1) this.currentTablePage--;
            },

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
                // still not sure about this math
                let start = (this.currentTablePage - 1) * this.tablePageSize;
                let end = this.currentTablePage * this.tablePageSize;
                if(index >= start && index < end) return true;
            });
            },
            tablePageTotal() {
                return Math.round(this.tableData.length / this.tablePageSize)
            },
            searchedTableData() {
                if (this.searchQuery) {
                    let searchResult = [];
                    this.sortedTableData.map( (item) => {
                        Object.values(item).forEach( (value) => {
                            if (value.toString().toLowerCase().includes(this.searchQuery.toLowerCase())) {
                                searchResult.push(item);
                            }
                        })
                    })
                    // this.currentTablePageTotal = searchResult.length;
                    return searchResult;
                } else {
                    return this.sortedTableData;
                }
            }
        }
    }
</script>

<style scoped>

</style>
