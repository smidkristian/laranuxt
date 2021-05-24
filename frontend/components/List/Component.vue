<template>
    <div>
        <dl :key="index" v-for="(object, index) in filtered" class="flex justify-between">
            <dt class="text-gray-500">{{ object.upperkey }}:</dt>
            <dl class="ml-4">{{ object.value }}</dl>
        </dl>
    </div>
</template>

<script>
    export default {
        props: [
            'object',
            'filter'
        ],
        data() {
            return {
                filtered: [],
            }
        },
        fetch() {
            this.select();
        },
        methods: {
            select() {
                Object.entries(this.object).forEach( ([key, value]) => {
                    if(this.filter.includes(key)) {
                        const upperkey = this.capitalize(key);
                        console.log(upperkey)
                        this.filtered.push({upperkey, value});
                    }
                });
            },
            capitalize(str) {
                if(typeof str === 'string') {
                    return str.replace(/^\w/, char => char.toUpperCase());
                } else {
                    return 'Not a string';
                }
            }
        }
    }
</script>

<style scoped>

</style>