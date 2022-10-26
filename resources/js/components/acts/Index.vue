<template>
    <div>
      <div class="card">
            <h5 class="m-4">Actas de conformidad</h5>
           
            <DataTable :value="acts" :paginator="true"  :rows="10"
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
                    No hay actas por listar.
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
                 <Column header="Nro. Acta" filterField="cod" style="min-width:12rem">
                    <template #body="{data}">
                        <span class="image-text">{{data.code}}</span>
                    </template>
                    <template #filter="{filterModel,filterCallback}">
                        <InputText type="text" v-model="filterModel.value" @input="filterCallback()" class="p-column-filter" placeholder="Buscar..."/>
                    </template>
                </Column>
                <Column header="Orden Compra"  :showFilterMenu="false" style="min-width:14rem">
                    <template #body="{data}">
                        <span class="image-text">{{data.name}}</span>
                    </template>
                </Column>
                <Column field="created_at" header="Nro Proyecto" :showFilterMenu="false" style="min-width:12rem">
                    <template #body="{data}">
                        <span :class="'customer-badge status-' + data.created_at">{{data.created_at}}</span>
                    </template>
                </Column>
                <Column field="tipoEstado_id" header="Fecha Aprobacion" dataType="boolean" style="min-width:6rem">
                    <template #body="{data}">
                        <span>{{data.state_type_id}}</span>
                    </template>
                </Column> 
                <Column field="" header="Total Acta" dataType="boolean" style="min-width:6rem">
                 
                </Column> 
                <Column field="" header="% O.C" dataType="boolean" style="min-width:6rem">
                    
                </Column> 
                <Column field="" header="Historial % Acta" dataType="boolean" style="min-width:6rem">
                 
                </Column> 
                <Column field="" header="Estado Acta" dataType="boolean" style="min-width:6rem">
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