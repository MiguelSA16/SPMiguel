<template>
    <b-container fluid>
        <b-row>        
            <b-col md="4" >
                <b-form-group
                label="Buscar:"
                label-cols-sm="3"
                label-align-sm="right"
                label-size="sm"
                label-for="filterInput"
                class="mb-0"
                >
                <b-input-group size="sm">
                    <b-form-input
                        v-model="filter"
                        type="search"
                        id="filterInput"
                        placeholder="Type to Search"
                    ></b-form-input>
                    <b-input-group-append>
                        <b-button :disabled="!filter" @click="filter = ''">Borrar</b-button>
                    </b-input-group-append>
                    </b-input-group>
                </b-form-group>
            </b-col>

            <b-col md="4" offset-md="4" >
                <b-form-group
                    label="Por pagina"
                    label-cols-sm="6"
                    label-cols-md="4"
                    label-cols-lg="3"
                    label-align-sm="right"
                    label-size="sm"
                    label-for="perPageSelect"
                    class="mb-0"
                >
                    <b-form-select
                        v-model="perPage"
                        id="perPageSelect"
                        size="sm"
                        :options="pageOptions"
                    >
                    </b-form-select>
                </b-form-group>
            </b-col>     

            <b-col lg="4" class="mb-3"  >
                <b-form-group
                label="Buscar por:"
                label-cols-sm="3"
                label-align-sm="right"
                label-size="sm"
                description="Deje todo sin marcar para filtrar todos los datos"
                class="mb-0">
                <b-form-checkbox-group v-model="filterOn" class="mt-1">
                    <b-form-checkbox value="name">Nombre</b-form-checkbox>
                    <b-form-checkbox value="email">Email</b-form-checkbox>
                </b-form-checkbox-group>
                </b-form-group>
            </b-col>

            <b-col md="4" offset-md="4" class="mt-2 mb-3" >
                <b-pagination
                    v-model="currentPage"
                    :total-rows="totalRows"
                    :per-page="perPage"
                    align="fill"
                    size="sm"
                >
                </b-pagination>
            </b-col>

            <b-col lg="12" sm="6" md="6" class="mt-0 text-left">
                <b-button variant="success" class="my-1 py-0">
                    TODOS LOS USUARIOS
                </b-button >
                <b-button variant="primary" class="my-1 py-0">
                    USUARIOS ENCONTRADOS <b-badge variant="dark"> {{totalRows}}</b-badge> 
                </b-button >    
            </b-col>
        </b-row>     

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
        >

            <template v-slot:table-busy>
                <div class="text-center text-danger my-2">
                <b-spinner class="align-middle"></b-spinner>
                <strong>Loading...</strong>
                </div>
            </template>

            <template v-slot:cell(role_id)="row" >
                <div class=" text-uppercase">
                    <b-badge  size="sm" variant="dark" class=" p-2" v-if=" row.item.role_id == 1">
                        Administrador
                    </b-badge>
                    <b-badge  size="sm" variant="warning" class=" p-2" v-if=" row.item.role_id == 2">
                        Registrado
                    </b-badge>
                    <b-badge  size="sm" variant="info" class=" p-2" v-if=" row.item.role_id == 3">
                        Cliente
                    </b-badge>
                    <b-badge  size="sm" variant="success" class=" p-2" v-if=" row.item.role_id == 4">
                        Comercial
                    </b-badge>
                    <b-badge  size="sm" variant="primary" class=" p-2" v-if=" row.item.role_id == 5">
                        Operario
                    </b-badge>
                </div>              
            </template>

            <template v-slot:cell(acciones)="row" >
                <b-button variant="warning"  @click="FillUsers(row.item)" class="mr-1 py-0">
                    <i class="fas fa-pencil-alt"></i>
                    editar
                </b-button>

                <b-button variant="danger"  @click="DeleteUser(row.item)" class="mr-1 py-0">
                    <i class="fas fa-trash-alt"></i>
                    borrar
                </b-button>              
            </template>

        </b-table>

        <b-modal 
            id="edit-user" 
            title="EDITAR USUARIO" 
            header-bg-variant="warning" 
        >
            <b-form >
                <b-form-group
                    label-cols-sm="3"
                    label="Nombre :"
                    label-for="nombre"
                    label-class="font-weight-bold"
                >
                    <b-form-input id="nombre" v-model="User.name" ></b-form-input>
                </b-form-group>

                <b-form-group
                    label-cols-sm="3"
                    label="Correo :"
                    label-for="email"
                    label-class="font-weight-bold"
                >
                    <b-form-input id="email" v-model="User.email" ></b-form-input>
                </b-form-group>

                <b-form-group
                    label-cols-sm="3"
                    label="Permisos:"
                    label-for="rol"
                    label-class="font-weight-bold"
                >

                    <b-form-select id="rol" v-model="User.role_id" class=" col">
                        <option value="2">
                            Registrado
                        </option>
                        <option value="1">
                            Administrador
                        </option>
                        <option value="5">
                            Operario
                        </option>   
                        <option value="4">
                            Comercial
                        </option>                     
                        <option value="3">
                            Cliente
                        </option>                       
                    </b-form-select>
                </b-form-group>
                <b-form-group
                    label-cols-sm="3"
                    label="ClasicGest:"
                    label-for="rol"
                    label-class="font-weight-bold"
                >
                    <b-form-input list="my-list-id" v-model="User.cliente_id"></b-form-input>

                    <datalist id="my-list-id">
                        <option value="SIN CLIENTE" ></option>
                        <option v-for="cliente in clientes" v-bind:key="cliente.index" >{{ cliente.nombre }}</option>
                    </datalist>
                </b-form-group>
                
            </b-form>

            <template v-slot:modal-footer>


                <div class="w-100 text-center">

                    <b-button 
                        size="sm"
                        variant="primary"
                        @click="UpdateUser"
                    >
                        <i class="fas fa-cloud-upload-alt"></i> 
                            Guardar cambios 
                        <i class="fas fa-cloud-upload-alt"></i>
                    </b-button>
                </div>
            </template>

        </b-modal>


        
    </b-container>
