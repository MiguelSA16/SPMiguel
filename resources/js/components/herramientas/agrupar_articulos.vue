<template>
    <b-container fluid class=" bg-white py-4">
        <!-- User Interface controls -->
        <b-row>
            <b-col lg="4" class="my-1">
                <b-form-group label="Buscar: " label-cols-sm="2" label-align-sm="right" label-size="sm" label-for="filterInput" class="mb-0" >
                    <b-input-group size="sm">
                        <b-form-input v-model="filter" type="search" id="filterInput" placeholder="Escribe para buscar"></b-form-input>
                        <b-input-group-append>
                            <b-button :disabled="!filter" @click="filter = ''">
                                Limpiar
                            </b-button>
                        </b-input-group-append>
                    </b-input-group>
                </b-form-group>
            </b-col>

            <b-col lg="3" class="my-1 offset-lg-3">
                <b-form-group label="Ordenar por: " label-cols-sm="3" label-align-sm="right" label-size="sm" label-for="sortBySelect" class="mb-0" >
                    <b-input-group size="sm">
                        <b-form-select v-model="sortBy" id="sortBySelect" :options="sortOptions" class="w-50">
                            <option slot="first" value="">-- ninguno --</option>
                        </b-form-select>
                        <b-form-select v-model="sortDesc" size="sm" :disabled="!sortBy" class="">
                            <option :value="false">Asc</option>
                            <option :value="true">Desc</option>
                        </b-form-select>
                    </b-input-group>
                </b-form-group>
            </b-col>

            <b-col lg="2" class="my-1 ">
                <b-form-group label="Número de filas" label-cols-lg="6" label-align-sm="right" label-size="sm" label-for="perPageSelect" class="mb-0" >
                    <b-form-select v-model="perPage" id="perPageSelect" size="sm" :options="pageOptions" class="w-100"></b-form-select>
                </b-form-group>
            </b-col>

            <b-col lg="5" class="my-2">
                <b-form-group label="Buscar por:" label-cols-lg="2" label-align-sm="right" label-size="sm" class="mb-0">
                    <b-form-checkbox-group v-model="filterOn" class="mt-1">
                        <b-form-checkbox value="id">ID</b-form-checkbox>
                        <b-form-checkbox value="nombre">Nombre</b-form-checkbox>
                        <b-form-checkbox value="codigo">Codigo</b-form-checkbox>
                        <b-form-checkbox value="familia_id">Familia ID</b-form-checkbox>
                        <b-form-checkbox value="grupo">Grupo</b-form-checkbox>
                    </b-form-checkbox-group>
                </b-form-group>
            </b-col>

            <b-col lg="5" sm="6" md="6" class="my-2 offset-lg-2">
                <b-pagination v-model="currentPage" :total-rows="totalRows" :per-page="perPage" align="fill" size="sm" ></b-pagination>
            </b-col>

            
            <b-col lg="12" sm="6" md="6" class="mt-0 text-left">
                <b-button variant="dark" class="my-1 py-0">
                    AGRUPAR ARTICULOS DE ALTA
                </b-button >
                <b-button variant="primary" class="my-1 py-0">
                    ARTICULOS ENCONTRADOS <b-badge variant="dark"> {{totalRows}}</b-badge> 
                </b-button >    
            </b-col>
        </b-row>

        <!-- Main table element -->
        <b-table small striped hover head-variant="dark" sticky-header="600px" :busy="cargando" :items="articulosAlta" :fields="fields" :current-page="currentPage" :per-page="perPage" :filter="filter"
        :filterIncludedFields="filterOn" :sort-by.sync="sortBy" :sort-desc.sync="sortDesc" @filtered="onFiltered" >            
            
            <template v-slot:table-busy>
                <div class="text-center text-danger my-2">
                    <b-spinner class="align-middle"></b-spinner>
                    <strong>Loading...</strong>
                </div>
            </template>

            <template v-slot:cell(nomfam)="row" >
                <span v-for="familia in familias" v-bind:key="familia.id" >
                    <span v-if="row.item.familia_id == familia.id" class=" badge badge-info">
                        {{familia.nomfam}}
                    </span>
                </span>                
            </template>
            
            <template v-slot:cell(actions)="row">
                <b-button variant="warning" @click="showModalEditar(row.item)" class="mr-1 py-0">
                    <i class="fas fa-pencil-alt"></i>
                    editar
                </b-button>

                <b-button variant="dark" class="py-0" @click="showModalAgrupar(row.item)">
                    <i class="fas fa-project-diagram"></i>
                    agrupar
                </b-button>
            </template>
        </b-table>

        <!-- Editar modal -->
        <b-modal ref="modal-editar" title="EDITAR GRUPO DE ARTICULOS" header-bg-variant="warning" size="lg" hide-footer>
            <form action="POST" @submit.prevent="updateArticulo(fillArticulo.id)">    
                <b-row>
                    <b-col lg="4">
                        <b-row>
                            <b-col lg="12">                 
                                <b-img thumbnail fluid :src="fillArticulo.imagen" :alt="fillArticulo.nombre"></b-img>
                                <!--<b-form-file id="imagen" v-on:change="cambiarImagenArticulo" size="sm" browse-text="imagen" class="mt-2"></b-form-file>-->
                            </b-col>
                        </b-row>
                    </b-col>

                    <b-col lg="8">
                        <b-row>
                            <b-col lg="12">
                                <label for="nombre" >Nombre: </label>
                                <b-input type="text" aria-label="Nombre" id="nombre" v-model="fillArticulo.nombre" ></b-input>     

                                <label class="pt-2">
                                    Familia: 
                                </label>
                                <b-form-select v-model="fillArticulo.familia_id" class="pt-2" >
                                    <option v-for="familia in familias" :key="familia.id" :value="familia.id">{{familia.nomfam}}</option>
                                </b-form-select> 
                            </b-col>

                            <b-col lg="6" class="pt-2">
                                <label >
                                    Grupo:
                                </label>
                                <b-button variant="info" size="sm" class=" d-block">
                                    <i class="fas fa-hashtag"></i>
                                    {{fillArticulo.grupo}}
                                </b-button>
                            </b-col>

                            <b-col lg="6" class="pt-2">
                                <label label="color" >
                                    Color:
                                </label>
                                <b-input type="text" id="color" v-model="fillArticulo.color" @keyup="mayusculas()"></b-input>
                            </b-col>

                            <b-col lg="6" class="pt-2">
                                <label label="longitud">
                                    Longitud:
                                </label>
                                <b-input type="text" id="longitud" v-model="fillArticulo.longitud"></b-input>

                            </b-col>

                            <b-col lg="6" class="pt-2">
                                <label for="ancho" >
                                    Ancho:
                                </label>
                                <b-input type="text" id="ancho" v-model="fillArticulo.ancho"></b-input>
                            </b-col>

                        </b-row>
                    </b-col>
                </b-row>        
      
                <hr class="my-2">                
                <div class="w-10 text-right">
                    <b-button type="submit" variant="primary">
                        Actualizar
                    </b-button>
                    <b-button type="reset" variant="danger">
                        Limpiar
                    </b-button>                    
                </div>                   
            </form>           
        </b-modal>

        <!-- Agrupar modal -->
        <b-modal ref="modal-agrupar" title="AGRUPAR ARTICULOS" header-bg-variant="dark" header-text-variant="light"  hide-footer>
            <form method="POST" @submit.prevent="agruparArticulos">
                <b-row>
                    <b-col lg="6">
                        <label for="agrupar">Agrupar por:</label>
                        <b-form-select v-model="groupArticulo.columna" size="sm" id="agrupar"> 
                            <option :value="null" disabled>-- Por favor seleccione una opción --</option>
                            <option value="codigo">Codigo</option>
                            <option value="grupo" >Grupo</option>
                        </b-form-select>
                    </b-col>

                    <b-col lg="6">
                        <label for="buscar">Buscar:</label>
                        <b-form-input id="buscar" v-model="groupArticulo.buscar" size="sm" @keyup="modificarTextGrupo" required ></b-form-input>
                    </b-col>

                    <b-col lg="6" class=" pt-2">
                        <label for="grupo:">Nuevo Grupo:</label>
                        <b-form-input id="grupo" v-model="groupArticulo.grupo" size="sm" required></b-form-input>
                        <span class=" pt-1 d-block">
                            <span class=" text-dark font-weight-bold">GRUPO.</span>    
                            <span class=" text-danger font-weight-bold"> 0.</span>  
                            <span class=" text-success font-weight-bold"> L.</span>    
                            <span class=" text-info font-weight-bold"> F</span>    
                        </span>
                        <span class=" pt-1 d-block">
                            <span class=" text-dark font-weight-bold">GRUPO.</span>   
                            <span class=" text-danger font-weight-bold" >ancho.</span> 
                            <span class=" text-success font-weight-bold" >longitud.</span> 
                            <span class=" text-info font-weight-bold" >color</span>
                        </span>

                    </b-col>

                    <b-col lg="3" class=" pt-2"> 
                        <label for="familia">Familia ID:</label>                        
                        <b-form-input id="familia" v-model="groupArticulo.familia_id" size="sm" required ></b-form-input>
                    </b-col>

                    <b-col lg="3" class=" pt-2">
                        <label for="color">Color:</label>
                        <b-form-input id="color" v-model="groupArticulo.color" @keyup="mayusculas" size="sm" ></b-form-input>
                    </b-col>

                </b-row>   
                
                <hr class=" my-2">                
                <div class="w-10 text-center">
                    <b-button type="submit" variant="primary" size="sm">
                        AGRUPAR ARTICULOS
                    </b-button>                  
                </div>          
            </form>
        </b-modal>
    </b-container>
