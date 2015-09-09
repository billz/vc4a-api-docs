<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>VC4A API Documentation</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="static/style.css" type="text/css" charset="utf-8" />
    <link rel="stylesheet" href="static/prettify.css" type="text/css" charset="utf-8" />
    <link rel="shortcut icon" href="http://vc4africa.biz/wp-content/themes/vc4africa/favicon.ico" />
</head>
<body  id="interior">
 <div id="nav">
    <ul class="clearfix">
        <li id="logo"><a href="index.php"><img src="static/images/logo.gif" width="142" height="31" alt="VC4A Developer" /></a></li>
        <li><a href="documentation.php">Documentation</a></li>
        <li><a href="libraries.php">Libraries &amp; Tools</a></li>
        <li><a href="community.php">Community</a></li>
        <li><a href="my_apps.php">My Apps</a></li>
    </ul>
</div> 
<div id="interiorContainer" class="clearfix">

<ul id="index">

<li><a href="get_started.php">Getting Started</a></li>
    <li class="on"><a href="api.php">API Documentation</a>
        <ul>
            
            <li><a href="formats.php">Request / Response Formats</a></li>
            <li class="on"><a href="cors.php">CORS (Cross Origin Resource Sharing)</a></li>
            <li><a href="rate_limiting.php">Rate Limiting</a></li>
                                    
            <li><a href="badges.php">Badges</a></li>
            
            <li><a href="users.php">Users</a></li>
                   
            <li><a href="ventures.php">Ventures</a></li>
            
            
            
        </ul>
    </li>
    <li><a href="best_practices.php">Best Practices</a></li>
    <li><a href="changelog.php">Revision History</a></li>

</ul>

<div id="content">

<h2>CORS or Cross Origin Resource Sharing.</h2>
<p>The VC4A API supports CORS, or Cross Origin Resource Sharing.</p>
<p>Historically, Javascript AJAX requests were restricted to a same domain origin policy. This meant that your website at <code>http://mysite.com/</code> could not make AJAX requests to <code>https://api-ssl.VC4A.com/</code>, since they were not the same domain. </p>
<p>With the introduction of HTML5 and advancements in modern browsers, CORS allows website owners to control who can access data via Javascript AJAX requests. In this way, CORS functions like Flash's Cross Domain Origin Policy. The latest version of the VC4A API (V3) supports CORS requests from any domain.</p>
<p>Here is some basic example Javascript to get you started:</p>
<pre><code>var xhr = new XMLHttpRequest();
xhr.open("GET", "https://api-ssl.VC4A.com/v3/.....");
xhr.onreadystatechange = function() { 
    if(xhr.readyState == 4) { 
        if(xhr.status==200) {
            console.log("CORS works!", xhr.responseText);         
        } else {
            console.log("Oops", xhr);
        }
    } 
}
xhr.send();
</code></pre>
<p>you can also read more about CORS <a href="http://en.wikipedia.org/wiki/Cross-Origin_Resource_Sharing">here</a></p>
</div>

<div class="footer">
    &copy; 2012 vc4a
    
</div>
</div>

<script>
 var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-19287275-5']);
  _gaq.push(['_trackPageview']);

(function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<script src="static/prettify.js"></script>
<script>
addEventListener('load', function (event) { prettyPrint() }, false);
</script>
</body>
</html>