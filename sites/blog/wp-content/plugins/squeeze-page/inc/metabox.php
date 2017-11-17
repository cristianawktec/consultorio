<?php

class Odin_Metabox {

    /**
     * Metaboxs fields.
     *
     * @var array
     */
    protected $fields = array();

    /**
     * Metaboxs construct.
     *
     * @param string       $id        HTML 'id' attribute of the edit screen section.
     * @param string       $title     Title of the edit screen section, visible to user.
     * @param string|array $post_type The type of Write screen on which to show the edit screen section.
     * @param string       $context   The part of the page where the edit screen section should be shown ('normal', 'advanced', or 'side').
     * @param string       $priority  The priority within the context where the boxes should show ('high', 'core', 'default' or 'low').
     *
     * @return void
     */
    public function __construct($id, $title, $post_type = 'post', $context = 'normal', $priority = 'high') {
        $this->id = $id;
        $this->title = $title;
        $this->post_type = $post_type;
        $this->context = $context;
        $this->priority = $priority;
        $this->nonce = $id . '_nonce';

        // Add Metabox.
        add_action('add_meta_boxes', array($this, 'add'));
        // Save Metaboxs.
        add_action('save_post', array($this, 'save'));

        // Load scripts.
        add_action('admin_enqueue_scripts', array($this, 'scripts'));
    }

    /**
     * Get the post typea.
     *
     * @return array
     */
    protected function get_post_type() {
        return is_array($this->post_type) ? $this->post_type : array($this->post_type);
    }

    /**
     * Load metabox scripts.
     *
     * @return void
     */
    public function scripts() {
        $screen = get_current_screen();
        add_action('pre_post_update', array($this, 'save'));
        if (in_array($screen->id, $this->get_post_type())) {
            // Color Picker.
            wp_enqueue_style('wp-color-picker');
            wp_enqueue_script('wp-color-picker');

            // Media Upload.
            wp_enqueue_media();

            // jQuery UI.
            wp_enqueue_script('jquery-ui-sortable');

            // Metabox.
            wp_enqueue_script('odin-admin', plugins_url('../js/admin.js', __FILE__), array('jquery'), null, true);
            wp_enqueue_script('datetimepicker', plugins_url('../js/jquery.datetimepicker.js', __FILE__), array('jquery'), null, true);
            wp_enqueue_style('odin-admin', plugins_url('../css/admin.css', __FILE__), array(), null, 'all');
            wp_enqueue_style('datetimepicker', plugins_url('../css/jquery.datetimepicker.css', __FILE__), array(), null, 'all');
            // Localize strings.
            wp_localize_script(
                    'odin-admin', 'odinAdminParams', array(
                'galleryTitle' => __('Add images in gallery', 'odin'),
                'galleryButton' => __('Add in gallery', 'odin'),
                'galleryRemove' => __('Remove image', 'odin'),
                'uploadTitle' => __('Choose a file', 'odin'),
                'uploadButton' => __('Add file', 'odin'),
                    )
            );
        }
    }

    /**
     * Add the metabox in edit screens.
     *
     * @return void
     */
    public function add() {
        foreach ($this->get_post_type() as $post_type) {
            add_meta_box(
                    $this->id, $this->title, array($this, 'metabox'), $post_type, $this->context, $this->priority
            );
        }
    }

    /**
     * Set metabox fields.
     *
     * @param array $fields Metabox fields.
     *
     * @return void
     */
    public function set_fields($fields = array()) {
        $this->fields = $fields;
    }

    /**
     * Metabox view.
     *
     * @param  object $post Post object.
     *
     * @return string       Metabox HTML fields.
     */
    public function metabox($post) {
        // Use nonce for verification.
        wp_nonce_field(basename(__FILE__), $this->nonce);

        $post_id = $post->ID;

        do_action('odin_metabox_header_' . $this->id, $post_id);

        echo apply_filters('odin_metabox_container_before_' . $this->id, '<table class="form-table odin-form-table">');

        foreach ($this->fields as $field) {
            echo apply_filters('odin_metabox_wrap_before_' . $this->id, '<tr valign="top">', $field);

            if ('title' == $field['type']) {
                $title = sprintf('<th colspan="2"><strong>%s</strong></th>', $field['label']);
            } elseif ('separator' == $field['type']) {
                $title = sprintf('<td colspan="2"><span id="odin-metabox-separator-%s" class="odin-metabox-separator"></span></td>', $field['id']);
            } else {
                $title = sprintf('<th><label for="%s">%s</label></th>', $field['id'], $field['label']);
            }

            echo apply_filters('odin_metabox_field_title_' . $this->id, $title, $field);

            echo apply_filters('odin_metabox_field_before_' . $this->id, '<td>', $field);
            $this->process_fields($field, $post_id);

            if (isset($field['description'])) {
                echo sprintf('<span class="description">%s</span>', $field['description']);
            }


            echo apply_filters('odin_metabox_field_after_' . $this->id, '</td>', $field);

            echo apply_filters('odin_metabox_wrap_after_' . $this->id, '</tr>', $field);
        }

        echo apply_filters('odin_metabox_container_after_' . $this->id, '</table>');

        do_action('odin_metabox_footer_' . $this->id, $post_id);
    }

    /**
     * Process the metabox fields.
     *
     * @param  array $args    Field arguments
     * @param  int   $post_id ID of the current post type.
     *
     * @return string          HTML of the field.
     */
    protected function process_fields($args, $post_id) {
        $id = $args['id'];
        $type = $args['type'];
        $options = isset($args['options']) ? $args['options'] : '';
        $attrs = isset($args['attributes']) ? $args['attributes'] : array();

        // Gets current value or default.
        $current = get_post_meta($post_id, $id, true);
        if (!$current) {
            $current = isset($args['default']) ? $args['default'] : '';
        }
        $template_name = get_post_meta($post_id, '_wp_page_template', true);

        $metabox = 'metabox_' . str_replace('.php', '', str_replace('-', '_', $template_name));

        if ($this->id == $metabox) {
            //add_action( 'admin_head', array( &$this, 'hide_editor' ) );
            switch ($type) {
                case 'text':
                    $this->field_input($id, $current, array_merge(array('class' => 'regular-text'), $attrs));
                    break;
                case 'input':
                    $this->field_input($id, $current, $attrs);
                    break;
                case 'textarea':
                    $this->field_textarea($id, $current, $attrs);
                    break;
                case 'checkbox':
                    $this->field_checkbox($id, $current, $attrs);
                    break;
                case 'select':
                    $this->field_select($id, $current, $options, $attrs);
                    break;
                case 'radio':
                    $this->field_radio($id, $current, $options, $attrs);
                    break;
                case 'editor':
                    $this->field_editor($id, $current, $options);
                    break;
                case 'color':
                    $this->field_input($id, $current, array_merge(array('class' => 'odin-color-field'), $attrs));
                    break;
                case 'upload':
                    $this->field_upload($id, $current, $attrs);
                    break;
                case 'image':
                    $this->field_image($id, $current);
                    break;
                case 'image_plupload':
                    $this->field_image_plupload($id, $current);
                    break;

                default:
                    do_action('odin_metabox_field_' . $this->id, $type, $id, $current, $options, $attrs);
                    break;
            }
        }
    }

    /**
     * Build field attributes.
     *
     * @param  array $attrs Attributes as array.
     *
     * @return string       Attributes as string.
     */
    protected function build_field_attributes($attrs) {
        $attributes = '';

        if (!empty($attrs)) {
            foreach ($attrs as $key => $attr) {
                $attributes .= ' ' . $key . '="' . $attr . '"';
            }
        }

        return $attributes;
    }

    /**
     * Input field.
     *
     * @param  string $id      Field id.
     * @param  string $current Field current value.
     * @param  array  $attrs   Array with field attributes.
     *
     * @return string          HTML of the field.
     */
    protected function field_input($id, $current, $attrs) {

        if (!isset($attrs['type'])) {
            $attrs['type'] = 'text';
        }

        echo sprintf('<input id="%1$s" name="%1$s" value="%2$s"%3$s />', $id, esc_attr($current), $this->build_field_attributes($attrs));
    }

    /**
     * Textarea field.
     *
     * @param  string $id      Field id.
     * @param  string $current Field current value.
     * @param  array  $attrs   Array with field attributes.
     *
     * @return string          HTML of the field.
     */
    protected function field_textarea($id, $current, $attrs) {
        if (!isset($attrs['cols'])) {
            $attrs['cols'] = '60';
        }

        if (!isset($attrs['rows'])) {
            $attrs['rows'] = '5';
        }

        echo sprintf('<textarea id="%1$s" name="%1$s"%3$s>%2$s</textarea>', $id, esc_attr($current), $this->build_field_attributes($attrs));
    }

    /**
     * Checkbox field.
     *
     * @param  string $id      Field id.
     * @param  string $current Field current value.
     * @param  array  $attrs   Array with field attributes.
     *
     * @return string          HTML of the field.
     */
    protected function field_checkbox($id, $current, $attrs) {
        echo sprintf('<input type="checkbox" id="%1$s" name="%1$s" value="1"%2$s%3$s />', $id, checked(1, $current, false), $this->build_field_attributes($attrs));
    }

    /**
     * Select field.
     *
     * @param  string $id      Field id.
     * @param  string $current Field current value.
     * @param  array  $options Array with select options.
     * @param  array  $attrs   Array with field attributes.
     *
     * @return string          HTML of the field.
     */
    protected function field_select($id, $current, $options, $attrs) {
        // If multiple add a array in the option.
        $multiple = ( in_array('multiple', $attrs) ) ? '[]' : '';

        $html = sprintf('<select id="%1$s" name="%1$s%2$s"%3$s>', $id, $multiple, $this->build_field_attributes($attrs));

        foreach ($options as $key => $label) {
            $selected = $this->is_selected($current, $key);
            $html .= sprintf('<option value="%s"%s>%s</option>', $key, $selected, $label);
        }

        $html .= '</select>';

        echo $html;
    }

