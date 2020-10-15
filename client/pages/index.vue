<template>
  <div class="section">
    <div class="container">
      <div class="columns is-multiline">
        <div class="column is-3" v-for="product in products" :key="product.id">
          <ProductCard :product="product" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'
export default {
  computed: mapState(['products']),
}
</script>
