<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>:: Adm Evento - Contrato ::</title>
    <!--Custon CSS (está em /public/assets/site/css/certificate.css)-->
    <link rel="stylesheet" href="{{ asset('lib/assets/vendor/css/rtl/bootstrap.css') }}">
</head>
<body>

<div class="row">
    <div class="container">

        <img src="{{ asset('img/logoAlegranza.jpg') }}" width="161" height="72" />
        <hr>
           
           <p align="center"><h8>JS ALEGRANZA EVENTOS <br> CONTRATO DE LOCAÇÃO PARA USO DE ESPAÇO PARA EVENTO</h8></p>
       
           <p align="justify">

            Pelo presente instrumento ,  <strong> JS ALEGRANZA FESTAS E EVENTOS </strong>,  
            
            inscrita no CNPJ nº <strong> 25.152.506/0001-47 </strong>, com sede na <strong> Avenida Capyaba, Qd.96, 
            
            Lote 28 Jardim Helvécia, Aparecida de Goiânia – Goiás </strong>, denominado <strong> LOCADOR </strong>. 
            
            Do outro lado <strong> {{ $registro->nome }}  <strong> CPF {{ $registro->cpf }} </strong>. 
                
            End. <strong> {{ $registro->endereco }} </strong>

            <strong> {{ $registro->bairro }} {{ $registro->cidade }} - Cep:{{ $registro->cep }} – Go </strong> telefone  <strong> {{ $registro->telefone }} </strong> / celular <strong> {{ $registro->celular }} </strong>

            denominado LOCATÁRIO ,
            </p>

            <p><h8><strong> 1.	CLÁUSULA PRIMEIRA – OBJETIVO  </strong></h8></p>

            <p align="justify">
                1.1 O objetivo deste contrato é a locação para o uso do espaço <strong> JS ALEGRANZA FESTAS E EVENTOS.<strong> Apartir das 8:00 hs. do(s) dia(s) <strong>{{ \Carbon\Carbon::parse($registro->dataevento)->format('d/m/Y') }} estará <strong> liberado para a montagem do evento.
            </p>    

            <p><strong>Obs. Se houver alteração no horário da cerimônia, avisar por escrito com 30 dias de antecedência </strong>.</p>
            
            <p align="justify">
                1.2 A cerimônia terá inicio às <strong>{{ $registro->horainicio }}hrs. Para {{ $registro->qtdpessoas }} pessoas. Serão 5 ( cinco ), horas de evento ( festa ) , contados a partir da abertura do Buffet . Será concedida tolerância de atraso de no máximo 30 (trinta) minutos. Ultrapassando o horário previsto, será cobrada uma taxa no valor de 10%, por hora adicional ou fração. Em caso fortuito e força maior, poderá ser modificado esse item conforme legislação Governamental, Municipal, Estadual e Federal.
            </p>

            <p align="justify">
                1.3 Este contrato é intransferível e não autoriza a realização de festas ou eventos que incluam som automotivo,  venda de ingressos ou convites , venda de bebidas ou qualquer outra mercadoria. 
            </p>
            
            <p align="justify">
                1.4 Este contrato não abrange a utilização dos aposentos. 
            </p>

            <p><h8><strong> 2. CLÁUSULA SEGUNDA – OBRIGAÇÕES DO LOCADOR; </strong></h8></p>

            <p align="justify">2.1 O locador disponibilizará as dependencias do local em  perfeitas condições de uso e devidamente limpas , </strong> icluindo um camarim com capacidade para no maximo 3 pessoas arrumarem no local. Conforme conferência. </strong>.</p>
            <p align="justify">2.2 O Locador designará 01 (uma) camareira  para os banheiros e um gerente operacional no horário do evento.</p>
            <br><br>
            <p align="justify">2.3 O salão será entregue para montagem do evento as (8:00) oito horas da manhã , na data contratada para o dia da cerimônia.</p>
            <p align="justify">2.4 O ar condicionado será ligado 1 hora antes do evento. Caso tenha a necessidade de climatizar o ambiente antes do horário estipulado, será cobrado uma taxa no valor de R$ 300,00 ( Trezentos reais )..</p>
            <p align="justify">2.5 Será disponibilizado 23 mesas de 10 lugares ( sem as cadeiras), mais 6 mesas de madeira.</p>
            <p align="justify">2.6 Será disponibilizado Dois freezers , uma câmara fria , uma cervejeira e um fogão industrial. <strong>obs: OS ELETRODOMÉSTICOS NÃO PODEM SER TRANSFERIDO DE LUGAR , SEM A PERMISSÃO DO ADMINISTRADOR.</strong></p>
            <p align="justify">2.7 Será disponibilizado Um armário para o bem casados.</p>
            <p align="justify">2.8 Será disponibilizado  Um lustre de cristal no centro do salão. <strong> OBS: Para retiradado do mesmo , o serviço é terceirizado. </strong></p>
            <p align="justify">2.9 Será disponibilizado Uma passarela de madeira. ( Toda motangem por conta do locatário ).</p>
             
            <p><h8><strong> 3. CLÁUSULA TERCEIRA – OBRIGAÇÕES DO LOCATÁRIO: </strong></h8></p>
            <p align="justify">3.1  Será disponibilizado Cortinas de voal , instalação por conta do locatário ( decorador ). </p>
            <p align="justify">3.2  Estacionamento interno para ( 32 veículos ) , de responsabilidade do locatário. </p>
            <p align="justify">3.3 O LOCATÁRIO deve fornecer as informações necessárias para a perfeita realização do evento, assumindo integralmente a responsabilidade pela precisão das mesmas.  </p>
            <p align="justify">3.4. A responsabilidade civil ou criminal decorrentes de acontecimentos relacionados ao evento, correrão por conta e risco exclusivo do LOCATÁRIO(a), cabendo a este(a), contratar quantidade de segurança e pessoal suficiente para apoio, sendo assim faça, a obrigatoriedade da contratação de seguranças para o evento. </p>
            <p align="justify">3.5 O LOCADOR não se responsabiliza por roubos e furtos diversos e danos materiais ou qualquer ação civil ou criminal, que por ventura venha ocorrer nas áreas internas e externas do estabelecimento, pois a segurança é de responsabilidade do locatário. </p>
            <p align="justify">3.3 O LOCATÁRIO deverá designar um responsável para durante o evento controlar e autorizar a entrada dos convidados. </p>
            <p align="justify">3.4 O LOCATÁRIO deverá ressarcir ao LOCADOR, a valores de mercado, por todos e quaisquer danos causados ao imóvel, bem como móveis e utilitários, por má utilização ou vandalismo dos participantes do evento , os causados pelos prestadores de serviços. Devendo o ressarcimento ser feito em um prazo máximo de 02(dois) dias após o evento. Obs. Deixar os fornecedores cientes das cláusulas deste contrato. </p>
            <p align="justify"><strong> 3.5.1 Toda montagem e desmontagem incluindo todo mobiliário e itens de decoração do evento, e objetos deixados no espaço , antes e depois do evento de responsabilidade do LOCATÁRIO ou de seus fornecedores. Devendo o Buffet contrato deixar a cozinha completamente limpa ao final do evento, paga o valor de R$ 150,00 (cento e cinquenta reias ), referente taxa de uso da mesma ( OBS: pagar na semana do evento ).</strong> </p>
            <p align="justify"><strong> 3.6 O LOCATÁRIO fica ciente que o recolhimento da taxa do ECAD - Escritório Central de Arrecadação é de sua inteira responsabilidade, devendo esta ser apresentada ao LOCADOR 48 hs (quarenta e oito horas) antes do evento. Comprometendo se, ainda, a manter o sistema de som em volume compatível com o Código de Postura do Município, de (55 cinquenta e cinco decibéis no período noturno e 65 sessenta e cinco decibéis em período diurno). Todas as multas oriundas de perturbação ao sossego público serão de total responsabilidade do LOCATARIO . </strong></p>
            <p align="justify">3.7. Não será permitido fixar fitas adesivas, adesivos decorativos, pregos e parafusos no piso,  e nem grampos nas colunas ou paredes, madeira ou nos gazebos e nem grampiar tecidos e outros na madeira , que possam danificar o patrimônio. É expressamente proibido o uso de Sky Paper( papel com brilho, papel picotados etc..), sendo de responsabilidade do LOCATÁRIO, cientificar seus prestadores de serviços. </p>
            <p align="justify">3.8 Se o número de convidados que comparecerem ao evento, for inferior ao acertado no contrato, o LOCATÁRIO fica ciente desde já que isso não implica em qualquer desconto, ao valor combinado.</p>
            <p align="justify">3.9 Em relação ao ensaio fica determinado o horário comercial  , das 08:00 horas ás 18:00 horas , sendo de responsabilidade do locatário marca o dia desejado , terça á quinta feira. </p>
            
            <p><h8><strong> 4.	CLÁUSULA QUARTA – PREÇO E CONDIÇÕES DE PAGAMENTO; </strong></h8></p>

            <p align="justify"> 

            4.1 Para a utilização do espaço, nas condições estabelecidas na Cláusula Primeira (item 1.1) 
            deste contrato, o locatário pagará ao locador a importância de <strong> {{ number_format($registro->valortotal,2) }} ( {{ $valorExtenso }})</strong> 
            Conforme discriminado abaixo:
            </p>

            <p align="justify"> 
                @foreach($parcelas as $i => $parcela)
                    @if($i == 0)
                        <strong>- Data da Entrada: {{  \Carbon\Carbon::parse($parcela->datavencimento)->format('d/m/Y') }} - Valor da Entrada: {{ number_format($parcela->valorparcela,2) }} </strong><br>
                    @else
                        <strong>- Data da Parcela: {{  \Carbon\Carbon::parse($parcela->datavencimento)->format('d/m/Y') }} - Valor da Parcela: {{ number_format($parcela->valorparcela,2) }} </strong><br>
                 @endif
                @endforeach
            </p>
          
            <p align="justify"> 4.2 Para realização do evento é necessário que todas parcelas mencionadas na cláusula 4.0 estejam quitadas.</p>
            <p align="justify"> 4.3 Caso a montagem e decoração do salão demande mais dias que o previsto neste contrato, o locatário deverá negociar as diárias de R$ 3.000,00 (três mil reias).  Devendo o LOCATÁRIO proceder à reserva no ato do contrato.</p>
            <p align="justify"> 4.4 O LOCATÁRIO pagará ao LOCADOR, até dois dias após o término do evento, valores relativos aos ressarcimentos de quaisquer danos eventualmente causados ao imóvel ou móveis e utensílios.</p>
            <p align="justify"> 4.5 4.5 Em caso de cancelamento do evento, o LOCATÁRIO se obriga a comunicar o fato ao LOCADOR, por escrito, até 60 (sessenta) dias antes da data do evento. Nesse caso, será cobrado multa de 40% do valor contratado. Cancelamentos feitos em período inferior a 60 (sessenta) dias antes da data do evento, não haverá devolução do valor contratado. </p>
        
            <p><h8><strong>5.   CLÁUSULA QUINTA;</strong></h8></p>

            <p align="justify">5.1 Qualquer modificação nos termos deste contrato , somente terá validade se devidamente ajustada entre as partes , e registrada em aditivo ao contrato , que assinado por ambas , passará a fazer parte integrante desde instrumento. Será cobrado uma taxa de 10% do valor do contrato mais reajuste da tabela.</p> 
            <p align="justify">5.2 O LOCATÁRIO se compromete a desocupar o imóvel após o horário previsto na Cláusula Primeira (item 1.1), deixando-o em perfeito estado de conservação, conforme recebido no momento da locação. Deverá ser retirado todo mobiliário após o evento.</p>
            <p align="justify">5.3 O LOCATÁRIO fica ciente que a energia elétrica é fornecida pela ENEL, com isso o LOCADOR fica isento de qualquer responsabilidade por falha no funcionamento da rede elétrica da ENEL. Sendo assim é OBRIGATÓRIO a locação do gerador elétrico em funcionamento durante o evento. </strong> </p>
            <p align="justify">5.4 Fica vedado ao LOCATÁRIO, emprestar ou ceder o espaço objeto desta locação no todo ou em parte, assim como, fica também vedado ao LOCADOR, a realização de outro evento no mesmo espaço, garantindo o LOCATÁRIO exclusividade de utilização.</p>
            <p align="justify">5.5 O descumprimento de qualquer das cláusulas estabelecidas neste contrato acarretará à parte infratora o pagamento de multa indenizatória de 40% sobre o valor total estabelecido na Cláusula Quarta (item 4.1).</p>
            <p align="justify">5.6 O LOCATÁRIO fica ciente que todas as imagens do Espaço de festas e Eventos, como fotos, imagens decorativas, e vídeos ficam agregadas como propriedade ao LOCADOR, para possíveis exibições.</p>
            <p align="justify">5.7 O LOCATÁRIO fica ciente que a ficha técnica deverá ser passada para o LOCADOR com 30 dias antes do evento.</p>

            <p><h8><strong>6.	CLÁUSULA SEXTA – FORO; </strong></h8></p>

            <p align="justify">
                Fica eleito o Foro da Comarca de Aparecida de Goiânia  competente para dirimir dúvida ou litígio oriundo deste contrato, renunciando as partes expressamente a qualquer outro, por mais privilegiado que seja. E por estarem assim justas e avençadas as partes, assinam o presente Instrumento em duas vias de igual teor, para um só efeito perante duas testemunhas que igualmente assinam e se identificam. 
            </p>

            <p><h8><strong>OBSERVAÇÃO: </strong></h8></p>
            <p align="justify">
                {{ $registro->observacao }}
            </p>
          
            <p><h8><strong>LOCATARIO,(a). ___________________________________________________________________ </strong></h8></p>

            <p><h8><strong>LOCADOR – Js Alegranza Festas e Eventos _____________________________ </strong></h8></p>

            <p><h8>
                <strong>
                    Testemunhas: _________________________<br>
                    Aparecida de Goiânia, {{ $dia }} de  {{ $mes }} {{ $ano }} 
                </strong>
                </h8>
            </p>

    </div>
</div>
</body>
</html>