<template>
    <div>
      <div class="card">
            <h5 class="m-4">Ordenes de compra</h5>
           
            <DataTable :value="ordersBuy" :paginator="true"  :rows="10"
                dataKey="id" v-model:filters="filters2" filterDisplay="row"  responsiveLayout="scroll"
                :globalFilterFields="['id','tipoEstado_id','cod','nombre', 'created_at']">
                <template #header>
                    <div class="flex justify-content-end">
                        <span class="p-input-icon-left ">
                            <i class="pi pi-search" />
                            <InputText v-model="filters2['global'].value" placeholder="Buscar en toda la tabla..." />
                        </span>
                    </div>
                </template>
                <template #empty>
                    No hay ordenes de compras por listar.
                </template>
                <!-- <template #loading>
                    Loading customers data. Please wait.
                </template> -->
                <Column field="id" header="N°" style="min-width:12rem">
                    <template #body="{data}">
                        {{data.id}}
                    </template>
                    <template #filter="{filterModel,filterCallback}">
                        <InputText type="text" v-model="filterModel.value" @input="filterCallback()" class="p-column-filter" placeholder="Buscar..."/>
                    </template>
                </Column> 
                 <Column header="Monto OC" filterField="cod" style="min-width:12rem">
                    <template #body="{data}">
                        <span class="image-text">{{data.cod}}</span>
                    </template>
                    <template #filter="{filterModel,filterCallback}">
                        <InputText type="text" v-model="filterModel.value" @input="filterCallback()" class="p-column-filter" placeholder="Buscar..."/>
                    </template>
                </Column>
                <Column header="Orden Compra"  :showFilterMenu="false" style="min-width:14rem">
                    <template #body="{data}">
                        <span class="image-text">{{data.nombre}}</span>
                    </template>
                    <!-- <template #filter="{filterModel,filterCallback}">
                        <MultiSelect v-model="filterModel.value" @change="filterCallback()" :options="representatives" optionLabel="name" placeholder="Any" class="p-column-filter">
                            <template #option="slotProps">
                                <div class="p-multiselect-representative-option">
                                    <img :alt="slotProps.option.name" src="https://www.primefaces.org/wp-content/uploads/2020/05/placeholder.png" width="32" style="vertical-align: middle" />
                                    <span class="image-text">{{slotProps.option.name}}</span>
                                </div>
                            </template>
                        </MultiSelect>
                    </template> -->
                </Column>
                <Column field="created_at" header="Fecha OC" :showFilterMenu="false" style="min-width:12rem">
                    <template #body="{data}">
                        <span :class="'customer-badge status-' + data.created_at">{{data.created_at}}</span>
                    </template>
                </Column>
                <Column field="tipoEstado_id" header="Estado OC" dataType="boolean" style="min-width:6rem">
                    <template #body="{data}">
                        <span>{{data.tipoEstado_id}}</span>
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
    </div>
</template>

<script>
import {FilterMatchMode,FilterOperator} from 'primevue/api';
export default {
    data() {
        return {
            filters2: {
                'global': {value: null, matchMode: FilterMatchMode.CONTAINS},
                'id': {value: null, matchMode: FilterMatchMode.STARTS_WITH},
                'cod': {value: null, matchMode: FilterMatchMode.STARTS_WITH},
                // 'representative': {value: null, matchMode: FilterMatchMode.IN},
                // 'status': {value: null, matchMode: FilterMatchMode.EQUALS},
                // 'verified': {value: null, matchMode: FilterMatchMode.EQUALS}
            },

            ordersBuy :[],
        }
    },

    methods :{
        showModalOrder(){
            alert(this.modal);
        },
        getOrderBuy(){
            axios.get(`api/order_buy`).then((res) => {
                this.ordersBuy = res.data.data;
                console.log('data',res.data.data)
            })
        },
    },

    created(){
        this.getOrderBuy();
    }
}
</script>

<style lang="scss">

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