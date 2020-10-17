<template>
  <b-sidebar
    :open="open"
    :can-cancel="false"
    :fullheight="true"
    :right="true"
    type="is-white"
  >
    <div class="bg-gray-200 py-1 px-2 flex justify-between items-center">
      <h3 class="uppercase font-bold text-sm">Cart (145)</h3>
      <button class="focus:outline-none text-xl text-red-500" @click="close">
        &times;
      </button>
    </div>
    <div class="flex flex-col justify-between h-screen p-2">
      <section>
        <div class="flex mb-2">
          <img src="http://via.placeholder.com/65" alt="cart-image" />
          <div class="ml-2 flex flex-col justify-center">
            <h2 class="text-gray-700">Lorem ipsum dolor sit.</h2>
            <p>$14</p>
          </div>
        </div>
        <!--  -->
        <div class="flex mb-2">
          <img src="http://via.placeholder.com/65" alt="cart-image" />
          <div class="ml-2 flex flex-col justify-center">
            <h2 class="text-gray-700">Lorem ipsum dolor sit.</h2>
            <p>$14</p>
          </div>
        </div>
        <!--  -->
        <div class="flex mb-2">
          <img src="http://via.placeholder.com/65" alt="cart-image" />
          <div class="ml-2 flex flex-col justify-center">
            <h2 class="text-gray-700">Lorem ipsum dolor sit.</h2>
            <p>$14</p>
          </div>
        </div>
        <!--  -->
      </section>

      <a class="button is-primary" href="#">Place Order</a>
    </div>
  </b-sidebar>
</template>

<script>
export default {
  props: {
    open: {
      type: Boolean,
      default: false,
    },
  },
  methods: {
    close() {
      this.$emit('closeCart')
    },
  },
}
</script>
