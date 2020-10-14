export const state = () => ({
  categories: [],
})

export const mutations = {
  SET_CATEGORIES: (state, categories) => (state.categories = categories),
}

export const getters = {
  categories: (state) => state.categories,
}

export const actions = {
  async nuxtServerInit({ commit }) {
    const { data } = await this.$axios.$get(
      'http://localhost:8000/api/categories'
    )
    commit('SET_CATEGORIES', data)
  },
}
