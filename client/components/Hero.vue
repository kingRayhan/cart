<template>
  <section class="hero is-medium is-primary is-bold">
    <div class="hero-body">
      <div class="container">
        <h1 class="title">{{ title }}</h1>
        <h2 class="subtitle">{{ subTitle }}</h2>

        <div class="mt-2">
          <NuxtLink
            class="tag mr-2"
            v-for="subCategory in subCategories"
            :key="subCategory.id"
            :to="{
              name: 'categories-slug',
              params: { slug: subCategory.slug },
            }"
            >{{ subCategory.name }}</NuxtLink
          >
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  props: {
    title: {
      type: String,
      default: 'Hero title',
    },
    subTitle: {
      type: String,
      default: 'Hero title description',
    },
    subCategories: {
      type: Array,
    },
  },
}
</script>
