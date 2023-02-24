<?php

namespace Automatec\Tools;

abstract class Mask
{
    const TELEFONE = '8 OR 9 DIGITOS';

    const DOCUMENTO = 'CPF OR CNPJ';

    const CPF = '###.###.###-##';

    const CNPJ = '##.###.###/####-##';

    const CEP = '##.###-###';

    const MAC = '##:##:##:##:##:##';
}