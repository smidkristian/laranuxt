<template>
    <div class="flex justify-center mt-20">
        <form @submit.prevent="updateProfileInformation" class="flex flex-col bg-gray-200 rounded-md shadow-sm px-4 py-2">
            <h1 class="my-2 text-md text-gray-400">Update profile</h1>

            <input type="text" id="name" v-model="form.name" class="mb-2 rounded p-2" placeholder="name" />
            <input type="text" id="email" v-model="form.email" class="mb-2 rounded p-2" placeholder="email" />
            <button type=submit class="rounded py-1 px-4 my-1 text-xs bg-gray-400 text-white">Update</button>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    name: this.$auth.user.name,
                    email: this.$auth.user.email,
                }
            }
        },
        methods: {
            async updateProfileInformation() {
                try {
                    await this.$axios.get('sanctum/csrf-cookie')
                    await this.$axios.put('user/profile-information', this.form)

                    await this.$auth.fetchUser()
                } catch (error) {
                    console.log(error);
                }
            },
        }
    }
</script>

<style scoped>

</style>