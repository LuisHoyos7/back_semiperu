<template>
    <div>
        <Toast/>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div style="font-size:22px"><b>Crear Orden de compra</b></div>
                        <div class="notificacion-type status-badge mb-2">
                            <span class="badge bg-info">Pendiente</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Glosa/ Descripción (*):</label>
                                    <input      class="form-control" v-model="this.description">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Posición:</label>
                                    <input     class="form-control" v-model="this.position">
                                </div>
                            </div>
                            <div class="col-md-2">
                                 <div class="form-group">
                                    <label>Cantidad:</label>
                                    <input    class="form-control" v-model="this.amount">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Precio Unitario(*):</label>
                                    <input    class="form-control" v-model="this.price">
                                </div>
                            </div>
                            <div class="col-md-1" style="margin-bottom: 15px">
                                <div class="form-group">
                                    <label></label>
                                    <button @click="addItem()" class="btn btn-success">Agregar</button>
                                </div>
                            </div>
                            <hr>
                            <div class="table-responsive"> 
                            <table v-if="this.items.length > 0" class="table text-center" style="margin-top:20px;">
                                <thead>
                                    <th>Glosa</th>
                                    <th>Posición</th>
                                    <th>Cantidad</th>
                                    <th>Precio U.</th>
                                    <th>Monto</th>
                                    <th>Acción</th>
                                </thead>
                                <tbody v-for="(item, index) in items" :key="index">
                                    <tr :id="index">
                                        <td><div class="col-md-3">
                                            <input @keyup="searchTimeOut(item.position, index)" style="width:400px;" class="form-control" :value="item.description"/>
                                        </div></td>
                                         <td><div class="col-md-1">
                                            <input readonly @keyup="searchTimeOut(item.position,index)" style="width:80px;" class="form-control" :value="item.position"/>
                                        </div></td>
                                        <td><div class="col-md-2">
                                            <input @keyup="searchTimeOut(item.position, index)" style="width:80px;" class="form-control" :value="item.amount"/>
                                        </div></td>
                                        <td style="width:100px;"><div class="col-md-2">
                                            <input @keyup="searchTimeOut(item.position,index)" class="form-control" style="width:80px;" :value="item.price"/>
                                        </div></td>
                                        <td><div class="col-md-2">
                                            <input readonly  style="width:100px;" class="form-control" :value="item.total"/>
                                        </div></td>
                                        <td>
                                            <a @click="deleteItem(index)">
                                                <i title="Eliminar" style="color:red; margin-top:14px; width:80px;" class="pi pi-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                            <div v-if="this.items.length > 0" style="margin-top:20px; margin-bottom:20px;">
                                <button class="btn btn-success"  @click="showModalDetailOrder">Generar</button>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
       </div>
       
       <Dialog header="Datos adicionales orden de compra" v-model:visible="displayModalDetailOrder" :breakpoints="{'960px': '75vw', '640px': '90vw'}" :style="{width: '40vw'}" :position="'top'" :modal="true">
            <div class="row" style="margin-top:20px">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Solicitud de Compra:</label>
                        <select  @change="getProject"   class="form-control form-select" v-model="form.request_buy">
                            <option :value="null" disabled hidden>[ SELECCIONE ]</option>
                            <option  v-for="item in requestsBuy" :key="item.id" :value="item.id">{{ item.name }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <label for=""> Año OC:</label>
                    <input v-model="form.year_oc" placeholder="- -" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for=""> Fecha OC:</label>
                    <input v-model="form.date_oc" type="date" class="form-control">
                </div>
            </div>
            <div class="row" style="margin-top:20px">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Moneda: </label>
                        <select class="form-control form-control-sm"  v-model="form.currency">
                            <option :value="null" disabled hidden>[ SELECCIONE ]</option>
                            <option value="PEN">PEN</option>
                            <option value="USD">USD</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-8">
                    <label for="">Adjuntar Archivos:</label>
                    <input type="file" readonly  @change="onFileSelected" name="myfile" class="form-control form-control-sm">
                </div>
            </div>

            <div class="row" style="margin-top:30px">
                <p>Versión requerida (*) PDF 1.4  , en caso de no tener la versión compatible.
                    Convertir PDF en el siguiente enlace:  http://docupub.com/
                    Archivos Adjuntos:
                </p>
            </div><hr>
            <div class="row text-center" style="margin-top:20px">
                <div class="btn-group col-offset-6 col-md-2 text-center">
                    <button class="btn btn-secondary" style="color:white">Cerrar</button>
                    <button class="btn btn-info" style="color:white">Guardar</button>
                </div>
            </div>
       </Dialog>
    </div>
</template>

<script>


import  Form from '../solicitudes/steps/Form'
import  Confirmation from '../solicitudes/steps/Confirmation'
import  Save from '../solicitudes/steps/Save'

export default {
    components : {
        Form,
        Confirmation,
        Save
    },
    data() {
        return {
            items:[],
            requestsBuy : [],
            description : null,
            position : null,
            amount : null,
            displayModalDetailOrder: null,
            price : null,
            form : {},
            data :[],
            projects :  [],
            subObras :  [],
            users    :  [],
            firstname: '',
            lastname: '',
            age: null,
            submitted: false,
            validationErrors: {},
            form:{
                file : null,
                year_oc: null,
                date_oc:null,
                request_buy:null,
                currency : null
            },   
            formObject : {},
        }   
    },
    methods:{    
        
       async showModalDetailOrder(){
            this.displayModalDetailOrder = true;
            const res = await axios.get('api/request_buy')
            this.requestsBuy = res.data.data
        },

        onFileSelected(event){
            const file = event.target.files[0];
            console.log('formData',file)
            const formData = new FormData();
            formData.append("my-file", file);
            
        },

        addItem(){
            if(this.description === null  || this.price === null || this.amount === null || this.position === null){
                this.$toast.add({severity:'error', summary: 'Opsss', detail:'Te faltan algunos campos!', life: 3000});
            }else{
                const sub_work_name  = this.subObras.filter((item) => {
                    return (item.id === this.form.subObra)
                })
                this.items.push({description : this.description, position : this.position , amount: this.amount, price:this.price, total : this.amount * this.price });
            }
        },
        saveData(){
            axios.post("api/order_buy",  {detail : this.items, request_buy_id : 1, state_type_id : 1, code: 1, name: 'name'}).then((res)=>{
                  this.$toast.add({severity:'success', summary: 'Genial', detail:'Se ha guardo el registro con exito!', life: 3000});
            })

            this.clearForm();
        },
        clearForm(){
            this.items = [];
            this.description = null;
            this.price = null;
            this.amount = null;
            this.position = null;
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
                ? { ...p, description: data[0], position : data[1], amount : data[2], price : data[2], total : data[2] * data[3]  }
                : p
            );
        
            this.items = updatedItems;
            console.log('items update', this.items)

            this.$toast.add({severity:'info', summary: 'Genial', detail:'Se ha actualizado el registro con exito!', life: 3000});
            }, 800);
        },
    },
    mounted(){

    }
}
</script>

<style scoped lang="scss">

.btn-success {
    background: #35cd3a!important;
    border-color: #35cd3a!important;
    color:white !important;
}

.card {
    margin-bottom: 2rem;
}

</style>
