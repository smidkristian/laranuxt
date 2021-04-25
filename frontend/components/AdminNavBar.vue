<template>
  <nav class="relative flex bg-white">
    <div class="flex w-full flex-col">
        <div class="flex justify-between mx-2">
            <NuxtLink :to="{ name: 'admin-dashboard' }" class="text-md font-bold text-gray-800 p-2" href="#pablo">
                <logos-navbar></logos-navbar>
            </NuxtLink>
            <button class="text-gray-600 cursor-pointer px-2 rounded bg-transparent block lg:hidden outline-none focus:outline-none" 
                type="button" @click="toggleNavbar()">
                <icons-menu></icons-menu>
            </button>
        </div>
        <div v-bind:class="{'hidden': !showMenu, 'flex': showMenu}" class="flex flex-col justify-between flex-grow lg:flex">
            <ul class="flex flex-col px-2 pt-2 w-full">
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
            <div class="flex flex-col">
                <div class="pl-1">
                  <NavLinkBottom :href="{ name: 'admin-options'}" :active="$route.name == 'admin-options'">
                    <icons-settings></icons-settings>Options
                  </NavLinkBottom>
                </div>

                <div class="border-t shadow-inner">
                  <NavLinkBottom :href="{ name: 'admin-profile' }" :active="$route.name == 'admin-profile'">
                    <ProfileTile></ProfileTile>
                  </NavLinkBottom>
                </div>
            </div>
        </div>
    </div>
  </nav>
</template>

<script>
export default {
  data() {
    return {
      showMenu: false
    }
  },
  methods: {
    toggleNavbar: function(){
      this.showMenu = !this.showMenu;
    }
  }
}
</script>
<style>
/* get rid of the blue rectangle at tap on mobile devices  */
* { -webkit-tap-highlight-color: rgba(0,0,0,0); }
</style>