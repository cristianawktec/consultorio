var inputText = '';
var clicou = true;
var j = jQuery.noConflict();
j(document).ready(function() {

    var metaboxvideo1 = "<div id='indice-sp'><div class='first'><a href='#titcabecalho'>Cabeçalho</a> | <a href='#titheadlines'>Headlines</a> | <a href='#titvideo'>Vídeo</a> | <a href='#titoption'>Formulário</a> | <a href='#titexplicativo'>Texto Explicativo</a> | <a href='#titdepoimentos'>Depoimentos</a> </div> <div><a href='#titrodape'>Rodapé</a> | <a href='#titsocial'>Redes Sociais</a> | <a href='#titcontador'>Contador</a> | <a href='#titanimacoes'>Animações</a> | <a href='#titopcoes'>Opções</a></div></div>";
    
    //j("#metabox_sp_video_1 h3").after(metaboxvideo1);

    j('#data_contador, #data_webinario, #data_video_1, #data_video_2, #data_video_3, #data_video_4, #palestrante_1_hora, #palestrante_2_hora, #palestrante_3_hora, #palestrante_4_hora, #palestrante_5_hora, #palestrante_6_hora, #palestrante_7_hora, #palestrante_8_hora, #palestrante_9_hora, #palestrante_10_hora, #palestrante_11_hora, #palestrante_12_hora, #palestrante_13_hora, #palestrante_14_hora, #palestrante_15_hora, #palestrante_16_hora, #palestrante_17_hora, #palestrante_18_hora, #palestrante_19_hora, #palestrante_20_hora, #palestrante_21_hora, #palestrante_22_hora, #palestrante_23_hora, #palestrante_24_hora, #palestrante_25_hora, #palestrante_26_hora, #palestrante_27_hora, #palestrante_28_hora, #palestrante_29_hora, #palestrante_30_hora, #palestrante_31_hora, #palestrante_32_hora, #palestrante_33_hora, #palestrante_34_hora, #palestrante_35_hora, #palestrante_36_hora, #palestrante_37_hora, #palestrante_38_hora, #palestrante_39_hora, #palestrante_40_hora').datetimepicker({
        lang: 'ptBR',
        i18n: {
            ptBR: {
                months: [
                    'Janeiro', 'Fevereiro', 'Março', 'Abril',
                    'Maio', 'Junho', 'Julho', 'Agosto',
                    'Setembro', 'Outubro', 'Novembro', 'Dezembro',
                ],
                dayOfWeek: [
                    "Dom", "Seg", "Ter", "Qua", "Qui",
                    "Sex", "Sáb"
                ]
            }
        },
        timepicker: true,
        format: 'd/m/Y H:i'
    });

    j('#dia_1_data, #dia_2_data, #dia_3_data, #dia_4_data, #dia_5_data, #dia_6_data, #dia_7_data, #dia_8_data, #dia_9_data, #dia_10_data').datetimepicker({
        lang: 'ptBR',
        i18n: {
            ptBR: {
                months: [
                    'Janeiro', 'Fevereiro', 'Março', 'Abril',
                    'Maio', 'Junho', 'Julho', 'Agosto',
                    'Setembro', 'Outubro', 'Novembro', 'Dezembro',
                ],
                dayOfWeek: [
                    "Dom", "Seg", "Ter", "Qua", "Qui",
                    "Sex", "Sáb"
                ]
            }
        },
        timepicker: false,
        format: 'd/m/Y'
    });


    j("#page_template option:selected").each(function() {
        inputText = j(this).val();
    });
    if (! j("#exibir_campos").is(":checked")) {
        j("#rotulo_1").parent().parent().hide();
        j("#rotulo_2").parent().parent().hide();
        j("#rotulo_3").parent().parent().hide();
        
        j("#icon_rotulo_1").parent().parent().hide();
        j("#icon_rotulo_2").parent().parent().hide();
        j("#icon_rotulo_3").parent().parent().hide();
    }
    j("#exibir_campos").click(function() {
        if (j("#exibir_campos").is(":checked")) {
            j("#rotulo_1").parent().parent().show(500);
            j("#rotulo_2").parent().parent().show(500);
            j("#rotulo_3").parent().parent().show(500);
            
            j("#icon_rotulo_1").parent().parent().show(500);
        j("#icon_rotulo_2").parent().parent().show(500);
        j("#icon_rotulo_3").parent().parent().show(500);
        }
        else {
            j("#rotulo_1").parent().parent().hide(500);
            j("#rotulo_2").parent().parent().hide(500);
            j("#rotulo_3").parent().parent().hide(500);
            
            j("#icon_rotulo_1").parent().parent().hide();
        j("#icon_rotulo_2").parent().parent().hide();
        j("#icon_rotulo_3").parent().parent().hide();
        }
    });
    if (! j("#exibir_contador").is(":checked")) {
        j("#titulo_contador").parent().parent().hide();
        j("#data_contador").parent().parent().hide();
    }
    
    j("#exibir_contador").click(function() {
        if (j("#exibir_contador").is(":checked")) {
            j("#titulo_contador").parent().parent().show(500);
            j("#data_contador").parent().parent().show(500);
        }
        else {
            j("#titulo_contador").parent().parent().hide(500);
            j("#data_contador").parent().parent().hide(500);
        }
    });
    
    if (! j("#exit_popup").is(":checked")) {
        j("#texto_exit").parent().parent().hide();
        j("#url_exit").parent().parent().hide();
    }
    
    j("#exit_popup").click(function() {
        if (j("#exit_popup").is(":checked")) {
            j("#texto_exit").parent().parent().show(500);
            j("#url_exit").parent().parent().show(500);
        }
        else {
            j("#texto_exit").parent().parent().hide(500);
            j("#url_exit").parent().parent().hide(500);
        }
    });
    
    if (! j("#form_modal").is(":checked")) {
        j("#texto_modal").parent().parent().parent().parent().parent().hide();
        j("#botao_cta_modal").parent().parent().hide();
        
    }
    
    j("#form_modal").click(function() {
        if (j("#form_modal").is(":checked")) {
            j("#texto_modal").parent().parent().parent().parent().parent().show(500);
            j("#botao_cta_modal").parent().parent().show();
        }
        else {
            j("#texto_modal").parent().parent().parent().parent().parent().hide(500);
            j("#botao_cta_modal").parent().parent().hide(500);
        }
    });

    if (j('#tipo_video').val() == "embed") {
        j('#video').parent().parent().hide();
        j('#largura_video').parent().parent().hide();
        j('#altura_video').parent().parent().hide();
        j('#embed_video').parent().parent().show();
    }
    else {
        j('#video').parent().parent().show();
        j('#largura_video').parent().parent().show();
        j('#altura_video').parent().parent().show();
        j('#embed_video').parent().parent().hide();
    }
    j('#tipo_video').change(function() {
        if (j('#tipo_video').val() == "embed") {
            j('#video').parent().parent().hide();
            j('#largura_video').parent().parent().hide();
            j('#altura_video').parent().parent().hide();
            j('#embed_video').parent().parent().show();
        }
        else {
            j('#video').parent().parent().show();
            j('#largura_video').parent().parent().show();
            j('#altura_video').parent().parent().show();
            j('#embed_video').parent().parent().hide();
        }
    });

    if (j('#tipo_cta').val() == "codigo") {
        j('#texto_cta').parent().parent().hide();
        j('#cor_cta').parent().parent().hide();
        j('#link_pagamento').parent().parent().hide();
        j('#cta_embed').parent().parent().show();
    }
    else {
        j('#texto_cta').parent().parent().show();
        j('#cor_cta').parent().parent().show();
        j('#link_pagamento').parent().parent().show();
        j('#cta_embed').parent().parent().hide();
    }
    j('#tipo_cta').change(function() {
        if (j('#tipo_cta').val() == "codigo") {
            j('#texto_cta').parent().parent().hide();
            j('#cor_cta').parent().parent().hide();
            j('#link_pagamento').parent().parent().hide();
            j('#cta_embed').parent().parent().show();
        }
        else {
            j('#texto_cta').parent().parent().show();
            j('#cor_cta').parent().parent().show();
            j('#link_pagamento').parent().parent().show();
            j('#cta_embed').parent().parent().hide();
        }
    });

    //exibir cabeçalho
    if ((j("#metabox_sp_video_1").css('display') != 'none') | (j("#metabox_sp_ebook_1").css('display') != 'none')){
        if (!j("#metabox_sp_video_1 #usar_cabecalho, #metabox_sp_ebook_1 #usar_cabecalho").is(":checked")) {
            j("#usar_menu").parent().parent().hide();
            j("#logo").parent().parent().parent().hide();
            j("#cor_cabecalho").parent().parent().parent().parent().hide();
        }
        j("#metabox_sp_video_1 #usar_cabecalho, #metabox_sp_ebook_1 #usar_cabecalho").click(function() {
            if (j("#metabox_sp_video_1 #usar_cabecalho, #metabox_sp_ebook_1 #usar_cabecalho").is(":checked")) {
                j("#usar_menu").parent().parent().show(500);
                j("#logo").parent().parent().parent().show(500);
                j("#cor_cabecalho").parent().parent().parent().parent() .show(500);
            }
            else {
                j("#usar_menu").parent().parent().hide(500);
                j("#logo").parent().parent().parent().hide(500);
                j("#cor_cabecalho").parent().parent().parent().parent().hide(500);
            }
        });
    }

    //exibir rodapé
    if (! j("#usar_rodape").is(":checked")) {
        j("#titulo_rodape").parent().parent().hide();
        j("#texto_rodape").parent().parent().parent().parent().parent().hide();
        j("#cor_rodape").parent().parent().parent().parent().hide();
    }
    j("#usar_rodape").click(function() {
        if (j("#usar_rodape").is(":checked")) {
            j("#titulo_rodape").parent().parent().show(500);
            j("#texto_rodape").parent().parent().parent().parent().parent().show(500);
            j("#cor_rodape").parent().parent().parent().parent() .show(500);
        }
        else {
            j("#titulo_rodape").parent().parent().hide(500);
            j("#texto_rodape").parent().parent().parent().parent().parent().hide(500);
            j("#cor_rodape").parent().parent().parent().parent().hide(500);
        }
    });

    //exibir texto explicativo
    if (! j("#usar_explicativo").is(":checked")) {
        j("#titulo_texto_explicativo").parent().parent().hide();
        j("#texto_explicativo").parent().parent().parent().parent().parent().hide();
        j("#cor_explicativo").parent().parent().parent().parent().hide();
    }
    j("#usar_explicativo").click(function() {
        if (j("#usar_explicativo").is(":checked")) {
            j("#titulo_texto_explicativo").parent().parent().show(500);
            j("#texto_explicativo").parent().parent().parent().parent().parent().show(500);
            j("#cor_rodape").parent().parent().parent().parent() .show(500);
        }
        else {
            j("#titulo_texto_explicativo").parent().parent().hide(500);
            j("#texto_explicativo").parent().parent().parent().parent().parent().hide(500);
            j("#cor_explicativo").parent().parent().parent().parent().hide(500);
        }
    });

    habilitarDepoimentos();
    j("#usar_depoimentos").click(function() {
        habilitarDepoimentos();
    });

    j("#qtde_depoimentos").change(function() {
        habilitarDepoimentos();
    });

    function habilitarDepoimentos(){
        if (j("#usar_depoimentos").is(":checked")) {
            
            j("#qtde_depoimentos").parent().parent().show(500);
            j("#qtde_colunas").parent().parent().show(500);
            j("#titulo_depoimentos").parent().parent().show(500);
            j("#cor_depoimentos").parent().parent().parent().parent().show(500);

            j("#nome_depoimento_1").parent().parent().show(500);
            j("#empresa_depoimento_1").parent().parent().show(500);
            j("#texto_depoimento_1").parent().parent().parent().parent().parent().show(500);
            j("#foto_depoimento_1").parent().parent().parent().show(500);

            if (parseInt(j("#qtde_depoimentos").val()) >=2){
                j("#nome_depoimento_2").parent().parent().show(500);
                j("#empresa_depoimento_2").parent().parent().show(500);
                j("#texto_depoimento_2").parent().parent().parent().parent().parent().show(500);
                j("#foto_depoimento_2").parent().parent().parent().show(500);
            }
            else{
                j("#nome_depoimento_2").parent().parent().hide(500);
                j("#empresa_depoimento_2").parent().parent().hide(500);
                j("#texto_depoimento_2").parent().parent().parent().parent().parent().hide(500);
                j("#foto_depoimento_2").parent().parent().parent().hide(500);
            }

            if (parseInt(j("#qtde_depoimentos").val()) >=3){
                j("#nome_depoimento_3").parent().parent().show(500);
                j("#empresa_depoimento_3").parent().parent().show(500);
                j("#texto_depoimento_3").parent().parent().parent().parent().parent().show(500);
                j("#foto_depoimento_3").parent().parent().parent().show(500);
            }
            else{
                j("#nome_depoimento_3").parent().parent().hide(500);
                j("#empresa_depoimento_3").parent().parent().hide(500);
                j("#texto_depoimento_3").parent().parent().parent().parent().parent().hide(500);
                j("#foto_depoimento_3").parent().parent().parent().hide(500);
            }
            if (parseInt(j("#qtde_depoimentos").val()) >=4){
                j("#nome_depoimento_4").parent().parent().show(500);
                j("#empresa_depoimento_4").parent().parent().show(500);
                j("#texto_depoimento_4").parent().parent().parent().parent().parent().show(500);
                j("#foto_depoimento_4").parent().parent().parent().show(500);
            }
            else{
                j("#nome_depoimento_4").parent().parent().hide(500);
                j("#empresa_depoimento_4").parent().parent().hide(500);
                j("#texto_depoimento_4").parent().parent().parent().parent().parent().hide(500);
                j("#foto_depoimento_4").parent().parent().parent().hide(500);
            }
        }
        else {
            j("#qtde_depoimentos").parent().parent().hide(500);
            j("#qtde_colunas").parent().parent().hide(500);
            j("#titulo_depoimentos").parent().parent().hide(500);
            j("#cor_depoimentos").parent().parent().parent().parent().hide(500);

            j("#nome_depoimento_1").parent().parent().hide(500);
            j("#empresa_depoimento_1").parent().parent().hide(500);
            j("#texto_depoimento_1").parent().parent().parent().parent().parent().hide(500);
            j("#foto_depoimento_1").parent().parent().parent().hide(500);

            j("#nome_depoimento_2").parent().parent().hide(500);
            j("#empresa_depoimento_2").parent().parent().hide(500);
            j("#texto_depoimento_2").parent().parent().parent().parent().parent().hide(500);
            j("#foto_depoimento_2").parent().parent().parent().hide(500);

            j("#nome_depoimento_3").parent().parent().hide(500);
            j("#empresa_depoimento_3").parent().parent().hide(500);
            j("#texto_depoimento_3").parent().parent().parent().parent().parent().hide(500);
            j("#foto_depoimento_3").parent().parent().parent().hide(500);

            j("#nome_depoimento_4").parent().parent().hide(500);
            j("#empresa_depoimento_4").parent().parent().hide(500);
            j("#texto_depoimento_4").parent().parent().parent().parent().parent().hide(500);
            j("#foto_depoimento_4").parent().parent().parent().hide(500);
        }
    }

});