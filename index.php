<?php
$root = "";
$filetemp = "index";
include ($root . "common.php");
relogin();

$page_title = $lang['trangchu'];

$_SESSION['item_id'] = intval($_GET['item_id']);
include ($root. "includes/header". $phpEx);
if($_SESSION['e'])
{
	$temp->assign(array(
		"ERROR" => $lang['e'.$_SESSION['e']],
		)
	);
	$_SESSION['e'] = '';
}
$mxh->CreatFeed('',$lang);
$select = $mxh->SELECT("*",T_PHOTO_ALBUM,"`".C_USER_ID."`='".USER_ID."'");
while($row = mysql_fetch_array($select))
{
	$album[] =$row[C_NAME];
	$albumid[] = $row[C_ALBUM_ID];
}
$temp->assign(array(
	'select_nha' => 'snavselect',
	'USER_TITLE' => $lang['user_title'].$_SESSION['user_name'],
	'TOOLS_TITLE' => $lang['tools_title'],
	'DANGNHAP' => $lang['dangnhap'],
	'LINK_LOGIN' => 'login.php',
	'DANGKY' => $lang['dangki'],
	'LINK_REGISTER' => 'register.php',
	'CHIASE' => $lang['chiase'],
	'ADD_PHOTO' => ucfirst($lang['add_photo']),
	'MOTA' => $lang['mota'],
	'NEW_JOIN' => $lang['new_join'],
	'URL' =>  base64_encode($_SERVER['REQUEST_URI']),
	'ALBUM' => $album,
	'ALBUMID' => $albumid,
	'DANG_ANH' => $lang['dang_anh'],
	)
);
include ($root. "includes/footer.php");
?>  