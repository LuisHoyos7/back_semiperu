<template>

    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <div>Solicitud de Compra</div>
        </div>
    </div>
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
                    <form>
                        <div class="row">
                            <!-- <div class="col-md-3">
                                <div class="form-group">
                                    <label>RQ:</label>
                                    <input type="text" class="form-control form-control-sm" id="nroForm" name="nroForm">
                                </div>
                            </div> -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Cliente:</label>
                                    <select   @change="getProject" name="direccion1"  class="form-control form-select" v-model="form.client">
                                        <option  v-for="item in clients" :key="item.id" :value="item.id">{{ item.nombre }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Proyecto:</label>
                                    <select  @change="getSubObra"  name="direccion1"  class="form-control form-select" v-model="form.project">
                                        <option v-for="item in projects" :key="item.id" :value="item.id">{{ item.nombre }}</option>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="col-md-3">
                                <div class="form-group">
                                    <label>Nombre Proyecto: </label>
                                    <input type="text" class="form-control form-control-sm" id="nombreProyectoForm" name="nombreProyectoForm" disabled>
                                </div>
                            </div> -->
                        </div>
                        <div class="row mt-1">
                             <div class="col-md-3">
                                <div class="form-group">
                                    <label>Sub Obra:</label>
                                    <select  name="direccion1"  class="form-control form-select" v-model="form.subObra">
                                        <option v-for="item in subObras" :key="item.id" :value="item.id">{{ item.nombre }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Proveedor:</label>
                                    <select  name="direccion1"  class="form-control form-select" v-model="form.proveedor">
                                        <option  v-for="item in clients" :key="item.id" :value="item.id">{{ item.nombre }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Moneda: </label>
                                    <select class="form-control form-control-sm" name="monedaForm" id="monedaForm">
                                        <option value="PEN">SOLES</option>
                                        <option value="USD">DOLARES</option>
                                        <option value="EUR">EUROS</option>
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
                            <!-- <div class="col-md-3">
                                <div class="form-group">
                                    <label>Fecha solicitud: </label>
                                    <input type="date" class="form-control form-control-sm" name="fechaSolicitudForm" id="fechaSolicitudForm">
                                </div>
                            </div> -->
                        </div>
                        <div class="row mt-2">
                            <div class="col-12 app-card app-card-orders-table shadow-sm mb-5 mt-3">
                                <div class="app-card-body">
                                    <div class="table-responsive">
                                        <table class="table app-table-hover text-center">
                                            <thead>
                                                <tr>
                                                    <!-- <th class="cell">SubObra</th>
                                                    <th class="cell">Site</th> -->
                                                    <th class="cell">Descripción</th>
                                                    <th class="cell">Unidad</th>
                                                    <th class="cell">Cantidad</th>
                                                    <th class="cell">Precio Unitario (Sin IGV)</th>
                                                    <th class="cell">Precio Total (Sin IGV)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="cell">DESCRIPCION 1</td>
                                                    <td class="cell">UND</td>
                                                    <td class="cell">1</td>
                                                    <td class="cell">2,900.00</td>
                                                    <td class="cell">2,900.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
            form:{
                client: null,
                subObra:null,
                project:null,
                proveedor: null,
                user : null,
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
    },
    mounted(){
        axios
            .get("api/client")
            .then((res) => {
                this.clients = res.data.empresa
                this.users = res.data.user
                console.log('clientes',this.clients);
                console.log('users',this.users);
        })
    }
}
</script>
<style>

</style>
