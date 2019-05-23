<template>
	<div class="modal fade" id="addPokemon" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agregar Pokemon</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form @submit.prevent="savePokemon">
						<div class="form-group">
							<label>Pokemon</label>
							<input type="text" class="form-control" placeholder="Ingresa el nombre del pokemon" v-model="name" name="name">
						</div>
						<div class="form-group">
							<label>Picture</label>
							<input type="text" class="form-control" placeholder="Ingresa la url de una imagen" v-model="picture" name="picture">
						</div>
<!-- 						<div class="form-group">
							<label for="">Avatar</label><br>
							<input type="file" name="picture">
						</div> -->

						<button type="submit" class="btn btn-primary">Save</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
//luego de generar nuestro bus quiero transmitir y generar un evento
import EventBus from '../event-bos';
	export default{
            data(){
                  return{
                  	name:null,
                  	picture:null
                  }
            },
            methods:{
            	savePokemon:function(){
            		//para tener una ruta dinamica, hacemos una linaea de javascript
            		let currentRoute = window.location.pathname
            		console.log(currentRoute);

                  //queremos enviar nformacion, debemos pasarle la ruta
            		axios.post(`http://127.0.0.1:8000${currentRoute}/pokemons`,{
            			//ahora debemos pasarle la funcion a laravel
            			name:   this.name,
            			picture:this.picture
            		})
            		.then(function(res){
            			console.log(res);
            		
            			$('#addPokemon').modal('hide')
            			EventBus.$emit('create-pokemon',res.data.pokemon)
            			//console.log(res.data.pokemon)


            		})
            		.catch(function(err){
            			console.log(err)
            		});
            	}
            }
	}
</script>

<style>
	
</style>