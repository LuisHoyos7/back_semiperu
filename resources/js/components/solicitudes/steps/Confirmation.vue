 
<template>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div><h4>Revisar la Información</h4></div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Cliente:</label>
                                <input readonly   name="direccion1"  class="form-control" v-model="this.client_name">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Proyecto:</label>
                                <input  readonly name="direccion1"  class="form-control" v-model="this.project_name">
                            </div>
                        </div>
                    </div>
                     <div class="row mt-1">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Sub Obra:</label>
                                <input readonly name="direccion1"  class="form-control" v-model="this.subObra_name">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Proveedor:</label>
                                <input readonly name="direccion1"  class="form-control" v-model="this.proveedor_name">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Moneda: </label>
                                <input readonly class="form-control form-control-sm" name="monedaForm" id="monedaForm" v-model="this.currency">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Solicitante:</label>
                                <input  readonly name="direccion1"  class="form-control " v-model="this.user_name">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-nogutter justify-content-between btn btn-sm" style="margin-top:20px; margin-bottom:20px;">
                    <Button class="btn btn-info btn-sm" label="Anterior" @click="prevPage()" icon="pi pi-angle-left" />
                    <Button class="btn btn-info btn-sm" style="margin-left:20px;" label="Siguiente" @click="nextPage()" icon="pi pi-angle-right" iconPos="right" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {

    props:{
        formData : Object
    },
    data () {
        return {
            clients  :  [],
            users :[],
            client_name : null,
            project_name : null,
            subObra_name :null ,
            proveedor_name : null,
            currency : null,
            user_name : null
        }
    },
    methods: {
        nextPage() {
            this.$emit('nextPage', {formData: {formData: this.$props.formData}, pageIndex: 1});
        },
        prevPage() {
            this.$emit('prevPage', {pageIndex: 1});
        }
    },
    created(){
        axios.get("api/client")
            .then((res) => {
                this.clients = res.data.company
                this.users = res.data.user

                this.clients.forEach(object => {
                    if(object.id ===  this.$props.formData.client){
                        this.client_name = object.name
                    }
                    if(object.id ===  this.$props.formData.proveedor){
                        this.proveedor_name = object.name
                    }
                });

                this.users.forEach(object =>{
                    if(object.id === this.$props.formData.user)
                    this.user_name = object.name
                })
        })

        axios.get(`api/project/${this.$props.formData.project}`)
                .then((res) => {
                     this.projects = res.data;
                     this.projects.forEach(object => {
                        if(object.id ===  this.$props.formData.project)
                        this.project_name = object.name
                    });
                })

        axios.get(`api/sub_obras/${this.$props.formData.sub_obra}`)
                .then((res) => {
                    this.subObras = res.data;
                    this.subObras.forEach(object => {
                        if(object.id ===  this.$props.formData.sub_obra)
                            this.subObra_name = object.name
                        });
                })

        this.currency = this.$props.formData.currency
    }
}
</script>
<style lang="scss">

.p-inputtext {
 padding: 0rem 0.5rem;
}

.pi-file-pdf, .pi-check{
    color: white;
}
thead{
    background: orange;
    padding: 0.5rem 0.5rem;
    text-align: center;
    padding: 1rem 1rem;
    border: 1px solid #e9ecef;
    border-width: 0 0 1px 0;
    font-weight: 600;
    color: #495057;
    background: #f8f9fa;
    transition: box-shadow 0.2s;
}

tbody{
    text-align: center;
    border: 1px solid #e9ecef;
    border-width: 0 0 1px 0;
    padding: 1rem 1rem;
}
td{
    width: 50px !important;
    font-size: 12px !important;
}

.pi-fw {
    font-size: 0.7rem !important;
}

th{
   font-size: 14px !important;
} 

.p-fluid .p-inputtext {
    height: 30px !important;
}
.p-inputtext{
    height: 35px;;
}

.p-column-filter-row .p-column-filter-element{
    width: 120% !important;
}
::v-deep(.p-paginator) {
    .p-paginator-current {
        margin-left: auto;
    }
}

::v-deep(.p-progressbar) {
    height: .5rem;
    background-color: #D8DADC;

    .p-progressbar-value {
        background-color: #607D8B;
    }
}

::v-deep(.p-datepicker) {
    min-width: 25rem;

    td {
        font-weight: 400;
    }
}

::v-deep(.p-datatable.p-datatable-customers) {
    .p-datatable-header {
        padding: 1rem;
        text-align: left;
        font-size: 1.5rem;
    }

    .p-paginator {
        padding: 1rem;
    }

    .p-datatable-thead > tr > th {
        text-align: left;
    }

    .p-datatable-tbody > tr > td {
        cursor: auto;
    }

    .p-dropdown-label:not(.p-placeholder) {
        text-transform: uppercase;
    }
}
</style>