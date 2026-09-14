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
           <p align="center">
               <h8>
                    JS ALEGRANZA EVENTOS 
                    <br>
                    CONTRATO DE LOCAÇÃO PARA USO DE ESPAÇO PARA EVENTO
                </h8>
            </p>

            <p><h8><strong>DAS PARTES</strong></h8></p>
           
            <p align="justify">
                <strong>LOCADOR: JS ALEGRANZA FESTAS E EVENTOS </strong>inscrita no CNPJ n°25.152.506/0001-47, com sede à Avenida Capyaba, qd. 96, lt. 28, Jardim Helvécia, Aparecida de Goiânia, Goiás.
            </p>

           <p align="justify">
                <strong>LOCATÁRIO(A): {{ $registro->nome }}  </strong>, brasileiro(a), inscrito(a) no cadastro 
                nacional de pessoas físicas no CPF sob nº {{ $registro->cpf }}, 
                residente e domiciliado(a) à {{ $registro->endereco }} ,{{ $registro->bairro }} - Cep:{{ $registro->cep }}, {{ $registro->cidade }} - GO.
                telefone  <strong> {{ $registro->telefone }} </strong> / telefone <strong> {{ $registro->celular }} </strong>
                <br>
                As partes acima identificadas têm, entre si, justas e acertadas o presente Contrato de Locação para Uso de Espaço para Evento, que será regido pelas cláusulas seguintes e pelas condições descritas no presente.
                <br>
                @if (!empty($registro->noivos))
                    <br>
                    <strong>NOIVOS: {{ $registro->noivos }} </strong> 
                @endif 
            </p>

            <p><h8><strong>DO OBJETO</strong></h8></p>

            <p align="justify">
                <strong>Cláusula 1ª: </strong>O objetivo deste contrato é a locação para o uso do espaço JS ALEGRANZA FESTAS E EVENTOS, localizado na Av.Capyaba Qd.96, Lt.28 Jardim Helvécia, Cep: 74933-260 Aparecida de Goiânia.
            </p>  
            <p align="justify">
                <strong>Cláusula 2ª: </strong> Este contrato é intransferível e não autoriza a realização de festas ou eventos que incluam som automotivo, venda de ingressos ou convites, venda de bebidas ou qualquer outra mercadoria, se restringindo ao evento do LOCATÁRIO.
            </p>

            <p align="justify">
                <strong> Cláusula 3ª: </strong> O espaço está sendo locado ao Contratante para evento que será realizado no dia {{  \Carbon\Carbon::parse($registro->dataevento)->format('d/m/Y') }}. A cerimônia foi contratada para {{ $registro->qtdpessoas }} pessoas.
            </p>

            <p><h8><strong>DO PRAZO</strong></h8></p>

            <p align="justify">

                <strong>Parágrafo Único:</strong> o ambiente estará liberado para a montagem do evento a partir das <strong>08:00 horas do {{  \Carbon\Carbon::parse($registro->dataevento)->format('d/m/Y') }}. </strong> 

                @if (!empty($registro->dataevento2))
                    , {{  \Carbon\Carbon::parse($registro->dataevento2)->format('d/m/Y') }}        
                @endif

                @if (!empty($registro->dataevento3))
                    , {{  \Carbon\Carbon::parse($registro->dataevento3)->format('d/m/Y') }}        
                @endif
                
            </p>

            <p align="justify">
                <strong>Cláusula 4°: </strong> °: A cerimônia terá início às {{ $registro->horainicio }}h. Será concedida tolerância de atraso de no máximo 30 (trinta) minutos para início da cerimônia. O descumprimento desta cláusula implicará no parágrafo primeiro. Atraso além do concedido, será abatido nas 6 horas de evento, por motivo logística administrativa.
            </p>

            <p align="justify">
                <strong>Parágrafo Primeiro: </strong>Serão 6 (seis) horas de evento (festa) contados a partir da abertura do buffet.
             </p>

            <p align="justify">
                <strong>Parágrafo Segundo: </strong>Ultrapassando o horário previsto na cláusula quarta, parágrafo primeiro, será cobrada uma taxa no valor de 10% (dez por cento) sobre o valor total do contrato, negociado por hora adicional ou fração.
            </p>

            <p><h8><strong>DAS OBRIGAÇÕES DO LOCADOR</strong></h8></p>

            <p align="justify"><strong>Cláusula 5ª:</strong> O LOCADOR disponibilizará as dependências do local em perfeitas condições de uso e devidamente limpas, incluindo um camarim com capacidade para no máximo 3 pessoas arrumarem no local. Conforme conferência.</p>
            <p align="justify"><strong>Cláusula 6ª:</strong> O LOCADOR designará um gerente operacional no horário do evento.</p>
            <p align="justify"><strong>Cláusula 7ª:</strong> O salão será entregue para montagem do evento às 08:00 (oito) horas da manhã, na data contratada para o dia da cerimônia.</p>
            <p align="justify"><strong>Cláusula 8ª:</strong> O ar condicionado será ligado 1 hora antes do evento. Caso tenha a necessidade de climatizar o ambiente antes do horário estipulado, será cobrada uma taxa no valor de R$ 120,00 (Cento e Vinte Reais ) por hora. </p>
            <p align="justify"><strong>Cláusula 9ª:</strong> Serão disponibilizadas como cortesia, 23 (vinte e três) mesas, e 7 (sete) mesas de madeira de diversos tamanhos. (Não oferecemos cadeiras).</p>
            <p align="justify"><strong>Cláusula 10ª:</strong> Serão disponibilizados dois freezers, duas mesas de aço de inox, uma câmara fria, uma cervejeira e um fogão industrial em perfeito Estado de funcionamento</p>
            <p align="justify"><strong>Parágrafo Primeiro:</strong> Os eletrodomésticos não podem ser movidos de seu local de origem sem a permissão do administrador do local.</p>
            <p align="justify"><strong>Parágrafo Segundo:</strong> Qualquer dano ao patrimônio, feito por dolo ou culpa do LOCATÁRIO aos eletrodomésticos deverá ser reparado.</p>
            <p align="justify"><strong>Cláusula 11ª:</strong>Será disponibilizado um armário para os bem-casados.</p> 
            <p align="justify"><strong>Parágrafo único:</strong> Caso o Locatário queira a retirada do lustre, o serviço será terceirizado, e, portanto, será cobrado valor avulso ao negociado no presente contrato.</p>
            <p align="justify"><strong>Cláusula 12ª:</strong> O estacionamento interno disponibilizado pelo espaço de festas, será de inteira responsabilidade do LOCATÁRIO durante o período ocupado. Por conseguinte, pertences perdidos, roubos e furtos que porventura acontecerem não cairão sob responsabilidade do LOCADOR.</p>
            
            <p><h8><strong>DAS OBRIGAÇÕES DO LOCATÁRIO</strong></h8></p>

            <p align="justify"><strong>Cláusula 13ª:</strong> O LOCATÁRIO deve fornecer as informações necessárias para a perfeita realização do evento, assumindo integralmente a responsabilidade pela falta de precisão.</p>
            <p align="justify"><strong>Cláusula 14ª:</strong> O LOCADOR não se responsabiliza por roubos, furtos, danos materiais ou qualquer ação civil ou criminal, que porventura venha ocorrer nas áreas internas e externas do estabelecimento.</p>
            <p align="justify"><strong>Parágrafo Primeiro:</strong> A responsabilidade civil ou criminal decorrente de acontecimentos relacionados ao evento, correrão por conta e risco exclusivo do LOCATÁRIO.</p> 
            <p align="justify"><strong>Parágrafo Segundo:</strong> É obrigatória a contratação de seguranças para a realização do evento.</p>
            <p align="justify"><strong>Parágrafo Terceiro:</strong> Cabe ao LOCATÁRIO contratar quantidade de segurança e pessoal suficiente para apoio durante todo o evento.</p>
            <p align="justify"><strong>Cláusula 15ª:</strong> O LOCATÁRIO deverá designar um responsável para durante o evento controlar e autorizar a entrada dos convidados.</p>
            <p align="justify"><strong>Cláusula 16ª:</strong> O LOCATÁRIO deverá ressarcir ao LOCADOR, a valores de mercado, por todos e quaisquer danos causados ao imóvel, bem como móveis e utilitários, por má utilização ou vandalismo dos participantes do evento ou pelos prestadores de serviços.</p>
            <p align="justify"><strong>Parágrafo Único:</strong> Comprovado o dano, o Locatário deverá ressarcir os prejuízos em um prazo máximo de 02 (dois) dias após o evento.</p>
            <p align="justify"><strong>Cláusula 17ª:</strong> Toda montagem e desmontagem incluindo todo mobiliário e itens de decoração do evento, e objetos deixados no espaço, antes e depois do evento correrão por responsabilidade do LOCATÁRIO ou de seus fornecedores.</p>
            <p align="justify"><strong>Cláusula 18ª:</strong> O Buffet contratado deverá deixar a cozinha completamente limpa, retirar lixos e colocar nos devidos lugares ao final do evento, e o valor de R$ 150,00 (cento e cinquenta reais ), referente taxa de uso da mesma, deverá ser pago na mesma semana do evento pelo LOCATÁRIO.</p>
            <p align="justify"><strong>Cláusula 19ª:</strong> O LOCATÁRIO fica ciente do recolhimento da taxa do ECAD - Escritório Central de Arrecadação é de sua inteira responsabilidade, devendo esta ser apresentada ao LOCADOR 48 (quarenta e oito) horas antes do evento.</p>
            <p align="justify"><strong>Parágrafo Primeiro:</strong> O LOCATÁRIO compromete-se a manter o sistema de som em volume compatível com o Código de Postura do Município, de (55 cinquenta e cinco decibéis no período noturno e 65 sessenta e cinco decibéis em período diurno).</p>
            <p align="justify"><strong>Parágrafo Segundo:</strong> Todas as multas oriundas de perturbação ao sossego público serão de total responsabilidade do LOCATÁRIO.</p>
            <p align="justify"><strong>Cláusula 20ª:</strong> Não será permitido fixar fitas adesivas, adesivos decorativos, pregos e parafusos no piso, e nem grampos nas colunas ou paredes, madeira ou nos gazebos e nem grampear tecidos e outros na madeira, que possam danificar o patrimônio. Ademais, é expressamente proibido o uso de Sky Paper (papel com brilho, papel picotados etc.), sendo de responsabilidade do LOCATÁRIO, cientificar seus prestadores de serviços. Em caso de danos, o valor cobrado será conforme orçamento do ocorrido.</p>
            <p align="justify"><strong>Cláusula 21ª:</strong> Se o número de convidados que comparecerem ao evento, for inferior ao acertado no contrato, o LOCATÁRIO fica ciente desde já que isso não implica em qualquer desconto, ao valor combinado.</p>
            <p align="justify"><strong>Cláusula 22ª:</strong> Em relação ao ensaio fica determinado o horário comercial, das 08:00 horas às 18:00 horas, de terça-feira à quinta-feira, sendo de responsabilidade do LOCATÁRIO marcar o dia e horário desejados.</p>
            <p align="justify"><strong>Cláusula 23°:</strong> O LOCATÁRIO se compromete a desocupar o imóvel no horário previsto, deixando-o em perfeito estado de conservação, conforme recebido no dia do evento. Deverá ser retirado todo mobiliário após o evento.</p>
            <p align="justify"><strong>Cláusula 24ª:</strong> O LOCATÁRIO fica ciente que a energia elétrica é fornecida pela EQUATORIAL, com isso o LOCADOR fica isento de qualquer responsabilidade por falha no funcionamento da rede elétrica da EQUATORIAL. Sendo assim sugerimos a locação de gerador em funcionamento, durante o evento.</p>
            <p align="justify"><strong>Cláusula 25ª:</strong> É de responsabilidade do LOCATÁRIO dar ciência aos fornecedores das cláusulas deste contrato.</p>
            
            <br><br><br>
            <p><h8><strong>DO PREÇO E DAS CONDIÇÕES DE PAGAMENTO</strong></h8></p>
            
             <p align="justify"> 
                <strong>Cláusula 26ª:</strong> Para a utilização do espaço, nas condições estabelecidas nesse contrato, o LOCATÁRIO pagará ao locador a importância de
                <strong> {{ number_format($registro->valortotal, 2) }} ( {{ $valorExtenso }})</strong> da forma discriminada abaixo:
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
  
            <p align="justify"><strong>Cláusula 27ª:</strong> Para realização do evento é necessário que todas as parcelas mencionadas na cláusula anterior estejam quitadas.</p>
            <p align="justify"><strong>Cláusula 28ª:</strong> Caso a montagem e decoração do salão demande mais dias que o previsto neste contrato, o LOCATÁRIO deverá negociar as diárias. </p>
            <p align="justify"><strong>Cláusula 29ª:</strong> O LOCATÁRIO pagará ao LOCADOR, até dois dias após o término do evento, valores relativos aos ressarcimentos de quaisquer danos eventualmente causados ao imóvel ou móveis e utensílios.</p>

            <p><h8><strong>DAS CLÁUSULAS GERAIS</strong></h8></p>

            <p align="justify"><strong>Cláusula 30ª:</strong> Qualquer modificação nos termos deste contrato, somente terá validade se devidamente ajustada entre as partes, e registrada em aditivo ao contrato, que quando assinado por ambas, passará a fazer parte integrante deste instrumento.</p>
            <p align="justify"><strong>Parágrafo Único:</strong> Será cobrado uma taxa de 10% do valor do contrato, mais reajuste da tabela.</p>
            <p align="justify"><strong>Cláusula 31ª:</strong> Fica vedado ao LOCATÁRIO, emprestar ou ceder o espaço objeto desta locação no todo ou em parte, assim como, fica também vedado ao LOCADOR, a realização de outro evento no mesmo espaço, garantindo o LOCATÁRIO exclusividade de utilização. </p>
            <p align="justify"><strong>Cláusula 32ª:</strong> O descumprimento de qualquer das cláusulas estabelecidas neste contrato acarretará à parte infratora o pagamento de multa indenizatória de 70% (setenta por cento) sobre o valor total estabelecido neste contrato.</p>
            <p align="justify"><strong>Cláusula 33ª:</strong> O LOCADOR, por si e por seus colaboradores, obriga-se a observar, na execução deste instrumento contratual, a Legislação Vigente sobre Proteção de Dados Pessoais, em especial as disposições da Lei nº 13.709/2018 (Lei Geral de Proteção de Dados Pessoais).</p>
            <p align="justify"><strong>Parágrafo único:</strong>O LOCADOR se compromete em não divulgar a terceiros as informações obtidas sobre a LOCATÁRIA e de seu evento, em função deste CONTRATO, bem como imagens, fotos, áudios e vídeos, salvo se houver expressa concordância da LOCATÁRIA.</p>
            <p align="justify"><strong>Cláusula 34ª:</strong> O LOCATÁRIO fica ciente que a ficha técnica deverá ser passada para o LOCADOR quando for solicitada.</p>
            <p><h8><strong>DA RESCISÃO</strong></h8></p>
            <p align="justify"><strong>Cláusula 35ª:</strong> Em caso de cancelamento do contrato será cobrado multa de 30%. Cancelamento com prazo inferior a 90 dias, sem justa causa, (força maior) não haverá devolução do valor do contrato. </p>
            <p align="justify"><strong>Cláusula 36ª:</strong> caso o LOCATÁRIO não arque com o valor do contrato no prazo estabelecido incidirá em rescisão automática do contrato por força do artigo 9º da Lei nº 8.245/98. </p>
            <p align="justify"><strong>Parágrafo único:</strong> na hipótese desta cláusula o LOCATÁRIO não têm direito a restituição de valores, uma vez que a LOCADORA despendeu recursos a fim de reservar e organizar o espaço para a data do evento.</p>

            <pre></pre>
            
            <p><h8><strong>DA SITUAÇÃO OCASIONADA PELO COVID-19 </strong></h8></p>

             <p align="justify"><strong>Cláusula 37ª:</strong> A pandemia ocasionada pelo vírus COVID-19 deu origem a medidas restritivas de convivência e ocasionou impactos na economia. Sendo assim, levando em conta o princípio da menor onerosidade, o LOCATÁRIO permite que sejam feitas mudanças específicas nesse contrato através de aditivo, com a devida antecedência. </p>
             <p align="justify"><strong>Cláusula 38ª:</strong> Diante da necessidade de mudança de data em caso de decreto que demande o fechamento do local de festas, as partes negociarão o reequilíbrio financeiro.</p>
            
            <p><h8><strong>OBS: </strong></h8></p>
            <p align="justify">
                {{ $registro->observacao }}
            </p>

            <p><h8><strong>DO FORO</strong></h8></p>
            
            <p align="justify"><strong>Cláusula 39ª:</strong> Para resolver quaisquer controvérsias decorrentes as partes elegem o foro da comarca de Aparecida de Goiânia, Goiás, renunciando as partes expressamente a qualquer outro, por mais privilegiado que seja. </p>
            <p align="justify">E por estarem assim justas e avençadas as partes, assinam o presente Instrumento em duas vias de igual teor, para um só efeito perante duas testemunhas que igualmente assinam e se identificam.</p>
       
            <p><h8>
                <strong>
                  Aparecida de Goiânia, {{ $dia }} de  {{ $mes }} {{ $ano }} 
                </strong>
                </h8>
            </p>
          
            <p>
                <h8>
                ______________________________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ______________________________<br>                           
                &nbsp;&nbsp;&nbsp;&nbsp;<strong>Assinatura do LOCATÁRIO(A)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Assinatura do LOCADOR</strong>    
                </h8>
            </p>
           
    </div>
</div>
</body>
</html>