    /**
     * Current value is selected.
     *
     * @param  array/string $current Field current value.
     * @param  string       $key     Actual option value.
     *
     * @return boolean               $current is selected or not.
     */
    protected function is_selected($current, $key) {
        $selected = false;
        if (is_array($current)) {
            for ($i = 0; $i < count($current); $i++) {
                if (selected($current[$i], $key, false)) {
                    $selected = selected($current[$i], $key, false);
                    break 1;
                }
            }
        } else {
            $selected = selected($current, $key, false);
        }

        return $selected;
    }

    /**
     * Radio field.
     *
     * @param  string $id      Field id.
     * @param  string $current Field current value.
     * @param  array  $options Array with input options.
     * @param  array  $attrs   Array with field attributes.
     *
     * @return string          HTML of the field.
     */
    protected function field_radio($id, $current, $options, $attrs) {
        $html = '';

        foreach ($options as $key => $label)
            $html .= sprintf('<input type="radio" id="%1$s_%2$s" name="%1$s" value="%2$s"%3$s%5$s /><label for="%1$s_%2$s"> %4$s</label><br />', $id, $key, checked($current, $key, false), $label, $this->build_field_attributes($attrs));

        echo $html;
    }

    /**
     * Editor field.
     *
     * @param  string $id      Field id.
     * @param  string $current Field current value.
     * @param  array  $options Array with wp_editor options.
     *
     * @return string          HTML of the field.
     */
    protected function field_editor($id, $current, $options) {
        // Set default options.
        if (empty($options)) {
            $options = array('textarea_rows' => 10);
        }

        $options['textarea_name'] = $id;

        echo '<div style="max-width: 600px;">';
        wp_editor(wpautop($current), $id, $options);
        echo '</div>';
    }

    /**
     * Upload field.
     *
     * @param  string $id      Field id.
     * @param  string $current Field current value.
     * @param  array  $attrs   Array with field attributes.
     *
     * @return string          HTML of the field.
     */
    protected function field_upload($id, $current, $attrs) {
        echo sprintf('<input type="text" id="%1$s" name="%1$s" value="%2$s" class="regular-text"%4$s /> <input class="button odin-upload-button" type="button" value="%3$s" />', $id, esc_url($current), __('Select file', 'odin'), $this->build_field_attributes($attrs));
    }

    /**
     * Image field.
     *
     * @param  string $id      Field id.
     * @param  string $current Field current value.
     *
     * @return string          HTML of the field.
     */
    protected function field_image($id, $current) {

        // Gets placeholder image.
        $image = plugins_url('../images/placeholder.png', __FILE__);
        $html = '<div class="odin-upload-image">';
        $html .= '<span class="default-image">' . $image . '</span>';

        if ($current) {
            $image = wp_get_attachment_image_src($current, 'thumbnail');
            $image = $image[0];
        }

        $html .= sprintf('<input id="%1$s" name="%1$s" type="hidden" class="image" value="%2$s" /><img src="%3$s" class="preview" style="height: 150px; width: 150px;" alt="" /><input id="%1$s-button" class="button" type="button" value="%4$s" /><ul class="actions"><li><a href="#" class="delete" title="%5$s"><span class="dashicons dashicons-no"></span></a></li></ul>', $id, $current, $image, 'Selecionar Imagem', __('Remove image', 'odin'));

        $html .= '<br class="clear" />';
        $html .= '</div>';

        echo $html;
    }

    /**
     * Image plupload field.
     *
     * @param  string $id      Field id.
     * @param  string $current Field current value.
     *
     * @return string          HTML of the field.
     */
    protected function field_image_plupload($id, $current) {
        $html = '<div class="odin-gallery-container">';
        $html .= '<ul class="odin-gallery-images">';
        if (!empty($current)) {
            // Gets the current images.
            $attachments = array_filter(explode(',', $current));

            if ($attachments) {
                foreach ($attachments as $attachment_id) {
                    $html .= sprintf('<li class="image" data-attachment_id="%1$s">%2$s<ul class="actions"><li><a href="#" class="delete" title="%3$s"><span class="dashicons dashicons-no"></span></a></li></ul></li>', $attachment_id, wp_get_attachment_image($attachment_id, 'thumbnail'), __('Remove image', 'odin')
                    );
                }
            }
        }
        $html .= '</ul><div class="clear"></div>';

        // Adds the hidden input.
        $html .= sprintf('<input type="hidden" class="odin-gallery-field" name="%s" value="%s" />', $id, $current);

        // Adds "adds images in gallery" url.
        $html .= sprintf('<p class="odin-gallery-add hide-if-no-js"><a href="#">%s</a></p>', __('Add images in gallery', 'odin'));
        $html .= '</div>';

        echo $html;
    }

    /**
     * Save metabox data.
     *
     * @param  int $post_id Current post type ID.
     *
     * @return void
     */
    public function save($post_id) {
        // Verify nonce.
        if (!isset($_POST[$this->nonce]) || !wp_verify_nonce($_POST[$this->nonce], basename(__FILE__))) {
            return $post_id;
        }

        // Verify if this is an auto save routine.
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post_id;
        }

        // Check permissions.
        if (isset($_POST['post_type']) && in_array($_POST['post_type'], $this->get_post_type())) {
            if (!current_user_can('edit_page', $post_id)) {
                return $post_id;
            }
        } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
        }
        //zera a variação que verifica se o e-mail já foi enviado
        update_post_meta($post_id, 'enviou_email', 0);



        foreach ($this->fields as $field) {
            $name = $field['id'];
            $value = isset($_POST[$name]) ? $_POST[$name] : null;

            if (!in_array($field['type'], array('separator', 'title'))) {
                $old = get_post_meta($post_id, $name, true);

                $new = apply_filters('odin_save_metabox_' . $this->id, $value, $name);

                if ($new && $new != $old) {
                    update_post_meta($post_id, $name, $new);
                } elseif ('' == $new && $old) {
                    delete_post_meta($post_id, $name, $old);
                }
            }
        }
        $hash = md5($post_id);
        update_post_meta($post_id, 'end_direto_video_1', get_permalink($post_id) . '?video=1&hash=' . $hash);
        update_post_meta($post_id, 'end_direto_video_2', get_permalink($post_id) . '?video=2&hash=' . $hash);
        update_post_meta($post_id, 'end_direto_video_3', get_permalink($post_id) . '?video=3&hash=' . $hash);
        update_post_meta($post_id, 'end_direto_video_4', get_permalink($post_id) . '?video=4&hash=' . $hash);

    }

}

$squeeze = SqueezeWP::get_instance();

if (isset($_GET['post']))
    $template_name = get_post_meta($_GET['post'], '_wp_page_template', true);
$headline = array(
    'id' => 'headline', // Obrigatório
    'label' => __('Headline', 'odin'), // Obrigatório
    'type' => 'editor', // Obrigatório
    'description' => 'Insira aqui a Headline da sua página de captura', // Opcional
    'options' => array(// Opcional (aceita argumentos do wp_editor)
        'textarea_rows' => 10
    ),
);

$subheadline = array(
    'id' => 'subheadline', // Obrigatório
    'label' => __('SubHeadline', 'odin'), // Obrigatório
    'type' => 'editor', // Obrigatório
    'description' => 'Insira aqui a SubHeadline da sua página de captura', // Opcional
    'options' => array(// Opcional (aceita argumentos do wp_editor)
        'textarea_rows' => 10
    ),
);

$ebook = array(
    'id' => 'ebook', // Obrigatório
    'label' => 'Ebook', // Obrigatório
    'type' => 'image', // Obrigatório
    'description' => __('Coloque aqui a imagem do Ebook (Capa)', 'odin'), // Opcional
);

$titulo_descritivo = array(
    'id' => 'titulo_descritivo', // Obrigatório
    'label' => 'Título do texto descritivo', // Obrigatório
    'type' => 'editor', // Obrigatório
    'description' => 'Título do Texto que ficará abaixo do e-book demostrando o porque de usuário baixar o e-book', // Opcional
    'options' => array(// Opcional (aceita argumentos do wp_editor)
        'textarea_rows' => 10
    ),
);

$texto_descritivo = array(
    'id' => 'texto_descritivo', // Obrigatório
    'label' => 'Texto descritivo', // Obrigatório
    'type' => 'editor', // Obrigatório
    'description' => 'Texto que ficará abaixo do e-book demostrando o porque de usuário baixar o e-book', // Opcional
    'options' => array(// Opcional (aceita argumentos do wp_editor)
        'textarea_rows' => 10
    ),
);

$lista_beneficios = array(
    'id' => 'lista_beneficios', // Obrigatório
    'label' => 'Lista de benefícios', // Obrigatório
    'type' => 'editor', // Obrigatório
    'description' => 'Lista de benefícios posicionadas abaixo do form (Use listas do editor do Wordpress)', // Opcional
    'options' => array(// Opcional (aceita argumentos do wp_editor)
        'textarea_rows' => 10
    ),
);

$background = array(
    'id' => 'background', // Obrigatório
    'label' => 'Background da Página', // Obrigatório
    'type' => 'image', // Obrigatório
    'description' => __('Coloque aqui a imagem que ficará no fundo da sua página', 'odin'), // Opcional
);

$backgrounds = array(
    'id' => 'backgrounds', // Obrigatório
    'label' => 'Backgrounds da Página', // Obrigatório
    'type' => 'image_plupload', // Obrigatório
    'description' => __('Coloque aqui as imagens que ficarão no fundo da sua página', 'odin'), // Opcional
);

$posicao_form = array(
    'id' => 'posicao_form', // Obrigatório
    'label' => 'Posição do Formulário na página', // Obrigatório
    'type' => 'select', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'options' => array(// Obrigatório (adicione aque os ids e títulos)
        'Centro' => 'Centro',
        'Esquerda' => 'Esquerda',
        'Direita' => 'Direita',
    ),
);

$texto_form = array(
    'id' => 'texto_form', // Obrigatório
    'label' => __('Texto acima do formulário', 'odin'), // Obrigatório
    'type' => 'editor', // Obrigatório
    'options' => array(// Opcional (aceita argumentos do wp_editor)
        'textarea_rows' => 10
    ),
);

