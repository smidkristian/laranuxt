<template>
    <ul class="flex justify-between bg-gray-200 text-xs text-gray-800 shadow-inner p-4">

        <div>
            <Nuxt-Link :to="{ name: 'index' }" class="px-2">Home</Nuxt-Link>

            <Nuxt-Link v-if="$auth.loggedIn" :to="{ name: 'website-dashboard' }" class="px-2">Dashboard</Nuxt-Link>

            <Nuxt-Link :to="{ name: 'admin-dashboard'}" class="px-2">Admin</Nuxt-Link>
        </div>

        <div class="flex">
            <template v-if="$auth.loggedIn">
                <a href="" class="px-2" @click.prevent="logout">Logout</a>
                <Nuxt-Link :to="{ name: 'website-profile' }" class="px-4 text-gray-400">{{ $auth.user.name }}</Nuxt-Link>
            </template>

            <template v-if="!$auth.loggedIn">
                <Nuxt-Link :to="{ name: 'website-login' }" class="px-2">Login</Nuxt-Link>
                <Nuxt-Link :to="{ name: 'website-register' }" class="px-2">Register</Nuxt-Link>
            </template>
        </div>
    </ul>
</template>

<script>
    export default {
        methods: {
            async logout () {
                await this.$auth.logout()
                this.$router.replace({ name: 'website-login' })
            }
        }
    }
</script>

<style scoped>

</style>