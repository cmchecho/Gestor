// CreateComponent.vue

<template>
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card card-default">
				<div class="card-header">Agregar Nuevo Gasto</div>

				<div class="card-body">
					
				<form @submit.prevent="addGasto()">
				    <div class="form-group row">
				        <label class="col-sm-2 col-form-label">Gasto</label>
				            <div class="col-sm-8">
				                <input type="text" class="form-control" v-model="gasto.nombre" placeholder="Nombre del gasto" required>
				            </div>
				    </div>

				    <div class="form-group row">
				        <label class="col-sm-2 col-form-label">Tipo</label>
				            <div class="col-sm-8">
				                <select class="custom-select" v-model="gasto.tipo" required>
				                    <option selected value="">Seleccione una opción</option>
				                    <option value="fijo">Fijo</option>
				                    <option value="variable">Variable</option>
				                </select>
				            </div>
				    </div>

				    <div class="form-group row">
				        <label class="col-sm-2 col-form-label">Monto</label> 
				            <div class="col-sm-8">
				                <div class="input-group">
				                    <input type="number" class="form-control" v-model="gasto.monto" aria-label="Dollar amount (with dot and two decimal places)" placeholder="0.00" step="0.01" required>
				                        <div class="input-group-append">
				                            <span class="input-group-text">$</span>
				                            <span class="input-group-text">0.00</span>
				                        </div>
				                </div>
				                <small class="form-text text-muted"> 
				                Ingrese números sólos separados por punto decimal. Ejemplo 1234.05
				                </small>
				            </div>
				    </div>

				    <div class="form-group row">
				        <div class="col-sm-8">
				            <button type="submit" class="btn btn-primary">Guardar</button>
				        </div>
				    </div>
				</form>

				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		data(){
		return {
			gasto:{}
		}
	},
	methods: {
		addGasto(){
			let uri = 'http://www.gestor.com/api/gasto/create';
			axios.post(uri, this.gasto).then((response) => {
				this.$router.push({name: 'gastos'});
			});
		}
	}
}
</script>