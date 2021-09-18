tem
<template>
  <div class="container">
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">cedula</th>
            <th scope="col">Nombre</th>
            <th scope="col">Telefono</th>
            <th scope="col">Estado Civil</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="cliente in clientes" :key="cliente.id">
            <td>{{ cliente.cedula }}</td>
            <td>{{ cliente.nombre }}</td>
            <td>{{ cliente.telefono }}</td>
            <td>{{ cliente.estado }}</td>
            <td>
              <button
                type="button"
                class="btn btn-danger btn-sm"
                @click="$emit('deleteCliente', cliente.id)"
              >
                <i class="icon-trash"></i>
              </button>
              <button
                type="button"
                class="btn btn-success btn-sm"
                @click="$emit('editCliente', cliente.id)"
              >
                <i class="icon-edit"></i>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  name: "Table",
  props: {
    clientes: Array,
  },
  data() {
    return {
      //   clientes: [],
    };
  },
  methods: {},
};
</script>

<style></style>
