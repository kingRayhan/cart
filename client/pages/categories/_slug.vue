<template>
  <div>
    <h1>Heyyy</h1>
    <pre>
        {{ category }}
    </pre>
  </div>
</template>

<script>
export default {
  async asyncData({ params, $axios, error }) {
    try {
      const { data } = await $axios.$get(`categories/${params.slug}`)
      return { category: data }
    } catch (e) {
      error({ statusCode: 404, message: 'Category not found' })
    }
  },
}
</script>
