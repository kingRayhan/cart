<template>
  <div>
    <Hero
      :title="category.name"
      :subTitle="category.description"
      :subCategories="category.children"
    />

    <div class="section">
      <div class="container">
        <div class="columns is-multiline">
          <div
            class="column is-3"
            v-for="product in products"
            :key="product.id"
          >
            <ProductCard :product="product" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  async asyncData({ params, $axios, error }) {
    const { data: products } = await $axios.$get(
      `products?category=${params.slug}`
    )
    const { data: category } = await $axios.$get(`categories/${params.slug}`)

    return { products, category }
  },
}
</script>
