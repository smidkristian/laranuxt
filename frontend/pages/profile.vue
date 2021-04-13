<template>
    <div class="flex justify-center mt-20">
        <form @submit.prevent="updateProfileInformation" class="flex flex-col bg-gray-200 rounded-md shadow-sm px-4 py-2">
            <h1 class="my-2 text-md text-gray-400">Update profile</h1>

            <input type="text" id="name" v-model="form.name" class="mb-2 rounded p-2" placeholder="name" />
            <div v-if="errors && errors.name" class="text-xs mb-2 text-red-600">
                <span>{{ errors.name[0] }}</span>
            </div>
            <input type="text" id="email" v-model="form.email" class="mb-2 rounded p-2" placeholder="email" />
            <div v-if="errors && errors.email" class="text-xs mb-2 text-red-600">
                <span>{{ errors.email[0] }}</span>
            </div>
            <button type=submit class="rounded py-1 px-4 my-1 text-xs bg-gray-400 text-white">Update</button>
            <Nuxt-Link :to="{ name: 'delete-profile' }" 
                class="flex justify-end text-xs text-gray-800 hover:text-gray-400 my-2">Delete account</Nuxt-Link>
            <Nuxt-Link :to="{ name: 'two-factor' }" 
                class="flex justify-end text-xs text-gray-800 hover:text-gray-400 my-2">Two factor authtentication</Nuxt-Link>
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
                },
                errors: null
            }
        },
        methods: {
            async updateProfileInformation() {
                try {
                    await this.$axios.get('sanctum/csrf-cookie')
                    await this.$axios.put('user/profile-information', this.form)

                    await this.$auth.fetchUser()
                } catch (error) {
                    // this.errors = error.response.data.errors;
                }
            },
        }
    }
</script>

<style scoped>

</style>