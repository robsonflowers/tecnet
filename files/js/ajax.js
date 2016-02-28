$(function(){
    $('form#add-log').submit(function(){
        
        var contrato = $('form#add-log #contrato').val();
       
        $.getJSON('http://localhost/log/app/ajax/retorna-historico.php?contrato='+contrato, 
        function(data){
            $.each(data, function(i, log){
		// se houver histórico
                if(log.total>0){
                    var dados = $('form#add-log').serialize();
                    var s = '';
                    if(log.total>1){
                        s = 's';
                    }
                    
                    $.ajax({ 
                        type: 'POST',
                        dataType: 'html', 
                        url: 'http://localhost/log/',
                        data: dados+'&idcontrato='+log.idcontrato,
                        success: function() {
                            $('form#add-log').fadeOut().prop('hidden',true);
                            $('.jumbotron').fadeIn(300,function(){
                                $(this).find('h2').text('Log adicionada ao histórico do contrato '+log.contrato);
                            }).fadeOut(5000, function(){
                                $('form#add-log').each (function(){
                                    this.reset();
                                }).fadeIn();
                            });
                        }
                    });
                }
                // se não houver histórico
                else{
                    $('form#add-log').fadeOut().prop('hidden',true);
                    $('.jumbotron').fadeIn(300,function(){
                        $(this).find('h2').text('Não foi encontrado nenhum registro para o contrato informado. Favor informar atendimento anterior');
                    }).fadeOut(5000, function(){
                        $('form#add-log').each (function(){
                            this.reset();
                        }).fadeIn();
                    });
                    $('.panel-title').text('Atendimento Anterior');
                    
                    if($('.field-two').prop('disabled')==true){
                        var tamanho = $(".panel-body").outerHeight();
                        $('.form-add-log').css({"overflow":"hidden"});
                        $('.field-one').css({"position":"relative"}).animate({"top":"-"+tamanho+"px"}, 300);
                        $('.field-one').prop('hidden',true);

                        $('.field-two').prop('disabled',false);
                        $('.field-two').fadeIn(300);
                        $('.field-two').css({"position":"relative","bottom":-tamanho+"px"}).animate({"bottom":"0px"}, 300);
                    }
                    $('#salvar').click(function(){
                        var dados = $('form#add-log').serialize();
                        $.ajax({ 
                            type: 'POST',
                            dataType: 'html', 
                            url: 'http://localhost/log/',
                            data: dados,
                            success: function() {
                                $('form#add-log').fadeOut().prop('hidden',true);
                                $('.jumbotron').fadeIn(300,function(){
                                    $(this).find('h2').text('Adicionado novo contrato, histórico anterior e atual');
                                }).fadeOut(3000, function(){
                                    $('form#add-log').each (function(){
                                        this.reset();
                                    }).fadeIn();
                                });
                            }
                        });
                    });
                }
            });
        });
        return false;
    });
});

// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++                
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// FUNÇÃO PARA ENVIAR VIA AJAX OS DADOS DOS FORMULÁRIOS PARA ADICIONAR CÓDIGO DE BAIXA
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function(){
    $('form#add-codigo-baixa').submit(function(){
        //testar se já existe código informado no BD
//        var contrato = $('form#add-log #contrato').val();
        var dados = $('form#add-codigo-baixa').serialize();
        $.ajax({ 
            type: 'POST',
            dataType: 'html', 
            url: 'http://localhost/log/codigos-de-baixa/',
            data: dados,
            success: function() {
                $('form#add-codigo-baixa').fadeOut().prop('hidden',true);
                $('.jumbotron').fadeIn().fadeOut(3000, function(){
                    $('form#add-codigo-baixa').each (function(){
                        this.reset();
                    }).fadeIn();
                });

                $('#tabela-codigos-baixa').load('#tabela-codigos-baixa thead,tbody');
            }
        });
        return false;
    });
});

// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++                
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// FUNÇÃO PARA BUSCAR TÉCNICOS E INICIALIZAR O AUTOCOMPLETE
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
function tecnicos(){
    $.getJSON('http://localhost/log/app/ajax/retorna-tecnico.php?tecnico=s', 
        function(data){
            var tecnico = [];
            $.each(data, function(i, tec){
                tecnico.push(tec.nome);
                    var $input = $('.typeahead');
                    $input.typeahead({
                        source:tecnico,
                        showHintOnFocus:true,
                    });     
                    $input.change(function() {
                        var current = $input.typeahead('getActive');
                        if (current) {
                            // Some item from your model is active!
//                            if (current.nome == $input.val()) {
                            if (current == $input.val()) {
                                // This means the exact match is found. Use toLowerCase() if you want case insensitive match.
                            } else {
//                                // This means it is only a partial match, you can either add a new item 
                            }
                        } else {
                            // Nothing is active so it is a new value (or maybe empty value)
                        }
                    });
                });
            }
    );
};


// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++                
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// FUNÇÃO PARA ENVIAR VIA AJAX OS DADOS DOS FORMULÁRIOS PARA ADICIONAR TÉCNICO
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function(){
    $('form#add-tecnico').submit(function(){
        //add codigo para testar se já existe código informado no BD
        var dados = $('form#add-tecnico').serialize();
        $.ajax({ 
            type: 'POST',
            dataType: 'html', 
            url: 'http://localhost/log/tecnicos/',
            data: dados,
            success: function() {
                tecnicos();
                $('form#add-tecnico').fadeOut().prop('hidden',true);
                $('.jumbotron').fadeIn().fadeOut(800, function(){
                    $('form#add-tecnico').each (function(){
                        this.reset();
                    }).fadeIn();
                });
                $('#tabela-tecnicos').load('#tabela-tecnicos thead,tbody');
                removeTecnico();
            }
        });
        return false;
    });
});

// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++                
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// FUNÇÃO PARA POPULAR DINAMICAMENTE FORMULÁRIO DE MODAL COM DADOS DA O.S. SELECIONADA 
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function(){
    $('.visualizar').click(function(){
        tecnicos();
        var os = $(this).data('os');
        $.getJSON('http://localhost/log/app/ajax/dados-log.php?OS='+os, 
        function(data){
            $.each(data, function(i, log){
		$('#link-contrato').prop('href','http://localhost/log/historico/'+log.contrato);
                $('#nr-contrato').text(log.contrato);
                $('select[name="log"] option[value="'+log.log+'"]').prop('selected',true);
                $('[name="ordem-servico"]').val(log.os);
                $('[name="tipo-visita"] option[value="'+log.tipo_vt+'"]').prop('selected',true);
                $('[name="data-atendimento"]').val(log.dt_atendimento);
                $('[name="endereco-atendimento"]').val(log.endereco);
                $('[name="tecnico"]').val(log.tecnico);
                
// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------
// COMBO BOX DINÂMICO - JANELAS DE ATENDIMENTO
// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------                
                function mudaSelecaoJanela(textoInicial,valor){
                    $.getJSON('http://localhost/log/app/ajax/retorna-janela.php?segmento='+valor,
                    function(data){
                        var options = '<option value="">'+textoInicial+'</option>';	
                        $.each(data, function(i, d){
                            options += '<option value="'+d.idjanela_atendimento+'">'+d.hr_inicio+' às '+d.hr_fim+'</option>';
                            
                       });
                       $('[name="janela-atendimento"]').html(options);	
                   });
                }
                $('[name="segmento"]').change(
                    function(){
                        var segmento = $(this).val();
                        if(segmento=='pme'){
                            mudaSelecaoJanela('Segmento PME',segmento);
                        }
                        else if(segmento=='normal'){
                            mudaSelecaoJanela('Segmento normal',segmento);
                        }
                    }
                    
                );
                
// -----------------------------------------------------------------------------                
// -----------------------------------------------------------------------------
// COMBO BOX DINÂMICO - CÓDIGOS DE BAIXA
// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------
                function mudaSelecaoCodigos(textoInicial,valor){
                    $.getJSON('http://localhost/log/app/ajax/retorna-codigos-baixa.php?grupo-baixa='+valor,
                    function(data){
                        var options = '<option value="">'+textoInicial+'</option>';	
                        $.each(data, function(i, d){
                            options += '<option value="'+d.idcod_baixa+'">'+d.codigo+' - '+d.nome_codigo+'</option>';
                            
                       });
                       $('[name="codigo-baixa"]').html(options);	
                   });
                }
                
                if($('[name="execucao"]').prop('checked')==false){
                    var valor = 1;
                    var textoInicial = 'Códigos improdutivos';
                    mudaSelecaoCodigos(textoInicial,valor);
                }
                else{
                    var valor = 2;
                    var textoInicial = 'Códigos produtivos';
                    mudaSelecaoCodigos(textoInicial,valor);
                }
                    
                $('[name="execucao"]').change(
                    function(){
                        if($('[name="execucao"]').prop('checked')==false){
                            var valor = 1;
                            var textoInicial = 'Códigos improdutivos';
                            mudaSelecaoCodigos(textoInicial,valor);
                        }
                        else{
                            var valor = 2;
                            var textoInicial = 'Códigos produtivos';
                            mudaSelecaoCodigos(textoInicial,valor);
                        }
                    }
                );

// -----------------------------------------------------------------------------                
// -----------------------------------------------------------------------------
// CONTROLE THUMBS UP/DOWN
// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------                
                if(log.tap=='s'){
                    $('[name="tap"]').prop('checked',true);
                }
                if(log.passivos=='s'){
                    $('[name="passivos"]').prop('checked',true);
                }
                if(log.conectores=='s'){
                    $('[name="conectores"]').prop('checked',true);
                }
            });
        });
    });
});

// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++                
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// FUNÇÃO PARA ENVIAR VIA AJAX OS DADOS DOS FORMULÁRIOS PARA ADICIONAR TÉCNICO
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function removeTecnico(){
    $('.glyphicon-remove').on('click',function(){
        var idTecnico = $(this).find('[name="remove-tecnico"]').val();
        
        $.ajax({ 
            type: 'POST',
            dataType: 'html', 
            url: 'http://localhost/log/tecnicos/',
            data: 'remove-tecnico='+idTecnico,
            success: function() {
                
                $('#tabela-tecnicos').load('#tabela-tecnicos thead,tbody');
                
//                location.reload();
            }
        });
    });
    
});
//--------------------------------------------------------------------------------------------
$(function (){
    $('[name="ver-pacote"]').change(function(){
        var idPacote = $(this).val();
        $.ajax({ 
            type: 'GET',
            dataType: 'html', 
            url: 'http://localhost/tecnet/?page=lineup',
            async: true,
            data: 'idpacote='+idPacote,
            success: function() {
                $('#lineup-wrap').load('http://localhost/tecnet/?page=lineup&idpacote='+idPacote+' #lineup');
            }
        });
    });
});