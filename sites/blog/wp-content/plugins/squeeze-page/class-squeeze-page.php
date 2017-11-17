<?php

class SqueezeWP {

    protected $plugin_slug;
    private static $instance;
    protected $templates;

    public static function get_instance() {

        if (null == self::$instance) {
            self::$instance = new SqueezeWP();
        } // end if

        return self::$instance;
    }

    private function __construct() {
        $this->templates = array();

        $this->pages_captura_only = array('sp-video-1.php', 'sp-padrao-1.php', 'sp-ebook-1.php', 'sp-ebook-2.php',
            'sp-back-animado-1.php', 'sp-back-animado-2.php', 'sp-video-background-1.php', 'sp-padrao-2.php');

        $this->pages_captura_only_names = array('Página de Captura com Vídeo I', 'Página com Background Fixo I', 'Página de Captura com E-book I', 'Página de Captura com E-book II',
            'Página com Background Animado I', 'Página com Background Animado II', 'Página com Vídeo em Background I', 'Página com Background II (Apenas Link)');

        $this->pages_captura = array_merge($this->pages_captura_only, array('registro-webinario-1.php', 'congresso-palestrantes-1.php', 'congresso-palestrantes-2.php'));


        $this->pages_download = array('page-download-1.php', 'page-download-2.php');
        $this->pages_download_names = array('Página de Download I', 'Pagina de Download II');

        $this->pages_confirmacao = array('confirme-inscricao-1.php', 'confirme-inscricao-2.php');
        $this->pages_confirmacao_names = array('Confirmação de Inscrição I', 'Confirmação de Inscrição II');

        $this->pages_webinario = array('registro-webinario-1.php', 'webinario-1.php');
        $this->pages_webinario_names = array('Página de Registro em Webinário I', 'Página de Entrega de Webinário I');

        $this->pages_conversao = array_merge($this->pages_download, $this->pages_confirmacao, array('lp-vendas-video-1.php', 'page-conversao-externa.php',
            'page-entrega-video-1.php', 'page-agradecimento-1.php'));

        $this->pages_outras_paginas = array('lp-vendas-video-1.php', 'page-conversao-externa.php', 'page-entrega-video-1.php', 
            'page-agradecimento-1.php', 'pagina-texto-1.php', 'congresso-palestrantes-1.php', 'congresso-palestrantes-2.php',
            'politicas.php', 'page-iframe.php');
        
        $this->pages_outras_paginas_names = array('Página de Vendas com Vídeo I', 'Página de Conversão Externa',
            'Página de Entrega de Recompensa em Vídeo I', 'Página de Agradecimento I', 'Página em Texto I', 
            'Palestrantes - Congresso I', 'Palestrantes - Congresso II', 'Políticas', 'Página Incorporada - IFrame');


        $this->pages_outras = array('webinario-1.php', 'funil-1.php', 'pagina-texto-1.php', 'politicas.php', 'page-iframe.php');
        $this->template_pages = array_merge($this->pages_conversao, $this->pages_captura, $this->pages_outras);

        $this->plugin_locale = 'squeezewp';
        // Grab the translations for the plugin
        add_action('init', array($this, 'load_plugin_textdomain'));

        if (function_exists('simple_fields_get_post_value'))
            add_action('admin_init', array($this, 'importar_simple_fields'));

        // Add a filter to the page attributes metabox to inject our template into the page template cache.
        add_filter('page_attributes_dropdown_pages_args', array($this, 'register_project_templates'));

        // Add a filter to the save post in order to inject out template into the page cache
        add_filter('wp_insert_post_data', array($this, 'register_project_templates'));
        // Add a filter to the template include in order to determine if the page has our template assigned and return it's path
        add_action('template_redirect', array($this, 'view_project_template'));
        add_filter('template_include', array($this, 'view_project_template'), 99);
        //register_activation_hook(__FILE__, array($this, 'importar_simple_fields'));
        // Register hooks that are fired when the plugin is activated, deactivated, and uninstalled, respectively.
        register_deactivation_hook(__FILE__, array($this, 'deactivate'));

        // Add your templates to this array.
        $this->templates = array(
            'sp-video-1.php' => __('Squeeze Vídeo I', $this->plugin_slug),
            'sp-padrao-1.php' => __('Squeeze Padrão I', $this->plugin_slug),
            'sp-ebook-1.php' => __('Squeeze E-book I', $this->plugin_slug),
            'sp-back-animado-1.php' => __('Squeeze Background Animado I', $this->plugin_slug),
            'confirme-inscricao-1.php' => __('Página de Confirmação I', $this->plugin_slug),
            'page-download-1.php' => __('Página de Download I', $this->plugin_slug),
        );

        require_once('inc/option.php');
        $option = squeezewp_verifica_dominio();
        $funcao = squeezewp_verifica_funcao(2);
        if (($option && $funcao)) {
            $premium = array(
                'sp-ebook-2.php' => __('Squeeze E-book II', $this->plugin_slug),
                'sp-video-background-1.php' => __('Squeeze Vídeo Background I', $this->plugin_slug),
                'confirme-inscricao-2.php' => __('Página de Confirmação II', $this->plugin_slug),
                'page-download-2.php' => __('Página de Download II', $this->plugin_slug),
                'sp-back-animado-2.php' => __('Squeeze Background Animado com ModalDialog', $this->plugin_slug),
                'lp-vendas-video-1.php' => __('Página de Vendas - Video I', $this->plugin_slug),
                'registro-webinario-1.php' => __('Página de Cadastro em Webinário I', $this->plugin_slug),
                'webinario-1.php' => __('Página de Webinário I', $this->plugin_slug),
                'page-conversao-externa.php' => __('Página de Conversão Externa', $this->plugin_slug),
                'page-entrega-video-1.php' => __('Página de Entrega de Recompensa em Vídeo I', $this->plugin_slug),
                'sp-padrao-2.php' => __('Squeeze Padrão II', $this->plugin_slug),
                'page-agradecimento-1.php' => __('Página de Agradecimento I', $this->plugin_slug),
                'funil-1.php' => __('Funil de Lançamento I', $this->plugin_slug),
                'pagina-texto-1.php' => __('Página em Texto I', $this->plugin_slug),
                'congresso-palestrantes-1.php' => __('Página de Palestrantes I', $this->plugin_slug),
                'congresso-palestrantes-2.php' => __('Página de Palestrantes II', $this->plugin_slug),
                'politicas.php' => __('Políticas', $this->plugin_slug),
                'page-iframe.php' => __('Página Incorporada - IFrame', $this->plugin_slug)
            );
            $this->templates = array_merge($this->templates, $premium);
        }

        // adding support for theme templates to be merged and shown in dropdown
        $templates = wp_get_theme()->get_page_templates();
        $templates = array_merge($templates, $this->templates);
        add_action('admin_footer', array($this, 'functions_js'));

        add_filter('tiny_mce_before_init', array($this, 'tiny_mce_before_init'));
        add_filter('mce_buttons_2', array($this, 'mce_buttons_2'));
        add_filter('mce_css', array($this, 'squeezewp_add_editor_style'));
        //add_action('wp_enqueue_scripts', array($this, 'enqueue_custom_styles'));
    }

// end constructor

