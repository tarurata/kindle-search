<?php

require('./vendor/autoload.php');

$k = $_REQUEST['k'];

$url = 'https://www.amazon.co.jp/s?k=' . urlencode($k) . '&i=digital-text&__mk_ja_JP=カタカナ&ref=nb_sb_noss_1';

$html = file_get_contents($url);

for($i=0;$i<16;$i++){
    $items[] = [
                'name'=>phpQuery::newDocument($html)->find("h2")->find("a")->find("span:eq($i)")->text(),
                'link'=>"https://www.amazon.co.jp" . phpQuery::newDocument($html)->find("h2")->find("a.a-link-normal:eq($i)")->attr('href'),
                'imgsrc'=>phpQuery::newDocument($html)->find("img.s-image:eq($i)")->attr('src')
               ];
}
