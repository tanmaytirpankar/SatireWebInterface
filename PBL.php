<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-76791127-3', 'auto');
  ga('send', 'pageview');

</script>

<?php 
// require utilities
require 'utilities/utilities.php';

// file path
$filePath = "/home/sawaya/install/tomcat/apache-tomcat-7.0.26/webapps/pbl/python/count/pblCount.txt";

// record visit count
incrementCounter($filePath);

// require view pybool
require 'views/PBL.php';

?>
