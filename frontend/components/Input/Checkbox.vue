<template>
    <div class="flex w-full">
        <label class="checkbox flex"><input type="checkbox" /></label>
        <label class="text-xs text-gray-400">
            {{ label }}
        </label>
    </div>
</template>

<script>
    export default {
        props: {
            label: String
        }
    }
</script>

<style scoped>

    .checkbox > input {
      height: 15px;
      width: 15px;
      appearance: none;
      border: 1px solid rgb(209, 213, 219);
      border-radius: 4px;
      cursor: pointer;
    }
    .checkbox > input:checked {
      background-color: rgb(229, 231, 235);
      border: 1px solid rgb(229, 231, 235);
      content: url('~assets/checkmark.svg');
    }

</style>
