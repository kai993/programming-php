<?php
class YoutubeCategoryAPI
{
  private $youtubeCategories;

  private function getCategories()
  {
    return array(
      1 => '映画とアニメ',
      2 => '自動車と乗り物',
      10 => '音楽',
      15 => 'ペットと動物',
      17 => 'スポーツ',
    );
  }

  public function do()
  {
    // 本来はAPIを叩いてリクエストボディを取得・解析する
    $categories = $this->getCategories();
    $this->youtubeCategories = array();

    // 解析
    foreach ($categories as $id => $name) {
      $a = array(
        'id'   => $id,
        'name' => $name,
      );
      $this->youtubeCategories[] = $a;
    }
  }

  // カテゴリ一覧をJSON形式で返す
  public function toJSON()
  {
    // arrayをjson形式にする
    // JSON_UNESCAPED_UNICODE は日本語で表示できるようにする
    return json_encode($this->youtubeCategories, JSON_UNESCAPED_UNICODE);
  }
}
