<?php
if ($_GET){
    global $wpdb;
    $wpdb->query($wpdb->prepare("DELETE FROM " . $wpdb->prefix . 'teste_ab' . " WHERE id = %d", $_GET['teste']));
?>
<script type="text/javascript">
    window.location = "<?php bloginfo('wpurl') ?>/wp-admin/admin.php?page=squeezewp-teste-ab&action=testeab";
</script>
<?php
}
?>


