<template>
  <div class="ml-6 w-64 flex flex-col shadow p-4 bg-white rounded">
      <ListComponent :object="object" :filter="keys" />
  </div>
</template>
<script>
export default {
  props: [
    'object'
  ],
  data() {
    return {
      keys: [
        'brand', 'country', 'agency'
      ]
    }
  },
  mounted() {
    console.log(this.object)
  }
}
</script>
