/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

//Articulos
Vue.component('v-articulos-fabricacion'      , require('./components/articulos/fabricacion.vue').default);
Vue.component('v-articulos-alta'            , require('./components/articulos/alta.vue').default);
Vue.component('v-articulos-with-stock'      , require('./components/articulos/with_stock.vue').default);
Vue.component('v-articulos-baja'            , require('./components/articulos/baja.vue').default);
Vue.component('editar-articulo'             , require('./components/articulos/editar.vue').default);
Vue.component('ver-articulo'                , require('./components/articulos/ver.vue').default);

//Familias
Vue.component('v-familias'          , require('./components/familias/listFamilias.vue').default);
Vue.component('editar-familia'      , require('./components/familias/editar.vue').default);
Vue.component('ver-familia'         , require('./components/familias/ver.vue').default);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//User
Vue.component('v-users'          , require('./components/users/listUsers.vue').default);

//Herramientas
Vue.component('v-agrupar-articulo'  , require('./components/herramientas/agrupar_articulos.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



import Vue from 'vue'
import Vuex from 'vuex'
import CKEditor from '@ckeditor/ckeditor5-vue'

import BootstrapVue from 'bootstrap-vue'



Vue.use(BootstrapVue)
Vue.use(Vuex)
Vue.use( CKEditor )

const store = new Vuex.Store({
    
    state:{

        Articulo        : {

            id          : '' ,     
            imagen      : '' ,  
            nombre      : '' ,
            baja        : '' ,
            catalogo    : '' ,
            oferta      : '' ,
            familia_id  : '' ,
            pdf         : '' ,
            certificado : '' ,
            codigo      : '' ,
            grupo       : '' ,
            color       : '' ,
            longitud    : '' ,
            ancho       : '' ,
            descripcion : '' ,
            slug        : '' 
        },

        ArticuloVer     : {

            id          : '',      
            nombre      : '' ,
            baja        : '' ,
            familia_id  : '' ,
            pdf         : '' ,
            codigo      : '' ,
            grupo       : '' ,
            color       : '' ,
            longitud    : '' ,
            ancho       : '' ,
            descripcion : '' ,
            slug        : '' ,
            stock       : 0
        },

        Familia         : {
            id          : '',       
            imagen      : '',  
            nomfam      : '',  
            claparent   : '',  
            slug        : '',  
            grupo       : '',  
            baja_web    : ''  
        },

        FamiliaVer      :{
            id          : '',       
            imagen      : '',  
            nomfam      : '',  
            claparent   : '',  
            slug        : '',  
            grupo       : '',  
            baja_web    : ''  
        },

        users            : [],

        Imagenes        : [],

        movAlmArticulos : [],  
        movArticulo     : [],     
        stockRestante   : 0,


        articulosAlta   : [],
        articulosBaja   : [],


        familias        : [],
        consumos        : [],

        totalRows       : 'cargando...',        
        cargando        : true,
        totalImagenes   : ''
    },

    getters: {

        movAlmForArtId: (state) => (claart) => {
          return state.movAlmArticulos.filter(movalm => movalm.claart === claart)
        },

        getArticuloForId: (state) => (id) => {
            return state.articulosAlta.filter(articulo =>articulo.id === id)
        }
    },
   
    mutations:{
           
        fillModalEditar(state, articulo) {              
            
            state.Articulo.id           = articulo.id
            state.Articulo.nombre       = articulo.nombre
            state.Articulo.imagen       = '/images/articulos/'+ articulo.imagen
            state.Articulo.baja         = articulo.baja
            state.Articulo.catalogo     = articulo.catalogo
            state.Articulo.oferta       = articulo.oferta
            state.Articulo.familia_id   = articulo.familia_id
            state.Articulo.pdf          = articulo.pdf
            state.Articulo.certificado  = articulo.certificado
            state.Articulo.codigo       = articulo.codigo
            state.Articulo.grupo        = articulo.grupo
            state.Articulo.color        = articulo.color
            state.Articulo.longitud     = articulo.longitud
            state.Articulo.ancho        = articulo.ancho
            state.Articulo.descripcion  = articulo.descripcion 
            state.Articulo.slug         = articulo.slug 
        },

        fillModalEditarFamilia(state, familia){                 
            
            state.Familia.id        = familia.id
            state.Familia.imagen    = '/images/familias/'+familia.imagen               
            state.Familia.nomfam    = familia.nomfam     
            state.Familia.claparent = familia.claparent      
            state.Familia.slug      = familia.slug        
            state.Familia.grupo     = familia.grupo     
            state.Familia.baja_web  = familia.baja_web 
        },

        fillModalVerFamilia(state, familia){
            state.FamiliaVer.id        = familia.id
            state.FamiliaVer.imagen    = '/images/familias/'+familia.imagen               
            state.FamiliaVer.nomfam    = familia.nomfam     
            state.FamiliaVer.claparent = familia.claparent      
            state.FamiliaVer.slug      = familia.slug        
            state.FamiliaVer.grupo     = familia.grupo     
            state.FamiliaVer.baja_web  = familia.baja_web
        },

        cambiarImagenArt(state,imagenArt){

            state.Articulo.imagen = imagenArt
        },

        cambiarImagenFamilia(state,imagenFam){

            state.Familia.imagen = imagenFam
        },
        
        fillModalVer(state, id){
            
            axios
                .get('/api/articulo/'+id)
                .then(response =>{
                    state.ArticuloVer.id        = response.data.articulo.id                    
                    state.ArticuloVer.imagen    = response.data.articulo.imagen
                    state.ArticuloVer.nombre    = response.data.articulo.nombre
                    state.ArticuloVer.familia   = response.data.articulo.familia
                    state.ArticuloVer.pdf       = response.data.articulo.pdf                       
                    state.ArticuloVer.codigo    = response.data.articulo.codigo                    
                    state.ArticuloVer.refprov   = response.data.articulo.refprov
                    state.ArticuloVer.longitud  = response.data.articulo.longitud
                    state.ArticuloVer.color     = response.data.articulo.color
                    
                    state.ArticuloVer.pvp1      = response.data.articulo.pvp1
                    state.ArticuloVer.pvp1iva   = response.data.articulo.pvp1iva
                    state.ArticuloVer.pvp2      = response.data.articulo.pvp2
                    state.ArticuloVer.pvp2iva   = response.data.articulo.pvp2iva
                    state.ArticuloVer.stock     = response.data.articulo.stock

                    state.ArticuloVer.descripcion     = response.data.articulo.descripcion
                })
        },

        fillImagenes(state, id){
            
            axios
                .get('/api/articulo/'+id+'/imagenes')
                .then(response=>{
                    state.Imagenes = response.data.imagenes;                              
                })            
        },

        fillArticulosAlta(state,articulos){
            state.articulosAlta = articulos                       
        },

        getFamilias(state,familiasAccion){
            state.familias = familiasAccion
        },

        getConsumo(state,consumoAccion){
            state.consumos = consumoAccion
        },

        fillArticulosBaja(state,articulos){
            state.articulosBaja = articulos
        },

        totalColumnas(state,totalCol){           
            state.totalRows = totalCol
        },

        cargarEstado(state,estado){
            state.cargando = estado
        },

        fillMovAlm(state,movalm){
            
            state.movAlmArticulos = movalm
        },

        fillMovArticulo(state,data){
            state.movArticulo = data
        },

        incrementarStockRestante(state, cantidad){
            state.stockRestante = state.stockRestante + cantidad
        },

        resetStockRestante(state){
            state.stockRestante = 0
        }
    },

    actions:{

        getArticulosAlta({commit}){
            var url = '/api/articulos-alta'; 
            axios
                .get(url)
                .then(response=>{
                    const articulos = response.data.articulos   
                    commit('fillArticulosAlta', articulos)
                    var totalCol = articulos.length
                    commit('totalColumnas',totalCol)    
                    setTimeout(function(){
                        commit('cargarEstado',false)
                    }, 2000);                                      
                });
        },

        getArticulosWithStock({commit}){
            var url = '/api/articulos-with-stock'; 
            axios
                .get(url)
                .then(response=>{
                    const articulos = response.data.articulos   
                    commit('fillArticulosAlta', articulos)
                    var totalCol = articulos.length
                    commit('totalColumnas',totalCol)    
                    setTimeout(function(){
                        commit('cargarEstado',false)
                    }, 2000);                                      
                });
        },

        getArticulosBaja({commit}){
            var url = '/api/articulos-baja'; 
            axios
                .get(url)
                .then(response=>{
                    const articulos = response.data.articulos   
                    commit('fillArticulosBaja', articulos)    
                    var totalCol = articulos.length
                    commit('totalColumnas',totalCol)  
                    setTimeout(function(){           
                        commit('cargarEstado',false)      
                    },2000);                                    
                });
        },

        getFamilias({commit}){
            var url = '/api/familias';
            axios
                .get(url)
                .then(response=>{
                    const familias = response.data.familias
                    commit('getFamilias',familias)
                    var totalCol = familias.length
                    commit('totalColumnas',totalCol)    
                    setTimeout(function(){
                        commit('cargarEstado',false)
                    }, 2000);             
                    
                });
        },

        getConsumo({commit}){
            var url = '/api/articulos-consumo';
            axios
                .get(url)
                .then(response=>{
                    const consumo = response.data.consumo
                    commit('getConsumo',consumo)  
                });
        },

        getMovAlm({commit}){

            var url = '/api/movalm';
            axios
                .get(url)
                .then(reponse=>{
                    const movalm = reponse.data.movalm
                    commit('fillMovAlm',movalm)
                });
        }
    }
});
 
const app = new Vue({
    el: '#app',
    store : store
});
