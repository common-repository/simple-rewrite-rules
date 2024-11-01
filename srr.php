<?php
/**
 * @package Simple_Rewrite_Rules
 * @version 1.0
 */
/*
Plugin Name: Simple Rewrite Rules
Description: Easily add custom rewrite rules to your WordPress blog.
Author: WordPress Plugins
Version: 1.0
*/

function srr_menu(){
  add_submenu_page('options-general.php', 'Simple Rewrite Rules', 'Simple Rewrite Rules', 'administrator', __FILE__, 'srr_admin');
  if (is_admin())
    add_action('admin_init', 'srr_register');
}

function srr_register(){
  register_setting( 'simple_rewrite_rules', 'simple_rewrite_rules');
  add_option( 'simple_rewrite_rules', array() );
}

function srr_admin(){
global $wp_rewrite;
$wp_rewrite->flush_rules();

$rules = get_option('simple_rewrite_rules');
$i = 0;
?>
<script type="text/javascript">
  var srr_num = <?php echo count($rules); ?>

  function srr_add(rewrite, to){
    srr_num = srr_num+1;
    jQuery('#srr_rules').append('<table border="0" id="srr_' + srr_num + '"><tr><td>Rewrite</td><td><input type="text" name="simple_rewrite_rules[' + srr_num + '][0]" value="' + rewrite + '" /></td><td>to</td><td><input type="text" name="simple_rewrite_rules[' + srr_num + '][1]" value="' + to + '" /></td><td><button type="button" class="button rbutton" style="font-weight:700;font-family:\'comic sans ms\';color:#ff0000;" onclick="srr_remove(' + srr_num + ')">X</button></td></tr></table>');
  }
  
  function srr_remove(id){
    jQuery('#srr_'+id).remove();
  }
</script>
<div id="srr_wrap">
<h2>Simple Rewrite Rules</h2>
<div id="srr_main" style="float:left;max-width:70%;">
  <form action="options.php" method="post" id="srr_form">
    <div id="srr_rules">
    <?php foreach($rules as $rule){ ?>
      <table border="0" id="srr_<?php echo $i; ?>">
        <tr>
          <td>Rewrite</td>
          <td><input type="text" name="simple_rewrite_rules[<?php echo $i; ?>][0]" value="<?php echo $rule[0]; ?>" /></td>
          <td>to</td>
          <td><input type="text" name="simple_rewrite_rules[<?php echo $i; ?>][1]" value="<?php echo $rule[1]; ?>" /></td>
          <td><button type="button" class="button rbutton" style="font-weight:700;font-family:'comic sans ms';color:#ff0000;" onclick="srr_remove(<?php echo $i; ?>)">X</button></td>
        </tr>
      </table>
    <?php
      $i++;
      }
    ?>
      <table border="0" id="srr_<?php echo $i; ?>">
        <tr>
          <td>Rewrite</td>
          <td><input type="text" name="simple_rewrite_rules[<?php echo $i; ?>][0]" /></td>
          <td>to</td>
          <td><input type="text" name="simple_rewrite_rules[<?php echo $i; ?>][1]" /></td>
          <td><button type="button" class="button rbutton" style="font-weight:700;font-family:'comic sans ms';color:#ff0000;" onclick="srr_remove(<?php echo $i; ?>)">X</button></td>
        </tr>
      </table>
    </div>
    <button type="button" class="button rbutton" onclick="srr_add('','')">Add</button>
    <input type="submit" class="button-primary" name="submit" value="Save">
    <div>
      <input type="hidden" name="action" value="update">
      <input type="hidden" name="page_options" value="simple_rewrite_rules">
      <?php wp_nonce_field('update-options'); ?>
    </div>    
  </form>
</div>
<div id="srr_sidebar" style="width:320px;float:right;">
  <iframe src="http://dev.linksku.com/wp/sidebar.php" frameborder="0" scrolling="no" style="border:none;height:800px;width:100%;min-width:320px;overflow:hidden"></iframe>  
</div>
</div>
<?php
}


function srr_init(){
  $rules = get_option('simple_rewrite_rules');
  if(!is_array($rules)) return false; 
  add_rewrite_rule('news/?$','index.php' ,'top');
  foreach($rules as $rule){ 
    add_rewrite_rule($rule[0],$rule[1],'top');
  }
}


add_action('admin_menu', 'srr_menu');    
add_action('init','srr_init');

?>
