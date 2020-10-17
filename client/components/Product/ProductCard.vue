<template>
  <div class="card">
    <div class="card-image">
      <NuxtLink :to="link">
        <figure class="image is-4by3">
          <img
            src="https://bulma.io/images/placeholders/1280x960.png"
            alt="Placeholder image"
          />
        </figure>
      </NuxtLink>
    </div>

    <div class="card-content">
      <div class="content">
        <NuxtLink :to="link">{{ product.title }}</NuxtLink>
        <div class="mt-2 flex justify-between">
          <b-tag rounded>{{ product.price }}</b-tag>
          <b-tooltip label="Add to cart" position="is-top">
            <b-icon icon="cart-plus" size="is-small" />
          </b-tooltip>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['product'],
  computed: {
    link() {
      return { name: 'products-slug', params: { slug: this.product.slug } }
    },
  },
}
</script>
