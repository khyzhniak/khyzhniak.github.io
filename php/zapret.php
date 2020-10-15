<?
$cur_user_id = get_current_user_id();
echo $cur_user_id;
$user_info = get_userdata($cur_user_id);
echo 'Имя пользователя: ' . $user_info->user_login . "\n";
echo 'Уровень доступа: ' . $user_info->user_level . "\n";
echo 'ID: ' . $user_info->ID . "\n";
if ($user_info->user_level != 10) {
    echo "you dont be admin"
        . '
    <script type="text/javascript">
    document.ondragstart = noselect; 
    // запрет на перетаскивание 
    document.onselectstart = noselect; 
    // запрет на выделение элементов страницы 
    document.oncontextmenu = noselect; 
    // запрет на выведение контекстного меню 
    function noselect() {return false;} 
</script>
    ';

} else {
    echo "you are admin" ;
}
?>