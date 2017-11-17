<form class="form-signin" method="post" action="/admin/login">
    <center><a href="<?php echo base_url(); ?>#home"><img src="<?php echo base_url('assets'); ?>/img/logo_trans.png" alt="" class="img-responsive logo" style="width: 35%; height: 35%"></a></center>
    </br></br>
    <h2 class="form-signin-heading">Acesso Restrito</h2>
    <input type="text" name="nm_login" class="input-block-level" placeholder="Email address">
    <input type="password" name="ps_login" class="input-block-level" placeholder="Password">

    <button class="btn btn-large btn-primary" type="submit">Acessar</button>
</form>