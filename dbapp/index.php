<!--/*
  *
  * Revive Adserver Javascript Tag
  * - Generated with Revive Adserver v3.2.1
  *
  */-->

<!--/*
  * The backup image section of this tag has been generated for use on a
  * non-SSL page. If this tag is to be placed on an SSL page, change the
  *   'http://172.16.16.79/revive/www/delivery/...'
  * to
  *   'https://172.16.16.79/revive/www/delivery/...'
  *
  * This noscript section of this tag only shows image banners. There
  * is no width or height in these banners, so if you want these tags to
  * allocate space for the ad before it shows, you will need to add this
  * information to the <img> tag.
  *
  * If you do not want to deal with the intricities of the noscript
  * section, delete the tag (from <noscript>... to </noscript>). On
  * average, the noscript tag is called from less than 1% of internet
  * users.
  */-->

<script type='text/javascript'><!--//<![CDATA[
   var m3_u = (location.protocol=='https:'?'https://172.16.16.79/revive/www/delivery/ajs.php':'http://172.16.16.79/revive/www/delivery/ajs.php');
   var m3_r = Math.floor(Math.random()*99999999999);
   if (!document.MAX_used) document.MAX_used = ',';
   document.write ("<scr"+"ipt type='text/javascript' src='"+m3_u);
   document.write ("?zoneid=1&amp;target=_blank");
   document.write ('&amp;cb=' + m3_r);
   if (document.MAX_used != ',') document.write ("&amp;exclude=" + document.MAX_used);
   document.write (document.charset ? '&amp;charset='+document.charset : (document.characterSet ? '&amp;charset='+document.characterSet : ''));
   document.write ("&amp;loc=" + escape(window.location));
   if (document.referrer) document.write ("&amp;referer=" + escape(document.referrer));
   if (document.context) document.write ("&context=" + escape(document.context));
   if (document.mmm_fo) document.write ("&amp;mmm_fo=1");
   document.write ("'><\/scr"+"ipt>");
//]]>--></script><noscript><a href='http://172.16.16.79/revive/www/delivery/ck.php?n=af130250&amp;cb=INSERT_RANDOM_NUMBER_HERE' target='_blank'><img src='http://172.16.16.79/revive/www/delivery/avw.php?zoneid=1&amp;cb=INSERT_RANDOM_NUMBER_HERE&amp;n=af130250' border='0' alt='' /></a></noscript>


<?php
/**
 * Created by IntelliJ IDEA.
 * User: hieuvt
 * Date: 05/10/2015
 * Time: 09:27
 */

if (isset($_GET['addjoke'])) {
    include 'form.html.php';
    exit();
}

include 'db.inc.php';

if (isset($_POST['joketext'])) {
    $joketext = mysqli_real_escape_string($link, $_POST['joketext']);
    $addedText = addJoke($joketext);
    header('Location: .');
    exit();
}

if (isset($_GET['deletejoke']))
{
    $id = mysqli_real_escape_string($link, $_POST['id']);
    $delete_joke = deleteJoke($id);
    header('Location: .');
    exit();
}

$jokes = takeAllJokes();
include 'jokes.html.php';

?>

