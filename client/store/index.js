export const state = () => ({
  categories: [],
  products: [],
})

export const getters = {
  categories: (state) => state.categories,
  categoryCount: (state) => state.categories.length,
}

export const mutations = {
  SET_CATEGORIES: (state, payload) => (state.categories = payload),
  SET_PRODUCTS: (state, payload) => (state.products = payload),
}

export const actions = {
  async nuxtServerInit({ commit }) {
    const { data: categories } = await this.$axios.$get('categories')
    commit('SET_CATEGORIES', categories)

    const { data: products } = await this.$axios.$get('products')
    commit('SET_PRODUCTS', products)
  },
}