$optin = array(
    'id' => 'optin', // Obrigatório
    'label' => 'Formulário (SignUp)', // Obrigatório
    'type' => 'textarea', // Obrigatório
    'attributes' => array(// Opcional (atributos para input HTML/HTML5)
        'placeholder' => __('Formulário (SignUp)')
    ),
    'description' => __('Cole aqui o formulário gerado pelo seu serviço de E-mail Marketing', 'odin'), // Opcional
);

$codigo_embed = array(
    'id' => 'codigo_embed', // Obrigatório
    'label' => 'Código Embed (Botão do Facebook, por exemplo)', // Obrigatório
    'type' => 'editor', // Obrigatório
    'attributes' => array(// Opcional (atributos para input HTML/HTML5)
        'placeholder' => 'Código Embed'
    ),
    'description' => 'Aqui você pode colar o código do cadastro via app do Facebook, por exemplo'
);

$placeholder_email = array(
    'id' => 'placeholder_email', // Obrigatório
    'label' => 'Placeholder E-mail', // Obrigatório
    'type' => 'text', // Obrigatório
    'attributes' => array(// Opcional (atributos para input HTML/HTML5)
        'placeholder' => __('Placeholder E-mail')
    ),
    'description' => __('Rótulo que será colocado no campo de e-mail', 'odin'), // Opcional
);

$exibir_campos = array(
    'id' => 'exibir_campos', // Obrigatório
    'label' => __('Exibir campos além do e-mail?', 'odin'), // Obrigatório
    'type' => 'checkbox', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Se você marcar está opção, seu formulário terá outros campos além do e-mail' // Opcional
);

$rotulo1 = array(
    'id' => 'rotulo_1', // Obrigatório
    'label' => 'Rótulo - Campo 1', // Obrigatório
    'type' => 'text', // Obrigatório
    'attributes' => array(// Opcional (atributos para input HTML/HTML5)
        'placeholder' => __('Rótulo - Campo 1')
    ),
    'description' => __('Rótulo do campo 1 (Ex: Primeiro Nome)', 'odin'), // Opcional
);

$icon_rotulo_1 = array(
    'id' => 'icon_rotulo_1', // Obrigatório
    'label' => 'Ícone do rótulo 1', // Obrigatório
    'type' => 'text', // Obrigatório
);

$rotulo2 = array(
    'id' => 'rotulo_2', // Obrigatório
    'label' => 'Rótulo - Campo 2', // Obrigatório
    'type' => 'text', // Obrigatório
    'attributes' => array(// Opcional (atributos para input HTML/HTML5)
        'placeholder' => __('Rótulo - Campo 2')
    ),
    'description' => __('Rótulo do campo 2 (Ex: Sobrenome)', 'odin'), // Opcional
);

$icon_rotulo_2 = array(
    'id' => 'icon_rotulo_2', // Obrigatório
    'label' => 'Ícone do rótulo 2', // Obrigatório
    'type' => 'text', // Obrigatório
);

$rotulo3 = array(
    'id' => 'rotulo_3', // Obrigatório
    'label' => 'Rótulo - Campo 3', // Obrigatório
    'type' => 'text', // Obrigatório
    'attributes' => array(// Opcional (atributos para input HTML/HTML5)
        'placeholder' => __('Rótulo - Campo 3')
    ),
    'description' => __('Rótulo do campo 3 (Ex: Telefone)', 'odin'), // Opcional
);

$icon_rotulo_3 = array(
    'id' => 'icon_rotulo_3', // Obrigatório
    'label' => 'Ícone do rótulo 3', // Obrigatório
    'type' => 'text', // Obrigatório
);

$texto_cta = array(
    'id' => 'texto_cta', // Obrigatório
    'label' => 'Texto do Botão (CTA)', // Obrigatório
    'type' => 'text', // Obrigatório
    'attributes' => array(// Opcional (atributos para input HTML/HTML5)
        'placeholder' => 'Texto do Botão (CTA)'
    )
);

$cor_cta = array(
    'id' => 'cor_cta', // Obrigatório
    'label' => 'Cor do botão d o formulário (CTA)', // Obrigatório
    'type' => 'select', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'options' => array(// Obrigatório (adicione aque os ids e títulos)
        'Verde' => 'Verde',
        'Azul Escuro' => 'Azul Escuro',
        'Azul' => 'Azul',
        'Laranja' => 'Laranja',
        'Vermelho' => 'Vermelho'
    ),
);

$texto_privacidade = array(
    'id' => 'texto_privacidade', // Obrigatório
    'label' => 'Texto de privacidade', // Obrigatório
    'type' => 'text', // Obrigatório
    'attributes' => array(// Opcional (atributos para input HTML/HTML5)
        'placeholder' => __('Texto de privacidade')
    ),
    'description' => 'Texto de privacidade (Ex: Somos contra SPAM)', // Opcional
);

$form_modal = array(
    'id' => 'form_modal',
    'label' => 'Exibir formulário em popup',
    'type' => 'checkbox', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Se você marcar está opção, seu formulário será exibido em forma de modal' // Opcional
);

$texto_modal = array(
    'id' => 'texto_modal', // Obrigatório
    'label' => 'Texto acima do botão que chama o modal form',
    'type' => 'editor', // Obrigatório
);

$botao_cta_modal = array(
    'id' => 'botao_cta_modal', // Obrigatório
    'label' => 'Texto do Botão (CTA) dentro do modal',
    'type' => 'text', // Obrigatório
    'attributes' => array(// Opcional (atributos para input HTML/HTML5)
        'placeholder' => 'Texto do Botão (CTA) dentro do modal'
    )
);

$paginas = $squeeze->get_pages_sp('conversao');
$array = array('0' => 'Selecionar uma Página -->');
$paginas = array_merge($array, $paginas);

$conversao = array(
    'id' => 'conversao', // Obrigatório
    'label' => 'Página de Conversão', // Obrigatório
    'type' => 'select', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Selecione aqui a página que determinará a conversão desta página (Usado para ver estatísticas)',
    'options' => $paginas
);

$text_abaixo_form = array(
    'id' => 'text_abaixo_form', // Obrigatório
    'label' => __('Texto abaixo do formulário', 'odin'), // Obrigatório
    'type' => 'editor', // Obrigatório
    'description' => 'Pode ser usado para criar um texto sobre privacidade ou conter um link para a página específica',
    'options' => array(// Opcional (aceita argumentos do wp_editor)
        'textarea_rows' => 10
    ),
);

$titoption = array(
    'id' => 'titoption', // Obrigatório
    'label' => '<a name="titoption"></a><h2 class="titulo">Formulário de Optin</h2>',
    'type' => 'title', // Obrigatório
);


$sep = array(
    'id' => 'sep', // Obrigatório
    'type' => 'separator' // Obrigatório
);

$optin = array($titoption, $sep, $texto_form, $optin, $codigo_embed, $placeholder_email, $exibir_campos,
    $rotulo1, $icon_rotulo_1, $rotulo2, $icon_rotulo_2, $rotulo3, $icon_rotulo_3, $texto_cta, $cor_cta, $texto_privacidade, $conversao, $form_modal, $texto_modal, $botao_cta_modal, $text_abaixo_form);

$texto = array(
    'id' => 'texto', // Obrigatório
    'label' => 'Texto da Página', // Obrigatório
    'type' => 'editor', // Obrigatório
);


$facebook = array(
    'id' => 'exibir_facebook', // Obrigatório
    'label' => __('Exibir botão para curtir a página no Facebook?', 'odin'), // Obrigatório
    'type' => 'checkbox', // Obrigatório
        // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
);

$twitter = array(
    'id' => 'exibir_twitter', // Obrigatório
    'label' => __('Exibir botão para seguir no twitter?', 'odin'), // Obrigatório
    'type' => 'checkbox', // Obrigatório
        // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
);

$plus = array(
    'id' => 'exibir_plus', // Obrigatório
    'label' => __('Exibir botão para adicionar aos círculos do Google+?', 'odin'), // Obrigatório
    'type' => 'checkbox', // Obrigatório
        // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
);

$youtube = array(
    'id' => 'exibir_youtube', // Obrigatório
    'label' => __('Exibir botão de inscrição no canal do Youtube?', 'odin'), // Obrigatório
    'type' => 'checkbox', // Obrigatório
        // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
);

$titsocial = array(
    'id' => 'titsocial', // Obrigatório
    'label' => '<a name="titsocial"></a><h2 class="titulo">Redes sociais</h2>',
    'type' => 'title', // Obrigatório
);


$redes_sociais = array($titsocial, $sep, $facebook, $twitter, $plus, $youtube);

$exibir_contador = array(
    'id' => 'exibir_contador', // Obrigatório
    'label' => __('Exibir contador regressivo?', 'odin'), // Obrigatório
    'type' => 'checkbox', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Exibindo o contador você gerará uma grande urgência para a sua audiência, funcionará caso você tenha uma licença do SqueezeWP', // Opcional
);

$titulo_contador = array(
    'id' => 'titulo_contador', // Obrigatório
    'label' => 'Título do contador', // Obrigatório
    'type' => 'text', // Obrigatório
    'attributes' => array(// Opcional (atributos para input HTML/HTML5)
        'placeholder' => __('Título do contador')
    ),
);

$data_contador = array(
    'id' => 'data_contador', // Obrigatório
    'label' => 'Data de expiração', // Obrigatório
    'type' => 'text', // Obrigatório
    'attributes' => array(// Opcional (atributos para input HTML/HTML5)
        'placeholder' => __('Data de expiração')
    ),
);

$titcontador = array(
    'id' => 'titcontador', // Obrigatório
    'label' => '<a name="titcontador"></a><h2 class="titulo">Contador Regressivo</h2>',
    'type' => 'title', // Obrigatório
);

$contador = array($titcontador, $sep, $exibir_contador, $titulo_contador, $data_contador);