    /**
     * Load the plugin text domain for translation.
     *
     * @since    1.0.0
     */
    public function load_plugin_textdomain() {

        $domain = $this->plugin_slug;
        $locale = apply_filters('plugin_locale', get_locale(), $domain);

        load_textdomain($domain, trailingslashit(WP_LANG_DIR) . $domain . '/' . $domain . '-' . $locale . '.mo');
        //load_textdomain( 'tgmpa',   dirname( __FILE__ ) . '/languages/tgmpa-pt_BR.mo');
        load_plugin_textdomain('tgmpa', FALSE, basename(dirname(__FILE__)) . '/languages/');
    }

// end load_plugin_textdomain

    /**
     * Adds our template to the pages cache in order to trick WordPress
     * into thinking the template file exists where it doens't really exist.
     *
     * @param   array    $atts    The attributes for the page attributes dropdown
     * @return  array    $atts    The attributes for the page attributes dropdown
     * @verison	1.0.0
     * @since	1.0.0
     */
    public function register_project_templates($atts) {

        // Create the key used for the themes cache
        $cache_key = 'page_templates-' . md5(get_theme_root() . '/' . get_stylesheet());

        // Retrieve the cache list. If it doesn't exist, or it's empty prepare an array
        $templates = wp_cache_get($cache_key, 'themes');
        if (empty($templates)) {
            $templates = array();
        } // end if
        // Since we've updated the cache, we need to delete the old cache
        wp_cache_delete($cache_key, 'themes');

        // Now add our template to the list of templates by merging our templates
        // with the existing templates array from the cache.
        $templates = array_merge($templates, $this->templates);

        // Add the modified cache to allow WordPress to pick it up for listing
        // available templates
        wp_cache_add($cache_key, $templates, 'themes', 1800);

        return $atts;
    }

// end register_project_templates

    /**
     * Checks if the template is assigned to the page
     *
     * @version	1.0.0
     * @since	1.0.0
     */
    public function view_project_template($template) {
        global $post;

        if (!isset($this->templates[get_post_meta($post->ID, '_wp_page_template', true)])) {
            return $template;
        } // end if

        $file = plugin_dir_path(__FILE__) . 'templates/' . get_post_meta($post->ID, '_wp_page_template', true);
        // Just to be safe, we check if the file exist first
        if (file_exists($file)) {
            return $file;
        } // end if
        return $template;
    }

// end view_project_template

    /* --------------------------------------------*
     * deactivate the plugin
     * --------------------------------------------- */

    static function deactivate($network_wide) {
        foreach ($this as $value) {
            page - template - example::delete_template($value);
        }
    }

// end deactivate

    /* --------------------------------------------*
     * Delete Templates from Theme
     * --------------------------------------------- */

    public function delete_template($filename) {
        $theme_path = get_template_directory();
        $template_path = $theme_path . '/' . $filename;
        if (file_exists($template_path)) {
            unlink($template_path);
        }

        // we should probably delete the old cache
        wp_cache_delete($cache_key, 'themes');
    }

    /**
     * Retrieves and returns the slug of this plugin. This function should be called on an instance
     * of the plugin outside of this class.
     *
     * @return  string    The plugin's slug used in the locale.
     * @version	1.0.0
     * @since	1.0.0
     */
    public function get_locale() {
        return $this->plugin_slug;
    }

// end get_locale

    static function db_install() {
        global $wpdb;
        global $db_version;
        $db_version = '1.2';

        $table_name = $wpdb->prefix . 'teste_ab';

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

        $sql = "CREATE TABLE if not exists " . $table_name . " (
				id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				nome VARCHAR(250) NOT NULL DEFAULT '',
				status VARCHAR(25) NOT NULL DEFAULT '',
				pagina_original_id INT NOT NULL DEFAULT 0,
				pagina_original_url VARCHAR(500) NOT NULL DEFAULT 0,
				pagina_original_visitantes INT NOT NULL DEFAULT 0,
				variacao_1_id INT NOT NULL DEFAULT 0,
				variacao_1_url VARCHAR(500) NOT NULL DEFAULT 0,
				variacao_1_visitantes INT NOT NULL DEFAULT 0,
				variacao_2_id INT NOT NULL DEFAULT 0,
				variacao_2_url VARCHAR(500) NOT NULL DEFAULT 0,
				variacao_2_visitantes INT NOT NULL DEFAULT 0,
                                variacao_3_id INT NOT NULL DEFAULT 0, 
                                variacao_3_url varchar(90), 
                                variacao_3_visitantes INT NOT NULL DEFAULT 0,
                                variacao_4_id INT NOT NULL DEFAULT 0, 
                                variacao_4_url varchar(90), 
                                variacao_4_visitantes INT NOT NULL DEFAULT 0,
                                variacao_5_id INT NOT NULL DEFAULT 0, 
                                variacao_5_url varchar(90), 
                                variacao_5_visitantes INT NOT NULL DEFAULT 0,
				pagina_conversao_id INT NOT NULL DEFAULT 0,
				pagina_conversao_url VARCHAR(500) NOT NULL DEFAULT 0,
				conversao_from_original INT NOT NULL DEFAULT 0,
				conversao_from_1 INT NOT NULL DEFAULT 0,
				conversao_from_2 INT NOT NULL DEFAULT 0,
                                conversao_from_3 INT NOT NULL DEFAULT 0,
				conversao_from_4 INT NOT NULL DEFAULT 0,
                                conversao_from_5 INT NOT NULL DEFAULT 0,
				total_visitantes INT NOT NULL DEFAULT 0,
				parar_teste INT NOT NULL DEFAULT 0,
				qtde_testes INT NOT NULL DEFAULT 0,
				data_criacao DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
                                trafego int NULL,
                                porcentagem int NULL,
                                trafego_total int NULL
		);";

