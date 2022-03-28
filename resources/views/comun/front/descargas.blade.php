@extends('layouts.front.vertical')
@section('cuerpo')
<!--OFERTAS-->
<div class="container mt-4">
        <div class="row mt-4 subrayar">
            <div class="col-md-12 text-center">            
                <h1 class="title">
                        OFERTAS
                    <i class="fas fa-download text-sunpro "></i>
                </h1>
            </div> 
        </div>
        <div class=" line-subrayar ml-m-15"></div>

       <div class="row">        
            <div class="col-md-6 mb-4">             
                <h5 class=" titulo mb-3">
                    Cables HDMI
                </h5>
                <div class="row">
                    <div class="col-md-6 ">
                        <a href="{{url('pdf/ofertas/Cables HDMI información y precios.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                            <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                            Descargar
                        </a>                                
                    </div>    
                </div>                                        
            </div>

            <div class="col-md-6 mb-4">             
                <h5 class=" titulo mb-3">
                    Herramientas
                </h5>
                <div class="row">
                    <div class="col-md-6 ">
                        <a href="{{url('pdf/ofertas/Oferta herramientas PVP.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                            <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                            Descargar
                        </a>                                
                    </div>    
                </div>                                        
            </div>
        </div>
        
        <div class="row">        
            <div class="col-md-6 mb-4">             
                <h5 class=" titulo mb-3">
                    ICT II Cobre
                </h5>
                <div class="row">
                    <div class="col-md-6 ">
                        <a href="{{url('pdf/ofertas/Oferta ICT II Cobre.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                            <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                            Descargar
                        </a>                                
                    </div>    
                </div>                                        
            </div>

            <div class="col-md-6 mb-4">             
                <h5 class=" titulo mb-3">
                    IDEAL Slim cable
                </h5>
                <div class="row">
                    <div class="col-md-6 ">
                        <a href="{{url('pdf/ofertas/Oferta lanzamiento IDEAL Slim cable.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                            <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                            Descargar
                        </a>                                
                    </div>    
                </div>                                        
            </div>
        </div>
        
        <div class="row">        
            <div class="col-md-6 mb-4">             
                <h5 class=" titulo mb-3">
                    Rack serie RCE
                </h5>
                <div class="row">
                    <div class="col-md-6 ">
                        <a href="{{url('pdf/ofertas/Oferta Rack serie RCE.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                            <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                            Descargar
                        </a>                                
                    </div>    
                </div>                                        
            </div>

            <div class="col-md-6 mb-4">             
                <h5 class=" titulo mb-3">
                    PANEL IDEAL 24 PUERTOS 19
                </h5>
                <div class="row">
                    <div class="col-md-6 ">
                        <a href="{{url('pdf/ofertas/PANEL IDEAL 24 PUERTOS 19.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                            <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                            Descargar
                        </a>                                
                    </div>    
                </div>                                        
            </div>
        </div>
<!--FIN OFERTAS -->


