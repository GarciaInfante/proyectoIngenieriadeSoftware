	var preguntas = [];
	var respuestas = [];
	var pregunta = 1;
	var contador = 1;
	var opcion = 0;
	$(document).on("ready", function(){
		$.getJSON('js/preguntas.json', function(data){
			
			// extrae y despliega las preguntas y alternativas que se encuentran en preguntas.json
		  	$.each(data.preguntas, function(key, value) {	

				preguntas.push('<p class="tituloPregunta">' + value['pregunta'] +'</p>');
				preguntas.push('<ul class="respuestas">');
				
				contador = 1;
				opcion = 0;	
				if($(value['opcion']).length){
					opcion = value['opcion'];
				}
				
				$.each(value['respuestas'], function(key, value) {
					if( contador++ != opcion){
						preguntas.push('<li>' + value +'</li>');
					}
					else{
						preguntas.push('<li class="opcion">' + value +'</li>');
					}		
				});		
				preguntas.push('</ul>');
				
				if($(value['preguntaFormulario']).length){
					/*$.each(value['preguntaFormulario'], function(key, value) {*/
						preguntas.push('<div class="anexo">');
						preguntas.push('<p class="preguntaFormulario">' + value['preguntaFormulario'] +'</p>');
						preguntas.push('<input type="text" class="respuestaFormulario" />');
						preguntas.push('</div>');
					//});
				}
				if($(value['subPregunta']).length){
					$.each(value['subPregunta'], function(key, value) {
						preguntas.push('<div class="anexo">');
						preguntas.push('<p class="preguntaFormulario">' + value['pregunta'] +'</p>');
						preguntas.push('<ul class="respuestas">');
						$.each(value['respuestas'], function(key, value) {
							preguntas.push('<li>' + value +'</li>');
						});
						preguntas.push('</ul>');
						preguntas.push('</div>');
					});
				}		
				$('<div>', {
					'id': 'pregunta' + pregunta++,
    				'class': 'pregunta',
    				html: preguntas.join('')
  				}).appendTo('.preguntas');
				preguntas = [];
		  	});
			
			
			
			// botones
			pregunta = 1;
			$('.preguntas').append('<div class="anterior">Anterior</div>');
			$('.preguntas').append('<div class="siguiente">Siguiente</div>');
			$('.preguntas').append('<div class="finalizar">Finalizar</div>');
			
			$('.anterior').on("click",function(){
				pregunta--;
				cargarPregunta(pregunta);
			});
		
			$('.siguiente').on("click",function(){
				if($('#pregunta'+ pregunta + ' li.selected').length > 0){
					pregunta++;
					cargarPregunta(pregunta);
				}
			});
			$('.finalizar').on("click",function(){
				$('li.selected').each(function(key, value) {
					alert($(this).text());
				});
			});
			
			$('.opcion').on("click",function(){
				$('.anexo').show();
					
				$(this).parent().children('li').removeClass('selected');
				$(this).addClass('selected');
				$('.cuestionario').css('height',$('#pregunta'+pregunta).height()+100);
				event.preventDefault();
			});
			
			
			$(".respuestaFormulario").keyup(function(event){
  				if($(this).val().length)
					$('.siguiente').show();
				else
					$('.siguiente').hide();
			});

			$('.pregunta li').on("click",function(){
				$(this).parent().children('li').removeClass('selected');
				$(this).addClass('selected');
				
				if( pregunta != $('div.pregunta').size()){
					pregunta++;
					cargarPregunta(pregunta);
				}else{
					$('.finalizar').show();
				}
			});
			pregunta =1;
			cargarPregunta(pregunta);
			
		});// #getJSON
		
	});// #ready
	
	function cargarPregunta(pregunta){
		$('.pregunta').hide();
		$('.anterior').show();
		$('.siguiente').hide();
		$('.finalizar').hide();
		$('.anexo').hide();
		
		$('#pregunta'+pregunta).show();
		$('#numeroPreguntas').text(pregunta + '/'+ $('.pregunta').size());
		$('.cuestionario').css('height',$('#pregunta'+pregunta).height()+100);
		
		if( pregunta == 1){
			$('.anterior').hide();
		}
		if($('#pregunta'+ pregunta + ' li.selected').length > 0){
			if( pregunta == $('div.pregunta').size()){
				$('.finalizar').show();
			}else{
				$('.siguiente').show();
			}
		}
		if($('.opcion'+ ' li.selected').length > 0){
			$('.anexo').show();
		}
		
		if($('#pregunta'+ pregunta + '.respuestaFormulario').val().length)
					$('.siguiente').show();
				else
					$('.siguiente').hide();
	}//cargarPregunta
	
