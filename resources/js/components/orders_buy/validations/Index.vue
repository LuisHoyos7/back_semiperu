<template>
    <div>
      <div class="card" style="margin-rigth:10px">
            <DataTable 
                :value="ordersBuy" 
                :paginator="true"  
                :rows="10" class="p-datatable-sm"
                dataKey="id" 
                v-model:filters="filters2" 
                filterDisplay="row"  
                responsiveLayout="scroll"
                :globalFilterFields="['id','name','created_at']">
                <template #header>
                    <div class="row">
                        <div class="col">
                            <h5 class="">Lista de ordenes de compra</h5>
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
                    No hay ordenes de compras por listar.
                </template>
                <Column :sortable="true" field="id" header="N°" style="min-width:4rem">
                    <template #body="{data}">
                        {{data.id}}
                    </template>
                </Column> 
                <Column :sortable="true" header="Monto OC" filterField="cod" style="min-width:10rem">
                    <template #body="{data}">
                        <span class="image-text">{{data.detail.map(item => item.price * item.amount).reduce((prev, curr) => prev + curr, 0)}}</span>
                    </template>
                </Column>
                <Column :sortable="true" field="code" header="Orden Compra"  style="min-width:12rem">
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
                <Column :sortable="true" field="state_type.name" header="Estado OC" dataType="boolean" style="min-width:6rem">
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
                        <a @click="showModalOrder(data.id)">
                            <i class="pi pi-eye" ></i>
                        </a>
                    </template>
                </Column> 
            </DataTable>
        </div>
        <Dialog header="Ver orden de compra" v-model:visible="displayModalOrder" :breakpoints="{'960px': '75vw', '640px': '90vw'}" :style="{width: '50vw'}" :position="'top'" :modal="true">
            <ModalDetailOrderBuy @showModalFirm="showModalFirm" :user="this.user" :firmController="this.firmController" :firmGtel="this.firmGtel" :orderBuyFilter="this.orderBuyFilter" > </ModalDetailOrderBuy>
        </Dialog>

        <Dialog header="Firmar Solicitud de Compras" v-model:visible="displayModalFirm" :breakpoints="{'960px': '75vw', '640px': '90vw'}" :style="{width: '30vw'}" :position="'top'" :modal="true">
            <div class="row">
                <select class="form-control" v-model="firm" style="margin-bottom:10px">
                    <option :value="null" disabled hidden>[ SELECCIONE ]</option>
                    <option value="A">Aprobar</option>
                    <option value="O">Observar</option>
                    <option value="R">Rechazar</option>
                </select>
                <textarea rows="4" placeholder="Escriba un comentario" class="form-control"  v-model="comment">

                </textarea>
                <button @click="changeStatus(this.orderBuyFilter[0].id)" style="margin-top:10px" class="btn btn-success">Firmar</button>
            </div>
        </Dialog>
    </div>
</template>

<script>
import {FilterMatchMode,FilterOperator} from 'primevue/api';
import ModalDetailOrderBuy from '../ModalDetail.vue'
export default {
    components : {
        ModalDetailOrderBuy
    },
    data() {
        return {
            displayModalOrder: false,
            orderBuyFilter : [],
            totalAmount :0,
            displayModalFirm : false,
            comment : null,
            firms :[],
            firm : null,
            firmGtel :[],
            history : [],
            firmController : [],
            filters2: {
                'global': {value: null, matchMode: FilterMatchMode.CONTAINS},
                'id': {value: null, matchMode: FilterMatchMode.STARTS_WITH},
                'code': {value: null, matchMode: FilterMatchMode.STARTS_WITH},
                'created_at': {value: null, matchMode: FilterMatchMode.STARTS_WITH},
                'state_type.name': {value: null, matchMode: FilterMatchMode.STARTS_WITH},
            },
            statuses: [
                'Activo', 'Inactivo', 'Pendiente', 'Observado', 'Rechazado', 'Liberado', 'Procesado'
            ],
            ordersBuy :[],
            user :{},
        }
    },

    methods :{
        showModalOrder(id){
            this.displayModalOrder = true;
            
            this.orderBuyFilter = this.ordersBuy.filter((item) => {
                return (item.id === id)
            })

            this.totalAmount =  this.orderBuyFilter[0].detail.map(item => item.price * item.amount).reduce((prev, curr) => prev + curr, 0);

            this.firmGtel = this.orderBuyFilter[0].firms.filter((item) => {
                return (item.role === 'Manager')
            })

            this.firmController = this.orderBuyFilter[0].firms.filter((item) => {
                return (item.role === 'Controller')
            })
        },

        changeStatus(id){

            this.history = this.orderBuyFilter[0].history;
                if(this.history  === null ){
                    this.history = [];
                }

            var color = "";
            var icon  = "";

            if(this.firm === 'A'){
                color = "#198754";
                icon  = "pi pi-check"

            }else if( this.firm === 'O'){
                color = "#6c757d";
                icon  =  "pi pi-info";
            }else{
                color = "#dc3545"
                icon  =  "pi pi-times";
            }

            this.history.push({
                icon : icon,
                color : color,
                user_id : this.user.id,
                full_name : this.user.name,
                role    : this.user.roles[0],
                action  : this.firm,
                date    : new Date(),
                state_type_id : 1 // lo torame como aprobado 
            });
            
            this.firms = this.orderBuyFilter[0].firms;
                if(this.firms  === null ){
                    this.firms = [];
                }

            var updatedFirms = []
           
            if(this.firms  != null){
                updatedFirms = this.firms.map(p =>
                    p.user_id === this.user.id && p.action === 'O'
                
                        ? { ...p, user_id: this.user.id, role : this.user.roles[0], action : this.firm, date    : new Date(), state_type_id : 0 ,}
                        : p
                
                    );
            }
     
            this.firms.push({
                user_id : this.user.id,
                role    : this.user.roles[0],
                action  : this.firm,
                date    : new Date(),
                state_type_id : 1 // lo torame como aprobado 
            });

            if(this.firm){
                axios.post(`api/order_buy/change_status/${id}`,{history : this.history, firms : this.firms , firm : this.firm, updatedFirms : updatedFirms}).then((res) => {
                    this.$toast.add({severity:'success', summary:'En hora buena', detail: 'El estado se cambio de forma correcta'});
                });
            }

            this.firm = null
            this.displayModalFirm = false;
            this.displayModalOrder = false;
        },

        showModalFirm(){
            this.displayModalFirm = true;
        },

        getUser(){
            axios.get(`api/user`).then((res)=>{
                this.user = res.data
            });
        },

        getOrderBuy(){
            axios.get(`api/order_buy`).then((res) => {
                this.ordersBuy = res.data.data;
            })
        },
    },
    
    created(){
        this.getUser();
        this.getOrderBuy();
    }
}
</script>

<style lang="scss">

.p-inputtext {
 padding: 0rem 0.5rem;
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