</template>

<script>
import { mapState, mapActions } from 'vuex'
    export default {   
        
        data(){
            return{
                columnas: [
                    { key: 'id', sortable: true },
                    { key: 'name', label:'Nombre' },
                    { key: 'empresa', label:'Empresa' },
                    { key: 'telefono', label:'Teléfono' },
                    { key: 'email'},
                     { key: 'cliente_id'},
                    { key: 'role_id', label: 'Rol de usuario', sortable: true },
                    { key: 'acciones'}
                ],
                User:{
                    id: '',
                    name: '',
                    email: '',
                    role_id: '',
                    cliente_id:null
                },
                item: null,                
                filter: null,
                totalRows: 1,
                currentPage: 1,
                perPage: 25,
                pageOptions: [25, 50, 100,200,500],
                filterOn: [],
                sortBy: '',
                clientes: [],
                isBusy: true,
            }            
        },

        mounted(){
            this.getUser()   
            this.getClientes()         
        },

        methods: {

            getUser(){
                var url = '/api/users';
                axios                
                .get(url)
                .then(response=>{
                    this.item =  response.data.users    
                    this.totalRows = this.item.length   
                    this.isBusy = false         
                })
            },

            getClientes(){                
                var url = '/api/clientes';
                axios                
                .get(url)
                .then(response=>{
                    this.clientes =  response.data.clientes        
                })
            },

            FillUsers(RowItem){

                this.User.id = RowItem.id;
                this.User.name = RowItem.name;
                this.User.email = RowItem.email;
                this.User.role_id = RowItem.role_id;                
                if(RowItem.cliente_id == 0){
                    this.User.cliente_id = '';
                }else{
                    this.User.cliente_id = RowItem.cliente_id;
                }                   

                this.$bvModal.show('edit-user');
                
                
            },

            UpdateUser(){                
                this.isBusy = true
                var url = '/api/user/'+this.User.id;
                axios
                .put(url,this.User)
                .then(response=>{
                    this.$bvModal.hide('edit-user')
                    this.getUser()
                    this.$bvToast.toast(response.data.message, {
                        title: 'Mensaje de Sunpro',                        
                        variant: 'success',
                        toaster:'b-toaster-top-right'
                    });    
                                                                                      
                })                             
            },

            DeleteUser(user){
                this.isBusy = true
                var url = '/api/user/'+user.id;
                axios
                .delete(url)
                .then(response=>{
                    var message =  response.data.message
                    this.getUser()    
                    this.$bvToast.toast(response.data.message, {
                        title: 'Mensaje de Sunpro',                        
                        variant: 'warning',
                        toaster:'b-toaster-top-right'
                    });         
                })              

            }


        }
    }
</script>