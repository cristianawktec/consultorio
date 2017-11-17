function marcar_todos(formulario, cbx_controle, cbx_destino) {
    var campos = formulario.elements;
    for(i = 1; i < campos.length; i++) {
        if (campos[i].name.search(cbx_destino) == 0) {
            if(cbx_controle.checked) campos[i].checked = true; else campos[i].checked = false;
        }
    }
}

function logout(f) {
    f.hdn_opcao.value = 'logout';
    f.submit();
}

function abrir_janela(opcao) {
    x = window.open(
        "./sistema/abrir_janela.php?opcao="+opcao,
        "nome_da_janela",
        "top=0, " + 
        "left=0," + 
        "screenY=0," + 
        "screenX=0," + 
        "toolbar=no," + 
        "location=no," + 
        "directories=no," + 
        "status=yes," + 
        "menubar=no," + 
        "scrollbars=yes," + 
        "resizable=no," + 
        "width=780," + 
        "height=500," + 
        "innerwidth=780," + 
        "innerheight=500"
    );
    x.focus();
}
