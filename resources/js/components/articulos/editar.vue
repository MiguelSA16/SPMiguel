<template>
    <div>
       <b-modal id="modal-editar" header-bg-variant="warning" title="EDITAR ARTICULO" size="lg" hide-footer>
            <form action="POST" @submit.prevent="EditArticulo(Articulo.id)">   
                <b-row>  
                    <b-col lg="4">  
                        <b-row>
                            <b-col lg="12">
                           <!-- <div v-for="imagen in Imagenes " v-bind:key="imagen.id">                                    
                                    <div  v-if="imagen.tipo == 'portada'"> -->
                                        <b-img  thumbnail fluid :src="Articulo.imagen" :alt="Articulo.nombre" ></b-img>
                                        <b-form-file id="imagen" placeholder="Selecciona imagen" browse-text="Imagen" @change="cambiarImagenArticulo" size="sm" class="mt-2"></b-form-file>
                                    <!--    <div class=" pt-2 text-center">
                                            <b-button pill size="sm" variant="warning" @click="guardarImagen(imagen)">
                                                <i class="fas fa-sync-alt"></i> Cambiar
                                            </b-button>
                                            <b-button pill size="sm" variant="danger" @click="DeleteImagen(imagen)">
                                                <i class="far fa-trash-alt"></i> Borrar
                                            </b-button>
                                        </div>    
                                    </div>                                                
                                </div>    -->                                 
                            </b-col>
                        </b-row>  
                    </b-col>                      

                    <b-col lg="8">    
                        <b-row>
                            <b-col lg="12">  
                                <label for="nombre" >Nombre: </label>
                                <b-input type="text" aria-label="Nombre" id="nomnre" v-model="Articulo.nombre" ></b-input>                       

                                <label class="pt-2">
                                    Familia: 
                                </label>
                                <b-form-select v-model="Articulo.familia_id" class="pt-2" >
                                    <option v-for="familia in familias" :key="familia.id" :value="familia.id">{{familia.nomfam}}</option>
                                </b-form-select>
                            </b-col>

                            <b-col lg="3">
                                <label class="pt-2">Referencia:</label>
                                <b-link v-bind:to="'/articulo/'+Articulo.slug+'/ver'" target="_blank" class=" text-decoration-none">
                                    <b-button variant="primary" size="sm" class=" d-block">
                                        {{Articulo.codigo}}
                                    </b-button>
                                </b-link>                                
                            </b-col>

                            <b-col lg="3">
                                <label class="pt-2">Grupo:</label>
                                <b-button variant="info" size="sm" class=" d-block">
                                    <i class="fas fa-hashtag"></i>
                                    {{Articulo.grupo}}
                                </b-button>
                            </b-col>           

                            <b-col lg="3">
                                <label class="pt-2">Catalogo:</label>
                                <b-button v-if="Articulo.catalogo == '0'" variant="danger" size="sm" class=" d-block" @click="buttonCatalogo"> 
                                    <i class="fas fa-ban"></i>
                                    false
                                </b-button>
                                <b-button v-else variant="success" size="sm" class=" d-block" @click="buttonCatalogo">
                                    <i class="far fa-check-circle"></i>
                                    true
                                </b-button>
                            </b-col>    

                            <b-col lg="3">
                                <label class="pt-2">Oferta:</label>
                                <b-button v-if="Articulo.oferta == 'NO'" variant="danger" size="sm" class=" d-block" @click="buttonOferta">
                                    <i class="fas fa-ban"></i>
                                    false
                                </b-button>
                                <b-button v-else variant="success" size="sm" class=" d-block" @click="buttonOferta">
                                    <i class="far fa-check-circle"></i>
                                    true
                                </b-button>
                            </b-col>                            

                            <b-col lg="4">
                                <label class="pt-2">Color:</label>
                                <b-input type="text" id="color" v-model="Articulo.color" ></b-input>
                            </b-col>

                            <b-col lg="4">
                                <label class="pt-2">Longitud:</label>
                                <b-input type="text" id="longitud" v-model="Articulo.longitud"></b-input>
                            </b-col>

                            <b-col lg="4">
                                <label class="pt-2">Ancho:</label>
                                <b-input type="text" id="longitud" v-model="Articulo.ancho" ></b-input>
                            </b-col>   

                            <b-col lg="12">
                                <label for="pdf" class="mt-3">Ficha técnica: 
                                    <b-button variant="dark" size="sm">
                                        <i class="fas fa-file-pdf text-danger text-sm"></i>
                                        <template v-if="Articulo.pdf != '-'" >
                                            {{Articulo.codigo}}.pdf 
                                        </template>
                                        <template v-else>
                                            Articulo sin ficha técnica
                                        </template>
                                    </b-button>   
                                </label>
                                <b-form-file id="pdf" placeholder="Selecciona pdf" browse-text="Ficha técnica" @change="cargarPdf" >
                                </b-form-file>                                
                            </b-col>       

                            <b-col lg="12">
                                <label for="certificado" class="mt-3"> Certificados:
                                    <b-button variant="dark" size="sm">
                                        <i class="fas fa-file-pdf text-danger text-sm"></i>
                                        <template v-if="Articulo.certificado != '-'" >
                                            {{Articulo.codigo}}.pdf 
                                        </template>
                                        <template v-else>
                                            Articulo sin certificado
                                        </template>
                                    </b-button>                               
                                </label>
                                <b-form-file id="certificado" placeholder="Selecciona certificado" browse-text="Certificado" @change="cargarCertificado"></b-form-file>
                            </b-col>                    
                        </b-row>
                    </b-col>

                    <b-col lg="12">
                        <label class="pt-4">Descripción:</label>
                        <ckeditor :editor="editor" v-model="Articulo.descripcion" :config="editorConfig"  ></ckeditor>
                    </b-col> 

                    <b-col lg="12"> 
                        <label class="pt-4">Cargar mas imagenes:</label>
                        <b-row>
                            <div v-for="imagen in Imagenes " v-bind:key="imagen.id" style="display: contents;">
                                <b-col lg="4"  v-if="imagen.tipo =='normal'">
                                    
                                        <b-img  thumbnail fluid :src="'/images/articulos/'+imagen.nombre" :alt="Articulo.nombre" ></b-img>
                                        <b-form-file id="imagen" placeholder="Selecciona imagen" browse-text="Imagen" @change="cagrgarImagen" size="sm" class="mt-2"></b-form-file>
                                        <div class=" pt-2 text-center">
                                            <b-button pill size="sm" variant="warning" @click="guardarImagen(imagen)">
                                                <i class="fas fa-sync-alt"></i> Cambiar
                                            </b-button>
                                            <b-button pill size="sm" variant="danger" @click="DeleteImagen(imagen)">
                                                <i class="far fa-trash-alt"></i> Borrar
                                            </b-button>
                                        </div>   
                                </b-col>      
                            </div>                            
                        </b-row>                                   
                    </b-col>
                </b-row>
             
                <hr class="my-2">                
                <div class="w-10 text-center pt-2">
                    <b-button pill type="submit" variant="primary">
                        <i class="fas fa-cloud-upload-alt"></i> 
                            Guardar cambios
                        <i class="fas fa-cloud-upload-alt"></i> 
                    </b-button>                 
                
                </div>                   
            </form>           
        </b-modal>
       
    </div>
    
