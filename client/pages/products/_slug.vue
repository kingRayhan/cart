<template>
  <div class="section">
    <div class="container">
      <div class="columns">
        <div class="column is-half">
          <img src="https://via.placeholder.com/620/620" alt="product image" />
        </div>

        <div class="column is-half">
          <div class="section">
            <h1 class="title is-4">{{ product.title }}</h1>
            <h2 class="text-2xl mt-2">${{ product.price }}</h2>

            {{ product.body }}

            <hr />
            <NuxtLink
              v-for="category in product.categories"
              :key="category.id"
              class="tag is-rounded is-medium mr-2"
              :to="{ name: 'categories-slug', params: { slug: category.slug } }"
            >
              {{ category.name }}
            </NuxtLink>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return { product: null }
  },
  async asyncData({ params, $axios, error }) {
    try {
      const { data } = await $axios.$get(`products/${params.slug}`)
      return { product: data }
    } catch (e) {
      error({ statusCode: 404, message: 'Product not found' })
    }
  },
}
</script>
