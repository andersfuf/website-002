<?php

function pagination($pages = '', $range = 1)
{
     $showitems = ($range * 2)+1;

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }

     if(1 != $pages)
     {
         echo "<div class=\"pagination pagination__posts\"><ul>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li class='first'><a href='".get_pagenum_link(1)."'>First</a></li>";
         if($paged > 1 && $showitems < $pages) echo "<li class='prev'><a href='".get_pagenum_link($paged - 1)."'>Prev</a></li>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<li class=\"active\"><a href=''>".$i."</a></li>":"<li><a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a></li>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<li class='next'><a href=\"".get_pagenum_link($paged + 1)."\">Next</a></li>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li class='last'><a href='".get_pagenum_link($pages)."'>Last</a></li>";
         echo "</ul></div>\n";
     }
}
