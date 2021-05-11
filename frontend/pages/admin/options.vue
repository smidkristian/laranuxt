<template>
    <div class="bg-gray-100">
        <div class="flex justify-center m-8">
            Options
        </div>
        <div class="flex justify-center mt-20">
        <form @submit.prevent="create" class="flex flex-col bg-gray-200 rounded-md shadow-sm px-4 py-2">
            <h1 class="my-2 text-md text-gray-400">Create Permission</h1>
            <input type="text" id="name" v-model="form.name" class="my-2 rounded p-2" placeholder="name" />
            <div v-if="errors && errors.name" class="text-xs mb-2 text-red-600">
                <span>{{ errors.name[0] }}</span>
            </div>
            <button type=submit class="rounded py-1 px-4 my-2 text-xs bg-gray-400 text-white">Confirm</button>
        </form>
    </div>
    </div>
</template>

<script>
    export default {
        layout: 'admin',
        data() {
            return {
                form: {
                    name: '',
                },
                errors: null
            }
        },
        methods: {
            async create() {
                try {
                    await this.$axios.post('api/create-permission', this.form);
                    
                } catch (error) {
                    this.errors = error.response.data.errors;
                }
            },
        }
    }
</script>

<style scoped>

</style>