$exibir_animacoes = array(
    'id' => 'exibir_animacoes', // Obrigatório
    'label' => 'Exibir animações', // Obrigatório
    'type' => 'checkbox', // Obrigatório
);

$titanimacao = array(
    'id' => 'titanimacao', // Obrigatório
    'label' => '<a name="titanimacoes"></a><h2 class="titulo">Animações</h2>',
    'type' => 'title', // Obrigatório
);

$animacoes = array($titanimacao, $sep, $exibir_animacoes);

$video = array(
    'id' => 'video', // Obrigatório
    'label' => 'URL do Vídeo (Youtube)', // Obrigatório
    'type' => 'text', // Obrigatório
    'attributes' => array(// Opcional (atributos para input HTML/HTML5)
        'placeholder' => __('URL do Vídel (Youtube)')
    ),
    'description' => __('Coloque aqui a URL completa do seu vídeo no Youtube', 'odin'), // Opcional
);

$video_iframe = array(
    'id' => 'video_iframe', // Obrigatório
    'label' => 'Código de incorporação (Youtube, vimeo, etc)', // Obrigatório
    'type' => 'textarea', // Obrigatório
    'attributes' => array(// Opcional (atributos para input HTML/HTML5)
        'placeholder' => __('Código de incorporação (Youtube, vimeo, etc)')
    ),
    'description' => 'Use este <a target="_blank" href="http://www.classynemesis.com/projects/ytembed/">sistema para gerar ótimos players do youtube</a>'
);

$titulo_1 = array(
    'id' => 'titulo_1', // Obrigatório
    'label' => 'Título - Passo 1', // Obrigatório
    'type' => 'text', // Obrigatório
    'attributes' => array(// Opcional (atributos para input HTML/HTML5)
        'placeholder' => __('Título - Passo 1')
    )
);

$passo_1 = array(
    'id' => 'passo_1', // Obrigatório
    'label' => 'Texto - Passo 1', // Obrigatório
    'type' => 'text', // Obrigatório
    'attributes' => array(// Opcional (atributos para input HTML/HTML5)
        'placeholder' => __('Texto - Passo 1')
    )
);

$titulo_2 = array(
    'id' => 'titulo_2', // Obrigatório
    'label' => 'Título - Passo 2', // Obrigatório
    'type' => 'text', // Obrigatório
    'attributes' => array(// Opcional (atributos para input HTML/HTML5)
        'placeholder' => __('Título - Passo 2')
    )
);

$passo_2 = array(
    'id' => 'passo_2', // Obrigatório
    'label' => 'Texto - Passo 2', // Obrigatório
    'type' => 'text', // Obrigatório
    'attributes' => array(// Opcional (atributos para input HTML/HTML5)
        'placeholder' => __('Texto - Passo 2')
    )
);


$titulo_3 = array(
    'id' => 'titulo_3', // Obrigatório
    'label' => 'Título - Passo 3', // Obrigatório
    'type' => 'text', // Obrigatório
    'attributes' => array(// Opcional (atributos para input HTML/HTML5)
        'placeholder' => __('Título - Passo 3')
    )
);

$passo_3 = array(
    'id' => 'passo_3', // Obrigatório
    'label' => 'Texto - Passo 3', // Obrigatório
    'type' => 'text', // Obrigatório
    'attributes' => array(// Opcional (atributos para input HTML/HTML5)
        'placeholder' => __('Texto - Passo 3')
    )
);


$titulo_4 = array(
    'id' => 'titulo_4', // Obrigatório
    'label' => 'Título - Passo 4', // Obrigatório
    'type' => 'text', // Obrigatório
    'attributes' => array(// Opcional (atributos para input HTML/HTML5)
        'placeholder' => __('Título - Passo 4')
    )
);

$passo_4 = array(
    'id' => 'passo_4', // Obrigatório
    'label' => 'Texto - Passo 4', // Obrigatório
    'type' => 'text', // Obrigatório
    'attributes' => array(// Opcional (atributos para input HTML/HTML5)
        'placeholder' => __('Texto - Passo 4')
    )
);

$passos = array($titulo_1, $passo_1, $titulo_2, $passo_2, $titulo_3, $passo_3, $titulo_4, $passo_4);

$link_ebook = array(
    'id' => 'link_ebook', // Obrigatório
    'label' => 'Link da Recompensa', // Obrigatório
    'type' => 'text', // Obrigatório
    'attributes' => array(// Opcional (atributos para input HTML/HTML5)
        'placeholder' => __('Link da Recompensa')
    ),
    'description' => __('Coloque aqui o link da recompensa ao usuário', 'odin'), // Opcional
);

$pages = get_pages();
$paginas = array();
if (is_array($pages)) {
    foreach ($pages as $p) {
        $template_name = get_post_meta($p->ID, '_wp_page_template', true);
        $templates = array('sp-video-1.php', 'sp-padrao-1.php', 'sp-ebook-1.php', 'sp-ebook-2.php', 'sp-back-animado-1.php', 'sp-back-animado-2.php', 'confirme-inscricao-1.php', 'confirme-inscricao-2.php', 'page-download-1.php', 'page-download-2.php', 'lp-vendas-video-1.php', 'sp-video-background.php');
        if (in_array($template_name, $templates)) {
            $paginas = array_merge($paginas, array($p->ID . '|' . $p->post_title => $p->ID . '|' . $p->post_title));
        }
    }
}

$protecao = array(
    'id' => 'protecao', // Obrigatório
    'label' => 'Proteção de recompensa', // Obrigatório
    'type' => 'select', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Use se deseja proteger a sua recompensa, o visitante conseguirá visualizar a página de download apenas se acessou a página cadastrada neste item. (Inclua o HTTP)',
    'options' => array_merge(array('0 | Selecionar ---->' => '0 | Selecionar ---->'), $paginas)
);

$url_redirecionamento = array(
    'id' => 'url_redirecionamento', // Obrigatório
    'label' => 'URL de redirecionamento', // Obrigatório
    'type' => 'select', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Página que irá carregar se o ususário ainda não visitou a página cadastrada no item anterior',
    'options' => array_merge(array('0 | Selecionar ---->' => '0 | Selecionar ---->'), $paginas)
);



$url_redirecionamento_conversao = array(
    'id' => 'url_redirecionamento', // Obrigatório
    'label' => 'URL de redirecionamento', // Obrigatório
    'type' => 'text', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Coloque aqui a url de redirecionamento com o http://',
);


$url_iframe = array(
    'id' => 'url_iframe', // Obrigatório
    'label' => 'URL de incorporação', // Obrigatório
    'type' => 'text', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Coloque aqui a url que será incorporado (iframe) com o http://',
);

$url_compartilhamento = array(
    'id' => 'url_compartilhamento', // Obrigatório
    'label' => 'URL para compartilhamento', // Obrigatório
    'type' => 'text', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'URL que será compartilhada na página',
);

$link_pagamento = array(
    'id' => 'link_pagamento', // Obrigatório
    'label' => 'Link do botão CTA', // Obrigatório
    'type' => 'text', // Obrigatório
    'description' => ''
);

$link_externo = array(
    'id' => 'link_pagamento', // Obrigatório
    'label' => 'Link do botão CTA', // Obrigatório
    'type' => 'text', // Obrigatório
    'description' => 'Deixe em branco se não desejar inserir nenhum botão'
);

$tempo_botao = array(
    'id' => 'tempo_botao', // Obrigatório
    'label' => 'Tempo para aparecer o botão', // Obrigatório
    'type' => 'text', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Insira aqui o tempo para aparecer o botão (coloque apenas o número inteiro, ex: 20, para 20 segundos)',
);

$largura_video = array(
    'id' => 'largura_video', // Obrigatório
    'label' => 'Largura do vídeo de vendas', // Obrigatório
    'type' => 'text', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Insira aqui a largura do vídeo, ex: 700, para 700 pixels)',
);

$altura_video = array(
    'id' => 'altura_video', // Obrigatório
    'label' => 'Altura do vídeo de vendas', // Obrigatório
    'type' => 'text', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Insira aqui a altura do vídeo, ex: 700, para 700 pixels)',
);

$tipo_video = array(
    'id' => 'tipo_video', // Obrigatório
    'label' => 'Tipo do vídeo', // Obrigatório
    'type' => 'select', // Obrigatório
    'options' => array(// Obrigatório (adicione aque os ids e títulos)
        'youtube' => 'Youtube',
        'embed' => 'Embed (Vimeo, Youtube, etc)',
    ),
);

$embed_video = array(
    'id' => 'embed_video', // Obrigatório
    'label' => 'Embed', // Obrigatório
    'type' => 'textarea', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Cole aqui o código embed (incorporação), gerado pela sua hospedagem de vídeos',
);

$video_vendas = array($tipo_video, $video, $largura_video, $altura_video, $embed_video);

$titvideo = array(
    'id' => 'titvideo', // Obrigatório
    'label' => '<a name="titvideo"></a><h2 class="titulo">Vídeo</h2></div>',
    'type' => 'title', // Obrigatório
);

$video_sp = array($titvideo, $sep, $tipo_video, $video, $embed_video);

$scripts = array(
    'id' => 'squeeze_scritps', // Obrigatório
    'label' => 'Scripts', // Obrigatório
    'type' => 'textarea', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Scripts (Google Analytics, Pixel de conversão, ou qualquer outro script do tipo Javascript)',
);

$exit_popup = array(
    'id' => 'exit_popup', // Obrigatório
    'label' => 'Utilizar Exit Popup?',
    'type' => 'checkbox', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Exibe um popup, oferecendo algo para que o visitante se mantenha na página', // Opcional
);

$texto_exit = array(
    'id' => 'texto_exit', // Obrigatório
    'label' => 'Texto do Exit Popup', // Obrigatório
    'type' => 'textarea', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Texto informando ao usuário o que ele ganhará ficando na página',
);

$url_exit = array(
    'id' => 'url_exit', // Obrigatório
    'label' => 'URL de redirecionamento', // Obrigatório
    'type' => 'text', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'URL que será carregada se o usuário decidir por permanecer na página (coloque também o http://)',
);

