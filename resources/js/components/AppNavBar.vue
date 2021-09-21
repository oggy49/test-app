<template>
  <div id="nav">
    <div class="mx-auto px-4 sm:px-8 lg:px-12 py-4 lg:py-8">
      <div class="w-full relative flex items-center justify-between">
        <div class="-mb-12 relative lg:mb-0">
          <slot name="brand" />
        </div>
        <div class="hidden lg:flex justify-end items-center md:w-full text-white font-headline text-base">
          <slot />
        </div>
        <!-- <div class="w-24 flex justify-end items-center px-4">
          <slot name="icons-right" />
        </div> -->
        <div v-if="!isOpen" class="flex-shrink-0 lg:hidden">
          <button ref="openButton" type="button" class="block focus:outline-none" aria-label="Menu" @click="open">
            <svg class="h-6 w-6" fill="white" viewBox="0 0 24 24">
              <path d="M3 6C3 5.44772 3.44772 5 4 5H20C20.5523 5 21 5.44772 21 6C21 6.55228 20.5523 7 20 7H4C3.44772 7 3 6.55228 3 6Z" />
              <path d="M3 12C3 11.4477 3.44772 11 4 11H20C20.5523 11 21 11.4477 21 12C21 12.5523 20.5523 13 20 13H4C3.44772 13 3 12.5523 3 12Z" />
              <path d="M4 17C3.44772 17 3 17.4477 3 18C3 18.5523 3.44772 19 4 19H20C20.5523 19 21 18.5523 21 18C21 17.4477 20.5523 17 20 17H4Z" />
            </svg>
          </button>
        </div>
      </div>
    </div>
    <div class="lg:hidden">
      <!-- Off-canvas menu background overlay -->
      <transition
        enter-class="opacity-0"
        enter-active-class="ease-out transition-medium"
        enter-to-class="opacity-100"
        leave-class="opacity-100"
        leave-active-class="ease-out transition-medium"
        leave-to-class="opacity-0"
        appear
      >
        <div v-show="isOpen" class="z-20 fixed inset-0 transition-opacity">
          <div class="absolute inset-0 bg-black opacity-50" />
        </div>
      </transition>
      <!-- Off-canvas menu -->
      <transition
        enter-class="translate-y-full"
        enter-active-class="ease-out transition-slow"
        enter-to-class="translate-y-0"
        leave-class="translate-y-0"
        leave-active-class="ease-in transition-medium"
        leave-to-class="translate-y-full"
        appear
      >
        <div v-show="isOpen" class="z-20 fixed inset-0 transition-transform">
          <div class="relative h-full flex flex-col">
            <div class="bg-purple text-white h-14 flex justify-start px-6 lg:px-8 py-6 w-full" aria-label="Close" tabindex="-1" @click="close">
              <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M18.2929 19.7071C18.6834 20.0976 19.3166 20.0976 19.7071 19.7071C20.0976 19.3166 20.0976 18.6834 19.7071 18.2929L13.4142 12L19.7071 5.70711C20.0976 5.31658 20.0976 4.68342 19.7071 4.29289C19.3166 3.90237 18.6834 3.90237 18.2929 4.29289L12 10.5858L5.70711 4.29289C5.31658 3.90237 4.68342 3.90237 4.29289 4.29289C3.90237 4.68342 3.90237 5.31658 4.29289 5.70711L10.5858 12L4.29289 18.2929C3.90237 18.6834 3.90237 19.3166 4.29289 19.7071C4.68342 20.0976 5.31658 20.0976 5.70711 19.7071L12 13.4142L18.2929 19.7071Z" />
              </svg>
            </div>
            <div class="bg-purple h-full z-20 text-white overflow-y-auto">
              <slot name="mobile-menu" />
            </div>
          </div>
        </div>
      </transition>
    </div>
  </div>
</template>
<script>
export default {
  data () {
    return {
      isOpen: false,
      isOpenLeft: false,
      services:false,
    }
  },
  methods: {
    open () {
      this.isOpen = true
      document.querySelector('body').classList.toggle('overflow-hidden')
    },
    close () {
      this.isOpen = false
      document.querySelector('body').classList.toggle('overflow-hidden')
    }
  }
}
</script>
<style lang="scss">
.ease-linear {
  transition-timing-function: linear
}

.ease-in {
  transition-timing-function: cubic-bezier(.4, 0, 1, 1)
}

.ease-out {
  transition-timing-function: cubic-bezier(0, 0, .2, 1)
}

.ease-in-out {
  transition-timing-function: cubic-bezier(.4, 0, .2, 1)
}

.transition-fastest {
  transition-duration: 75ms
}

.transition-faster {
  transition-duration: 100ms
}

.transition-fast {
  transition-duration: 150ms
}

.transition-medium {
  transition-duration: 200ms
}

.transition-slow {
  transition-duration: 300ms
}

.transition-slower {
  transition-duration: 500ms
}

.transition-slowest {
  transition-duration: 700ms
}

.transition-all {
  transition-property: all
}

.transition-opacity {
  transition-property: opacity
}

.transition-transform {
  transition-property: transform
}

.translate-y-full {
  transform: translateY(100%);
}
.-translate-y-full {
  transform: translateY(-100%);
}
.translate-y-0 {
  transform: translateY(0);
}

.scale-90 {
  transform: scale(.9)
}

.scale-100 {
  transform: scale(1)
}

.origin-top {
  transform-origin: top
}

.origin-top-right {
  transform-origin: top right
}

.origin-right {
  transform-origin: right
}

.origin-bottom-right {
  transform-origin: bottom right
}

.origin-bottom {
  transform-origin: bottom
}

.origin-bottom-left {
  transform-origin: bottom left
}

.origin-left {
  transform-origin: left
}

.origin-top-left {
  transform-origin: top left
}
</style>
