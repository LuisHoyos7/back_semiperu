

<template>
    <div>
        <Toast/>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div style="font-size:22px"><b>Editar Requeriemiento</b></div>
                        <div class="notificacion-type status-badge mb-2">
                            <span class="badge bg-info">Pendiente</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Cliente:</label>
                                    <select  @change="getProject"   class="form-control form-select" v-model="form.client">
                                        <option :value="null" disabled hidden>[ SELECCIONE ]</option>
                                        <option  v-for="item in clients" :key="item.id" :value="item.id">{{ item.name }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Proyecto:</label>
                                    <select  @change="getSubObra"    class="form-control form-select" v-model="form.project">
                                        <option :value="null" disabled hidden>[ SELECCIONE ]</option>
                                        <option v-for="item in projects" :key="item.id" :value="item.id">{{ item.name }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Proveedor:</label>
                                    <select    class="form-control form-select" v-model="form.proveedor">
                                        <option :value="null" disabled hidden>[ SELECCIONE ]</option>
                                        <option  v-for="item in clients" :key="item.id" :value="item.id">{{ item.name }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Moneda: </label>
                                    <select class="form-control form-control-sm" name="monedaForm" id="monedaForm" v-model="form.currency">
                                        <option :value="null" disabled hidden>[ SELECCIONE ]</option>
                                        <option value="Soles">SOLES</option>
                                        <option value="Dolares">DOLARES</option>
                                        <option value="Euros">EUROS</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Solicitante:</label>
                                    <select     class="form-control form-select" v-model="form.user">
                                        <option :value="null" disabled hidden>[ SELECCIONE ]</option>
                                        <option  v-for="item in users" :key="item.id" :value="item.id">{{ item.name }}</option>
                                    </select>
                                </div>
                            </div>
                        </div><hr><br>
                        <div class="card-header" style="margin-bottom:20px">
                            <div style="font-size:20px;"><b>Agregar Detalles</b></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Glosa/ Descripción (*):</label>
                                    <input      class="form-control" v-model="this.description">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Sub Obra:</label>
                                    <select    class="form-control form-select" v-model="form.subObra">
                                        <option :value="null" disabled hidden>[ SELECCIONE ]</option>
                                        <option v-for="item in subObras" :key="item.id" :value="item.id">{{ item.name }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label>Posición:</label>
                                    <input     class="form-control" v-model="this.position">
                                </div>
                            </div>
                            <div class="col-md-1">
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
                                    <button @click="addItem()" style="margin-top:23px" class="btn btn-success">Agregar</button>
                                </div>
                            </div>
                            
                            <div class="table-responsive"> 
                            <table v-if="this.items.length > 0" class="table text-center" style="margin-top:20px;">
                                <thead>
                                    <th>Glosa</th>
                                    <th>Sub Obra</th>
                                    <th>Posición</th>
                                    <th>Cantidad</th>
                                    <th>Precio U.</th>
                                    <th>Monto</th>
                                    <th>Acción</th>
                                </thead>
                                <tbody v-for="(item, index) in items" :key="index">
                                    <tr :id="index">
                                        <td><div class="col-md-3">
                                            <input @keyup="searchTimeOut(item.position, index)" style="width:200px;" class="form-control" :value="item.description"/>
                                        </div></td>
                                        <td><div class="col-md-1">
                                            <input readonly @keyup="searchTimeOut(item.sub_work_name, index)" style="width:200px;" class="form-control" :value="item.sub_work_name"/>
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
                                            <input readonly  style="width:100px;" class="form-control" :value="item.price * item.amount"/>
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
                                <button class="btn btn-info" style="color:white" @click="saveData()">Actualizar</button>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
       </div>
    </div>
</template>

<script>


import  Form from '../solicitudes/steps/Form'
import  Confirmation from '../solicitudes/steps/Confirmation'
import  Save from '../solicitudes/steps/Save'

export default {
    name : 'EditCompra',
    components : {
        Form,
        Confirmation,
        Save
    },
    props : {
        requestBuyId : Number
    },
    data() {
        return {
            items:[],
            description : null,
            position : null,
            amount : null,
            price : null,
            form : {},
            data :[],
            clients  :  [],
            projects :  [],
            subObras :  [],
            users    :  [],
            firstname: '',
            lastname: '',
            age: null,
            submitted: false,
            validationErrors: {},
            form:{
                client: null,
                subObra:null,
                project:null,
                proveedor: null,
                user : null,
                currency : null
            },   
            formObject : {},
        }   
    },
    methods:{    
        getProject() {
            var id = this.form.client
            axios.get(`api/project/${id}`)
                .then((res) => {
                    this.projects = res.data;
                    console.log('projects', res.data)
                })
        },
        getSubObra(){
            var id = this.form.project
            axios.get(`api/sub_obras/${id}`)
                .then((res) => {
                    this.subObras = res.data;
                    console.log('sub_obras', this.projects)
                })
        },
        validateForm() {
            if (!this.firstname.trim())
                this.validationErrors['firstname'] = true;
            else
                delete this.validationErrors['firstname'];

            if (!this.lastname.trim())
                this.validationErrors['lastname'] = true;
            else
                delete this.validationErrors['lastname'];

            return !Object.keys(this.validationErrors).length;
        },    
        complete() {
            toast.add({severity:'success', summary:'Order submitted', detail: 'Dear, ' + this.formObject.firstname + ' ' + this.formObject.lastname + ' your order completed.'});
        },
        addItem(){
            if(this.description === null || this.form.subObra === null || this.price === null || this.amount === null || this.position === null){
                this.$toast.add({severity:'error', summary: 'Opsss', detail:'Te faltan algunos campos!', life: 3000});
            }else{
                const sub_work_name  = this.subObras.filter((item) => {
                    return (item.id === this.form.subObra)
                })
                this.items.push({description : this.description, position : this.position , amount: this.amount, price:this.price, sub_work_id :this.form.subObra, sub_work_name : sub_work_name[0].name, total : this.amount * this.price });
            }
        },
        saveData(){
            axios.put(`api/request_buy/${this.requestBuyId}`,  {detail : this.items , company_id : this.form.client, user_id :this.users[0].id , currency_type_id : 1 , payment_method: 'Efectivo', payment_term : "15 Dias", state_type_id : 3 , code : "SC01", name : "Solicitud compra"}).then((res)=>{
                  this.$toast.add({severity:'info', summary: 'Genial', detail:'Se ha actualizado el registro con exito!', life: 3000});
            })

            // this.clearForm();
        },
        clearForm(){
            this.items = [];
            this.form.client = null;
            this.form.subObra = null;
            this.form.project = null;
            this.form.proveedor = null;
            this.form.currency = null;
            this.form.user = null;
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
                ? { ...p, description: data[0], sub_work_name : data[1], position : data[2], amount : data[3], price : data[4], total : data[3] * data[4]  }
                : p
            );
        
            this.items = updatedItems;
            console.log('items update', this.items)

            this.$toast.add({severity:'info', summary: 'Genial', detail:'Se ha actualizado el registro con exito!', life: 3000});
            }, 800);
        },
    },
    mounted(){
        axios.get(`api/request_buy/${this.requestBuyId}`).then((res) => {
            this.items = res.data.detail
            this.form.client = res.data.company_id;
            // this.form.subObra = res.data.detail;
            this.form.project = 1;
            this.form.proveedor = res.data.company_id;
            this.form.currency = "Soles";
            this.form.user = res.data.user_id;

            axios.get(`api/project/${res.data.company_id}`)
                .then((res) => {
                     this.projects = res.data;
                    this.form.project = res.data[0].id;
                    console.log('projects', res.data[0].id)
                })
    
        });

        axios.get("api/client")
            .then((res) => {
                this.clients = res.data.company
                this.users = res.data.user
        })
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
