<?php
echo "<div class='contato'>";
$data = array('class'=>'form_contato','id'=>'form_contato');
echo form_open( base_url('contato/enviar'),$data);
echo form_fieldset("Enviar mensagem");

echo "<span class='validacoes'>" . validation_errors() . "</span>";

echo form_label('Nome', 'nome');
$data = array('name'=>'nome','id'=>'nome');
echo form_input($data);

echo form_label('E-mail', 'email');
$data = array('name'=>'email','id'=>'email');
echo form_input($data);

echo form_label('Mensagem', 'mensagem');
$data = array('name'=>'mensagem','id'=>'mensagem');
echo form_textarea($data);

echo form_submit("btn_cadastro","Enviar");
echo form_fieldset_close();
echo form_close();
echo "</div>";