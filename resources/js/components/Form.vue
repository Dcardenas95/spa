<template>
  <div id="container">
    <form>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Cedula</label>
          <input type="text" class="form-control" v-model="form.cedula" />
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Nombre</label>
          <input type="text" class="form-control" v-model="form.nombre" />
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Telefono</label>
          <input type="text" class="form-control" v-model="form.telefono" />
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Direccion</label>
          <input type="text" class="form-control" v-model="form.direccion" />
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-4">
          <label for="inputState">Estado Civil</label>
          <select class="form-control" v-model="form.status">
            <option value="">SELECCIONE</option>
            <option
                v-for="(estado, index) in estados"
                :key="index"
                v-text="estado"
            ></option>
          </select>
        </div>
      </div>
      <button type="submit" class="btn btn-primary" @click="$emit('registrarCliente', form)">
        Crear Cliente
      </button>
    </form>
  </div>
</template>

<script>
export default {
  name: "Form",
  props: {
    valor: true,
    cliente: Object
  },
  mounted() {
      if(this.cliente) {
        Object.assign(this.form, this.cliente)
      }
  },
  data() {
    return {
        estados: ["Soltero", "Viudo", "Casado"],
        form: {
            cedula: "",
            nombre: "",
            telefono: "",
            direccion: "",
            status: "",
        }
    };
  },
};
</script>

<style></style>