</template>

<script>
import { log } from 'util';
import { mapMutations, mapState, mapActions } from 'vuex';

    export default {
        computed: {

            sortOptions() {
                // Create an options list from our fields
                return this.fields
                .filter(f => f.sortable)
                .map(f => {
                    return { text: f.label, value: f.key }
                })
            },
                        
            ...mapState([
                'articulosAlta',
                'familias',
                'totalRows',
                'cargando'
            ])            
        },    
        
        data() {
            return {
                
                imagenArt : '',

                groupArticulo:{ 'columna': null, 'buscar': '', 'grupo': '', 'familia_id': '', 'color' : '' },
                fillArticulo: { 'id' : '', 'nombre':'', 'familia_id' : '', 'grupo' : '', 'color' : '', 'longitud' : '', 'ancho': '' , 'imagen' : '' },

                fields: [
                    
                    { key: 'codigo', label: 'Codigo', sortable: true, sortDirection: 'desc' },
                    { key: 'nombre', label: 'Nombre', sortable: true },
                    { key: 'nomfam', label: 'Nombre Familia'},
                    { key: 'familia_id', label: 'Familia ID', sortable: true },
                    { key: 'grupo', label: 'Grupo', sortable: true }, 
                    { key: 'color', label: 'Color', sortable: true }, 
                    { key: 'longitud', label: 'Longitud', sortable: true },
                    { key: 'ancho', label: 'Ancho', sortable: true }, 
                    { key: 'actions', label: 'Acciones' }
                ],

                currentPage: 1,
                perPage: 25,
                pageOptions: [25, 50, 100,200,500],
                sortBy: '',
                sortDesc: false,
                filter: null,
                filterOn: []                   
            }
        },
        
        created(){

            this.getArticulosAlta(),
            this.getFamilias()
        },

        methods: {

            ...mapActions([
                'getArticulosAlta',
                'getFamilias'
            ]),

            ...mapMutations([
                'cargarEstado',
                'totalColumnas'
            ]),

            showModalEditar(item) {

                this.fillArticulo.id = item.id
                this.fillArticulo.nombre = item.nombre
                this.fillArticulo.familia_id = item.familia_id
                this.fillArticulo.grupo = item.grupo
                this.fillArticulo.color = item.color
                this.fillArticulo.longitud = item.longitud 
                this.fillArticulo.ancho = item.ancho
                this.fillArticulo.imagen = '/images/articulos/'+item.imagen
                this.$refs['modal-editar'].show() 
            },

            showModalAgrupar(item){  
                             
                var grupo = item.codigo
                
                grupo = grupo.replace(/\./g,"")
                grupo = grupo.replace(/\,/g,"")
                grupo = grupo.replace(/-/g,"")
                grupo = grupo.replace(/\//g, ""); 

                this.groupArticulo.buscar=item.codigo
                this.groupArticulo.grupo=grupo+'.0.L.F',
                this.groupArticulo.familia_id = item.familia_id,
                this.groupArticulo.color = item.color,
                this.$refs['modal-agrupar'].show()
            },            

            agruparArticulos(){
                this.cargarEstado(true)
                var url ='/api/agrupar'; 
                axios.post(url, this.groupArticulo)
                .then(response =>{
                    this.getArticulosAlta(),     
                    this.$refs['modal-agrupar'].hide(),               
                    this.$bvToast.toast(response.data.message, {
                        title: 'Mensaje de Sunpro',
                        variant: 'success',
                        toaster:'b-toaster-top-right'
                    })
                }).catch(error => {
				    this.errors = 'Corrija para poder agrupar con éxito'
			    });
            },

            updateArticulo(id){
                this.cargarEstado(true)
                this.fillArticulo.imagen = this.imagenArt
                var url ='/api/articulo/'+id;
                axios.put(url, this.fillArticulo)
                .then(response =>{

                    this.getArticulosAlta(),
                    this.$refs['modal-editar'].hide(), 
                    this.$bvToast.toast('Los articulos se actualizaron con exito', {
                        title: 'Mensaje de Sunpro',
                        variant: 'success',
                        toaster:'b-toaster-top-right'
                    }),
                    this.$refs['modal-editar'].hide() 
                    this.fillArticulo =  { 'id' : '', 'nombre':'', 'familia_id' : '', 'grupo' : '', 'color' : '', 'longitud' : '', 'ancho': '' , 'imagen' : '' }
                    
                }).catch(error => {
				    this.errors = 'Corrija para poder editar con éxito'
			    });
            },

            onFiltered(filteredItems) {
                this.totalColumnas(filteredItems.length)
                this.currentPage = 1
            },

            mayusculas(){
                this.groupArticulo.color = this.groupArticulo.color.toUpperCase()
                this.fillArticulo.color =  this.fillArticulo.color.toUpperCase()
            },

            modificarTextGrupo(){
                this.groupArticulo.grupo = this.groupArticulo.buscar+'.0.L.F'
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
                    this.fillArticulo.imagen = e.target.result
                    this.imagenArt = e.target.result
                }                
            },
        }
}
</script>

