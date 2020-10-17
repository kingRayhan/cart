<template>
  <nav>
    <b-navbar>
      <template slot="brand">
        <b-navbar-item tag="router-link" :to="{ path: '/' }">
          <img :src="require('~/assets/images/logo.png')" alt="site-logo" />
        </b-navbar-item>
      </template>

      <template slot="start">
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
      </template>

      <template slot="end">
        <b-navbar-item href="/auth/login">
          <b-icon icon="account" size="is-small" />
          <span class="ml-2">Guest</span>
        </b-navbar-item>

        <b-navbar-item tag="button" @click="openCart">
          <b-icon icon="cart" size="is-small" />
          <span class="ml-2">$14</span>
        </b-navbar-item>
      </template>
      <!--  -->
    </b-navbar>
    <CartSidebar :open="showCart" @closeCart="showCart = false" />
  </nav>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
  data() {
    return { showCart: false }
  },
  computed: {
    ...mapGetters(['categories']),
  },
  methods: {
    url(slug) {
      return { name: 'categories-slug', params: { slug } }
    },
    openCart() {
      this.showCart = true
    },
  },
}
</script>
