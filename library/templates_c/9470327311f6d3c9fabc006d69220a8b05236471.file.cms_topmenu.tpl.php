<?php /* Smarty version Smarty-3.1.18, created on 2017-02-15 18:00:09
         compiled from "/Users/bart/Websites/themarket/library/templates/cms_topmenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:115544944758a47afeac1b27-02269131%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9470327311f6d3c9fabc006d69220a8b05236471' => 
    array (
      0 => '/Users/bart/Websites/themarket/library/templates/cms_topmenu.tpl',
      1 => 1487174406,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '115544944758a47afeac1b27-02269131',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_58a47afeb12f39_45898953',
  'variables' => 
  array (
    'settings' => 0,
    'translate' => 0,
    'camps' => 0,
    'currentcamp' => 0,
    'c' => 0,
    'campaction' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58a47afeb12f39_45898953')) {function content_58a47afeb12f39_45898953($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/Users/bart/Websites/themarket/library/smarty/libs/plugins/modifier.replace.php';
?><header class="header-top">
	<div class="header-top-inner container-fluid">
 		<div class="pull-left">
			<a href="#" class="menu-btn visible-xs">&#9776;</a>
			<a href="<?php echo $_smarty_tpl->tpl_vars['settings']->value['rootdir'];?>
/" class="brand"><?php echo $_smarty_tpl->tpl_vars['translate']->value['site_name'];?>
</a>
 		</div>
		<ul class="nav navbar-nav pull-right">
	 		<?php if (count($_smarty_tpl->tpl_vars['camps']->value)>1) {?>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user visible-xs"></i><span class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['currentcamp']->value['name'];?>
 </span><b class="caret"></b></a>
					<ul class="dropdown-menu dropdown-menu-right">
				 		<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['camps']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
				 			<?php if ($_smarty_tpl->tpl_vars['c']->value['id']!=$_smarty_tpl->tpl_vars['currentcamp']->value['id']) {?>
				 				<li><a href="?action=<?php echo $_smarty_tpl->tpl_vars['campaction']->value;?>
&camp=<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['c']->value['id']==$_smarty_tpl->tpl_vars['currentcamp']->value['id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['c']->value['name'];?>
</a></li>
				 			<?php }?>
				 		<?php } ?>
					</ul>
				</li>
	 		<?php } elseif (count($_smarty_tpl->tpl_vars['camps']->value)==1) {?>
	 			<li>
	 				<?php echo $_smarty_tpl->tpl_vars['camps']->value[0]['name'];?>

	 			</li>
	 		<?php } else { ?>
	 			No camps available for this user
	 		<?php }?>
			
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user visible-xs"></i><span class="hidden-xs"><?php echo $_SESSION['user']['naam'];?>
 <?php if ($_SESSION['user2']) {?>(<?php echo $_SESSION['user2']['naam'];?>
)<?php }?></span><b class="caret"></b></a>
				<ul class="dropdown-menu dropdown-menu-right">
					<li><a href="?action=cms_profile"><?php echo $_smarty_tpl->tpl_vars['translate']->value['cms_menu_settings'];?>
</a></li>
<?php if ($_SESSION['user2']) {?><li><a href="?action=exitloginas"><?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['translate']->value['cms_menu_exitloginas'],'%user%',$_SESSION['user2']['naam']);?>
</a></li><?php }?>
					<li><a href="?action=logout"><?php echo $_smarty_tpl->tpl_vars['translate']->value['cms_menu_logout'];?>
</a></li>
				</ul>
			</li>
		</ul>
 		<ul id="usersonline" class="pull-right hidden-xs"></ul>
	</div>
</header><?php }} ?>
