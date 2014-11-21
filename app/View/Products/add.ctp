<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6 no-js" lang="en"><![endif]-->
<!--[if IE 7 ]><html class="ie ie7 no-js" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="ie ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9 ]><html class="ie ie9 no-js" lang="en"><![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="es"><!--<![endif]-->
    <!-- html5.js for IE less than 9 -->
    <!--[if lt IE 9]>
            <script src="js/html5.js"></script>
    <![endif]-->


    <head>
        <meta charset="UTF-8"/>
        <meta name="description" content=""/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
        <meta name="google-site-verification" content=""/>
        <meta name="copyright" content="imaginamos.com" />
        <meta name="date" content="2013" />
        <meta name="author" content="diseño web: imaginamos.com" />
        <meta name="robots" content="All" />
        <meta name="keywords" content="" />

        <title></title>

        <link type="text/plain" rel="author" href="humans.txt" />
        <link rel="shortcut icon" href="favicon.ico" >
        <link rel="stylesheet" href="formularios/style.css">

  <!--<script src="<?php //echo Yii::app()->request->baseUrl;                ?>/js/formularios/lib/modernizr.min.js"></script>-->

    </head>
    <body>


        <!--=======================Inicio Contenido=============================-->
        <div class="wrapper">
            <div class="espacio">
                <div class="contenedor_formulario2">
                    <form action="">
                        <div class="page border">
                            <div class="clear"></div>
                            <div class="people form">
                                <?php echo $this->Form->create('Person'); ?>
                                <fieldset>

                                    <legend><?php //echo __('Crear Persona');           ?></legend>
                                    <table align="center">
                                        <tr>
                                            <td>
                                                <?php echo $this->Form->input('documento'); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?php
                                                echo $this->Form->input('nombre');
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?php
                                                echo $this->Form->input('apellidos');
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>

                                                <?php
                                                echo $this->Form->input('categoria');
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?php
                                                echo $this->Form->input('entidad');
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?php
                                                echo $this->Form->input('entidad');
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <canvas id="ean" width="150" height="40">
                                        <!--Your browser does not support canvas-elements.-->
                                    </canvas>
                                            </td>
                                        </tr>            
                                    </table>
                                    
                                </fieldset>
                                <!--<input value="Crear" id="crear" name="crear" type="submit">-->
                            </div>
                            <div class="clear"></div>
                            <OBJECT name="WebBrowser1" id="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>
                            <input onclick="imprimir()" id="print" name="print" type="button" value="IMPRIMIR"/>
                            <!--            <a href="javascript:void(0)" title="" onclick="imprimir();" id="imprimirpag" class="left btn-verde">Imprimir</a>-->
                            <!--<a href="javascript:void(0)" title="" class="left btn-verde">Descargar formato</a>
                                <input type="button" name="imprimir" value="Imprimir" onclick="window.print();">
                            <input type="submit" name="" value="Guardar" class="right btn-verde">-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--<script type="text/javascript" src="../jquery.js"></script>-->    
        <!--<script type="text/javascript" src="http://barcode-coder.com/js/jquery-barcode-last.min.js"></script>-->
        <script>
                                $(document).ready(function() {
                                    $("#ean").EAN13("9002236311036", {
                                        number: false,
                                        prefix: false
                                    });
                                });
        </script>
        <!--===Fin Contenido===-->



<!--        <script language="VBScript">
                    SUB Print()
                    alert "ingress"
                    OLECMDID_PRINT = 6
                    OLECMDEXECOPT_DONTPROMPTUSER = 2
                    OLECMDEXECOPT_PROMPTUSER = 1
                    'ACA en caso de usar frames, 
                    'enfocamos el frame a imprimir: 

                    'window.parent.frames.main.document.body.focus() 
                    window.document.body.focus()

                    'Llamamos al comando de Impresión Print 

                    on error resume next
                    call IEWB.ExecWB (OLECMDID_PRINT, - 1)

                    if err.number < > 0 then
                    alert "No se pudo imprimir"
                    end if
                    END SUB
        </script> -->

        <script>
            function imprimir() {
                if ((navigator.appName != "Netscape")) {
                    alert('entro if');
                    window.print();
                } else {
//                    var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>';
//                            document.body.insertAdjacentHTML('beforeEnd', WebBrowser); 
                    document.WebBrowser1.ExecWB(6, -1);
                    document.WebBrowser1.outerHTML = "";
                }
            }
        </script>

        <!--=======================Inicio Footer================================-->

        <!--===Fin Footer===-->


    </body>
</html>


