<template>
  <div class="flex flex-col items-center mt-20">
    <input type="text" @keyup.enter="addTodo" placeholder="What needs to be done?">
    <ul>
      <li v-for="todo in todos" :key="todo.id">
        <input :checked="todo.done" @change="toggle(todo)" type="checkbox" :id="todo.id">
        <label :class="{ done: todo.done }" :for="todo.id">{{ todo.text }}</label>
        <ButtonBasic :type="'button'" @click.native="removeTodo(todo)">remove</ButtonBasic>
      </li>
    </ul>
        <ButtonBasic :type="'button'" @click.native="leads()">leads</ButtonBasic>
  </div>
</template>

<script>
import { mapMutations } from 'vuex'

export default {
  computed: {
    todos () {
      return this.$store.state.todos.list
    }
  },
  methods: {
    addTodo (event) {
      this.$store.commit('todos/add', event.target.value)
      event.target.value = ''
    },
    ...mapMutations({
      toggle: 'todos/toggle',
    }),
    removeTodo (todo){
      this.$store.commit('todos/remove', todo)
    },
    leads (){
      this.$store.commit('todos/leads')
    }
  }
}
</script>

<style scoped>

</style>