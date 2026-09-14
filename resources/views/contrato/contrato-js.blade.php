<script>
    $(function(){
        /*Iniciando calendário de contratos*/
        var eventList = [
            
            @foreach($arrayRegistros as $keyRegistro => $registro)
                {
                    title       : "{{ $registro['nome'] . ' - ' . $registro['horainicio'] . ' Hrs'}}",
                    color       : "{{ $registro['color'] }}",
                    textColor   : 'white',
                    start       : "{{ $registro['start'] }}",
                    end         : "{{ $registro['end'] }}",
                    id          : "{{ $registro['id'] }}",
                    dataevento  : "{{ Carbon\Carbon::parse($registro['dataevento'])->format('d/m/Y') }}",
                    dataendevento  : "{{ Carbon\Carbon::parse($registro['end'])->format('d/m/Y') }}",
                    qtdpessoas : "{{ $registro['qtdpessoas'] }}",
                    valortotal : "{{ number_format($registro['valortotal'], 2) }}",
                    horainicio : "{{ $registro['horainicio'] }}",
                    horatermino: "{{ $registro['horatermino'] }}",
                    client : "{{ $registro['nome'] }}",
                    @if($registro['foto'] == null)
                        photo : 'https://www.sportpartner.ro/domains/sportpartner/files/product/large/no-image.png',
                        typePhoto: 'nophoto',
                    @else
                        photo : "{{ asset($registro['foto']) }}",
                        typePhoto: 'photouser',
                    @endif
                },
            @endforeach
        ];

        $('#fullcalendar-contratos').fullCalendar({
            // Bootstrap styling
            themeSystem: 'bootstrap4',
            monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'],
            dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
            buttonText: {
                prevYear: "&nbsp;&lt;&lt;&nbsp;",
                nextYear: "&nbsp;&gt;&gt;&nbsp;",
                today: "Hoje",
                month: "Mês",
                week: "Semana",
                day: "Dia"
            },
            bootstrapFontAwesome: {
                close: ' ion ion-md-close',
                prev: ' ion ion-ios-arrow-back scaleX--1-rtl',
                next: ' ion ion-ios-arrow-forward scaleX--1-rtl',
                prevYear: ' ion ion-ios-arrow-dropleft-circle scaleX--1-rtl',
                nextYear: ' ion ion-ios-arrow-dropright-circle scaleX--1-rtl'
            },
            header: {
                left: 'title',
                center: 'month,agendaWeek,agendaDay',
                right: 'prev,next today'
            },
            defaultDate: new Date(),
            editable: true,
            events: eventList,
            eventClick: function(calEvent, jsEvent, view) {
                $('#title-modal-calendar').text('Cliente ' + calEvent.client);
                $('#id').text(calEvent.id);
                $('#id-dtevent').text(calEvent.dataevento);
                $('#id-dtevent-end').text(calEvent.dataendevento);
                $('#id-hour-init').text(calEvent.horainicio);
                $('#id-hour-term').text(calEvent.horatermino);
                $('#id-qtd-people').text(calEvent.qtdpessoas);
                $('#id-value-total').text(calEvent.valortotal);
                if(calEvent.typePhoto != "nophoto"){
                    $('#img-client').attr('src', calEvent.photo);
                    $('#img-client').css({"max-width": "80%", "margin-right": "auto", "margin-left": "auto"});
                }else{
                    $('#img-client').attr('src', calEvent.photo);
                    $('#img-client').css({"width": "40%", "margin-right": "auto", "margin-left": "auto"});

                }
                $('#modal-calendar').modal('show');
            },
            eventRender: function(event, eventElement) {
                if (event.photo) {
                    eventElement.find("div.fc-content").prepend("<img src='" + event.photo +"' width='30' height='20'>");
                }
            },
            
        });
    });
</script>