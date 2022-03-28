<template>
    <div>
        <b-modal id="modal-ver" header-bg-variant="success" header-text-variant="light " title="VER ARTICULO" size="xl" hide-footer>
            <b-row>
                <b-col lg="4">
                    <img :src="'/images/articulos/'+ArticuloVer.imagen"  class=" img-fluid">
                </b-col>

                <b-col lg="8">
                    <label class=" text-uppercase font-weight-bold"> Datos de interes: </label>
                    <table class="table table-striped table-sm">
                        <tbody>
                            <tr>
                                <th>Nombre:</th>
                                <td colspan="3">{{ArticuloVer.nombre}}</td>
                            </tr>
                            <tr>
                                <th>Familia:</th>
                                <td colspan="3">{{ArticuloVer.familia}}</td>
                            </tr>
                             <tr>
                                <th>Ficha técnica:</th>
                                <td colspan="3">
                                    <template v-if="ArticuloVer.pdf != '-'">
                                        <b-button variant="dark" size="sm">
                                            <i class="fas fa-file-pdf text-danger"></i>
                                            {{ArticuloVer.pdf}}
                                        </b-button>
                                    </template>     
                                    <template v-else>
                                        <b-button variant="warning" size="sm">
                                            <i class="fas fa-file-pdf text-danger"></i>
                                            Articulo sin ficha técnica
                                        </b-button>
                                    </template>                                   
                                    
                                </td>
                            </tr>
                            <tr>
                                <th>Referencia:</th>
                                <td >{{ArticuloVer.codigo}}</td>
                                <th>Ref. Proveedor:</th>
                                <td >{{ArticuloVer.refprov}}</td>
                            </tr>
                            <tr>
                                <th>Longitud:</th>
                                <td >{{ArticuloVer.longitud}}</td>
                                <th>Color:</th>
                                <td >{{ArticuloVer.color}}</td>
                            </tr>                          
                        </tbody>
                    </table>
                    <label class=" text-uppercase font-weight-bold"> Precios: </label>
                    <table class="table table-striped table-sm">
                        <tbody>
                            <tr>
                                <th></th>
                                <th>Sin I.V.A</th>
                                <th>Con I.V.A</th>
                            </tr>
                            <tr>
                                <th>PVP Normal:</th>  
                                <td>{{ArticuloVer.pvp1}}€</td>
                                <td>{{ArticuloVer.pvp1iva}}€</td>
                            </tr>
                            <tr>
                                <th>PVP Rebajas:</th>  
                                <td>{{ArticuloVer.pvp2}}€</td>
                                <td>{{ArticuloVer.pvp2iva}}€</td>
                            </tr>
                        </tbody>
                    </table>

                    <label class=" text-uppercase font-weight-bold"> Stock: </label>
                    <table class="table table-striped table-sm">
                        <tbody>
                            <tr>
                                <th>Existencias totales:</th>
                                <td v-if="ArticuloVer.stock > '0'" class=" text-success font-weight-bold" >{{ArticuloVer.stock}} uds.</td>
                                <td v-else-if="ArticuloVer.stock < '0'" class=" text-danger font-weight-bold" >{{ArticuloVer.stock}} uds.</td>
                                <td v-else class=" text-danger font-weight-bold" >Articulo sin stock</td>
                            </tr>
                            <tr>
                                <td colspan="2" class=" text-center">
                                    <b-button @click="openModalMovimientos(ArticuloVer.id)" variant="primary" size="sm" class=" text-uppercase font-weight-bold w-75 mt-2">
                                        <i class="fas fa-people-carry"></i>
                                        Ver movimiento articulo
                                        <i class="fas fa-people-carry"></i>
                                    </b-button>
                                </td>
                            </tr>
                        </tbody>
                    </table>                    
                </b-col>     

                <b-col lg="12">
                    <hr class=" mt-0">
                    <label class=" text-uppercase font-weight-bold pl-4"> Descripcion: </label>
                    <div v-html="ArticuloVer.descripcion" class=" px-4 pb-3">
                    </div>
                </b-col>

            </b-row>            
        </b-modal>

        <b-modal scrollable id="modal-movimientos" hide-footer centered header-bg-variant="primary" header-text-variant="light" size="lg" title="MOVIMIENTOS ARTICULO" ok-only>
                      
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Fecha</th>
                        <th scope="col">Operación</th>
                        <th scope="col">Entrada</th>
                        <th scope="col">Salida</th>
                        <th scope="col">Stock</th>
                    </tr>
                </thead>
                <tbody style="heing">

                    <tr v-for="movalm in movArticulo" v-bind:key="movalm.clamov">
                        <th scope="row">
                            {{movalm.fecha}}
                        </th>
                        <td>
                            {{tipOperacion(movalm.tipo)}}        
                        </td>
                        <td>
                            <span v-if="movalm.cantidad > 0" class=" text-success">
                                {{movalm.cantidad}} uds.
                            </span>                   
                        </td>
                        <td>
                            <span v-if="movalm.cantidad < 0" class=" text-danger">
                                {{movalm.cantidad}} uds.
                            </span>    
                        </td>
                        <td>
                            <span v-if="movalm.cantidad > 0" class=" text-success font-weight-bold">                           
                                {{calcularResto(movalm.cantidad)}} uds.
                            </span>
                            <span v-if="movalm.cantidad < 0" class=" text-danger font-weight-bold">                           
                                {{calcularResto(movalm.cantidad)}} uds.
                            </span>
                        </td>
                    </tr>                
                </tbody>
            </table>
        </b-modal>

    </div>    
</template>

<script>
import { mapState, mapActions, mapMutations, mapGetters } from 'vuex';
var totalstock = 0;

export default {

    computed:{
        ...mapState([
            'ArticuloVer',
            'movArticulo'
        ]),

        ...mapGetters([
            'movAlmForArtId'
        ])
    },

    methods:{

        ...mapMutations([
            'fillMovArticulo'
        ]),

        openModalMovimientos(id){
            var moviminetos = this.movAlmForArtId(id)
            totalstock = 0
            this.fillMovArticulo(moviminetos)
            this.$bvModal.show('modal-movimientos')
        },

        calcularResto(cantidad){
            totalstock = totalstock +  parseInt(cantidad)            
            return totalstock
        },

        tipOperacion(tipo){
            switch (tipo) {
                case 1:
                    return 'Albarán Venta';
                    break;
                case 3:
                    return 'Albarán Compra';
                    break;
                case 5:
                    return 'Ajuste manual de Stock';
                    break;
            
                default:
                    return tipo
                    break;
            }
        }
    }

}


</script>
