export default $axios => resource => ({
    index() {
      return $axios.$get(`/${resource}`)
    },
  
    create(payload) {
      return $axios.$post(`/${resource}`, payload)
    },
  
    show(id) {
      return $axios.$get(`/${resource}/${id}`)
    },
  
  
    update(payload, id) {
      return $axios.$put(`/${resource}/${id}`, payload)
    },
  
    delete(id) {
      return $axios.$delete(`/${resource}/${id}`)
    }
  
  });