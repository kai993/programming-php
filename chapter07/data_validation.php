<?php
error_reporting(0);
$name       = $_POST['name'];
$mediaType  = $_POST['media_type'];
$filename   = $_POST['filename'];
$caption    = $_POST['caption'];
$status     = $_POST['status'];

$tried = ($_POST['tried'] == 'yes');

if ($tried) {
    $validated = (!empty($name) && !empty($mediaType) && !empty($filename));

    if (!$validated) { ?>
        <p>名前、メディア形式、ファイル名は必須入力項目です。
            値を入力してください。</p>
    <?php }
}

if ($tried && $validated) {
    echo "<p>データが作成されました</p>";
}

// メディア形式が選択されたいた場合、それを選択した状態にする
function mediaSelected($type)
{
    global $mediaType;

    if ($mediaType == $type) {
        echo "selected";
    }
} ?>

<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">
    名前 : <input type="text" name="name" value="<?= $name; ?>" /><br />

    状態 : <input type="checkbox" name="status" value="active" /> 公開<br />

    メディア形式 : <select name="media_type">
        <option value="">選択してください</option>
        <option value="picture" <?php mediaSelected("picture"); ?> >静止画</option>
        <option value="audio"   <?php mediaSelected("audio"); ?> >音声</option>
        <option value="movie"   <?php mediaSelected("movie"); ?> >動画</option>
    </select><br />

    ファイル名 : <input type="text" name="filename" value="<?= $filename; ?>" /><br />

    見出し : <textarea name="caption"><?= $caption; ?></textarea>

    <input type="hidden" name="tried" value="yes" />
    <input type="submit" value="<?php echo $tried ? "続行" : "作成" ?>"<br />
</form>
