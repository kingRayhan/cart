<template>
  <b-carousel>
    <b-carousel-item v-for="(carousel, i) in carousels" :key="i">
      <img class="w-full" :src="carousel.img" alt="slider chobi" />
    </b-carousel-item>
  </b-carousel>
</template>

<script>
export default {
  data() {
    return {
      carousels: [
        { img: require('~/assets/images/slider-images/3.png') },
        { img: require('~/assets/images/slider-images/1.png') },
        { img: require('~/assets/images/slider-images/2.png') },
      ],
    }
  },
}
</script>
