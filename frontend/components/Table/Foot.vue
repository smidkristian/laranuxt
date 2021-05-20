<template>
  <div class="flex justify-between">
      <div class="p-3">
          Showing {{ chunkLength }} of {{ dataLength }}
      </div>
      <div class="p-2">
          <ButtonBorder :type="'button'" @click.native="previousChunk()">
              <IconLeft />
          </ButtonBorder>
          <ButtonBorder :type="'button'" class="ml-2" @click.native="nextChunk()">
              <IconRight />
          </ButtonBorder>
      </div>
  </div>
</template>

<script>
    export default {
        data() {
          return {
            chunkLength: 0,
            dataLength: 0,
          }
        },
        methods: {
            previousChunk() {
              this.$emit('previous-chunk')
            },
            nextChunk() {
              this.$emit('next-chunk')
            }
        }
    }
</script>

<style scoped>

</style>
