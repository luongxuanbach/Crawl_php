<?php

require_once 'simple_html_dom.php';

$arrContextOptions = array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    )
);
$content = file_get_html('https://dantri.com.vn/the-thao.htm', false, stream_context_create($arrContextOptions));

$posts = $content->find('div.article.list article');

if(!empty($posts)){
    foreach($posts as $item){
        $title = $item->find('.article-title', 0)->plaintext;
        $title_html = $item->find('.article-title', 0)->innertext;
        $title_outer = $item->find('.article-title', 0)->outertext;
        $link = $item->find('.article-title a', 0)->href;
        echo $link.'</br>';
        // var_dump($title_outer);
        // echo $title.'</br>';
    }
}
