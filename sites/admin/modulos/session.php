<?

    $pg['titulo'] = 'Session';
    $pg['colspan'] = '1';

    $pg['topico'][] = 'Funções para Sessão';
    $pg['texto'][] = '<pre>
<b>Funções para Sessão</b>

    * session_cache_expire - Retorna o prazo do cache atual
    * session_cache_limiter - Obtém e/ou define o limitador do cache atual
    * session_commit - Sinônimo de session_write_close
    * session_decode - Decifra dado de sessão de uma string
    * session_destroy - Destrói todos os dados registrados em uma sessão
    * session_encode - Codifica os dados da sessão atual como uma string
    * session_get_cookie_params - Obtém os parâmetros do cookie da sessão
    * session_id - Obtém e/ou define o id de sessão atual
    * session_is_registered - Descobre se uma variável global está registrada numa sessão
    * session_module_name - Obtém e/ou define o módulo da sessão atual
    * session_name - Obtém e/ou define o nome da sessão atual
    * session_regenerate_id - Atualiza o id da sessão atual com um novo gerado
    * session_register - Registrar uma ou mais variáveis globais na sessão atual
    * session_save_path - Obtém e/ou define o save path da sessão atual
    * session_set_cookie_params - Define os parâmetros do cookie de sessão
    * session_set_save_handler - Define a sequência de funções de armazenamento
    * session_start - Inicia dados de sessão
    * session_unregister - Desregistra uma variável global da sessão atual
    * session_unset - Libera todas as variáveis de sessão
    * session_write_close - Escreve dados de sessão e termina a sessão

<b>Exemplos</b>

session_cache_expire: ' . session_cache_expire() . '
session_cache_limiter: ' . session_cache_limiter() . '
session_id: ' . session_id() . '
session_module_name: ' . session_module_name() . '
session_name: ' . session_name() . '
session_save_path: ' . session_save_path() . '
</pre>';

require './modulos/corpo.php';





?>