        dbDelta($sql);

        update_option('db_version_squeeze', $db_version);
    }

    //

    public function get_classbotao($cor_botao) {
        switch ($cor_botao) {
            case 'Verde': $class_botao = 'btn-success';
                break;

            case 'Azul Escuro': $class_botao = 'btn-primary';
                break;

            case 'Azul': $class_botao = 'btn-info';
                break;

            case 'Laranja': $class_botao = 'btn-warning';
                break;

            case 'Vermelho': $class_botao = 'btn-danger';
                break;
            default: $class_botao = 'btn-success';
        }
        return $class_botao;
    }

    function setar_variavel(&$val, $default = null) {
        if (isset($val))
            $tmp = $val;
        else
            $tmp = $default;
        return $tmp;
    }

    function extrair_atributo($field, $attrib) {
        $value = '';
        /*
          $remove    = array($attrib . '=', '"', "'", "/>");
          $field     = str_replace("'", "\"", $field);
          $pos       = strpos($field, $attrib . "=");
          $filter    = substr_replace($field, "", 0, $pos);
          $pos2      = strpos($filter, " ");
          $pos2      = ( $pos2 != '' ) ? $pos2 : strpos($filter, ">");
          $attribute = substr_replace($filter, "", $pos2, 1000);
          $attribute = str_replace( $remove, '', $attribute );
         */

        $pattern = ( $attrib == 'name' ) ? '/<input\s[^>]*name=[\'"]([^\'"]+)[\'"]/i' : '/<input\s[^>]*value=[\'"]([^\'"]+)[\'"]/i';

        preg_match($pattern, stripslashes($field), $matches);

        $value = (!isset($matches[1]) ) ? '' : $matches[1];
        return $value;
    }

    function extrair_campos($code, $email_label) {
        if ($code == '')
            return false;

        $code = html_entity_decode(stripslashes($code));
        if (!preg_match('/<form\s[^>]*action=[\'"]([^\'"]+)[\'"]/i', $code, $form)) {
            if (stristr($code, 'iframe') && function_exists('file_get_contents')) {
                preg_match('/<iframe\s[^>]*src=[\'"]([^\'"]+)[\'"]/i', $code, $matches);
                if (isset($matches[1])) {
                    $iframe_url = html_entity_decode(urldecode($matches[1]));
                    $content = @file_get_contents($iframe_url);

                    if (!empty($content))
                        $code = $content;
                }
            }

            if (stristr($code, '<script') && function_exists('file_get_contents')) {
                preg_match('/<script\s[^>]*src=[\'"]([^\'"]+)[\'"]/i', $code, $matches);
                if (isset($matches[1])) {
                    $js_url = html_entity_decode(urldecode($matches[1]));
                    $content = @file_get_contents($js_url);
                    if (!empty($content) && stristr($content, 'document.write')) {
                        $code = stripslashes($content);
                    }
                }
            }
        }

        // GR filter
        preg_match_all('/<li\s[^>]*style=([\"\']??)([^\" >]*?)\\1[^>]*>(.*)<\/li>/siU', $code, $gr);
        if (is_array($gr[0]) && count($gr[0]) > 0) {
            foreach ($gr[0] as $c) {
                if (stristr($c, 'wf-name') && stristr($c, 'none')) {
                    $code = str_replace($c, '', $code);
                }
            }
        }

        preg_match('/<form\s[^>]*action=[\'"]([^\'"]+)[\'"]/i', $code, $form);
        preg_match('/<form\s[^>]*target=[\'"]([^\'"]+)[\'"]/i', $code, $target);
        preg_match_all('/<input\s[^>]*type=[\'"]?hidden[^>]*>/i', $code, $hiddens);
        preg_match_all('/<input\s[^>]*type=([\'"])?(text|email)[^>]*>/i', $code, $texts);


        // Text fields
        $fields = '';
        if (!empty($texts[0])) {
            foreach ($texts[0] as $text) {
                preg_match_all('/<input\s[^>]*style=[\'"]([^\'"]+)[\'"]/i', $text, $styles);
                if (isset($styles[1][0])) {
                    if (stristr($styles[1][0], 'display:none'))
                        continue;
                    if (stristr($styles[1][0], 'display: none'))
                        continue;
                }

                if (strpos($text, 'tabindex="-1"') > 0)
                    continue;
                $name = $this->extrair_atributo($text, 'name');
                //var_dump($name);
                if (!is_array($fields))
                    $fields = array();

                $fields[$name] = ( stristr($name, 'mail') || stristr($name, 'from') ) ? $email_label : $name_label;
            }
        }

        // Hidden fields
        $values = '';
        if (!empty($hiddens[0])) {
            foreach ($hiddens[0] as $hidden) {
                $name = $this->extrair_atributo($hidden, 'name');
                $value = $this->extrair_atributo($hidden, 'value');

                if (!is_array($values))
                    $values = array();

                $values[$name] = $value;
            }
        }

        // Additional hidden fields
        if (!empty($texts[0])) {
            foreach ($texts[0] as $text) {
                preg_match_all('/<input\s[^>]*style=[\'"]([^\'"]+)[\'"]/i', $text, $styles);
                if (isset($styles[1][0])) {
                    if (stristr($styles[1][0], 'display:none') || stristr($styles[1][0], 'display: none')) {
                        $name = $this->extrair_atributo($text, 'name');
                        $value = $this->extrair_atributo($text, 'value');

                        if (!is_array($values))
                            $values = array();

                        $values[$name] = $value;
                    }
                }
            }
        }

        $post_data['action'] = $this->setar_variavel($form[1]);
        $post_data['target'] = $this->setar_variavel($target[1]);
        $post_data['fields'] = $fields;
        $post_data['hiddens'] = $values;

        return $post_data;
    }

    function criar_formulario($optin, $botao, $class_botao, $exibir_campos, $rotulos, $text_privacidade = '', $modal = false, $text_form, $icons = null) {
        require_once(plugin_dir_path(__FILE__) . 'inc/animate.php');
        if ($optin == '')
            return '';
        $target = ( strtolower($this->setar_variavel($optin['target'])) == '_blank' ) ? ' target="_blank"' : '';
        $cont = 0;
        $html = '';
        if ($modal == false)
            $html .= '<form id="form" method="post" action="' . $this->setar_variavel($optin['action']) . '"' . $target . '>' . "\n";

        if (isset($optin['fields']) && is_array($optin['fields']) && count($optin['fields']) > 0 && $modal == false) {
            foreach ($optin['fields'] as $k => $v) {
                //$field_id = ( stristr( $k, 'mail') || stristr( $k, 'from') ) ? 'opl_email' : 'opl_name';

                if (stristr($k, 'mail') || stristr($k, 'from')) {
                    $field_class = 'email';
                    $field_type = 'email';
                    $html .= '<div class="text-box ' . $field_class . '"><input type="' . $field_type . '" name="' . $k . '" value="" id="" class="' . $field_class . '" required="required" placeholder="' . stripslashes($v) . '" /><i class="icon-mail fa fa-envelope"></i></div>' . "\n";
                } else {
                    if ($exibir_campos == 1) {
                        $field_class = 'text';
                        $field_type = 'text';
                        $html .= '<div class="text-box ' . $field_class . '"><input type="' . $field_type . '" name="' . $k . '" value="" id="" class="' . $field_class . '" placeholder="' . stripslashes($rotulos[$cont]) . '" /><i class="icon-mail fa ' . $icons[$cont] . ' "></i></div>' . "\n";
                        $cont++;
                    }
                }
            }
        }

        if (isset($optin['hiddens']) && is_array($optin['hiddens']) && count($optin['hiddens']) > 0) {
            foreach ($optin['hiddens'] as $k => $v) {
                $html .= '<input type="hidden" name="' . $k . '" value="' . $v . '" />' . "\n";
            }
        }

        if ($modal)
            $html .= '<button type="submit" class="' . squeezewp_get_animacao('animated pulse', false) . ' btn ' . $class_botao . '" data-toggle="modal" data-target="#myModal">
									<span class="text">' . $botao . ' <i class="fa fa-mail-forward"></i></span>
								</button>';
        else
            $html .= '<button type="submit" class="' . squeezewp_get_animacao('animated pulse', false) . ' btn ' . $class_botao . '">
									<span class="text">' . $botao . ' <i class="fa fa-mail-forward"></i></span>
								</button>';

        $html .= '</form>';
        if (($modal == false) && ($text_privacidade <> ''))
            $html .= '<p class="privacy"><i class="fa fa-lock"></i> ' . $text_privacidade . '</p>';
        return $html;
    }

    public function criar_form_modal($optin, $botao, $class_botao, $exibir_campos, $rotulos, $text_privacidade, $text_form, $icons, $botao_cta_modal, $codigo_embed) {
        ?>
        <!-- Modal -->
        <?php require_once('inc/animate.php'); ?>
        <?php if ($botao_cta_modal <> '') $botao = $botao_cta_modal ?>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="<?php squeezewp_get_animacao('animated flipInX', true); ?> modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="head-form">
                            <div class="col-md-12"><?php echo $codigo_embed; ?></div>
                            <?php echo $text_form; ?>
                        </div>
                        <?php echo $this->criar_formulario($optin, $botao, $class_botao, $exibir_campos, $rotulos, $text_privacidade, false, false, $icons); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    public function get_posicao($posicao) {
        switch ($posicao) {
            case 'Centro': $class_posicao = 'col-md-offset-3';
                break;

            case 'Esquerda': $class_posicao = '';
                break;

            case 'Direita': $class_posicao = 'col-md-offset-6';
                break;
        }
        return $class_posicao;
    }

    function retorna_mes($MES) {
        switch ($MES) {
            case 1 : $MES = 'Janeiro';
                break;
            case 2 : $MES = 'Fevereiro';
                break;
            case 3 : $MES = 'Março';
                break;
            case 4 : $MES = 'Abril';
                break;
            case 5 : $MES = 'Maio';
                break;
            case 6 : $MES = 'Junho';
                break;
            case 7 : $MES = 'Julho';
                break;
            case 8 : $MES = 'Agosto';
                break;
            case 9 : $MES = 'Setembro';
                break;
            case 10 : $MES = 'Outubro';
                break;
            case 11 : $MES = 'Novembro';
                break;
            case 12 : $MES = 'Dezembro';
                break;
        }
        return $MES;
    }

    function get_image($back){
        $back = wp_get_attachment_image_src($back, 'full');
        return $back[0];
    }

    function importar_simple_fields() {
        $pages = get_pages();
        $templates = array('sp-video-1.php', 'sp-padrao-1.php', 'sp-ebook-1.php', 'sp-ebook-2.php', 'sp-back-animado-1.php', 'sp-back-animado-2.php', 'confirme-inscricao-1.php', 'confirme-inscricao-2.php', 'page-download-1.php', 'page-download-2.php', 'lp-vendas-video-1.php', 'sp-video-background.php');
        $backup = '';

        function importar_form($id, $form, $placeholder, $exibir_campos, $rotulo_1, $rotulo_2, $rotulo_3, $text_form, $text_privacidade, $botao, $cor_botao) {
            update_post_meta($id, 'optin', $form);
            update_post_meta($id, 'placeholder_email', $placeholder);
            update_post_meta($id, 'exibir_campos', $exibir_campos);
            update_post_meta($id, 'rotulo_1', $rotulo_1);
            update_post_meta($id, 'rotulo_2', $rotulo_2);
            update_post_meta($id, 'rotulo_3', $rotulo_3);
            update_post_meta($id, 'texto_form', $text_form);
            update_post_meta($id, 'texto_privacidade', $text_privacidade);
            update_post_meta($id, 'texto_cta', $botao);
            update_post_meta($id, 'cor_cta', $cor_botao);
        }

        function importar_redes($id, $exibir_facebook, $exibir_plus, $exibir_youtube, $exibir_twitter) {
            update_post_meta($id, 'exibir_facebook', $exibir_facebook);
            update_post_meta($id, 'exibir_plus', $exibir_plus);
            update_post_meta($id, 'exibir_youtube', $exibir_youtube);
            update_post_meta($id, 'exibir_twitter', $exibir_twitter);
        }

        function importar_contador($id, $exibir, $titulo_contador, $data_oferta) {
            update_post_meta($id, 'exibir_contador', $exibir);
            update_post_meta($id, 'titulo_contador', $titulo_contador);
            update_post_meta($id, 'data_contador', $data_oferta);
        }

        foreach ($pages as $p) {
            $template_name = get_post_meta($p->ID, '_wp_page_template', true);


            if (in_array($template_name, $templates)) {

                if (get_post_meta($p->ID, '_simple_fields_selected_connector', true) <> '9999' && get_post_meta($p->ID, '_simple_fields_selected_connector', true) <> '__none__') {
                    //padrão
                    $back = simple_fields_get_post_value($p->ID, "Background", true);
                    $headline = simple_fields_get_post_value($p->ID, "Headline", true);
                    $subheadline = simple_fields_get_post_value($p->ID, "Subheadline", true);

                    //optin
                    $posicao = simple_fields_get_post_value($p->ID, "Posição do Formulário", true);
                    $form = simple_fields_get_post_value($p->ID, "Form", true);
                    $placeholder = simple_fields_get_post_value($p->ID, "Rótulo do E-mail", true);
                    $exibir_campos = simple_fields_get_post_value($p->ID, "Exibir campos além do e-mail?", true);
                    $rotulo_1 = simple_fields_get_post_value($p->ID, "Rótulo Campo 1", true);
                    $rotulo_2 = simple_fields_get_post_value($p->ID, "Rótulo Campo 2", true);
                    $rotulo_3 = simple_fields_get_post_value($p->ID, "Rótulo Campo 3", true);
                    $text_form = simple_fields_get_post_value($p->ID, "Texto Acima do Formulário", true);
                    $botao = simple_fields_get_post_value($p->ID, "Texto do Botão (CTA)", true);
                    $cor_botao = simple_fields_get_post_value($p->ID, "Cor do botão (CTA)", true);
                    $text_privacidade = simple_fields_get_post_value($p->ID, "Texto de privacidade", true);


                    //ebook-1
                    $ebook = simple_fields_get_post_value($p->ID, "Imagem do E-book", true);
                    $titulo_descritivo = simple_fields_get_post_value($p->ID, "Título do texto descritivo", true);
                    $texto_descritivo = simple_fields_get_post_value($p->ID, "Texto descritivo", true);
                    $lista_beneficios = simple_fields_get_post_value($p->ID, "Lista de benefícios", true);


                    //video-1
                    $urlvideo = simple_fields_get_post_value($p->ID, "URL do Vídeo", true);

                    //back-animado
                    $back2 = simple_fields_get_post_value($p->ID, "Background 2", true);
                    $back3 = simple_fields_get_post_value($p->ID, "Background 3", true);



                    //confirmacao
                    $titulo1 = simple_fields_get_post_value($p->ID, "Título - Passo 1", true);
                    $texto1 = simple_fields_get_post_value($p->ID, "Texto - Passo 1", true);

                    $titulo2 = simple_fields_get_post_value($p->ID, "Título - Passo 2", true);
                    $texto2 = simple_fields_get_post_value($p->ID, "Texto - Passo 2", true);

                    $titulo3 = simple_fields_get_post_value($p->ID, "Título - Passo 3", true);
                    $texto3 = simple_fields_get_post_value($p->ID, "Texto - Passo 3", true);

                    $titulo4 = simple_fields_get_post_value($p->ID, "Título - Passo 4", true);
                    $texto4 = simple_fields_get_post_value($p->ID, "Texto - Passo 4", true);


                    //pagina-download
                    $link = simple_fields_get_post_value($p->ID, "Link do Ebook", true);
                    $url_confirmacao = simple_fields_get_post_value($p->ID, "Proteção de recompensa", true);
                    $url_redirecionamento = simple_fields_get_post_value($p->ID, "URL de redirecionamento", true);

                    //lp-vendas
                    $tempo = simple_fields_get_post_value($p->ID, "Tempo para aparecer o botão", true);

                    //redes-sociais
                    $exibir_facebook = simple_fields_get_post_value($p->ID, "Exibir botão para curtir a página no Facebook?", true);
                    $exibir_plus = simple_fields_get_post_value($p->ID, "Exibir botão para adicionar aos círculos do Google+?", true);
                    $exibir_youtube = simple_fields_get_post_value($p->ID, "Exibir botão de inscrição no canal do Youtube?", true);
                    $exibir_twitter = simple_fields_get_post_value($p->ID, "Exibir botão para seguir no twitter?", true);

                    //animar
                    $animar = simple_fields_get_post_value($p->ID, "Usar animações?", true);

                    //contador
                    $exibir = simple_fields_get_post_value($p->ID, "Exibir contador regressivo?", true);
                    $titulo_contador = simple_fields_get_post_value($p->ID, "Título do Contador", true);
                    $data_oferta = simple_fields_get_post_value($p->ID, "Data de expiração da oferta", true);
                    $data_oferta = get_post_meta($id, 'data_contador', true);
                    $data_oferta = str_replace('/', '-', $data_oferta);
                    $date = new DateTime($data_oferta);
                    $data_oferta = $date->format('d/m/Y H:i');

                    $backup .= $p->ID . ':|' . $back . ':|' . $headline . ':|' . $subheadline . ':|' . $posicao . ':|';
                    $backup .= $form . ':|' . $placeholder . ':|' . $exibir_campos . ':|' . $rotulo_1 . ':|';
                    $backup .= $rotulo_2 . ':|' . $rotulo_3 . ':|' . $text_form . ':|' . $botao . ':|';
                    $backup .= $cor_botao . ':|' . $text_privacidade . ':|' . $ebook . ':|' . $titulo_descritivo . ':|';
                    $backup .= $texto_descritivo . ':|' . $lista_beneficios . ':|' . $urlvideo . ':|' . $back2 . ':|' . $back3 . ':|';
                    $backup .= $titulo1 . ':|' . $texto1 . ':|' . $titulo2 . ':|' . $texto2 . ':|' . $titulo3 . ':|';
                    $backup .= $texto3 . ':|' . $titulo4 . ':|' . $texto4 . ':|' . $link . ':|';
                    $backup .= $url_confirmacao . ':|' . $url_redirecionamento . ':|' . $tempo . ':|';
                    $backup .= $exibir_facebook . ':|' . $exibir_plus . ':|' . $exibir_youtube . ':|' . $exibir_twitter . ':|';
                    $backup .= $animar . ':|' . $exibir . ':|' . $titulo_contador . ':|' . $data_oferta;
                    $backup .= '-|';
                    update_option('backup_simple_fields', $backup);


                    update_post_meta($p->ID, '_simple_fields_selected_connector', '9999');

                    switch ($template_name) {
                        case 'sp-padrao-1.php':
                            update_post_meta($p->ID, 'background', $back);
                            update_post_meta($p->ID, 'headline', $headline);
                            update_post_meta($p->ID, 'posicao_form', $posicao);
                            importar_form($p->ID, $form, $placeholder, $exibir_campos, $rotulo_1, $rotulo_2, $rotulo_3, $text_form, $text_privacidade, $botao, $cor_botao);
                            importar_redes($p->ID, $exibir_facebook, $exibir_plus, $exibir_youtube, $exibir_twitter);
                            importar_contador($p->ID, $exibir, $titulo_contador, $data_oferta);
                            update_post_meta($p->ID, 'exibir_animacoes', $animar);
                            break;
                        case 'sp-ebook-1.php':
                            update_post_meta($p->ID, 'ebook', $ebook);
                            update_post_meta($p->ID, 'headline', $headline);
                            update_post_meta($p->ID, 'subheadline', $subheadline);
                            update_post_meta($p->ID, 'titulo_descritivo', $titulo_descritivo);
                            update_post_meta($p->ID, 'texto_descritivo', $texto_descritivo);
                            update_post_meta($p->ID, 'lista_beneficios', $lista_beneficios);
                            importar_form($p->ID, $form, $placeholder, $exibir_campos, $rotulo_1, $rotulo_2, $rotulo_3, $text_form, $text_privacidade, $botao, $cor_botao);
                            importar_redes($p->ID, $exibir_facebook, $exibir_plus, $exibir_youtube, $exibir_twitter);
                            importar_contador($p->ID, $exibir, $titulo_contador, $data_oferta);
                            update_post_meta($p->ID, 'exibir_animacoes', $animar);
                            break;
                        case 'sp-ebook-2.php':
                            update_post_meta($p->ID, 'ebook', $ebook);
                            update_post_meta($p->ID, 'headline', $headline);
                            update_post_meta($p->ID, 'subheadline', $subheadline);
                            importar_form($p->ID, $form, $placeholder, $exibir_campos, $rotulo_1, $rotulo_2, $rotulo_3, $text_form, $text_privacidade, $botao, $cor_botao);
                            importar_redes($p->ID, $exibir_facebook, $exibir_plus, $exibir_youtube, $exibir_twitter);
                            importar_contador($p->ID, $exibir, $titulo_contador, $data_oferta);
                            update_post_meta($p->ID, 'exibir_animacoes', $animar);
                            break;
                        case 'sp-video-1.php':
                            update_post_meta($p->ID, 'video', $urlvideo);
                            update_post_meta($p->ID, 'headline', $headline);
                            update_post_meta($p->ID, 'subheadline', $subheadline);
                            importar_form($p->ID, $form, $placeholder, $exibir_campos, $rotulo_1, $rotulo_2, $rotulo_3, $text_form, $text_privacidade, $botao, $cor_botao);
                            importar_redes($p->ID, $exibir_facebook, $exibir_plus, $exibir_youtube, $exibir_twitter);
                            importar_contador($p->ID, $exibir, $titulo_contador, $data_oferta);
                            update_post_meta($p->ID, 'exibir_animacoes', $animar);
                            break;
                        case 'sp-video-background.php':
                            update_post_meta($p->ID, 'video', $urlvideo);
                            update_post_meta($p->ID, 'headline', $headline);
                            update_post_meta($p->ID, 'posicao_form', $posicao);
                            importar_redes($p->ID, $exibir_facebook, $exibir_plus, $exibir_youtube, $exibir_twitter);
                            importar_contador($p->ID, $exibir, $titulo_contador, $data_oferta);
                            update_post_meta($p->ID, 'exibir_animacoes', $animar);
                            break;
                        case 'sp-back-animado-1.php':
                            $backs = $back . ',' . $back2 . ',' . $back3;
                            update_post_meta($p->ID, 'backgrounds', $backs);
                            update_post_meta($p->ID, 'headline', $headline);
                            update_post_meta($p->ID, 'posicao_form', $posicao);
                            importar_form($p->ID, $form, $placeholder, $exibir_campos, $rotulo_1, $rotulo_2, $rotulo_3, $text_form, $text_privacidade, $botao, $cor_botao);
                            importar_redes($p->ID, $exibir_facebook, $exibir_plus, $exibir_youtube, $exibir_twitter);
                            importar_contador($p->ID, $exibir, $titulo_contador, $data_oferta);
                            update_post_meta($p->ID, 'exibir_animacoes', $animar);
                            break;
                        case 'sp-back-animado-2.php':
                            $backs = $back . ',' . $back2 . ',' . $back3;
                            update_post_meta($p->ID, 'backgrounds', $backs);
                            update_post_meta($p->ID, 'headline', $headline);
                            update_post_meta($p->ID, 'posicao_form', $posicao);
                            importar_form($p->ID, $form, $placeholder, $exibir_campos, $rotulo_1, $rotulo_2, $rotulo_3, $text_form, $text_privacidade, $botao, $cor_botao);
                            importar_redes($p->ID, $exibir_facebook, $exibir_plus, $exibir_youtube, $exibir_twitter);
                            importar_contador($p->ID, $exibir, $titulo_contador, $data_oferta);
                            update_post_meta($p->ID, 'exibir_animacoes', $animar);
                            break;
                        case 'confirme-inscricao-1.php':
                            update_post_meta($p->ID, 'headline', $headline);
                            update_post_meta($p->ID, 'titulo_1', $titulo1);
                            update_post_meta($p->ID, 'passo_1', $texto1);
                            update_post_meta($p->ID, 'titulo_2', $titulo2);
                            update_post_meta($p->ID, 'passo_2', $texto2);
                            update_post_meta($p->ID, 'titulo_3', $titulo3);
                            update_post_meta($p->ID, 'passo_3', $texto3);
                            update_post_meta($p->ID, 'titulo_4', $titulo4);
                            update_post_meta($p->ID, 'passo_4', $texto4);
                            update_post_meta($p->ID, 'exibir_animacoes', $animar);
                            break;
                        case 'confirme-inscricao-2.php':
                            update_post_meta($p->ID, 'background', $back);
                            update_post_meta($p->ID, 'headline', $headline);
                            update_post_meta($p->ID, 'titulo_1', $titulo1);
                            update_post_meta($p->ID, 'passo_1', $texto1);
                            update_post_meta($p->ID, 'titulo_2', $titulo2);
                            update_post_meta($p->ID, 'passo_2', $texto2);
                            update_post_meta($p->ID, 'titulo_3', $titulo3);
                            update_post_meta($p->ID, 'passo_3', $texto3);
                            update_post_meta($p->ID, 'titulo_4', $titulo4);
                            update_post_meta($p->ID, 'passo_4', $texto4);
                            update_post_meta($p->ID, 'exibir_animacoes', $animar);
                            break;
                        case 'page-download-1.php':
                            update_post_meta($p->ID, 'ebook', $ebook);
                            update_post_meta($p->ID, 'link_ebook', $link);
                            update_post_meta($p->ID, 'headline', $headline);
                            update_post_meta($p->ID, 'subheadline', $subheadline);
                            update_post_meta($p->ID, 'texto_cta', $botao);
                            update_post_meta($p->ID, 'cor_cta', $cor_botao);
                            update_post_meta($p->ID, 'titulo_descritivo', $titulo_descritivo);
                            update_post_meta($p->ID, 'texto_descritivo', $texto_descritivo);
                            update_post_meta($p->ID, 'protecao', $url_confirmacao);
                            update_post_meta($p->ID, 'url_redirecionamento', $url_redirecionamento);
                            importar_redes($p->ID, $exibir_facebook, $exibir_plus, $exibir_youtube, $exibir_twitter);
                            update_post_meta($p->ID, 'exibir_animacoes', $animar);
                            break;
                        case 'page-download-2.php':
                            update_post_meta($p->ID, 'background', $back);
                            update_post_meta($p->ID, 'link_ebook', $link);
                            update_post_meta($p->ID, 'headline', $headline);
                            update_post_meta($p->ID, 'subheadline', $subheadline);
                            update_post_meta($p->ID, 'texto_cta', $botao);
                            update_post_meta($p->ID, 'cor_cta', $cor_botao);
                            update_post_meta($p->ID, 'titulo_descritivo', $titulo_descritivo);
                            update_post_meta($p->ID, 'texto_descritivo', $texto_descritivo);
                            update_post_meta($p->ID, 'protecao', $url_confirmacao);
                            update_post_meta($p->ID, 'url_redirecionamento', $url_redirecionamento);
                            importar_redes($p->ID, $exibir_facebook, $exibir_plus, $exibir_youtube, $exibir_twitter);
                            update_post_meta($p->ID, 'exibir_animacoes', $animar);
                            break;
                        case 'lp-vendas-video-1.php':
                            update_post_meta($p->ID, 'video', $urlvideo);
                            update_post_meta($p->ID, 'headline', $headline);
                            update_post_meta($p->ID, 'texto_cta', $botao);
                            update_post_meta($p->ID, 'cor_cta', $cor_botao);
                            update_post_meta($p->ID, 'tempo_botao', $tempo);
                            importar_contador($p->ID, $exibir, $titulo_contador, $data_oferta);
                            update_post_meta($p->ID, 'exibir_animacoes', $animar);
                            break;
                    }
                }
            }
        }
        deactivate_plugins(plugin_basename('simple-fields/simple_fields.php'));
    }

    function get_pages_sp($tipo = 'todas') {
        $pages = get_pages();
        $paginas = array();
        if (is_array($pages)) {
            foreach ($pages as $p) {
                $template_name = get_post_meta($p->ID, '_wp_page_template', true);
                if ($tipo == 'todas')
                    $templates = array('sp-video-1.php', 'sp-padrao-1.php', 'sp-ebook-1.php', 'sp-ebook-2.php', 'sp-back-animado-1.php', 'sp-back-animado-2.php', 'confirme-inscricao-1.php', 'confirme-inscricao-2.php', 'page-download-1.php', 'page-download-2.php', 'lp-vendas-video-1.php', 'sp-video-background.php');
                if ($tipo == 'sp')
                    $templates = $this->pages_captura;
                if ($tipo == 'conversao')
                    $templates = $this->pages_conversao;
                if (in_array($template_name, $templates)) {
                    $paginas = array_merge($paginas, array($p->ID . '|' . $p->post_title => $p->ID . '|' . $p->post_title));
                }
            }
        }
        return $paginas;
    }

    function is_page_sp($tipo = 'todas', $id) {
        $template_name = get_post_meta($id, '_wp_page_template', true);
        $result = false;
        if ($tipo == 'todas')
            $templates = $this->template_pages;
        if ($tipo == 'sp')
            $templates = $this->pages_captura;
        if ($tipo == 'conversao')
            $templates = $this->pages_conversao;
        if (in_array($template_name, $templates)) {
            $result = true;
        }
        return $result;
    }

    function page_by_conversion($id) {
        $paginas = $this->get_pages_sp('sp');
        foreach ($paginas as $p) {
            $p = explode('|', $p);
            if (get_post_meta($p[0], 'conversao', true) <> false) {
                $meta = get_post_meta($p[0], 'conversao', true);
                $meta = explode('|', $meta);
                if ($meta[0] == $id) {
                    $result[] = $p[0];
                }
            }
        }
        return $result;
    }

    function functions_js() {
        $templates = $this->template_pages;
        if (get_page_template_slug() <> ''){
            require_once('inc/icons.php');
            wp_enqueue_style('fancybox-css', plugins_url('css/jquery.fancybox.css', __FILE__));
            wp_enqueue_script('fancybox-js', plugins_url('js/jquery.fancybox.js', __FILE__),array( 'jquery' ));

            $js = '';
            $js .= '<a class="inline-squeezewp" href="#data"></a>';
            $js .= '<script type="text/javascript">';
            $js .= 'var j = jQuery.noConflict();';
            $js .= 'j("#page_template option:selected").each(function() {
            inputText = j(this).val();
        });';
            $js .= 'if (typeof inputText !== "undefined") { switch (inputText) {';
            foreach ($templates as $tshow) {
                $js .= 'case "' . $tshow . '": ';
                foreach ($templates as $thide) {
                    $classe = 'j("' . '#metabox_' . str_replace('-', '_', str_replace('.php', '', $thide)) . '")';
                    if ($tshow == $thide)
                        $js .= $classe . '.show();';
                    else
                        $js .= $classe . '.hide();';
                }
                $js .= 'j("#postdivrich").hide();';
                $js .= 'break;';
            }
            $js .= 'default: ';
            foreach ($templates as $tshow) {
                $classe = 'j("' . '#metabox_' . str_replace('-', '_', str_replace('.php', '', $tshow)) . '")';
                $js .= $classe . '.hide();';
            }
            $js .= 'j("#postdivrich").show();';
            $js .= 'break;';
            $js .= '}}';
            $js .= 'var idedit;
        j(document).ready(function() {
            j("#icon_rotulo_1, #icon_rotulo_2, #icon_rotulo_3").click(function() {
                j("a.inline-squeezewp").trigger("click");
                idedit = j(this).attr("id");
            });
            j("a.inline-squeezewp").fancybox({
                type: "inline",
                width: "800",
                height: "350",
                autoScale: false,
                autoDimensions: false
            });

            j(".fa").click(function() {
                var myClass = j(this).attr("class");

                myClass = myClass.replace("fa ", "");
                
                if (idedit.indexOf("a-") > -1){
                   j("#" + idedit + " i").attr("class", "fa escolher-icone " + myClass);
                   idedit = idedit.replace("a-", ""); 
                   j("#" + idedit).val(myClass);
                }
                else{
                    j(".inline-squeezewp i").attr("class", "fa escolher-icone " + myClass);
                    j("#" + idedit).val(myClass);
                }
                    
                j.fancybox.close();
            }); });';
            $js .= '</script>';
            echo $js;
        }
    }

    function hex2rgb($hex) {
        $hex = str_replace("#", "", $hex);

        if (strlen($hex) == 3) {
            $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
        } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }
        $rgb = array($r, $g, $b);
        //return implode(",", $rgb); // returns the rgb values separated by commas
        return $rgb; // returns an array with the rgb values
    }

    //Inclusão dos Highlights
    function tiny_mce_before_init($settings) {
        $style_formats = array(
            array(
                'title' => 'Highlight Amarelo',
                'inline' => 'span',
                'classes' => 'highlight',
            ),
            array(
                'title' => 'Highlight Verde',
                'inline' => 'span',
                'classes' => 'highlight highlight-green',
            ),
            array(
                'title' => 'Highlight Azul',
                'inline' => 'span',
                'classes' => 'highlight highlight-blue',
            ),
            array(
                'title' => 'Highlight Laranja',
                'inline' => 'span',
                'classes' => 'highlight highlight-orange',
            ),
            array(
                'title' => 'Highlight Branco',
                'inline' => 'span',
                'classes' => 'highlight highlight-white',
            ),
        );

        $settings['style_formats'] = json_encode($style_formats);

        return $settings;
    }

    /**
     * Add the Styles dropdown to the visual editor
     *
     * @param array $buttons Array of buttons already registered
     * @return array
     */
    function mce_buttons_2($buttons) {
        array_unshift($buttons, 'styleselect');
        return $buttons;
    }

    /**
     * Load a custom stylesheet in the visual editor
     *
     * The path in the add_editor_style function is relative to the theme root.
     *
     * @return void
     */
    function squeezewp_add_editor_style($mce_css) {
        $mce_css .= ', ' . plugins_url( 'css/custom-styles.css', __FILE__ );
        return $mce_css;
    }

}

// end class
