
            var j = jQuery.noConflict();
            //Inicia o jQuery
            j(function(){
                //chama a função de scroll
                navegation(j('#menu-superior a'),0);
            });
         
            //função para o scroll do menu
            function navegation(elemento,desconto){
                elemento.bind('click',function(event){
                    var anchor = j(this);
                    var calculo = j(anchor.attr('href')).offset().top;
                    if(desconto){
                        var goto = calculo-desconto;
                    }else{
                        var goto = calculo;
                    }
         
                    j('html, body').stop().animate({
                        scrollTop: goto
                    }, 900,'easeInOutExpo');
         
                    event.preventDefault();
            });             
            }