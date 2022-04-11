<template>
        <b-container fluid>
           <b-container>
                <b-form-row class=" my-1 pt-1 justify-content-center" >
                    <b-col sm="1">
                        <label
                            label-cols-sm="3"
                            label-for="rol"
                            label-class="font-weight-bold"
                            class="my-1"
                        >
                            ClasicGest:
                        </label>
                    </b-col>
                    <b-col sm="4">
                        <b-form-input list="my-list-id" v-model="User.cliente_id" size="sm" ></b-form-input>

                        <datalist id="my-list-id" >
                            <option value="SIN CLIENTE" ></option>
                            <option v-for="cliente in clientes" v-bind:key="cliente.index" >{{ cliente.nombre }}</option>
                        </datalist>
                    </b-col>
                    <b-col sm="2">
                        <b-button 
                            size="sm"
                            variant="primary"
                            @click="UpdateUser"
                        >
                            Cambiar de Cliente                       
                        </b-button>
                    </b-col>
                 </b-form-row>
            </b-container>           
        </b-container>
</template>
<script>
    export default {
        data() {
            return {
                User:{
                    id: '',
                    name: '',
                    email: '',
                    role_id: '',
                    cliente_id:null
                },
                clientes: []
            }
        },
        mounted(){ 
            this.getClientes()         
        },
        methods:{
            getClientes(){                
                var url = '/api/clientes';
                axios                
                .get(url)
                .then(response=>{
                    this.clientes =  response.data.clientes        
                })
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
        }
    }
</script>