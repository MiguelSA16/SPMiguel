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

            <b-col lg="2" class="my-1 " offset-md="6">
                <b-form-group label="Número de filas" label-cols-lg="6" label-align-sm="right" label-size="sm" label-for="perPageSelect" class="mb-0" >
                    <b-form-select v-model="perPage" id="perPageSelect" size="sm" :options="pageOptions" class="w-100"></b-form-select>
                </b-form-group>
            </b-col>

            <b-col lg="5" class="my-2">
                <b-form-group label="Buscar por:" label-cols-lg="2" label-align-sm="right" label-size="sm" class="mb-0">
                    <b-form-checkbox-group v-model="filterOn" class="mt-1">
                        <b-form-checkbox value="id">ID</b-form-checkbox>
                        <b-form-checkbox value="nombre"> Nombre</b-form-checkbox>
                        <b-form-checkbox value="codigo">Codigo</b-form-checkbox>
                        <b-form-checkbox value="padre">Famlia</b-form-checkbox>
                        <b-form-checkbox value="familia">Sub-Familia</b-form-checkbox>
                        <b-form-checkbox value="subfamilia">Categoria</b-form-checkbox>
                        <b-form-checkbox value="proveedor">Proveedor</b-form-checkbox>
                    </b-form-checkbox-group>
                </b-form-group>
            </b-col>

            <b-col lg="5" sm="6" md="6" class="my-2 offset-lg-2">
                <b-pagination v-model="currentPage" :total-rows="totalRows" :per-page="perPage" align="fill" size="sm" ></b-pagination>
            </b-col>

            
            <b-col lg="12" sm="6" md="6" class="mt-0 text-left">
                <b-button variant="dark" class="my-1 py-0">
                    ARTICULOS CON STOCK
                </b-button >
                <b-button variant="primary" class="my-1 py-0">
                    ARTICULOS ENCONTRADOS <b-badge variant="dark"> {{totalRows}}</b-badge> 
                </b-button >    
            </b-col>
        </b-row>

        <!-- Main table element -->
        <b-table 
            striped 
            hover 
            small
            head-variant="dark"
            :items="item" 
            :current-page="currentPage"
            :per-page="perPage"
            :fields="columnas"
            :filter="filter"
            :filterIncludedFields="filterOn"
            :busy="isBusy"      
            :sort-by.sync="sortBy"    
            sticky-header="600px"            
        >            
            
            <template v-slot:table-busy>
                <div class="text-center text-danger my-2">
                    <b-spinner class="align-middle"></b-spinner>
                    <strong>Cargando articulos...</strong>
                </div>
            </template>    

            <template v-slot:cell(padre)="row">
                <b-button variant="dark" size="sm" class="w-100" style="font-size: 11px;" @click="filter=row.item.padre">    
                    {{row.item.padre}}
                </b-button>   
            </template>

            <template v-slot:cell(familia)="row">
                <b-button variant="info" size="sm" class=" w-auto" style="font-size: 11px;"  @click="filter=row.item.familia">    
                    {{row.item.familia}}
                </b-button>   
            </template>

            <template v-slot:cell(subfamilia)="row">
                <b-button variant="secondary" size="sm" class="w-75" style="font-size: 11px;"  @click="filter=row.item.subfamilia">    
                    {{row.item.subfamilia}}
                </b-button>   
            </template>

            <template v-slot:cell(proveedor)='row'>
                <b-button variant="dark" size="sm" class="w-75" style="font-size: 11px;"  @click="filter=row.item.proveedor">
                    {{row.item.proveedor}}
                </b-button>        
            </template>      

            <template v-slot:cell(stock)='row'>
                <span v-for="stock in stocks" v-bind:key="stock.id" >
                    <template v-if="row.item.id == stock.id">
                        <template v-if="stock.total <= 0">
                            <b-button variant="danger" size="sm" class="  font-weight-bold">
                                {{stock.total}} und.
                            </b-button>                            
                        </template>
                        <template v-else>
                            <b-button variant="success" size="sm" class="  font-weight-bold">
                                {{stock.total}} und.
                            </b-button>     
                        </template>                        
                    </template>
                </span>                
            </template>              

            <template v-slot:cell(avisar)='row'>
                <b-button variant="warning" size="sm" class=" font-weight-bold">
                    {{row.item.avisar}} und.
                </b-button> 
            </template>

            <template v-slot:cell(pedir)='row'>
                <span v-for="stock in stocks" v-bind:key="stock.id" >
                    <template v-if="row.item.id == stock.id"> 
                        <template v-if="stock.total < row.item.avisar">
                            <b-button variant="danger" size="sm" class="font-weight-bold">
                                Pedir{{row.item.pedir}} und.
                            </b-button>   
                        </template>                      
                        <template v-else>                           
                            <b-button variant="dark" size="sm" class="font-weight-bold ">
                                NO PEDIR 
                            </b-button>                            
                        </template>
                    </template>                    
                </span>
            </template>

            <template v-slot:cell(cons_med_mes)='row'>
                <b-button variant="info" size="sm" class="font-weight-bold">
                    {{row.item.cons_med_mes}} und.
                </b-button> 
            </template>

            <template v-slot:cell(cons_12_mes)='row'>
                <b-button variant="primary" size="sm" class="font-weight-bold">
                    {{row.item.cons_12_mes}} und.
                </b-button> 
            </template>

        </b-table>

        <editar-articulo/> 
        <ver-articulo/> 

    </b-container>
</template>

<script>

    export default { 

        data(){
            return{
                columnas: [
                    { key: 'id', sortable: true },
                    { key: 'codigo', sortable: true },
                    { key: 'padre', label: 'Familia', sortable: true},
                    { key: 'familia', label: 'Sub-Familia', sortable: true},
                    { key: 'subfamilia', label: 'Categoria', sortable: true},  
                    { key: 'nombre', sortable: true },                    
                    { key: 'proveedor', label:'Proveedor', sortable: true },
                    { key: 'stock', label: 'Stock' },                                  
                    { key: 'avisar', label: 'Stock minimo', sortable: true },
                    { key: 'pedir', label: 'Pedir', sortable: true },
                    { key: 'cons_med_mes', label: 'Consumo mes', sortable: true },
                    { key: 'cons_12_mes', label: 'Consumo anual', sortable: true }     
                ],
                stocks:[],
                item: null,
                filter: null,
                totalRows: 1,
                currentPage: 1,
                perPage: 25,
                pageOptions: [25, 50, 100,200,500],
                filterOn: [],
                sortBy: '',
                isBusy: true
            }
        },                                                                            

        computed: {
            sortOptions() {
                // Create an options list from our fields
                return this.columnas
                .filter(f => f.sortable)
                .map(f => {
                    return { text: f.label, value: f.key }
                })
            }
        },

         mounted(){
            this.getConsumo(),
            this.getStock()                
        },

        methods: { 
            getConsumo(){
                var url = '/api/articulos-consumo';
                axios                
                .get(url)
                .then(response =>{
                    this.item =  response.data.consumo 
                    this.totalRows = this.item.length   
                    this.isBusy = false   
                })
            },
            
            getStock(){
                var url = '/api/articulos-with-stock';
                axios
                .get(url)
                .then(response=>{
                    this.stocks = response.data.articulos 
                })
            }
        }
    }
    

</script>