</template>

<style>
.ck-editor__editable_inline {
    min-height: 150px;
}
</style>

<script>           
         
       
import { mapMutations, mapState, mapActions } from 'vuex';
import { mapGetters } from 'vuex';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

    export default {

        computed:{
            ...mapState([
                'Articulo',
                'Imagenes',
                'familias'
            ])            
        },        
         data() {
            return { 
                editor: ClassicEditor,
                editorData: '<p>Content of the editor.</p>',
                editorConfig: {                   
                    language: 'es'
                },

                imagen      : '',
                imagenArt   : '',
                pdf         : '',
                certificado : '',
                isBusy      : false
                
            }
        },
        
        methods:{

            ...mapActions([
                'getArticulosAlta',
                'getArticulosBaja'
            ]),

            ...mapMutations([
                'cargarEstado',
                'fillImagenes',
                'cambiarImagenArt'
            ]),

            buttonOferta(){
                if(this.Articulo.oferta ==  'NO')
                {
                    this.Articulo.oferta =  'SI'
                }else{
                    this.Articulo.oferta =  'NO'   
                }
            },

            buttonCatalogo(){
                if(this.Articulo.catalogo ==  '0')
                {
                    this.Articulo.catalogo =  '1'
                }else{
                    this.Articulo.catalogo =  '0'   
                }
            },

            cambiarImagenArticulo(e){

                //Validar la extencio del archivo             
                var file_name = e.target.files[0].name
                var file_extension = file_name.split('.').pop()
                var allowedExtensions = /(jpg|jpeg|png)$/i;
                if(!allowedExtensions.exec(file_extension)){
                    this.$bvToast.toast('Comprueba la extensión del archivos', {
                        title: 'Mensaje de Sunpro',                        
                        variant: 'warning',
                        toaster:'b-toaster-top-right',
                    });
                    
                    return false
                }

                //Calcular y validar el peso 
                var sizeByte = e.target.files[0].size
                var siezekiloByte = parseInt(sizeByte / 1024);
                if(siezekiloByte > 300){
                    this.$bvToast.toast('El peso de la imagen supera el limite permitido', {
                        title: 'Mensaje de Sunpro',                        
                        variant: 'warning',
                        toaster:'b-toaster-top-right',
                    });
                    return false
                }
                
                let fileReader = new FileReader()
                fileReader.readAsDataURL(e.target.files[0])                
                fileReader.onload = (e) => {   
                    this.cambiarImagenArt(e.target.result)
                    this.imagenArt = e.target.result
                }                
            },
                       
            cagrgarImagen(e){

                //Validar la extencio del archivo             
                var file_name = e.target.files[0].name
                var file_extension = file_name.split('.').pop()
                var allowedExtensions = /(jpg|jpeg|png)$/i;
                if(!allowedExtensions.exec(file_extension)){
                    this.$bvToast.toast('Comprueba la extensión del archivos', {
                        title: 'Mensaje de Sunpro',                        
                        variant: 'warning',
                        toaster:'b-toaster-top-right',
                    });
                    
                    return false
                }

                //Calcular y validar el peso 
                var sizeByte = e.target.files[0].size
                var siezekiloByte = parseInt(sizeByte / 1024);
                if(siezekiloByte > 300){
                    this.$bvToast.toast('El peso de la imagen supera el limite permitido', {
                        title: 'Mensaje de Sunpro',                        
                        variant: 'warning',
                        toaster:'b-toaster-top-right',
                    });
                    return false
                }

                let fileReader = new FileReader()
                fileReader.readAsDataURL(e.target.files[0])                
                fileReader.onload = (e) => {                      
                    this.imagen = e.target.result                 
                }
            },

            guardarImagen(imagen){

                if(this.imagen==""){
                    
                    this.$bvToast.toast('Debes seleccionar una imagen', {
                        title: 'Mensaje de Sunpro',
                        variant: 'danger',
                        toaster:'b-toaster-top-right'
                    })
                }else{

                    var url = '/api/imagen/'+imagen.id;
                    axios.put(url,{
                        'nombre' : this.imagen,
                    
                    }).then(response=>{
                        this.fillImagenes(imagen.articulo_id)
                        this.$bvToast.toast(response.data.message, {
                            title: 'Mensaje de Sunpro',
                            variant: 'success',
                            toaster:'b-toaster-top-right'
                        })
                        this.imagen="";
                    })
                }              
            },

            cargarPdf(e){                
                
                //Validar la extencio del archivo             
                var file_name = e.target.files[0].name
                var file_extension = file_name.split('.').pop()

                if(file_extension != 'pdf'){
                    this.$bvToast.toast('Comprueba la extensión del archivos', {
                        title: 'Mensaje de Sunpro',                        
                        variant: 'warning',
                        toaster:'b-toaster-top-right',
                    });
                    
                    return false
                }
                
                //Calcular y validar el peso 
                var sizeByte = e.target.files[0].size
                var siezekiloByte = parseInt(sizeByte / 1024);
                if(siezekiloByte > 1000){
                    this.$bvToast.toast('El peso del PDF supera el limite permitido', {
                        title: 'Mensaje de Sunpro',                        
                        variant: 'warning',
                        toaster:'b-toaster-top-right',
                    });
                    return false
                }


                let fileReader = new FileReader()
                fileReader.readAsDataURL(e.target.files[0])
                fileReader.onload = (e) => {
                    this.pdf = e.target.result
                }
            },


            cargarCertificado(e){
                //Validar la extencio del archivo             
                var file_name = e.target.files[0].name
                var file_extension = file_name.split('.').pop()

                if(file_extension != 'pdf'){
                    this.$bvToast.toast('Comprueba la extensión del archivos', {
                        title: 'Mensaje de Sunpro',                        
                        variant: 'warning',
                        toaster:'b-toaster-top-right',
                    });
                    
                    return false
                }
                
                //Calcular y validar el peso 
                var sizeByte = e.target.files[0].size
                var siezekiloByte = parseInt(sizeByte / 1024);
                if(siezekiloByte > 1000){
                    this.$bvToast.toast('El peso del PDF supera el limite permitido', {
                        title: 'Mensaje de Sunpro',                        
                        variant: 'warning',
                        toaster:'b-toaster-top-right',
                    });
                    return false
                }


                let fileReader = new FileReader()
                fileReader.readAsDataURL(e.target.files[0])
                fileReader.onload = (e) => {
                    this.certificado = e.target.result
                }
            },

            DeleteImagen(imagen){

                if(imagen.nombre == 'PND.jpg'){

                    //this.fillImagenes(imagen.articulo_id)
                    this.$bvToast.toast('Esta imagen no puede ser borrada', {
                        title: 'Mensaje de Sunpro',                        
                        variant: 'warning',
                        toaster:'b-toaster-top-right',
                    });
                }else{

                    var url = '/api/imagen/'+imagen.id;
                    axios.delete(url).then(response =>{
                        this.fillImagenes(imagen.articulo_id)
                        this.$bvToast.toast(response.data.message, {
                            title: 'Mensaje de Sunpro',                        
                            variant: 'danger',
                            toaster:'b-toaster-top-right',
                        });
                    })
                }
            },

            EditArticulo(id){
                this.cargarEstado(true)
                this.Articulo.pdf = this.pdf
                this.Articulo.certificado = this.certificado
                this.Articulo.imagen = this.imagenArt
                var url ='/api/articulo/'+id;
                axios
                    .put(url, this.Articulo)
                    .then(response=>{                    
                        this.$bvModal.hide('modal-editar')
                        this.getArticulosAlta()
                        this.getArticulosBaja()
                        this.$bvToast.toast(response.data.message, {
                            title: 'Mensaje de Sunpro',
                            variant: 'success',
                            toaster:'b-toaster-top-right'
                        })
                    this.pdf        = ''
                    this.imagenArt  = ''
                    this.certificado = ''
                })                 
            }
        }
        
    }


</script>