$titopcoes = array(
    'id' => 'titopcoes', // Obrigatório
    'label' => '<h2 class="titulo"><a name="titopcoes"></a>Opções</h2>',
    'type' => 'title', // Obrigatório
);

$data_webinario = array(
    'id' => 'data_webinario', // Obrigatório
    'label' => 'Data do Webinário', // Obrigatório
    'type' => 'text', // Obrigatório
    'attributes' => array(// Opcional (atributos para input HTML/HTML5)
        'placeholder' => __('Data do Webinário')
    ),
);

$data_extenso_webinario = array(
    'id' => 'data_extenso_webinario', // Obrigatório
    'label' => 'Data por Extenso e/ou informações importantes', // Obrigatório
    'type' => 'editor', // Obrigatório
);

$informacoes_webinario = array(
    'id' => 'informacoes_webinario', // Obrigatório
    'label' => 'Informações do Webinário como o roteiro', // Obrigatório
    'type' => 'editor', // Obrigatório
);

$foto_palestrante = array(
    'id' => 'foto_palestrante', // Obrigatório
    'label' => 'Foto do palestrante', // Obrigatório
    'type' => 'image', // Obrigatório
    'description' => 'Insira aqui uma foto do palestrante'
);

$texto_palestrante = array(
    'id' => 'texto_palestrante', // Obrigatório
    'label' => 'Texto sobre o palestrante', // Obrigatório
    'type' => 'editor', // Obrigatório
);

$informacoes_inscritos = array(
    'id' => 'informacoes_inscritos', // Obrigatório
    'label' => 'Informações para os inscritos (Ex: número máximo de inscritos possíveis)', // Obrigatório
    'type' => 'editor', // Obrigatório
);

$url_comentarios = array(
    'id' => 'url_comentarios', // Obrigatório
    'label' => 'URL de comentários', // Obrigatório
    'type' => 'text', // Obrigatório
    'attributes' => array(// Opcional (atributos para input HTML/HTML5)
        'placeholder' => 'URL de comentários'
    ),
);

$cor_box = array(
    'id' => 'cor_box', // Obrigatório
    'label' => 'Cor do Box de captura', // Obrigatório
    'type' => 'color', // Obrigatório
    'description' => 'Caso não preencha o sistema irá adotar o padrão (#000000 - preto)'
);

$trans_box = array(
    'id' => 'trans_box', // Obrigatório
    'label' => 'Transparência do Box de captura', // Obrigatório
    'type' => 'text', // Obrigatório
    'description' => 'Use apenas valores inteiros de 1 a 100, caso não preencha o sistema irá adotar o padrão (80)'
);

$imagem_video_1 = array(
    'id' => 'imagem_video_1', // Obrigatório
    'label' => 'Miniatura do vídeo 1', // Obrigatório
    'type' => 'image', // Obrigatório
);

$imagem_video_2 = array(
    'id' => 'imagem_video_2', // Obrigatório
    'label' => 'Miniatura do vídeo 2', // Obrigatório
    'type' => 'image', // Obrigatório
);

$imagem_video_3 = array(
    'id' => 'imagem_video_3', // Obrigatório
    'label' => 'Miniatura do vídeo 3', // Obrigatório
    'type' => 'image', // Obrigatório
);

$imagem_video_4 = array(
    'id' => 'imagem_video_4', // Obrigatório
    'label' => 'Miniatura do vídeo 4', // Obrigatório
    'type' => 'image', // Obrigatório
);

$titulo_video_1 = array(
    'id' => 'titulo_video_1', // Obrigatório
    'label' => 'Título do vídeo 1', // Obrigatório
    'type' => 'editor', // Obrigatório
);

$titulo_video_2 = array(
    'id' => 'titulo_video_2', // Obrigatório
    'label' => 'Título do vídeo 2', // Obrigatório
    'type' => 'editor', // Obrigatório
);

$titulo_video_3 = array(
    'id' => 'titulo_video_3', // Obrigatório
    'label' => 'Título do vídeo 3', // Obrigatório
    'type' => 'editor', // Obrigatório
);

$titulo_video_4 = array(
    'id' => 'titulo_video_4', // Obrigatório
    'label' => 'Título do vídeo 4', // Obrigatório
    'type' => 'editor', // Obrigatório
);

$embed_video_1 = array(
    'id' => 'embed_video_1', // Obrigatório
    'label' => 'Embed do vídeo 1', // Obrigatório
    'type' => 'textarea', // Obrigatório
    'description' => 'Cole aqui o código de incorporação (embed) gerado pelo seu serviço de vídeos (youtube, vimeo, etc)'
);

$embed_video_2 = array(
    'id' => 'embed_video_2', // Obrigatório
    'label' => 'Embed do vídeo 2', // Obrigatório
    'type' => 'textarea', // Obrigatório
    'description' => 'Cole aqui o código de incorporação (embed) gerado pelo seu serviço de vídeos (youtube, vimeo, etc)'
);

$embed_video_3 = array(
    'id' => 'embed_video_3', // Obrigatório
    'label' => 'Embed do vídeo 3', // Obrigatório
    'type' => 'textarea', // Obrigatório
    'description' => 'Cole aqui o código de incorporação (embed) gerado pelo seu serviço de vídeos (youtube, vimeo, etc)'
);

$embed_video_4 = array(
    'id' => 'embed_video_4', // Obrigatório
    'label' => 'Embed do vídeo 4', // Obrigatório
    'type' => 'textarea', // Obrigatório
    'description' => 'Cole aqui o código de incorporação (embed) gerado pelo seu serviço de vídeos (youtube, vimeo, etc)'
);

$data_video_1 = array(
    'id' => 'data_video_1', // Obrigatório
    'label' => 'Data do Vídeo 1', // Obrigatório
    'type' => 'text', // Obrigatório
);

$data_video_2 = array(
    'id' => 'data_video_2', // Obrigatório
    'label' => 'Data do Vídeo 2', // Obrigatório
    'type' => 'text', // Obrigatório
);

$data_video_3 = array(
    'id' => 'data_video_3', // Obrigatório
    'label' => 'Data do Vídeo 3', // Obrigatório
    'type' => 'text', // Obrigatório
);

$data_video_4 = array(
    'id' => 'data_video_4', // Obrigatório
    'label' => 'Data do Vídeo 4', // Obrigatório
    'type' => 'text', // Obrigatório
);

$end_direto_video_1 = array(
    'id' => 'end_direto_video_1', // Obrigatório
    'label' => 'Endereço direto para o vídeo 1', // Obrigatório
    'type' => 'text', // Obrigatório
    'attributes' => array(// Opcional (atributos para input HTML/HTML5)
        'disabled' => 'disabled'
    ),
    'description' => 'Use esse link se desejar que a pessoa entre na página, sem a necessidade de página de captura (usado geralmente para quem já está na lista de lançamento)'
);

$end_direto_video_2 = array(
    'id' => 'end_direto_video_2', // Obrigatório
    'label' => 'Endereço direto para o vídeo 2', // Obrigatório
    'type' => 'text', // Obrigatório
    'attributes' => array(// Opcional (atributos para input HTML/HTML5)
        'disabled' => 'disabled'
    ),
    'description' => 'Use esse link se desejar que a pessoa entre na página, sem a necessidade de página de captura (usado geralmente para quem já está na lista de lançamento)'
);

$end_direto_video_3 = array(
    'id' => 'end_direto_video_3', // Obrigatório
    'label' => 'Endereço direto para o vídeo 3', // Obrigatório
    'type' => 'text', // Obrigatório
    'attributes' => array(// Opcional (atributos para input HTML/HTML5)
        'disabled' => 'disabled'
    ),
    'description' => 'Use esse link se desejar que a pessoa entre na página, sem a necessidade de página de captura (usado geralmente para quem já está na lista de lançamento)'
);

$end_direto_video_4 = array(
    'id' => 'end_direto_video_4', // Obrigatório
    'label' => 'Endereço direto para o vídeo 4', // Obrigatório
    'type' => 'text', // Obrigatório
    'attributes' => array(// Opcional (atributos para input HTML/HTML5)
        'disabled' => 'disabled'
    ),
    'description' => 'Use esse link se desejar que a pessoa entre na página, sem a necessidade de página de captura (usado geralmente para quem já está na lista de lançamento)'
);

$descricao = array(
    'id' => 'descricao', // Obrigatório
    'label' => 'Descrição da Página', // Obrigatório
    'type' => 'textarea', // Obrigatório
    'description' => 'Usado para o description do compatilhamento no facebook'
);

$texto_cta_4 = array(
    'id' => 'texto_cta_4', // Obrigatório
    'label' => 'Texto do Botão (CTA)', // Obrigatório
    'type' => 'text', // Obrigatório
    'attributes' => array(// Opcional (atributos para input HTML/HTML5)
        'placeholder' => 'Texto do Botão (CTA)'
    ),
    'description' => 'Use esse campo para colocar o texto do botão de vendas ou um link para qualquer outra página'
);

$cor_cta_4 = array(
    'id' => 'cor_cta_4', // Obrigatório
    'label' => 'Cor do botão (CTA)', // Obrigatório
    'type' => 'select', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'options' => array(// Obrigatório (adicione aque os ids e títulos)
        'Verde' => 'Verde',
        'Azul Escuro' => 'Azul Escuro',
        'Azul' => 'Azul',
        'Laranja' => 'Laranja',
        'Vermelho' => 'Vermelho'
    ),
);

$cta_video_4 = array(
    'id' => 'cta_video_4', // Obrigatório
    'label' => 'CTA (Link de vendas, por exemplo)', // Obrigatório
    'type' => 'text', // Obrigatório
    'description' => 'Use esse campo para colocar o link de vendas ou um link para qualquer outra página'
);

$tempo_botao_4 = array(
    'id' => 'tempo_botao_4', // Obrigatório
    'label' => 'Tempo para aparecer o botão', // Obrigatório
    'type' => 'text', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Insira aqui o tempo para aparecer o botão (coloque apenas o número inteiro, ex: 20, para 20 segundos)',
);

