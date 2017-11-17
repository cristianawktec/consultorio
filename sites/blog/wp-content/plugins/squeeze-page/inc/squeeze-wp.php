<?php
if ($_POST) {
    update_option('key_squeeze_wp', $_POST['key']);
    update_option('facebook_squeeze_wp', $_POST['facebook']);
    update_option('twitter_squeeze_wp', $_POST['twitter']);
    update_option('plus_squeeze_wp', $_POST['plus']);
    update_option('youtube_squeeze_wp', $_POST['youtube']);
    update_option('fonte_titulo_1_squeeze_wp', $_POST['fonte_titulo_1']);
    update_option('fonte_titulo_2_squeeze_wp', $_POST['fonte_titulo_2']);
    update_option('fonte_texto_squeeze_wp', $_POST['fonte_texto']);
    update_option('fonte_cta_squeeze_wp', $_POST['fonte_cta']);
    update_option('css_squeeze_wp', $_POST['css']);
    update_option('scripts_squeeze_wp', $_POST['scripts']);
}
$bootstrap = plugins_url('../bootstrap/css/bootstrap.min.css', __FILE__);
wp_enqueue_style('bootstrap', $bootstrap);

$css_file = plugins_url('../css/css-admin.css', __FILE__);
wp_enqueue_style('css_admin', $css_file);

require_once('option.php');

$option = squeezewp_verifica_dominio();

if ($option == false) {
    ?>
    <div id="alerta" class="alert alert-danger" role="alert">Chave inexistente ou não pode ser usada para este domínio (A versão GRÁTIS foi habilitada)</div>
    <?php
} else {
    ?>
    <div id="alerta" class="alert alert-success" role="alert">A chave é válida</div>
    <?php
}
?>
<style>
    h2{
        margin-top: 5px !important;
        margin-bottom: 20px!important;
    }
