<template>
    <div>  
      <div class="card">           
            <DataTable :value="acts" :paginator="true"  :rows="10"
                dataKey="id" v-model:filters="filters2" class="p-datatable-sm" filterDisplay="row"  responsiveLayout="scroll"
                :globalFilterFields="['id']">
                <template #header>
                    <div class="row">
                        <div class="col">
                            <h5 class="">Comprobantes</h5>
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
                    No hay comprobantes por listar.
                </template>
                <!-- <template #loading>
                    Loading customers data. Please wait.
                </template> -->
                <Column field="id" header="N°" style="min-width:2rem">
                    <template #body="{data}">
                        {{1}}
                    </template>
                </Column> 
                 <Column header="N° Serie" filterField="cod" style="min-width:5rem">
                    <template #body="{data}">
                        <span class="image-text">{{data.voucher[0].serie}}</span>
                    </template>
                    <!-- <template #filter="{filterModel,filterCallback}">
                        <InputText type="text" v-model="filterModel.value" @input="filterCallback()" class="p-column-filter" placeholder="Buscar..."/>
                    </template> -->
                </Column>
                <Column header="Tipo"  :showFilterMenu="false" style="min-width:5rem">
                    <template #body="{data}">
                        <span class="image-text">{{data.voucher[0].voucher_type_id}}</span>
                    </template>
                </Column>
                <!-- <Column field="created_at" header="Nro Proyecto" :showFilterMenu="false" style="min-width:12rem">
                    <template #body="{data}">
                        <span :class="'customer-badge status-' + data.created_at">{{data.created_at}}</span>
                    </template>
                </Column> -->
                <Column field="created_at" header="Moneda" dataType="boolean" style="min-width:5rem">
                    <template #body="{data}">
                        <span>{{"Soles"}}</span>
                    </template>
                </Column> 
                <Column field="" header="Importe" dataType="boolean" style="min-width:4rem">
                  <template #body="{data}">
                        <span>
                            {{data.sumOrderBuyId * (data.detail.map(item => item.amount).reduce((prev, curr) => (prev + curr), 0) / data.detail.length)}}
                        </span>
                    </template>
                </Column>  
                <Column field="" header="% Detracción"  style="min-width:4rem">
                    <template #body="{data}">
                            {{(data.voucher[0].detraction * 100)  }} %
                    </template>
                </Column> 
                <Column field="created_at" header="Fecha Liberación" style="min-width:3rem">
                    <template #body="{data}">
                        <span>
                            {{data.voucher[0].date_issue}} 
                        </span>
                    </template>
                    <template #filter="{filterModel,filterCallback}">
                        <InputText type="date" v-model="filterModel.value" @input="filterCallback()" class="p-column-filter" placeholder="Buscar..."/>
                    </template>
                </Column> 
                <Column field="code" header="N° Acta" dataType="boolean" style="min-width:7rem">
                    <template #body="{data}">
                        {{data.code}} 
                    </template>
                    <template #filter="{filterModel,filterCallback}">
                        <InputText type="text" v-model="filterModel.value" @input="filterCallback()" class="p-column-filter" placeholder="Buscar..."/>
                    </template>
                </Column> 
                <Column field="order_buy.code" header="OC" dataType="boolean" style="min-width:6rem">
                    <template #body="{data}">
                        {{data.order_buy.code}}
                    </template>
                     <template #filter="{filterModel,filterCallback}">
                        <InputText type="text" v-model="filterModel.value" @input="filterCallback()" class="p-column-filter" placeholder="Buscar..."/>
                    </template>
                </Column> 
                <Column field="created_at" header="Estado Comprobante" dataType="boolean" style="min-width:6rem">
                    <template #body="{data}">
                        {{data.voucher[0].state_type_id}}
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
                <Column field="" header="Ver" dataType="boolean" style="min-width:6rem">
                    <template #body>
                        <a @click="showModalOrder">
                            <i class="pi pi-eye" ></i>
                        </a>
                    </template>
                </Column> 
            </DataTable>
        </div>

        <Dialog header="Header" v-model:visible="displayModalAct" :breakpoints="{'960px': '75vw', '640px': '90vw'}" :style="{width: '50vw'}">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <template #footer>
                <Button label="No" icon="pi pi-times" @click="closeBasic" class="p-button-text"/>
                <Button label="Yes" icon="pi pi-check" @click="closeBasic" autofocus />
            </template>
        </Dialog>
    </div>
</template>

<script> 
import {FilterMatchMode,FilterOperator} from 'primevue/api';
export default {
    data() {
        return {
            displayModalAct: false,
            filters2: {
                'global': {value: null, matchMode: FilterMatchMode.CONTAINS},
                'code': {value: null, matchMode: FilterMatchMode.STARTS_WITH},
                'created_at': {value: null, matchMode: FilterMatchMode.STARTS_WITH},
                'order_buy.code': {value: null, matchMode: FilterMatchMode.STARTS_WITH},
                // 'representative': {value: null, matchMode: FilterMatchMode.IN},
                // 'status': {value: null, matchMode: FilterMatchMode.EQUALS},
                // 'verified': {value: null, matchMode: FilterMatchMode.EQUALS}
            },
            statuses: [
                'Activo', 'Inactivo', 'Pendiente', 'Observado', 'Rechazado', 'Liberado', 'Procesado'
            ],
            acts :[],
        }
    },

    methods :{
        showModalOrder(){
            displayModalAct = true;
        },
        getActs(){
            axios.get(`api/acts`).then((res) => {
                this.acts = res.data.data;
                console.log('acts',res.data.data)
            })
        },
    },
 
    created(){
        this.getActs();
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