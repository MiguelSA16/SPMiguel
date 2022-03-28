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
                        <b-form-checkbox value="familia_id">Familia</b-form-checkbox>
                        <b-form-checkbox value="grupo">Grupo</b-form-checkbox>
                    </b-form-checkbox-group>
                </b-form-group>
            </b-col>

            <b-col lg="5" sm="6" md="6" class="my-2 offset-lg-2">
                <b-pagination v-model="currentPage" :total-rows="totalRows" :per-page="perPage" align="fill" size="sm" ></b-pagination>
            </b-col>

            
            <b-col lg="12" sm="6" md="6" class="mt-0 text-left">
                <b-button variant="danger" class="my-1 py-0">
                    ARTICULOS DE BAJA
                </b-button >
                <b-button variant="primary" class="my-1 py-0">
                    ARTICULOS ENCONTRADOS <b-badge variant="dark"> {{totalRows}}</b-badge> 
                </b-button >    
            </b-col>
        </b-row>

        <!-- Main table element -->
        <b-table small  striped hover head-variant="dark" sticky-header="600px" :busy="cargando" :items="articulosBaja" :fields="fields" :current-page="currentPage" :per-page="perPage" :filter="filter"
        :filterIncludedFields="filterOn" :sort-by.sync="sortBy" :sort-desc.sync="sortDesc" @filtered="onFiltered" >            
            
            <template v-slot:table-busy>
                <div class="text-center text-danger my-2">
                    <b-spinner class="align-middle"></b-spinner>
                    <strong>Cargando articulos...</strong>
                </div>
            </template>

           

           <template v-slot:cell(nomfam)="row" >
                <span v-for="familia in familias" v-bind:key="familia.id" >
                    <span v-if="row.item.familia_id == familia.id" class=" badge badge-info">
                        {{familia.nomfam}}
                    </span>
                </span>                
            </template>

            <template v-slot:cell(informacion)="row" >
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
            
            <template v-slot:cell(actions)="row" class=" text-center">
                <b-button variant="warning"  @click="OpenModalEdit(row.item)" class="mr-1 py-0">
                    <i class="fas fa-pencil-alt"></i>
                    editar
                </b-button>

                <b-button variant="success" @click="OpenModalVer(row.item)"  class="mr-1 py-0">
                    <i class="far fa-eye"></i>
                    ver
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
                'articulosBaja',
                'familias',
                'totalRows',
                'cargando'
            ])            
        },    

        data() {
            return { 

                fields: [
                    { key: 'id', label: 'ID', sortable: true },
                    { key: 'codigo', label: 'Codigo', sortable: true, sortDirection: 'desc' },
                    { key: 'nombre', label: 'Nombre', sortable: true },
                    { key: 'nomfam', label: 'Nombre Familia'},
                    { key: 'familia_id', label: 'Familia', sortable: true }, 
                    { key: 'informacion', label: 'Informacion' },
                    { key: 'actions', label: 'Acciones' }
                    
                ],
                
                currentPage: 1,
                perPage: 25,
                pageOptions: [25, 50, 100,200,500],
                sortBy: '',
                sortDesc: false,
                filter: null,
                filterOn: ['nombre','codigo']                
            }
        },
        
        created(){            
            this.getFamilias(),
            this.getArticulosBaja(),
            this.getMovAlm()           
        },

        methods: {

            ...mapMutations([
                'fillModalEditar',
                'fillModalVer',
                'fillImagenes',
                'totalColumnas'                 
            ]),
            
            ...mapActions([
                'getArticulosBaja',
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
            } 
        }
    }
</script>