</style>
<div class="row corpo">
    <div class="col-md-12">
        <h2>Opções do SqueezeWP</h2>
        <div id="alerta" class="alert alert-danger" role="alert" style="display:none">...</div>
        <form class="form-horizontal" role="form" id="form" method="POST">
            <div class="form-group">
                <label for="key" class="col-sm-2 control-label">Chave do SqueezeWP</label>
                <div class="col-sm-10">
                    <input type="text" name="key" class="form-control" id="key" value="<?php echo get_option('key_squeeze_wp') ?>" placeholder="Chave do SqueezeWP" />
                </div>
            </div>

            <div class="form-group">
                <label for="facebook" class="col-sm-2 control-label">Página do facebook</label>
                <div class="col-sm-10">
                    <input type="text" name="facebook" class="form-control" value="<?php echo get_option('facebook_squeeze_wp') ?>" id="facebook" placeholder="Página do facebook" />
                </div>
            </div>

            <div class="form-group">
                <label for="twitter" class="col-sm-2 control-label">Perfil do Twitter</label>
                <div class="col-sm-10">
                    <input type="text" value="<?php echo get_option('twitter_squeeze_wp') ?>" name="twitter" class="form-control" id="twitter" placeholder="Pefil do Twitter" />
                </div>
            </div>

            <div class="form-group">
                <label for="youtube" class="col-sm-2 control-label">Canal do Youtube</label>
                <div class="col-sm-10">
                    <input type="text" value="<?php echo get_option('youtube_squeeze_wp') ?>" name="youtube" class="form-control" id="youtube" placeholder="Canal do Youtube" />
                </div>
            </div>

            <div class="form-group">
                <label for="plus" class="col-sm-2 control-label">Perfil do Google+</label>
                <div class="col-sm-10">
                    <input type="text" value="<?php echo get_option('plus_squeeze_wp') ?>" name="plus" class="form-control" id="plus" placeholder="Perfil do Google+" />
                </div>
            </div>

            <div class="form-group font-grupo">
                <label for="fonte_titulo_1" class="col-sm-2 control-label">Fonte para a Headline</label>
                <div class="col-sm-10">
                    <select name="fonte_titulo_1" id="fonte_titulo_1">
                        <option value=""></option>
                        <option class="ABeeZee has-variant" value="off">None (Turn off this font)</option>
                        <option class="ABeeZee has-variant" value="ABeeZee">ABeeZee</option>
                        <option class="Abel" value="Abel">Abel</option>
                        <option class="Abril-Fatface has-subsets" value="Abril-Fatface">Abril Fatface</option>
                        <option class="Aclonica" value="Aclonica">Aclonica</option>
                        <option class="Acme" value="Acme">Acme</option>
                        <option class="Actor" value="Actor">Actor</option>
                        <option class="Adamina" value="Adamina">Adamina</option>
                        <option class="Advent-Pro has-variant has-subsets" value="Advent-Pro">Advent Pro</option>
                        <option class="Aguafina-Script has-subsets" value="Aguafina-Script">Aguafina Script</option>
                        <option class="Akronim has-subsets" value="Akronim">Akronim</option>
                        <option class="Aladin has-subsets" value="Aladin">Aladin</option>
                        <option class="Aldrich" value="Aldrich">Aldrich</option>
                        <option class="Alegreya has-variant has-subsets" value="Alegreya">Alegreya</option>
                        <option class="Alegreya-SC has-variant has-subsets" value="Alegreya-SC">Alegreya SC</option>
                        <option class="Alex-Brush has-subsets" value="Alex-Brush">Alex Brush</option>
                        <option class="Alfa-Slab-One" value="Alfa-Slab-One">Alfa Slab One</option>
                        <option class="Alice" value="Alice">Alice</option>
                        <option class="Alike" value="Alike">Alike</option>
                        <option class="Alike-Angular" value="Alike-Angular">Alike Angular</option>
                        <option class="Allan has-variant has-subsets" value="Allan">Allan</option>
                        <option class="Allerta" value="Allerta">Allerta</option>
                        <option class="Allerta-Stencil" value="Allerta-Stencil">Allerta Stencil</option>
                        <option class="Allura has-subsets" value="Allura">Allura</option>
                        <option class="Almendra has-variant has-subsets" value="Almendra">Almendra</option>
                        <option class="Almendra-Display has-subsets" value="Almendra-Display">Almendra Display</option>
                        <option class="Almendra-SC" value="Almendra-SC">Almendra SC</option>
                        <option class="Amarante has-subsets" value="Amarante">Amarante</option>
                        <option class="Amaranth has-variant" value="Amaranth">Amaranth</option>
                        <option class="Amatic-SC has-variant" value="Amatic-SC">Amatic SC</option>
                        <option class="Amethysta" value="Amethysta">Amethysta</option>
                        <option class="Anaheim has-subsets" value="Anaheim">Anaheim</option>
                        <option class="Andada has-subsets" value="Andada">Andada</option>
                        <option class="Andika has-subsets" value="Andika">Andika</option>
                        <option class="Angkor" value="Angkor">Angkor</option>
                        <option class="Annie-Use-Your-Telescope" value="Annie-Use-Your-Telescope">Annie Use Your Telescope</option>
                        <option class="Anonymous-Pro has-variant has-subsets" value="Anonymous-Pro">Anonymous Pro</option>
                        <option class="Antic" value="Antic">Antic</option>
                        <option class="Antic-Didone" value="Antic-Didone">Antic Didone</option>
                        <option class="Antic-Slab" value="Antic-Slab">Antic Slab</option>
                        <option class="Anton has-subsets" value="Anton">Anton</option>
                        <option class="Arapey has-variant" value="Arapey">Arapey</option>
                        <option class="Arbutus has-subsets" value="Arbutus">Arbutus</option>
                        <option class="Arbutus-Slab has-subsets" value="Arbutus-Slab">Arbutus Slab</option>
                        <option class="Architects-Daughter" value="Architects-Daughter">Architects Daughter</option>
                        <option class="Archivo-Black has-subsets" value="Archivo-Black">Archivo Black</option>
                        <option class="Archivo-Narrow has-variant has-subsets" value="Archivo-Narrow">Archivo Narrow</option>
                        <option class="Arimo has-variant has-subsets" value="Arimo">Arimo</option>
                        <option class="Arizonia has-subsets" value="Arizonia">Arizonia</option>
                        <option class="Armata has-subsets" value="Armata">Armata</option>
                        <option class="Artifika" value="Artifika">Artifika</option>
                        <option class="Arvo has-variant" value="Arvo">Arvo</option>
                        <option class="Asap has-variant has-subsets" value="Asap">Asap</option>
                        <option class="Asset" value="Asset">Asset</option>
                        <option class="Astloch has-variant" value="Astloch">Astloch</option>
                        <option class="Asul has-variant" value="Asul">Asul</option>
                        <option class="Atomic-Age" value="Atomic-Age">Atomic Age</option>
                        <option class="Aubrey" value="Aubrey">Aubrey</option>
                        <option class="Audiowide has-subsets" value="Audiowide">Audiowide</option>
                        <option class="Autour-One has-subsets" value="Autour-One">Autour One</option>
                        <option class="Average has-subsets" value="Average">Average</option>
                        <option class="Average-Sans has-subsets" value="Average-Sans">Average Sans</option>
                        <option class="Averia-Gruesa-Libre has-subsets" value="Averia-Gruesa-Libre">Averia Gruesa Libre</option>
                        <option class="Averia-Libre has-variant" value="Averia-Libre">Averia Libre</option>
                        <option class="Averia-Sans-Libre has-variant" value="Averia-Sans-Libre">Averia Sans Libre</option>
                        <option class="Averia-Serif-Libre has-variant" value="Averia-Serif-Libre">Averia Serif Libre</option>
                        <option class="Bad-Script has-subsets" value="Bad-Script">Bad Script</option>
                        <option class="Balthazar" value="Balthazar">Balthazar</option>
                        <option class="Bangers" value="Bangers">Bangers</option>
                        <option class="Basic has-subsets" value="Basic">Basic</option>
                        <option class="Battambang has-variant" value="Battambang">Battambang</option>
                        <option class="Baumans" value="Baumans">Baumans</option>
                        <option class="Bayon" value="Bayon">Bayon</option>
                        <option class="Belgrano" value="Belgrano">Belgrano</option>
                        <option class="Belleza has-subsets" value="Belleza">Belleza</option>
                        <option class="BenchNine has-variant has-subsets" value="BenchNine">BenchNine</option>
                        <option class="Bentham" value="Bentham">Bentham</option>
                        <option class="Berkshire-Swash has-subsets" value="Berkshire-Swash">Berkshire Swash</option>
                        <option class="Bevan" value="Bevan">Bevan</option>
                        <option class="Bigelow-Rules has-subsets" value="Bigelow-Rules">Bigelow Rules</option>
                        <option class="Bigshot-One" value="Bigshot-One">Bigshot One</option>
                        <option class="Bilbo has-subsets" value="Bilbo">Bilbo</option>
                        <option class="Bilbo-Swash-Caps has-subsets" value="Bilbo-Swash-Caps">Bilbo Swash Caps</option>
                        <option class="Bitter has-variant has-subsets" value="Bitter">Bitter</option>
                        <option class="Black-Ops-One has-subsets" value="Black-Ops-One">Black Ops One</option>
                        <option class="Bokor" value="Bokor">Bokor</option>
                        <option class="Bonbon" value="Bonbon">Bonbon</option>
                        <option class="Boogaloo" value="Boogaloo">Boogaloo</option>
                        <option class="Bowlby-One" value="Bowlby-One">Bowlby One</option>
                        <option class="Bowlby-One-SC has-subsets" value="Bowlby-One-SC">Bowlby One SC</option>
                        <option class="Brawler" value="Brawler">Brawler</option>
                        <option class="Bree-Serif has-subsets" value="Bree-Serif">Bree Serif</option>
                        <option class="Bubblegum-Sans has-subsets" value="Bubblegum-Sans">Bubblegum Sans</option>
                        <option class="Bubbler-One has-subsets" value="Bubbler-One">Bubbler One</option>
                        <option class="Buda" value="Buda">Buda</option>
                        <option class="Buenard has-variant has-subsets" value="Buenard">Buenard</option>
                        <option class="Butcherman has-subsets" value="Butcherman">Butcherman</option>
                        <option class="Butterfly-Kids has-subsets" value="Butterfly-Kids">Butterfly Kids</option>
                        <option class="Cabin has-variant" value="Cabin">Cabin</option>
                        <option class="Cabin-Condensed has-variant" value="Cabin-Condensed">Cabin Condensed</option>
                        <option class="Cabin-Sketch has-variant" value="Cabin-Sketch">Cabin Sketch</option>
                        <option class="Caesar-Dressing" value="Caesar-Dressing">Caesar Dressing</option>
                        <option class="Cagliostro" value="Cagliostro">Cagliostro</option>
                        <option class="Calligraffitti" value="Calligraffitti">Calligraffitti</option>
                        <option class="Cambo" value="Cambo">Cambo</option>
                        <option class="Candal" value="Candal">Candal</option>
                        <option class="Cantarell has-variant" value="Cantarell">Cantarell</option>
                        <option class="Cantata-One has-subsets" value="Cantata-One">Cantata One</option>
                        <option class="Cantora-One has-subsets" value="Cantora-One">Cantora One</option>
                        <option class="Capriola has-subsets" value="Capriola">Capriola</option>
                        <option class="Cardo has-variant has-subsets" value="Cardo">Cardo</option>
                        <option class="Carme" value="Carme">Carme</option>
                        <option class="Carrois-Gothic" value="Carrois-Gothic">Carrois Gothic</option>
                        <option class="Carrois-Gothic-SC" value="Carrois-Gothic-SC">Carrois Gothic SC</option>
                        <option class="Carter-One" value="Carter-One">Carter One</option>
                        <option class="Caudex has-variant has-subsets" value="Caudex">Caudex</option>
                        <option class="Cedarville-Cursive" value="Cedarville-Cursive">Cedarville Cursive</option>
                        <option class="Ceviche-One" value="Ceviche-One">Ceviche One</option>
                        <option class="Changa-One has-variant" value="Changa-One">Changa One</option>
                        <option class="Chango has-subsets" value="Chango">Chango</option>
                        <option class="Chau-Philomene-One has-variant has-subsets" value="Chau-Philomene-One">Chau Philomene One</option>
                        <option class="Chela-One has-subsets" value="Chela-One">Chela One</option>
                        <option class="Chelsea-Market has-subsets" value="Chelsea-Market">Chelsea Market</option>
                        <option class="Chenla" value="Chenla">Chenla</option>
                        <option class="Cherry-Cream-Soda" value="Cherry-Cream-Soda">Cherry Cream Soda</option>
                        <option class="Cherry-Swash has-variant has-subsets" value="Cherry-Swash">Cherry Swash</option>
                        <option class="Chewy" value="Chewy">Chewy</option>
                        <option class="Chicle has-subsets" value="Chicle">Chicle</option>
                        <option class="Chivo has-variant" value="Chivo">Chivo</option>
                        <option class="Cinzel has-variant" value="Cinzel">Cinzel</option>
                        <option class="Cinzel-Decorative has-variant" value="Cinzel-Decorative">Cinzel Decorative</option>
                        <option class="Clicker-Script has-subsets" value="Clicker-Script">Clicker Script</option>
                        <option class="Coda has-variant" value="Coda">Coda</option>
                        <option class="Coda-Caption" value="Coda-Caption">Coda Caption</option>
                        <option class="Codystar has-variant has-subsets" value="Codystar">Codystar</option>
                        <option class="Combo has-subsets" value="Combo">Combo</option>
                        <option class="Comfortaa has-variant has-subsets" value="Comfortaa">Comfortaa</option>
                        <option class="Coming-Soon" value="Coming-Soon">Coming Soon</option>
                        <option class="Concert-One has-subsets" value="Concert-One">Concert One</option>
                        <option class="Condiment has-subsets" value="Condiment">Condiment</option>
                        <option class="Content has-variant" value="Content">Content</option>
                        <option class="Contrail-One" value="Contrail-One">Contrail One</option>
                        <option class="Convergence" value="Convergence">Convergence</option>
                        <option class="Cookie" value="Cookie">Cookie</option>
                        <option class="Copse" value="Copse">Copse</option>
                        <option class="Corben has-variant" value="Corben">Corben</option>
                        <option class="Courgette has-subsets" value="Courgette">Courgette</option>
                        <option class="Cousine has-variant" value="Cousine">Cousine</option>
                        <option class="Coustard has-variant" value="Coustard">Coustard</option>
                        <option class="Covered-By-Your-Grace" value="Covered-By-Your-Grace">Covered By Your Grace</option>
                        <option class="Crafty-Girls" value="Crafty-Girls">Crafty Girls</option>
                        <option class="Creepster" value="Creepster">Creepster</option>
                        <option class="Crete-Round has-variant has-subsets" value="Crete-Round">Crete Round</option>
                        <option class="Crimson-Text has-variant" value="Crimson-Text">Crimson Text</option>
                        <option class="Croissant-One has-subsets" value="Croissant-One">Croissant One</option>
                        <option class="Crushed" value="Crushed">Crushed</option>
                        <option class="Cuprum has-variant has-subsets" value="Cuprum">Cuprum</option>
                        <option class="Cutive has-subsets" value="Cutive">Cutive</option>
                        <option class="Cutive-Mono has-subsets" value="Cutive-Mono">Cutive Mono</option>
                        <option class="Damion" value="Damion">Damion</option>
                        <option class="Dancing-Script has-variant" value="Dancing-Script">Dancing Script</option>
                        <option class="Dangrek" value="Dangrek">Dangrek</option>
                        <option class="Dawning-of-a-New-Day" value="Dawning-of-a-New-Day">Dawning of a New Day</option>
                        <option class="Days-One" value="Days-One">Days One</option>
                        <option class="Delius" value="Delius">Delius</option>
                        <option class="Delius-Swash-Caps" value="Delius-Swash-Caps">Delius Swash Caps</option>
                        <option class="Delius-Unicase has-variant" value="Delius-Unicase">Delius Unicase</option>
                        <option class="Della-Respira" value="Della-Respira">Della Respira</option>
                        <option class="Denk-One has-subsets" value="Denk-One">Denk One</option>
                        <option class="Devonshire has-subsets" value="Devonshire">Devonshire</option>
                        <option class="Didact-Gothic has-subsets" value="Didact-Gothic">Didact Gothic</option>
                        <option class="Diplomata has-subsets" value="Diplomata">Diplomata</option>
                        <option class="Diplomata-SC has-subsets" value="Diplomata-SC">Diplomata SC</option>
                        <option class="Domine has-variant has-subsets" value="Domine">Domine</option>
                        <option class="Donegal-One has-subsets" value="Donegal-One">Donegal One</option>
                        <option class="Doppio-One has-subsets" value="Doppio-One">Doppio One</option>
                        <option class="Dorsa" value="Dorsa">Dorsa</option>
                        <option class="Dosis has-variant has-subsets" value="Dosis">Dosis</option>
                        <option class="Dr-Sugiyama has-subsets" value="Dr-Sugiyama">Dr Sugiyama</option>
                        <option class="Droid-Sans has-variant" value="Droid-Sans">Droid Sans</option>
                        <option class="Droid-Sans-Mono" value="Droid-Sans-Mono">Droid Sans Mono</option>
                        <option class="Droid-Serif has-variant" value="Droid-Serif">Droid Serif</option>
                        <option class="Duru-Sans has-subsets" value="Duru-Sans">Duru Sans</option>
                        <option class="Dynalight has-subsets" value="Dynalight">Dynalight</option>
                        <option class="EB-Garamond has-subsets" value="EB-Garamond">EB Garamond</option>
                        <option class="Eagle-Lake has-subsets" value="Eagle-Lake">Eagle Lake</option>
                        <option class="Eater has-subsets" value="Eater">Eater</option>
                        <option class="Economica has-variant has-subsets" value="Economica">Economica</option>
                        <option class="Electrolize" value="Electrolize">Electrolize</option>
                        <option class="Elsie has-variant has-subsets" value="Elsie">Elsie</option>
                        <option class="Elsie-Swash-Caps has-variant has-subsets" value="Elsie-Swash-Caps">Elsie Swash Caps</option>
                        <option class="Emblema-One has-subsets" value="Emblema-One">Emblema One</option>
                        <option class="Emilys-Candy has-subsets" value="Emilys-Candy">Emilys Candy</option>
                        <option class="Engagement" value="Engagement">Engagement</option>
                        <option class="Englebert has-subsets" value="Englebert">Englebert</option>
                        <option class="Enriqueta has-variant has-subsets" value="Enriqueta">Enriqueta</option>
                        <option class="Erica-One" value="Erica-One">Erica One</option>
                        <option class="Esteban has-subsets" value="Esteban">Esteban</option>
                        <option class="Euphoria-Script has-subsets" value="Euphoria-Script">Euphoria Script</option>
                        <option class="Ewert has-subsets" value="Ewert">Ewert</option>
                        <option class="Exo has-variant has-subsets" value="Exo">Exo</option>
                        <option class="Expletus-Sans has-variant" value="Expletus-Sans">Expletus Sans</option>
                        <option class="Fanwood-Text has-variant" value="Fanwood-Text">Fanwood Text</option>
                        <option class="Fascinate" value="Fascinate">Fascinate</option>
                        <option class="Fascinate-Inline" value="Fascinate-Inline">Fascinate Inline</option>
                        <option class="Faster-One" value="Faster-One">Faster One</option>
                        <option class="Fasthand" value="Fasthand">Fasthand</option>
                        <option class="Federant" value="Federant">Federant</option>
                        <option class="Federo" value="Federo">Federo</option>
                        <option class="Felipa has-subsets" value="Felipa">Felipa</option>
                        <option class="Fenix has-subsets" value="Fenix">Fenix</option>
                        <option class="Finger-Paint" value="Finger-Paint">Finger Paint</option>
                        <option class="Fjalla-One has-subsets" value="Fjalla-One">Fjalla One</option>
                        <option class="Fjord-One" value="Fjord-One">Fjord One</option>
                        <option class="Flamenco has-variant" value="Flamenco">Flamenco</option>
                        <option class="Flavors" value="Flavors">Flavors</option>
                        <option class="Fondamento has-variant has-subsets" value="Fondamento">Fondamento</option>
                        <option class="Fontdiner-Swanky" value="Fontdiner-Swanky">Fontdiner Swanky</option>
                        <option class="Forum has-subsets" value="Forum">Forum</option>
                        <option class="Francois-One has-subsets" value="Francois-One">Francois One</option>
                        <option class="Freckle-Face has-subsets" value="Freckle-Face">Freckle Face</option>
                        <option class="Fredericka-the-Great" value="Fredericka-the-Great">Fredericka the Great</option>
                        <option class="Fredoka-One" value="Fredoka-One">Fredoka One</option>
                        <option class="Freehand" value="Freehand">Freehand</option>
                        <option class="Fresca has-subsets" value="Fresca">Fresca</option>
                        <option class="Frijole" value="Frijole">Frijole</option>
                        <option class="Fruktur has-subsets" value="Fruktur">Fruktur</option>
                        <option class="Fugaz-One" value="Fugaz-One">Fugaz One</option>
                        <option class="GFS-Didot" value="GFS-Didot">GFS Didot</option>
                        <option class="GFS-Neohellenic has-variant" value="GFS-Neohellenic">GFS Neohellenic</option>
                        <option class="Gabriela has-subsets" value="Gabriela">Gabriela</option>
                        <option class="Gafata has-subsets" value="Gafata">Gafata</option>
                        <option class="Galdeano" value="Galdeano">Galdeano</option>
                        <option class="Galindo has-subsets" value="Galindo">Galindo</option>
                        <option class="Gentium-Basic has-variant has-subsets" value="Gentium-Basic">Gentium Basic</option>
                        <option class="Gentium-Book-Basic has-variant has-subsets" value="Gentium-Book-Basic">Gentium Book Basic</option>
                        <option class="Geo has-variant" value="Geo">Geo</option>
                        <option class="Geostar" value="Geostar">Geostar</option>
                        <option class="Geostar-Fill" value="Geostar-Fill">Geostar Fill</option>
                        <option class="Germania-One" value="Germania-One">Germania One</option>
                        <option class="Gilda-Display has-subsets" value="Gilda-Display">Gilda Display</option>
                        <option class="Give-You-Glory" value="Give-You-Glory">Give You Glory</option>
                        <option class="Glass-Antiqua has-subsets" value="Glass-Antiqua">Glass Antiqua</option>
                        <option class="Glegoo has-subsets" value="Glegoo">Glegoo</option>
                        <option class="Gloria-Hallelujah" value="Gloria-Hallelujah">Gloria Hallelujah</option>
                        <option class="Goblin-One" value="Goblin-One">Goblin One</option>
                        <option class="Gochi-Hand" value="Gochi-Hand">Gochi Hand</option>
                        <option class="Gorditas has-variant" value="Gorditas">Gorditas</option>
                        <option class="Goudy-Bookletter-1911" value="Goudy-Bookletter-1911">Goudy Bookletter 1911</option>
                        <option class="Graduate" value="Graduate">Graduate</option>
                        <option class="Grand-Hotel has-subsets" value="Grand-Hotel">Grand Hotel</option>
                        <option class="Gravitas-One" value="Gravitas-One">Gravitas One</option>
                        <option class="Great-Vibes has-subsets" value="Great-Vibes">Great Vibes</option>
                        <option class="Griffy has-subsets" value="Griffy">Griffy</option>
                        <option class="Gruppo has-subsets" value="Gruppo">Gruppo</option>
                        <option class="Gudea has-variant has-subsets" value="Gudea">Gudea</option>
                        <option class="Habibi has-subsets" value="Habibi">Habibi</option>
                        <option class="Hammersmith-One has-subsets" value="Hammersmith-One">Hammersmith One</option>
                        <option class="Hanalei has-subsets" value="Hanalei">Hanalei</option>
                        <option class="Hanalei-Fill has-subsets" value="Hanalei-Fill">Hanalei Fill</option>
                        <option class="Handlee" value="Handlee">Handlee</option>
                        <option class="Hanuman has-variant" value="Hanuman">Hanuman</option>
                        <option class="Happy-Monkey has-subsets" value="Happy-Monkey">Happy Monkey</option>
                        <option class="Headland-One has-subsets" value="Headland-One">Headland One</option>
                        <option class="Henny-Penny" value="Henny-Penny">Henny Penny</option>
                        <option class="Herr-Von-Muellerhoff has-subsets" value="Herr-Von-Muellerhoff">Herr Von Muellerhoff</option>
                        <option class="Holtwood-One-SC" value="Holtwood-One-SC">Holtwood One SC</option>
                        <option class="Homemade-Apple" value="Homemade-Apple">Homemade Apple</option>
                        <option class="Homenaje has-subsets" value="Homenaje">Homenaje</option>
                        <option class="IM-Fell-DW-Pica has-variant" value="IM-Fell-DW-Pica">IM Fell DW Pica</option>
                        <option class="IM-Fell-DW-Pica-SC" value="IM-Fell-DW-Pica-SC">IM Fell DW Pica SC</option>
                        <option class="IM-Fell-Double-Pica has-variant" value="IM-Fell-Double-Pica">IM Fell Double Pica</option>
                        <option class="IM-Fell-Double-Pica-SC" value="IM-Fell-Double-Pica-SC">IM Fell Double Pica SC</option>
                        <option class="IM-Fell-English has-variant" value="IM-Fell-English">IM Fell English</option>
                        <option class="IM-Fell-English-SC" value="IM-Fell-English-SC">IM Fell English SC</option>
                        <option class="IM-Fell-French-Canon has-variant" value="IM-Fell-French-Canon">IM Fell French Canon</option>
                        <option class="IM-Fell-French-Canon-SC" value="IM-Fell-French-Canon-SC">IM Fell French Canon SC</option>
                        <option class="IM-Fell-Great-Primer has-variant" value="IM-Fell-Great-Primer">IM Fell Great Primer</option>
                        <option class="IM-Fell-Great-Primer-SC" value="IM-Fell-Great-Primer-SC">IM Fell Great Primer SC</option>
                        <option class="Iceberg" value="Iceberg">Iceberg</option>
                        <option class="Iceland" value="Iceland">Iceland</option>
                        <option class="Imprima has-subsets" value="Imprima">Imprima</option>
                        <option class="Inconsolata has-variant has-subsets" value="Inconsolata">Inconsolata</option>
                        <option class="Inder has-subsets" value="Inder">Inder</option>
                        <option class="Indie-Flower" value="Indie-Flower">Indie Flower</option>
                        <option class="Inika has-variant has-subsets" value="Inika">Inika</option>
                        <option class="Irish-Grover" value="Irish-Grover">Irish Grover</option>
                        <option class="Istok-Web has-variant has-subsets" value="Istok-Web">Istok Web</option>
                        <option class="Italiana" value="Italiana">Italiana</option>
                        <option class="Italianno has-subsets" value="Italianno">Italianno</option>
                        <option class="Jacques-Francois" value="Jacques-Francois">Jacques Francois</option>
                        <option class="Jacques-Francois-Shadow" value="Jacques-Francois-Shadow">Jacques Francois Shadow</option>
                        <option class="Jim-Nightshade has-subsets" value="Jim-Nightshade">Jim Nightshade</option>
                        <option class="Jockey-One has-subsets" value="Jockey-One">Jockey One</option>
                        <option class="Jolly-Lodger has-subsets" value="Jolly-Lodger">Jolly Lodger</option>
                        <option class="Josefin-Sans has-variant" value="Josefin-Sans">Josefin Sans</option>
                        <option class="Josefin-Slab has-variant" value="Josefin-Slab">Josefin Slab</option>
                        <option class="Joti-One has-subsets" value="Joti-One">Joti One</option>
                        <option class="Judson has-variant" value="Judson">Judson</option>
                        <option class="Julee" value="Julee">Julee</option>
                        <option class="Julius-Sans-One has-subsets" value="Julius-Sans-One">Julius Sans One</option>
                        <option class="Junge" value="Junge">Junge</option>
                        <option class="Jura has-variant has-subsets" value="Jura">Jura</option>
                        <option class="Just-Another-Hand" value="Just-Another-Hand">Just Another Hand</option>
                        <option class="Just-Me-Again-Down-Here" value="Just-Me-Again-Down-Here">Just Me Again Down Here</option>
                        <option class="Kameron has-variant" value="Kameron">Kameron</option>
                        <option class="Karla has-variant has-subsets" value="Karla">Karla</option>
                        <option class="Kaushan-Script has-subsets" value="Kaushan-Script">Kaushan Script</option>
                        <option class="Kavoon has-subsets" value="Kavoon">Kavoon</option>
                        <option class="Keania-One has-subsets" value="Keania-One">Keania One</option>
                        <option class="Kelly-Slab has-subsets" value="Kelly-Slab">Kelly Slab</option>
                        <option class="Kenia" value="Kenia">Kenia</option>
                        <option class="Khmer" value="Khmer">Khmer</option>
                        <option class="Kite-One" value="Kite-One">Kite One</option>
                        <option class="Knewave has-subsets" value="Knewave">Knewave</option>
                        <option class="Kotta-One has-subsets" value="Kotta-One">Kotta One</option>
                        <option class="Koulen" value="Koulen">Koulen</option>
                        <option class="Kranky" value="Kranky">Kranky</option>
                        <option class="Kreon has-variant" value="Kreon">Kreon</option>
                        <option class="Kristi" value="Kristi">Kristi</option>
                        <option class="Krona-One has-subsets" value="Krona-One">Krona One</option>
                        <option class="La-Belle-Aurore" value="La-Belle-Aurore">La Belle Aurore</option>
                        <option class="Lancelot" value="Lancelot">Lancelot</option>
                        <option class="Lato has-variant" value="Lato">Lato</option>
                        <option class="League-Script" value="League-Script">League Script</option>
                        <option class="Leckerli-One" value="Leckerli-One">Leckerli One</option>
                        <option class="Ledger has-subsets" value="Ledger">Ledger</option>
                        <option class="Lekton has-variant has-subsets" value="Lekton">Lekton</option>
                        <option class="Lemon" value="Lemon">Lemon</option>
                        <option class="Libre-Baskerville has-variant has-subsets" value="Libre-Baskerville">Libre Baskerville</option>
                        <option class="Life-Savers has-variant has-subsets" value="Life-Savers">Life Savers</option>
                        <option class="Lilita-One has-subsets" value="Lilita-One">Lilita One</option>
                        <option class="Limelight has-subsets" value="Limelight">Limelight</option>
                        <option class="Linden-Hill has-variant" value="Linden-Hill">Linden Hill</option>
                        <option class="Lobster has-subsets" value="Lobster">Lobster</option>
                        <option class="Lobster-Two has-variant" value="Lobster-Two">Lobster Two</option>
                        <option class="Londrina-Outline" value="Londrina-Outline">Londrina Outline</option>
                        <option class="Londrina-Shadow" value="Londrina-Shadow">Londrina Shadow</option>
                        <option class="Londrina-Sketch" value="Londrina-Sketch">Londrina Sketch</option>
                        <option class="Londrina-Solid" value="Londrina-Solid">Londrina Solid</option>
                        <option class="Lora has-variant" value="Lora">Lora</option>
                        <option class="Love-Ya-Like-A-Sister" value="Love-Ya-Like-A-Sister">Love Ya Like A Sister</option>
                        <option class="Loved-by-the-King" value="Loved-by-the-King">Loved by the King</option>
                        <option class="Lovers-Quarrel has-subsets" value="Lovers-Quarrel">Lovers Quarrel</option>
                        <option class="Luckiest-Guy" value="Luckiest-Guy">Luckiest Guy</option>
                        <option class="Lusitana has-variant" value="Lusitana">Lusitana</option>
                        <option class="Lustria" value="Lustria">Lustria</option>
                        <option class="Macondo" value="Macondo">Macondo</option>
                        <option class="Macondo-Swash-Caps" value="Macondo-Swash-Caps">Macondo Swash Caps</option>
                        <option class="Magra has-variant has-subsets" value="Magra">Magra</option>
                        <option class="Maiden-Orange" value="Maiden-Orange">Maiden Orange</option>
                        <option class="Mako" value="Mako">Mako</option>
                        <option class="Marcellus has-subsets" value="Marcellus">Marcellus</option>
                        <option class="Marcellus-SC has-subsets" value="Marcellus-SC">Marcellus SC</option>
                        <option class="Marck-Script has-subsets" value="Marck-Script">Marck Script</option>
                        <option class="Margarine has-subsets" value="Margarine">Margarine</option>
                        <option class="Marko-One" value="Marko-One">Marko One</option>
                        <option class="Marmelad has-subsets" value="Marmelad">Marmelad</option>
                        <option class="Marvel has-variant" value="Marvel">Marvel</option>
                        <option class="Mate has-variant" value="Mate">Mate</option>
                        <option class="Mate-SC" value="Mate-SC">Mate SC</option>
                        <option class="Maven-Pro has-variant" value="Maven-Pro">Maven Pro</option>
                        <option class="McLaren has-subsets" value="McLaren">McLaren</option>
                        <option class="Meddon" value="Meddon">Meddon</option>
                        <option class="MedievalSharp has-subsets" value="MedievalSharp">MedievalSharp</option>
                        <option class="Medula-One" value="Medula-One">Medula One</option>
                        <option class="Megrim" value="Megrim">Megrim</option>
                        <option class="Meie-Script has-subsets" value="Meie-Script">Meie Script</option>
                        <option class="Merienda has-variant has-subsets" value="Merienda">Merienda</option>
                        <option class="Merienda-One" value="Merienda-One">Merienda One</option>
                        <option class="Merriweather has-variant" value="Merriweather">Merriweather</option>
                        <option class="Merriweather-Sans has-variant has-subsets" value="Merriweather-Sans">Merriweather Sans</option>
                        <option class="Metal" value="Metal">Metal</option>
                        <option class="Metal-Mania has-subsets" value="Metal-Mania">Metal Mania</option>
                        <option class="Metamorphous has-subsets" value="Metamorphous">Metamorphous</option>
                        <option class="Metrophobic" value="Metrophobic">Metrophobic</option>
                        <option class="Michroma" value="Michroma">Michroma</option>
                        <option class="Milonga has-subsets" value="Milonga">Milonga</option>
                        <option class="Miltonian" value="Miltonian">Miltonian</option>
                        <option class="Miltonian-Tattoo" value="Miltonian-Tattoo">Miltonian Tattoo</option>
                        <option class="Miniver" value="Miniver">Miniver</option>
                        <option class="Miss-Fajardose has-subsets" value="Miss-Fajardose">Miss Fajardose</option>
                        <option class="Modern-Antiqua has-subsets" value="Modern-Antiqua">Modern Antiqua</option>
                        <option class="Molengo has-subsets" value="Molengo">Molengo</option>
                        <option class="Molle has-subsets" value="Molle">Molle</option>
                        <option class="Monda has-variant has-subsets" value="Monda">Monda</option>
                        <option class="Monofett" value="Monofett">Monofett</option>
                        <option class="Monoton" value="Monoton">Monoton</option>
                        <option class="Monsieur-La-Doulaise has-subsets" value="Monsieur-La-Doulaise">Monsieur La Doulaise</option>
                        <option class="Montaga" value="Montaga">Montaga</option>
                        <option class="Montez" value="Montez">Montez</option>
                        <option class="Montserrat has-variant" value="Montserrat">Montserrat</option>
                        <option class="Montserrat-Alternates has-variant" value="Montserrat-Alternates">Montserrat Alternates</option>
                        <option class="Montserrat-Subrayada has-variant" value="Montserrat-Subrayada">Montserrat Subrayada</option>
                        <option class="Moul" value="Moul">Moul</option>
                        <option class="Moulpali" value="Moulpali">Moulpali</option>
                        <option class="Mountains-of-Christmas has-variant" value="Mountains-of-Christmas">Mountains of Christmas</option>
                        <option class="Mouse-Memoirs has-subsets" value="Mouse-Memoirs">Mouse Memoirs</option>
                        <option class="Mr-Bedfort has-subsets" value="Mr-Bedfort">Mr Bedfort</option>
                        <option class="Mr-Dafoe has-subsets" value="Mr-Dafoe">Mr Dafoe</option>
                        <option class="Mr-De-Haviland has-subsets" value="Mr-De-Haviland">Mr De Haviland</option>
                        <option class="Mrs-Saint-Delafield has-subsets" value="Mrs-Saint-Delafield">Mrs Saint Delafield</option>
                        <option class="Mrs-Sheppards has-subsets" value="Mrs-Sheppards">Mrs Sheppards</option>
                        <option class="Muli has-variant" value="Muli">Muli</option>
                        <option class="Mystery-Quest has-subsets" value="Mystery-Quest">Mystery Quest</option>
                        <option class="Neucha has-subsets" value="Neucha">Neucha</option>
                        <option class="Neuton has-variant has-subsets" value="Neuton">Neuton</option>
                        <option class="New-Rocker has-subsets" value="New-Rocker">New Rocker</option>
                        <option class="News-Cycle has-variant has-subsets" value="News-Cycle">News Cycle</option>
                        <option class="Niconne has-subsets" value="Niconne">Niconne</option>
                        <option class="Nixie-One" value="Nixie-One">Nixie One</option>
                        <option class="Nobile has-variant" value="Nobile">Nobile</option>
                        <option class="Nokora has-variant" value="Nokora">Nokora</option>
                        <option class="Norican has-subsets" value="Norican">Norican</option>
                        <option class="Nosifer has-subsets" value="Nosifer">Nosifer</option>
                        <option class="Nothing-You-Could-Do" value="Nothing-You-Could-Do">Nothing You Could Do</option>
                        <option class="Noticia-Text has-variant has-subsets" value="Noticia-Text">Noticia Text</option>
                        <option class="Nova-Cut" value="Nova-Cut">Nova Cut</option>
                        <option class="Nova-Flat" value="Nova-Flat">Nova Flat</option>
                        <option class="Nova-Mono has-subsets" value="Nova-Mono">Nova Mono</option>
                        <option class="Nova-Oval" value="Nova-Oval">Nova Oval</option>
                        <option class="Nova-Round" value="Nova-Round">Nova Round</option>
                        <option class="Nova-Script" value="Nova-Script">Nova Script</option>
                        <option class="Nova-Slim" value="Nova-Slim">Nova Slim</option>
                        <option class="Nova-Square" value="Nova-Square">Nova Square</option>
                        <option class="Numans" value="Numans">Numans</option>
                        <option class="Nunito has-variant" value="Nunito">Nunito</option>
                        <option class="Odor-Mean-Chey" value="Odor-Mean-Chey">Odor Mean Chey</option>
                        <option class="Offside" value="Offside">Offside</option>
                        <option class="Old-Standard-TT has-variant" value="Old-Standard-TT">Old Standard TT</option>
                        <option class="Oldenburg has-subsets" value="Oldenburg">Oldenburg</option>
                        <option class="Oleo-Script has-variant has-subsets" value="Oleo-Script">Oleo Script</option>
                        <option class="Oleo-Script-Swash-Caps has-variant has-subsets" value="Oleo-Script-Swash-Caps">Oleo Script Swash Caps</option>
                        <option class="Open-Sans has-variant has-subsets" value="Open-Sans">Open Sans</option>
                        <option class="Open-Sans-Condensed has-variant has-subsets" value="Open-Sans-Condensed">Open Sans Condensed</option>
                        <option class="Oranienbaum has-subsets" value="Oranienbaum">Oranienbaum</option>
                        <option class="Orbitron has-variant" value="Orbitron">Orbitron</option>
                        <option class="Oregano has-variant has-subsets" value="Oregano">Oregano</option>
                        <option class="Orienta has-subsets" value="Orienta">Orienta</option>
                        <option class="Original-Surfer" value="Original-Surfer">Original Surfer</option>
                        <option class="Oswald has-variant has-subsets" value="Oswald">Oswald</option>
                        <option class="Over-the-Rainbow" value="Over-the-Rainbow">Over the Rainbow</option>
                        <option class="Overlock has-variant has-subsets" value="Overlock">Overlock</option>
                        <option class="Overlock-SC has-subsets" value="Overlock-SC">Overlock SC</option>
                        <option class="Ovo" value="Ovo">Ovo</option>
                        <option class="Oxygen has-variant has-subsets" value="Oxygen">Oxygen</option>
                        <option class="Oxygen-Mono has-subsets" value="Oxygen-Mono">Oxygen Mono</option>
                        <option class="PT-Mono has-subsets" value="PT-Mono">PT Mono</option>
                        <option class="PT-Sans has-variant has-subsets" value="PT-Sans">PT Sans</option>
                        <option class="PT-Sans-Caption has-variant has-subsets" value="PT-Sans-Caption">PT Sans Caption</option>
                        <option class="PT-Sans-Narrow has-variant has-subsets" value="PT-Sans-Narrow">PT Sans Narrow</option>
                        <option class="PT-Serif has-variant has-subsets" value="PT-Serif">PT Serif</option>
                        <option class="PT-Serif-Caption has-variant has-subsets" value="PT-Serif-Caption">PT Serif Caption</option>
                        <option class="Pacifico" value="Pacifico">Pacifico</option>
                        <option class="Paprika" value="Paprika">Paprika</option>
                        <option class="Parisienne has-subsets" value="Parisienne">Parisienne</option>
                        <option class="Passero-One has-subsets" value="Passero-One">Passero One</option>
                        <option class="Passion-One has-variant has-subsets" value="Passion-One">Passion One</option>
                        <option class="Patrick-Hand has-subsets" value="Patrick-Hand">Patrick Hand</option>
                        <option class="Patrick-Hand-SC has-subsets" value="Patrick-Hand-SC">Patrick Hand SC</option>
                        <option class="Patua-One" value="Patua-One">Patua One</option>
                        <option class="Paytone-One" value="Paytone-One">Paytone One</option>
                        <option class="Peralta has-subsets" value="Peralta">Peralta</option>
                        <option class="Permanent-Marker" value="Permanent-Marker">Permanent Marker</option>
                        <option class="Petit-Formal-Script has-subsets" value="Petit-Formal-Script">Petit Formal Script</option>
                        <option class="Petrona" value="Petrona">Petrona</option>
                        <option class="Philosopher has-variant has-subsets" value="Philosopher">Philosopher</option>
                        <option class="Piedra has-subsets" value="Piedra">Piedra</option>
                        <option class="Pinyon-Script" value="Pinyon-Script">Pinyon Script</option>
                        <option class="Pirata-One has-subsets" value="Pirata-One">Pirata One</option>
                        <option class="Plaster has-subsets" value="Plaster">Plaster</option>
                        <option class="Play has-variant has-subsets" value="Play">Play</option>
                        <option class="Playball has-subsets" value="Playball">Playball</option>
                        <option class="Playfair-Display has-variant has-subsets" value="Playfair-Display">Playfair Display</option>
                        <option class="Playfair-Display-SC has-variant has-subsets" value="Playfair-Display-SC">Playfair Display SC</option>
                        <option class="Podkova has-variant" value="Podkova">Podkova</option>
                        <option class="Poiret-One has-subsets" value="Poiret-One">Poiret One</option>
                        <option class="Poller-One" value="Poller-One">Poller One</option>
                        <option class="Poly has-variant" value="Poly">Poly</option>
                        <option class="Pompiere" value="Pompiere">Pompiere</option>
                        <option class="Pontano-Sans has-subsets" value="Pontano-Sans">Pontano Sans</option>
                        <option class="Port-Lligat-Sans" value="Port-Lligat-Sans">Port Lligat Sans</option>
                        <option class="Port-Lligat-Slab" value="Port-Lligat-Slab">Port Lligat Slab</option>
                        <option class="Prata" value="Prata">Prata</option>
                        <option class="Preahvihear" value="Preahvihear">Preahvihear</option>
                        <option class="Press-Start-2P has-subsets" value="Press-Start-2P">Press Start 2P</option>
                        <option class="Princess-Sofia has-subsets" value="Princess-Sofia">Princess Sofia</option>
                        <option class="Prociono" value="Prociono">Prociono</option>
                        <option class="Prosto-One has-subsets" value="Prosto-One">Prosto One</option>
                        <option class="Puritan has-variant" value="Puritan">Puritan</option>
                        <option class="Purple-Purse has-subsets" value="Purple-Purse">Purple Purse</option>
                        <option class="Quando has-subsets" value="Quando">Quando</option>
                        <option class="Quantico has-variant" value="Quantico">Quantico</option>
                        <option class="Quattrocento has-variant has-subsets" value="Quattrocento">Quattrocento</option>
                        <option class="Quattrocento-Sans has-variant has-subsets" value="Quattrocento-Sans">Quattrocento Sans</option>
                        <option class="Questrial" value="Questrial">Questrial</option>
                        <option class="Quicksand has-variant" value="Quicksand">Quicksand</option>
                        <option class="Quintessential has-subsets" value="Quintessential">Quintessential</option>
                        <option class="Qwigley has-subsets" value="Qwigley">Qwigley</option>
                        <option class="Racing-Sans-One has-subsets" value="Racing-Sans-One">Racing Sans One</option>
                        <option class="Radley has-variant has-subsets" value="Radley">Radley</option>
                        <option class="Raleway has-variant" value="Raleway">Raleway</option>
                        <option class="Raleway-Dots has-subsets" value="Raleway-Dots">Raleway Dots</option>
                        <option class="Rambla has-variant has-subsets" value="Rambla">Rambla</option>
                        <option class="Rammetto-One has-subsets" value="Rammetto-One">Rammetto One</option>
                        <option class="Ranchers has-subsets" value="Ranchers">Ranchers</option>
                        <option class="Rancho" value="Rancho">Rancho</option>
                        <option class="Rationale" value="Rationale">Rationale</option>
                        <option class="Redressed" value="Redressed">Redressed</option>
                        <option class="Reenie-Beanie" value="Reenie-Beanie">Reenie Beanie</option>
                        <option class="Revalia has-subsets" value="Revalia">Revalia</option>
                        <option class="Ribeye has-subsets" value="Ribeye">Ribeye</option>
                        <option class="Ribeye-Marrow has-subsets" value="Ribeye-Marrow">Ribeye Marrow</option>
                        <option class="Righteous has-subsets" value="Righteous">Righteous</option>
                        <option class="Risque has-subsets" value="Risque">Risque</option>
                        <option class="Roboto has-variant has-subsets" value="Roboto">Roboto</option>
                        <option class="Roboto-Condensed has-variant has-subsets" value="Roboto-Condensed">Roboto Condensed</option>
                        <option class="Rochester" value="Rochester">Rochester</option>
                        <option class="Rock-Salt" value="Rock-Salt">Rock Salt</option>
                        <option class="Rokkitt has-variant" value="Rokkitt">Rokkitt</option>
                        <option class="Romanesco has-subsets" value="Romanesco">Romanesco</option>
                        <option class="Ropa-Sans has-variant has-subsets" value="Ropa-Sans">Ropa Sans</option>
                        <option class="Rosario has-variant" value="Rosario">Rosario</option>
                        <option class="Rosarivo has-variant has-subsets" value="Rosarivo">Rosarivo</option>
                        <option class="Rouge-Script" value="Rouge-Script">Rouge Script</option>
                        <option class="Ruda has-variant has-subsets" value="Ruda">Ruda</option>
                        <option class="Rufina has-variant has-subsets" value="Rufina">Rufina</option>
                        <option class="Ruge-Boogie has-subsets" value="Ruge-Boogie">Ruge Boogie</option>
                        <option class="Ruluko has-subsets" value="Ruluko">Ruluko</option>
                        <option class="Rum-Raisin has-subsets" value="Rum-Raisin">Rum Raisin</option>
                        <option class="Ruslan-Display has-subsets" value="Ruslan-Display">Ruslan Display</option>
                        <option class="Russo-One has-subsets" value="Russo-One">Russo One</option>
                        <option class="Ruthie has-subsets" value="Ruthie">Ruthie</option>
                        <option class="Rye has-subsets" value="Rye">Rye</option>
                        <option class="Sacramento has-subsets" value="Sacramento">Sacramento</option>
                        <option class="Sail" value="Sail">Sail</option>
                        <option class="Salsa" value="Salsa">Salsa</option>
                        <option class="Sanchez has-variant has-subsets" value="Sanchez">Sanchez</option>
                        <option class="Sancreek has-subsets" value="Sancreek">Sancreek</option>
                        <option class="Sansita-One" value="Sansita-One">Sansita One</option>
                        <option class="Sarina has-subsets" value="Sarina">Sarina</option>
                        <option class="Satisfy" value="Satisfy">Satisfy</option>
                        <option class="Scada has-variant has-subsets" value="Scada">Scada</option>
                        <option class="Schoolbell" value="Schoolbell">Schoolbell</option>
                        <option class="Seaweed-Script has-subsets" value="Seaweed-Script">Seaweed Script</option>
                        <option class="Sevillana has-subsets" value="Sevillana">Sevillana</option>
                        <option class="Seymour-One has-subsets" value="Seymour-One">Seymour One</option>
                        <option class="Shadows-Into-Light" value="Shadows-Into-Light">Shadows Into Light</option>
                        <option class="Shadows-Into-Light-Two has-subsets" value="Shadows-Into-Light-Two">Shadows Into Light Two</option>
                        <option class="Shanti" value="Shanti">Shanti</option>
                        <option class="Share has-variant has-subsets" value="Share">Share</option>
                        <option class="Share-Tech" value="Share-Tech">Share Tech</option>
                        <option class="Share-Tech-Mono" value="Share-Tech-Mono">Share Tech Mono</option>
                        <option class="Shojumaru has-subsets" value="Shojumaru">Shojumaru</option>
                        <option class="Short-Stack" value="Short-Stack">Short Stack</option>
                        <option class="Siemreap" value="Siemreap">Siemreap</option>
                        <option class="Sigmar-One" value="Sigmar-One">Sigmar One</option>
                        <option class="Signika has-variant has-subsets" value="Signika">Signika</option>
                        <option class="Signika-Negative has-variant has-subsets" value="Signika-Negative">Signika Negative</option>
                        <option class="Simonetta has-variant has-subsets" value="Simonetta">Simonetta</option>
                        <option class="Sintony has-variant has-subsets" value="Sintony">Sintony</option>
                        <option class="Sirin-Stencil" value="Sirin-Stencil">Sirin Stencil</option>
                        <option class="Six-Caps" value="Six-Caps">Six Caps</option>
                        <option class="Skranji has-variant has-subsets" value="Skranji">Skranji</option>
                        <option class="Slackey" value="Slackey">Slackey</option>
                        <option class="Smokum" value="Smokum">Smokum</option>
                        <option class="Smythe" value="Smythe">Smythe</option>
                        <option class="Sniglet" value="Sniglet">Sniglet</option>
                        <option class="Snippet" value="Snippet">Snippet</option>
                        <option class="Snowburst-One has-subsets" value="Snowburst-One">Snowburst One</option>
                        <option class="Sofadi-One" value="Sofadi-One">Sofadi One</option>
                        <option class="Sofia" value="Sofia">Sofia</option>
                        <option class="Sonsie-One has-subsets" value="Sonsie-One">Sonsie One</option>
                        <option class="Sorts-Mill-Goudy has-variant has-subsets" value="Sorts-Mill-Goudy">Sorts Mill Goudy</option>
                        <option class="Source-Code-Pro has-variant has-subsets" value="Source-Code-Pro">Source Code Pro</option>
                        <option class="Source-Sans-Pro has-variant has-subsets" value="Source-Sans-Pro">Source Sans Pro</option>
                        <option class="Special-Elite" value="Special-Elite">Special Elite</option>
                        <option class="Spicy-Rice" value="Spicy-Rice">Spicy Rice</option>
                        <option class="Spinnaker has-subsets" value="Spinnaker">Spinnaker</option>
                        <option class="Spirax" value="Spirax">Spirax</option>
                        <option class="Squada-One" value="Squada-One">Squada One</option>
                        <option class="Stalemate has-subsets" value="Stalemate">Stalemate</option>
                        <option class="Stalinist-One has-subsets" value="Stalinist-One">Stalinist One</option>
                        <option class="Stardos-Stencil has-variant" value="Stardos-Stencil">Stardos Stencil</option>
                        <option class="Stint-Ultra-Condensed has-subsets" value="Stint-Ultra-Condensed">Stint Ultra Condensed</option>
                        <option class="Stint-Ultra-Expanded has-subsets" value="Stint-Ultra-Expanded">Stint Ultra Expanded</option>
                        <option class="Stoke has-variant has-subsets" value="Stoke">Stoke</option>
                        <option class="Strait" value="Strait">Strait</option>
                        <option class="Sue-Ellen-Francisco" value="Sue-Ellen-Francisco">Sue Ellen Francisco</option>
                        <option class="Sunshiney" value="Sunshiney">Sunshiney</option>
                        <option class="Supermercado-One" value="Supermercado-One">Supermercado One</option>
                        <option class="Suwannaphum" value="Suwannaphum">Suwannaphum</option>
                        <option class="Swanky-and-Moo-Moo" value="Swanky-and-Moo-Moo">Swanky and Moo Moo</option>
                        <option class="Syncopate has-variant" value="Syncopate">Syncopate</option>
                        <option class="Tangerine has-variant" value="Tangerine">Tangerine</option>
                        <option class="Taprom" value="Taprom">Taprom</option>
                        <option class="Tauri has-subsets" value="Tauri">Tauri</option>
                        <option class="Telex" value="Telex">Telex</option>
                        <option class="Tenor-Sans has-subsets" value="Tenor-Sans">Tenor Sans</option>
                        <option class="Text-Me-One has-subsets" value="Text-Me-One">Text Me One</option>
                        <option class="The-Girl-Next-Door" value="The-Girl-Next-Door">The Girl Next Door</option>
                        <option class="Tienne has-variant" value="Tienne">Tienne</option>
                        <option class="Tinos has-variant" value="Tinos">Tinos</option>
                        <option class="Titan-One has-subsets" value="Titan-One">Titan One</option>
                        <option class="Titillium-Web has-variant has-subsets" value="Titillium-Web">Titillium Web</option>
                        <option class="Trade-Winds" value="Trade-Winds">Trade Winds</option>
                        <option class="Trocchi has-subsets" value="Trocchi">Trocchi</option>
                        <option class="Trochut has-variant" value="Trochut">Trochut</option>
                        <option class="Trykker has-subsets" value="Trykker">Trykker</option>
                        <option class="Tulpen-One" value="Tulpen-One">Tulpen One</option>
                        <option class="Ubuntu has-variant has-subsets" value="Ubuntu">Ubuntu</option>
                        <option class="Ubuntu-Condensed has-subsets" value="Ubuntu-Condensed">Ubuntu Condensed</option>
                        <option class="Ubuntu-Mono has-variant has-subsets" value="Ubuntu-Mono">Ubuntu Mono</option>
                        <option class="Ultra" value="Ultra">Ultra</option>
                        <option class="Uncial-Antiqua" value="Uncial-Antiqua">Uncial Antiqua</option>
                        <option class="Underdog has-subsets" value="Underdog">Underdog</option>
                        <option class="Unica-One has-subsets" value="Unica-One">Unica One</option>
                        <option class="UnifrakturCook" value="UnifrakturCook">UnifrakturCook</option>
                        <option class="UnifrakturMaguntia" value="UnifrakturMaguntia">UnifrakturMaguntia</option>
                        <option class="Unkempt has-variant" value="Unkempt">Unkempt</option>
                        <option class="Unlock" value="Unlock">Unlock</option>
                        <option class="Unna" value="Unna">Unna</option>
                        <option class="VT323" value="VT323">VT323</option>
                        <option class="Vampiro-One has-subsets" value="Vampiro-One">Vampiro One</option>
                        <option class="Varela has-subsets" value="Varela">Varela</option>
                        <option class="Varela-Round" value="Varela-Round">Varela Round</option>
                        <option class="Vast-Shadow" value="Vast-Shadow">Vast Shadow</option>
                        <option class="Vibur" value="Vibur">Vibur</option>
                        <option class="Vidaloka" value="Vidaloka">Vidaloka</option>
                        <option class="Viga has-subsets" value="Viga">Viga</option>
                        <option class="Voces has-subsets" value="Voces">Voces</option>
                        <option class="Volkhov has-variant" value="Volkhov">Volkhov</option>
                        <option class="Vollkorn has-variant" value="Vollkorn">Vollkorn</option>
                        <option class="Voltaire" value="Voltaire">Voltaire</option>
                        <option class="Waiting-for-the-Sunrise" value="Waiting-for-the-Sunrise">Waiting for the Sunrise</option>
                        <option class="Wallpoet" value="Wallpoet">Wallpoet</option>
                        <option class="Walter-Turncoat" value="Walter-Turncoat">Walter Turncoat</option>
                        <option class="Warnes has-subsets" value="Warnes">Warnes</option>
                        <option class="Wellfleet has-subsets" value="Wellfleet">Wellfleet</option>
                        <option class="Wendy-One has-subsets" value="Wendy-One">Wendy One</option>
                        <option class="Wire-One" value="Wire-One">Wire One</option>
                        <option class="Yanone-Kaffeesatz has-variant has-subsets" value="Yanone-Kaffeesatz">Yanone Kaffeesatz</option>
                        <option class="Yellowtail" value="Yellowtail">Yellowtail</option>
                        <option class="Yeseva-One has-subsets" value="Yeseva-One">Yeseva One</option>
                        <option class="Yesteryear" value="Yesteryear">Yesteryear</option>
                        <option class="Zeyada" value="Zeyada">Zeyada</option>
                    </select>
                    <div class="resultado-fonte" id="resultado1" style="font-size: 30px;">A Headline ficará com esta fonte...</div>
                </div>
            </div>

            <div class="form-group font-grupo">
                <label for="fonte_titulo_2" class="col-sm-2 control-label">Fonte para a SubHeadline</label>
                <div class="col-sm-10">
                    <select name="fonte_titulo_2" id="fonte_titulo_2">
                        <option value=""></option>
                        <option class="ABeeZee has-variant" value="off">None (Turn off this font)</option>
                        <option class="ABeeZee has-variant" value="ABeeZee">ABeeZee</option>
                        <option class="Abel" value="Abel">Abel</option>
                        <option class="Abril-Fatface has-subsets" value="Abril-Fatface">Abril Fatface</option>
                        <option class="Aclonica" value="Aclonica">Aclonica</option>
                        <option class="Acme" value="Acme">Acme</option>
                        <option class="Actor" value="Actor">Actor</option>
                        <option class="Adamina" value="Adamina">Adamina</option>
                        <option class="Advent-Pro has-variant has-subsets" value="Advent-Pro">Advent Pro</option>
                        <option class="Aguafina-Script has-subsets" value="Aguafina-Script">Aguafina Script</option>
                        <option class="Akronim has-subsets" value="Akronim">Akronim</option>
                        <option class="Aladin has-subsets" value="Aladin">Aladin</option>
                        <option class="Aldrich" value="Aldrich">Aldrich</option>
                        <option class="Alegreya has-variant has-subsets" value="Alegreya">Alegreya</option>
                        <option class="Alegreya-SC has-variant has-subsets" value="Alegreya-SC">Alegreya SC</option>
                        <option class="Alex-Brush has-subsets" value="Alex-Brush">Alex Brush</option>
                        <option class="Alfa-Slab-One" value="Alfa-Slab-One">Alfa Slab One</option>
                        <option class="Alice" value="Alice">Alice</option>
                        <option class="Alike" value="Alike">Alike</option>
                        <option class="Alike-Angular" value="Alike-Angular">Alike Angular</option>
                        <option class="Allan has-variant has-subsets" value="Allan">Allan</option>
                        <option class="Allerta" value="Allerta">Allerta</option>
                        <option class="Allerta-Stencil" value="Allerta-Stencil">Allerta Stencil</option>
                        <option class="Allura has-subsets" value="Allura">Allura</option>
                        <option class="Almendra has-variant has-subsets" value="Almendra">Almendra</option>
                        <option class="Almendra-Display has-subsets" value="Almendra-Display">Almendra Display</option>
                        <option class="Almendra-SC" value="Almendra-SC">Almendra SC</option>
                        <option class="Amarante has-subsets" value="Amarante">Amarante</option>
                        <option class="Amaranth has-variant" value="Amaranth">Amaranth</option>
                        <option class="Amatic-SC has-variant" value="Amatic-SC">Amatic SC</option>
                        <option class="Amethysta" value="Amethysta">Amethysta</option>
                        <option class="Anaheim has-subsets" value="Anaheim">Anaheim</option>
                        <option class="Andada has-subsets" value="Andada">Andada</option>
                        <option class="Andika has-subsets" value="Andika">Andika</option>
                        <option class="Angkor" value="Angkor">Angkor</option>
                        <option class="Annie-Use-Your-Telescope" value="Annie-Use-Your-Telescope">Annie Use Your Telescope</option>
                        <option class="Anonymous-Pro has-variant has-subsets" value="Anonymous-Pro">Anonymous Pro</option>
                        <option class="Antic" value="Antic">Antic</option>
                        <option class="Antic-Didone" value="Antic-Didone">Antic Didone</option>
                        <option class="Antic-Slab" value="Antic-Slab">Antic Slab</option>
                        <option class="Anton has-subsets" value="Anton">Anton</option>
                        <option class="Arapey has-variant" value="Arapey">Arapey</option>
                        <option class="Arbutus has-subsets" value="Arbutus">Arbutus</option>
                        <option class="Arbutus-Slab has-subsets" value="Arbutus-Slab">Arbutus Slab</option>
                        <option class="Architects-Daughter" value="Architects-Daughter">Architects Daughter</option>
                        <option class="Archivo-Black has-subsets" value="Archivo-Black">Archivo Black</option>
                        <option class="Archivo-Narrow has-variant has-subsets" value="Archivo-Narrow">Archivo Narrow</option>
                        <option class="Arimo has-variant has-subsets" value="Arimo">Arimo</option>
                        <option class="Arizonia has-subsets" value="Arizonia">Arizonia</option>
                        <option class="Armata has-subsets" value="Armata">Armata</option>
                        <option class="Artifika" value="Artifika">Artifika</option>
                        <option class="Arvo has-variant" value="Arvo">Arvo</option>
                        <option class="Asap has-variant has-subsets" value="Asap">Asap</option>
                        <option class="Asset" value="Asset">Asset</option>
                        <option class="Astloch has-variant" value="Astloch">Astloch</option>
                        <option class="Asul has-variant" value="Asul">Asul</option>
                        <option class="Atomic-Age" value="Atomic-Age">Atomic Age</option>
                        <option class="Aubrey" value="Aubrey">Aubrey</option>
                        <option class="Audiowide has-subsets" value="Audiowide">Audiowide</option>
                        <option class="Autour-One has-subsets" value="Autour-One">Autour One</option>
                        <option class="Average has-subsets" value="Average">Average</option>
                        <option class="Average-Sans has-subsets" value="Average-Sans">Average Sans</option>
                        <option class="Averia-Gruesa-Libre has-subsets" value="Averia-Gruesa-Libre">Averia Gruesa Libre</option>
                        <option class="Averia-Libre has-variant" value="Averia-Libre">Averia Libre</option>
                        <option class="Averia-Sans-Libre has-variant" value="Averia-Sans-Libre">Averia Sans Libre</option>
                        <option class="Averia-Serif-Libre has-variant" value="Averia-Serif-Libre">Averia Serif Libre</option>
                        <option class="Bad-Script has-subsets" value="Bad-Script">Bad Script</option>
                        <option class="Balthazar" value="Balthazar">Balthazar</option>
                        <option class="Bangers" value="Bangers">Bangers</option>
                        <option class="Basic has-subsets" value="Basic">Basic</option>
                        <option class="Battambang has-variant" value="Battambang">Battambang</option>
                        <option class="Baumans" value="Baumans">Baumans</option>
                        <option class="Bayon" value="Bayon">Bayon</option>
                        <option class="Belgrano" value="Belgrano">Belgrano</option>
                        <option class="Belleza has-subsets" value="Belleza">Belleza</option>
                        <option class="BenchNine has-variant has-subsets" value="BenchNine">BenchNine</option>
                        <option class="Bentham" value="Bentham">Bentham</option>
                        <option class="Berkshire-Swash has-subsets" value="Berkshire-Swash">Berkshire Swash</option>
                        <option class="Bevan" value="Bevan">Bevan</option>
                        <option class="Bigelow-Rules has-subsets" value="Bigelow-Rules">Bigelow Rules</option>
                        <option class="Bigshot-One" value="Bigshot-One">Bigshot One</option>
                        <option class="Bilbo has-subsets" value="Bilbo">Bilbo</option>
                        <option class="Bilbo-Swash-Caps has-subsets" value="Bilbo-Swash-Caps">Bilbo Swash Caps</option>
                        <option class="Bitter has-variant has-subsets" value="Bitter">Bitter</option>
                        <option class="Black-Ops-One has-subsets" value="Black-Ops-One">Black Ops One</option>
                        <option class="Bokor" value="Bokor">Bokor</option>
                        <option class="Bonbon" value="Bonbon">Bonbon</option>
                        <option class="Boogaloo" value="Boogaloo">Boogaloo</option>
                        <option class="Bowlby-One" value="Bowlby-One">Bowlby One</option>
                        <option class="Bowlby-One-SC has-subsets" value="Bowlby-One-SC">Bowlby One SC</option>
                        <option class="Brawler" value="Brawler">Brawler</option>
                        <option class="Bree-Serif has-subsets" value="Bree-Serif">Bree Serif</option>
                        <option class="Bubblegum-Sans has-subsets" value="Bubblegum-Sans">Bubblegum Sans</option>
                        <option class="Bubbler-One has-subsets" value="Bubbler-One">Bubbler One</option>
                        <option class="Buda" value="Buda">Buda</option>
                        <option class="Buenard has-variant has-subsets" value="Buenard">Buenard</option>
                        <option class="Butcherman has-subsets" value="Butcherman">Butcherman</option>
                        <option class="Butterfly-Kids has-subsets" value="Butterfly-Kids">Butterfly Kids</option>
                        <option class="Cabin has-variant" value="Cabin">Cabin</option>
                        <option class="Cabin-Condensed has-variant" value="Cabin-Condensed">Cabin Condensed</option>
                        <option class="Cabin-Sketch has-variant" value="Cabin-Sketch">Cabin Sketch</option>
                        <option class="Caesar-Dressing" value="Caesar-Dressing">Caesar Dressing</option>
                        <option class="Cagliostro" value="Cagliostro">Cagliostro</option>
                        <option class="Calligraffitti" value="Calligraffitti">Calligraffitti</option>
                        <option class="Cambo" value="Cambo">Cambo</option>
                        <option class="Candal" value="Candal">Candal</option>
                        <option class="Cantarell has-variant" value="Cantarell">Cantarell</option>
                        <option class="Cantata-One has-subsets" value="Cantata-One">Cantata One</option>
                        <option class="Cantora-One has-subsets" value="Cantora-One">Cantora One</option>
                        <option class="Capriola has-subsets" value="Capriola">Capriola</option>
                        <option class="Cardo has-variant has-subsets" value="Cardo">Cardo</option>
                        <option class="Carme" value="Carme">Carme</option>
                        <option class="Carrois-Gothic" value="Carrois-Gothic">Carrois Gothic</option>
                        <option class="Carrois-Gothic-SC" value="Carrois-Gothic-SC">Carrois Gothic SC</option>
                        <option class="Carter-One" value="Carter-One">Carter One</option>
                        <option class="Caudex has-variant has-subsets" value="Caudex">Caudex</option>
                        <option class="Cedarville-Cursive" value="Cedarville-Cursive">Cedarville Cursive</option>
                        <option class="Ceviche-One" value="Ceviche-One">Ceviche One</option>
                        <option class="Changa-One has-variant" value="Changa-One">Changa One</option>
                        <option class="Chango has-subsets" value="Chango">Chango</option>
                        <option class="Chau-Philomene-One has-variant has-subsets" value="Chau-Philomene-One">Chau Philomene One</option>
                        <option class="Chela-One has-subsets" value="Chela-One">Chela One</option>
                        <option class="Chelsea-Market has-subsets" value="Chelsea-Market">Chelsea Market</option>
                        <option class="Chenla" value="Chenla">Chenla</option>
                        <option class="Cherry-Cream-Soda" value="Cherry-Cream-Soda">Cherry Cream Soda</option>
                        <option class="Cherry-Swash has-variant has-subsets" value="Cherry-Swash">Cherry Swash</option>
                        <option class="Chewy" value="Chewy">Chewy</option>
                        <option class="Chicle has-subsets" value="Chicle">Chicle</option>
                        <option class="Chivo has-variant" value="Chivo">Chivo</option>
                        <option class="Cinzel has-variant" value="Cinzel">Cinzel</option>
                        <option class="Cinzel-Decorative has-variant" value="Cinzel-Decorative">Cinzel Decorative</option>
                        <option class="Clicker-Script has-subsets" value="Clicker-Script">Clicker Script</option>
                        <option class="Coda has-variant" value="Coda">Coda</option>
                        <option class="Coda-Caption" value="Coda-Caption">Coda Caption</option>
                        <option class="Codystar has-variant has-subsets" value="Codystar">Codystar</option>
                        <option class="Combo has-subsets" value="Combo">Combo</option>
                        <option class="Comfortaa has-variant has-subsets" value="Comfortaa">Comfortaa</option>
                        <option class="Coming-Soon" value="Coming-Soon">Coming Soon</option>
                        <option class="Concert-One has-subsets" value="Concert-One">Concert One</option>
                        <option class="Condiment has-subsets" value="Condiment">Condiment</option>
                        <option class="Content has-variant" value="Content">Content</option>
                        <option class="Contrail-One" value="Contrail-One">Contrail One</option>
                        <option class="Convergence" value="Convergence">Convergence</option>
                        <option class="Cookie" value="Cookie">Cookie</option>
                        <option class="Copse" value="Copse">Copse</option>
                        <option class="Corben has-variant" value="Corben">Corben</option>
                        <option class="Courgette has-subsets" value="Courgette">Courgette</option>
                        <option class="Cousine has-variant" value="Cousine">Cousine</option>
                        <option class="Coustard has-variant" value="Coustard">Coustard</option>
                        <option class="Covered-By-Your-Grace" value="Covered-By-Your-Grace">Covered By Your Grace</option>
                        <option class="Crafty-Girls" value="Crafty-Girls">Crafty Girls</option>
                        <option class="Creepster" value="Creepster">Creepster</option>
                        <option class="Crete-Round has-variant has-subsets" value="Crete-Round">Crete Round</option>
                        <option class="Crimson-Text has-variant" value="Crimson-Text">Crimson Text</option>
                        <option class="Croissant-One has-subsets" value="Croissant-One">Croissant One</option>
                        <option class="Crushed" value="Crushed">Crushed</option>
                        <option class="Cuprum has-variant has-subsets" value="Cuprum">Cuprum</option>
                        <option class="Cutive has-subsets" value="Cutive">Cutive</option>
                        <option class="Cutive-Mono has-subsets" value="Cutive-Mono">Cutive Mono</option>
                        <option class="Damion" value="Damion">Damion</option>
                        <option class="Dancing-Script has-variant" value="Dancing-Script">Dancing Script</option>
                        <option class="Dangrek" value="Dangrek">Dangrek</option>
                        <option class="Dawning-of-a-New-Day" value="Dawning-of-a-New-Day">Dawning of a New Day</option>
                        <option class="Days-One" value="Days-One">Days One</option>
                        <option class="Delius" value="Delius">Delius</option>
                        <option class="Delius-Swash-Caps" value="Delius-Swash-Caps">Delius Swash Caps</option>
                        <option class="Delius-Unicase has-variant" value="Delius-Unicase">Delius Unicase</option>
                        <option class="Della-Respira" value="Della-Respira">Della Respira</option>
                        <option class="Denk-One has-subsets" value="Denk-One">Denk One</option>
                        <option class="Devonshire has-subsets" value="Devonshire">Devonshire</option>
                        <option class="Didact-Gothic has-subsets" value="Didact-Gothic">Didact Gothic</option>
                        <option class="Diplomata has-subsets" value="Diplomata">Diplomata</option>
                        <option class="Diplomata-SC has-subsets" value="Diplomata-SC">Diplomata SC</option>
                        <option class="Domine has-variant has-subsets" value="Domine">Domine</option>
                        <option class="Donegal-One has-subsets" value="Donegal-One">Donegal One</option>
                        <option class="Doppio-One has-subsets" value="Doppio-One">Doppio One</option>
                        <option class="Dorsa" value="Dorsa">Dorsa</option>
                        <option class="Dosis has-variant has-subsets" value="Dosis">Dosis</option>
                        <option class="Dr-Sugiyama has-subsets" value="Dr-Sugiyama">Dr Sugiyama</option>
                        <option class="Droid-Sans has-variant" value="Droid-Sans">Droid Sans</option>
                        <option class="Droid-Sans-Mono" value="Droid-Sans-Mono">Droid Sans Mono</option>
                        <option class="Droid-Serif has-variant" value="Droid-Serif">Droid Serif</option>
                        <option class="Duru-Sans has-subsets" value="Duru-Sans">Duru Sans</option>
                        <option class="Dynalight has-subsets" value="Dynalight">Dynalight</option>
                        <option class="EB-Garamond has-subsets" value="EB-Garamond">EB Garamond</option>
                        <option class="Eagle-Lake has-subsets" value="Eagle-Lake">Eagle Lake</option>
                        <option class="Eater has-subsets" value="Eater">Eater</option>
                        <option class="Economica has-variant has-subsets" value="Economica">Economica</option>
                        <option class="Electrolize" value="Electrolize">Electrolize</option>
                        <option class="Elsie has-variant has-subsets" value="Elsie">Elsie</option>
                        <option class="Elsie-Swash-Caps has-variant has-subsets" value="Elsie-Swash-Caps">Elsie Swash Caps</option>
                        <option class="Emblema-One has-subsets" value="Emblema-One">Emblema One</option>
                        <option class="Emilys-Candy has-subsets" value="Emilys-Candy">Emilys Candy</option>
                        <option class="Engagement" value="Engagement">Engagement</option>
                        <option class="Englebert has-subsets" value="Englebert">Englebert</option>
                        <option class="Enriqueta has-variant has-subsets" value="Enriqueta">Enriqueta</option>
                        <option class="Erica-One" value="Erica-One">Erica One</option>
                        <option class="Esteban has-subsets" value="Esteban">Esteban</option>
                        <option class="Euphoria-Script has-subsets" value="Euphoria-Script">Euphoria Script</option>
                        <option class="Ewert has-subsets" value="Ewert">Ewert</option>
                        <option class="Exo has-variant has-subsets" value="Exo">Exo</option>
                        <option class="Expletus-Sans has-variant" value="Expletus-Sans">Expletus Sans</option>
                        <option class="Fanwood-Text has-variant" value="Fanwood-Text">Fanwood Text</option>
                        <option class="Fascinate" value="Fascinate">Fascinate</option>
                        <option class="Fascinate-Inline" value="Fascinate-Inline">Fascinate Inline</option>
                        <option class="Faster-One" value="Faster-One">Faster One</option>
                        <option class="Fasthand" value="Fasthand">Fasthand</option>
                        <option class="Federant" value="Federant">Federant</option>
                        <option class="Federo" value="Federo">Federo</option>
                        <option class="Felipa has-subsets" value="Felipa">Felipa</option>
                        <option class="Fenix has-subsets" value="Fenix">Fenix</option>
                        <option class="Finger-Paint" value="Finger-Paint">Finger Paint</option>
                        <option class="Fjalla-One has-subsets" value="Fjalla-One">Fjalla One</option>
                        <option class="Fjord-One" value="Fjord-One">Fjord One</option>
                        <option class="Flamenco has-variant" value="Flamenco">Flamenco</option>
                        <option class="Flavors" value="Flavors">Flavors</option>
                        <option class="Fondamento has-variant has-subsets" value="Fondamento">Fondamento</option>
                        <option class="Fontdiner-Swanky" value="Fontdiner-Swanky">Fontdiner Swanky</option>
                        <option class="Forum has-subsets" value="Forum">Forum</option>
                        <option class="Francois-One has-subsets" value="Francois-One">Francois One</option>
                        <option class="Freckle-Face has-subsets" value="Freckle-Face">Freckle Face</option>
                        <option class="Fredericka-the-Great" value="Fredericka-the-Great">Fredericka the Great</option>
                        <option class="Fredoka-One" value="Fredoka-One">Fredoka One</option>
                        <option class="Freehand" value="Freehand">Freehand</option>
                        <option class="Fresca has-subsets" value="Fresca">Fresca</option>
                        <option class="Frijole" value="Frijole">Frijole</option>
                        <option class="Fruktur has-subsets" value="Fruktur">Fruktur</option>
                        <option class="Fugaz-One" value="Fugaz-One">Fugaz One</option>
                        <option class="GFS-Didot" value="GFS-Didot">GFS Didot</option>
                        <option class="GFS-Neohellenic has-variant" value="GFS-Neohellenic">GFS Neohellenic</option>
                        <option class="Gabriela has-subsets" value="Gabriela">Gabriela</option>
                        <option class="Gafata has-subsets" value="Gafata">Gafata</option>
                        <option class="Galdeano" value="Galdeano">Galdeano</option>
                        <option class="Galindo has-subsets" value="Galindo">Galindo</option>
                        <option class="Gentium-Basic has-variant has-subsets" value="Gentium-Basic">Gentium Basic</option>
                        <option class="Gentium-Book-Basic has-variant has-subsets" value="Gentium-Book-Basic">Gentium Book Basic</option>
                        <option class="Geo has-variant" value="Geo">Geo</option>
                        <option class="Geostar" value="Geostar">Geostar</option>
                        <option class="Geostar-Fill" value="Geostar-Fill">Geostar Fill</option>
                        <option class="Germania-One" value="Germania-One">Germania One</option>
                        <option class="Gilda-Display has-subsets" value="Gilda-Display">Gilda Display</option>
                        <option class="Give-You-Glory" value="Give-You-Glory">Give You Glory</option>
                        <option class="Glass-Antiqua has-subsets" value="Glass-Antiqua">Glass Antiqua</option>
                        <option class="Glegoo has-subsets" value="Glegoo">Glegoo</option>
                        <option class="Gloria-Hallelujah" value="Gloria-Hallelujah">Gloria Hallelujah</option>
                        <option class="Goblin-One" value="Goblin-One">Goblin One</option>
                        <option class="Gochi-Hand" value="Gochi-Hand">Gochi Hand</option>
                        <option class="Gorditas has-variant" value="Gorditas">Gorditas</option>
                        <option class="Goudy-Bookletter-1911" value="Goudy-Bookletter-1911">Goudy Bookletter 1911</option>
                        <option class="Graduate" value="Graduate">Graduate</option>
                        <option class="Grand-Hotel has-subsets" value="Grand-Hotel">Grand Hotel</option>
                        <option class="Gravitas-One" value="Gravitas-One">Gravitas One</option>
                        <option class="Great-Vibes has-subsets" value="Great-Vibes">Great Vibes</option>
                        <option class="Griffy has-subsets" value="Griffy">Griffy</option>
                        <option class="Gruppo has-subsets" value="Gruppo">Gruppo</option>
                        <option class="Gudea has-variant has-subsets" value="Gudea">Gudea</option>
                        <option class="Habibi has-subsets" value="Habibi">Habibi</option>
                        <option class="Hammersmith-One has-subsets" value="Hammersmith-One">Hammersmith One</option>
                        <option class="Hanalei has-subsets" value="Hanalei">Hanalei</option>
                        <option class="Hanalei-Fill has-subsets" value="Hanalei-Fill">Hanalei Fill</option>
                        <option class="Handlee" value="Handlee">Handlee</option>
                        <option class="Hanuman has-variant" value="Hanuman">Hanuman</option>
                        <option class="Happy-Monkey has-subsets" value="Happy-Monkey">Happy Monkey</option>
                        <option class="Headland-One has-subsets" value="Headland-One">Headland One</option>
                        <option class="Henny-Penny" value="Henny-Penny">Henny Penny</option>
                        <option class="Herr-Von-Muellerhoff has-subsets" value="Herr-Von-Muellerhoff">Herr Von Muellerhoff</option>
                        <option class="Holtwood-One-SC" value="Holtwood-One-SC">Holtwood One SC</option>
                        <option class="Homemade-Apple" value="Homemade-Apple">Homemade Apple</option>
                        <option class="Homenaje has-subsets" value="Homenaje">Homenaje</option>
                        <option class="IM-Fell-DW-Pica has-variant" value="IM-Fell-DW-Pica">IM Fell DW Pica</option>
                        <option class="IM-Fell-DW-Pica-SC" value="IM-Fell-DW-Pica-SC">IM Fell DW Pica SC</option>
                        <option class="IM-Fell-Double-Pica has-variant" value="IM-Fell-Double-Pica">IM Fell Double Pica</option>
                        <option class="IM-Fell-Double-Pica-SC" value="IM-Fell-Double-Pica-SC">IM Fell Double Pica SC</option>
                        <option class="IM-Fell-English has-variant" value="IM-Fell-English">IM Fell English</option>
                        <option class="IM-Fell-English-SC" value="IM-Fell-English-SC">IM Fell English SC</option>
                        <option class="IM-Fell-French-Canon has-variant" value="IM-Fell-French-Canon">IM Fell French Canon</option>
                        <option class="IM-Fell-French-Canon-SC" value="IM-Fell-French-Canon-SC">IM Fell French Canon SC</option>
                        <option class="IM-Fell-Great-Primer has-variant" value="IM-Fell-Great-Primer">IM Fell Great Primer</option>
                        <option class="IM-Fell-Great-Primer-SC" value="IM-Fell-Great-Primer-SC">IM Fell Great Primer SC</option>
                        <option class="Iceberg" value="Iceberg">Iceberg</option>
                        <option class="Iceland" value="Iceland">Iceland</option>
                        <option class="Imprima has-subsets" value="Imprima">Imprima</option>
                        <option class="Inconsolata has-variant has-subsets" value="Inconsolata">Inconsolata</option>
                        <option class="Inder has-subsets" value="Inder">Inder</option>
                        <option class="Indie-Flower" value="Indie-Flower">Indie Flower</option>
                        <option class="Inika has-variant has-subsets" value="Inika">Inika</option>
                        <option class="Irish-Grover" value="Irish-Grover">Irish Grover</option>
                        <option class="Istok-Web has-variant has-subsets" value="Istok-Web">Istok Web</option>
                        <option class="Italiana" value="Italiana">Italiana</option>
                        <option class="Italianno has-subsets" value="Italianno">Italianno</option>
                        <option class="Jacques-Francois" value="Jacques-Francois">Jacques Francois</option>
                        <option class="Jacques-Francois-Shadow" value="Jacques-Francois-Shadow">Jacques Francois Shadow</option>
                        <option class="Jim-Nightshade has-subsets" value="Jim-Nightshade">Jim Nightshade</option>
                        <option class="Jockey-One has-subsets" value="Jockey-One">Jockey One</option>
                        <option class="Jolly-Lodger has-subsets" value="Jolly-Lodger">Jolly Lodger</option>
                        <option class="Josefin-Sans has-variant" value="Josefin-Sans">Josefin Sans</option>
                        <option class="Josefin-Slab has-variant" value="Josefin-Slab">Josefin Slab</option>
                        <option class="Joti-One has-subsets" value="Joti-One">Joti One</option>
                        <option class="Judson has-variant" value="Judson">Judson</option>
                        <option class="Julee" value="Julee">Julee</option>
                        <option class="Julius-Sans-One has-subsets" value="Julius-Sans-One">Julius Sans One</option>
                        <option class="Junge" value="Junge">Junge</option>
                        <option class="Jura has-variant has-subsets" value="Jura">Jura</option>
                        <option class="Just-Another-Hand" value="Just-Another-Hand">Just Another Hand</option>
                        <option class="Just-Me-Again-Down-Here" value="Just-Me-Again-Down-Here">Just Me Again Down Here</option>
                        <option class="Kameron has-variant" value="Kameron">Kameron</option>
                        <option class="Karla has-variant has-subsets" value="Karla">Karla</option>
                        <option class="Kaushan-Script has-subsets" value="Kaushan-Script">Kaushan Script</option>
                        <option class="Kavoon has-subsets" value="Kavoon">Kavoon</option>
                        <option class="Keania-One has-subsets" value="Keania-One">Keania One</option>
                        <option class="Kelly-Slab has-subsets" value="Kelly-Slab">Kelly Slab</option>
                        <option class="Kenia" value="Kenia">Kenia</option>
                        <option class="Khmer" value="Khmer">Khmer</option>
                        <option class="Kite-One" value="Kite-One">Kite One</option>
                        <option class="Knewave has-subsets" value="Knewave">Knewave</option>
                        <option class="Kotta-One has-subsets" value="Kotta-One">Kotta One</option>
                        <option class="Koulen" value="Koulen">Koulen</option>
                        <option class="Kranky" value="Kranky">Kranky</option>
                        <option class="Kreon has-variant" value="Kreon">Kreon</option>
                        <option class="Kristi" value="Kristi">Kristi</option>
                        <option class="Krona-One has-subsets" value="Krona-One">Krona One</option>
                        <option class="La-Belle-Aurore" value="La-Belle-Aurore">La Belle Aurore</option>
                        <option class="Lancelot" value="Lancelot">Lancelot</option>
                        <option class="Lato has-variant" value="Lato">Lato</option>
                        <option class="League-Script" value="League-Script">League Script</option>
                        <option class="Leckerli-One" value="Leckerli-One">Leckerli One</option>
                        <option class="Ledger has-subsets" value="Ledger">Ledger</option>
                        <option class="Lekton has-variant has-subsets" value="Lekton">Lekton</option>
                        <option class="Lemon" value="Lemon">Lemon</option>
                        <option class="Libre-Baskerville has-variant has-subsets" value="Libre-Baskerville">Libre Baskerville</option>
                        <option class="Life-Savers has-variant has-subsets" value="Life-Savers">Life Savers</option>
                        <option class="Lilita-One has-subsets" value="Lilita-One">Lilita One</option>
                        <option class="Limelight has-subsets" value="Limelight">Limelight</option>
                        <option class="Linden-Hill has-variant" value="Linden-Hill">Linden Hill</option>
                        <option class="Lobster has-subsets" value="Lobster">Lobster</option>
                        <option class="Lobster-Two has-variant" value="Lobster-Two">Lobster Two</option>
                        <option class="Londrina-Outline" value="Londrina-Outline">Londrina Outline</option>
                        <option class="Londrina-Shadow" value="Londrina-Shadow">Londrina Shadow</option>
                        <option class="Londrina-Sketch" value="Londrina-Sketch">Londrina Sketch</option>
                        <option class="Londrina-Solid" value="Londrina-Solid">Londrina Solid</option>
                        <option class="Lora has-variant" value="Lora">Lora</option>
                        <option class="Love-Ya-Like-A-Sister" value="Love-Ya-Like-A-Sister">Love Ya Like A Sister</option>
                        <option class="Loved-by-the-King" value="Loved-by-the-King">Loved by the King</option>
                        <option class="Lovers-Quarrel has-subsets" value="Lovers-Quarrel">Lovers Quarrel</option>
                        <option class="Luckiest-Guy" value="Luckiest-Guy">Luckiest Guy</option>
                        <option class="Lusitana has-variant" value="Lusitana">Lusitana</option>
                        <option class="Lustria" value="Lustria">Lustria</option>
                        <option class="Macondo" value="Macondo">Macondo</option>
                        <option class="Macondo-Swash-Caps" value="Macondo-Swash-Caps">Macondo Swash Caps</option>
                        <option class="Magra has-variant has-subsets" value="Magra">Magra</option>
                        <option class="Maiden-Orange" value="Maiden-Orange">Maiden Orange</option>
                        <option class="Mako" value="Mako">Mako</option>
                        <option class="Marcellus has-subsets" value="Marcellus">Marcellus</option>
                        <option class="Marcellus-SC has-subsets" value="Marcellus-SC">Marcellus SC</option>
                        <option class="Marck-Script has-subsets" value="Marck-Script">Marck Script</option>
                        <option class="Margarine has-subsets" value="Margarine">Margarine</option>
                        <option class="Marko-One" value="Marko-One">Marko One</option>
                        <option class="Marmelad has-subsets" value="Marmelad">Marmelad</option>
                        <option class="Marvel has-variant" value="Marvel">Marvel</option>
                        <option class="Mate has-variant" value="Mate">Mate</option>
                        <option class="Mate-SC" value="Mate-SC">Mate SC</option>
                        <option class="Maven-Pro has-variant" value="Maven-Pro">Maven Pro</option>
                        <option class="McLaren has-subsets" value="McLaren">McLaren</option>
                        <option class="Meddon" value="Meddon">Meddon</option>
                        <option class="MedievalSharp has-subsets" value="MedievalSharp">MedievalSharp</option>
                        <option class="Medula-One" value="Medula-One">Medula One</option>
                        <option class="Megrim" value="Megrim">Megrim</option>
                        <option class="Meie-Script has-subsets" value="Meie-Script">Meie Script</option>
                        <option class="Merienda has-variant has-subsets" value="Merienda">Merienda</option>
                        <option class="Merienda-One" value="Merienda-One">Merienda One</option>
                        <option class="Merriweather has-variant" value="Merriweather">Merriweather</option>
                        <option class="Merriweather-Sans has-variant has-subsets" value="Merriweather-Sans">Merriweather Sans</option>
                        <option class="Metal" value="Metal">Metal</option>
                        <option class="Metal-Mania has-subsets" value="Metal-Mania">Metal Mania</option>
                        <option class="Metamorphous has-subsets" value="Metamorphous">Metamorphous</option>
                        <option class="Metrophobic" value="Metrophobic">Metrophobic</option>
                        <option class="Michroma" value="Michroma">Michroma</option>
                        <option class="Milonga has-subsets" value="Milonga">Milonga</option>
                        <option class="Miltonian" value="Miltonian">Miltonian</option>
                        <option class="Miltonian-Tattoo" value="Miltonian-Tattoo">Miltonian Tattoo</option>
                        <option class="Miniver" value="Miniver">Miniver</option>
                        <option class="Miss-Fajardose has-subsets" value="Miss-Fajardose">Miss Fajardose</option>
                        <option class="Modern-Antiqua has-subsets" value="Modern-Antiqua">Modern Antiqua</option>
                        <option class="Molengo has-subsets" value="Molengo">Molengo</option>
                        <option class="Molle has-subsets" value="Molle">Molle</option>
                        <option class="Monda has-variant has-subsets" value="Monda">Monda</option>
                        <option class="Monofett" value="Monofett">Monofett</option>
                        <option class="Monoton" value="Monoton">Monoton</option>
                        <option class="Monsieur-La-Doulaise has-subsets" value="Monsieur-La-Doulaise">Monsieur La Doulaise</option>
                        <option class="Montaga" value="Montaga">Montaga</option>
                        <option class="Montez" value="Montez">Montez</option>
                        <option class="Montserrat has-variant" value="Montserrat">Montserrat</option>
                        <option class="Montserrat-Alternates has-variant" value="Montserrat-Alternates">Montserrat Alternates</option>
                        <option class="Montserrat-Subrayada has-variant" value="Montserrat-Subrayada">Montserrat Subrayada</option>
                        <option class="Moul" value="Moul">Moul</option>
                        <option class="Moulpali" value="Moulpali">Moulpali</option>
                        <option class="Mountains-of-Christmas has-variant" value="Mountains-of-Christmas">Mountains of Christmas</option>
                        <option class="Mouse-Memoirs has-subsets" value="Mouse-Memoirs">Mouse Memoirs</option>
                        <option class="Mr-Bedfort has-subsets" value="Mr-Bedfort">Mr Bedfort</option>
                        <option class="Mr-Dafoe has-subsets" value="Mr-Dafoe">Mr Dafoe</option>
                        <option class="Mr-De-Haviland has-subsets" value="Mr-De-Haviland">Mr De Haviland</option>
                        <option class="Mrs-Saint-Delafield has-subsets" value="Mrs-Saint-Delafield">Mrs Saint Delafield</option>
                        <option class="Mrs-Sheppards has-subsets" value="Mrs-Sheppards">Mrs Sheppards</option>
                        <option class="Muli has-variant" value="Muli">Muli</option>
                        <option class="Mystery-Quest has-subsets" value="Mystery-Quest">Mystery Quest</option>
                        <option class="Neucha has-subsets" value="Neucha">Neucha</option>
                        <option class="Neuton has-variant has-subsets" value="Neuton">Neuton</option>
                        <option class="New-Rocker has-subsets" value="New-Rocker">New Rocker</option>
                        <option class="News-Cycle has-variant has-subsets" value="News-Cycle">News Cycle</option>
                        <option class="Niconne has-subsets" value="Niconne">Niconne</option>
                        <option class="Nixie-One" value="Nixie-One">Nixie One</option>
                        <option class="Nobile has-variant" value="Nobile">Nobile</option>
                        <option class="Nokora has-variant" value="Nokora">Nokora</option>
                        <option class="Norican has-subsets" value="Norican">Norican</option>
                        <option class="Nosifer has-subsets" value="Nosifer">Nosifer</option>
                        <option class="Nothing-You-Could-Do" value="Nothing-You-Could-Do">Nothing You Could Do</option>
                        <option class="Noticia-Text has-variant has-subsets" value="Noticia-Text">Noticia Text</option>
                        <option class="Nova-Cut" value="Nova-Cut">Nova Cut</option>
                        <option class="Nova-Flat" value="Nova-Flat">Nova Flat</option>
                        <option class="Nova-Mono has-subsets" value="Nova-Mono">Nova Mono</option>
                        <option class="Nova-Oval" value="Nova-Oval">Nova Oval</option>
                        <option class="Nova-Round" value="Nova-Round">Nova Round</option>
                        <option class="Nova-Script" value="Nova-Script">Nova Script</option>
                        <option class="Nova-Slim" value="Nova-Slim">Nova Slim</option>
                        <option class="Nova-Square" value="Nova-Square">Nova Square</option>
                        <option class="Numans" value="Numans">Numans</option>
                        <option class="Nunito has-variant" value="Nunito">Nunito</option>
                        <option class="Odor-Mean-Chey" value="Odor-Mean-Chey">Odor Mean Chey</option>
                        <option class="Offside" value="Offside">Offside</option>
                        <option class="Old-Standard-TT has-variant" value="Old-Standard-TT">Old Standard TT</option>
                        <option class="Oldenburg has-subsets" value="Oldenburg">Oldenburg</option>
                        <option class="Oleo-Script has-variant has-subsets" value="Oleo-Script">Oleo Script</option>
                        <option class="Oleo-Script-Swash-Caps has-variant has-subsets" value="Oleo-Script-Swash-Caps">Oleo Script Swash Caps</option>
                        <option class="Open-Sans has-variant has-subsets" value="Open-Sans">Open Sans</option>
                        <option class="Open-Sans-Condensed has-variant has-subsets" value="Open-Sans-Condensed">Open Sans Condensed</option>
                        <option class="Oranienbaum has-subsets" value="Oranienbaum">Oranienbaum</option>
                        <option class="Orbitron has-variant" value="Orbitron">Orbitron</option>
                        <option class="Oregano has-variant has-subsets" value="Oregano">Oregano</option>
                        <option class="Orienta has-subsets" value="Orienta">Orienta</option>
                        <option class="Original-Surfer" value="Original-Surfer">Original Surfer</option>
                        <option class="Oswald has-variant has-subsets" value="Oswald">Oswald</option>
                        <option class="Over-the-Rainbow" value="Over-the-Rainbow">Over the Rainbow</option>
                        <option class="Overlock has-variant has-subsets" value="Overlock">Overlock</option>
                        <option class="Overlock-SC has-subsets" value="Overlock-SC">Overlock SC</option>
                        <option class="Ovo" value="Ovo">Ovo</option>
                        <option class="Oxygen has-variant has-subsets" value="Oxygen">Oxygen</option>
                        <option class="Oxygen-Mono has-subsets" value="Oxygen-Mono">Oxygen Mono</option>
                        <option class="PT-Mono has-subsets" value="PT-Mono">PT Mono</option>
                        <option class="PT-Sans has-variant has-subsets" value="PT-Sans">PT Sans</option>
                        <option class="PT-Sans-Caption has-variant has-subsets" value="PT-Sans-Caption">PT Sans Caption</option>
                        <option class="PT-Sans-Narrow has-variant has-subsets" value="PT-Sans-Narrow">PT Sans Narrow</option>
                        <option class="PT-Serif has-variant has-subsets" value="PT-Serif">PT Serif</option>
                        <option class="PT-Serif-Caption has-variant has-subsets" value="PT-Serif-Caption">PT Serif Caption</option>
                        <option class="Pacifico" value="Pacifico">Pacifico</option>
                        <option class="Paprika" value="Paprika">Paprika</option>
                        <option class="Parisienne has-subsets" value="Parisienne">Parisienne</option>
                        <option class="Passero-One has-subsets" value="Passero-One">Passero One</option>
                        <option class="Passion-One has-variant has-subsets" value="Passion-One">Passion One</option>
                        <option class="Patrick-Hand has-subsets" value="Patrick-Hand">Patrick Hand</option>
                        <option class="Patrick-Hand-SC has-subsets" value="Patrick-Hand-SC">Patrick Hand SC</option>
                        <option class="Patua-One" value="Patua-One">Patua One</option>
                        <option class="Paytone-One" value="Paytone-One">Paytone One</option>
                        <option class="Peralta has-subsets" value="Peralta">Peralta</option>
                        <option class="Permanent-Marker" value="Permanent-Marker">Permanent Marker</option>
                        <option class="Petit-Formal-Script has-subsets" value="Petit-Formal-Script">Petit Formal Script</option>
                        <option class="Petrona" value="Petrona">Petrona</option>
                        <option class="Philosopher has-variant has-subsets" value="Philosopher">Philosopher</option>
                        <option class="Piedra has-subsets" value="Piedra">Piedra</option>
                        <option class="Pinyon-Script" value="Pinyon-Script">Pinyon Script</option>
                        <option class="Pirata-One has-subsets" value="Pirata-One">Pirata One</option>
                        <option class="Plaster has-subsets" value="Plaster">Plaster</option>
                        <option class="Play has-variant has-subsets" value="Play">Play</option>
                        <option class="Playball has-subsets" value="Playball">Playball</option>
                        <option class="Playfair-Display has-variant has-subsets" value="Playfair-Display">Playfair Display</option>
                        <option class="Playfair-Display-SC has-variant has-subsets" value="Playfair-Display-SC">Playfair Display SC</option>
                        <option class="Podkova has-variant" value="Podkova">Podkova</option>
                        <option class="Poiret-One has-subsets" value="Poiret-One">Poiret One</option>
                        <option class="Poller-One" value="Poller-One">Poller One</option>
                        <option class="Poly has-variant" value="Poly">Poly</option>
                        <option class="Pompiere" value="Pompiere">Pompiere</option>
                        <option class="Pontano-Sans has-subsets" value="Pontano-Sans">Pontano Sans</option>
                        <option class="Port-Lligat-Sans" value="Port-Lligat-Sans">Port Lligat Sans</option>
                        <option class="Port-Lligat-Slab" value="Port-Lligat-Slab">Port Lligat Slab</option>
                        <option class="Prata" value="Prata">Prata</option>
                        <option class="Preahvihear" value="Preahvihear">Preahvihear</option>
                        <option class="Press-Start-2P has-subsets" value="Press-Start-2P">Press Start 2P</option>
                        <option class="Princess-Sofia has-subsets" value="Princess-Sofia">Princess Sofia</option>
                        <option class="Prociono" value="Prociono">Prociono</option>
                        <option class="Prosto-One has-subsets" value="Prosto-One">Prosto One</option>
                        <option class="Puritan has-variant" value="Puritan">Puritan</option>
                        <option class="Purple-Purse has-subsets" value="Purple-Purse">Purple Purse</option>
                        <option class="Quando has-subsets" value="Quando">Quando</option>
                        <option class="Quantico has-variant" value="Quantico">Quantico</option>
                        <option class="Quattrocento has-variant has-subsets" value="Quattrocento">Quattrocento</option>
                        <option class="Quattrocento-Sans has-variant has-subsets" value="Quattrocento-Sans">Quattrocento Sans</option>
                        <option class="Questrial" value="Questrial">Questrial</option>
                        <option class="Quicksand has-variant" value="Quicksand">Quicksand</option>
                        <option class="Quintessential has-subsets" value="Quintessential">Quintessential</option>
                        <option class="Qwigley has-subsets" value="Qwigley">Qwigley</option>
                        <option class="Racing-Sans-One has-subsets" value="Racing-Sans-One">Racing Sans One</option>
                        <option class="Radley has-variant has-subsets" value="Radley">Radley</option>
                        <option class="Raleway has-variant" value="Raleway">Raleway</option>
                        <option class="Raleway-Dots has-subsets" value="Raleway-Dots">Raleway Dots</option>
                        <option class="Rambla has-variant has-subsets" value="Rambla">Rambla</option>
                        <option class="Rammetto-One has-subsets" value="Rammetto-One">Rammetto One</option>
                        <option class="Ranchers has-subsets" value="Ranchers">Ranchers</option>
                        <option class="Rancho" value="Rancho">Rancho</option>
                        <option class="Rationale" value="Rationale">Rationale</option>
                        <option class="Redressed" value="Redressed">Redressed</option>
                        <option class="Reenie-Beanie" value="Reenie-Beanie">Reenie Beanie</option>
                        <option class="Revalia has-subsets" value="Revalia">Revalia</option>
                        <option class="Ribeye has-subsets" value="Ribeye">Ribeye</option>
                        <option class="Ribeye-Marrow has-subsets" value="Ribeye-Marrow">Ribeye Marrow</option>
                        <option class="Righteous has-subsets" value="Righteous">Righteous</option>
                        <option class="Risque has-subsets" value="Risque">Risque</option>
                        <option class="Roboto has-variant has-subsets" value="Roboto">Roboto</option>
                        <option class="Roboto-Condensed has-variant has-subsets" value="Roboto-Condensed">Roboto Condensed</option>
                        <option class="Rochester" value="Rochester">Rochester</option>
                        <option class="Rock-Salt" value="Rock-Salt">Rock Salt</option>
                        <option class="Rokkitt has-variant" value="Rokkitt">Rokkitt</option>
                        <option class="Romanesco has-subsets" value="Romanesco">Romanesco</option>
                        <option class="Ropa-Sans has-variant has-subsets" value="Ropa-Sans">Ropa Sans</option>
                        <option class="Rosario has-variant" value="Rosario">Rosario</option>
                        <option class="Rosarivo has-variant has-subsets" value="Rosarivo">Rosarivo</option>
                        <option class="Rouge-Script" value="Rouge-Script">Rouge Script</option>
                        <option class="Ruda has-variant has-subsets" value="Ruda">Ruda</option>
                        <option class="Rufina has-variant has-subsets" value="Rufina">Rufina</option>
                        <option class="Ruge-Boogie has-subsets" value="Ruge-Boogie">Ruge Boogie</option>
                        <option class="Ruluko has-subsets" value="Ruluko">Ruluko</option>
                        <option class="Rum-Raisin has-subsets" value="Rum-Raisin">Rum Raisin</option>
                        <option class="Ruslan-Display has-subsets" value="Ruslan-Display">Ruslan Display</option>
                        <option class="Russo-One has-subsets" value="Russo-One">Russo One</option>
                        <option class="Ruthie has-subsets" value="Ruthie">Ruthie</option>
                        <option class="Rye has-subsets" value="Rye">Rye</option>
                        <option class="Sacramento has-subsets" value="Sacramento">Sacramento</option>
                        <option class="Sail" value="Sail">Sail</option>
                        <option class="Salsa" value="Salsa">Salsa</option>
                        <option class="Sanchez has-variant has-subsets" value="Sanchez">Sanchez</option>
                        <option class="Sancreek has-subsets" value="Sancreek">Sancreek</option>
                        <option class="Sansita-One" value="Sansita-One">Sansita One</option>
                        <option class="Sarina has-subsets" value="Sarina">Sarina</option>
                        <option class="Satisfy" value="Satisfy">Satisfy</option>
                        <option class="Scada has-variant has-subsets" value="Scada">Scada</option>
                        <option class="Schoolbell" value="Schoolbell">Schoolbell</option>
                        <option class="Seaweed-Script has-subsets" value="Seaweed-Script">Seaweed Script</option>
                        <option class="Sevillana has-subsets" value="Sevillana">Sevillana</option>
                        <option class="Seymour-One has-subsets" value="Seymour-One">Seymour One</option>
                        <option class="Shadows-Into-Light" value="Shadows-Into-Light">Shadows Into Light</option>
                        <option class="Shadows-Into-Light-Two has-subsets" value="Shadows-Into-Light-Two">Shadows Into Light Two</option>
                        <option class="Shanti" value="Shanti">Shanti</option>
                        <option class="Share has-variant has-subsets" value="Share">Share</option>
                        <option class="Share-Tech" value="Share-Tech">Share Tech</option>
                        <option class="Share-Tech-Mono" value="Share-Tech-Mono">Share Tech Mono</option>
                        <option class="Shojumaru has-subsets" value="Shojumaru">Shojumaru</option>
                        <option class="Short-Stack" value="Short-Stack">Short Stack</option>
                        <option class="Siemreap" value="Siemreap">Siemreap</option>
                        <option class="Sigmar-One" value="Sigmar-One">Sigmar One</option>
                        <option class="Signika has-variant has-subsets" value="Signika">Signika</option>
                        <option class="Signika-Negative has-variant has-subsets" value="Signika-Negative">Signika Negative</option>
                        <option class="Simonetta has-variant has-subsets" value="Simonetta">Simonetta</option>
                        <option class="Sintony has-variant has-subsets" value="Sintony">Sintony</option>
                        <option class="Sirin-Stencil" value="Sirin-Stencil">Sirin Stencil</option>
                        <option class="Six-Caps" value="Six-Caps">Six Caps</option>
                        <option class="Skranji has-variant has-subsets" value="Skranji">Skranji</option>
                        <option class="Slackey" value="Slackey">Slackey</option>
                        <option class="Smokum" value="Smokum">Smokum</option>
                        <option class="Smythe" value="Smythe">Smythe</option>
                        <option class="Sniglet" value="Sniglet">Sniglet</option>
                        <option class="Snippet" value="Snippet">Snippet</option>
                        <option class="Snowburst-One has-subsets" value="Snowburst-One">Snowburst One</option>
                        <option class="Sofadi-One" value="Sofadi-One">Sofadi One</option>
                        <option class="Sofia" value="Sofia">Sofia</option>
                        <option class="Sonsie-One has-subsets" value="Sonsie-One">Sonsie One</option>
                        <option class="Sorts-Mill-Goudy has-variant has-subsets" value="Sorts-Mill-Goudy">Sorts Mill Goudy</option>
                        <option class="Source-Code-Pro has-variant has-subsets" value="Source-Code-Pro">Source Code Pro</option>
                        <option class="Source-Sans-Pro has-variant has-subsets" value="Source-Sans-Pro">Source Sans Pro</option>
                        <option class="Special-Elite" value="Special-Elite">Special Elite</option>
                        <option class="Spicy-Rice" value="Spicy-Rice">Spicy Rice</option>
                        <option class="Spinnaker has-subsets" value="Spinnaker">Spinnaker</option>
                        <option class="Spirax" value="Spirax">Spirax</option>
                        <option class="Squada-One" value="Squada-One">Squada One</option>
                        <option class="Stalemate has-subsets" value="Stalemate">Stalemate</option>
                        <option class="Stalinist-One has-subsets" value="Stalinist-One">Stalinist One</option>
                        <option class="Stardos-Stencil has-variant" value="Stardos-Stencil">Stardos Stencil</option>
                        <option class="Stint-Ultra-Condensed has-subsets" value="Stint-Ultra-Condensed">Stint Ultra Condensed</option>
                        <option class="Stint-Ultra-Expanded has-subsets" value="Stint-Ultra-Expanded">Stint Ultra Expanded</option>
                        <option class="Stoke has-variant has-subsets" value="Stoke">Stoke</option>
                        <option class="Strait" value="Strait">Strait</option>
                        <option class="Sue-Ellen-Francisco" value="Sue-Ellen-Francisco">Sue Ellen Francisco</option>
                        <option class="Sunshiney" value="Sunshiney">Sunshiney</option>
                        <option class="Supermercado-One" value="Supermercado-One">Supermercado One</option>
                        <option class="Suwannaphum" value="Suwannaphum">Suwannaphum</option>
                        <option class="Swanky-and-Moo-Moo" value="Swanky-and-Moo-Moo">Swanky and Moo Moo</option>
                        <option class="Syncopate has-variant" value="Syncopate">Syncopate</option>
                        <option class="Tangerine has-variant" value="Tangerine">Tangerine</option>
                        <option class="Taprom" value="Taprom">Taprom</option>
                        <option class="Tauri has-subsets" value="Tauri">Tauri</option>
                        <option class="Telex" value="Telex">Telex</option>
                        <option class="Tenor-Sans has-subsets" value="Tenor-Sans">Tenor Sans</option>
                        <option class="Text-Me-One has-subsets" value="Text-Me-One">Text Me One</option>
                        <option class="The-Girl-Next-Door" value="The-Girl-Next-Door">The Girl Next Door</option>
                        <option class="Tienne has-variant" value="Tienne">Tienne</option>
                        <option class="Tinos has-variant" value="Tinos">Tinos</option>
                        <option class="Titan-One has-subsets" value="Titan-One">Titan One</option>
                        <option class="Titillium-Web has-variant has-subsets" value="Titillium-Web">Titillium Web</option>
                        <option class="Trade-Winds" value="Trade-Winds">Trade Winds</option>
                        <option class="Trocchi has-subsets" value="Trocchi">Trocchi</option>
                        <option class="Trochut has-variant" value="Trochut">Trochut</option>
                        <option class="Trykker has-subsets" value="Trykker">Trykker</option>
                        <option class="Tulpen-One" value="Tulpen-One">Tulpen One</option>
                        <option class="Ubuntu has-variant has-subsets" value="Ubuntu">Ubuntu</option>
                        <option class="Ubuntu-Condensed has-subsets" value="Ubuntu-Condensed">Ubuntu Condensed</option>
                        <option class="Ubuntu-Mono has-variant has-subsets" value="Ubuntu-Mono">Ubuntu Mono</option>
                        <option class="Ultra" value="Ultra">Ultra</option>
                        <option class="Uncial-Antiqua" value="Uncial-Antiqua">Uncial Antiqua</option>
                        <option class="Underdog has-subsets" value="Underdog">Underdog</option>
                        <option class="Unica-One has-subsets" value="Unica-One">Unica One</option>
                        <option class="UnifrakturCook" value="UnifrakturCook">UnifrakturCook</option>
                        <option class="UnifrakturMaguntia" value="UnifrakturMaguntia">UnifrakturMaguntia</option>
                        <option class="Unkempt has-variant" value="Unkempt">Unkempt</option>
                        <option class="Unlock" value="Unlock">Unlock</option>
                        <option class="Unna" value="Unna">Unna</option>
                        <option class="VT323" value="VT323">VT323</option>
                        <option class="Vampiro-One has-subsets" value="Vampiro-One">Vampiro One</option>
                        <option class="Varela has-subsets" value="Varela">Varela</option>
                        <option class="Varela-Round" value="Varela-Round">Varela Round</option>
                        <option class="Vast-Shadow" value="Vast-Shadow">Vast Shadow</option>
                        <option class="Vibur" value="Vibur">Vibur</option>
                        <option class="Vidaloka" value="Vidaloka">Vidaloka</option>
                        <option class="Viga has-subsets" value="Viga">Viga</option>
                        <option class="Voces has-subsets" value="Voces">Voces</option>
                        <option class="Volkhov has-variant" value="Volkhov">Volkhov</option>
                        <option class="Vollkorn has-variant" value="Vollkorn">Vollkorn</option>
                        <option class="Voltaire" value="Voltaire">Voltaire</option>
                        <option class="Waiting-for-the-Sunrise" value="Waiting-for-the-Sunrise">Waiting for the Sunrise</option>
                        <option class="Wallpoet" value="Wallpoet">Wallpoet</option>
                        <option class="Walter-Turncoat" value="Walter-Turncoat">Walter Turncoat</option>
                        <option class="Warnes has-subsets" value="Warnes">Warnes</option>
                        <option class="Wellfleet has-subsets" value="Wellfleet">Wellfleet</option>
                        <option class="Wendy-One has-subsets" value="Wendy-One">Wendy One</option>
                        <option class="Wire-One" value="Wire-One">Wire One</option>
                        <option class="Yanone-Kaffeesatz has-variant has-subsets" value="Yanone-Kaffeesatz">Yanone Kaffeesatz</option>
                        <option class="Yellowtail" value="Yellowtail">Yellowtail</option>
                        <option class="Yeseva-One has-subsets" value="Yeseva-One">Yeseva One</option>
                        <option class="Yesteryear" value="Yesteryear">Yesteryear</option>
                        <option class="Zeyada" value="Zeyada">Zeyada</option>
                    </select>
                    <div class="resultado-fonte" id="resultado2" style="font-size: 30px;">A subheadline ficará com esta fonte...</div>
                </div>
            </div>

            <div class="form-group font-grupo">
                <label for="fonte_texto" class="col-sm-2 control-label">Fonte para Texto</label>
                <div class="col-sm-10">
                    <select name="fonte_texto" id="fonte_texto">
                        <option value=""></option>
                        <option class="ABeeZee has-variant" value="off">None (Turn off this font)</option>
                        <option class="ABeeZee has-variant" value="ABeeZee">ABeeZee</option>
                        <option class="Abel" value="Abel">Abel</option>
                        <option class="Abril-Fatface has-subsets" value="Abril-Fatface">Abril Fatface</option>
                        <option class="Aclonica" value="Aclonica">Aclonica</option>
                        <option class="Acme" value="Acme">Acme</option>
                        <option class="Actor" value="Actor">Actor</option>
                        <option class="Adamina" value="Adamina">Adamina</option>
                        <option class="Advent-Pro has-variant has-subsets" value="Advent-Pro">Advent Pro</option>
                        <option class="Aguafina-Script has-subsets" value="Aguafina-Script">Aguafina Script</option>
                        <option class="Akronim has-subsets" value="Akronim">Akronim</option>
                        <option class="Aladin has-subsets" value="Aladin">Aladin</option>
                        <option class="Aldrich" value="Aldrich">Aldrich</option>
                        <option class="Alegreya has-variant has-subsets" value="Alegreya">Alegreya</option>
                        <option class="Alegreya-SC has-variant has-subsets" value="Alegreya-SC">Alegreya SC</option>
                        <option class="Alex-Brush has-subsets" value="Alex-Brush">Alex Brush</option>
                        <option class="Alfa-Slab-One" value="Alfa-Slab-One">Alfa Slab One</option>
                        <option class="Alice" value="Alice">Alice</option>
                        <option class="Alike" value="Alike">Alike</option>
                        <option class="Alike-Angular" value="Alike-Angular">Alike Angular</option>
                        <option class="Allan has-variant has-subsets" value="Allan">Allan</option>
                        <option class="Allerta" value="Allerta">Allerta</option>
                        <option class="Allerta-Stencil" value="Allerta-Stencil">Allerta Stencil</option>
                        <option class="Allura has-subsets" value="Allura">Allura</option>
                        <option class="Almendra has-variant has-subsets" value="Almendra">Almendra</option>
                        <option class="Almendra-Display has-subsets" value="Almendra-Display">Almendra Display</option>
                        <option class="Almendra-SC" value="Almendra-SC">Almendra SC</option>
                        <option class="Amarante has-subsets" value="Amarante">Amarante</option>
                        <option class="Amaranth has-variant" value="Amaranth">Amaranth</option>
                        <option class="Amatic-SC has-variant" value="Amatic-SC">Amatic SC</option>
                        <option class="Amethysta" value="Amethysta">Amethysta</option>
                        <option class="Anaheim has-subsets" value="Anaheim">Anaheim</option>
                        <option class="Andada has-subsets" value="Andada">Andada</option>
                        <option class="Andika has-subsets" value="Andika">Andika</option>
                        <option class="Angkor" value="Angkor">Angkor</option>
                        <option class="Annie-Use-Your-Telescope" value="Annie-Use-Your-Telescope">Annie Use Your Telescope</option>
                        <option class="Anonymous-Pro has-variant has-subsets" value="Anonymous-Pro">Anonymous Pro</option>
                        <option class="Antic" value="Antic">Antic</option>
                        <option class="Antic-Didone" value="Antic-Didone">Antic Didone</option>
                        <option class="Antic-Slab" value="Antic-Slab">Antic Slab</option>
                        <option class="Anton has-subsets" value="Anton">Anton</option>
                        <option class="Arapey has-variant" value="Arapey">Arapey</option>
                        <option class="Arbutus has-subsets" value="Arbutus">Arbutus</option>
                        <option class="Arbutus-Slab has-subsets" value="Arbutus-Slab">Arbutus Slab</option>
                        <option class="Architects-Daughter" value="Architects-Daughter">Architects Daughter</option>
                        <option class="Archivo-Black has-subsets" value="Archivo-Black">Archivo Black</option>
                        <option class="Archivo-Narrow has-variant has-subsets" value="Archivo-Narrow">Archivo Narrow</option>
                        <option class="Arimo has-variant has-subsets" value="Arimo">Arimo</option>
                        <option class="Arizonia has-subsets" value="Arizonia">Arizonia</option>
                        <option class="Armata has-subsets" value="Armata">Armata</option>
                        <option class="Artifika" value="Artifika">Artifika</option>
                        <option class="Arvo has-variant" value="Arvo">Arvo</option>
                        <option class="Asap has-variant has-subsets" value="Asap">Asap</option>
                        <option class="Asset" value="Asset">Asset</option>
                        <option class="Astloch has-variant" value="Astloch">Astloch</option>
                        <option class="Asul has-variant" value="Asul">Asul</option>
                        <option class="Atomic-Age" value="Atomic-Age">Atomic Age</option>
                        <option class="Aubrey" value="Aubrey">Aubrey</option>
                        <option class="Audiowide has-subsets" value="Audiowide">Audiowide</option>
                        <option class="Autour-One has-subsets" value="Autour-One">Autour One</option>
                        <option class="Average has-subsets" value="Average">Average</option>
                        <option class="Average-Sans has-subsets" value="Average-Sans">Average Sans</option>
                        <option class="Averia-Gruesa-Libre has-subsets" value="Averia-Gruesa-Libre">Averia Gruesa Libre</option>
                        <option class="Averia-Libre has-variant" value="Averia-Libre">Averia Libre</option>
                        <option class="Averia-Sans-Libre has-variant" value="Averia-Sans-Libre">Averia Sans Libre</option>
                        <option class="Averia-Serif-Libre has-variant" value="Averia-Serif-Libre">Averia Serif Libre</option>
                        <option class="Bad-Script has-subsets" value="Bad-Script">Bad Script</option>
                        <option class="Balthazar" value="Balthazar">Balthazar</option>
                        <option class="Bangers" value="Bangers">Bangers</option>
                        <option class="Basic has-subsets" value="Basic">Basic</option>
                        <option class="Battambang has-variant" value="Battambang">Battambang</option>
                        <option class="Baumans" value="Baumans">Baumans</option>
                        <option class="Bayon" value="Bayon">Bayon</option>
                        <option class="Belgrano" value="Belgrano">Belgrano</option>
                        <option class="Belleza has-subsets" value="Belleza">Belleza</option>
                        <option class="BenchNine has-variant has-subsets" value="BenchNine">BenchNine</option>
                        <option class="Bentham" value="Bentham">Bentham</option>
                        <option class="Berkshire-Swash has-subsets" value="Berkshire-Swash">Berkshire Swash</option>
                        <option class="Bevan" value="Bevan">Bevan</option>
                        <option class="Bigelow-Rules has-subsets" value="Bigelow-Rules">Bigelow Rules</option>
                        <option class="Bigshot-One" value="Bigshot-One">Bigshot One</option>
                        <option class="Bilbo has-subsets" value="Bilbo">Bilbo</option>
                        <option class="Bilbo-Swash-Caps has-subsets" value="Bilbo-Swash-Caps">Bilbo Swash Caps</option>
                        <option class="Bitter has-variant has-subsets" value="Bitter">Bitter</option>
                        <option class="Black-Ops-One has-subsets" value="Black-Ops-One">Black Ops One</option>
                        <option class="Bokor" value="Bokor">Bokor</option>
                        <option class="Bonbon" value="Bonbon">Bonbon</option>
                        <option class="Boogaloo" value="Boogaloo">Boogaloo</option>
                        <option class="Bowlby-One" value="Bowlby-One">Bowlby One</option>
                        <option class="Bowlby-One-SC has-subsets" value="Bowlby-One-SC">Bowlby One SC</option>
                        <option class="Brawler" value="Brawler">Brawler</option>
                        <option class="Bree-Serif has-subsets" value="Bree-Serif">Bree Serif</option>
                        <option class="Bubblegum-Sans has-subsets" value="Bubblegum-Sans">Bubblegum Sans</option>
                        <option class="Bubbler-One has-subsets" value="Bubbler-One">Bubbler One</option>
                        <option class="Buda" value="Buda">Buda</option>
                        <option class="Buenard has-variant has-subsets" value="Buenard">Buenard</option>
                        <option class="Butcherman has-subsets" value="Butcherman">Butcherman</option>
                        <option class="Butterfly-Kids has-subsets" value="Butterfly-Kids">Butterfly Kids</option>
                        <option class="Cabin has-variant" value="Cabin">Cabin</option>
                        <option class="Cabin-Condensed has-variant" value="Cabin-Condensed">Cabin Condensed</option>
                        <option class="Cabin-Sketch has-variant" value="Cabin-Sketch">Cabin Sketch</option>
                        <option class="Caesar-Dressing" value="Caesar-Dressing">Caesar Dressing</option>
                        <option class="Cagliostro" value="Cagliostro">Cagliostro</option>
                        <option class="Calligraffitti" value="Calligraffitti">Calligraffitti</option>
                        <option class="Cambo" value="Cambo">Cambo</option>
                        <option class="Candal" value="Candal">Candal</option>
                        <option class="Cantarell has-variant" value="Cantarell">Cantarell</option>
                        <option class="Cantata-One has-subsets" value="Cantata-One">Cantata One</option>
                        <option class="Cantora-One has-subsets" value="Cantora-One">Cantora One</option>
                        <option class="Capriola has-subsets" value="Capriola">Capriola</option>
                        <option class="Cardo has-variant has-subsets" value="Cardo">Cardo</option>
                        <option class="Carme" value="Carme">Carme</option>
                        <option class="Carrois-Gothic" value="Carrois-Gothic">Carrois Gothic</option>
                        <option class="Carrois-Gothic-SC" value="Carrois-Gothic-SC">Carrois Gothic SC</option>
                        <option class="Carter-One" value="Carter-One">Carter One</option>
                        <option class="Caudex has-variant has-subsets" value="Caudex">Caudex</option>
                        <option class="Cedarville-Cursive" value="Cedarville-Cursive">Cedarville Cursive</option>
                        <option class="Ceviche-One" value="Ceviche-One">Ceviche One</option>
                        <option class="Changa-One has-variant" value="Changa-One">Changa One</option>
                        <option class="Chango has-subsets" value="Chango">Chango</option>
                        <option class="Chau-Philomene-One has-variant has-subsets" value="Chau-Philomene-One">Chau Philomene One</option>
                        <option class="Chela-One has-subsets" value="Chela-One">Chela One</option>
                        <option class="Chelsea-Market has-subsets" value="Chelsea-Market">Chelsea Market</option>
                        <option class="Chenla" value="Chenla">Chenla</option>
                        <option class="Cherry-Cream-Soda" value="Cherry-Cream-Soda">Cherry Cream Soda</option>
                        <option class="Cherry-Swash has-variant has-subsets" value="Cherry-Swash">Cherry Swash</option>
                        <option class="Chewy" value="Chewy">Chewy</option>
                        <option class="Chicle has-subsets" value="Chicle">Chicle</option>
                        <option class="Chivo has-variant" value="Chivo">Chivo</option>
                        <option class="Cinzel has-variant" value="Cinzel">Cinzel</option>
                        <option class="Cinzel-Decorative has-variant" value="Cinzel-Decorative">Cinzel Decorative</option>
                        <option class="Clicker-Script has-subsets" value="Clicker-Script">Clicker Script</option>
                        <option class="Coda has-variant" value="Coda">Coda</option>
                        <option class="Coda-Caption" value="Coda-Caption">Coda Caption</option>
                        <option class="Codystar has-variant has-subsets" value="Codystar">Codystar</option>
                        <option class="Combo has-subsets" value="Combo">Combo</option>
                        <option class="Comfortaa has-variant has-subsets" value="Comfortaa">Comfortaa</option>
                        <option class="Coming-Soon" value="Coming-Soon">Coming Soon</option>
                        <option class="Concert-One has-subsets" value="Concert-One">Concert One</option>
                        <option class="Condiment has-subsets" value="Condiment">Condiment</option>
                        <option class="Content has-variant" value="Content">Content</option>
                        <option class="Contrail-One" value="Contrail-One">Contrail One</option>
                        <option class="Convergence" value="Convergence">Convergence</option>
                        <option class="Cookie" value="Cookie">Cookie</option>
                        <option class="Copse" value="Copse">Copse</option>
                        <option class="Corben has-variant" value="Corben">Corben</option>
                        <option class="Courgette has-subsets" value="Courgette">Courgette</option>
                        <option class="Cousine has-variant" value="Cousine">Cousine</option>
                        <option class="Coustard has-variant" value="Coustard">Coustard</option>
                        <option class="Covered-By-Your-Grace" value="Covered-By-Your-Grace">Covered By Your Grace</option>
                        <option class="Crafty-Girls" value="Crafty-Girls">Crafty Girls</option>
                        <option class="Creepster" value="Creepster">Creepster</option>
                        <option class="Crete-Round has-variant has-subsets" value="Crete-Round">Crete Round</option>
                        <option class="Crimson-Text has-variant" value="Crimson-Text">Crimson Text</option>
                        <option class="Croissant-One has-subsets" value="Croissant-One">Croissant One</option>
                        <option class="Crushed" value="Crushed">Crushed</option>
                        <option class="Cuprum has-variant has-subsets" value="Cuprum">Cuprum</option>
                        <option class="Cutive has-subsets" value="Cutive">Cutive</option>
                        <option class="Cutive-Mono has-subsets" value="Cutive-Mono">Cutive Mono</option>
                        <option class="Damion" value="Damion">Damion</option>
                        <option class="Dancing-Script has-variant" value="Dancing-Script">Dancing Script</option>
                        <option class="Dangrek" value="Dangrek">Dangrek</option>
                        <option class="Dawning-of-a-New-Day" value="Dawning-of-a-New-Day">Dawning of a New Day</option>
                        <option class="Days-One" value="Days-One">Days One</option>
                        <option class="Delius" value="Delius">Delius</option>
                        <option class="Delius-Swash-Caps" value="Delius-Swash-Caps">Delius Swash Caps</option>
                        <option class="Delius-Unicase has-variant" value="Delius-Unicase">Delius Unicase</option>
                        <option class="Della-Respira" value="Della-Respira">Della Respira</option>
                        <option class="Denk-One has-subsets" value="Denk-One">Denk One</option>
                        <option class="Devonshire has-subsets" value="Devonshire">Devonshire</option>
                        <option class="Didact-Gothic has-subsets" value="Didact-Gothic">Didact Gothic</option>
                        <option class="Diplomata has-subsets" value="Diplomata">Diplomata</option>
                        <option class="Diplomata-SC has-subsets" value="Diplomata-SC">Diplomata SC</option>
                        <option class="Domine has-variant has-subsets" value="Domine">Domine</option>
                        <option class="Donegal-One has-subsets" value="Donegal-One">Donegal One</option>
                        <option class="Doppio-One has-subsets" value="Doppio-One">Doppio One</option>
                        <option class="Dorsa" value="Dorsa">Dorsa</option>
                        <option class="Dosis has-variant has-subsets" value="Dosis">Dosis</option>
                        <option class="Dr-Sugiyama has-subsets" value="Dr-Sugiyama">Dr Sugiyama</option>
                        <option class="Droid-Sans has-variant" value="Droid-Sans">Droid Sans</option>
                        <option class="Droid-Sans-Mono" value="Droid-Sans-Mono">Droid Sans Mono</option>
                        <option class="Droid-Serif has-variant" value="Droid-Serif">Droid Serif</option>
                        <option class="Duru-Sans has-subsets" value="Duru-Sans">Duru Sans</option>
                        <option class="Dynalight has-subsets" value="Dynalight">Dynalight</option>
                        <option class="EB-Garamond has-subsets" value="EB-Garamond">EB Garamond</option>
                        <option class="Eagle-Lake has-subsets" value="Eagle-Lake">Eagle Lake</option>
                        <option class="Eater has-subsets" value="Eater">Eater</option>
                        <option class="Economica has-variant has-subsets" value="Economica">Economica</option>
                        <option class="Electrolize" value="Electrolize">Electrolize</option>
                        <option class="Elsie has-variant has-subsets" value="Elsie">Elsie</option>
                        <option class="Elsie-Swash-Caps has-variant has-subsets" value="Elsie-Swash-Caps">Elsie Swash Caps</option>
                        <option class="Emblema-One has-subsets" value="Emblema-One">Emblema One</option>
                        <option class="Emilys-Candy has-subsets" value="Emilys-Candy">Emilys Candy</option>
                        <option class="Engagement" value="Engagement">Engagement</option>
                        <option class="Englebert has-subsets" value="Englebert">Englebert</option>
                        <option class="Enriqueta has-variant has-subsets" value="Enriqueta">Enriqueta</option>
                        <option class="Erica-One" value="Erica-One">Erica One</option>
                        <option class="Esteban has-subsets" value="Esteban">Esteban</option>
                        <option class="Euphoria-Script has-subsets" value="Euphoria-Script">Euphoria Script</option>
                        <option class="Ewert has-subsets" value="Ewert">Ewert</option>
                        <option class="Exo has-variant has-subsets" value="Exo">Exo</option>
                        <option class="Expletus-Sans has-variant" value="Expletus-Sans">Expletus Sans</option>
                        <option class="Fanwood-Text has-variant" value="Fanwood-Text">Fanwood Text</option>
                        <option class="Fascinate" value="Fascinate">Fascinate</option>
                        <option class="Fascinate-Inline" value="Fascinate-Inline">Fascinate Inline</option>
                        <option class="Faster-One" value="Faster-One">Faster One</option>
                        <option class="Fasthand" value="Fasthand">Fasthand</option>
                        <option class="Federant" value="Federant">Federant</option>
                        <option class="Federo" value="Federo">Federo</option>
                        <option class="Felipa has-subsets" value="Felipa">Felipa</option>
                        <option class="Fenix has-subsets" value="Fenix">Fenix</option>
                        <option class="Finger-Paint" value="Finger-Paint">Finger Paint</option>
                        <option class="Fjalla-One has-subsets" value="Fjalla-One">Fjalla One</option>
                        <option class="Fjord-One" value="Fjord-One">Fjord One</option>
                        <option class="Flamenco has-variant" value="Flamenco">Flamenco</option>
                        <option class="Flavors" value="Flavors">Flavors</option>
                        <option class="Fondamento has-variant has-subsets" value="Fondamento">Fondamento</option>
                        <option class="Fontdiner-Swanky" value="Fontdiner-Swanky">Fontdiner Swanky</option>
                        <option class="Forum has-subsets" value="Forum">Forum</option>
                        <option class="Francois-One has-subsets" value="Francois-One">Francois One</option>
                        <option class="Freckle-Face has-subsets" value="Freckle-Face">Freckle Face</option>
                        <option class="Fredericka-the-Great" value="Fredericka-the-Great">Fredericka the Great</option>
                        <option class="Fredoka-One" value="Fredoka-One">Fredoka One</option>
                        <option class="Freehand" value="Freehand">Freehand</option>
                        <option class="Fresca has-subsets" value="Fresca">Fresca</option>
                        <option class="Frijole" value="Frijole">Frijole</option>
                        <option class="Fruktur has-subsets" value="Fruktur">Fruktur</option>
                        <option class="Fugaz-One" value="Fugaz-One">Fugaz One</option>
                        <option class="GFS-Didot" value="GFS-Didot">GFS Didot</option>
                        <option class="GFS-Neohellenic has-variant" value="GFS-Neohellenic">GFS Neohellenic</option>
                        <option class="Gabriela has-subsets" value="Gabriela">Gabriela</option>
                        <option class="Gafata has-subsets" value="Gafata">Gafata</option>
                        <option class="Galdeano" value="Galdeano">Galdeano</option>
                        <option class="Galindo has-subsets" value="Galindo">Galindo</option>
                        <option class="Gentium-Basic has-variant has-subsets" value="Gentium-Basic">Gentium Basic</option>
                        <option class="Gentium-Book-Basic has-variant has-subsets" value="Gentium-Book-Basic">Gentium Book Basic</option>
                        <option class="Geo has-variant" value="Geo">Geo</option>
                        <option class="Geostar" value="Geostar">Geostar</option>
                        <option class="Geostar-Fill" value="Geostar-Fill">Geostar Fill</option>
                        <option class="Germania-One" value="Germania-One">Germania One</option>
                        <option class="Gilda-Display has-subsets" value="Gilda-Display">Gilda Display</option>
                        <option class="Give-You-Glory" value="Give-You-Glory">Give You Glory</option>
                        <option class="Glass-Antiqua has-subsets" value="Glass-Antiqua">Glass Antiqua</option>
                        <option class="Glegoo has-subsets" value="Glegoo">Glegoo</option>
                        <option class="Gloria-Hallelujah" value="Gloria-Hallelujah">Gloria Hallelujah</option>
                        <option class="Goblin-One" value="Goblin-One">Goblin One</option>
                        <option class="Gochi-Hand" value="Gochi-Hand">Gochi Hand</option>
                        <option class="Gorditas has-variant" value="Gorditas">Gorditas</option>
                        <option class="Goudy-Bookletter-1911" value="Goudy-Bookletter-1911">Goudy Bookletter 1911</option>
                        <option class="Graduate" value="Graduate">Graduate</option>
                        <option class="Grand-Hotel has-subsets" value="Grand-Hotel">Grand Hotel</option>
                        <option class="Gravitas-One" value="Gravitas-One">Gravitas One</option>
                        <option class="Great-Vibes has-subsets" value="Great-Vibes">Great Vibes</option>
                        <option class="Griffy has-subsets" value="Griffy">Griffy</option>
                        <option class="Gruppo has-subsets" value="Gruppo">Gruppo</option>
                        <option class="Gudea has-variant has-subsets" value="Gudea">Gudea</option>
                        <option class="Habibi has-subsets" value="Habibi">Habibi</option>
                        <option class="Hammersmith-One has-subsets" value="Hammersmith-One">Hammersmith One</option>
                        <option class="Hanalei has-subsets" value="Hanalei">Hanalei</option>
                        <option class="Hanalei-Fill has-subsets" value="Hanalei-Fill">Hanalei Fill</option>
                        <option class="Handlee" value="Handlee">Handlee</option>
                        <option class="Hanuman has-variant" value="Hanuman">Hanuman</option>
                        <option class="Happy-Monkey has-subsets" value="Happy-Monkey">Happy Monkey</option>
                        <option class="Headland-One has-subsets" value="Headland-One">Headland One</option>
                        <option class="Henny-Penny" value="Henny-Penny">Henny Penny</option>
                        <option class="Herr-Von-Muellerhoff has-subsets" value="Herr-Von-Muellerhoff">Herr Von Muellerhoff</option>
                        <option class="Holtwood-One-SC" value="Holtwood-One-SC">Holtwood One SC</option>
                        <option class="Homemade-Apple" value="Homemade-Apple">Homemade Apple</option>
                        <option class="Homenaje has-subsets" value="Homenaje">Homenaje</option>
                        <option class="IM-Fell-DW-Pica has-variant" value="IM-Fell-DW-Pica">IM Fell DW Pica</option>
                        <option class="IM-Fell-DW-Pica-SC" value="IM-Fell-DW-Pica-SC">IM Fell DW Pica SC</option>
                        <option class="IM-Fell-Double-Pica has-variant" value="IM-Fell-Double-Pica">IM Fell Double Pica</option>
                        <option class="IM-Fell-Double-Pica-SC" value="IM-Fell-Double-Pica-SC">IM Fell Double Pica SC</option>
                        <option class="IM-Fell-English has-variant" value="IM-Fell-English">IM Fell English</option>
                        <option class="IM-Fell-English-SC" value="IM-Fell-English-SC">IM Fell English SC</option>
                        <option class="IM-Fell-French-Canon has-variant" value="IM-Fell-French-Canon">IM Fell French Canon</option>
                        <option class="IM-Fell-French-Canon-SC" value="IM-Fell-French-Canon-SC">IM Fell French Canon SC</option>
                        <option class="IM-Fell-Great-Primer has-variant" value="IM-Fell-Great-Primer">IM Fell Great Primer</option>
                        <option class="IM-Fell-Great-Primer-SC" value="IM-Fell-Great-Primer-SC">IM Fell Great Primer SC</option>
                        <option class="Iceberg" value="Iceberg">Iceberg</option>
                        <option class="Iceland" value="Iceland">Iceland</option>
                        <option class="Imprima has-subsets" value="Imprima">Imprima</option>
                        <option class="Inconsolata has-variant has-subsets" value="Inconsolata">Inconsolata</option>
                        <option class="Inder has-subsets" value="Inder">Inder</option>
                        <option class="Indie-Flower" value="Indie-Flower">Indie Flower</option>
                        <option class="Inika has-variant has-subsets" value="Inika">Inika</option>
                        <option class="Irish-Grover" value="Irish-Grover">Irish Grover</option>
                        <option class="Istok-Web has-variant has-subsets" value="Istok-Web">Istok Web</option>
                        <option class="Italiana" value="Italiana">Italiana</option>
                        <option class="Italianno has-subsets" value="Italianno">Italianno</option>
                        <option class="Jacques-Francois" value="Jacques-Francois">Jacques Francois</option>
                        <option class="Jacques-Francois-Shadow" value="Jacques-Francois-Shadow">Jacques Francois Shadow</option>
                        <option class="Jim-Nightshade has-subsets" value="Jim-Nightshade">Jim Nightshade</option>
                        <option class="Jockey-One has-subsets" value="Jockey-One">Jockey One</option>
                        <option class="Jolly-Lodger has-subsets" value="Jolly-Lodger">Jolly Lodger</option>
                        <option class="Josefin-Sans has-variant" value="Josefin-Sans">Josefin Sans</option>
                        <option class="Josefin-Slab has-variant" value="Josefin-Slab">Josefin Slab</option>
                        <option class="Joti-One has-subsets" value="Joti-One">Joti One</option>
                        <option class="Judson has-variant" value="Judson">Judson</option>
                        <option class="Julee" value="Julee">Julee</option>
                        <option class="Julius-Sans-One has-subsets" value="Julius-Sans-One">Julius Sans One</option>
                        <option class="Junge" value="Junge">Junge</option>
                        <option class="Jura has-variant has-subsets" value="Jura">Jura</option>
                        <option class="Just-Another-Hand" value="Just-Another-Hand">Just Another Hand</option>
                        <option class="Just-Me-Again-Down-Here" value="Just-Me-Again-Down-Here">Just Me Again Down Here</option>
                        <option class="Kameron has-variant" value="Kameron">Kameron</option>
                        <option class="Karla has-variant has-subsets" value="Karla">Karla</option>
                        <option class="Kaushan-Script has-subsets" value="Kaushan-Script">Kaushan Script</option>
                        <option class="Kavoon has-subsets" value="Kavoon">Kavoon</option>
                        <option class="Keania-One has-subsets" value="Keania-One">Keania One</option>
                        <option class="Kelly-Slab has-subsets" value="Kelly-Slab">Kelly Slab</option>
                        <option class="Kenia" value="Kenia">Kenia</option>
                        <option class="Khmer" value="Khmer">Khmer</option>
                        <option class="Kite-One" value="Kite-One">Kite One</option>
                        <option class="Knewave has-subsets" value="Knewave">Knewave</option>
                        <option class="Kotta-One has-subsets" value="Kotta-One">Kotta One</option>
                        <option class="Koulen" value="Koulen">Koulen</option>
                        <option class="Kranky" value="Kranky">Kranky</option>
                        <option class="Kreon has-variant" value="Kreon">Kreon</option>
                        <option class="Kristi" value="Kristi">Kristi</option>
                        <option class="Krona-One has-subsets" value="Krona-One">Krona One</option>
                        <option class="La-Belle-Aurore" value="La-Belle-Aurore">La Belle Aurore</option>
                        <option class="Lancelot" value="Lancelot">Lancelot</option>
                        <option class="Lato has-variant" value="Lato">Lato</option>
                        <option class="League-Script" value="League-Script">League Script</option>
                        <option class="Leckerli-One" value="Leckerli-One">Leckerli One</option>
                        <option class="Ledger has-subsets" value="Ledger">Ledger</option>
                        <option class="Lekton has-variant has-subsets" value="Lekton">Lekton</option>
                        <option class="Lemon" value="Lemon">Lemon</option>
                        <option class="Libre-Baskerville has-variant has-subsets" value="Libre-Baskerville">Libre Baskerville</option>
                        <option class="Life-Savers has-variant has-subsets" value="Life-Savers">Life Savers</option>
                        <option class="Lilita-One has-subsets" value="Lilita-One">Lilita One</option>
                        <option class="Limelight has-subsets" value="Limelight">Limelight</option>
                        <option class="Linden-Hill has-variant" value="Linden-Hill">Linden Hill</option>
                        <option class="Lobster has-subsets" value="Lobster">Lobster</option>
                        <option class="Lobster-Two has-variant" value="Lobster-Two">Lobster Two</option>
                        <option class="Londrina-Outline" value="Londrina-Outline">Londrina Outline</option>
                        <option class="Londrina-Shadow" value="Londrina-Shadow">Londrina Shadow</option>
                        <option class="Londrina-Sketch" value="Londrina-Sketch">Londrina Sketch</option>
                        <option class="Londrina-Solid" value="Londrina-Solid">Londrina Solid</option>
                        <option class="Lora has-variant" value="Lora">Lora</option>
                        <option class="Love-Ya-Like-A-Sister" value="Love-Ya-Like-A-Sister">Love Ya Like A Sister</option>
                        <option class="Loved-by-the-King" value="Loved-by-the-King">Loved by the King</option>
                        <option class="Lovers-Quarrel has-subsets" value="Lovers-Quarrel">Lovers Quarrel</option>
                        <option class="Luckiest-Guy" value="Luckiest-Guy">Luckiest Guy</option>
                        <option class="Lusitana has-variant" value="Lusitana">Lusitana</option>
                        <option class="Lustria" value="Lustria">Lustria</option>
                        <option class="Macondo" value="Macondo">Macondo</option>
                        <option class="Macondo-Swash-Caps" value="Macondo-Swash-Caps">Macondo Swash Caps</option>
                        <option class="Magra has-variant has-subsets" value="Magra">Magra</option>
                        <option class="Maiden-Orange" value="Maiden-Orange">Maiden Orange</option>
                        <option class="Mako" value="Mako">Mako</option>
                        <option class="Marcellus has-subsets" value="Marcellus">Marcellus</option>
                        <option class="Marcellus-SC has-subsets" value="Marcellus-SC">Marcellus SC</option>
                        <option class="Marck-Script has-subsets" value="Marck-Script">Marck Script</option>
                        <option class="Margarine has-subsets" value="Margarine">Margarine</option>
                        <option class="Marko-One" value="Marko-One">Marko One</option>
                        <option class="Marmelad has-subsets" value="Marmelad">Marmelad</option>
                        <option class="Marvel has-variant" value="Marvel">Marvel</option>
                        <option class="Mate has-variant" value="Mate">Mate</option>
                        <option class="Mate-SC" value="Mate-SC">Mate SC</option>
                        <option class="Maven-Pro has-variant" value="Maven-Pro">Maven Pro</option>
                        <option class="McLaren has-subsets" value="McLaren">McLaren</option>
                        <option class="Meddon" value="Meddon">Meddon</option>
                        <option class="MedievalSharp has-subsets" value="MedievalSharp">MedievalSharp</option>
                        <option class="Medula-One" value="Medula-One">Medula One</option>
                        <option class="Megrim" value="Megrim">Megrim</option>
                        <option class="Meie-Script has-subsets" value="Meie-Script">Meie Script</option>
                        <option class="Merienda has-variant has-subsets" value="Merienda">Merienda</option>
                        <option class="Merienda-One" value="Merienda-One">Merienda One</option>
                        <option class="Merriweather has-variant" value="Merriweather">Merriweather</option>
                        <option class="Merriweather-Sans has-variant has-subsets" value="Merriweather-Sans">Merriweather Sans</option>
                        <option class="Metal" value="Metal">Metal</option>
                        <option class="Metal-Mania has-subsets" value="Metal-Mania">Metal Mania</option>
                        <option class="Metamorphous has-subsets" value="Metamorphous">Metamorphous</option>
                        <option class="Metrophobic" value="Metrophobic">Metrophobic</option>
                        <option class="Michroma" value="Michroma">Michroma</option>
                        <option class="Milonga has-subsets" value="Milonga">Milonga</option>
                        <option class="Miltonian" value="Miltonian">Miltonian</option>
                        <option class="Miltonian-Tattoo" value="Miltonian-Tattoo">Miltonian Tattoo</option>
                        <option class="Miniver" value="Miniver">Miniver</option>
                        <option class="Miss-Fajardose has-subsets" value="Miss-Fajardose">Miss Fajardose</option>
                        <option class="Modern-Antiqua has-subsets" value="Modern-Antiqua">Modern Antiqua</option>
                        <option class="Molengo has-subsets" value="Molengo">Molengo</option>
                        <option class="Molle has-subsets" value="Molle">Molle</option>
                        <option class="Monda has-variant has-subsets" value="Monda">Monda</option>
                        <option class="Monofett" value="Monofett">Monofett</option>
                        <option class="Monoton" value="Monoton">Monoton</option>
                        <option class="Monsieur-La-Doulaise has-subsets" value="Monsieur-La-Doulaise">Monsieur La Doulaise</option>
                        <option class="Montaga" value="Montaga">Montaga</option>
                        <option class="Montez" value="Montez">Montez</option>
                        <option class="Montserrat has-variant" value="Montserrat">Montserrat</option>
                        <option class="Montserrat-Alternates has-variant" value="Montserrat-Alternates">Montserrat Alternates</option>
                        <option class="Montserrat-Subrayada has-variant" value="Montserrat-Subrayada">Montserrat Subrayada</option>
                        <option class="Moul" value="Moul">Moul</option>
                        <option class="Moulpali" value="Moulpali">Moulpali</option>
                        <option class="Mountains-of-Christmas has-variant" value="Mountains-of-Christmas">Mountains of Christmas</option>
                        <option class="Mouse-Memoirs has-subsets" value="Mouse-Memoirs">Mouse Memoirs</option>
                        <option class="Mr-Bedfort has-subsets" value="Mr-Bedfort">Mr Bedfort</option>
                        <option class="Mr-Dafoe has-subsets" value="Mr-Dafoe">Mr Dafoe</option>
                        <option class="Mr-De-Haviland has-subsets" value="Mr-De-Haviland">Mr De Haviland</option>
                        <option class="Mrs-Saint-Delafield has-subsets" value="Mrs-Saint-Delafield">Mrs Saint Delafield</option>
                        <option class="Mrs-Sheppards has-subsets" value="Mrs-Sheppards">Mrs Sheppards</option>
                        <option class="Muli has-variant" value="Muli">Muli</option>
                        <option class="Mystery-Quest has-subsets" value="Mystery-Quest">Mystery Quest</option>
                        <option class="Neucha has-subsets" value="Neucha">Neucha</option>
                        <option class="Neuton has-variant has-subsets" value="Neuton">Neuton</option>
                        <option class="New-Rocker has-subsets" value="New-Rocker">New Rocker</option>
                        <option class="News-Cycle has-variant has-subsets" value="News-Cycle">News Cycle</option>
                        <option class="Niconne has-subsets" value="Niconne">Niconne</option>
                        <option class="Nixie-One" value="Nixie-One">Nixie One</option>
                        <option class="Nobile has-variant" value="Nobile">Nobile</option>
                        <option class="Nokora has-variant" value="Nokora">Nokora</option>
                        <option class="Norican has-subsets" value="Norican">Norican</option>
                        <option class="Nosifer has-subsets" value="Nosifer">Nosifer</option>
                        <option class="Nothing-You-Could-Do" value="Nothing-You-Could-Do">Nothing You Could Do</option>
                        <option class="Noticia-Text has-variant has-subsets" value="Noticia-Text">Noticia Text</option>
                        <option class="Nova-Cut" value="Nova-Cut">Nova Cut</option>
                        <option class="Nova-Flat" value="Nova-Flat">Nova Flat</option>
                        <option class="Nova-Mono has-subsets" value="Nova-Mono">Nova Mono</option>
                        <option class="Nova-Oval" value="Nova-Oval">Nova Oval</option>
                        <option class="Nova-Round" value="Nova-Round">Nova Round</option>
                        <option class="Nova-Script" value="Nova-Script">Nova Script</option>
                        <option class="Nova-Slim" value="Nova-Slim">Nova Slim</option>
                        <option class="Nova-Square" value="Nova-Square">Nova Square</option>
                        <option class="Numans" value="Numans">Numans</option>
                        <option class="Nunito has-variant" value="Nunito">Nunito</option>
                        <option class="Odor-Mean-Chey" value="Odor-Mean-Chey">Odor Mean Chey</option>
                        <option class="Offside" value="Offside">Offside</option>
                        <option class="Old-Standard-TT has-variant" value="Old-Standard-TT">Old Standard TT</option>
                        <option class="Oldenburg has-subsets" value="Oldenburg">Oldenburg</option>
                        <option class="Oleo-Script has-variant has-subsets" value="Oleo-Script">Oleo Script</option>
                        <option class="Oleo-Script-Swash-Caps has-variant has-subsets" value="Oleo-Script-Swash-Caps">Oleo Script Swash Caps</option>
                        <option class="Open-Sans has-variant has-subsets" value="Open-Sans">Open Sans</option>
                        <option class="Open-Sans-Condensed has-variant has-subsets" value="Open-Sans-Condensed">Open Sans Condensed</option>
                        <option class="Oranienbaum has-subsets" value="Oranienbaum">Oranienbaum</option>
                        <option class="Orbitron has-variant" value="Orbitron">Orbitron</option>
                        <option class="Oregano has-variant has-subsets" value="Oregano">Oregano</option>
                        <option class="Orienta has-subsets" value="Orienta">Orienta</option>
                        <option class="Original-Surfer" value="Original-Surfer">Original Surfer</option>
                        <option class="Oswald has-variant has-subsets" value="Oswald">Oswald</option>
                        <option class="Over-the-Rainbow" value="Over-the-Rainbow">Over the Rainbow</option>
                        <option class="Overlock has-variant has-subsets" value="Overlock">Overlock</option>
                        <option class="Overlock-SC has-subsets" value="Overlock-SC">Overlock SC</option>
                        <option class="Ovo" value="Ovo">Ovo</option>
                        <option class="Oxygen has-variant has-subsets" value="Oxygen">Oxygen</option>
                        <option class="Oxygen-Mono has-subsets" value="Oxygen-Mono">Oxygen Mono</option>
                        <option class="PT-Mono has-subsets" value="PT-Mono">PT Mono</option>
                        <option class="PT-Sans has-variant has-subsets" value="PT-Sans">PT Sans</option>
                        <option class="PT-Sans-Caption has-variant has-subsets" value="PT-Sans-Caption">PT Sans Caption</option>
                        <option class="PT-Sans-Narrow has-variant has-subsets" value="PT-Sans-Narrow">PT Sans Narrow</option>
                        <option class="PT-Serif has-variant has-subsets" value="PT-Serif">PT Serif</option>
                        <option class="PT-Serif-Caption has-variant has-subsets" value="PT-Serif-Caption">PT Serif Caption</option>
                        <option class="Pacifico" value="Pacifico">Pacifico</option>
                        <option class="Paprika" value="Paprika">Paprika</option>
                        <option class="Parisienne has-subsets" value="Parisienne">Parisienne</option>
                        <option class="Passero-One has-subsets" value="Passero-One">Passero One</option>
                        <option class="Passion-One has-variant has-subsets" value="Passion-One">Passion One</option>
                        <option class="Patrick-Hand has-subsets" value="Patrick-Hand">Patrick Hand</option>
                        <option class="Patrick-Hand-SC has-subsets" value="Patrick-Hand-SC">Patrick Hand SC</option>
                        <option class="Patua-One" value="Patua-One">Patua One</option>
                        <option class="Paytone-One" value="Paytone-One">Paytone One</option>
                        <option class="Peralta has-subsets" value="Peralta">Peralta</option>
                        <option class="Permanent-Marker" value="Permanent-Marker">Permanent Marker</option>
                        <option class="Petit-Formal-Script has-subsets" value="Petit-Formal-Script">Petit Formal Script</option>
                        <option class="Petrona" value="Petrona">Petrona</option>
                        <option class="Philosopher has-variant has-subsets" value="Philosopher">Philosopher</option>
                        <option class="Piedra has-subsets" value="Piedra">Piedra</option>
                        <option class="Pinyon-Script" value="Pinyon-Script">Pinyon Script</option>
                        <option class="Pirata-One has-subsets" value="Pirata-One">Pirata One</option>
                        <option class="Plaster has-subsets" value="Plaster">Plaster</option>
                        <option class="Play has-variant has-subsets" value="Play">Play</option>
                        <option class="Playball has-subsets" value="Playball">Playball</option>
                        <option class="Playfair-Display has-variant has-subsets" value="Playfair-Display">Playfair Display</option>
                        <option class="Playfair-Display-SC has-variant has-subsets" value="Playfair-Display-SC">Playfair Display SC</option>
                        <option class="Podkova has-variant" value="Podkova">Podkova</option>
                        <option class="Poiret-One has-subsets" value="Poiret-One">Poiret One</option>
                        <option class="Poller-One" value="Poller-One">Poller One</option>
                        <option class="Poly has-variant" value="Poly">Poly</option>
                        <option class="Pompiere" value="Pompiere">Pompiere</option>
                        <option class="Pontano-Sans has-subsets" value="Pontano-Sans">Pontano Sans</option>
                        <option class="Port-Lligat-Sans" value="Port-Lligat-Sans">Port Lligat Sans</option>
                        <option class="Port-Lligat-Slab" value="Port-Lligat-Slab">Port Lligat Slab</option>
                        <option class="Prata" value="Prata">Prata</option>
                        <option class="Preahvihear" value="Preahvihear">Preahvihear</option>
                        <option class="Press-Start-2P has-subsets" value="Press-Start-2P">Press Start 2P</option>
                        <option class="Princess-Sofia has-subsets" value="Princess-Sofia">Princess Sofia</option>
                        <option class="Prociono" value="Prociono">Prociono</option>
                        <option class="Prosto-One has-subsets" value="Prosto-One">Prosto One</option>
                        <option class="Puritan has-variant" value="Puritan">Puritan</option>
                        <option class="Purple-Purse has-subsets" value="Purple-Purse">Purple Purse</option>
                        <option class="Quando has-subsets" value="Quando">Quando</option>
                        <option class="Quantico has-variant" value="Quantico">Quantico</option>
                        <option class="Quattrocento has-variant has-subsets" value="Quattrocento">Quattrocento</option>
                        <option class="Quattrocento-Sans has-variant has-subsets" value="Quattrocento-Sans">Quattrocento Sans</option>
                        <option class="Questrial" value="Questrial">Questrial</option>
                        <option class="Quicksand has-variant" value="Quicksand">Quicksand</option>
                        <option class="Quintessential has-subsets" value="Quintessential">Quintessential</option>
                        <option class="Qwigley has-subsets" value="Qwigley">Qwigley</option>
                        <option class="Racing-Sans-One has-subsets" value="Racing-Sans-One">Racing Sans One</option>
                        <option class="Radley has-variant has-subsets" value="Radley">Radley</option>
                        <option class="Raleway has-variant" value="Raleway">Raleway</option>
                        <option class="Raleway-Dots has-subsets" value="Raleway-Dots">Raleway Dots</option>
                        <option class="Rambla has-variant has-subsets" value="Rambla">Rambla</option>
                        <option class="Rammetto-One has-subsets" value="Rammetto-One">Rammetto One</option>
                        <option class="Ranchers has-subsets" value="Ranchers">Ranchers</option>
                        <option class="Rancho" value="Rancho">Rancho</option>
                        <option class="Rationale" value="Rationale">Rationale</option>
                        <option class="Redressed" value="Redressed">Redressed</option>
                        <option class="Reenie-Beanie" value="Reenie-Beanie">Reenie Beanie</option>
                        <option class="Revalia has-subsets" value="Revalia">Revalia</option>
                        <option class="Ribeye has-subsets" value="Ribeye">Ribeye</option>
                        <option class="Ribeye-Marrow has-subsets" value="Ribeye-Marrow">Ribeye Marrow</option>
                        <option class="Righteous has-subsets" value="Righteous">Righteous</option>
                        <option class="Risque has-subsets" value="Risque">Risque</option>
                        <option class="Roboto has-variant has-subsets" value="Roboto">Roboto</option>
                        <option class="Roboto-Condensed has-variant has-subsets" value="Roboto-Condensed">Roboto Condensed</option>
                        <option class="Rochester" value="Rochester">Rochester</option>
                        <option class="Rock-Salt" value="Rock-Salt">Rock Salt</option>
                        <option class="Rokkitt has-variant" value="Rokkitt">Rokkitt</option>
                        <option class="Romanesco has-subsets" value="Romanesco">Romanesco</option>
                        <option class="Ropa-Sans has-variant has-subsets" value="Ropa-Sans">Ropa Sans</option>
                        <option class="Rosario has-variant" value="Rosario">Rosario</option>
                        <option class="Rosarivo has-variant has-subsets" value="Rosarivo">Rosarivo</option>
                        <option class="Rouge-Script" value="Rouge-Script">Rouge Script</option>
                        <option class="Ruda has-variant has-subsets" value="Ruda">Ruda</option>
                        <option class="Rufina has-variant has-subsets" value="Rufina">Rufina</option>
                        <option class="Ruge-Boogie has-subsets" value="Ruge-Boogie">Ruge Boogie</option>
                        <option class="Ruluko has-subsets" value="Ruluko">Ruluko</option>
                        <option class="Rum-Raisin has-subsets" value="Rum-Raisin">Rum Raisin</option>
                        <option class="Ruslan-Display has-subsets" value="Ruslan-Display">Ruslan Display</option>
                        <option class="Russo-One has-subsets" value="Russo-One">Russo One</option>
                        <option class="Ruthie has-subsets" value="Ruthie">Ruthie</option>
                        <option class="Rye has-subsets" value="Rye">Rye</option>
                        <option class="Sacramento has-subsets" value="Sacramento">Sacramento</option>
                        <option class="Sail" value="Sail">Sail</option>
                        <option class="Salsa" value="Salsa">Salsa</option>
                        <option class="Sanchez has-variant has-subsets" value="Sanchez">Sanchez</option>
                        <option class="Sancreek has-subsets" value="Sancreek">Sancreek</option>
                        <option class="Sansita-One" value="Sansita-One">Sansita One</option>
                        <option class="Sarina has-subsets" value="Sarina">Sarina</option>
                        <option class="Satisfy" value="Satisfy">Satisfy</option>
                        <option class="Scada has-variant has-subsets" value="Scada">Scada</option>
                        <option class="Schoolbell" value="Schoolbell">Schoolbell</option>
                        <option class="Seaweed-Script has-subsets" value="Seaweed-Script">Seaweed Script</option>
                        <option class="Sevillana has-subsets" value="Sevillana">Sevillana</option>
                        <option class="Seymour-One has-subsets" value="Seymour-One">Seymour One</option>
                        <option class="Shadows-Into-Light" value="Shadows-Into-Light">Shadows Into Light</option>
                        <option class="Shadows-Into-Light-Two has-subsets" value="Shadows-Into-Light-Two">Shadows Into Light Two</option>
                        <option class="Shanti" value="Shanti">Shanti</option>
                        <option class="Share has-variant has-subsets" value="Share">Share</option>
                        <option class="Share-Tech" value="Share-Tech">Share Tech</option>
                        <option class="Share-Tech-Mono" value="Share-Tech-Mono">Share Tech Mono</option>
                        <option class="Shojumaru has-subsets" value="Shojumaru">Shojumaru</option>
                        <option class="Short-Stack" value="Short-Stack">Short Stack</option>
                        <option class="Siemreap" value="Siemreap">Siemreap</option>
                        <option class="Sigmar-One" value="Sigmar-One">Sigmar One</option>
                        <option class="Signika has-variant has-subsets" value="Signika">Signika</option>
                        <option class="Signika-Negative has-variant has-subsets" value="Signika-Negative">Signika Negative</option>
                        <option class="Simonetta has-variant has-subsets" value="Simonetta">Simonetta</option>
                        <option class="Sintony has-variant has-subsets" value="Sintony">Sintony</option>
                        <option class="Sirin-Stencil" value="Sirin-Stencil">Sirin Stencil</option>
                        <option class="Six-Caps" value="Six-Caps">Six Caps</option>
                        <option class="Skranji has-variant has-subsets" value="Skranji">Skranji</option>
                        <option class="Slackey" value="Slackey">Slackey</option>
                        <option class="Smokum" value="Smokum">Smokum</option>
                        <option class="Smythe" value="Smythe">Smythe</option>
                        <option class="Sniglet" value="Sniglet">Sniglet</option>
                        <option class="Snippet" value="Snippet">Snippet</option>
                        <option class="Snowburst-One has-subsets" value="Snowburst-One">Snowburst One</option>
                        <option class="Sofadi-One" value="Sofadi-One">Sofadi One</option>
                        <option class="Sofia" value="Sofia">Sofia</option>
                        <option class="Sonsie-One has-subsets" value="Sonsie-One">Sonsie One</option>
                        <option class="Sorts-Mill-Goudy has-variant has-subsets" value="Sorts-Mill-Goudy">Sorts Mill Goudy</option>
                        <option class="Source-Code-Pro has-variant has-subsets" value="Source-Code-Pro">Source Code Pro</option>
                        <option class="Source-Sans-Pro has-variant has-subsets" value="Source-Sans-Pro">Source Sans Pro</option>
                        <option class="Special-Elite" value="Special-Elite">Special Elite</option>
                        <option class="Spicy-Rice" value="Spicy-Rice">Spicy Rice</option>
                        <option class="Spinnaker has-subsets" value="Spinnaker">Spinnaker</option>
                        <option class="Spirax" value="Spirax">Spirax</option>
                        <option class="Squada-One" value="Squada-One">Squada One</option>
                        <option class="Stalemate has-subsets" value="Stalemate">Stalemate</option>
                        <option class="Stalinist-One has-subsets" value="Stalinist-One">Stalinist One</option>
                        <option class="Stardos-Stencil has-variant" value="Stardos-Stencil">Stardos Stencil</option>
                        <option class="Stint-Ultra-Condensed has-subsets" value="Stint-Ultra-Condensed">Stint Ultra Condensed</option>
                        <option class="Stint-Ultra-Expanded has-subsets" value="Stint-Ultra-Expanded">Stint Ultra Expanded</option>
                        <option class="Stoke has-variant has-subsets" value="Stoke">Stoke</option>
                        <option class="Strait" value="Strait">Strait</option>
                        <option class="Sue-Ellen-Francisco" value="Sue-Ellen-Francisco">Sue Ellen Francisco</option>
                        <option class="Sunshiney" value="Sunshiney">Sunshiney</option>
                        <option class="Supermercado-One" value="Supermercado-One">Supermercado One</option>
                        <option class="Suwannaphum" value="Suwannaphum">Suwannaphum</option>
                        <option class="Swanky-and-Moo-Moo" value="Swanky-and-Moo-Moo">Swanky and Moo Moo</option>
                        <option class="Syncopate has-variant" value="Syncopate">Syncopate</option>
                        <option class="Tangerine has-variant" value="Tangerine">Tangerine</option>
                        <option class="Taprom" value="Taprom">Taprom</option>
                        <option class="Tauri has-subsets" value="Tauri">Tauri</option>
                        <option class="Telex" value="Telex">Telex</option>
                        <option class="Tenor-Sans has-subsets" value="Tenor-Sans">Tenor Sans</option>
                        <option class="Text-Me-One has-subsets" value="Text-Me-One">Text Me One</option>
                        <option class="The-Girl-Next-Door" value="The-Girl-Next-Door">The Girl Next Door</option>
                        <option class="Tienne has-variant" value="Tienne">Tienne</option>
                        <option class="Tinos has-variant" value="Tinos">Tinos</option>
                        <option class="Titan-One has-subsets" value="Titan-One">Titan One</option>
                        <option class="Titillium-Web has-variant has-subsets" value="Titillium-Web">Titillium Web</option>
                        <option class="Trade-Winds" value="Trade-Winds">Trade Winds</option>
                        <option class="Trocchi has-subsets" value="Trocchi">Trocchi</option>
                        <option class="Trochut has-variant" value="Trochut">Trochut</option>
                        <option class="Trykker has-subsets" value="Trykker">Trykker</option>
                        <option class="Tulpen-One" value="Tulpen-One">Tulpen One</option>
                        <option class="Ubuntu has-variant has-subsets" value="Ubuntu">Ubuntu</option>
                        <option class="Ubuntu-Condensed has-subsets" value="Ubuntu-Condensed">Ubuntu Condensed</option>
                        <option class="Ubuntu-Mono has-variant has-subsets" value="Ubuntu-Mono">Ubuntu Mono</option>
                        <option class="Ultra" value="Ultra">Ultra</option>
                        <option class="Uncial-Antiqua" value="Uncial-Antiqua">Uncial Antiqua</option>
                        <option class="Underdog has-subsets" value="Underdog">Underdog</option>
                        <option class="Unica-One has-subsets" value="Unica-One">Unica One</option>
                        <option class="UnifrakturCook" value="UnifrakturCook">UnifrakturCook</option>
                        <option class="UnifrakturMaguntia" value="UnifrakturMaguntia">UnifrakturMaguntia</option>
                        <option class="Unkempt has-variant" value="Unkempt">Unkempt</option>
                        <option class="Unlock" value="Unlock">Unlock</option>
                        <option class="Unna" value="Unna">Unna</option>
                        <option class="VT323" value="VT323">VT323</option>
                        <option class="Vampiro-One has-subsets" value="Vampiro-One">Vampiro One</option>
                        <option class="Varela has-subsets" value="Varela">Varela</option>
                        <option class="Varela-Round" value="Varela-Round">Varela Round</option>
                        <option class="Vast-Shadow" value="Vast-Shadow">Vast Shadow</option>
                        <option class="Vibur" value="Vibur">Vibur</option>
                        <option class="Vidaloka" value="Vidaloka">Vidaloka</option>
                        <option class="Viga has-subsets" value="Viga">Viga</option>
                        <option class="Voces has-subsets" value="Voces">Voces</option>
                        <option class="Volkhov has-variant" value="Volkhov">Volkhov</option>
                        <option class="Vollkorn has-variant" value="Vollkorn">Vollkorn</option>
                        <option class="Voltaire" value="Voltaire">Voltaire</option>
                        <option class="Waiting-for-the-Sunrise" value="Waiting-for-the-Sunrise">Waiting for the Sunrise</option>
                        <option class="Wallpoet" value="Wallpoet">Wallpoet</option>
                        <option class="Walter-Turncoat" value="Walter-Turncoat">Walter Turncoat</option>
                        <option class="Warnes has-subsets" value="Warnes">Warnes</option>
                        <option class="Wellfleet has-subsets" value="Wellfleet">Wellfleet</option>
                        <option class="Wendy-One has-subsets" value="Wendy-One">Wendy One</option>
                        <option class="Wire-One" value="Wire-One">Wire One</option>
                        <option class="Yanone-Kaffeesatz has-variant has-subsets" value="Yanone-Kaffeesatz">Yanone Kaffeesatz</option>
                        <option class="Yellowtail" value="Yellowtail">Yellowtail</option>
                        <option class="Yeseva-One has-subsets" value="Yeseva-One">Yeseva One</option>
                        <option class="Yesteryear" value="Yesteryear">Yesteryear</option>
                        <option class="Zeyada" value="Zeyada">Zeyada</option>
                    </select>
                    <div class="resultado-fonte" id="resultado3" style="font-size: 30px;">O Texto ficará com esta fonte...</div>
                </div>
            </div>

            <div class="form-group font-grupo">
                <label for="fonte_cta" class="col-sm-2 control-label">Fonte para Botão (CTA)</label>
                <div class="col-sm-10">
                    <select name="fonte_cta" id="fonte_cta">
                        <option value=""></option>
                        <option class="ABeeZee has-variant" value="off">None (Turn off this font)</option>
                        <option class="ABeeZee has-variant" value="ABeeZee">ABeeZee</option>
                        <option class="Abel" value="Abel">Abel</option>
                        <option class="Abril-Fatface has-subsets" value="Abril-Fatface">Abril Fatface</option>
                        <option class="Aclonica" value="Aclonica">Aclonica</option>
                        <option class="Acme" value="Acme">Acme</option>
                        <option class="Actor" value="Actor">Actor</option>
                        <option class="Adamina" value="Adamina">Adamina</option>
                        <option class="Advent-Pro has-variant has-subsets" value="Advent-Pro">Advent Pro</option>
                        <option class="Aguafina-Script has-subsets" value="Aguafina-Script">Aguafina Script</option>
                        <option class="Akronim has-subsets" value="Akronim">Akronim</option>
                        <option class="Aladin has-subsets" value="Aladin">Aladin</option>
                        <option class="Aldrich" value="Aldrich">Aldrich</option>
                        <option class="Alegreya has-variant has-subsets" value="Alegreya">Alegreya</option>
                        <option class="Alegreya-SC has-variant has-subsets" value="Alegreya-SC">Alegreya SC</option>
                        <option class="Alex-Brush has-subsets" value="Alex-Brush">Alex Brush</option>
                        <option class="Alfa-Slab-One" value="Alfa-Slab-One">Alfa Slab One</option>
                        <option class="Alice" value="Alice">Alice</option>
                        <option class="Alike" value="Alike">Alike</option>
                        <option class="Alike-Angular" value="Alike-Angular">Alike Angular</option>
                        <option class="Allan has-variant has-subsets" value="Allan">Allan</option>
                        <option class="Allerta" value="Allerta">Allerta</option>
                        <option class="Allerta-Stencil" value="Allerta-Stencil">Allerta Stencil</option>
                        <option class="Allura has-subsets" value="Allura">Allura</option>
                        <option class="Almendra has-variant has-subsets" value="Almendra">Almendra</option>
                        <option class="Almendra-Display has-subsets" value="Almendra-Display">Almendra Display</option>
                        <option class="Almendra-SC" value="Almendra-SC">Almendra SC</option>
                        <option class="Amarante has-subsets" value="Amarante">Amarante</option>
                        <option class="Amaranth has-variant" value="Amaranth">Amaranth</option>
                        <option class="Amatic-SC has-variant" value="Amatic-SC">Amatic SC</option>
                        <option class="Amethysta" value="Amethysta">Amethysta</option>
                        <option class="Anaheim has-subsets" value="Anaheim">Anaheim</option>
                        <option class="Andada has-subsets" value="Andada">Andada</option>
                        <option class="Andika has-subsets" value="Andika">Andika</option>
                        <option class="Angkor" value="Angkor">Angkor</option>
                        <option class="Annie-Use-Your-Telescope" value="Annie-Use-Your-Telescope">Annie Use Your Telescope</option>
                        <option class="Anonymous-Pro has-variant has-subsets" value="Anonymous-Pro">Anonymous Pro</option>
                        <option class="Antic" value="Antic">Antic</option>
                        <option class="Antic-Didone" value="Antic-Didone">Antic Didone</option>
                        <option class="Antic-Slab" value="Antic-Slab">Antic Slab</option>
                        <option class="Anton has-subsets" value="Anton">Anton</option>
                        <option class="Arapey has-variant" value="Arapey">Arapey</option>
                        <option class="Arbutus has-subsets" value="Arbutus">Arbutus</option>
                        <option class="Arbutus-Slab has-subsets" value="Arbutus-Slab">Arbutus Slab</option>
                        <option class="Architects-Daughter" value="Architects-Daughter">Architects Daughter</option>
                        <option class="Archivo-Black has-subsets" value="Archivo-Black">Archivo Black</option>
                        <option class="Archivo-Narrow has-variant has-subsets" value="Archivo-Narrow">Archivo Narrow</option>
                        <option class="Arimo has-variant has-subsets" value="Arimo">Arimo</option>
                        <option class="Arizonia has-subsets" value="Arizonia">Arizonia</option>
                        <option class="Armata has-subsets" value="Armata">Armata</option>
                        <option class="Artifika" value="Artifika">Artifika</option>
                        <option class="Arvo has-variant" value="Arvo">Arvo</option>
                        <option class="Asap has-variant has-subsets" value="Asap">Asap</option>
                        <option class="Asset" value="Asset">Asset</option>
                        <option class="Astloch has-variant" value="Astloch">Astloch</option>
                        <option class="Asul has-variant" value="Asul">Asul</option>
                        <option class="Atomic-Age" value="Atomic-Age">Atomic Age</option>
                        <option class="Aubrey" value="Aubrey">Aubrey</option>
                        <option class="Audiowide has-subsets" value="Audiowide">Audiowide</option>
                        <option class="Autour-One has-subsets" value="Autour-One">Autour One</option>
                        <option class="Average has-subsets" value="Average">Average</option>
                        <option class="Average-Sans has-subsets" value="Average-Sans">Average Sans</option>
                        <option class="Averia-Gruesa-Libre has-subsets" value="Averia-Gruesa-Libre">Averia Gruesa Libre</option>
                        <option class="Averia-Libre has-variant" value="Averia-Libre">Averia Libre</option>
                        <option class="Averia-Sans-Libre has-variant" value="Averia-Sans-Libre">Averia Sans Libre</option>
                        <option class="Averia-Serif-Libre has-variant" value="Averia-Serif-Libre">Averia Serif Libre</option>
                        <option class="Bad-Script has-subsets" value="Bad-Script">Bad Script</option>
                        <option class="Balthazar" value="Balthazar">Balthazar</option>
                        <option class="Bangers" value="Bangers">Bangers</option>
                        <option class="Basic has-subsets" value="Basic">Basic</option>
                        <option class="Battambang has-variant" value="Battambang">Battambang</option>
                        <option class="Baumans" value="Baumans">Baumans</option>
                        <option class="Bayon" value="Bayon">Bayon</option>
                        <option class="Belgrano" value="Belgrano">Belgrano</option>
                        <option class="Belleza has-subsets" value="Belleza">Belleza</option>
                        <option class="BenchNine has-variant has-subsets" value="BenchNine">BenchNine</option>
                        <option class="Bentham" value="Bentham">Bentham</option>
                        <option class="Berkshire-Swash has-subsets" value="Berkshire-Swash">Berkshire Swash</option>
                        <option class="Bevan" value="Bevan">Bevan</option>
                        <option class="Bigelow-Rules has-subsets" value="Bigelow-Rules">Bigelow Rules</option>
                        <option class="Bigshot-One" value="Bigshot-One">Bigshot One</option>
                        <option class="Bilbo has-subsets" value="Bilbo">Bilbo</option>
                        <option class="Bilbo-Swash-Caps has-subsets" value="Bilbo-Swash-Caps">Bilbo Swash Caps</option>
                        <option class="Bitter has-variant has-subsets" value="Bitter">Bitter</option>
                        <option class="Black-Ops-One has-subsets" value="Black-Ops-One">Black Ops One</option>
                        <option class="Bokor" value="Bokor">Bokor</option>
                        <option class="Bonbon" value="Bonbon">Bonbon</option>
                        <option class="Boogaloo" value="Boogaloo">Boogaloo</option>
                        <option class="Bowlby-One" value="Bowlby-One">Bowlby One</option>
                        <option class="Bowlby-One-SC has-subsets" value="Bowlby-One-SC">Bowlby One SC</option>
                        <option class="Brawler" value="Brawler">Brawler</option>
                        <option class="Bree-Serif has-subsets" value="Bree-Serif">Bree Serif</option>
                        <option class="Bubblegum-Sans has-subsets" value="Bubblegum-Sans">Bubblegum Sans</option>
                        <option class="Bubbler-One has-subsets" value="Bubbler-One">Bubbler One</option>
                        <option class="Buda" value="Buda">Buda</option>
                        <option class="Buenard has-variant has-subsets" value="Buenard">Buenard</option>
                        <option class="Butcherman has-subsets" value="Butcherman">Butcherman</option>
                        <option class="Butterfly-Kids has-subsets" value="Butterfly-Kids">Butterfly Kids</option>
                        <option class="Cabin has-variant" value="Cabin">Cabin</option>
                        <option class="Cabin-Condensed has-variant" value="Cabin-Condensed">Cabin Condensed</option>
                        <option class="Cabin-Sketch has-variant" value="Cabin-Sketch">Cabin Sketch</option>
                        <option class="Caesar-Dressing" value="Caesar-Dressing">Caesar Dressing</option>
                        <option class="Cagliostro" value="Cagliostro">Cagliostro</option>
                        <option class="Calligraffitti" value="Calligraffitti">Calligraffitti</option>
                        <option class="Cambo" value="Cambo">Cambo</option>
                        <option class="Candal" value="Candal">Candal</option>
                        <option class="Cantarell has-variant" value="Cantarell">Cantarell</option>
                        <option class="Cantata-One has-subsets" value="Cantata-One">Cantata One</option>
                        <option class="Cantora-One has-subsets" value="Cantora-One">Cantora One</option>
                        <option class="Capriola has-subsets" value="Capriola">Capriola</option>
                        <option class="Cardo has-variant has-subsets" value="Cardo">Cardo</option>
                        <option class="Carme" value="Carme">Carme</option>
                        <option class="Carrois-Gothic" value="Carrois-Gothic">Carrois Gothic</option>
                        <option class="Carrois-Gothic-SC" value="Carrois-Gothic-SC">Carrois Gothic SC</option>
                        <option class="Carter-One" value="Carter-One">Carter One</option>
                        <option class="Caudex has-variant has-subsets" value="Caudex">Caudex</option>
                        <option class="Cedarville-Cursive" value="Cedarville-Cursive">Cedarville Cursive</option>
                        <option class="Ceviche-One" value="Ceviche-One">Ceviche One</option>
                        <option class="Changa-One has-variant" value="Changa-One">Changa One</option>
                        <option class="Chango has-subsets" value="Chango">Chango</option>
                        <option class="Chau-Philomene-One has-variant has-subsets" value="Chau-Philomene-One">Chau Philomene One</option>
                        <option class="Chela-One has-subsets" value="Chela-One">Chela One</option>
                        <option class="Chelsea-Market has-subsets" value="Chelsea-Market">Chelsea Market</option>
                        <option class="Chenla" value="Chenla">Chenla</option>
                        <option class="Cherry-Cream-Soda" value="Cherry-Cream-Soda">Cherry Cream Soda</option>
                        <option class="Cherry-Swash has-variant has-subsets" value="Cherry-Swash">Cherry Swash</option>
                        <option class="Chewy" value="Chewy">Chewy</option>
                        <option class="Chicle has-subsets" value="Chicle">Chicle</option>
                        <option class="Chivo has-variant" value="Chivo">Chivo</option>
                        <option class="Cinzel has-variant" value="Cinzel">Cinzel</option>
                        <option class="Cinzel-Decorative has-variant" value="Cinzel-Decorative">Cinzel Decorative</option>
                        <option class="Clicker-Script has-subsets" value="Clicker-Script">Clicker Script</option>
                        <option class="Coda has-variant" value="Coda">Coda</option>
                        <option class="Coda-Caption" value="Coda-Caption">Coda Caption</option>
                        <option class="Codystar has-variant has-subsets" value="Codystar">Codystar</option>
                        <option class="Combo has-subsets" value="Combo">Combo</option>
                        <option class="Comfortaa has-variant has-subsets" value="Comfortaa">Comfortaa</option>
                        <option class="Coming-Soon" value="Coming-Soon">Coming Soon</option>
                        <option class="Concert-One has-subsets" value="Concert-One">Concert One</option>
                        <option class="Condiment has-subsets" value="Condiment">Condiment</option>
                        <option class="Content has-variant" value="Content">Content</option>
                        <option class="Contrail-One" value="Contrail-One">Contrail One</option>
                        <option class="Convergence" value="Convergence">Convergence</option>
                        <option class="Cookie" value="Cookie">Cookie</option>
                        <option class="Copse" value="Copse">Copse</option>
                        <option class="Corben has-variant" value="Corben">Corben</option>
                        <option class="Courgette has-subsets" value="Courgette">Courgette</option>
                        <option class="Cousine has-variant" value="Cousine">Cousine</option>
                        <option class="Coustard has-variant" value="Coustard">Coustard</option>
                        <option class="Covered-By-Your-Grace" value="Covered-By-Your-Grace">Covered By Your Grace</option>
                        <option class="Crafty-Girls" value="Crafty-Girls">Crafty Girls</option>
                        <option class="Creepster" value="Creepster">Creepster</option>
                        <option class="Crete-Round has-variant has-subsets" value="Crete-Round">Crete Round</option>
                        <option class="Crimson-Text has-variant" value="Crimson-Text">Crimson Text</option>
                        <option class="Croissant-One has-subsets" value="Croissant-One">Croissant One</option>
                        <option class="Crushed" value="Crushed">Crushed</option>
                        <option class="Cuprum has-variant has-subsets" value="Cuprum">Cuprum</option>
                        <option class="Cutive has-subsets" value="Cutive">Cutive</option>
                        <option class="Cutive-Mono has-subsets" value="Cutive-Mono">Cutive Mono</option>
                        <option class="Damion" value="Damion">Damion</option>
                        <option class="Dancing-Script has-variant" value="Dancing-Script">Dancing Script</option>
                        <option class="Dangrek" value="Dangrek">Dangrek</option>
                        <option class="Dawning-of-a-New-Day" value="Dawning-of-a-New-Day">Dawning of a New Day</option>
                        <option class="Days-One" value="Days-One">Days One</option>
                        <option class="Delius" value="Delius">Delius</option>
                        <option class="Delius-Swash-Caps" value="Delius-Swash-Caps">Delius Swash Caps</option>
                        <option class="Delius-Unicase has-variant" value="Delius-Unicase">Delius Unicase</option>
                        <option class="Della-Respira" value="Della-Respira">Della Respira</option>
                        <option class="Denk-One has-subsets" value="Denk-One">Denk One</option>
                        <option class="Devonshire has-subsets" value="Devonshire">Devonshire</option>
                        <option class="Didact-Gothic has-subsets" value="Didact-Gothic">Didact Gothic</option>
                        <option class="Diplomata has-subsets" value="Diplomata">Diplomata</option>
                        <option class="Diplomata-SC has-subsets" value="Diplomata-SC">Diplomata SC</option>
                        <option class="Domine has-variant has-subsets" value="Domine">Domine</option>
                        <option class="Donegal-One has-subsets" value="Donegal-One">Donegal One</option>
                        <option class="Doppio-One has-subsets" value="Doppio-One">Doppio One</option>
                        <option class="Dorsa" value="Dorsa">Dorsa</option>
                        <option class="Dosis has-variant has-subsets" value="Dosis">Dosis</option>
                        <option class="Dr-Sugiyama has-subsets" value="Dr-Sugiyama">Dr Sugiyama</option>
                        <option class="Droid-Sans has-variant" value="Droid-Sans">Droid Sans</option>
                        <option class="Droid-Sans-Mono" value="Droid-Sans-Mono">Droid Sans Mono</option>
                        <option class="Droid-Serif has-variant" value="Droid-Serif">Droid Serif</option>
                        <option class="Duru-Sans has-subsets" value="Duru-Sans">Duru Sans</option>
                        <option class="Dynalight has-subsets" value="Dynalight">Dynalight</option>
                        <option class="EB-Garamond has-subsets" value="EB-Garamond">EB Garamond</option>
                        <option class="Eagle-Lake has-subsets" value="Eagle-Lake">Eagle Lake</option>
                        <option class="Eater has-subsets" value="Eater">Eater</option>
                        <option class="Economica has-variant has-subsets" value="Economica">Economica</option>
                        <option class="Electrolize" value="Electrolize">Electrolize</option>
                        <option class="Elsie has-variant has-subsets" value="Elsie">Elsie</option>
                        <option class="Elsie-Swash-Caps has-variant has-subsets" value="Elsie-Swash-Caps">Elsie Swash Caps</option>
                        <option class="Emblema-One has-subsets" value="Emblema-One">Emblema One</option>
                        <option class="Emilys-Candy has-subsets" value="Emilys-Candy">Emilys Candy</option>
                        <option class="Engagement" value="Engagement">Engagement</option>
                        <option class="Englebert has-subsets" value="Englebert">Englebert</option>
                        <option class="Enriqueta has-variant has-subsets" value="Enriqueta">Enriqueta</option>
                        <option class="Erica-One" value="Erica-One">Erica One</option>
                        <option class="Esteban has-subsets" value="Esteban">Esteban</option>
                        <option class="Euphoria-Script has-subsets" value="Euphoria-Script">Euphoria Script</option>
                        <option class="Ewert has-subsets" value="Ewert">Ewert</option>
                        <option class="Exo has-variant has-subsets" value="Exo">Exo</option>
                        <option class="Expletus-Sans has-variant" value="Expletus-Sans">Expletus Sans</option>
                        <option class="Fanwood-Text has-variant" value="Fanwood-Text">Fanwood Text</option>
                        <option class="Fascinate" value="Fascinate">Fascinate</option>
                        <option class="Fascinate-Inline" value="Fascinate-Inline">Fascinate Inline</option>
                        <option class="Faster-One" value="Faster-One">Faster One</option>
                        <option class="Fasthand" value="Fasthand">Fasthand</option>
                        <option class="Federant" value="Federant">Federant</option>
                        <option class="Federo" value="Federo">Federo</option>
                        <option class="Felipa has-subsets" value="Felipa">Felipa</option>
                        <option class="Fenix has-subsets" value="Fenix">Fenix</option>
                        <option class="Finger-Paint" value="Finger-Paint">Finger Paint</option>
                        <option class="Fjalla-One has-subsets" value="Fjalla-One">Fjalla One</option>
                        <option class="Fjord-One" value="Fjord-One">Fjord One</option>
                        <option class="Flamenco has-variant" value="Flamenco">Flamenco</option>
                        <option class="Flavors" value="Flavors">Flavors</option>
                        <option class="Fondamento has-variant has-subsets" value="Fondamento">Fondamento</option>
                        <option class="Fontdiner-Swanky" value="Fontdiner-Swanky">Fontdiner Swanky</option>
                        <option class="Forum has-subsets" value="Forum">Forum</option>
                        <option class="Francois-One has-subsets" value="Francois-One">Francois One</option>
                        <option class="Freckle-Face has-subsets" value="Freckle-Face">Freckle Face</option>
                        <option class="Fredericka-the-Great" value="Fredericka-the-Great">Fredericka the Great</option>
                        <option class="Fredoka-One" value="Fredoka-One">Fredoka One</option>
                        <option class="Freehand" value="Freehand">Freehand</option>
                        <option class="Fresca has-subsets" value="Fresca">Fresca</option>
                        <option class="Frijole" value="Frijole">Frijole</option>
                        <option class="Fruktur has-subsets" value="Fruktur">Fruktur</option>
                        <option class="Fugaz-One" value="Fugaz-One">Fugaz One</option>
                        <option class="GFS-Didot" value="GFS-Didot">GFS Didot</option>
                        <option class="GFS-Neohellenic has-variant" value="GFS-Neohellenic">GFS Neohellenic</option>
                        <option class="Gabriela has-subsets" value="Gabriela">Gabriela</option>
                        <option class="Gafata has-subsets" value="Gafata">Gafata</option>
                        <option class="Galdeano" value="Galdeano">Galdeano</option>
                        <option class="Galindo has-subsets" value="Galindo">Galindo</option>
                        <option class="Gentium-Basic has-variant has-subsets" value="Gentium-Basic">Gentium Basic</option>
                        <option class="Gentium-Book-Basic has-variant has-subsets" value="Gentium-Book-Basic">Gentium Book Basic</option>
                        <option class="Geo has-variant" value="Geo">Geo</option>
                        <option class="Geostar" value="Geostar">Geostar</option>
                        <option class="Geostar-Fill" value="Geostar-Fill">Geostar Fill</option>
                        <option class="Germania-One" value="Germania-One">Germania One</option>
                        <option class="Gilda-Display has-subsets" value="Gilda-Display">Gilda Display</option>
                        <option class="Give-You-Glory" value="Give-You-Glory">Give You Glory</option>
                        <option class="Glass-Antiqua has-subsets" value="Glass-Antiqua">Glass Antiqua</option>
                        <option class="Glegoo has-subsets" value="Glegoo">Glegoo</option>
                        <option class="Gloria-Hallelujah" value="Gloria-Hallelujah">Gloria Hallelujah</option>
                        <option class="Goblin-One" value="Goblin-One">Goblin One</option>
                        <option class="Gochi-Hand" value="Gochi-Hand">Gochi Hand</option>
                        <option class="Gorditas has-variant" value="Gorditas">Gorditas</option>
                        <option class="Goudy-Bookletter-1911" value="Goudy-Bookletter-1911">Goudy Bookletter 1911</option>
                        <option class="Graduate" value="Graduate">Graduate</option>
                        <option class="Grand-Hotel has-subsets" value="Grand-Hotel">Grand Hotel</option>
                        <option class="Gravitas-One" value="Gravitas-One">Gravitas One</option>
                        <option class="Great-Vibes has-subsets" value="Great-Vibes">Great Vibes</option>
                        <option class="Griffy has-subsets" value="Griffy">Griffy</option>
                        <option class="Gruppo has-subsets" value="Gruppo">Gruppo</option>
                        <option class="Gudea has-variant has-subsets" value="Gudea">Gudea</option>
                        <option class="Habibi has-subsets" value="Habibi">Habibi</option>
                        <option class="Hammersmith-One has-subsets" value="Hammersmith-One">Hammersmith One</option>
                        <option class="Hanalei has-subsets" value="Hanalei">Hanalei</option>
                        <option class="Hanalei-Fill has-subsets" value="Hanalei-Fill">Hanalei Fill</option>
                        <option class="Handlee" value="Handlee">Handlee</option>
                        <option class="Hanuman has-variant" value="Hanuman">Hanuman</option>
                        <option class="Happy-Monkey has-subsets" value="Happy-Monkey">Happy Monkey</option>
                        <option class="Headland-One has-subsets" value="Headland-One">Headland One</option>
                        <option class="Henny-Penny" value="Henny-Penny">Henny Penny</option>
                        <option class="Herr-Von-Muellerhoff has-subsets" value="Herr-Von-Muellerhoff">Herr Von Muellerhoff</option>
                        <option class="Holtwood-One-SC" value="Holtwood-One-SC">Holtwood One SC</option>
                        <option class="Homemade-Apple" value="Homemade-Apple">Homemade Apple</option>
                        <option class="Homenaje has-subsets" value="Homenaje">Homenaje</option>
                        <option class="IM-Fell-DW-Pica has-variant" value="IM-Fell-DW-Pica">IM Fell DW Pica</option>
                        <option class="IM-Fell-DW-Pica-SC" value="IM-Fell-DW-Pica-SC">IM Fell DW Pica SC</option>
                        <option class="IM-Fell-Double-Pica has-variant" value="IM-Fell-Double-Pica">IM Fell Double Pica</option>
                        <option class="IM-Fell-Double-Pica-SC" value="IM-Fell-Double-Pica-SC">IM Fell Double Pica SC</option>
                        <option class="IM-Fell-English has-variant" value="IM-Fell-English">IM Fell English</option>
                        <option class="IM-Fell-English-SC" value="IM-Fell-English-SC">IM Fell English SC</option>
                        <option class="IM-Fell-French-Canon has-variant" value="IM-Fell-French-Canon">IM Fell French Canon</option>
                        <option class="IM-Fell-French-Canon-SC" value="IM-Fell-French-Canon-SC">IM Fell French Canon SC</option>
                        <option class="IM-Fell-Great-Primer has-variant" value="IM-Fell-Great-Primer">IM Fell Great Primer</option>
                        <option class="IM-Fell-Great-Primer-SC" value="IM-Fell-Great-Primer-SC">IM Fell Great Primer SC</option>
                        <option class="Iceberg" value="Iceberg">Iceberg</option>
                        <option class="Iceland" value="Iceland">Iceland</option>
                        <option class="Imprima has-subsets" value="Imprima">Imprima</option>
                        <option class="Inconsolata has-variant has-subsets" value="Inconsolata">Inconsolata</option>
                        <option class="Inder has-subsets" value="Inder">Inder</option>
                        <option class="Indie-Flower" value="Indie-Flower">Indie Flower</option>
                        <option class="Inika has-variant has-subsets" value="Inika">Inika</option>
                        <option class="Irish-Grover" value="Irish-Grover">Irish Grover</option>
                        <option class="Istok-Web has-variant has-subsets" value="Istok-Web">Istok Web</option>
                        <option class="Italiana" value="Italiana">Italiana</option>
                        <option class="Italianno has-subsets" value="Italianno">Italianno</option>
                        <option class="Jacques-Francois" value="Jacques-Francois">Jacques Francois</option>
                        <option class="Jacques-Francois-Shadow" value="Jacques-Francois-Shadow">Jacques Francois Shadow</option>
                        <option class="Jim-Nightshade has-subsets" value="Jim-Nightshade">Jim Nightshade</option>
                        <option class="Jockey-One has-subsets" value="Jockey-One">Jockey One</option>
                        <option class="Jolly-Lodger has-subsets" value="Jolly-Lodger">Jolly Lodger</option>
                        <option class="Josefin-Sans has-variant" value="Josefin-Sans">Josefin Sans</option>
                        <option class="Josefin-Slab has-variant" value="Josefin-Slab">Josefin Slab</option>
                        <option class="Joti-One has-subsets" value="Joti-One">Joti One</option>
                        <option class="Judson has-variant" value="Judson">Judson</option>
                        <option class="Julee" value="Julee">Julee</option>
                        <option class="Julius-Sans-One has-subsets" value="Julius-Sans-One">Julius Sans One</option>
                        <option class="Junge" value="Junge">Junge</option>
                        <option class="Jura has-variant has-subsets" value="Jura">Jura</option>
                        <option class="Just-Another-Hand" value="Just-Another-Hand">Just Another Hand</option>
                        <option class="Just-Me-Again-Down-Here" value="Just-Me-Again-Down-Here">Just Me Again Down Here</option>
                        <option class="Kameron has-variant" value="Kameron">Kameron</option>
                        <option class="Karla has-variant has-subsets" value="Karla">Karla</option>
                        <option class="Kaushan-Script has-subsets" value="Kaushan-Script">Kaushan Script</option>
                        <option class="Kavoon has-subsets" value="Kavoon">Kavoon</option>
                        <option class="Keania-One has-subsets" value="Keania-One">Keania One</option>
                        <option class="Kelly-Slab has-subsets" value="Kelly-Slab">Kelly Slab</option>
                        <option class="Kenia" value="Kenia">Kenia</option>
                        <option class="Khmer" value="Khmer">Khmer</option>
                        <option class="Kite-One" value="Kite-One">Kite One</option>
                        <option class="Knewave has-subsets" value="Knewave">Knewave</option>
                        <option class="Kotta-One has-subsets" value="Kotta-One">Kotta One</option>
                        <option class="Koulen" value="Koulen">Koulen</option>
                        <option class="Kranky" value="Kranky">Kranky</option>
                        <option class="Kreon has-variant" value="Kreon">Kreon</option>
                        <option class="Kristi" value="Kristi">Kristi</option>
                        <option class="Krona-One has-subsets" value="Krona-One">Krona One</option>
                        <option class="La-Belle-Aurore" value="La-Belle-Aurore">La Belle Aurore</option>
                        <option class="Lancelot" value="Lancelot">Lancelot</option>
                        <option class="Lato has-variant" value="Lato">Lato</option>
                        <option class="League-Script" value="League-Script">League Script</option>
                        <option class="Leckerli-One" value="Leckerli-One">Leckerli One</option>
                        <option class="Ledger has-subsets" value="Ledger">Ledger</option>
                        <option class="Lekton has-variant has-subsets" value="Lekton">Lekton</option>
                        <option class="Lemon" value="Lemon">Lemon</option>
                        <option class="Libre-Baskerville has-variant has-subsets" value="Libre-Baskerville">Libre Baskerville</option>
                        <option class="Life-Savers has-variant has-subsets" value="Life-Savers">Life Savers</option>
                        <option class="Lilita-One has-subsets" value="Lilita-One">Lilita One</option>
                        <option class="Limelight has-subsets" value="Limelight">Limelight</option>
                        <option class="Linden-Hill has-variant" value="Linden-Hill">Linden Hill</option>
                        <option class="Lobster has-subsets" value="Lobster">Lobster</option>
                        <option class="Lobster-Two has-variant" value="Lobster-Two">Lobster Two</option>
                        <option class="Londrina-Outline" value="Londrina-Outline">Londrina Outline</option>
                        <option class="Londrina-Shadow" value="Londrina-Shadow">Londrina Shadow</option>
                        <option class="Londrina-Sketch" value="Londrina-Sketch">Londrina Sketch</option>
                        <option class="Londrina-Solid" value="Londrina-Solid">Londrina Solid</option>
                        <option class="Lora has-variant" value="Lora">Lora</option>
                        <option class="Love-Ya-Like-A-Sister" value="Love-Ya-Like-A-Sister">Love Ya Like A Sister</option>
                        <option class="Loved-by-the-King" value="Loved-by-the-King">Loved by the King</option>
                        <option class="Lovers-Quarrel has-subsets" value="Lovers-Quarrel">Lovers Quarrel</option>
                        <option class="Luckiest-Guy" value="Luckiest-Guy">Luckiest Guy</option>
                        <option class="Lusitana has-variant" value="Lusitana">Lusitana</option>
                        <option class="Lustria" value="Lustria">Lustria</option>
                        <option class="Macondo" value="Macondo">Macondo</option>
                        <option class="Macondo-Swash-Caps" value="Macondo-Swash-Caps">Macondo Swash Caps</option>
                        <option class="Magra has-variant has-subsets" value="Magra">Magra</option>
                        <option class="Maiden-Orange" value="Maiden-Orange">Maiden Orange</option>
                        <option class="Mako" value="Mako">Mako</option>
                        <option class="Marcellus has-subsets" value="Marcellus">Marcellus</option>
                        <option class="Marcellus-SC has-subsets" value="Marcellus-SC">Marcellus SC</option>
                        <option class="Marck-Script has-subsets" value="Marck-Script">Marck Script</option>
                        <option class="Margarine has-subsets" value="Margarine">Margarine</option>
                        <option class="Marko-One" value="Marko-One">Marko One</option>
                        <option class="Marmelad has-subsets" value="Marmelad">Marmelad</option>
                        <option class="Marvel has-variant" value="Marvel">Marvel</option>
                        <option class="Mate has-variant" value="Mate">Mate</option>
                        <option class="Mate-SC" value="Mate-SC">Mate SC</option>
                        <option class="Maven-Pro has-variant" value="Maven-Pro">Maven Pro</option>
                        <option class="McLaren has-subsets" value="McLaren">McLaren</option>
                        <option class="Meddon" value="Meddon">Meddon</option>
                        <option class="MedievalSharp has-subsets" value="MedievalSharp">MedievalSharp</option>
                        <option class="Medula-One" value="Medula-One">Medula One</option>
                        <option class="Megrim" value="Megrim">Megrim</option>
                        <option class="Meie-Script has-subsets" value="Meie-Script">Meie Script</option>
                        <option class="Merienda has-variant has-subsets" value="Merienda">Merienda</option>
                        <option class="Merienda-One" value="Merienda-One">Merienda One</option>
                        <option class="Merriweather has-variant" value="Merriweather">Merriweather</option>
                        <option class="Merriweather-Sans has-variant has-subsets" value="Merriweather-Sans">Merriweather Sans</option>
                        <option class="Metal" value="Metal">Metal</option>
                        <option class="Metal-Mania has-subsets" value="Metal-Mania">Metal Mania</option>
                        <option class="Metamorphous has-subsets" value="Metamorphous">Metamorphous</option>
                        <option class="Metrophobic" value="Metrophobic">Metrophobic</option>
                        <option class="Michroma" value="Michroma">Michroma</option>
                        <option class="Milonga has-subsets" value="Milonga">Milonga</option>
                        <option class="Miltonian" value="Miltonian">Miltonian</option>
                        <option class="Miltonian-Tattoo" value="Miltonian-Tattoo">Miltonian Tattoo</option>
                        <option class="Miniver" value="Miniver">Miniver</option>
                        <option class="Miss-Fajardose has-subsets" value="Miss-Fajardose">Miss Fajardose</option>
                        <option class="Modern-Antiqua has-subsets" value="Modern-Antiqua">Modern Antiqua</option>
                        <option class="Molengo has-subsets" value="Molengo">Molengo</option>
                        <option class="Molle has-subsets" value="Molle">Molle</option>
                        <option class="Monda has-variant has-subsets" value="Monda">Monda</option>
                        <option class="Monofett" value="Monofett">Monofett</option>
                        <option class="Monoton" value="Monoton">Monoton</option>
                        <option class="Monsieur-La-Doulaise has-subsets" value="Monsieur-La-Doulaise">Monsieur La Doulaise</option>
                        <option class="Montaga" value="Montaga">Montaga</option>
                        <option class="Montez" value="Montez">Montez</option>
                        <option class="Montserrat has-variant" value="Montserrat">Montserrat</option>
                        <option class="Montserrat-Alternates has-variant" value="Montserrat-Alternates">Montserrat Alternates</option>
                        <option class="Montserrat-Subrayada has-variant" value="Montserrat-Subrayada">Montserrat Subrayada</option>
                        <option class="Moul" value="Moul">Moul</option>
                        <option class="Moulpali" value="Moulpali">Moulpali</option>
                        <option class="Mountains-of-Christmas has-variant" value="Mountains-of-Christmas">Mountains of Christmas</option>
                        <option class="Mouse-Memoirs has-subsets" value="Mouse-Memoirs">Mouse Memoirs</option>
                        <option class="Mr-Bedfort has-subsets" value="Mr-Bedfort">Mr Bedfort</option>
                        <option class="Mr-Dafoe has-subsets" value="Mr-Dafoe">Mr Dafoe</option>
                        <option class="Mr-De-Haviland has-subsets" value="Mr-De-Haviland">Mr De Haviland</option>
                        <option class="Mrs-Saint-Delafield has-subsets" value="Mrs-Saint-Delafield">Mrs Saint Delafield</option>
                        <option class="Mrs-Sheppards has-subsets" value="Mrs-Sheppards">Mrs Sheppards</option>
                        <option class="Muli has-variant" value="Muli">Muli</option>
                        <option class="Mystery-Quest has-subsets" value="Mystery-Quest">Mystery Quest</option>
                        <option class="Neucha has-subsets" value="Neucha">Neucha</option>
                        <option class="Neuton has-variant has-subsets" value="Neuton">Neuton</option>
                        <option class="New-Rocker has-subsets" value="New-Rocker">New Rocker</option>
                        <option class="News-Cycle has-variant has-subsets" value="News-Cycle">News Cycle</option>
                        <option class="Niconne has-subsets" value="Niconne">Niconne</option>
                        <option class="Nixie-One" value="Nixie-One">Nixie One</option>
                        <option class="Nobile has-variant" value="Nobile">Nobile</option>
                        <option class="Nokora has-variant" value="Nokora">Nokora</option>
                        <option class="Norican has-subsets" value="Norican">Norican</option>
                        <option class="Nosifer has-subsets" value="Nosifer">Nosifer</option>
                        <option class="Nothing-You-Could-Do" value="Nothing-You-Could-Do">Nothing You Could Do</option>
                        <option class="Noticia-Text has-variant has-subsets" value="Noticia-Text">Noticia Text</option>
                        <option class="Nova-Cut" value="Nova-Cut">Nova Cut</option>
                        <option class="Nova-Flat" value="Nova-Flat">Nova Flat</option>
                        <option class="Nova-Mono has-subsets" value="Nova-Mono">Nova Mono</option>
                        <option class="Nova-Oval" value="Nova-Oval">Nova Oval</option>
                        <option class="Nova-Round" value="Nova-Round">Nova Round</option>
                        <option class="Nova-Script" value="Nova-Script">Nova Script</option>
                        <option class="Nova-Slim" value="Nova-Slim">Nova Slim</option>
                        <option class="Nova-Square" value="Nova-Square">Nova Square</option>
                        <option class="Numans" value="Numans">Numans</option>
                        <option class="Nunito has-variant" value="Nunito">Nunito</option>
                        <option class="Odor-Mean-Chey" value="Odor-Mean-Chey">Odor Mean Chey</option>
                        <option class="Offside" value="Offside">Offside</option>
                        <option class="Old-Standard-TT has-variant" value="Old-Standard-TT">Old Standard TT</option>
                        <option class="Oldenburg has-subsets" value="Oldenburg">Oldenburg</option>
                        <option class="Oleo-Script has-variant has-subsets" value="Oleo-Script">Oleo Script</option>
                        <option class="Oleo-Script-Swash-Caps has-variant has-subsets" value="Oleo-Script-Swash-Caps">Oleo Script Swash Caps</option>
                        <option class="Open-Sans has-variant has-subsets" value="Open-Sans">Open Sans</option>
                        <option class="Open-Sans-Condensed has-variant has-subsets" value="Open-Sans-Condensed">Open Sans Condensed</option>
                        <option class="Oranienbaum has-subsets" value="Oranienbaum">Oranienbaum</option>
                        <option class="Orbitron has-variant" value="Orbitron">Orbitron</option>
                        <option class="Oregano has-variant has-subsets" value="Oregano">Oregano</option>
                        <option class="Orienta has-subsets" value="Orienta">Orienta</option>
                        <option class="Original-Surfer" value="Original-Surfer">Original Surfer</option>
                        <option class="Oswald has-variant has-subsets" value="Oswald">Oswald</option>
                        <option class="Over-the-Rainbow" value="Over-the-Rainbow">Over the Rainbow</option>
                        <option class="Overlock has-variant has-subsets" value="Overlock">Overlock</option>
                        <option class="Overlock-SC has-subsets" value="Overlock-SC">Overlock SC</option>
                        <option class="Ovo" value="Ovo">Ovo</option>
                        <option class="Oxygen has-variant has-subsets" value="Oxygen">Oxygen</option>
                        <option class="Oxygen-Mono has-subsets" value="Oxygen-Mono">Oxygen Mono</option>
                        <option class="PT-Mono has-subsets" value="PT-Mono">PT Mono</option>
                        <option class="PT-Sans has-variant has-subsets" value="PT-Sans">PT Sans</option>
                        <option class="PT-Sans-Caption has-variant has-subsets" value="PT-Sans-Caption">PT Sans Caption</option>
                        <option class="PT-Sans-Narrow has-variant has-subsets" value="PT-Sans-Narrow">PT Sans Narrow</option>
                        <option class="PT-Serif has-variant has-subsets" value="PT-Serif">PT Serif</option>
                        <option class="PT-Serif-Caption has-variant has-subsets" value="PT-Serif-Caption">PT Serif Caption</option>
                        <option class="Pacifico" value="Pacifico">Pacifico</option>
                        <option class="Paprika" value="Paprika">Paprika</option>
                        <option class="Parisienne has-subsets" value="Parisienne">Parisienne</option>
                        <option class="Passero-One has-subsets" value="Passero-One">Passero One</option>
                        <option class="Passion-One has-variant has-subsets" value="Passion-One">Passion One</option>
                        <option class="Patrick-Hand has-subsets" value="Patrick-Hand">Patrick Hand</option>
                        <option class="Patrick-Hand-SC has-subsets" value="Patrick-Hand-SC">Patrick Hand SC</option>
                        <option class="Patua-One" value="Patua-One">Patua One</option>
                        <option class="Paytone-One" value="Paytone-One">Paytone One</option>
                        <option class="Peralta has-subsets" value="Peralta">Peralta</option>
                        <option class="Permanent-Marker" value="Permanent-Marker">Permanent Marker</option>
                        <option class="Petit-Formal-Script has-subsets" value="Petit-Formal-Script">Petit Formal Script</option>
                        <option class="Petrona" value="Petrona">Petrona</option>
                        <option class="Philosopher has-variant has-subsets" value="Philosopher">Philosopher</option>
                        <option class="Piedra has-subsets" value="Piedra">Piedra</option>
                        <option class="Pinyon-Script" value="Pinyon-Script">Pinyon Script</option>
                        <option class="Pirata-One has-subsets" value="Pirata-One">Pirata One</option>
                        <option class="Plaster has-subsets" value="Plaster">Plaster</option>
                        <option class="Play has-variant has-subsets" value="Play">Play</option>
                        <option class="Playball has-subsets" value="Playball">Playball</option>
                        <option class="Playfair-Display has-variant has-subsets" value="Playfair-Display">Playfair Display</option>
                        <option class="Playfair-Display-SC has-variant has-subsets" value="Playfair-Display-SC">Playfair Display SC</option>
                        <option class="Podkova has-variant" value="Podkova">Podkova</option>
                        <option class="Poiret-One has-subsets" value="Poiret-One">Poiret One</option>
                        <option class="Poller-One" value="Poller-One">Poller One</option>
                        <option class="Poly has-variant" value="Poly">Poly</option>
                        <option class="Pompiere" value="Pompiere">Pompiere</option>
                        <option class="Pontano-Sans has-subsets" value="Pontano-Sans">Pontano Sans</option>
                        <option class="Port-Lligat-Sans" value="Port-Lligat-Sans">Port Lligat Sans</option>
                        <option class="Port-Lligat-Slab" value="Port-Lligat-Slab">Port Lligat Slab</option>
                        <option class="Prata" value="Prata">Prata</option>
                        <option class="Preahvihear" value="Preahvihear">Preahvihear</option>
                        <option class="Press-Start-2P has-subsets" value="Press-Start-2P">Press Start 2P</option>
                        <option class="Princess-Sofia has-subsets" value="Princess-Sofia">Princess Sofia</option>
                        <option class="Prociono" value="Prociono">Prociono</option>
                        <option class="Prosto-One has-subsets" value="Prosto-One">Prosto One</option>
                        <option class="Puritan has-variant" value="Puritan">Puritan</option>
                        <option class="Purple-Purse has-subsets" value="Purple-Purse">Purple Purse</option>
                        <option class="Quando has-subsets" value="Quando">Quando</option>
                        <option class="Quantico has-variant" value="Quantico">Quantico</option>
                        <option class="Quattrocento has-variant has-subsets" value="Quattrocento">Quattrocento</option>
                        <option class="Quattrocento-Sans has-variant has-subsets" value="Quattrocento-Sans">Quattrocento Sans</option>
                        <option class="Questrial" value="Questrial">Questrial</option>
                        <option class="Quicksand has-variant" value="Quicksand">Quicksand</option>
                        <option class="Quintessential has-subsets" value="Quintessential">Quintessential</option>
                        <option class="Qwigley has-subsets" value="Qwigley">Qwigley</option>
                        <option class="Racing-Sans-One has-subsets" value="Racing-Sans-One">Racing Sans One</option>
                        <option class="Radley has-variant has-subsets" value="Radley">Radley</option>
                        <option class="Raleway has-variant" value="Raleway">Raleway</option>
                        <option class="Raleway-Dots has-subsets" value="Raleway-Dots">Raleway Dots</option>
                        <option class="Rambla has-variant has-subsets" value="Rambla">Rambla</option>
                        <option class="Rammetto-One has-subsets" value="Rammetto-One">Rammetto One</option>
                        <option class="Ranchers has-subsets" value="Ranchers">Ranchers</option>
                        <option class="Rancho" value="Rancho">Rancho</option>
                        <option class="Rationale" value="Rationale">Rationale</option>
                        <option class="Redressed" value="Redressed">Redressed</option>
                        <option class="Reenie-Beanie" value="Reenie-Beanie">Reenie Beanie</option>
                        <option class="Revalia has-subsets" value="Revalia">Revalia</option>
                        <option class="Ribeye has-subsets" value="Ribeye">Ribeye</option>
                        <option class="Ribeye-Marrow has-subsets" value="Ribeye-Marrow">Ribeye Marrow</option>
                        <option class="Righteous has-subsets" value="Righteous">Righteous</option>
                        <option class="Risque has-subsets" value="Risque">Risque</option>
                        <option class="Roboto has-variant has-subsets" value="Roboto">Roboto</option>
                        <option class="Roboto-Condensed has-variant has-subsets" value="Roboto-Condensed">Roboto Condensed</option>
                        <option class="Rochester" value="Rochester">Rochester</option>
                        <option class="Rock-Salt" value="Rock-Salt">Rock Salt</option>
                        <option class="Rokkitt has-variant" value="Rokkitt">Rokkitt</option>
                        <option class="Romanesco has-subsets" value="Romanesco">Romanesco</option>
                        <option class="Ropa-Sans has-variant has-subsets" value="Ropa-Sans">Ropa Sans</option>
                        <option class="Rosario has-variant" value="Rosario">Rosario</option>
                        <option class="Rosarivo has-variant has-subsets" value="Rosarivo">Rosarivo</option>
                        <option class="Rouge-Script" value="Rouge-Script">Rouge Script</option>
                        <option class="Ruda has-variant has-subsets" value="Ruda">Ruda</option>
                        <option class="Rufina has-variant has-subsets" value="Rufina">Rufina</option>
                        <option class="Ruge-Boogie has-subsets" value="Ruge-Boogie">Ruge Boogie</option>
                        <option class="Ruluko has-subsets" value="Ruluko">Ruluko</option>
                        <option class="Rum-Raisin has-subsets" value="Rum-Raisin">Rum Raisin</option>
                        <option class="Ruslan-Display has-subsets" value="Ruslan-Display">Ruslan Display</option>
                        <option class="Russo-One has-subsets" value="Russo-One">Russo One</option>
                        <option class="Ruthie has-subsets" value="Ruthie">Ruthie</option>
                        <option class="Rye has-subsets" value="Rye">Rye</option>
                        <option class="Sacramento has-subsets" value="Sacramento">Sacramento</option>
                        <option class="Sail" value="Sail">Sail</option>
                        <option class="Salsa" value="Salsa">Salsa</option>
                        <option class="Sanchez has-variant has-subsets" value="Sanchez">Sanchez</option>
                        <option class="Sancreek has-subsets" value="Sancreek">Sancreek</option>
                        <option class="Sansita-One" value="Sansita-One">Sansita One</option>
                        <option class="Sarina has-subsets" value="Sarina">Sarina</option>
                        <option class="Satisfy" value="Satisfy">Satisfy</option>
                        <option class="Scada has-variant has-subsets" value="Scada">Scada</option>
                        <option class="Schoolbell" value="Schoolbell">Schoolbell</option>
                        <option class="Seaweed-Script has-subsets" value="Seaweed-Script">Seaweed Script</option>
                        <option class="Sevillana has-subsets" value="Sevillana">Sevillana</option>
                        <option class="Seymour-One has-subsets" value="Seymour-One">Seymour One</option>
                        <option class="Shadows-Into-Light" value="Shadows-Into-Light">Shadows Into Light</option>
                        <option class="Shadows-Into-Light-Two has-subsets" value="Shadows-Into-Light-Two">Shadows Into Light Two</option>
                        <option class="Shanti" value="Shanti">Shanti</option>
                        <option class="Share has-variant has-subsets" value="Share">Share</option>
                        <option class="Share-Tech" value="Share-Tech">Share Tech</option>
                        <option class="Share-Tech-Mono" value="Share-Tech-Mono">Share Tech Mono</option>
                        <option class="Shojumaru has-subsets" value="Shojumaru">Shojumaru</option>
                        <option class="Short-Stack" value="Short-Stack">Short Stack</option>
                        <option class="Siemreap" value="Siemreap">Siemreap</option>
                        <option class="Sigmar-One" value="Sigmar-One">Sigmar One</option>
                        <option class="Signika has-variant has-subsets" value="Signika">Signika</option>
                        <option class="Signika-Negative has-variant has-subsets" value="Signika-Negative">Signika Negative</option>
                        <option class="Simonetta has-variant has-subsets" value="Simonetta">Simonetta</option>
                        <option class="Sintony has-variant has-subsets" value="Sintony">Sintony</option>
                        <option class="Sirin-Stencil" value="Sirin-Stencil">Sirin Stencil</option>
                        <option class="Six-Caps" value="Six-Caps">Six Caps</option>
                        <option class="Skranji has-variant has-subsets" value="Skranji">Skranji</option>
                        <option class="Slackey" value="Slackey">Slackey</option>
                        <option class="Smokum" value="Smokum">Smokum</option>
                        <option class="Smythe" value="Smythe">Smythe</option>
                        <option class="Sniglet" value="Sniglet">Sniglet</option>
                        <option class="Snippet" value="Snippet">Snippet</option>
                        <option class="Snowburst-One has-subsets" value="Snowburst-One">Snowburst One</option>
                        <option class="Sofadi-One" value="Sofadi-One">Sofadi One</option>
                        <option class="Sofia" value="Sofia">Sofia</option>
                        <option class="Sonsie-One has-subsets" value="Sonsie-One">Sonsie One</option>
                        <option class="Sorts-Mill-Goudy has-variant has-subsets" value="Sorts-Mill-Goudy">Sorts Mill Goudy</option>
                        <option class="Source-Code-Pro has-variant has-subsets" value="Source-Code-Pro">Source Code Pro</option>
                        <option class="Source-Sans-Pro has-variant has-subsets" value="Source-Sans-Pro">Source Sans Pro</option>
                        <option class="Special-Elite" value="Special-Elite">Special Elite</option>
                        <option class="Spicy-Rice" value="Spicy-Rice">Spicy Rice</option>
                        <option class="Spinnaker has-subsets" value="Spinnaker">Spinnaker</option>
                        <option class="Spirax" value="Spirax">Spirax</option>
                        <option class="Squada-One" value="Squada-One">Squada One</option>
                        <option class="Stalemate has-subsets" value="Stalemate">Stalemate</option>
                        <option class="Stalinist-One has-subsets" value="Stalinist-One">Stalinist One</option>
                        <option class="Stardos-Stencil has-variant" value="Stardos-Stencil">Stardos Stencil</option>
                        <option class="Stint-Ultra-Condensed has-subsets" value="Stint-Ultra-Condensed">Stint Ultra Condensed</option>
                        <option class="Stint-Ultra-Expanded has-subsets" value="Stint-Ultra-Expanded">Stint Ultra Expanded</option>
                        <option class="Stoke has-variant has-subsets" value="Stoke">Stoke</option>
                        <option class="Strait" value="Strait">Strait</option>
                        <option class="Sue-Ellen-Francisco" value="Sue-Ellen-Francisco">Sue Ellen Francisco</option>
                        <option class="Sunshiney" value="Sunshiney">Sunshiney</option>
                        <option class="Supermercado-One" value="Supermercado-One">Supermercado One</option>
                        <option class="Suwannaphum" value="Suwannaphum">Suwannaphum</option>
                        <option class="Swanky-and-Moo-Moo" value="Swanky-and-Moo-Moo">Swanky and Moo Moo</option>
                        <option class="Syncopate has-variant" value="Syncopate">Syncopate</option>
                        <option class="Tangerine has-variant" value="Tangerine">Tangerine</option>
                        <option class="Taprom" value="Taprom">Taprom</option>
                        <option class="Tauri has-subsets" value="Tauri">Tauri</option>
                        <option class="Telex" value="Telex">Telex</option>
                        <option class="Tenor-Sans has-subsets" value="Tenor-Sans">Tenor Sans</option>
                        <option class="Text-Me-One has-subsets" value="Text-Me-One">Text Me One</option>
                        <option class="The-Girl-Next-Door" value="The-Girl-Next-Door">The Girl Next Door</option>
                        <option class="Tienne has-variant" value="Tienne">Tienne</option>
                        <option class="Tinos has-variant" value="Tinos">Tinos</option>
                        <option class="Titan-One has-subsets" value="Titan-One">Titan One</option>
                        <option class="Titillium-Web has-variant has-subsets" value="Titillium-Web">Titillium Web</option>
                        <option class="Trade-Winds" value="Trade-Winds">Trade Winds</option>
                        <option class="Trocchi has-subsets" value="Trocchi">Trocchi</option>
                        <option class="Trochut has-variant" value="Trochut">Trochut</option>
                        <option class="Trykker has-subsets" value="Trykker">Trykker</option>
                        <option class="Tulpen-One" value="Tulpen-One">Tulpen One</option>
                        <option class="Ubuntu has-variant has-subsets" value="Ubuntu">Ubuntu</option>
                        <option class="Ubuntu-Condensed has-subsets" value="Ubuntu-Condensed">Ubuntu Condensed</option>
                        <option class="Ubuntu-Mono has-variant has-subsets" value="Ubuntu-Mono">Ubuntu Mono</option>
                        <option class="Ultra" value="Ultra">Ultra</option>
                        <option class="Uncial-Antiqua" value="Uncial-Antiqua">Uncial Antiqua</option>
                        <option class="Underdog has-subsets" value="Underdog">Underdog</option>
                        <option class="Unica-One has-subsets" value="Unica-One">Unica One</option>
                        <option class="UnifrakturCook" value="UnifrakturCook">UnifrakturCook</option>
                        <option class="UnifrakturMaguntia" value="UnifrakturMaguntia">UnifrakturMaguntia</option>
                        <option class="Unkempt has-variant" value="Unkempt">Unkempt</option>
                        <option class="Unlock" value="Unlock">Unlock</option>
                        <option class="Unna" value="Unna">Unna</option>
                        <option class="VT323" value="VT323">VT323</option>
                        <option class="Vampiro-One has-subsets" value="Vampiro-One">Vampiro One</option>
                        <option class="Varela has-subsets" value="Varela">Varela</option>
                        <option class="Varela-Round" value="Varela-Round">Varela Round</option>
                        <option class="Vast-Shadow" value="Vast-Shadow">Vast Shadow</option>
                        <option class="Vibur" value="Vibur">Vibur</option>
                        <option class="Vidaloka" value="Vidaloka">Vidaloka</option>
                        <option class="Viga has-subsets" value="Viga">Viga</option>
                        <option class="Voces has-subsets" value="Voces">Voces</option>
                        <option class="Volkhov has-variant" value="Volkhov">Volkhov</option>
                        <option class="Vollkorn has-variant" value="Vollkorn">Vollkorn</option>
                        <option class="Voltaire" value="Voltaire">Voltaire</option>
                        <option class="Waiting-for-the-Sunrise" value="Waiting-for-the-Sunrise">Waiting for the Sunrise</option>
                        <option class="Wallpoet" value="Wallpoet">Wallpoet</option>
                        <option class="Walter-Turncoat" value="Walter-Turncoat">Walter Turncoat</option>
                        <option class="Warnes has-subsets" value="Warnes">Warnes</option>
                        <option class="Wellfleet has-subsets" value="Wellfleet">Wellfleet</option>
                        <option class="Wendy-One has-subsets" value="Wendy-One">Wendy One</option>
                        <option class="Wire-One" value="Wire-One">Wire One</option>
                        <option class="Yanone-Kaffeesatz has-variant has-subsets" value="Yanone-Kaffeesatz">Yanone Kaffeesatz</option>
                        <option class="Yellowtail" value="Yellowtail">Yellowtail</option>
                        <option class="Yeseva-One has-subsets" value="Yeseva-One">Yeseva One</option>
                        <option class="Yesteryear" value="Yesteryear">Yesteryear</option>
                        <option class="Zeyada" value="Zeyada">Zeyada</option>
                    </select>
                    <div class="resultado-fonte" id="resultado4" style="font-size: 30px;">O CTA ficará com esta fonte...</div>
                </div>
            </div>

            <div class="form-group">
                <label for="css" class="col-sm-2 control-label">CSS Customizado</label>
                <div class="col-sm-10">
                    <textarea rows="5" name="css" class="form-control" id="css" placeholder="CSS Customizado"><?php echo stripslashes(get_option('css_squeeze_wp')); ?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="css" class="col-sm-2 control-label">Scripts (Google Analytics, por exemplo)</label>
                <div class="col-sm-10">
                    <textarea rows="5" name="scripts" class="form-control" id="scripts" placeholder="Scripts (Google Analytics, por exemplo)"><?php echo stripslashes(get_option('scripts_squeeze_wp')); ?></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10 buttons">
                    <button id="submit" type="submit" class="btn btn-primary">Salvar opções</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    jQuery('#fonte_titulo_1').find('option[value="<?php echo get_option('fonte_titulo_1_squeeze_wp'); ?>"]').attr('selected', true);
    jQuery('#fonte_titulo_2').find('option[value="<?php echo get_option('fonte_titulo_2_squeeze_wp'); ?>"]').attr('selected', true);
    jQuery('#fonte_texto').find('option[value="<?php echo get_option('fonte_texto_squeeze_wp'); ?>"]').attr('selected', true);
    jQuery('#fonte_cta').find('option[value="<?php echo get_option('fonte_cta_squeeze_wp'); ?>"]').attr('selected', true);
    
            var str = jQuery('#fonte_titulo_1').val();
            var result = str.replace("-", " ");
            jQuery('head').append(jQuery('<link rel="stylesheet" type="text/css" />').attr('href', 'http://fonts.googleapis.com/css?family=' + result));
            jQuery('#resultado1').css('font-family', result);

            var str = jQuery('#fonte_titulo_2').val();
            var result = str.replace("-", " ");
            jQuery('head').append(jQuery('<link rel="stylesheet" type="text/css" />').attr('href', 'http://fonts.googleapis.com/css?family=' + result));
            jQuery('#resultado2').css('font-family', result);

            var str = jQuery('#fonte_texto').val();
            var result = str.replace("-", " ");
            jQuery('head').append(jQuery('<link rel="stylesheet" type="text/css" />').attr('href', 'http://fonts.googleapis.com/css?family=' + result));
            jQuery('#resultado3').css('font-family', result);

            var str = jQuery('#fonte_cta').val();
            var result = str.replace("-", " ");
            jQuery('head').append(jQuery('<link rel="stylesheet" type="text/css" />').attr('href', 'http://fonts.googleapis.com/css?family=' + result));
            jQuery('#resultado4').css('font-family', result);
    
    
    jQuery(document).ready(function() {
        jQuery("#fonte_titulo_1").change(function() {
            var str = jQuery('#fonte_titulo_1').val();
            var result = str.replace("-", " ");
            jQuery('head').append(jQuery('<link rel="stylesheet" type="text/css" />').attr('href', 'http://fonts.googleapis.com/css?family=' + result));
            jQuery('#resultado1').css('font-family', result);
        });

        jQuery("#fonte_titulo_2").change(function() {
            var str = jQuery('#fonte_titulo_2').val();
            var result = str.replace("-", " ");
            jQuery('head').append(jQuery('<link rel="stylesheet" type="text/css" />').attr('href', 'http://fonts.googleapis.com/css?family=' + result));
            jQuery('#resultado2').css('font-family', result);
        });

        jQuery("#fonte_texto").change(function() {
            var str = jQuery('#fonte_texto').val();
            var result = str.replace("-", " ");
            jQuery('head').append(jQuery('<link rel="stylesheet" type="text/css" />').attr('href', 'http://fonts.googleapis.com/css?family=' + result));
            jQuery('#resultado3').css('font-family', result);
        });

        jQuery("#fonte_cta").change(function() {
            var str = jQuery('#fonte_cta').val();
            var result = str.replace("-", " ");
            jQuery('head').append(jQuery('<link rel="stylesheet" type="text/css" />').attr('href', 'http://fonts.googleapis.com/css?family=' + result));
            jQuery('#resultado4').css('font-family', result);
        });
    });

</script>

