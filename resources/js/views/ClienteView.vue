<template>
<div class="card">
    <div class="card-body">
        <h3 class="card-title">Clientes</h3>
        <div v-if="openTable">
            <p class="card-text">
                <Table
                  :clientes="clientes"
                  @deleteCliente="deleteCliente($event)"
                  @editCliente="pasarDatos($event)"
                />
            </p>
        </div>
        <div v-if="openForm">
            <Form
              :cliente="cliente"
              @registrarCliente="registrarCliente($event)"
              @editCliente="editCliente($event)"
            />
        </div>
    </div>
</div>
</template>
<script>
import Table from "../components/Table.vue";
import Form from "../components/Form.vue";
export default {
  components: { Table, Form },

  data() {
    return {
        refresh: false,
        openForm: false,
        openTable: true,
        clientes: [],
        cliente: null,
    };
  },
  created() {
    this.getClientes();
  },
  methods: {
    toggle() {
      this.openForm = !this.openForm;
      this.openTable = !this.openTable;
    },
    registrarCliente(cliente){
        let me = this;
        axios.post('/clientes/registrar',{
            'cedula': cliente.cedula,
            'nombre': cliente.nombre,
            'telefono': cliente.telefono,
            'direccion': cliente.direccion,
            'estado': cliente.status,
        }).then(function (response) {
          if(response) {
            me.toggle();
            me.getClientes();
          }
        }).catch(function (error) {
            console.log(error);
        });
    },
    getClientes() {
      let me = this;
      var url = "/clientes/index";
      axios
        .get(url)
        .then(function (response) {
          me.clientes = response.data;
          console.log(me.clientes, 'me.clientes');
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    deleteCliente(id) {
      console.log(id, 'id');
      let me = this;
      axios
        .put("/clientes/eliminar", {
          id: id,
        })
        .then(function (response) {
          if (response.data === 1) {
            me.getClientes();
          }
          console.log(`eliminado con exito`);
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    editCliente(cliente) {
        let me = this;
        axios.post('/clientes/editar',{
            'cedula': cliente.cedula,
            'nombre': cliente.nombre,
            'telefono': cliente.telefono,
            'direccion': cliente.direccion,
            'estado': cliente.status,
        }).then(function (response) {
          if(response) {
            me.toggle();
            me.getClientes();
          }
        }).catch(function (error) {
            console.log(error);
        });
    },
    pasarDatos(id) {
      this.toggle()
      console.log(this.clientes[0], '0000')
      this.cliente = this.clientes.find(cliente => cliente.id === id)
      console.log(id, 'id')
      console.log(this.cliente)
    }
  },
};
</script>

<style></style>