$funil = array($imagem_video_1, $titulo_video_1, $embed_video_1, $data_video_1, $imagem_video_2, $titulo_video_2, $embed_video_2, $data_video_2, $imagem_video_3, $titulo_video_3, $embed_video_3, $data_video_3, $imagem_video_4, $titulo_video_4, $embed_video_4, $data_video_4, $texto_cta_4, $cor_cta_4, $cta_video_4, $tempo_botao_4, $end_direto_video_1, $end_direto_video_2, $end_direto_video_3, $end_direto_video_4);

$logo = array(
    'id' => 'logo', // Obrigatório
    'label' => 'Logo', // Obrigatório
    'type' => 'image', // Obrigatório
);

$texto_lp_vendas = array(
    'id' => 'texto_lp_vendas', // Obrigatório
    'label' => 'Texto descritivo', // Obrigatório
    'type' => 'editor', // Obrigatório
    'description' => 'Texto que ficará embaixo do vídeo, com benefícios, informações, etc', // Opcional
    'options' => array(// Opcional (aceita argumentos do wp_editor)
        'textarea_rows' => 10
    ),
);

$tipo_cta = array(
    'id' => 'tipo_cta', // Obrigatório
    'label' => 'Tipo de botão de pagamento', // Obrigatório
    'type' => 'select', // Obrigatório
    'description' => 'Texto que ficará embaixo do vídeo, com benefícios, informações, etc', // Opcional
    'options' => array(// Obrigatório (adicione aque os ids e títulos)
        'link' => 'Link',
        'codigo' => 'Código',
    ),
);

$cta_embed = array(
    'id' => 'cta_embed', // Obrigatório
    'label' => 'Código do botão de pagamento', // Obrigatório
    'type' => 'textarea', // Obrigatório
    'description' => 'código do botão de pagamento, do pagseguro, por exemplo', // Opcional
    'options' => array(// Opcional (aceita argumentos do wp_editor)
        'textarea_rows' => 10
    ),
);

$cor_headline = array(
    'id' => 'cor_headline', // Obrigatório
    'label' => 'Cor do Background da Headline', // Obrigatório
    'type' => 'color', // Obrigatório
    'description' => 'Caso não preencha o sistema irá adotar o padrão (#0099CC - azul piscina)',
    'options' => array(// Opcional (aceita argumentos do wp_editor)
        'default' => '#0099CC'
    ),
);

$usar_cabecalho = array(
    'id' => 'usar_cabecalho', // Obrigatório
    'label' => 'Usar Cabeçalho?',
    'type' => 'checkbox', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Se você desejar utilizar cabeçalho, marque essa caixa (Recomendado, para Facebook Ads)' // Opcional
);

$usar_menu = array(
    'id' => 'usar_menu', // Obrigatório
    'label' => 'Usar Menu de Navegação?',
    'type' => 'checkbox', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Se você desejar utilizar menu de navegação, marque essa caixa (Recomendado, para Facebook Ads)' // Opcional
);

$cor_cabecalho = array(
    'id' => 'cor_cabecalho', // Obrigatório
    'label' => 'Cor do cabeçalho',
    'type' => 'color', // Obrigatório
    'description' => 'Escolha a cor, se deixar em branco, usaremos a padrão' // Opcional
);

$titcabecalho = array(
    'id' => 'titcabecalho', // Obrigatório
    'label' => '<a name="titcabecalho"></a><h2 class="titulo">Cabeçalho</h2>',
    'type' => 'title', // Obrigatório
);

$titheadlines = array(
    'id' => 'titheadlines', // Obrigatório
    'label' => '<div id="titheadlines"><h2 class="titulo">Headlines</h2></div>',
    'type' => 'title', // Obrigatório
);

$cabecalho = array($titcabecalho, $sep, $usar_cabecalho, $logo, $usar_menu, $cor_cabecalho);


$usar_rodape = array(
    'id' => 'usar_rodape', // Obrigatório
    'label' => 'Usar Rodapé?',
    'type' => 'checkbox', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Se você desejar utilizar rodapé, marque essa caixa (Recomendado, para Facebook Ads)' // Opcional
);

$usar_rodape = array(
    'id' => 'usar_rodape', // Obrigatório
    'label' => 'Usar Rodapé?',
    'type' => 'checkbox', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Se você desejar utilizar rodapé, marque essa caixa (Recomendado, para Facebook Ads)' // Opcional
);

$titulo_rodape = array(
    'id' => 'titulo_rodape', // Obrigatório
    'label' => 'Título do Rodapé',
    'type' => 'text', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Esse título será usado na construção do menu do cabeçalho, se não desejar essa opção no menu deixe em branco' // Opcional
);

$texto_rodape = array(
    'id' => 'texto_rodape', // Obrigatório
    'label' => 'Texto do Rodapé',
    'type' => 'editor', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Aqui você pode incluir links de políticas, entre outros' // Opcional
);

$cor_rodape = array(
    'id' => 'cor_rodape', // Obrigatório
    'label' => 'Cor do Rodapé',
    'type' => 'color', // Obrigatório
    'description' => 'Escolha a cor, se deixar em branco, usaremos a padrão' // Opcional
);

$titrodape = array(
    'id' => 'titrodape', // Obrigatório
    'label' => '<a name="titrodape"></a><h2 class="titulo">Rodapé</h2>',
    'type' => 'title', // Obrigatório
);

$rodape = array($titrodape, $sep, $usar_rodape, $titulo_rodape, $texto_rodape, $cor_rodape);

$usar_explicativo = array(
    'id' => 'usar_explicativo', // Obrigatório
    'label' => 'Usar Texto Explicativo?',
    'type' => 'checkbox', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Se você desejar utilizar um texto explicativo para sua página de captura, marque essa caixa (Recomendado, para Facebook Ads)' // Opcional
);

$texto_explicativo = array(
    'id' => 'texto_explicativo', // Obrigatório
    'label' => 'Texto descritivo (explicativo) da página de captura', // Obrigatório
    'type' => 'editor', // Obrigatório
    'description' => 'Nesse campo você vai adicionar todas as informações da sua recompensa digital', // Opcional
);

$titexplicativo = array(
    'id' => 'titexplicativo', // Obrigatório
    'label' => '<a name="titexplicativo"></a><h2 class="titulo">Texto Explicativo</h2>',
    'type' => 'title', // Obrigatório
);

$titulo_texto_explicativo = array(
    'id' => 'titulo_texto_explicativo', // Obrigatório
    'label' => 'Título do Texto explicativo',
    'type' => 'text', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Esse título será usado na construção do menu do cabeçalho, se não desejar essa opção no menu deixe em branco' // Opcional
);

$cor_explicativo = array(
    'id' => 'cor_explicativo', // Obrigatório
    'label' => 'Cor da área do texto explicativo',
    'type' => 'color', // Obrigatório
    'description' => 'Escolha a cor, se deixar em branco, usaremos a padrão' // Opcional
);

$explicativo = array($titexplicativo, $sep, $usar_explicativo, $titulo_texto_explicativo, $texto_explicativo, $cor_explicativo);


$usar_depoimentos = array(
    'id' => 'usar_depoimentos', // Obrigatório
    'label' => 'Usar Depoimentos?',
    'type' => 'checkbox', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Se você desejar utilizar depoimentos em sua página de captura, marque essa caixa (Recomendado, para Facebook Ads)' // Opcional
);

$qtde_depoimentos = array(
    'id' => 'qtde_depoimentos', // Obrigatório
    'label' => 'Qtde de Depoimentos', // Obrigatório
    'type' => 'select', // Obrigatório
    'options' => array(// Obrigatório (adicione aque os ids e títulos)
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
    ),
);

$qtde_colunas = array(
    'id' => 'qtde_colunas', // Obrigatório
    'label' => 'Qtde de Colunas', // Obrigatório
    'type' => 'select', // Obrigatório
    'options' => array(// Obrigatório (adicione aque os ids e títulos)
        '1' => '1',
        '2' => '2',
    ),
);

$titulo_depoimentos = array(
    'id' => 'titulo_depoimentos', // Obrigatório
    'label' => 'Título da área de depoimentos',
    'type' => 'text', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Esse título será usado na construção do menu do cabeçalho, se não desejar essa opção no menu deixe em branco' // Opcional
);

$cor_depoimentos = array(
    'id' => 'cor_depoimentos', // Obrigatório
    'label' => 'Cor da área de depoimentos',
    'type' => 'color', // Obrigatório
    'description' => 'Escolha a cor, se deixar em branco, usaremos a padrão' // Opcional
);

$nome_depoimento_1 = array(
    'id' => 'nome_depoimento_1', // Obrigatório
    'label' => 'Nome - Depoimento 1',
    'type' => 'text', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Insira o nome da pessoa' // Opcional
);

$empresa_depoimento_1 = array(
    'id' => 'empresa_depoimento_1', // Obrigatório
    'label' => 'Empresa - Depoimento 1',
    'type' => 'text', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Insira o nome da empresa/função' // Opcional
);

$foto_depoimento_1 = array(
    'id' => 'foto_depoimento_1', // Obrigatório
    'label' => 'Foto - Depoimento 1',
    'type' => 'image', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Insira a Foto' // Opcional
);

$texto_depoimento_1 = array(
    'id' => 'texto_depoimento_1', // Obrigatório
    'label' => 'Texto - Depoimento 1',
    'type' => 'editor', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Insira o depoimento em si' // Opcional
);

$depoimento1 = array($nome_depoimento_1, $empresa_depoimento_1, $foto_depoimento_1, $texto_depoimento_1, $sep);

$nome_depoimento_2 = array(
    'id' => 'nome_depoimento_2', // Obrigatório
    'label' => 'Nome - Depoimento 2',
    'type' => 'text', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Insira o nome da pessoa' // Opcional
);

$empresa_depoimento_2 = array(
    'id' => 'empresa_depoimento_2', // Obrigatório
    'label' => 'Empresa - Depoimento 2',
    'type' => 'text', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Insira o nome da empresa/função' // Opcional
);

