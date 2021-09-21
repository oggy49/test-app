<template>
  <div class="fixed-menu z-10 sticky">
    <div class="bg-purple-500">
      <slot />
    </div>
  </div>
</template>
<script>
export default {
  name: 'AppFixedHeader',
  data () {
    return {
      observer: null
    }
  },
  created () {
    this.observer = new IntersectionObserver(
      this.onElementObserved,
      { root: this.$el, threshold: [1] }
    )
  },
  mounted () {
    this.observer.observe(this.$el)
  },
  beforeDestroy () {
    this.observer.disconnect()
  },
  methods: {
    onElementObserved ([e]) {
      // e.target.classList.toggle('shadow-lg', e.intersectionRatio < 1),
      // e.target.classList.toggle('bg-opacity-75', e.intersectionRatio < 1)
      // e.target.classList.toggle('border-b-8', e.intersectionRatio < 1)
    }
  }
}
</script>
