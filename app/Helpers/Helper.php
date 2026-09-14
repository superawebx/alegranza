<?php

/**
 * Formata cpf ou cnpj e retorna para quem solicitou formatado
 * @param $number
 * @return object for controller
 */
function formatCnpjOrCpf($number)
{

    if($number == null){
        return ;
    }

    if (strlen($number) == 11) {
        return $number = substr($number, 0, 3) . '.' . substr($number, 3, 3) . '.' . substr($number, 6, 3) . '-' . substr($number, 9, 2);
    } else {
        if (strlen($number) == 14) {
            return $number = substr($number, 0, 2) . '.' . substr($number, 2, 3) . '.' . substr($number, 5, 3) . '/' . substr($number, 8, 4) . '-' . substr($number, 12, 2);
        }
    }
}

