<template>
    <NavLinkNB :href="{ name: 'admin-profile' }" :active="$route.name == 'admin-profile'">
        <div>
            <icons-profile></icons-profile>
        </div> 
        <div class="flex flex-col">
            <span class="font-bold">
                Eventuality
            </span>
            <span class="text-gray-400 text-xs">
                View profile
            </span>
        </div>
    </NavLinkNB>
</template>

<script>
    export default {
        
    }
</script>

<style scoped>

</style>