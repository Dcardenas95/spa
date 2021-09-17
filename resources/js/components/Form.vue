<template>
    <div id="container">
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Cedula</label>
                    <input type="text" class="form-control" v-model="cedula" />
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Nombre</label>
                    <input type="text" class="form-control" v-model="nombre" />
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Telefono</label>
                    <input
                        type="text"
                        class="form-control"
                        v-model="telefono"
                    />
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Direccion</label>
                    <input
                        type="text"
                        class="form-control"
                        v-model="direccion"
                    />
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="inputState">Estado Civil</label>
                    <select class="form-control" v-model="status">
                        <option value="" >SELECCIONE</option>
                        <option
                            v-for="estado in estados"
                            v-text="estado"
                        ></option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" @click="registrarCliente">Crear Cliente</button>
        </form>
    </div>
</template>

<script>
export default {
    name: "Form",
    props:{
        valor:true
    },
    data() {
        return {
            cedula: "",
            nombre: "",
            telefono: "",
            direccion: "",
            estados: ["Soltero", "Viudo", "Casado"],
            status: ""
        };
    },

    methods:{
        registrarCliente(){
            let me = this;
            axios.post('/clientes/registrar',{
                'cedula': this.cedula,
                'nombre': this.nombre,
                'telefono': this.telefono,
                'direccion': this.direccion,
                'estado': this.status,
            }).then(function (response) {
                console.log('ok', response);
                this.$emit('refresh');
            }).catch(function (error) {
                console.log(error);
            });
        },

        saludo(){
            alert('hola')
        }

    }
};
</script>

<style></style>
