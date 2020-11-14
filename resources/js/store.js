
import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

let cart = window.localStorage.getItem('cart'); // get cart item from local memory

export default new Vuex.Store({
  state: {
    cart: cart ? JSON.parse(cart) : [],
  },
  mutations: {
    addToCart(state,item){


        state.cart.push(item);
        this.commit('saveData');


      },

    saveData(state){ // save data to local storage to avoid losing it while refresh
      window.localStorage.setItem('cart',JSON.stringify(state.cart));
    },

    removefromcart(state, item){  // remove data from cart and from local storage
      let index = state.cart.indexOf(item);
      state.cart.splice(index,1);
      this.commit('saveData');
    },

 },





  actions: {},
  modules: {}
});
