<template>
    <div>
      <div class="card" style="margin-rigth:10px">
            <DataTable :value="requestsBuy" :paginator="true"  :rows="5" class="p-datatable-sm"
                dataKey="id" v-model:filters="filters2" filterDisplay="row"  responsiveLayout="scroll"
                :globalFilterFields="['id','name','created_at']">
               
                <template #header>
                    <div class="row">
                        <div class="col">
                            <h5 class="">Solicitudes de compra</h5>
                        </div>
                        <div class="col" style="text-align:end;">
                            <span class="p-input-icon-left ">
                                <i class="pi pi-search" />
                                <InputText v-model="filters2['global'].value" placeholder="Buscar en toda la tabla..." />
                            </span>
                        </div>
                    </div>
                </template>
                <template #empty>
                    No hay solicitudes  de compras por validar.
                </template>
                <!-- <template #loading>
                    Loading customers data. Please wait.
                </template> -->
                <Column :sortable="true" field="id" header="N°" style="min-width:4rem">
                    <template #body="{data}">
                        {{data.id}}
                    </template>
                    <!-- <template #filter="{filterModel,filterCallback}">
                        <InputText type="text" v-model="filterModel.value" @input="filterCallback()" class="p-column-filter" placeholder="Buscar..."/>
                    </template> -->
                </Column> 
                 <Column :sortable="true" header="Monto" filterField="cod" style="min-width:10rem">
                    <template #body="{data}">
                        <span class="image-text">{{data.detail.map(item => item.price * item.amount).reduce((prev, curr) => prev + curr, 0)}}</span>
                    </template>
                </Column>
                <Column :sortable="true" field="code" header="Solicitud de Compra"  style="min-width:12rem">
                    <template #body="{data}">
                        <span class="image-text">{{data.code}}</span>
                    </template>
                    <template #filter="{filterModel,filterCallback}">
                        <InputText type="text" v-model="filterModel.value" @input="filterCallback()" class="p-column-filter" placeholder="Buscar..."/>
                    </template>
                </Column>
                <Column :sortable="true" field="created_at" header="Fecha OC"  style="min-width:10rem">
                    <template #body="{data}">
                        <span>{{data.created_at}}</span>
                    </template>
                     <template #filter="{filterModel,filterCallback}">
                        <InputText type="date" v-model="filterModel.value" @input="filterCallback()" class="p-column-filter" placeholder="Buscar..."/>
                    </template>
                </Column>
                <Column :sortable="true" field="state_type.name" header="Estado Solicitud" dataType="boolean" style="min-width:6rem">
                    <template #body="{data}">
                        <span class="badge" :style="'background:'+ data.state_type.color">{{data.state_type.name}}</span>
                    </template>
                    <template #filter="{filterModel,filterCallback}">
                        <Dropdown v-model="filterModel.value" @change="filterCallback()" :options="statuses" placeholder="Seleccione" class="p-column-filter" :showClear="true">
                            <template #value="slotProps">
                                <span :class="'customer-badge status-' + slotProps.value" v-if="slotProps.value">{{slotProps.value}}</span>
                                <span v-else>{{slotProps.placeholder}}</span>
                            </template>
                            <template #option="slotProps">
                                <span :class="'customer-badge status-' + slotProps.option">{{slotProps.option}}</span>
                            </template>
                        </Dropdown>
                    </template>
                </Column> 
                <Column :sortable="true" field="" header="Ver" dataType="boolean" style="min-width:4rem">
                    <template #body="{data}">
                        <a @click="showModalRequest(data.id)">
                            <i class="pi pi-eye" ></i>
                        </a>
                    </template>
                </Column> 
            </DataTable>
        </div>
        <div class="card">

        <Dialog header="Detalle de solicitud de compra" v-model:visible="displayModalRequest" :breakpoints="{'960px': '75vw', '640px': '90vw'}" :style="{width: '50vw'}" :position="'top'" :modal="true">
                <div class="row">
                    <div class="col-md-4">
                        <label>Solicitud de Compra:</label>
                            <input :value="this.requestBuyFilter[0].code" type="text" class="form-control sm" readonly/>
                    </div>
                    <div class="col-md-3" style="margin-right:100px;">
                        <label>Año Solicitud:</label>
                            <input :value="this.requestBuyFilter[0].year_order"  type="text" class="form-control sm" readonly/>
                    </div> 
                </div><br><br>
                <div class="row">
                    <div class="col-md-2">
                        <p>P.M</p>
                        <button class="btn btn-success btn-sm"><i class="pi pi-check"></i></button>
                    </div>
                    <div class="col-md-2">
                        <p>G.R</p>
                        <button class="btn btn-success btn-sm"><i class="pi pi-check"></i></button>
                    </div>
                    <div class="col-md-2">
                        <p>CONTROLLER</p>
                        <button class="btn btn-success btn-sm"><i class="pi pi-check"></i></button>
                    </div>
                    <div class="col-md-2">
                         <p>G.T</p>
                        <button class="btn btn-success btn-sm"><i class="pi pi-check"></i></button>
                    </div>
                </div>
                <div class="row" style="margin-top:30px;">
                    <table class="table">
                        <thead>
                            <th>Posición</th>
                            <th>Glosa</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Monto Item</th>
                        </thead>
                        <tbody v-for="(item,index) in this.requestBuyFilter[0].detail" :key="index">
                            <td>{{this.requestBuyFilter[0].id}}</td>
                            <td>{{item.description}}</td>
                            <td>{{item.price}}</td>
                            <td>{{item.amount}}</td>
                            <td>{{item.price * item.amount}}</td>
                        </tbody>
                        <tfoot style="margin-top:30px"> 
                            <th colspan="3"></th>
                            <th class="text-center">Total</th>
                            <th class="text-center">{{this.totalAmount}}</th>
                        </tfoot>
                    </table>
                </div>
            
        </Dialog>
        </div>
    </div>
