// IndexComponent.vue

<template>
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div class="card card-default">
				<div class="card-header">Gastos</div>

				<div class="card-body">
					
					<div>
      
        <div class="row">
          <div class="col-md-8">
            <router-link :to="{ name: 'create' }" class="btn btn-primary">Agregar Nuevo Gasto</router-link>
          </div>
        </div>

        <br />

        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Monto</th>
                <th>Acción</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="gasto in gastos" :key="gasto.id">
                    <td>{{ gasto.id }}</td>
                    <td>{{ gasto.nombre }}</td>
                    <td>{{ gasto.tipo }}</td>
                    <td>{{ gasto.monto }}</td>
                    <td><router-link :to="{name: 'edit', params: { id: gasto.id }}" class="btn btn-primary">Modificar</router-link>
                    <button class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
            </tbody>
        </table>
  </div>

				</div>
			</div>
		</div>
	</div>
</template>

<script>
  export default {
      data() {
        return {
          gastos: []
        }
      },
      created() {
      let uri = 'http://www.gestor.com/api/gastos';
      axios.get(uri).then(response => {
        this.gastos = response.data.data;
      });
    },
}
</script>