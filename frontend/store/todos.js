export const state = () => ({
    list: {}
  })
  
  export const mutations = {
    add (state, text) {
      state.list.push({
        text,
        done: false,
        id: Date.now()
      })
    },
    remove (state, todo) {
      state.list = state.list.filter(item => item.id !== todo.id)
    },
    toggle (state, todo) {
      todo.done = !todo.done
    },
    leads (state) {
        const getLeads = this.$axios.get('api/leads');
        let leads = getLeads.data;
        console.log(leads);
    }
  }