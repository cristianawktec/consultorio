<?php
$exit = get_post_meta($id, 'exit_popup', true);
if ($exit) {
    $exitmsg = get_post_meta($id, 'texto_exit', true);
    $exitmsg = addslashes($exitmsg);
    $exiturl = get_post_meta($id, 'url_exit', true);

    if ($exitmsg != '') {
        $remove = array("\n", "\r\n", "\r");
        $exit_msg = str_replace($remove, "+", strip_tags(trim($exitmsg)));
        $exit_msg = str_replace("++", "<%enter%>", $exit_msg);
        $exit_msg = str_replace("<%enter%>", '\n', $exit_msg);
    } else {
        $exit_msg = '';
    }
    ?>
    <script type="text/javascript">
        var preventExit = false;
        var ctrlKeyIsDown = false;
        function showExitPage() {
            var exitMsg = '<?php echo $exit_msg; ?>';
            var exitURL = '<?php echo $exiturl; ?>';
            var exitPage = '';

            if (preventExit == false) {
                window.scrollTo(0, 0);

                exitPage = '<div id="exit" align="center">';
                exitPage += '<iframe src="' + exitURL + '" align="middle" frameborder="0" marginheight="0" marginwidth="0" width="100%" height="100%"></iframe>';
                exitPage += '</div>';

                preventExit = true;

                jQuery('body').html('');
                jQuery('html').css('overflow', 'hidden');
                jQuery('body').css({
                    'margin': '0',
                    'width': '100%',
                    'height': '100%',
                    'overflow': 'hidden'
                });
                jQuery('body').append(exitPage);
                jQuery('#exit').css({
                    'background-color': '#FFFFFF',
                    'position': 'fixed',
                    'z-index': '9999',
                    'width': '100%',
                    'height': '100%',
                    'top': '0',
                    'left': '0',
                    'display': 'block'
                });

                jQuery('iframe').css({
                    'display': 'block',
                    'width': '100%',
                    'height': '100%',
                    'border': 'none',
                });

                return exitMsg;
            }
        }

        jQuery(document).ready(function() {
            jQuery("a").each(function() {
                var obj = jQuery(this);
                if (obj.attr('target') != '_blank') {
                    obj.bind("click", function() {
                        preventExit = true;
                    });
                }
            });

            jQuery("form").each(function() {
                var obj = jQuery(this);
                obj.submit(function() {
                    preventExit = true;
                });
            });

            jQuery(document).keypress(function(e) {
                if (e.keyCode == 116)
                    preventExit = true;
            });
            window.onbeforeunload = showExitPage;
        });
    </script>
<?php } ?>
