<template>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Clientes</h3>
            <div v-if="openTable">
                <p class="card-text">
                    <Table/>
                </p>
                <a href="#" class="btn btn-primary" @click="crear">Crear Cliente</a>
            </div>
            <div v-if="openForm">
                <Form/>
            </div>

        </div>
    </div>
</template>
<script>
import Table from '../components/Table.vue';
import Form from '../components/Form.vue';
export default {
    components: { Table , Form },

        data() {
        return {
            clientes: [],
            openForm:false,
            openTable:true
        };
    },

    methods: {

        crear(){
            this.openForm = true
            this.openTable = false
        },
    }
};
</script>

<style></style>
