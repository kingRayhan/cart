<template>
  <section class="mb-3">
    <b-field :label="type">
      <b-select
        :placeholder="'Select a ' + type"
        @input="changed($event)"
        :value="selectedVariationId"
        expanded
      >
        <option disabled value="">{{ 'Select a ' + type }}</option>
        <option
          v-for="variation in variations"
          :key="variation.id"
          :value="variation.id"
        >
          {{ variation.name }}
          <template v-if="variation.isPriceVaries">
            ({{ variation.price }})
          </template>
        </option>
      </b-select>
    </b-field>
  </section>
</template>
<script>
export default {
  props: {
    variations: { type: Array, required: true },
    type: { type: String, required: true },
    value: { required: false, default: '' },
  },
  methods: {
    changed(variationId) {
      this.$emit('input', this.findVariationById(variationId))
    },
    findVariationById(id) {
      console.log(id)
      return this.variations.find((v) => v.id == id)
    },
  },
  computed: {
    selectedVariationId() {
      if (!this.findVariationById(this.value.id)) return ''
      return this.value.id
    },
  },
}
</script>
