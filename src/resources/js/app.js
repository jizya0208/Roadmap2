require('./bootstrap');
window.Vue = require('vue');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


// Vue.use(StarRating);

// Vue.component('star-rating', StarRating);
// const app = new Vue({
//     el: '#star',
//     data: {
//         rating: 3
//     }
// });

import StarRating from 'vue-star-rating'

// const app = Vue.createApp({ 
//   methods: {
//     setRating(rating){
//       this.rating= rating;
//     }
//   },
//   data: {
//     rating: 0
//   }
//  })
// app.component('star-rating', VueStarRating.default)
// app.mount('#star')


const app = Vue.createApp({
  methods: {
    showCurrentRating(rating) {
      this.currentSelectedRating =
        rating === 0
          ? this.currentSelectedRating
          : "Click to select " + rating + " stars";
    },
    setCurrentSelectedRating(rating) {
      this.currentSelectedRating = "You have Selected: " + rating + " stars";
    }
  },
  computed: {
    currentRatingText() {
      return this.rating
        ? "You have selected " + this.rating + " stars"
        : "No rating selected";
    },
    mouseOverRatingText() {
      return this.mouseOverRating
        ? "Click to select " + this.mouseOverRating + " stars"
        : "No Rating";
    }
  },
  data() {
    return {
      rating: null,
      resetableRating: 2,
      currentRating: "No Rating",
      mouseOverRating: null
    };
  }
});
app.component("star-rating", VueStarRating.default);

app.mount("#app");
