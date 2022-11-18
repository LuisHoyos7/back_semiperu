<template>

    <!-- <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <div>Solicitudes de Compra</div>
        </div>
    </div> -->
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <div class="card border-success">
                <div class="card-header d-flex justify-content-between">
                    <div>Crear solicitud de compra</div>
                    <div class="notificacion-type status-badge mb-2">
                        <span class="badge bg-info">Pendiente</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Cliente:</label>
                                <select   @change="getProject" name="direccion1"  class="form-control form-select" v-model="form.client">
                                    <option  v-for="item in clients" :key="item.id" :value="item.id">{{ item.name }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Proyecto:</label>
                                <select  @change="getSubObra"  name="direccion1"  class="form-control form-select" v-model="form.project">
                                    <option v-for="item in projects" :key="item.id" :value="item.id">{{ item.name }}</option>
                                </select>
                            </div>
                        </div>
                     </div>
                    <div class="row mt-1">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Sub Obra:</label>
                                <select  name="direccion1"  class="form-control form-select" v-model="form.subObra">
                                    <option v-for="item in subObras" :key="item.id" :value="item.id">{{ item.name }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Proveedor:</label>
                                <select  name="direccion1"  class="form-control form-select" v-model="form.proveedor">
                                    <option  v-for="item in clients" :key="item.id" :value="item.id">{{ item.name }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Moneda: </label>
                                <select class="form-control form-control-sm" name="monedaForm" id="monedaForm" v-model="form.currency">
                                    <option value="Soles">SOLES</option>
                                    <option value="Dolares">DOLARES</option>
                                    <option value="Euros">EUROS</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Solicitante:</label>
                                <select   name="direccion1"  class="form-control form-select" v-model="form.user">
                                    <option  v-for="item in users" :key="item.id" :value="item.id">{{ item.name }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                        
                    <div class="grid grid-nogutter justify-content-between btn btn-sm" style="margin-top:20px;">
                        <Button class="btn btn-sm" label="Siguiente" @click="nextPage()" icon="pi pi-angle-right" iconPos="right" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data(){
        return {
            step : 1,
            clients  :  [],
            projects :  [],
            subObras :  [],
            users    :  [],
            firstname: '',
            lastname: '',
            age: null,
            submitted: false,
            validationErrors: {},
            form:{
                client: null,
                subObra:null,
                project:null,
                proveedor: null,
                user : null,
                currency : null
            },
        }
    },
    methods : {
         getProject() {
            var id = this.form.client
            axios
                .get(`api/project/${id}`)
                .then((res) => {
                     this.projects = res.data;
                    console.log('projects', res.data)
                })
        },

        getSubObra(){
            var id = this.form.project
            axios
                .get(`api/sub_obras/${id}`)
                .then((res) => {
                    this.subObras = res.data;
                    console.log('sub_obras', this.projects)
                })
        },

        nextPage() {
            this.submitted = true;
            this.$emit('next-page', {formData: {client: this.form.client, project: this.form.project, sub_obra : this.form.subObra, proveedor: this.form.proveedor, currency : this.form.currency, user : this.form.user}, pageIndex: 0});
        },
        validateForm() {
            if (!this.firstname.trim())
                this.validationErrors['firstname'] = true;
            else
                delete this.validationErrors['firstname'];

            if (!this.lastname.trim())
                this.validationErrors['lastname'] = true;
            else
                delete this.validationErrors['lastname'];

            return !Object.keys(this.validationErrors).length;
        }
    },
    mounted(){
        axios
            .get("api/client")
            .then((res) => {
                this.clients = res.data.company
                this.users = res.data.user
                console.log('clientes',this.clients);
                console.log('users',this.users);
        })
    }
}
</script>

<style>

</style>
