<template>
  <nav class="relative flex bg-white">
    <div class="flex w-full flex-col">
        <div class="flex justify-between mx-2">
            <NuxtLink :to="{ name: 'admin-dashboard' }" class="text-md font-bold text-gray-800 p-2" href="#pablo">
                <logos-navbar />
            </NuxtLink>
            <button class="text-gray-600 cursor-pointer px-2 rounded bg-transparent block lg:hidden outline-none focus:outline-none" 
                type="button" @click="toggleNavbar()">
                <icons-menu />
            </button>
        </div>
        <div v-bind:class="{'hidden': !showMenu, 'flex': showMenu}" class="flex flex-col justify-between flex-grow lg:flex">
            <ul class="flex flex-col px-2 pt-2 w-full">
                <AdminNavLink :href="{ name: 'admin-dashboard' }" :active="$route.name == 'admin-dashboard'">
                    <icons-home />Dashboard
                </AdminNavLink>

                <AdminNavLinkDropdown :href="{ name: 'admin-leads' }" :active="$route.name == 'admin-leads'">
                  <icons-leads />Leads
                </AdminNavLinkDropdown>

                <AdminNavLink :href="{ name: 'admin-customers' }" :active="$route.name == 'admin-customers'">
                    <icons-customers />Customers
                </AdminNavLink>
                <AdminNavLink :href="{ name: 'admin-events' }" :active="$route.name == 'admin-events'">
                    <icons-events />Events
                </AdminNavLink>
                <AdminNavLink :href="{ name: 'admin-pages' }" :active="$route.name == 'admin-pages'">
                    <icons-pages />Pages
                </AdminNavLink>
            </ul>
            <div class="flex flex-col">
                <div class="pl-1">
                  <AdminNavLinkBottom :href="{ name: 'admin-options'}" :active="$route.name == 'admin-options'">
                    <icons-settings />Options
                  </AdminNavLinkBottom>
                </div>

                <div class="border-t shadow-inner">
                  <AdminNavLinkBottom :href="{ name: 'admin-profile' }" :active="$route.name == 'admin-profile'">
                    <AdminProfileTile />
                  </AdminNavLinkBottom>
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
      showMenu: false,
      showDropdown: false
    }
  },
  methods: {
    toggleNavbar: function(){
      this.showMenu = !this.showMenu;
    },
  }
}
</script>
<style>
/* get rid of the blue rectangle at tap on mobile devices  */
* { -webkit-tap-highlight-color: rgba(0,0,0,0); }
</style>