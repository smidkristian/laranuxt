<template>
  <nav class="flex lg:h-screen bg-white">
    <div class="flex flex-col flex-grow">
        <div class="flex justify-between">
            <NuxtLink :to="{ name: 'admin-dashboard' }" class="cursor-pointer">
                <img src="~/assets/logo/groupe_logo_sidepanel.png" alt="groupe_seb_logo.png">
            </NuxtLink>
            <button class="text-gray-600 cursor-pointer px-2 rounded bg-transparent block lg:hidden focus:outline-none" 
                type="button" @click="toggleNavbar()">
                <icon-menu />
            </button>
        </div>
        <div :class="{ 'hidden': !showMenu }" class="flex flex-col justify-between flex-grow lg:flex">
            <ul class="flex flex-col px-2 pt-2">
                <NavLink :href="{ name: 'admin-dashboard' }" :active="$route.name == 'admin-dashboard'">
                    <IconHome />Dashboard
                </NavLink>

                <NavLinkDropdown :href="{ name: 'admin-leads' }" :sublinks="leadsSublinks" :active="$route.name == 'admin-leads'">
                  <IconLeads />Leads
                </NavLinkDropdown>

                <NavLink :href="{ name: 'admin-customers' }" :active="$route.name == 'admin-customers'">
                    <IconCustomers />Customers
                </NavLink>
                <NavLink :href="{ name: 'admin-events' }" :active="$route.name == 'admin-events'">
                    <IconEvents />Events
                </NavLink>
                <NavLink :href="{ name: 'admin-pages' }" :active="$route.name == 'admin-pages'">
                    <IconPages />Pages
                </NavLink>
            </ul>
            <div class="flex flex-col">
                <div class="pl-1">
                  <NavLinkBottom :href="{ name: 'admin-options'}" :active="$route.name == 'admin-options'">
                    <IconSettings />Options
                  </NavLinkBottom>
                </div>

                <div class="border-t shadow-inner">
                  <NavLinkBottom :href="{ name: 'admin-profile' }" :active="$route.name == 'admin-profile'">
                    <NavProfileTile />
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
      showMenu: false,
      showDropdown: false,

      leadsSublinks: [
                    {
                        title: 'All leads',
                        link: 'admin-leads-all'
                    },
                    {
                        title: 'Add New Lead',
                        link: 'admin-leads-add'
                    },
                    {
                        title: 'Export',
                        link: 'admin-leads-export'
                    }
                ]
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