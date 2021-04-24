<template>
    <div class="flex flex-col justify-between">
        <div>
            <h1 class="p-4 mb-4">
                GroupeSEB
            </h1>
            <ul class="flex flex-col pl-2 pt-4">
                <NavLink :href="{ name: 'admin-dashboard' }" :active="$route.name == 'admin-dashboard'">
                    <icons-home></icons-home>Dashboard
                </NavLink>
                <NavLink :href="{ name: 'admin-leads' }" :active="$route.name == 'admin-leads'">    
                    <icons-leads></icons-leads>Leads
                </NavLink>
                <NavLink :href="{ name: 'admin-customers' }" :active="$route.name == 'admin-customers'">
                    <icons-customers></icons-customers>Customers
                </NavLink>
                <NavLink :href="{ name: 'admin-events' }" :active="$route.name == 'admin-events'">
                    <icons-events></icons-events>Events
                </NavLink>
                <NavLink :href="{ name: 'admin-pages' }" :active="$route.name == 'admin-pages'">
                    <icons-pages></icons-pages>Pages
                </NavLink>
            </ul>
        </div>
        <div class="flex flex-col">
            <NavLinkNB :href="{ name: 'admin-options'}" :active="$route.name == 'admin-options'">
                <icons-settings></icons-settings>Options
            </NavLinkNB>

            <div class="border-t shadow-inner">
                <ProfileTile></ProfileTile>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        
    }
</script>

<style scoped>

</style>