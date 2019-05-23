<template>
  <div class="row">
    <spinner-component v-show="loading"></spinner-component>
     <div class="col-sm" v-for="pokemon in pokemons">
        <div class="card text-center my-5" style="width: 18rem;">
           <img style="height: 100px; width: 100px; background-color: #EFEFEF" class="card-img-top rounded-circle mx-auto d-block my-4" v-bind:src="pokemon.picture" alt="">
           <div class="card-body">
             <h5 class="card-title text-uppercase">{{pokemon.name}}</h5>
             <p class="card-text">dfvdfvdfvdfv</p>
             <a href="/vistas" class="btn btn-primary ">Ver mas..</a>
         </div>
     </div>

 </div>

</div>
</template>

<script>
import EventBus from '../event-bos';
    export default {
        data(){
           return {
            pokemons:[],
            loading:true
            // {id:1,name:"picachu"},
            // {id:2,name:"squirtle"},
            // {id:3,name:"charizard"},
         //   ]
           }
        },
        created(){
             EventBus.$on('create-pokemon',data=>{
                this.pokemons.push(data);
             })
        },
        mounted() {
            //console.log('Component mounted.')
            let currentRoute = window.location.pathname
            axios
                .get(`http://127.0.0.1:8000${currentRoute}/pokemons`)
                .then((res)=>{
                    this.pokemons=res.data
                    this.loading=false
                });
        }
    }
</script>
