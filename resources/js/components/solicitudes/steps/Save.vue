
<template>
    <div class="stepsdemo-content">
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
        <Card>
           <template v-slot:title>
                Registro de solicitud de compra
            </template>
            <template v-slot:content>
                <div class="p-fluid formgrid grid">
                     <div class="row">
                        <div class="col-md-3">
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
                                <button @click="addItem" class="btn btn-success">Agregar</button>
                            </div>
                        </div>
                        <hr>
                        <table class="table table-sm" style="margin-top:30px;">
                            <thead>
                                <th>Glosa</th>
                                <th>Posición</th>
                                <th>Cantidad</th>
                                <th>Precio U.</th>
                                <th>Monto OC</th>
                                <th>Acción</th>
                            </thead>
                            <tbody v-for="(item, index) in items" :key="index">
                                    <td><div class="col-md-3">
                                        <input style="width:300px;" class="form-control" :value="item.description"/>
                                    </div></td>
                                    <td><div class="col-md-2">
                                        <input style="width:100px;" class="form-control" :value="item.position"/>
                                    </div></td>
                                    <td><div class="col-md-2">
                                        <input style="width:100px;" class="form-control" :value="item.amount"/>
                                    </div></td>
                                    <td style="width:100px;"><div class="col-md-2">
                                        <input class="form-control" style="width:100px;" :value="item.price"/>
                                    </div></td>
                                    <td><div class="col-md-2">
                                        <input style="width:100px;" class="form-control" :value="item.price * item.amount"/>
                                    </div></td>
                                    <td> En construccion</td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </template>
            <template v-slot:footer>
                <div class="grid grid-nogutter justify-content-between" style="margin-top:20px">
                    <Button label="Anterior" @click="prevPage()" icon="pi pi-angle-left" />
                    <Button style="margin-left:20px;" label="Guardar" @click="saveData()" icon="pi pi-angle-right" iconPos="right" />
                </div>
            </template>
        </Card>
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
        }
    },
    methods: {
        addItem(){
            this.items.push({description : this.description, position : this.position , amount: this.amount, price:this.price, sub_work_id :this.form.sub_obra });
            console.log('items', this.items);
        },
        saveData(){
            axios.post("api/request_buy",  {detail : this.items , company_id : this.form.client, user_id :this.form.user , currency_type_id : 1 , state_type_id : 1 , code : "SC01", name : "Solicitud compra"}).then((res)=>{
                  this.$toast.add({severity:'success', summary: 'Genial', detail:'Se ha guardo el registro con exito!', life: 3000});
            })

            this.$router.push('/');

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
