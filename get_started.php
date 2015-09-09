<?php include ('header.php'); ?>

<div id="interiorContainer" class="clearfix">

<ul id="index">

<li class="on"><a href="get_started.php">Getting Started</a></li>
    <li><a href="api.php">API Documentation</a></li>
    <li><a href="best_practices.php">Best Practices</a></li>
    <li><a href="changelog.php">Revision History</a></li>

</ul>

<div id="content">

<h2>Getting Started</h2>
<p>Welcome to the VC4A API! If you're looking to query venture data across countries or sectors, get details on unlocked badges, or retrieve user profiles and metadata programmatically, you've come to the right place.</p>

<p>If all you're looking to do is fetch a list of ventures, you can call the VC4A API's <a href="ventures.php">/v1/ventures method</a> using your VC4A login and API key, both of which you can find <a href="my_apps.php">here</a>.</p>
<p>If you are looking to work with multiple end-users, or to pull any information on a user level, you'll need to <a href="my_apps.php">register an application with us</a> to <a href="authentication.php">authenticate</a> with our API.</p>
<p>Once you've registered an app with us, you can check out some <a href="libraries.php">libraries and tools</a> for interacting with the VC4A API via a number of popular programming languages, or proceed to the <a href="api.php">API documentation</a> directly.</p>
<p>If you're looking for some help getting started with the VC4A API, feel free to reach out to the <a href="community.php">API developer community</a> with any questions!</p>
</div>

<?php include( 'footer.php' ); ?> 

</body>
</html>