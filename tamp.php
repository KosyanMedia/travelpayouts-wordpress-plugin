<?php
// Заменяемый текст
$find = 'test111';
$replace = 'test11122';
$find = preg_quote($find);

// Сначала ищем теги <a>
$tags = array();
if (preg_match_all( // (?!.*?<\/[aA](\s*)? >.*?)
    "/<[aA](?:\s[^>]*)?>.*?<\/[aA](?:\s*)?>/",
    $post_content,$matches,PREG_OFFSET_CAPTURE//+PREG_SET_ORDER
))
{
    foreach($matches[0] as $tagA)
        $tags[] = array($tagA[1],$tagA[1]+strlen($tagA[0]));
}

if (preg_match_all("/$find/",
    $post_content,$matches,PREG_OFFSET_CAPTURE//+PREG_SET_ORDER
))
{
    $len = strlen($find);
    // переворачиваем массив для замены с конца, чтобы сдвиг не мешал
    foreach(array_reverse($matches[0]) as $found) {
        $pos = $found[1];
        $inTag = false;
        foreach($tags as $tagPos)
            if ($tagPos[0]<$pos && $pos<$tagPos[1]) {
                $inTag = true;
                break;
            }
        if ( ! $inTag)
            $post_content = substr_replace($post_content, $replace, $pos, $len);
    }
}
error_log($post_content);
/*
 важный момент: в $find должен быть заэкранирован ряд символов  / ( ) [ ] . + *   - все что используются в регулярках
[20:55:20] "KPD" - Zlatokrylets Aleksander Victorovich: сделай $find = preg_quote($find);
[22:23:58] "KPD" - Zlatokrylets Aleksander Victorovich: Вот ещё одно решение от Лейкина Сани:
[22:24:07] "KPD" - Zlatokrylets Aleksander Victorovich: $post_content = '<a href="">test111 <br/></a> test111 <a></a>test111 <a>test111</a> <a> test111 test111 test111 </a>';
$find = 'test111';
$replace = 'test11122';

$post_lines = str_replace("\n","\v", $post_content);

$post_lines = str_replace ( ["<a>"  ,"<a "  	 , "</a>"]
                           ,["\n<a>", "\n<a ", "</a>\n"]
                           , $post_content);

$post_array = explode("\n",   $post_lines);

foreach ($post_array as $n => $line) {
    if (strpos($line,'</a>')!==false) continue;
    $post_array[$n] = str_replace($find, $replace, $line);
}
$post_content = str_replace("\v", "\n", join('',$post_array));
****************************
 $post_content = ' test111 </a> test111 <a href="">test111 <br/></a> test111 <a></a>test111 <a>test111</a> <a> test111 test111 test111 </a   > test111 <a> test111 ';
$find = 'test111';
$replace = 'test11122';

$a_tags = [0]; //start for [0] position
$pos = -1; //cursor
$tag = '<a';
$i = 0;
while (($pos = stripos($post_content, $tag, $pos+1)) !==false) {
$a_tags[] = $pos;
$tag = ($i++ % 2) ? '<a' : '</a>';
}
if ($tag ==='</a>') array_pop($a_tags);
$a_tags[] = strlen($post_content); //end for [strlen] position

foreach(array_reverse(array_chunk($a_tags,2)) as list($start, $end)) {
$chunk_len = $end-$start;
$replacement = str_replace($find,$replace, substr($post_content, $start, $chunk_len));
$post_content = substr_replace($post_content, $replacement, $start, $chunk_len);
}
echo $post_content;



 */

//$match = preg_match_all('/test111/',$data['post_content'], $search);
/*$match = preg_replace(
    '/test111/',//[^>][^<] [^\<a.*?\>]test111[^\<\/a\>]
    '<a href="">test111</a> ',
    $data['post_content'],
    -1,
    $count);*/
/*$data['post_content'] = preg_replace_callback(
    '/(^test111$)[^<a.*?>(test111)<\/a>]/m',//|(\b)test111(\b)(test111)|^test111|test111|test111$
    array( &$this, 'tp_preg_replace'),
    $data['post_content'],
    -1,
    $count
);
//error_log(print_r($match, true));
error_log(print_r($count, true));
/*$data['post_content'] = preg_replace(
    '|[^<a.*?>]test111[^<\/a>]|',//[^>][^<] [^\<a.*?\>]test111[^\<\/a\>]
    '<a href="">test111</a> ',
    $data['post_content']);

/*$data['post_content'] = preg_replace_callback(
    '/[^>]test111[^<]/',
    array( &$this, 'tp_preg_replace'),
    $data['post_content']
);
/*if(strpos($title, 'origin') !== false){
    $data['post_content'] = str_replace(
        'origin',
        '<span data-title-case-origin-iata="'.$origin.'">'.$origin.'</span>' ,
        $title);
}*/
//$data['post_content'] = str_replace(' '.'test111', ' <a href="test111">test111</a> ', $data['post_content']);
/*$data['post_content'] = preg_replace(
    '/^test111$/',
    ' <a href="test111">test111</a>',
    $data['post_content']);

error_log(print_r(preg_replace(
    '/^test111$/',
    ' <a href="test111">test111</a>',
    $data['post_content']), true));*/


//'[^<a.*?>(test111)<\/a>]|(\b)test111(\b)(test111)|^test111|test111|test111$'