<div class="container mt-4">
        <div class="row subrayar">
            <div class="col-md-12 text-center">            
                <h1 class="title">
                        CATALOGOS Y FOLLETOS
                    <i class="fas fa-download text-sunpro "></i>
                </h1>
            </div> 
        </div>
    <div class=" line-subrayar ml-m-15"></div>
    
    <div class="row">        
        <div class="col-md-6 mb-4">             
            <h5 class=" titulo mb-3">
                CATÁLOGO DE TECNOLOGÍA DE RED
            </h5>
            <div class="row">
                <div class="col-md-3 ">
                    <img src="{{asset('images/descargas/efb_catalogo.png')}}" style="max-height:150px;border: solid 1.2px;">
                </div>
                <div class="col-md-6 ">
                    <a href="{{url('pdf/descargas/CATALOGO DE TECNOLOGIA DE RED.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                        <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                        Descargar
                    </a>                                
                </div>    
            </div>                                        
        </div>

        <div class="col-md-6 mb-4">             
                <h5 class=" titulo mb-3">
                    CATÁLOGO DE SUNPRO
                </h5>
                <div class="row">
                    <div class="col-md-3 ">
                        <img src="{{asset('images/descargas/catalogo-sunpro.jpg')}}" style="max-height:150px;border: solid 1.2px;">
                    </div>
                    <div class="col-md-6 ">
                        <a href="{{url('pdf/descargas/catalogo.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                            <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                            Descargar
                        </a>                                
                    </div>    
                </div>                                        
            </div>
        </div>
        <!--MATERIAL INFORMATIVO-->
        <div class="row mt-4 subrayar">
            <div class="col-md-12 text-center">            
                <h1 class="title">
                        MATERIAL INFORMATIVO SUNPRORED
                    <i class="fas fa-download text-sunpro "></i>
                </h1>
            </div> 
        </div>
        <div class=" line-subrayar ml-m-15"></div>

        <div class="row">        
            <div class="col-md-6 mb-4">             
                <h5 class=" titulo mb-3">
                    CPR Dca UTP LSZH
                </h5>
                <div class="row">
                    <div class="col-md-3 ">
                        <img src="{{asset('images/descargas/051-CPR-1565.jpg')}}" style="max-height:150px;border: solid 1.2px;">
                    </div>
                    <div class="col-md-6 ">
                        <a href="{{url('pdf/descargas/0051-CPR-1565.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                            <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                            Descargar
                        </a>                                
                    </div>    
                </div>                                        
            </div>

            <div class="col-md-6 mb-4">             
                <h5 class=" titulo mb-3">
                    CPR Eca UTP LSZH
                </h5>
                <div class="row">
                    <div class="col-md-3 ">
                        <img src="{{asset('images/descargas/CPR_CCA_UTP-LSZH.jpg')}}" style="max-height:150px;border: solid 1.2px;">
                    </div>
                    <div class="col-md-6 ">
                        <a href="{{url('pdf/descargas/CPR_CCA_UTP-LSZH.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                            <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                            Descargar
                        </a>                                
                    </div>    
                </div>                                        
            </div>

            <div class="col-md-6 mb-4">             
                <h5 class=" titulo mb-3">
                    CONFORMITY CERTIFICATE ISO 9001 FIBRA OPTICA
                </h5>
                <div class="row">
                    <div class="col-md-3 ">
                        <img src="{{asset('images/descargas/certificado-fibra-optica.jpg')}}" style="max-height:150px;border: solid 1.2px;">
                    </div>
                    <div class="col-md-6 ">
                        <a href="{{url('pdf/descargas/Conformity Certificate ISO 9001 Fibra Optica.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                            <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                            Descargar
                        </a>                                
                    </div>    
                </div>                                        
            </div>

            <div class="col-md-6 mb-4">             
                <h5 class=" titulo mb-3">
                    DECLARACIÓN DE CONFORMIDAD RoHS CE
                </h5>
                <div class="row">
                    <div class="col-md-3 ">
                        <img src="{{asset('images/descargas/cpr-latiguillos.jpg')}}" style="max-height:150px;border: solid 1.2px;">
                    </div>
                    <div class="col-md-6 ">
                        <a href="{{url('pdf/descargas/CPR CE  latiguillos fibra.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                            <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                            Descargar
                        </a>                                
                    </div>    
                </div>                                        
            </div>
            <div class="col-md-6 mb-4">             
                <h5 class=" titulo mb-3">
                    ROHS CE RACK SUNPRO
                </h5>
                <div class="row">
                    <div class="col-md-3 ">
                        <img src="{{asset('images/descargas/rohs-rack-sunpro.jpg')}}" style="max-height:150px;border: solid 1.2px;">
                    </div>
                    <div class="col-md-6 ">
                        <a href="{{url('pdf/descargas/RoHS CE Rack Sunpro.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                            <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                            Descargar
                        </a>                                
                    </div>    
                </div>                                        
            </div>

            <div class="col-md-6 mb-4">             
                <h5 class=" titulo mb-3">
                    DECLARACION DE CONFORMIDAD CE REGLETAS
                </h5>
                <div class="row">
                    <div class="col-md-3 ">
                        <img src="{{asset('images/descargas/declaracion-de-conformidad-ce-regletas.png')}}" style="max-height:150px;border: solid 2px;">
                    </div>
                    <div class="col-md-6 ">
                        <a href="{{url('pdf/descargas/Declaracion de conformidad CE regletas.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                            <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                            Descargar
                        </a>                                
                    </div>    
                </div>                                        
            </div>

            <div class="col-md-6 mb-4">             
                <h5 class=" titulo mb-3">
                    CERTIFICADO DELTA FORCE, SISTEMA CAT6 IDEAL
                </h5>
                <div class="row">
                    <div class="col-md-3 ">
                        <img src="{{asset('images/descargas/CAT6-IDEAL-Certificado-2019-236A.png')}}" style="max-height:150px;border: solid 1.2px;">
                    </div>
                    <div class="col-md-6 ">
                        <a href="{{url('pdf/descargas/2019-236A Sunpro.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                            <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                            Descargar
                        </a>
                        <br>
                        <br><a href="https://certification.madebydelta.com/customers/sunpro/" class="text-decoration-none" target="_blank">
                        <p style="color: #0d4770;" class=" font-weight-bold">Web Delta Force </p>
                        <img src="{{asset('images/descargas/logo_force.png')}}" style="max-height:35px;border: solid 1.2px;">
                        </a>                      
                    </div>    
                </div>                                        
            </div>
            
            <div class="col-md-6 mb-4">             
                    <h5 class=" titulo mb-3">
                        Sunpro Dca
                    </h5>
                    <div class="row">
                        <div class="col-md-3 ">
                            <img src="{{asset('images/descargas/051-CPR-1565.jpg')}}" style="max-height:150px;border: solid 1.2px;">
                        </div>
                        <div class="col-md-6 ">
                            <a href="{{url('pdf/descargas/Sunpro Dca.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                                <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                                Descargar
                            </a>                                
                        </div>    
                    </div>                                        
                </div>
        </div> 
        <!--FIN DE MATERIAL INFORMATIVO-->
   
        <!--FOLLETOS-->
        <div class="row mt-3 subrayar">
                <div class="col-md-12 text-center">            
                    <h1 class="title">
                            FOLLETOS
                        <i class="fas fa-download text-sunpro "></i>
                    </h1>
                </div> 
            </div>
            <div class=" line-subrayar ml-m-15"></div>
    
            <div class="row">        
                <div class="col-md-6 mb-4">             
                    <h5 class=" titulo mb-3">
                        REGLAMENTO DE PRODUCTOS DE CONSTRUCCIÓN (RCP)
                    </h5>
                    <div class="row">
                        <div class="col-md-3 ">
                            <img src="{{asset('images/descargas/reglamentos produc construcion.jpg')}}" style="max-height:150px;border: solid 1.2px;">
                        </div>
                        <div class="col-md-6 ">
                            <a href="{{url('pdf/descargas/REGLAMENTO DE PRODUCTOS DE CONSTRUCCIÓN (RCP).pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                                <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                                Descargar
                            </a>                                
                        </div>    
                    </div>                                        
                </div>
    
                <div class="col-md-6 mb-4">             
                    <h5 class=" titulo mb-3">
                        VIDEOVIGILANCIA FULL HD
                    </h5>
                    <div class="row">
                        <div class="col-md-3 ">
                            <img src="{{asset('images/descargas/video vigilancia.png')}}" style="max-height:150px;border: solid 1.2px;">
                        </div>
                        <div class="col-md-6 ">
                            <a href="{{url('pdf/descargas/VIDEOVIGILANCIA FULL HD.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                                <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                                Descargar
                            </a>                                
                        </div>    
                    </div>                                        
                </div>
    
                <div class="col-md-6 mb-4">             
                    <h5 class=" titulo mb-3">
                        KEYSTONE MODUL BROCHURE
                    </h5>
                    <div class="row">
                        <div class="col-md-3 ">
                            <img src="{{asset('images/descargas/keystone modul.png')}}" style="max-height:150px;border: solid 1.2px;">
                        </div>
                        <div class="col-md-6 ">
                            <a href="{{url('pdf/descargas/KEYSTONE MODUL BROCHURE.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                                <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                                Descargar
                            </a>                                
                        </div>    
                    </div>                                        
                </div>
    
                <div class="col-md-6 mb-4">             
                    <h5 class=" titulo mb-3">
                        SISTEMA DE ESTANTE INFRALAN®
                    </h5>
                    <div class="row">
                        <div class="col-md-3 ">
                            <img src="{{asset('images/descargas/sistemas estante infralan.png')}}" style="max-height:150px;border: solid 1.2px;">
                        </div>
                        <div class="col-md-6 ">
                            <a href="{{url('pdf/descargas/SISTEMA DE ESTANTE INFRALAN.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                                <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                                Descargar
                            </a>                                
                        </div>    
                    </div>                                        
                </div>
            </div>
        <!--FIN DE FOLLETOS-->
            
        <!--MATERIAL INFORMATIVO-->

        <div class="row mt-3 subrayar">
            <div class="col-md-12 text-center">            
                <h1 class="title">
                        MATERIAL INFORMATIVO
                    <i class="fas fa-download text-sunpro "></i>
                </h1>
            </div> 
        </div>
        <div class=" line-subrayar ml-m-15"></div>
    
        <div class="row">        
            <div class="col-md-6 mb-4">             
                <h5 class=" titulo mb-3">
                        GARANTÍA DEL SISTEMA DE 25 AÑOS EN SISTEMAS DE CABLEADO DE COBRE (ECOLAN®)
                </h5>
                <div class="row">
                    <div class="col-md-3 ">
                        <img src="{{asset('images/descargas/25-year-cable.png')}}" style="max-height:150px;border: solid 1.2px;">
                    </div>
                    <div class="col-md-6 ">
                        <a href="{{url('pdf/descargas/Infoblatt_25_Systemgarantie_ECOLAN__Kupferverkabelungssysteme_EN.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                            <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                            Descargar
                        </a>                                
                    </div>    
                </div>                                        
            </div>

            <div class="col-md-6 mb-4">             
                <h5 class=" titulo mb-3">
                    GARANTÍA DEL SISTEMA DE 25 AÑOS EN SISTEMAS DE CABLEADO DE COBRE (INFRALAN®)
                </h5>
                <div class="row">
                    <div class="col-md-3 ">
                        <img src="{{asset('images/descargas/25-year-cable-infralan.png')}}" style="max-height:150px;border: solid 1.2px;">
                    </div>
                    <div class="col-md-6 ">
                        <a href="{{url('pdf/descargas/Infoblatt_25_Systemgarantie_INFRALAN__Kupferverkabelungssysteme_EN.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                            <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                            Descargar
                        </a>                                
                    </div>    
                </div>                                        
            </div>

            <div class="col-md-6 mb-4">             
                <h5 class=" titulo mb-3">
                    GARANTÍA DEL SISTEMA DE 25 AÑOS EN SISTEMAS DE TRANSMISIÓN DE FIBRA ÓPTICA (INFRALAN®)
                </h5>
                <div class="row">
                    <div class="col-md-3 ">
                        <img src="{{asset('images/descargas/25-year-cable-fibra-infralan.png')}}" style="max-height:150px;border: solid 1.2px;">
                    </div>
                    <div class="col-md-6 ">
                        <a href="{{url('pdf/descargas/Infoblatt_25_Systemgarantie_INFRALAN___Glasfaseruebertragungssysteme_EN.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                            <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                            Descargar
                        </a>                                
                    </div>    
                </div>                                        
            </div>
        </div>
        <!--FIN DE MATERIAL INFORMATIVO-->

        <!--DECLARACIONES DE RENDIMIENTO-->
        <div class="row mt-3 subrayar">
            <div class="col-md-12 text-center">            
                <h1 class="title">
                        DECLARACIONES DE RENDIMIENTO
                    <i class="fas fa-download text-sunpro "></i>
                </h1>
            </div> 
        </div>
        <div class=" line-subrayar ml-m-15"></div>

        <div class="row">        
            <div class="col-md-6 mb-4">             
                <h5 class=" titulo mb-3">
                    99820_1-CPR
                </h5>
                <div class="row">
                    <div class="col-md-6 ">
                        <a href="{{url('pdf/descargas/99820_1-CPR.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                            <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                            Descargar
                        </a>                                
                    </div>    
                </div>                                        
            </div>

            <div class="col-md-6 mb-4">             
                <h5 class=" titulo mb-3">
                    99963_305-CPR
                </h5>
                <div class="row">
                    <div class="col-md-6 ">
                        <a href="{{url('pdf/descargas/99963_305-CPR.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                            <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                            Descargar
                        </a>                                
                    </div>    
                </div>                                        
            </div>

            <div class="col-md-6 mb-4">             
                <h5 class=" titulo mb-3">
                    99969_305-CPR
                </h5>
                <div class="row">
                    <div class="col-md-6 ">
                        <a href="{{url('pdf/descargas/99969_305-CPR.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                            <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                            Descargar
                        </a>                                
                    </div>    
                </div>                                        
            </div>

            <div class="col-md-6 mb-4">             
                <h5 class=" titulo mb-3">
                    99969_500-CPR
                </h5>
                <div class="row">
                    <div class="col-md-6 ">
                        <a href="{{url('pdf/descargas/99969_500-CPR.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                            <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                            Descargar
                        </a>                                
                    </div>    
                </div>                                        
            </div>

            <div class="col-md-6 mb-4">             
                <h5 class=" titulo mb-3">
                    99978.X-CPR
                </h5>
                <div class="row">
                    <div class="col-md-6 ">
                    <a href="{{url('pdf/descargas/99978.X-CPR.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                        <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                        Descargar
                    </a>                                
                    </div>    
                </div>                                        
            </div>

            <div class="col-md-6 mb-4">             
                <h5 class=" titulo mb-3">
                    99980.X-CPR
                </h5>
                <div class="row">
                    <div class="col-md-6 ">
                        <a href="{{url('pdf/descargas/99980.X-CPR.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                            <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                            Descargar
                        </a>                                
                    </div>    
                </div>                                        
            </div>

            <div class="col-md-6 mb-4">             
                <h5 class=" titulo mb-3">
                    99980DX.X-CPR
                </h5>
                <div class="row">
                    <div class="col-md-6 ">
                    <a href="{{url('pdf/descargas/99980DX.X-CPR.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                        <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                        Descargar
                    </a>                                
                    </div>    
                </div>                                        
            </div>

            <div class="col-md-6 mb-4">             
                <h5 class=" titulo mb-3">
                    99981.X-CPR
                </h5>
                <div class="row">
                    <div class="col-md-6 ">
                        <a href="{{url('pdf/descargas/99981.X-CPR.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                            <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                            Descargar
                        </a>                                
                    </div>    
                </div>                                        
            </div>

            <div class="col-md-6 mb-4">             
                <h5 class=" titulo mb-3">
                    99981DX.X-CPR
                </h5>
                <div class="row">
                    <div class="col-md-6 ">
                    <a href="{{url('pdf/descargas/99981DX.X-CPR.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                        <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                        Descargar
                    </a>                                
                    </div>    
                </div>                                        
            </div>

            <div class="col-md-6 mb-4">             
                <h5 class=" titulo mb-3">
                    99983.X-CPR
                </h5>
                <div class="row">
                    <div class="col-md-6 ">
                    <a href="{{url('pdf/descargas/99983.X-CPR.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                        <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                        Descargar
                    </a>                                
                    </div>    
                </div>                                        
            </div>

            <div class="col-md-6 mb-4">             
                <h5 class=" titulo mb-3">
                    99985.X-CPR
                </h5>
                <div class="row">
                    <div class="col-md-6 ">
                    <a href="{{url('pdf/descargas/99985.X-CPR.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                        <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                        Descargar
                    </a>                                
                    </div>    
                </div>                                        
            </div>

            <div class="col-md-6 mb-4">             
                <h5 class=" titulo mb-3">
                    99985DX.X-CPR
                </h5>
                <div class="row">
                    <div class="col-md-6 ">
                    <a href="{{url('pdf/descargas/99985DX.X-CPR.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                        <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                        Descargar
                    </a>                                
                    </div>    
                </div>                                        
            </div>

            <div class="col-md-6 mb-4">             
                <h5 class=" titulo mb-3">
                    11930515-CPR
                </h5>
                <div class="row">
                    <div class="col-md-6 ">
                    <a href="{{url('pdf/descargas/11930515-CPR.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                        <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                        Descargar
                    </a>                                
                    </div>    
                </div>                                        
            </div>

            <div class="col-md-6 mb-4">             
                <h5 class=" titulo mb-3">
                    LWL_UDQ4_24
                </h5>
                <div class="row">
                    <div class="col-md-6 ">
                    <a href="{{url('pdf/descargas/LWL_UDQ4_24.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                        <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                        Descargar
                    </a>                                
                    </div>    
                </div>                                        
            </div>

            <div class="col-md-6 mb-4">             
                <h5 class=" titulo mb-3">
                    LWL_UDQ48_144
                </h5>
                <div class="row">
                    <div class="col-md-6 ">
                    <a href="{{url('pdf/descargas/LWL_UDQ48_144.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                        <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                        Descargar
                    </a>                                
                    </div>    
                </div>                                        
            </div>

            <div class="col-md-6 mb-4">             
                <h5 class=" titulo mb-3">
                    MK7100_1-CPR
                </h5>
                <div class="row">
                    <div class="col-md-6 ">
                    <a href="{{url('pdf/descargas/MK7100_1-CPR.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                        <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                        Descargar
                    </a>                                
                    </div>    
                </div>                                        
            </div>

            <div class="col-md-6 mb-4">             
                <h5 class=" titulo mb-3">
                    MK7101.X-CPR
                </h5>
                <div class="row">
                    <div class="col-md-6 ">
                    <a href="{{url('pdf/descargas/MK7101.X-CPR.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                        <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                        Descargar
                    </a>                                
                    </div>    
                </div>                                        
            </div>

            <div class="col-md-6 mb-4">             
                <h5 class=" titulo mb-3">
                    MK7101DX.X-CPR
                </h5>
                <div class="row">
                    <div class="col-md-6 ">
                        <a href="{{url('pdf/descargas/MK7101DX.X-CPR.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                            <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                            Descargar
                        </a>                                
                    </div>    
                </div>                                        
            </div>

            <div class="col-md-6 mb-4">             
                <h5 class=" titulo mb-3">
                    UDQ4-24A-CPR
                </h5>
                <div class="row">
                    <div class="col-md-6 ">
                        <a href="{{url('pdf/descargas/UDQ4-24A-CPR.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                            <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                            Descargar
                        </a>                                
                    </div>    
                </div>                                        
            </div>

            <div class="col-md-6 mb-4">             
            <h5 class=" titulo mb-3">
                UDQ48A-CPR
            </h5>
            <div class="row">
                <div class="col-md-6 ">
                    <a href="{{url('pdf/descargas/UDQ48A-CPR.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                        <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                        Descargar
                    </a>                                
                </div>    
            </div>                                        
            </div>

            <div class="col-md-6 mb-4">             
                <h5 class=" titulo mb-3">
                    UDQ48AV-CPR
                </h5>
                <div class="row">
                    <div class="col-md-6 ">
                        <a href="{{url('pdf/descargas/UDQ48AV-CPR.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                            <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                            Descargar
                        </a>                                
                    </div>    
                </div>                                        
            </div>
        </div>
        <!-- FIN DE DECLARACIONES DE RENDIMIENTO-->

        <!--CERTIFICADOS-->
        <div class="row mt-3 subrayar">
                <div class="col-md-12 text-center">            
                    <h1 class="title">
                            CERTIFICADOS
                        <i class="fas fa-download text-sunpro "></i>
                    </h1>
                </div> 
            </div>
            <div class=" line-subrayar ml-m-15"></div>
    
            <div class="row">        
                <div class="col-md-6 mb-4">             
                    <h5 class=" titulo mb-3">
                        99820_1-CPR
                    </h5>
                    <div class="row">
                        <div class="col-md-6 ">
                            <a href="{{url('pdf/descargas/99820_1-CPR.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                                <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                                Descargar
                            </a>                                
                        </div>    
                    </div>                                        
                </div>
    
                <div class="col-md-6 mb-4">             
                    <h5 class=" titulo mb-3">
                        99963_305-CPR
                    </h5>
                    <div class="row">
                        <div class="col-md-6 ">
                            <a href="{{url('pdf/descargas/99963_305-CPR.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                                <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                                Descargar
                            </a>                                
                        </div>    
                    </div>                                        
                </div>
    
                <div class="col-md-6 mb-4">             
                    <h5 class=" titulo mb-3">
                        99969_305-CPR
                    </h5>
                    <div class="row">
                        <div class="col-md-6 ">
                            <a href="{{url('pdf/descargas/99969_305-CPR.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                                <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                                Descargar
                            </a>                                
                        </div>    
                    </div>                                        
                </div>
    
                <div class="col-md-6 mb-4">             
                    <h5 class=" titulo mb-3">
                        99969_500-CPR
                    </h5>
                    <div class="row">
                        <div class="col-md-6 ">
                            <a href="{{url('pdf/descargas/99969_500-CPR.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                                <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                                Descargar
                            </a>                                
                        </div>    
                    </div>                                        
                </div>
    
                <div class="col-md-6 mb-4">             
                    <h5 class=" titulo mb-3">
                        99978.X-CPR
                    </h5>
                    <div class="row">
                        <div class="col-md-6 ">
                        <a href="{{url('pdf/descargas/99978.X-CPR.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                            <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                            Descargar
                        </a>                                
                        </div>    
                    </div>                                        
                </div>
    
                <div class="col-md-6 mb-4">             
                    <h5 class=" titulo mb-3">
                        99980.X-CPR
                    </h5>
                    <div class="row">
                        <div class="col-md-6 ">
                            <a href="{{url('pdf/descargas/99980.X-CPR.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                                <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                                Descargar
                            </a>                                
                        </div>    
                    </div>                                        
                </div>
    
                <div class="col-md-6 mb-4">             
                    <h5 class=" titulo mb-3">
                        99980DX.X-CPR
                    </h5>
                    <div class="row">
                        <div class="col-md-6 ">
                        <a href="{{url('pdf/descargas/99980DX.X-CPR.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                            <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                            Descargar
                        </a>                                
                        </div>    
                    </div>                                        
                </div>
    
                <div class="col-md-6 mb-4">             
                    <h5 class=" titulo mb-3">
                        99981.X-CPR
                    </h5>
                    <div class="row">
                        <div class="col-md-6 ">
                            <a href="{{url('pdf/descargas/99981.X-CPR.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                                <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                                Descargar
                            </a>                                
                        </div>    
                    </div>                                        
                </div>
    
                <div class="col-md-6 mb-4">             
                    <h5 class=" titulo mb-3">
                        99981DX.X-CPR
                    </h5>
                    <div class="row">
                        <div class="col-md-6 ">
                        <a href="{{url('pdf/descargas/99981DX.X-CPR.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                            <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                            Descargar
                        </a>                                
                        </div>    
                    </div>                                        
                </div>
    
                <div class="col-md-6 mb-4">             
                    <h5 class=" titulo mb-3">
                        99983.X-CPR
                    </h5>
                    <div class="row">
                        <div class="col-md-6 ">
                        <a href="{{url('pdf/descargas/99983.X-CPR.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                            <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                            Descargar
                        </a>                                
                        </div>    
                    </div>                                        
                </div>

                <div class="col-md-6 mb-4">             
                        <h5 class=" titulo mb-3">
                            99983.X-CPR
                        </h5>
                        <div class="row">
                            <div class="col-md-6 ">
                            <a href="{{url('pdf/descargas/99983.X-CPR.pdf')}}" target="_blank" class="text-decoration-none subtitle ">
                                <i class="far fa-file-pdf bg-pdf size-20 text-danger"></i>
                                Descargar
                            </a>                                
                            </div>    
                        </div>                                        
                    </div>
        </div>
        <!--FIN DE CERTIFICADOS-->
</div>       
@endsection