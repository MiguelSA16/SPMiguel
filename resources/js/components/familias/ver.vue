<template>
    <div>
        <b-modal id="modal-ver-familia" header-bg-variant="success" title="VER FAMILIA" size="lg" hide-footer>
            <b-row>
                <b-col lg="4">
                    <b-img fluid thumbnail :src="FamiliaVer.imagen"></b-img>
                </b-col>

                <b-col lg="8">
                    <label class=" text-uppercase font-weight-bold"> Datos de interes: </label>
                    <table class=" table table-striped border-bottom table-sm">
                        <tbody>
                            <tr>
                                <th>Nombre:</th>
                                <td>{{FamiliaVer.nomfam}}</td>
                            </tr>
                            <tr>
                                <th>Grupo de familias:</th>
                                <td>{{FamiliaVer.grupo}}</td>
                            </tr>
                            <tr>
                                <th>Baja web:</th>
                                <td>{{FamiliaVer.baja_web}}</td>
                            </tr>
                            <tr>
                                <th>URL:</th>
                                <td>{{FamiliaVer.slug}}</td>
                            </tr>
                        </tbody>                        
                    </table>

                </b-col>
            </b-row>
        </b-modal>
    </div>    
</template>

<script>
import { mapState } from 'vuex';
export default {
    computed:{
        ...mapState([
            'FamiliaVer'
        ])
    }
}
</script> 