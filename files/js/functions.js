$(function () {
    $('[data-toggle="tooltip"]').tooltip();
    $(':checkbox').checkboxpicker();
    $('.input-group.date').datepicker({
        format: "dd/mm/yyyy",
        todayBtn: "linked",
        language: "pt-BR"
    });
});


//$(function () {
//    $('.typeahead').typeahead();
//});



$(window).resize(function() {
    var tamanhoJanela = $(window).width();
    var tamanhoSidebar = $(".sidebar").outerWidth();
    if(tamanhoJanela>768){
        $(".sidebar").removeClass("sidebar-fechado");
        $(".sidebar").css({'left':'0px'});
    }
    else{
        $(".sidebar").css({'left':"-"+tamanhoSidebar+"px"});
        $(".sidebar").addClass("sidebar-fechado");
        
    }
});
$(document).ready(function() {
    var tamanhoJanela = $(window).width();
    if(tamanhoJanela<768){
        $(".sidebar").addClass("sidebar-fechado");
    }
    else{
        $(".sidebar").removeClass("sidebar-fechado");
    }
});
$(function(){
    
    $(".exibeMenu").click(function() {
        var tamanhoJanela = $(window).width();
        if(tamanhoJanela<768){
            var tamanhoSidebar = $(".sidebar").outerWidth();
            if($(".sidebar").hasClass("sidebar-fechado")){
                $(".sidebar").css({"left":"-"+tamanhoSidebar+"px","display":"block"}).animate({left: "0px"}, 300);
                $(".sidebar").removeClass("sidebar-fechado");
            }
            else{
                $(".sidebar").css({'left':'0px'}).animate({left: '-'+tamanhoSidebar+'px'}, 300);
                $(".sidebar").addClass("sidebar-fechado");
            }
        }
    });
});




$(function(){
   $('.cpf').mask('999.999.999-99');
   $('.ctps').mask('9999999 99999 aa');
   $('.telefone, .celular').mask('(99)  9999-9999');
   
});

var SITE = SITE || {};
 
SITE.fileInputs = function() {
  var $this = $(this),
      $val = $this.val(),
      valArray = $val.split('\\'),
      newVal = valArray[valArray.length-1],
      $button = $this.siblings('.button');
  if(newVal !== '') {
    $button.text(newVal);
  }
};

$(function() {
    $('.bgParallax').each(function(){
            var $obj = $(this);

            $(window).scroll(function() {
                    var yPos = -($(window).scrollTop() / $obj.data('speed')); 

                    var bgpos = '50% '+ yPos + 'px';

                    $obj.css('background-position', bgpos );

            }); 
    });
});


			
