
<template>
        <Toast />
        <Toast position="bottom-center" group="bc">
            <template #message="slotProps">
                <div class="flex flex-column">
                    <div class="text-center">
                        <i class="pi pi-exclamation-triangle" style="font-size: 3rem"></i>
                        <h4>{{slotProps.message.summary}}</h4>
                        <p>{{slotProps.message.detail}}</p>
                    </div>
                    <div class="grid p-fluid">
                        <div class="col-6">
                            <Button class="p-button-success" label="Yes" @click="onConfirm"></Button>
                        </div>
                        <div class="col-6">
                            <Button class="p-button-secondary" label="No" @click="onReject"></Button>
                        </div>
                    </div>
                </div>
            </template>
        </Toast>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div><h4>Guardar Información</h4></div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Glosa/ Descripción (*):</label>
                                <input    name="direccion1"  class="form-control" v-model="this.description">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Posición (*):</label>
                                <input   name="direccion1"  class="form-control" v-model="this.position">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Cantidad (*):</label>
                                <input  name="direccion1"  class="form-control" v-model="this.amount">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Precio Unitario(*):</label>
                                <input  name="direccion1"  class="form-control" v-model="this.price">
                            </div>
                        </div>
                        <div class="col-md-1" style="margin-bottom: 15px">
                            <div class="form-group">
                                <label></label>
                                <button @click="addItem()" class="btn btn-success" style="color:white">Agregar</button>
                            </div>
                        </div>
                        <hr>
                        <table class="table" style="margin-top:30px;">
                            <thead class="table-light">
                                <th>Glosa</th>
                                <th>Posición</th>
                                <th>Cantidad</th>
                                <th>Precio U.</th>
                                <th>Monto OC</th>
                                <th>Acción</th>
                            </thead>
                            <tbody v-for="(item, index) in items" :key="index">
                                <tr :id="index">
                                    <td><div class="col-md-3">
                                        <input @keyup="searchTimeOut(item.position, index)" style="width:300px;" class="form-control" :value="item.description"/>
                                    </div></td>
                                    <td><div class="col-md-2">
                                        <input readonly @keyup="searchTimeOut(item.position,index)" style="width:100px;" class="form-control" :value="item.position"/>
                                    </div></td>
                                    <td><div class="col-md-2">
                                        <input @keyup="searchTimeOut(item.position, index)" style="width:100px;" class="form-control" :value="item.amount"/>
                                    </div></td>
                                    <td style="width:100px;"><div class="col-md-2">
                                        <input @keyup="searchTimeOut(item.position,index)" class="form-control" style="width:100px;" :value="item.price"/>
                                    </div></td>
                                    <td><div class="col-md-2">
                                        <input readonly  style="width:100px;" class="form-control" :value="item.total"/>
                                    </div></td>
                                    <td>
                                        <a @click="deleteItem(index)">
                                            <i title="Eliminar" style="color:red; margin-top:14px;" class="pi pi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="grid grid-nogutter justify-content-between btn btn-sm" style="margin-top:20px; margin-bottom:20px;">
                    <Button class="btn-sm" label="Anterior" @click="prevPage()" icon="pi pi-angle-left" />
                    <Button class="btn-sm btn-success" style="margin-left:20px;" label="Guardar" @click="saveData()"/>
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
            items:[],
            description : null,
            position : null,
            amount : null,
            price : null,
            form : {},
            data :[],
        }
    },
    methods: {
        addItem(){
            this.items.push({description : this.description, position : this.position , amount: this.amount, price:this.price, sub_work_id :this.form.sub_obra, total : this.amount * this.price });
            console.log('items', this.items);
        },
        saveData(){
            axios.post("api/request_buy",  {detail : this.items , company_id : this.form.client, user_id :this.form.user , currency_type_id : 1 , state_type_id : 1 , code : "SC01", name : "Solicitud compra"}).then((res)=>{
                  this.$toast.add({severity:'success', summary: 'Genial', detail:'Se ha guardo el registro con exito!', life: 3000});
            })
            location.reload();
        },
        deleteItem(index_id){
            this.items.splice(index_id, 1);
            this.$toast.add({severity:'error', summary: 'Genial', detail:'Se ha eliminado el registro con exito!', life: 3000});
        },
        searchTimeOut(position, index) {  
            if (this.timer) {
                clearTimeout(this.timer);
                this.timer = null;
            }
            this.timer = setTimeout(() => {
                this.editItem(position, index);
            }, 800);
        },
        editItem(position, index){
         
         setTimeout(() => {
            let table = document.getElementById(index);
            let fila = table.getElementsByTagName("input")
       
            var data = [];
            for (let i=0; i<=4; i++) {
	            data.push(fila[i].value);
            }

            console.log('data',data);

            const updatedItems = this.items.map(p =>
             p.position === position
                ? { ...p, description: data[0], position : data[1], amount : data[2], price : data[3], total : data[2] * data[3]  }
                : p
            );
        
            this.items = updatedItems;
            console.log('items update', this.items)

            this.$toast.add({severity:'info', summary: 'Genial', detail:'Se ha actualizado el registro con exito!', life: 3000});
            }, 800);
        },
        nextPage() {
            this.$emit('nextPage', {formData: {class: this.selectedClass.name, vagon: this.selectedVagon.vagon, seat: this.selectedSeat.seat}, pageIndex: 2});
        },
        prevPage() {
            this.$emit('prevPage', {pageIndex: 2});
        },
    },

    created(){
        this.form = this.$props.formData;
        console.log('form',this.form);
    }
}
</script>

<style scoped>
td{
    border-style: none !important;
}
.btn-success{
    background: #35cd3a!important;
    border-color: #35cd3a!important;
    color: white;
}
</style>
