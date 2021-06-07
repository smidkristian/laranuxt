<template>
  <div class="w-72 ml-6 bg-white shadow rounded">
    <div class="flex flex-col p-4">
      <ListComponent :object="object" :filter="listKeysOne" />
      <hr class="my-4">
      <ListComponent :object="object" :filter="listKeysTwo" />
    </div>
    <div class="bg-gray-100 px-4 py-3 flex justify-between">
      <ButtonTransparent>Delete</ButtonTransparent>
      <ButtonBasic>Update</ButtonBasic>
    </div>
  </div>
</template>
<script>
export default {
  props: [
    'object'
  ],
  data() {
    return {
      listKeysOne: [
        'brand', 'country', 'agency'
      ],
      listKeysTwo: [
        'country', 'agency'
      ]
    }
  },
}
</script>
