<template>
    <div class="container">
        <!-- SEARCH FORM -->
    <form @submit.prevent="search()" class="form-inline" id="searchForm">
        <div class="input-group input-group-sm">
            <input class="form-control" v-model="searchText" v-on:keyup.enter="search()" required id="search" name="search" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
            <button class="btn btn-success" type="submit">
                <i class="fas fa-search"></i>
            </button>
            </div>
        </div>
    </form>
    <button class="clear" @click="loadProducts(), clearsearch()">Clear Search</button>
        <a href="#" data-toggle="modal" data-target="#minicart" style="text-decoration:none;" class="fas fa-shopping-cart cart"></a>
        <div class="row">
         <div class="col-lg-4 col-md-6 col-sm-12 mt-3" v-for="product in products" :key="product.id">
            <div  class="card" style="width: 18rem;">
                <img class="card-img-top"  style="height:250px;" :src="'/img/products/' + product.image" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{product.name}}</h5>
                    <p class="card-text"></p>
                    <a href="#" @click="AddToCart(product)" class="btn btn-outline-secondary pr-3 pl-3">Add To Cart</a>
                </div>
            </div>
          </div>
        </div>
        <div class="mini-cart" >
            <div class="modal fade" id="minicart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">My Bag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="ul">
                    <li v-for="(item,index) in this.$store.state.cart" :key="index" class="media">

                        <img :src=" '/img/products/' + item.image" alt="" width="55px;" height="40px;" class="imgbag">

                        <div class="media-body text-left">
                            <h5 class="mt-0">{{item.name}}
                            <span class="fa fa-times float-right remove-item" @click="$store.commit('removefromcart',item)"></span>
                            </h5>
                        </div>
                    </li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Continue Shopping</button>
                    <button type="button" class="btn btn-primary" @click="checkout">Checkcout</button>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</template>



<style>
.cart{
    font-size: 22px;
    position: absolute;
    top: 13px;
    z-index: 99999 !important;
    right: 70px;
}
.media {
      padding: 10px;
    }
.media-body {
    padding-left: 20px;
    padding-top: 10px;
}
.ul {
    margin-bottom: 0px;
}
.media-body p {
    margin-bottom: 5px !important;
}
.media-body h5 {
    margin-bottom: 10px;
}
.remove-item:hover {
    cursor: pointer;
}
#searchForm{
    padding-top: 15px;
    display: inline-block;
}
.clear{
    margin-left: 5px;
    border: 2px solid #999;
    border-radius: 5px;
}
</style>

<script>
    export default {
        data(){
            return{
                searchText:'',
                products:{},
            }
        },
        methods:{
            loadProducts(){
                axios.get("api/products").then(({data}) => (this.products = data.data));
            },
            AddToCart(product){
                $('#minicart').modal('show');
                this.$store.commit('addToCart' , { id:product.id , name:product.name, image:product.image});
            },
            search(){
                axios.get("api/search/" + this.searchText).then(({data}) => (this.products = data))
            },
            clearsearch(){
                this.searchText = '';
            },
            checkout(){

            }
        },
        created() {
            this.loadProducts();
        }
    }
</script>


