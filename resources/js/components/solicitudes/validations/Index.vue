<template>
    <Toast/>
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
                <Column :sortable="true" field="id" header="N°" style="min-width:4rem">
                    <template #body="{data}">
                        {{data.id}}
                    </template>
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
                <Column :sortable="true" field="" header="Editar" style="min-width:4rem">
                    <template #body="{data}">
                        <a :href="`solicitud-compra/${data.id}`">
                            <i style="color:blue" class="pi pi-file-edit" ></i>
                        </a>
                    </template>
                </Column>
                 <!-- <Column :sortable="true" field="" header="Linea de Tiempo" dataType="boolean" style="min-width:4rem">
                    <template #body="{data}">
                        <a @click="showModalTimeLine(data.id)">
                            <i class="pi pi-sort-alt" ></i>
                        </a>
                    </template>
                </Column> -->
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
                        <div v-if="this.firmUser.length > 0">
                            <div v-if="this.firmUser.length === 0 && this.user.roles[0] === 'Project' || this.user.roles[0] === 'Project' && this.firmUser[0].action === 'O' && this.requestBuyFilter[0].state_type.id === 3 ">
                                <p>P.M</p>
                                <button class="btn btn-success" @click="showModalFirm()">Firmar</button>
                            </div>
                            <div v-else-if="this.firmUser[0].action === 'O'">
                                <p>P.M</p>
                                <button style="color:white" disabled class="btn btn-warning"><i class="pi pi-info"></i></button>
                            </div>
                            <div v-else-if="this.firmUser[0].action === 'A'">
                                <p>P.M</p>
                                <button disabled class="btn btn-success btn-sm"><i class="pi pi-check"></i></button>
                            </div>
                            <div v-else-if="this.firmUser[0].action === 'R'">
                                <p>P.M</p>
                                <button style="color:white" disabled class="btn btn-danger"><i class="pi pi-times"></i></button>
                            </div>
                            <div v-else>
                                <p>P.M</p>
                                <button style="color:white" disabled class="btn btn-info"><i class="pi pi-circle-fill"></i></button>
                            </div>
                        </div>
                        <div v-else>
                            <div v-if="this.firmUser.length === 0 && this.user.roles[0] === 'Project' || this.user.roles[0] === 'Project' && this.firmUser[0].action === 'O'">
                                <p>P.M</p>
                                <button class="btn btn-success" @click="showModalFirm()">Firmar</button>
                            </div>
                            <div v-else>
                                <p>P.M</p>
                                <button style="color:white" disabled class="btn btn-info"><i class="pi pi-circle-fill"></i></button>
                            </div>
                        </div>
                    </div>
          
                    <!-- <div class="col-md-2">
                        <p>G.R</p>
                        <div v-if="this.firmUser.length === 1 && this.user.roles[0] === 'Project'">
                            <button class="btn btn-success btn-sm"><i class="pi pi-check"></i></button>
                        </div>
                    </div> -->
                    <div class="col-md-2">
                        
                        <div v-if="this.firmUser.length > 0 && this.firmUser.length >= 2">
                            <div v-if="this.firmUser.length === 1 && this.user.roles[0] === 'Controller' && this.firmUser[0].action === 'A' && this.firmUser[1].action !== 'R'  ||  this.user.roles[0] === 'Manager' && this.firmUser[1].action === 'O' && this.requestBuyFilter[0].state_type.id === 3  ">
                                <p>CONTROLLER</p>
                                <button class="btn btn-success" @click="showModalFirm()">Firmar</button>
                            </div>
                            <div v-else-if="this.firmUser.length >= 2">
                                <div v-if="this.firmUser[1].action === 'O'">
                                    <p>CONTROLLER</p>
                                    <button style="color:white" disabled class="btn btn-warning"><i class="pi pi-info"></i></button>
                                </div>
                                <div v-else-if="this.firmUser[1].action === 'A'">
                                    <p>CONTROLLER</p>
                                    <button disabled class="btn btn-success btn-sm"><i class="pi pi-check"></i></button>
                                </div>
                                <div v-else-if="this.firmUser[1].action === 'R'">
                                    <p>CONTROLLER</p>
                                    <button disabled style="color:white" class="btn btn-danger"><i class="pi pi-times"></i></button>
                                </div>
                            </div>
                            <div v-else>
                                <p>CONTROLLER</p>
                                <button style="color:white" disabled class="btn btn-info"><i class="pi pi-circle-fill"></i></button>
                            </div>
                        </div>
                        <div v-else>
                            <div v-if="this.firmUser.length === 2 && this.user.roles[0] === 'Controller' && this.firmUser[0].action === 'A' ">
                                <p>CONTROLLER</p>
                                <button class="btn btn-success" @click="showModalFirm()">Firmar</button>
                            </div>
                            <div v-else>
                                <p>CONTROLLER</p>
                                <button style="color:white" disabled class="btn btn-info"><i class="pi pi-circle-fill"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        
                        <div v-if="this.firmUser.length > 0 && this.firmUser.length >= 3">
                            <div v-if="this.firmUser.length === 2 && this.user.roles[0] === 'Manager'  || this.user.roles[0] === 'Manager' && this.firmUser[2].action === 'O' && this.requestBuyFilter[0].state_type.id === 3 ">
                                <p>G.T</p>
                                <button class="btn btn-success" @click="showModalFirm()">Firmar</button>
                            </div>
                            <div v-else-if="this.firmUser.length >= 3">
                                <div v-if="this.firmUser[2].action === 'O'">
                                    <p>G.T</p>
                                    <button  style="color:white" disabled class="btn btn-warning"><i class="pi pi-info"></i></button>
                                </div>
                                <div v-else-if="this.firmUser[2].action === 'A'">
                                    <p>G.T</p>
                                    <button disabled class="btn btn-success btn-sm"><i class="pi pi-check"></i></button>
                                </div>
                                <div v-else-if="this.firmUser[2].action === 'R'">
                                    <p>G.T</p>
                                    <button style="color:white" disabled class="btn btn-danger"><i class="pi pi-times"></i></button>
                                </div>
                            </div>
                            <div v-else>
                                <p>G.T</p>
                                <button style="color:white" disabled class="btn btn-info"><i class="pi pi-circle-fill"></i></button>
                            </div>
                        </div>
                        <div v-else>
                            <div v-if="this.firmUser.length === 2 && this.user.roles[0] === 'Manager' && this.firmUser[1].action === 'A'">
                                <p>G.T</p>
                                <button class="btn btn-success" @click="showModalFirm()">Firmar</button>
                            </div>
                            <div v-else>
                                <p>G.T</p>
                                <button style="color:white" disabled class="btn btn-info"><i class="pi pi-circle-fill"></i></button>
                            </div>
                        </div>
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

        <Dialog header="Linea de tiempo de aprobaciones de la solicitud" v-model:visible="displayModalTimeLine" :breakpoints="{'960px': '75vw', '640px': '90vw'}" :style="{width: '50vw'}" :position="'top'" :modal="true">
               <Timeline :value="this.requestBuyFilter[0].history" align="alternate" class="customized-timeline mt-4">
                    <template #marker="slotProps">
                        <span class="custom-marker shadow-2" :style="{backgroundColor: slotProps.item.color}">
                            <!-- <i :class="slotProps.item.icon"></i> -->
                        </span>
                    </template>
                    <template #content="slotProps">
                        <Card>
                            <template #title>
                                {{slotProps.item.action}}
                            </template>
                            <template #subtitle>
                                {{slotProps.item.date}}
                            </template>
                            <template #content>
                                <img  width="200" class="shadow-2" />
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore sed consequuntur error repudiandae numquam deserunt
                                    quisquam repellat libero asperiores earum nam nobis, culpa ratione quam perferendis esse, cupiditate neque quas!</p>
                            </template>
                        </Card>
                    </template>
                </Timeline>
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
                <button @click="changeStatus(this.requestBuyFilter[0].id)" style="margin-top:10px" class="btn btn-success">Firmar</button>
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
            events1: [
                {status: 'Ordered', date: '15/10/2020 10:30', icon: 'pi pi-shopping-cart', color: '#9C27B0', image: 'game-controller.jpg'},
                {status: 'Processing', date: '15/10/2020 14:00', icon: 'pi pi-cog', color: '#673AB7'},
                {status: 'Shipped', date: '15/10/2020 16:15', icon: 'pi pi-shopping-cart', color: '#FF9800'},
                {status: 'Delivered', date: '16/10/2020 10:00', icon: 'pi pi-check', color: '#607D8B'}
            ],
            events2: [
                "2020", "2021", "2022", "2023"
            ],
            displayModalRequest: false,
            displayModalTimeLine : false,
            displayModalFirm : false,
            requestBuyFilter : [],
            requestsBuy :[],
            totalAmount :0,
            firms :[],
            firm : null,
            Comment: null,
            user : {},
            firmUser : [],
            history : [],
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

            status: [
                'Aprobar', 'Rechazar'
            ],
        }
    },

    methods :{
        showModalRequest(id){
           this.displayModalRequest = true;
            
                this.requestBuyFilter = this.requestsBuy.filter((item) => {
                    return (item.id === id)
                })
                console.log('this.requestBuyFilter',this.requestBuyFilter);

                if(this.requestBuyFilter[0].firms !== null ){
                    this.firmUser = this.requestBuyFilter[0].firms.filter((item) => {
                        return (item.user_id === this.user.id)
                    })
                }
                console.log('firmUser',this.firmUser);

               this.items = this.requestBuyFilter[0].history
               this.totalAmount =  this.requestBuyFilter[0].detail.map(item => item.price * item.amount).reduce((prev, curr) => prev + curr, 0);
        },
        showModalTimeLine(id){
            this.requestBuyFilter = this.requestsBuy.filter((item) => {
                    console.log('id', id);
                    return (item.id === id)
                })
            this.displayModalTimeLine = true;
        },
        getRequestBuy(){
            axios.get(`api/request_buy`).then((res) => {
                this.requestsBuy = res.data.data;
            })
        },
        getUser(){
            axios.get(`api/user`).then((res)=>{
                this.user = res.data
                console.log('user',this.user)
            });
        },
        showModalFirm(){
            this.displayModalFirm = true;
        },
        changeStatus(id){

            this.history = this.requestBuyFilter[0].history;
                if(this.history  === null ){
                    this.history = [];
                }
            this.history.push({
                    user_id : this.user.id,
                    role    : this.user.roles[0],
                    action  : this.firm,
                    date    : new Date(),
                    state_type_id : 1 // lo torame como aprobado 
                });
            
            this.firms = this.requestBuyFilter[0].firms;
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
            console.log('updatedFirms',updatedFirms);
     
            this.firms.push({
                    user_id : this.user.id,
                    role    : this.user.roles[0],
                    action  : this.firm,
                    date    : new Date(),
                    state_type_id : 1 // lo torame como aprobado 
                });

            if(this.firm){
                axios.post(`api/request_buy/change_status/${id}`,{history : this.history, firms : this.firms , firm : this.firm, updatedFirms : updatedFirms}).then((res) => {
                    this.$toast.add({severity:'success', summary:'En hora buena', detail: 'El estado se cambio de forma correcta'});
                });
            }
            this.firm = null
            this.displayModalFirm = false;
            this.displayModalRequest = false;
        }
    },

    created(){
        this.getUser();
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

.custom-marker {
    display: flex;
    width: 2rem;
    height: 2rem;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    border-radius: 50%;
    z-index: 1;
}

::v-deep(.p-timeline-event-content),
::v-deep(.p-timeline-event-opposite) {
    line-height: 1;
}

@media screen and (max-width: 960px) {
    ::v-deep(.customized-timeline) {
            .p-timeline-event:nth-child(even) {
                flex-direction: row !important;
                
                .p-timeline-event-content {
                    text-align: left !important;
                }
            }

            .p-timeline-event-opposite {
                flex: 0;
            }

            .p-card {
                margin-top: 1rem;
            }
        }
}
</style>

