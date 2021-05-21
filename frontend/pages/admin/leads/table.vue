<template>
    <div class="flex flex-col justify-center items-center h-screen">
        <table class="m-6">
            <thead>
            <tr>
                <th @click="sort('name')">Name</th>
                <th @click="sort('age')">Age</th>
                <th @click="sort('breed')">Breed</th>
                <th @click="sort('gender')">Gender</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(cat, index) in sortedCats" :key="index">
                <td>{{cat.name}}</td>
                <td>{{cat.age}}</td>
                <td>{{cat.breed}}</td>
                <td>{{cat.gender}}</td>
            </tr>
            </tbody>
        </table>
        <p>
        <button @click="prevPage">Previous</button> 
        <button @click="nextPage">Next</button>
        </p>
        
        debug: sort={{currentSort}}, dir={{currentSortDir}}, page={{currentPage}}
    </div>
</template>

<script>
    export default {
        layout: 'admin',

        data() {
            return {
                cats:[],
                currentSort: 'name',
                currentSortDir: 'asc',
                pageSize: 3,
                currentPage: 1
            }
        },
        created() {
            fetch('https://www.raymondcamden.com/.netlify/functions/get-cats')
                .then(res => res.json())
                .then(res => {
                    this.cats = res;
                })
        },
        methods:{
            sort:function(s) {
            //if s == current sort, reverse
            if(s === this.currentSort) {
                this.currentSortDir = this.currentSortDir==='asc'?'desc':'asc';
            }
            this.currentSort = s;
            },
            nextPage:function() {
                if((this.currentPage*this.pageSize) < this.cats.length) this.currentPage++;
            },
            prevPage:function() {
                if(this.currentPage > 1) this.currentPage--;
            }

        },
        computed:{
            sortedCats:function() {
            return this.cats.sort((a,b) => {
                let modifier = 1;
                if(this.currentSortDir === 'desc') modifier = -1;
                if(a[this.currentSort] < b[this.currentSort]) return -1 * modifier;
                if(a[this.currentSort] > b[this.currentSort]) return 1 * modifier;
                return 0;
            }).filter((row, index) => {
                let start = (this.currentPage - 1) * this.pageSize;
                let end = this.currentPage * this.pageSize;
                if(index >= start && index < end) return true;
            });
            }
        }
    }
</script>

<style scoped>

</style>