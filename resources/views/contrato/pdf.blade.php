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

            <p align="justify">
                Pelo presente instrumento particular de contrato de locação de espaço que fazem de um lado: <strong>JS - ALEGRANZA CASA DE FESTAS E EVENTOS LTDA</strong>, inscrita sob o CNPJ nº 25.152.506/0001-47, com sede em avenida Capyaba, quadra 96, lote 28 , Jardim Helvécia, Aparecida de Goiânia-GO,doravante denominada de Locador
            </p>

           <p align="justify">
                <strong>LOCATÁRIO(A): {{ $registro[0]->nome }}  </strong>, brasileiro(a), inscrito(a) no cadastro 
                nacional de pessoas 
                @if(strlen($registro[0]->cpf) == 11 || strlen($registro[0]->cpf) == 14)   	
                    <strong> físicas no CPF sob nº {{ $registro[0]->cpf }} </strong>, 
                @endif  
                
                @if(strlen($registro[0]->cpf) ==  18)
                    <strong>  juridicas no CNPJ sob nº {{ $registro[0]->cpf }} </strong>, 
                @endif
                residente e domiciliado(a) à {{ $registro[0]->endereco }} ,{{ $registro[0]->bairro }} - Cep:{{ $registro[0]->cep }}, {{ $registro[0]->cidade }}.
                telefone  <strong> {{ $registro[0]->telefone }} </strong> / telefone <strong> {{ $registro[0]->celular }} </strong>
                <br>
                doravante denominado de LOCATÁRIO (a), estando as partes justa e acertadas mediante as seguintes cláusulas:
                <br>
                @if (!empty($registro[0]->noivos))
                    <br>
                    <strong>NOIVO(A)S: {{ $registro[0]->noivos }} </strong> 
                @endif 
            </p>

            <p><h8><strong>CLÁUSULA 1ª - DO OBJETO</strong></h8></p>

            <p align="justify">
                <strong>A LOCADORA </strong> e o <strong>LOCATÁRIO (a)</strong> firmam por meio deste contrato a locação de espaço para evento e sua mobília situados no imóvel localizado na avenida Capyaba, quadra 96 lote 28 Jardim Hélvécia , Aparecida de Goiânia-GO.
            </p>  
            <p align="justify">
                2º. O presente instrumento acompanha um laudo de vistoria inicial  que descreve detalhadamente o espaço,  o mobiliário ora locado, e o estado de conservação dos mesmos  no momento de entrega deste ao  <strong>LOCATÁRIO (a)</strong>.
            </p>
            <p align="justify">
                Parágrafo único: A vistoria inicial deverá ser feita no dia do evento, antes dos fornecedores começarem a montagem.
            </p>
            <p align="justify">
                3º. O espaço deverá ser utilizado exclusivamente para cerimônia e festa, restando proibido ao  LOCATÁRIO (a)  usá-lo de forma diferente do previsto, salvo autorização expressa da LOCADORA, sob pena de multa e demais penalidades previstas na legislação pertinente.
            </p> 
            <p align="justify">
                4º - O LOCATÁRIO (a) ficará responsável pela ciência aos prestadores de serviços/ fornecedores das disposições deste instrumento contratual.
            </p>
            <p align="justify">
                5º - Será atribuída ao LOCATÁRIO (a)  a  responsabilidade civil ou criminal decorrentes de envolvimento de terceiros ou  acontecimentos relacionados ao evento.
            </p>
            <p align="justify">
                6º -  A LOCADORA se reserva o direito de vistoriar, questionar e até mesmo interromper a presente locação se perceber que normas de segurança ou o sossego e os bons costumes foram prejudicados.
            </p>
            <p align="justify">
                7º - A LOCADORA não será responsabilizada por roubos, furtos, e  quaisquer incidentes que ocorram no espaço ora locado aos quais não der causa ou motivo. 
            </p>

            <p><h8><strong>CLÁUSULA 2ª - DA VEDAÇÃO À SUBLOCAÇÃO E EMPRÉSTIMO</strong></h8></p>

            <p align="justify">
                Fica vedada ao  LOCATÁRIO (a) a sublocação, cessão, ou empréstimo do espaço que ora lhe foi locado, quer no todo, ou em parte, ou sob qualquer título, sem a expressa autorização da LOCADORA, sob pena de rescisão do presente contrato com perdas e danos.
            </p>
            
            <p><h8><strong>CLÁUSULA 3ª - DO VALOR E DOS ENCARGOS</strong></h8></p>

            <p align="justify"> 
                O valor da locação do espaço é de: <strong> {{ number_format($registro[0]->valortotal, 2, ',', '.')  }} ( {{ $valorExtenso }})</strong> a ser pago da seguinte forma:
            </p>

            <p align="justify"> 
                @foreach($parcelas as $i => $parcela)
                    @if($i == 0)
                        <strong>- Data da Entrada: {{  \Carbon\Carbon::parse($parcela->datavencimento)->format('d/m/Y') }} - Valor da Entrada: {{ number_format($parcela->valorparcela, 2, ',', '.')  }} </strong><br>
                    @else
                        <strong>- Data da Parcela: {{  \Carbon\Carbon::parse($parcela->datavencimento)->format('d/m/Y') }} - Valor da Parcela: {{ number_format($parcela->valorparcela, 2, ',', '.')  }} </strong><br>
                    @endif
                @endforeach
            </p>

            <p align="justify">1º - Para garantir a realização do evento é necessário que todas as parcelas estejam quitadas.</p>      
            <p align="justify">2º - Caso o LOCATÁRIO (a) fique inadimplente com 03 parcelas, será enviada uma notificação formal através de meios eletrônicos para o pagamento da obrigação no prazo improrrogável de 10 (dez) dias, sob pena de rescisão e a consequente cobrança de 10% do valor das parcelas vencidas a título de lucros cessantes.</p>      
            <p align="justify">3º - Em caso de inadimplência das parcelas a LOCADORA poderá por mera deliberalidade , compor na continuação do contrato desde que o LOCATÁRIO (a)  quite o valor avençado no contrato no prazo máximo de 30 dias da realização do evento.</p>      
            <p align="justify">4º - O  LOCATÁRIO (a) será responsável por quaisquer multas por desobediência às normas de civilidade e  vizinhaça   vigentes na comarca do imóvel.</p>      
            <p align="justify">5º - O LOCATÁRIO (a) se compromete a manter o sistema de som em volume compatível com o Código de Posturas do Município não podendo ultrapassar o  limite de 65 decíbeis no período de dia e 55 no período da  noite</p>      
            <p align="justify">Parágrafo Único: O não cumprimento do parágrafo 1º, reserva a LOCADORA  o direito  de impedir a entrada de pessoal e material para a montagem do evento, além da rescisão automática do contrato sem nenhum ônus a LOCADORA.</p>      
            <p align="justify"><strong>CLÁUSULA QUARTA </strong>- Se o número de convidados que comparecerem ao evento for inferior ao acertado no contrato, o locatário(a) fica ciente desde já, que isso não implica em qualquer desconto, abatimento, revisão ou redução proporcional ao valor do contrato.</p>      
            <p align="justify"><strong>CLÁUSULA QUINTA </strong>- O dia e os horários acertados no contrato deverão ser rigorosamente observados,findo o horário, a LOCADORA  se reserva o direito de fechar o  espaço.</p>      
            <p align="justify"><strong>CLÁUSULA SEXTA </strong>-  Caso o LOCATÁRIO (a) , por qualquer motivo, deseje o cancelamento ou desistência do evento,deverá fazê-lo via notificação formalizada por escrito à LOCADORA e  só haverá devolução de valores pago se a solicitação de cancelamento, formalizada por e-mail, for efetuada com até 90 (noventa) dias antes da data contratada e, nesse caso, será descontado do valor contratado uma multa de 30% (trinta por cento). Com relação as outras parcelas que tiverem sido pagas, serão devolvidas sem correção monetária. Para o cancelamento que se efetuar com menos de 90 (noventa) dias da data contratada, não haverá devolução de valores já pagos.</p>      
            <p align="justify">Parágrafo Primeiro: O LOCATÁRIO (a) poderá mudar a data do evento com no mínimo  90 ( Noventa) dias de antecedência, caso a LOCADORA  tenha data disponível, para tanto deverá o LOCATÁRIO  (a) arcar com ônus de 10 % ( Dez) por cento do valor contrato, mais diferença de tabela atual.</p>      
            <p align="justify">Parágrafo segundo: Em exceção ao exposto no parágrafo primeiro, as partes  não responderão por prejuízos resultantes de caso fortuito ou força maior, na forma do Artigo 393 do Código Civil Brasileiro.</p>      
            <p align="justify">Parágrafo único: A parte  afetada por evento que comprovadamente caracterize caso fortuito ou força maior dará notícia à outra das circunstâncias do evento, detalhando sua natureza e a comprovação do evento que será avaliado pela LOCADORA.</p>      
          
            <p><h8><strong>CLÁUSULA 7ª - DO PRAZO DO ALUGUEL</strong></h8></p>

            <p align="justify">A presente locação tem prazo de <strong> {{ $registro[0]->qtdhoraevento }}hs de evento, contados a partir da abertura do buffet. Caso ultrapasse o horário previsto, será cobrado taxa de 10% sobre o valor do contrato por hora adicional. Limitado até ás 03:00 horas da manhã.</p>      
            
            <p align="justify">1º -  Horas adicionais, conforme disponibilidade do locador.</p>      
            <p align="justify">2º -  É obrigatório a permanência do cerimonialista durante o evento, inclusive quando houver horas extras.</p>      
            <p align="justify">3º -  O evento (cerimônia/festa) terá início às <strong> {{ $registro[0]->horainicio }}hs, onde será concedida tolerância de atraso de no máximo 30 (trinta) minutos para início do evento.</p>      
            <p align="justify">4º o espaço estará liberado para a montagem do evento a partir das <strong> 08:00h do dia {{  \Carbon\Carbon::parse($registro[0]->dataevento)->format('d/m/Y') }} </strong> 

                @if (!empty($registro[0]->dataevento2))
                    , {{  \Carbon\Carbon::parse($registro[0]->dataevento2)->format('d/m/Y') }}        
                @endif

                @if (!empty($registro[0]->dataevento3))
                    , {{  \Carbon\Carbon::parse($registro[0]->dataevento3)->format('d/m/Y') }}        
                @endif
                
            </p>
             <p align="justify">5º O Espaço foi locado para {{ $registro[0]->qtdpessoas }} pessoas.</p>      
          

            <p><h8><strong>CLÁUSULA 8ª - DOS DEVERES DO LOCATÁRIO (A).</strong></h8></p>

            <p align="justify">Sem prejuízo de outras disposições deste contrato, constituem obrigações do LOCATÁRIO (a):</p>      
            <p align="justify">I. pagar o aluguel conforme estipulado neste instrumento;</p>      
            <p align="justify">II. cuidar e zelar pelo espaço locado como se fosse sua propriedade;</p>      
            <p align="justify">III. utilizar o espaço como foi convencionado, de acordo com a sua natureza e com o fim a que se destina;</p>      
            <p align="justify">IV. no final da locação devolver o espaço no mesmo estado em que recebeu, desconsiderando-se deteriorações decorrentes do seu uso normal;</p>      
            <p align="justify">V. se o espaço sofrer dano ou defeito que seja da responsabilidade da LOCADORA, informá-la, imediatamente sobre o ocorrido;</p>      
            <p align="justify">VI. reparar rapidamente os danos sob sua responsabilidade;</p>      
            <p align="justify">VII. não infringir normas referentes ao direito de vizinhança, notadamente no que se refere ao sossego, tranquilidade, segurança e saúde dos vizinhos do espaço locado, sob pena de exclusivamente responsabilizar-se civil e criminalmente pelos seus atos. É proibido qualquer tipo de som na área externa do salão, com exceção ao momento da cerimônia.</p>      
            
            <p><h8><strong>CLÁUSULA 9ª - DOS DEVERES DA LOCADORA</strong></h8></p>

            <p align="justify">Sem prejuízo de outras disposições deste contrato, constituem obrigações da LOCADORA:</p>      
            <p align="justify">I. entregar o espaço apto para a utilização conforme acordada neste instrumento, bem como regularizado perante todos os órgãos;</p>      
            <p align="justify">II. assegurar o uso pacífico do espaço locado não podendo dificultar ou impedir o direito do  LOCATÁRIO (a) de usufruir o espaço com tranquilidade;</p>      
            <p align="justify">III .responder pelos vícios, problemas e defeitos anteriores à locação;</p>      
            
            <p><h8><strong>CLÁUSULA 10ª – DA RESPONSABILIDADE DO LOCATÁRIO (a) PELO EVENTO. </strong></h8></p>

            <p align="justify">parágrafo primeiro: o locatário ficará responsável pelo controle de entrada dos convidados. </p>      
            <p align="justify">parágrafo segundo:  o LOCATÁRIO (a)  fica obrigado a contratar pessoas qualificadas (seguranças) para garantir apoio ao evento, e caso o número de convidados ultrapasse a quantidade de 300 pessoas, sugerimos no mínimo 03 seguranças para garantir a segurança no evento. </p>      
            <p align="justify">cláusula 10.1 - toda montagem e desmontagem de mobiliário e itens de decoração do evento, correrão as espensas do LOCATÁRIO (a) , e a LOCADORA  se isenta de quasquer responsabilidade por objetos deixados  no espaço antes e após o evento. A decoração deverá ser retirada logo após o evento. </p>      
            <p align="justify">cláusula 10.2- O buffet contratado deverá deixar a cozinha limpa, retirar lixos e acondicioná-los nos devidos lugares no final do evento, caso contrário será cobrado uma taxa de R$ 200,00 (duzentos reais).</p>      
            <p align="justify">cláusula 10.3- O LOCATÁRIO (a)  fica ciente que é de sua inteira responsabilidade o recolhimento da taxa do Ecad - escritório central de arrecadação,devendo esta ser entregue ao locador 07 dias antes  do evento.</p>      
            <p align="justify">cláusula 10.4- Não  será permitido fogos de artifício, fumaça colorida, fixar fitas adesivas e ou decorativas, pregos,  grampear , parafusos no piso, grampos nas colunas , paredes , madeira,  uso de de papel picado, e quaisquer outros objetos que possam danificar o espaço.</p>      
            <p align="justify">cláusula 10.5- O LOCATÁRIO (a)  fica ciente que a energia elétrica para a realização do evento é fornecida pela companhia pública de energia ( equatorial) , caso venha a ocorrer qualquer falha no funcionamento da rede elétrica, o locador fica isento de quaisquer responsabilidade,devendo ser observado a potência dos aparelhos elétricos a serem utilizados, ou mesmo a locação de gerador de energia durante o evento.</p>      
            <p align="justify">Cláusula 10.6- O ar condicionado será ligado 1 hora antes do evento. Caso tenha a necessidade de climatizar o ambiente antes do horário estipulado, será cobrada uma taxa no valor de R$ 120,00 ( Cento e Vinte Reias) por hora.</p>
            <pre></pre>

            <p><h8><strong>CLÁUSULA 11ª - DA ENTREGA DO ESPAÇO E DA SUA MOBÍLIA</strong></h8></p>

            <p align="justify">Resta acordado que, finda a locação, o LOCATÁRIO (a) efetuará a entrega, nas mesmas condições em que o encontrou, de toda a mobília, elencada no laudo de vistoria em anexo, sob pena de indenização dos valores unitários de cada móvel ou item que estiver em falta.</p>      
            <p align="justify">Parágrafo único - A LOCADORA será também indenizada em relação aos móveis que se encontrem danificados, salvo aqueles com desgastes pelo uso comum.</p>      
           
            <p><h8><strong>CLÁUSULA 12ª - DA RESCISÃO</strong></h8></p>

            <p align="justify">Ocorrerá a rescisão do presente contrato, independente de qualquer comunicação prévia ou indenização por parte da LOCADORA quando:</p>      
            <p align="justify">I. ocorrendo qualquer sinistro, incêndio ou algo que impossibilite a posse do espaço locado;</p>      
            <p align="justify">II-Nos casos previstos na cláusula sexta </p>      
            <p align="justify">1º. Poderá também o presente instrumento ser rescindido, sem gerar direito a indenização ou qualquer ônus para a LOCADORA, caso o espaço seja utilizado de forma diversa da especificada neste instrumento.</p>      
            
            <p><h8><strong>CLÁUSULA 13ª - DO DESCUMPRIMENTO</strong></h8></p>

            <p align="justify">Caso ocorra o descumprimento de qualquer cláusula deste contrato, por qualquer uma das partes, acarretará rescisão imediata deste contrato.</p>      
            <p align="justify">1º - As partes estipulam que o infrator pagará multa no percentual de 30% do valor do contrato.</p>      
            <p align="justify">2º - Qualquer condescendência da LOCADORA para com o LOCATÁRIO (a) quanto ao cumprimento de qualquer cláusula do presente contrato constituirá mera tolerância e não importará em alteração ou modificação das cláusulas contratuais.</p>      
           
            <p><h8><strong>DAS DISPOSIÇÕES GERAIS</strong></h8></p>

            <p align="justify"><strong>CLÁUSULA 14ª </strong>- fica autorizado pelo LOCATÁRIO (a) o direito de divulgação de filmagens e fotos realizados no evento, do qual assinará termo de uso de imagem, que faz parte integrante deste instrumento contratual.  caso o locatário não concorde deverá comunicador ao locador por escrito no prazo de 30 (trinta) dias antes do evento, sob pena de preclusão.</p>      
            <p align="justify">Qualquer modificação nos termos deste instrumento contratual, somente terá validade e eficácia se devidamente ajustado entre as partes através de aditivo assinado do qual fará parte integrante deste contrato.</p>      
                        
            <p><h8><strong>CLÁUSULA 15ª - DO FORO</strong></h8></p>

            <p align="justify">Fica desde já eleito o foro da comarca de Aparecida de Goiânia para serem resolvidas eventuais controvérsias  decorrentes deste contrato.</p>      
            <p align="justify">Por estarem assim certos e ajustados, firmam os signatários este instrumento em 02 (duas) vias de igual teor e forma, e para único fim de Direito, diante das 02 (duas) testemunhas abaixo, que também o subscrevem.</p>      
         
            
            <p><h8><strong>OBS: </strong></h8></p>
            <p align="justify">
                {{ $registro[0]->observacao }}
            </p>
                
            <p><h8>
                <strong>
                  Aparecida de Goiânia, {{ $dia }} de  {{ $mes }} {{ $ano }} 
                </strong>
                </h8>
            </p>
            <br><br><br><br>
            <p>
                <h8>
                ______________________________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ______________________________<br>                           
                &nbsp;&nbsp;&nbsp;&nbsp;<strong>Assinatura do LOCATÁRIO(A)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Assinatura do LOCADOR</strong>    
                </h8>
            </p>
            <br><br><br><br>
            <p>
                <h8>
                ______________________________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ______________________________<br>                           
                &nbsp;&nbsp;&nbsp;&nbsp;<strong>Testemunha (1) CPF: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Testemunha (2) CPF: </strong>    
                </h8>
            </p>
           
    </div>
</div>
</body>
</html>