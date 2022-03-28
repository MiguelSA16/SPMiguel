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
                        <b-form-checkbox value="padre">Famlia</b-form-checkbox>
                        <b-form-checkbox value="familia">Sub-Familia</b-form-checkbox>
                        <b-form-checkbox value="subfamilia">Categoria</b-form-checkbox>
                    </b-form-checkbox-group>
                </b-form-group>
            </b-col>

            <b-col lg="5" sm="6" md="6" class="my-2 offset-lg-2">
                <b-pagination v-model="currentPage" :total-rows="totalRows" :per-page="perPage" align="fill" size="sm" ></b-pagination>
            </b-col>    

            <b-col lg="12" sm="6" md="6" class="mt-0 text-left">
                <b-button variant="success" class="my-1 py-0">
                    ARTICULOS DE ALTA
                </b-button >
                <b-button variant="primary" class="my-1 py-0">
                    ARTICULOS ENCONTRADOS <b-badge variant="dark"> {{totalRows}}</b-badge> 
                </b-button >    
            </b-col>
        </b-row>

        <!-- Main table element -->
        <b-table small  striped hover head-variant="dark" sticky-header="600px" :busy="cargando" :items="articulosAlta" :fields="fields" :current-page="currentPage" :per-page="perPage" :filter="filter"
        :filterIncludedFields="filterOn" :sort-by.sync="sortBy" :sort-desc.sync="sortDesc" @filtered="onFiltered" :filter-function="filterTable" >            
            
            <template v-slot:table-busy>
                <div class="text-center text-danger my-2">
                    <b-spinner class="align-middle"></b-spinner>
                    <strong>Cargando articulos...</strong>
                </div>
            </template>    

            <template v-slot:cell(padre)="row">
                <b-button variant="dark" size="sm" class="w-75" style="font-size: 11px;" @click="filter=row.item.padre">    
                    {{row.item.padre}}
                </b-button>   
            </template>

            <template v-slot:cell(familia)="row">
                <b-button variant="info" size="sm" class="w-75" style="font-size: 11px;"   @click="filter=row.item.familia">    
                    {{row.item.familia}}
                </b-button>   
            </template>

            <template v-slot:cell(subfamilia)="row">
                <b-button variant="secondary" size="sm" class="w-75" style="font-size: 11px;" @click="filter=row.item.subfamilia">    
                    {{row.item.subfamilia}}
                </b-button>   
            </template>

            <template v-slot:cell(informacion)="row">
                <ul class="nav nav-pills nav-fill pr-3">
                    <li class="nav-item">
                        <i class="far fa-file-image text-primary" style=" font-size:18px"></i>
                        <i class="fas fa-check text-success" v-if="row.item.imagen != 'PND.jpg'" ></i>
                        <i class="fas fa-times text-danger" v-else></i>
                    </li>
                    <li class=" nav-item">
                        <i class="far fa-file-pdf text-danger" style=" font-size:18px"></i>
                        <i class="fas fa-check text-success" v-if="row.item.pdf != '-'" ></i>
                        <i class="fas fa-times text-danger" v-else></i>
                    </li>
                    <li class="nav-item">
                        <i class="far fa-file-alt text-dark" style=" font-size:18px"></i>
                        <i class="fas fa-check text-success" v-if="row.item.descripcion != 'Descripción del articulo actualmente no esta disponible para mas información póngase en contacto con nosotros'" ></i>
                        <i class="fas fa-times text-danger" v-else></i>
                    </li>                    
                </ul>                   
                
               
            </template>
            
            <template v-slot:cell(actions)="row" >
                <b-button variant="warning"  @click="OpenModalEdit(row.item)" class="mr-1 py-0">
                    <i class="fas fa-pencil-alt"></i>
                    editar
                </b-button>

                <b-button variant="success" @click="OpenModalVer(row.item)"  class="mr-1 py-0">
                    <i class="far fa-eye"></i>
                    ver
                </b-button>

                <b-button v-if="row.item.catalogo==1" variant="success"  class="mr-1 py-0" @click="SelctCatalogo(row.item)">
                    <i class="fas fa-book"></i> <i class="fas fa-check"></i>
                </b-button>
                <b-button v-else variant="danger"  class="mr-1 py-0" @click="SelctCatalogo(row.item)">
                    <i class="fas fa-book"></i> <i class="fas fa-ban"></i>
                </b-button>

            </template>
            
        </b-table>

        <editar-articulo/> 
        <ver-articulo/> 

    </b-container>
</template>

<script>
import { log } from 'util';
import { mapMutations, mapState, mapActions, mapGetters } from 'vuex';

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
                'cargando',
                'Articulo'
            ])            
        },    

        data() {
            return { 

                fields: [
                
                    { key: 'id', label: 'ID'},
                    { key: 'codigo', label: 'Codigo', sortable: true, sortDirection: 'desc' },
                    { key: 'nombre', label: 'Nombre', sortable: true },
                    { key: 'padre', label: 'Familia', sortable: true},
                    { key: 'familia', label: 'Sub-Familia', sortable: true},
                    { key: 'subfamilia', label: 'Categoria', sortable: true},                    
                    { key: 'informacion', label: 'Informacion' },
                    { key: 'actions', label: 'Acciones' }
                    
                ],
                
                currentPage: 1,
                perPage: 25,
                pageOptions: [25, 50, 100,200,500],
                sortBy: '',
                sortDesc: false,
                filter: null,
                filterOn: ['nombre','codigo'],
                imagenArt   : '',
                pdf         : '',
                certificado : ''       
            }
        },
        
        created(){                        
            this.getFamilias(),
            this.getArticulosAlta(),
            this.getMovAlm()           
        },

        methods: {

            ...mapMutations([
                'fillModalEditar',
                'fillModalVer',
                'fillImagenes',
                'totalColumnas',
                'cargarEstado'                 
            ]),
            
            ...mapActions([
                'getArticulosAlta',
                'getFamilias',
                'getMovAlm'
            ]),

            resetInfoModal() {
                this.infoModal.title = ''
                this.infoModal.content = ''
            },

            onFiltered(filteredItems) {
                this.totalColumnas(filteredItems.length)
                this.currentPage = 1
            },

            OpenModalEdit(articulo){                
                this.fillModalEditar(articulo)    
                this.fillImagenes(articulo.id)            
                this.$bvModal.show('modal-editar')
            },

            OpenModalVer(articulo){
                this.fillModalVer(articulo.id)
                this.$bvModal.show('modal-ver')
            },

            SelctCatalogo(articulo){
                
                this.fillModalEditar(articulo)    
                this.fillImagenes(articulo.id)   
                console.log(articulo.catalogo)

                if (articulo.catalogo == 1) {
                    this.Articulo.catalogo = 0;
                }else{
                    this.Articulo.catalogo = 1;
                }

                this.Articulo.pdf = this.pdf
                this.Articulo.certificado = this.certificado
                this.Articulo.imagen = this.imagenArt
                var url ='/api/articulo/'+articulo.id;
                axios
                    .put(url, this.Articulo)
                    .then(response=>{                    
                        //this.getArticulosAlta()
                        //this.getArticulosBaja()
                        this.$bvToast.toast(response.data.message, {
                            title: 'Mensaje de Sunpro',
                            variant: 'success',
                            autoHideDelay: 1500,
                            toaster:'b-toaster-top-right'
                        })
                    this.pdf        = ''
                    this.imagenArt  = ''
                    this.certificado = ''
                    if (articulo.catalogo == 1) {
                        articulo.catalogo = 0;
                    }else{
                        articulo.catalogo = 1;
                    }
                })                 
            }
        }
    }
</script>

