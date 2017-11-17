<?php
    require_once('option.php');
    $key = get_option('key_squeeze_wp');
    
    $option = squeezewp_verifica_dominio();
    $funcao = squeezewp_verifica_funcao(2);
    
    $exibir_facebook = get_post_meta($id, 'exibir_facebook', true);
    $exibir_plus = get_post_meta($id, 'exibir_plus', true);
    $exibir_youtube = get_post_meta($id, 'exibir_youtube', true);
    $exibir_twitter = get_post_meta($id, 'exibir_twitter', true);
    
    $facebook = get_option('facebook_squeeze_wp');
    $twitter = get_option('twitter_squeeze_wp');
    $plus = get_option('plus_squeeze_wp');
    $youtube = get_option('youtube_squeeze_wp');
    
    if (($option && $funcao)){
?>    
<div class="redes-sociais <?php squeezewp_get_animacao('animated zoomIn'); ?>">
    <?php if ($exibir_facebook && $facebook <> '') { ?><div class="social facebook"><div class="fb-like" data-href="<?php echo $facebook; ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div> </div><?php } ?>
    <?php if ($exibir_plus && $plus <> '') { ?><div class="social"><div class="g-follow" data-annotation="bubble" data-height="24" data-href="<?php echo $plus; ?>" data-rel="author"></div></div><?php } ?>
    <?php if ($exibir_youtube && $youtube <> '') { ?><div class="social"><div class="g-ytsubscribe" data-channelid="<?php echo $youtube; ?>" data-layout="default" data-count="default"></div></div><?php } ?>
    <?php if ($exibir_twitter  && $twitter <> '') { ?><div class="social"><a href="https://twitter.com/<?php echo $twitter; ?>" class="twitter-follow-button" data-show-count="false" data-lang="pt" data-size="medium">Seguir @<?php echo $twitter; ?></a></div><?php } ?>
</div>
<script type="text/javascript">
    window.___gcfg = {lang: 'pt-BR'};

    (function() {
        var po = document.createElement('script');
        po.type = 'text/javascript';
        po.async = true;
        po.src = 'https://apis.google.com/js/platform.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(po, s);
    })();
</script>    
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=430739126957277&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<script>!function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
        if (!d.getElementById(id)) {
            js = d.createElement(s);
            js.id = id;
            js.src = p + '://platform.twitter.com/widgets.js';
            fjs.parentNode.insertBefore(js, fjs);
        }
    }(document, 'script', 'twitter-wjs');</script>
<?php
    }
    else{
        echo '<style>.form{margin-bottom: 40px;}</style>';
    }
?>
