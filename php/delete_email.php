<?php


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Страница удаления email с базы</h1>
<h2>Введите email который нужно удалить</h2>
<form>
    <input type="email" id="inputEmail" name="inputEmail">
    <input type="button" value="найти в базе" onclick="findEmailInBase()">
    <div id="text"></div>

</form>
<form method="post" action="">
    <div style="display: none;" id="form" class="form">
        <input type='hidden' id='thisIdEmail' name='thisIdEmail' value=" + key + ">
        <input type='button' id='deleteThisEmail' name='delete_this_email' onclick='confirmDelete(this)'
                value='удалить и продолжить'>
    </div>
</form>
<?php
$mail = $mi->query("select `id`,`email` from `omelchenko_email`");
$i = 0;
echo '<table>';
while ($row = $mail->fetch_assoc()) {
    $resultEmail[$i];
    $resultSelect[$i] = '<tr><td>' . $row['id'] . '</td><td>' . $row['email'] . '<td><form method="post" action=""><input type="hidden" name="idEmail" value="' . $row['id'] . '" ><input onclick="confirmDelete(this)" type="button" name="deleteEmail" value="удалить"></form></td></tr>';
    echo $resultSelect[$i];
    $asocArr[$row['id']] = $row['email'];
    $i++;
}

echo '</table>';
$json = json_encode($asocArr);

?>
<script>
    function findEmailInBase() {
        var inputEmail = document.getElementById('inputEmail').value;
        var arrEmail =<?php echo $json;?>;
        Object.prototype.getKey = function (value) {
            for (var key in this) {
                if (this[key] == value) {
                    return key;
                }
            }
            return null;
        };
        var key = arrEmail.getKey(inputEmail);
        if (key) {
            document.getElementById('text').innerHTML = '№' + key + '-' + inputEmail;
            document.getElementById('form').style.display = "block";
            document.getElementById('thisIdEmail').value = key;
        }
        else{
            document.getElementById('text').innerHTML = "такого адреса не в базе";
            document.getElementById('form').style.display = "none";

        }

    }


    function confirmDelete(el) {
        var confDell = confirm('Вы точно хотите удалить данный емейл?');
        if (confDell === true) {
            el.setAttribute('type', 'submit');
        }
    }

</script>
<?php
if (isset($_POST['delete_this_email'])) {
    $thisIdEmail = $_POST['thisIdEmail'];
    $mi->query("DELETE FROM `omelchenko_email` WHERE `id` = '$thisIdEmail'");
    $mi->query("ALTER TABLE omelchenko_email DROP COLUMN `id`");
    $mi->query("ALTER TABLE `omelchenko_email` ADD `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY");
    echo "<meta http-equiv='refresh' content='0'>";
}
if (isset($_POST['deleteEmail'])) {
    $idEmail = $_POST['idEmail'];
    $mi->query("DELETE FROM `omelchenko_email` WHERE `id` = '$idEmail'");
    $mi->query("ALTER TABLE omelchenko_email DROP COLUMN `id`");
    $mi->query("ALTER TABLE `omelchenko_email` ADD `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY");
    echo "<meta http-equiv='refresh' content='0'>";
}
?>
</body>
</html>
