var preguntas = [];
var respuestas = [];
var pregunta = 1;
var respClass = 1;	
$(document).on("ready", function(){
    $.getJSON('js/preguntas.json', function(data){
        
        // extrae y despliega las preguntas y alternativas que se encuentran en preguntas.json
        $.each(data.preguntas, function(key, value) {
             
            // guarda la pregunta en el array preguntas
            preguntas.push('<p class="tituloPregunta">' + value['pregunta'] +'</p>');
            preguntas.push('<ul class="respuestas">');

            // guarda las respuestas en el array preguntas
            respClass = 1
            $.each(value['respuestas'], function(key, value) {	
                preguntas.push('<li id="'+ respClass++ +'">' + value +'</li>');
            });		
            preguntas.push('</ul>');
				
            //adjunta cada pregunta al div ".preguntas" del html 
            $('<div>', {
                'id': 'pregunta' + pregunta++,
    		'class': 'pregunta',
    		html: preguntas.join('')
            }).appendTo('.preguntas');
            
            preguntas = [];
        });// # $.each
			
        // adjunta los botones al html
        pregunta = 1;
        $('.preguntas').append('<div class="anterior">Anterior</div>');
        $('.preguntas').append('<div class="siguiente">Siguiente</div>');
        $('.preguntas').append('<div class="finalizar">Finalizar</div>');

        //evento click boton anterior
        $('.anterior').on("click",function(){
            pregunta--;
            cargarPregunta(pregunta);
        });

        //evento click boton siguiente
        $('.siguiente').on("click",function(){
            if($('#pregunta'+ pregunta + ' li.selected').length > 0){
                pregunta++;
                cargarPregunta(pregunta);
            }
        });

        // evento click para seleccionar respuesta
        $('.pregunta li').on("click",function(){
            $(this).parent().children('li').removeClass('selected');
            $(this).addClass('selected');

            // si la pregunta no es la final pasa a la siguiente
            if( pregunta != $('div.pregunta').size()){
                pregunta++;
                cargarPregunta(pregunta);
            }else{
                $('.finalizar').show();
            }
        });

        //evento click boton finalizar
        $('.finalizar').on("click",function(){
            var resultadoEncuesta =[]
            $('li.selected').each(function(key, value) {
                $(this).attr("disabled","disabled");
                //resultadoEncuesta.push($(this).text())
                resultadoEncuesta.push($(this).attr('id'))   
            });

            //envia las respuestas para ser procesadas y guardadas en la db
            $.post('index.php?r=encuestas/insert',
                {pregunta1:resultadoEncuesta[0],pregunta2:resultadoEncuesta[1],
                 pregunta3:resultadoEncuesta[2],pregunta4:resultadoEncuesta[3],pregunta5:resultadoEncuesta[4],
                 pregunta6:resultadoEncuesta[5],pregunta7:resultadoEncuesta[6],pregunta8:resultadoEncuesta[7]
            })
            
            // mensaje de despedida y redireccionamiento.
            preguntas.push('<p style="font-size:26px; margin:100px auto 0 55px;"> Gracias por contestar la encuesta. </p>');	
            $('<div>', {
                'id': 'finEncuesta',
                'class': 'finEncuesta',
                html: preguntas.join('')
            }).appendTo('.preguntas');
            preguntas = [];
            $('.pregunta').hide();
            $('.anterior').hide();
            $('.siguiente').hide();
            $('.finalizar').hide();
            $('#numeroPreguntas').hide();
            $('.finEncuesta').show();

            setTimeout(function() {
                //window.location.href = 'index.php?r=site/index';
                window.location.href = 'resultadoEncuesta.php';
            }, 2000);
        }); //# $('.finalizar').on

        pregunta =1;
        cargarPregunta(pregunta);
    });// #getJSON		
});// #ready
	
function cargarPregunta(pregunta){
    $('.pregunta').hide();
    $('.anterior').show();
    $('.siguiente').hide();
    $('.finalizar').hide();

    // indica en que pregunta nos encontramos y la cantidad total de estas.
    $('#pregunta'+pregunta).show();
    $('#numeroPreguntas').text(pregunta + '/'+ $('.pregunta').size());
    $('.cuestionario').css('height',$('#pregunta'+pregunta).height()+100);

    // esconde el boton anterior si nos encontramos en la pregunta 1
    if( pregunta == 1){
        $('.anterior').hide();
    }
		
    // si la pregunta tiene respuesta seleccionada mostrar boton siguiente o finalizar segun corresponda.
    if($('#pregunta'+ pregunta + ' li.selected').length > 0){
        if( pregunta == $('div.pregunta').size()){
            $('.finalizar').show();
        }else{
            $('.siguiente').show();
        }
    }
}//cargarPregunta
	
