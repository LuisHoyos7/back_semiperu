<template>
    <div>
        <div class="row">
            <div class="col-md-4">
                <label>Orden Compra:</label>
                    <input :value="this.orderBuyFilter[0].code" type="text" class="form-control sm" readonly/>
            </div>
            <div class="col-md-2" style="margin-right:100px;">
                <label>Año OC:</label>
                    <input :value="this.orderBuyFilter[0].year_order"  type="text" class="form-control sm" readonly/>
            </div> 
            <div class="col-md-1" style="margin-top:20px"  title="Orden de Compra">
                <button class="btn btn-danger btn-sm">
                    <i class="pi pi-file-pdf"></i>
                </button>
            </div>
            <div class="col-md-1" style="margin-top:20px">
                <button class="btn btn-danger btn-sm">
                    <i class="pi pi-file-pdf"></i>
                </button>
            </div>
            <div class="col-md-1" style="margin-top:20px" >
                <button class="btn btn-danger btn-sm">
                    <i class="pi pi-file-pdf"></i>
                </button>
            </div>
        </div>
        <div class="row"> 
            <div class="col-md-2">
                <div v-if="this.firmGtel.length === 0  && this.user.roles[0] === 'Manager' && this.orderBuyFilter[0].state_type.id !== 6  || this.firmGtel.length === 1 && this.firmGtel[0].action === 'O' && this.user.roles[0] === 'Manager'  && this.orderBuyFilter[0].state_type_id !== 6">
                    <p>G.T</p>
                    <button class="btn btn-success" @click="showModalFirm()">Firmar</button>
                </div>
                <div v-else-if="this.firmGtel.length === 1">
                    <div v-if="this.firmGtel[0].action === 'A'">
                        <p>G.T</p>
                        <button style="color:white" disabled class="btn btn-success"><i class="pi pi-check"></i></button>
                    </div>
                    <div v-else-if="this.firmGtel[0].action === 'R'">
                        <p>G.T</p>
                        <button style="color:white" disabled class="btn btn-danger"><i class="pi pi-times"></i></button>
                    </div>
                    <div v-else-if="this.firmGtel[0].action === 'O'">
                        <p>G.T</p>
                        <button style="color:white" disabled class="btn btn-warning"><i class="pi pi-info"></i></button>
                    </div>
                </div>
                <div v-else>
                    <p>G.T</p>
                    <button style="color:white" disabled class="btn btn-info"><i class="pi pi-circle-fill"></i></button>
                </div>
            </div>
            <div class="col-md-2">
                <div v-if="this.firmController.length === 0  && this.user.roles[0] === 'Controller'  && this.orderBuyFilter[0].state_type.id !== 6  || this.firmController.length === 1 && this.firmController[0].action === 'O' && this.user.roles[0] === 'Controller' && this.orderBuyFilter[0].state_type.id !== 6">
                    <p>Controller</p>
                    <button class="btn btn-success" @click="showModalFirm()">Firmar</button>
                </div>
                <div v-else-if="this.firmController.length === 1">
                    <div v-if="this.firmController[0].action === 'A'">
                        <p>Controller</p>
                        <button style="color:white" disabled class="btn btn-success"><i class="pi pi-check"></i></button>
                    </div>
                    <div v-else-if="this.firmController[0].action === 'R'">
                        <p>Controller</p>
                        <button style="color:white" disabled class="btn btn-danger"><i class="pi pi-times"></i></button>
                    </div>
                    <div v-else-if="this.firmController[0].action === 'O'">
                        <p>Controller</p>
                        <button style="color:white" disabled class="btn btn-warning"><i class="pi pi-info"></i></button>
                    </div>
                </div>
                <div v-else>
                    <p>Controller</p>
                    <button style="color:white" disabled class="btn btn-info"><i class="pi pi-circle-fill"></i></button>
                </div>
            </div> 
        </div>

        <div class="row" style="margin-top:50px;">
            <table class="table">
                <thead>
                    <th>Posición</th>
                    <th>Glosa</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Monto Item</th>
                </thead>
                <tbody v-for="(item,index) in this.orderBuyFilter[0].detail" :key="index">
                    <td>{{this.orderBuyFilter[0].id}}</td>
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
    </div>
</template>

<script>
export default {
    props : {
        orderBuyFilter : [],
        firmController : [],
        firmGtel       : [],
        user : {}
    },
    data(){
        return {
        
        }
    },

    methods : {
        showModalFirm(){
            this.$emit('showModalFirm');
        }
    }
}
</script>