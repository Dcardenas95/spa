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
                <tr v-for="(cliente) in clientes" :key="cliente.id">
                    <td >{{cliente.cedula}}</td>
                    <td >{{cliente.nombre}}</td>
                    <td >{{cliente.telefono}}</td>
                    <td >{{cliente.estado}}</td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm" @click="deleteCliente(cliente.id)" >
                            <i class="icon-trash"></i>
                        </button>
                        <button type="button" class="btn btn-success btn-sm" >
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

    created(){
        this.getClientes()
    },
    props: {
        refresh: Boolean,
    },
    data() {
        return {
            clientes: []
        };
    },
    watch: { 
        refresh: function(newVal, oldVal) {
            // watch it
            console.log('Prop changed: ', newVal, ' | was: ', oldVal)
        }
    },
    methods: {
        getClientes() {
            let me = this;
            var url = "/clientes/index";
            axios
                .get(url)
                .then(function(response) {
                    me.clientes = response.data;
                })
                .catch(function(error) {
                    console.log(error);
                });
        },

        deleteCliente(id){

            let me = this;
            axios.put('/clientes/eliminar',{
                'id': id
            }).then(function (response) {
                if(response.data === 1){
                    me.getClientes();
                }
                console.log(`eliminado con exito`);
            }).catch(function (error) {
                console.log(error);
            });

        }
    }
};
</script>

<style></style>
