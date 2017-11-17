<?php
if ($_GET) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'teste_ab';

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    $sql = "DROP TABLE " . $table_name . ";";
    $wpdb->query($sql);
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

    $wpdb->query($sql);
    ?>
    <script type="text/javascript">
    window.location = "<?php bloginfo('wpurl') ?>/wp-admin/admin.php?page=squeezewp-teste-ab&action=testeab";
</script>
    <?php
}
?>