</template>

<script>
import {FilterMatchMode,FilterOperator} from 'primevue/api';
export default {
    data() {
        return {
            displayModalRequest: false,
            requestBuyFilter : [],
            totalAmount :0,
            filters2: {
                'global': {value: null, matchMode: FilterMatchMode.CONTAINS},
                'id': {value: null, matchMode: FilterMatchMode.STARTS_WITH},
                'code': {value: null, matchMode: FilterMatchMode.STARTS_WITH},
                'created_at': {value: null, matchMode: FilterMatchMode.STARTS_WITH},
                'state_type.name': {value: null, matchMode: FilterMatchMode.STARTS_WITH},
                // 'representative': {value: null, matchMode: FilterMatchMode.IN},
                // 'status': {value: null, matchMode: FilterMatchMode.EQUALS},
                // 'verified': {value: null, matchMode: FilterMatchMode.EQUALS}
            },
            statuses: [
                'Activo', 'Inactivo', 'Pendiente', 'Observado', 'Rechazado', 'Liberado', 'Procesado'
            ],
            requestsBuy :[],
        }
    },

    methods :{
        showModalRequest(id){
           this.displayModalRequest = true;
            
                this.requestBuyFilter = this.requestsBuy.filter((item) => {
                    console.log('id', id);
                    return (item.id === id)
                })
               this.totalAmount =  this.requestBuyFilter[0].detail.map(item => item.price * item.amount).reduce((prev, curr) => prev + curr, 0);
        },
        getRequestBuy(){
            axios.get(`api/request_buy`).then((res) => {
                this.requestsBuy = res.data.data;
                console.log('data',res.data.data)
            })
        },
    },

    created(){
        this.getRequestBuy();
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
.btn-info{
    background: #36a3f7!important;
    border-color: #36a3f7!important;
}
.btn-sm {
    padding-left: 10px !important;
    padding-right: 12px !important;
    padding-top: 7px !important;
    padding-bottom: 5px !important;
}
.btn-success{
    background: #35cd3a!important;
    border-color: #35cd3a!important;
    color: white;
}
p{
    font-size: 12px;
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