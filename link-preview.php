<?php
$url = htmlspecialchars(trim($received_url),ENT_QUOTES,'ISO-8859-1',TRUE);

$host = '';

if( !empty($url) )
{
    $url_data = parse_url($url);
    $host = $url_data['host'];

    $file = fopen($url,'r');
    
    if(!$file)
    {
        exit();
    }
    else
    {
        $content = '';
        while(!feof($file))
        {
            $content .= fgets($file,1024);
        }

        $meta_tags = get_meta_tags($url);

        // Get the title
        $title = '';

        if( array_key_exists('og:title',$meta_tags) )
        {
            $title = $meta_tags['og:title'];
        }
        else if( array_key_exists('twitter:title',$meta_tags) )
        {
            $title = $meta_tags['twitter:title'];
        }
        else
        {
            $title_pattern = '/<title>(.+)<\/title>/i';
            preg_match_all($title_pattern,$content,$title,PREG_PATTERN_ORDER);

            if( !is_array($title[1]) )
                $title = $title[1];
            else
            {
                if( count($title[1]) > 0 )
                    $title = $title[1][0];
                else
                    $title = 'Title not found!';
            }
        }

        $title = ucfirst($title);

        // Get the description
        $desc = '';
        
        if( array_key_exists('description',$meta_tags) )
        {
            $desc = $meta_tags['description'];
        }
        else if( array_key_exists('og:description',$meta_tags) )
        {
            $desc = $meta_tags['og:description'];
        }
        else if( array_key_exists('twitter:description',$meta_tags) )
        {
            $desc = $meta_tags['twitter:description'];
        }
        else
        {
            $desc = 'Description not found!';
        }

        $desc = ucfirst($desc);

        // Get url of preview image
        $img_url = '';
        if( array_key_exists('og:image',$meta_tags) )
        {
            $img_url = $meta_tags['og:image'];
        }
        else if( array_key_exists('og:image:src',$meta_tags) )
        {
            $img_url = $meta_tags['og:image:src'];
        }
        else if( array_key_exists('twitter:image',$meta_tags) )
        {
            $img_url = $meta_tags['twitter:image'];
        }
        else if( array_key_exists('twitter:image:src',$meta_tags) )
        {
            $img_url = $meta_tags['twitter:image:src'];
        }
        else
        {
            // Image not found in meta tags so find it from content
            $img_pattern = '/<img[^>]*'.'src=[\"|\'](.*)[\"|\']/Ui';
            $images = '';
            preg_match_all($img_pattern,$content,$images,PREG_PATTERN_ORDER);

            $total_images = count($images[1]);
            if( $total_images > 0 )
                $images = $images[1];

            for($i=0; $i<$total_images; $i++)
            {
                if(getimagesize($images[$i]))
                {
                    list($width,$height,$type,$attr) = getimagesize($images[$i]);
                    
                    if( $width > 600 ) // Select an image of width greater than 600px
                    {
                        $img_url = $images[$i];
                        break;
                    }
                }
            }
        }
        
                echo '<div class="row">';
                    echo '<div class="col-6">';
                    echo "<img src='$img_url' alt='Preview image'>";
                    echo "</div>";
                    echo '<div class="col-6">';
                       
                    echo "<h3>$title</h3><p>$desc</p>";
                    echo '<a href="'. $url .'">Tekintsd meg az eredeti oldalon!</a>';
        echo "</div></div>";
    }
}
?>