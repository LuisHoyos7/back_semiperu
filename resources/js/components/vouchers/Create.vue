<template>
    <div>
        <div class="card">
            <div class="card-header">
                Generación de comprobante
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Tipo Comprobante * </label>
                            <select  class="form-control form-select" v-model="form.invoice">
                                <option>Factura </option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Numero Doc Pago </label>
                            <input class="form-control" v-model="form.number_doc"/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Fecha Emisión</label>
                            <input class="form-control" v-model="form.date_xml" id="date_xml"/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Moneda </label>
                            <input class="form-control" v-model="form.number_doc"/>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top:20px">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Detraccion * </label>
                            <select  class="form-control form-select" v-model="form.invoice">
                                <option>Factura </option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Numero de acta  </label>
                            <input class="form-control" v-model="form.number_doc"/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">orden de compra </label>
                            <input class="form-control" v-model="form.number_doc"/>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top:20px">
                    <div class="col">
                        <div class="form-group">
                            <label for="">ADJUNTAR XML</label>
                            <input  @change="uploadFile" placeholder="ADJUNTAR XML" id="file" ref="file" type="file" class="btn btn-warning btn-s " style="color:white"/> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script> 

export default {
    data() {
        return {
            xml :'',
            form : {
                invoice : null,
                date_xml : null,
            }
        }
    },

    methods:{
        waitForTextReadComplete(reader) {
            reader.onloadend = function(event) {
                var text = event.target.result;
                var parser = new DOMParser(),
                xmlDom = parser.parseFromString(text, "text/xml");
                var x = xmlDom.getElementsByTagName("cbc:IssueDate");
                // getElementsById("date_xml").value(x[0].textContent)
                console.log('xmlDom',x[0].textContent)
            }

        },

          uploadFile(){
                var fileInput = document.getElementById('file');
                var file = fileInput.files[0];
                var reader = new FileReader();
                var self = this;
                reader.addEventListener('load', function(){
                this.xml = reader.result;
                console.log("Result:\n\n" + self.xml);
            });
        //   var parser = new DOMParser(),
        //    xmlDom = parser.parseFromString(xml, "text/xml");
        //           console.log('xml',xml)
        // var x = xmlDom.getElementsByTagName("cbc:IssueDate");
        // this.form.date_xml = x[0].textContent

          /*console.log("Result1:\n\n" + self.xml);*/
  

        reader.readAsText(file);
        console.log('invoive',this.xml)
      }
    }
        // uploadFile() {
        //     var file = this.$refs.file.files[0];
        //     var reader = new FileReader();
        //      var parser = new DOMParser(),
        //         xmlDom = parser.parseFromString(file, "text/xml");
        //                     console.log('xmlDom', xmlDom);

        //     this.waitForTextReadComplete(reader);
        //     var reader = reader.readAsText(file.name);
        //     console.log('reader', reader);
        // },
    
    
}
</script>
