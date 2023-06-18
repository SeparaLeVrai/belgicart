<template>

      <a v-show="scrollTop > 100" @click="scrollToTop" class="back-to-top">Back to Top</a>
  </template>

  <script>
  export default {
    data() {
      return {
        scrollTop: 0,
        showBackToTop: false,
      };
    },
    mounted() {
      window.addEventListener('scroll', this.handleScroll);
    },
    beforeDestroy() {
      window.removeEventListener('scroll', this.handleScroll);
    },
    methods: {
      handleScroll() {
        this.scrollTop = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;
        this.showBackToTop = this.scrollTop > 100;
      },
      scrollToTop() {
        window.scrollTo({
          top: 0,
          behavior: 'smooth',
        });
      },
    },
  };
  </script>

  <style>
  .back-to-top {
    /* Styles pour le bouton Back to Top */
  }

  .fixed {
    position: fixed;
    bottom: 20px;
    right: 20px;
  }
  </style>
