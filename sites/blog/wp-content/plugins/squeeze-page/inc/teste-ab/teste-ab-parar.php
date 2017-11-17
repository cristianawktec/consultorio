<?php
if ($_GET){
    global $wpdb;
    $wpdb->query($wpdb->prepare("UPDATE " . $wpdb->prefix . 'teste_ab' . " SET status = %s " . " WHERE id = %d", $_GET['status'], $_GET['teste']));
?>
<script type="text/javascript">
    window.location = "<?php bloginfo('wpurl') ?>/wp-admin/admin.php?page=squeezewp-teste-ab&action=testeab";
</script>
<?php
}
?>
