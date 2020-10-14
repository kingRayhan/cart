<template>
  <div class="card">
    <div class="card-image">
      <figure class="image is-4by3">
        <img
          src="https://bulma.io/images/placeholders/1280x960.png"
          alt="Placeholder image"
        />
      </figure>
    </div>

    <div class="card-content">
      <div class="content">
        <h4>{{ title }}</h4>
        <p>Lorem ipsum dolor sit amet.</p>
        <div class="mt-4">
          <p class="text-xl">$<span class="text-green-500">45</span></p>
          <button class="border px-2 is-uppercase text-sm">Add to cart</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['title'],
}
</script>
