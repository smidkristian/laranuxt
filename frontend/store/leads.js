export const state = () => ({
    //
  })
  
  export const getters = {
    getAllLeads() {
        const leads = this.$axios('/api/leads');
        return leads.data;
    }
  }