$foto_depoimento_2 = array(
    'id' => 'foto_depoimento_2', // Obrigatório
    'label' => 'Foto - Depoimento 2',
    'type' => 'image', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Insira a Foto' // Opcional
);

$texto_depoimento_2 = array(
    'id' => 'texto_depoimento_2', // Obrigatório
    'label' => 'Texto - Depoimento 2',
    'type' => 'editor', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Insira o depoimento em si' // Opcional
);

$depoimento2 = array($nome_depoimento_2, $empresa_depoimento_2, $foto_depoimento_2, $texto_depoimento_2, $sep);

$nome_depoimento_3 = array(
    'id' => 'nome_depoimento_3', // Obrigatório
    'label' => 'Nome - Depoimento 3',
    'type' => 'text', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Insira o nome da pessoa' // Opcional
);

$empresa_depoimento_3 = array(
    'id' => 'empresa_depoimento_3', // Obrigatório
    'label' => 'Empresa - Depoimento 3',
    'type' => 'text', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Insira o nome da empresa/função' // Opcional
);

$foto_depoimento_3 = array(
    'id' => 'foto_depoimento_3', // Obrigatório
    'label' => 'Foto - Depoimento 3',
    'type' => 'image', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Insira a Foto' // Opcional
);

$texto_depoimento_3 = array(
    'id' => 'texto_depoimento_3', // Obrigatório
    'label' => 'Texto - Depoimento 3',
    'type' => 'editor', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Insira o depoimento em si' // Opcional
);

$depoimento3 = array($nome_depoimento_3, $empresa_depoimento_3, $foto_depoimento_3, $texto_depoimento_3, $sep);

$nome_depoimento_4 = array(
    'id' => 'nome_depoimento_4', // Obrigatório
    'label' => 'Nome - Depoimento 4',
    'type' => 'text', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Insira o nome da pessoa' // Opcional
);

$empresa_depoimento_4 = array(
    'id' => 'empresa_depoimento_4', // Obrigatório
    'label' => 'Empresa - Depoimento 4',
    'type' => 'text', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Insira o nome da empresa/função' // Opcional
);

$foto_depoimento_4 = array(
    'id' => 'foto_depoimento_4', // Obrigatório
    'label' => 'Foto - Depoimento 4',
    'type' => 'image', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Insira a Foto' // Opcional
);

$texto_depoimento_4 = array(
    'id' => 'texto_depoimento_4', // Obrigatório
    'label' => 'Texto - Depoimento 4',
    'type' => 'editor', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Insira o depoimento em si' // Opcional
);

$depoimento4 = array($nome_depoimento_4, $empresa_depoimento_4, $foto_depoimento_4, $texto_depoimento_4, $sep);

$titdepoimentos = array(
    'id' => 'titdepoimentos', // Obrigatório
    'label' => '<a name="titdepoimentos"></a><h2 class="titulo">Depoimentos</h2>',
    'type' => 'title', // Obrigatório
);

$depoimentos = array_merge(array($titdepoimentos, $sep, $usar_depoimentos, $qtde_depoimentos, $qtde_colunas, $titulo_depoimentos,
    $cor_depoimentos), $depoimento1, $depoimento2, $depoimento3, $depoimento4);

$texto_politicas = array(
    'id' => 'texto_politicas', // Obrigatório
    'label' => 'Texto da Página',
    'type' => 'editor', // Obrigatório
    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
    'description' => 'Insira aqui o texto de sua página de políticas' // Opcional
);


require_once('option.php');
$key = get_option('key_squeeze_wp');

$option = squeezewp_verifica_dominio();
$funcao = squeezewp_verifica_funcao(2);

if (($option && $funcao))
    $opcoes = array($titopcoes, $sep, $scripts, $exit_popup, $texto_exit, $url_exit);
else
    $opcoes = array($titopcoes, $sep, $scripts);


$metabox_sp_padrao_1 = new Odin_Metabox(
        'metabox_sp_padrao_1', // Slug/ID do Metabox (obrigatório)
        'Configurações do Modelo Squeeze Padrão I', // Nome do Metabox  (obrigatório)
        'page', // Slug do Post Type, sendo possível enviar apenas um valor ou um array com vários (opcional)
        'normal', // Contexto (opções: normal, advanced, ou side) (opcional)
        'high' // Prioridade (opções: high, core, default ou low) (opcional)
);
$metabox_sp_padrao_1->set_fields(
        array_merge(array($background, $headline, $posicao_form, $cor_box, $trans_box), $optin, $redes_sociais, $contador, $animacoes, $opcoes, array($descricao))
);

$metabox_funil_1 = new Odin_Metabox(
        'metabox_funil_1', // Slug/ID do Metabox (obrigatório)
        'Configurações do Modelo Funil de Lançamentos I', // Nome do Metabox  (obrigatório)
        'page', // Slug do Post Type, sendo possível enviar apenas um valor ou um array com vários (opcional)
        'normal', // Contexto (opções: normal, advanced, ou side) (opcional)
        'high' // Prioridade (opções: high, core, default ou low) (opcional)
);
$metabox_funil_1->set_fields(
        array_merge(array($background, $logo), $funil, $redes_sociais, $animacoes, array($titopcoes, $sep, $url_comentarios, $protecao, $url_redirecionamento, $scripts, $descricao))
);

$metabox_sp_padrao_2 = new Odin_Metabox(
        'metabox_sp_padrao_2', // Slug/ID do Metabox (obrigatório)
        'Configurações do Modelo Squeeze Padrão II', // Nome do Metabox  (obrigatório)
        'page', // Slug do Post Type, sendo possível enviar apenas um valor ou um array com vários (opcional)
        'normal', // Contexto (opções: normal, advanced, ou side) (opcional)
        'high' // Prioridade (opções: high, core, default ou low) (opcional)
);
$metabox_sp_padrao_2->set_fields(
        array_merge(array($background, $headline, $posicao_form, $texto_form, $texto_cta, $cor_cta, $link_externo, $text_abaixo_form), $redes_sociais, $contador, $animacoes, $opcoes, array($descricao))
);

$metabox_sp_ebook_1 = new Odin_Metabox(
        'metabox_sp_ebook_1', // Slug/ID do Metabox (obrigatório)
        'Configurações do Modelo Squeeze E-book I', // Nome do Metabox  (obrigatório)
        'page', // Slug do Post Type, sendo possível enviar apenas um valor ou um array com vários (opcional)
        'normal', // Contexto (opções: normal, advanced, ou side) (opcional)
        'high' // Prioridade (opções: high, core, default ou low) (opcional)
);
$metabox_sp_ebook_1->set_fields(
        array_merge($cabecalho, array($titheadlines, $sep, $headline, $subheadline), array($ebook, $titulo_descritivo, 
            $texto_descritivo, $lista_beneficios), $optin, $explicativo, $depoimentos, $rodape, $redes_sociais,
            $contador, $animacoes, $opcoes, array($descricao))
);

$metabox_sp_ebook_2 = new Odin_Metabox(
        'metabox_sp_ebook_2', // Slug/ID do Metabox (obrigatório)
        'Configurações do Modelo Squeeze E-book II', // Nome do Metabox  (obrigatório)
        'page', // Slug do Post Type, sendo possível enviar apenas um valor ou um array com vários (opcional)
        'normal', // Contexto (opções: normal, advanced, ou side) (opcional)
        'high' // Prioridade (opções: high, core, default ou low) (opcional)
);
$metabox_sp_ebook_2->set_fields(
        array_merge(array(
    $headline, $subheadline, $ebook,
                ), $optin, $redes_sociais, $contador, $animacoes, $opcoes, array($descricao))
);

$metabox_sp_video_1 = new Odin_Metabox(
        'metabox_sp_video_1', // Slug/ID do Metabox (obrigatório)
        'Configurações do Modelo Squeeze Vídeo I', // Nome do Metabox  (obrigatório)
        'page', // Slug do Post Type, sendo possível enviar apenas um valor ou um array com vários (opcional)
        'normal', // Contexto (opções: normal, advanced, ou side) (opcional)
        'high' // Prioridade (opções: high, core, default ou low) (opcional)
);
$metabox_sp_video_1->set_fields(
        array_merge($cabecalho, array($titheadlines, $sep, $headline, $subheadline), $video_sp, $optin, 
        $explicativo, $depoimentos, $rodape, $redes_sociais, 
        $contador, $animacoes, $opcoes, array($descricao))
);

$metabox_sp_video_background_1 = new Odin_Metabox(
        'metabox_sp_video_background_1', // Slug/ID do Metabox (obrigatório)
        'Configurações do Modelo Squeeze Vídeo Background I', // Nome do Metabox  (obrigatório)
        'page', // Slug do Post Type, sendo possível enviar apenas um valor ou um array com vários (opcional)
        'normal', // Contexto (opções: normal, advanced, ou side) (opcional)
        'high' // Prioridade (opções: high, core, default ou low) (opcional)
);
$metabox_sp_video_background_1->set_fields(
        array_merge(array(
    $video, $headline, $posicao_form
                ), $optin, $redes_sociais, $contador, $animacoes, $opcoes, array($descricao))
);

$metabox_sp_back_animado_1 = new Odin_Metabox(
        'metabox_sp_back_animado_1', // Slug/ID do Metabox (obrigatório)
        'Configurações do Modelo Squeeze Background Animado I', // Nome do Metabox  (obrigatório)
        'page', // Slug do Post Type, sendo possível enviar apenas um valor ou um array com vários (opcional)
        'normal', // Contexto (opções: normal, advanced, ou side) (opcional)
        'high' // Prioridade (opções: high, core, default ou low) (opcional)
);
$metabox_sp_back_animado_1->set_fields(
        array_merge(array(
    $backgrounds, $headline, $posicao_form
                ), $optin, $redes_sociais, $contador, $animacoes, $opcoes, array($descricao))
);

