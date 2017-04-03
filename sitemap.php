<?php
  include('database.php');
  header("Content-Type: text/xml");
   $dat=date('Y-m-j');
  function xmlentities($text)
  {
    $search = array('&','<','>','"','\'');
    $replace = array('&amp;','&lt;','&gt;','&quot;','&apos;');
    return str_replace($search,$replace,$text);   
  }
	echo'<?xml version="1.0" encoding="UTF-8"?>';
	echo'<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
  $sql = $mysqli->query("SELECT * FROM tb_berita order by id_berita desc limit 0, 500");
  while($row = $sql->fetch_array())
  {
    // create the loc (URL) value based on the $row array, for example:
	$Judul = preg_replace("/\s/","-",$row['judul']);
	$url_link = "post-".$row['id_berita']."-".$Judul.".html";
    print "<url>";
    print "<loc>http://rekalpa.com/".xmlentities($url_link)."</loc>";
    print "<lastmod>".$dat."</lastmod>";
    print "<changefreq>weekly</changefreq>";
    print "<priority>1</priority>";
    print "</url>";
  }
  print "</urlset>";
?>