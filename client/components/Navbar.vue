<template>
  <div class="container">
    <nav class="navbar" role="navigation" aria-label="main navigation">
      <div class="navbar-brand">
        <NuxtLink class="navbar-item" :to="{ name: 'index' }">
          <img
            src="https://bulma.io/images/bulma-logo.png"
            width="112"
            height="28"
          />
        </NuxtLink>

        <a class="navbar-burger burger">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>

      <div class="navbar-menu">
        <div class="navbar-end">
          <template v-for="category in categories">
            <NuxtLink
              v-if="!category.children.length"
              class="navbar-item"
              :to="url(category.slug)"
              :key="category.id"
            >
              {{ category.name }}
            </NuxtLink>

            <div
              v-if="category.children.length"
              class="navbar-item has-dropdown is-hoverable"
              :key="category.id"
            >
              <NuxtLink class="navbar-link" :to="url(category.slug)">
                {{ category.name }}
              </NuxtLink>

              <div class="navbar-dropdown">
                <NuxtLink
                  v-for="subCategory in category.children"
                  class="navbar-item"
                  :key="subCategory.id"
                  :to="url(subCategory.slug)"
                >
                  {{ subCategory.name }}
                </NuxtLink>
              </div>
            </div>
          </template>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
  computed: {
    ...mapGetters(['categories']),
  },
  methods: {
    url(slug) {
      return { name: 'categories-slug', params: { slug } }
    },
  },
}
</script>
