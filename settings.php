<?php


    $file = 'example2.html';
    $dom = new DOMDocument;
    $dom->loadHTMLFile($file, LIBXML_NOERROR | LIBXML_NOWARNING );
    
    $tags = $dom->getElementsByTagName('meta');
    $meta_array = array('keywords', 'description');
    
    foreach ($tags as $tag) {
        $res = $tag->getAttribute('name');
        if (!empty($res) && in_array(strtolower($res), $meta_array))  {
                //echo('my_name=' . $res . '<br>');
                $tag->parentNode->removeChild($tag);
        }
    }

    $tags = $dom->getElementsByTagName('title');

    foreach ($tags as $tag) {
        //echo('my_name=' . var_dump($tag) . '<br>');

        $tag->parentNode->removeChild($tag);
    
    }

   echo $dom->saveHTML();

?>