$metabox_sp_back_animado_2 = new Odin_Metabox(
        'metabox_sp_back_animado_2', // Slug/ID do Metabox (obrigatório)
        'Configurações do Modelo Squeeze Background Animado com Modal Dialog', // Nome do Metabox  (obrigatório)
        'page', // Slug do Post Type, sendo possível enviar apenas um valor ou um array com vários (opcional)
        'normal', // Contexto (opções: normal, advanced, ou side) (opcional)
        'high' // Prioridade (opções: high, core, default ou low) (opcional)
);
$metabox_sp_back_animado_2->set_fields(
        array_merge(array(
    $backgrounds, $headline, $posicao_form
                ), $optin, $redes_sociais, $contador, $animacoes, $opcoes, array($descricao))
);

$metabox_confirme_inscricao_1 = new Odin_Metabox(
        'metabox_confirme_inscricao_1', // Slug/ID do Metabox (obrigatório)
        'Configurações do Modelo Página de Confirmação I', // Nome do Metabox  (obrigatório)
        'page', // Slug do Post Type, sendo possível enviar apenas um valor ou um array com vários (opcional)
        'normal', // Contexto (opções: normal, advanced, ou side) (opcional)
        'high' // Prioridade (opções: high, core, default ou low) (opcional)
);
$metabox_confirme_inscricao_1->set_fields(
        array_merge(array(
    $headline
                ), $passos, $animacoes, $opcoes)
);

$metabox_confirme_inscricao_2 = new Odin_Metabox(
        'metabox_confirme_inscricao_2', // Slug/ID do Metabox (obrigatório)
        'Configurações do Modelo Página de Confirmação II', // Nome do Metabox  (obrigatório)
        'page', // Slug do Post Type, sendo possível enviar apenas um valor ou um array com vários (opcional)
        'normal', // Contexto (opções: normal, advanced, ou side) (opcional)
        'high' // Prioridade (opções: high, core, default ou low) (opcional)
);
$metabox_confirme_inscricao_2->set_fields(
        array_merge(array(
    $background, $headline
                ), $passos, $animacoes, $opcoes)
);

$metabox_page_download_1 = new Odin_Metabox(
        'metabox_page_download_1', // Slug/ID do Metabox (obrigatório)
        'Configurações do Modelo Página de Download I', // Nome do Metabox  (obrigatório)
        'page', // Slug do Post Type, sendo possível enviar apenas um valor ou um array com vários (opcional)
        'normal', // Contexto (opções: normal, advanced, ou side) (opcional)
        'high' // Prioridade (opções: high, core, default ou low) (opcional)
);
$metabox_page_download_1->set_fields(
        array_merge(array(
    $headline, $subheadline, $ebook, $titulo_descritivo, $texto_descritivo, $link_ebook, $texto_cta, $cor_cta, $protecao, $url_redirecionamento
                ), $redes_sociais, $animacoes, $opcoes)
);

$metabox_page_download_2 = new Odin_Metabox(
        'metabox_page_download_2', // Slug/ID do Metabox (obrigatório)
        'Configurações do Modelo Página de Download II', // Nome do Metabox  (obrigatório)
        'page', // Slug do Post Type, sendo possível enviar apenas um valor ou um array com vários (opcional)
        'normal', // Contexto (opções: normal, advanced, ou side) (opcional)
        'high' // Prioridade (opções: high, core, default ou low) (opcional)
);
$metabox_page_download_2->set_fields(
        array_merge(array(
    $background, $headline, $subheadline, $texto_descritivo, $link_ebook, $texto_cta, $cor_cta, $protecao, $url_redirecionamento
                ), $redes_sociais, $animacoes, $opcoes)
);

$metabox_lp_vendas_video_1 = new Odin_Metabox(
        'metabox_lp_vendas_video_1', // Slug/ID do Metabox (obrigatório)
        'Configurações do Modelo Página de Vendas - Vídeo I', // Nome do Metabox  (obrigatório)
        'page', // Slug do Post Type, sendo possível enviar apenas um valor ou um array com vários (opcional)
        'normal', // Contexto (opções: normal, advanced, ou side) (opcional)
        'high' // Prioridade (opções: high, core, default ou low) (opcional)
);
$metabox_lp_vendas_video_1->set_fields(
        array_merge($video_vendas, array(
    $headline, $texto_lp_vendas, $tipo_cta, $texto_cta, $cor_cta, $link_pagamento, $cta_embed, $tempo_botao
                ), $contador, $animacoes, $opcoes, array($descricao))
);

$metabox_registro_webinario_1 = new Odin_Metabox(
        'metabox_registro_webinario_1', // Slug/ID do Metabox (obrigatório)
        'Configurações do Modelo Página Cadastro em Webinário I', // Nome do Metabox  (obrigatório)
        'page', // Slug do Post Type, sendo possível enviar apenas um valor ou um array com vários (opcional)
        'normal', // Contexto (opções: normal, advanced, ou side) (opcional)
        'high' // Prioridade (opções: high, core, default ou low) (opcional)
);
$metabox_registro_webinario_1->set_fields(
        array_merge(array($headline, $data_webinario, $data_extenso_webinario), $optin, array($informacoes_webinario, $foto_palestrante, $texto_palestrante, $informacoes_inscritos), $animacoes, $opcoes, array($descricao)));

$metabox_webinario_1 = new Odin_Metabox(
        'metabox_webinario_1', // Slug/ID do Metabox (obrigatório)
        'Configurações do Modelo Página de Webinário I', // Nome do Metabox  (obrigatório)
        'page', // Slug do Post Type, sendo possível enviar apenas um valor ou um array com vários (opcional)
        'normal', // Contexto (opções: normal, advanced, ou side) (opcional)
        'high' // Prioridade (opções: high, core, default ou low) (opcional)
);
$metabox_webinario_1->set_fields(
        array_merge(array($headline, $cor_headline, $video, $tipo_cta, $texto_cta, $cor_cta, 
            $link_pagamento, $cta_embed, $tempo_botao,$url_comentarios), $animacoes, $opcoes, array($descricao)));


$metabox_page_conversao_externa = new Odin_Metabox(
            'metabox_page_conversao_externa', // Slug/ID do Metabox (obrigatório)
            'Configurações do Modelo Página de Conversão Externa', // Nome do Metabox  (obrigatório)
            'page', // Slug do Post Type, sendo possível enviar apenas um valor ou um array com vários (opcional)
            'normal', // Contexto (opções: normal, advanced, ou side) (opcional)
            'high' // Prioridade (opções: high, core, default ou low) (opcional)
    );
    $metabox_page_conversao_externa->set_fields(
            array_merge(array($url_redirecionamento_conversao, $scripts)));

$metabox_page_entrega_video_1 = new Odin_Metabox(
        'metabox_page_entrega_video_1', // Slug/ID do Metabox (obrigatório)
        'Configurações do Modelo Página de Entrega em Vídeo I', // Nome do Metabox  (obrigatório)
        'page', // Slug do Post Type, sendo possível enviar apenas um valor ou um array com vários (opcional)
        'normal', // Contexto (opções: normal, advanced, ou side) (opcional)
        'high' // Prioridade (opções: high, core, default ou low) (opcional)
);
$metabox_page_entrega_video_1->set_fields(
        array_merge(array(
    $background, $headline, $subheadline, $video_iframe, $texto_cta, $cor_cta, $link_externo, $protecao, $url_redirecionamento
                ), $redes_sociais, $animacoes, $opcoes, array($descricao))
);

$metabox_page_agradecimento_1 = new Odin_Metabox(
        'metabox_page_agradecimento_1', // Slug/ID do Metabox (obrigatório)
        'Configurações do Modelo Página de Agradecimento I', // Nome do Metabox  (obrigatório)
        'page', // Slug do Post Type, sendo possível enviar apenas um valor ou um array com vários (opcional)
        'normal', // Contexto (opções: normal, advanced, ou side) (opcional)
        'high' // Prioridade (opções: high, core, default ou low) (opcional)
);

$metabox_page_agradecimento_1->set_fields(
        array_merge(array(
    $background, $headline, $subheadline, $url_compartilhamento), $redes_sociais, $opcoes)
);

$metabox_pagina_texto_1 = new Odin_Metabox(
        'metabox_pagina_texto_1', // Slug/ID do Metabox (obrigatório)
        'Configurações do Modelo Página em Texto I', // Nome do Metabox  (obrigatório)
        'page', // Slug do Post Type, sendo possível enviar apenas um valor ou um array com vários (opcional)
        'normal', // Contexto (opções: normal, advanced, ou side) (opcional)
        'high' // Prioridade (opções: high, core, default ou low) (opcional)
);
$metabox_pagina_texto_1->set_fields(
        array_merge(array($background, $headline, $texto), $redes_sociais, $contador, $animacoes, $opcoes, array($descricao, $url_comentarios))
);

$metabox_politicas = new Odin_Metabox(
        'metabox_politicas', // Slug/ID do Metabox (obrigatório)
        'Configurações do Modelo Políticas', // Nome do Metabox  (obrigatório)
        'page', // Slug do Post Type, sendo possível enviar apenas um valor ou um array com vários (opcional)
        'normal', // Contexto (opções: normal, advanced, ou side) (opcional)
        'high' // Prioridade (opções: high, core, default ou low) (opcional)
);
$metabox_politicas->set_fields(
        array_merge(array($headline, $texto_politicas), $animacoes, $opcoes)
);

$metabox_page_iframe = new Odin_Metabox(
        'metabox_page_iframe', // Slug/ID do Metabox (obrigatório)
        'Configurações do Modelo incorporação - IFrame', // Nome do Metabox  (obrigatório)
        'page', // Slug do Post Type, sendo possível enviar apenas um valor ou um array com vários (opcional)
        'normal', // Contexto (opções: normal, advanced, ou side) (opcional)
        'high' // Prioridade (opções: high, core, default ou low) (opcional)
);
$metabox_page_iframe->set_fields(
        array_merge(array($url_iframe, $scripts)));

require('metabox-congresso.php');

function add_jquery() {
    wp_enqueue_style('bootstrap-limpo', plugins_url('../css/bootstrap-limpo.css', __FILE__));
    ?>
    
    <?php
}

add_action('admin_footer', 'add_jquery');
