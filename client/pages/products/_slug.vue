<template>
  <div class="section">
    <div class="container">
      <div class="columns">
        <div class="column is-half">
          <img
            src="https://bulma.io/images/placeholders/1280x960.png"
            alt="product image"
          />
        </div>

        <div class="column is-half">
          <div class="section">
            <h1 class="title is-4">{{ product.title }}</h1>
            <h2 class="text-2xl my-2">{{ product.price }}</h2>

            <div v-if="product.body">
              {{ product.body }}
            </div>

            <div class="my-4">
              <ProductVariation
                v-for="(variations, type) in product.variations"
                :variations="variations"
                :type="type"
                :key="type"
                v-model="form.variation"
              />
            </div>

            <div class="mb-4" v-if="form.variation">
              <b-field>
                <b-select placeholder="Quantity">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                </b-select>
                <p class="control">
                  <button class="button is-success">
                    <b-icon icon="cart-plus" size="is-small"> </b-icon>
                    <span class="ml-1">Add To Cart</span>
                  </button>
                </p>
              </b-field>
            </div>

            <hr class="border border-red-500" />

            <div class="mt-2">
              <NuxtLink
                v-for="category in product.categories"
                :key="category.id"
                class="tag is-rounded is-medium mr-2"
                :to="{
                  name: 'categories-slug',
                  params: { slug: category.slug },
                }"
              >
                {{ category.name }}
              </NuxtLink>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      product: null,
      form: {
        variation: '',
      },
    }
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
