<template>
    <div>
        <b-modal id="modal-editar-familia" header-bg-variant="warning" title="EDITAR FAMILIA" size="lg" hide-footer>
            <form action="POST" @submit.prevent="EditFamilia(Familia.id)">   
                <b-row>
                    <b-col lg="4">
                        <b-img thumbnail fluid :src="Familia.imagen" ></b-img>
                        <b-form-file id="imagen" placeholder="Selecciona imagen" browse-text="Imagen" @change="cambiarImagen" size="sm" class="mt-2"></b-form-file>
                    </b-col>
                    <b-col lg="8">
                        <b-row>
                            <b-col lg="12">
                                <label for="nomfam">Nombre: </label>   
                                <b-input type="text" id="nomfam" v-model="Familia.nomfam">
                                </b-input >  

                                <label for="slug" class=" pt-2">URL Familia: </label>
                                <b-input type="text" id="slug" v-model="Familia.slug">
                                </b-input> 

                                <label for="claparent" class=" pt-2">Pertence a:</label>      
                                <b-form-select v-model="Familia.claparent">
                                    <option :value="0">-- Es una familia padre --</option>
                                    <option v-for="familia in familias" :key="familia.id" :value="familia.id">{{familia.nomfam}}</option>
                                </b-form-select>
                            </b-col>

                            <b-col lg="6">
                                <label for="grupo" class=" pt-2">Grupo de familias:</label>
                                <b-form-select id="grupo" v-model="Familia.grupo">
                                    <option value="1">
                                        VERDADERO
                                    </option>
                                    <option value="0">
                                        FALSO
                                    </option>
                                </b-form-select>
                            </b-col>

                            <b-col lg="6">
                                <label for="grupo" class=" pt-2">Baja web:</label>
                                <b-form-select id="grupo" v-model="Familia.baja_web">
                                    <option value="VERDADERO">
                                        VERDADERO
                                    </option>
                                    <option value="FALSO">
                                        FALSO
                                    </option>
                                </b-form-select>
                            </b-col>

                        </b-row>
                    </b-col>
                </b-row>

                <!-- 
                    <pre>{{Familia}}</pre>
                -->

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

<script>           
         
       
import { mapMutations, mapState, mapActions } from 'vuex';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

    export default {

        computed:{
            ...mapState([
                'Familia',
                'familias'
            ])            
        },

        data(){
            return{
                imagenFamilia : '' 
            }
        },

        methods:{
           
            ...mapMutations([
               'cambiarImagenFamilia',
               'cargarEstado'
            ]),

            ...mapActions([
                'getFamilias'
            ]),

            EditFamilia(id){
                
                this.cargarEstado(true)    
                this.Familia.imagen = this.imagenFamilia
                var url = '/api/familia/'+id;
                axios
                    .put(url, this.Familia)
                    .then(response=>{
                        this.getFamilias()
                        this.$bvModal.hide('modal-editar-familia')
                        this.imagenFamilia = ''
                    })
            },

            cambiarImagen(e){
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
                   
                    this.cambiarImagenFamilia(e.target.result)
                    this.imagenFamilia = e.target.result
                }                
            }

        }
    }
</script>           
