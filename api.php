<?php include( 'header.php' ); ?> 

<div id="interiorContainer" class="clearfix">

<ul id="index">

<li><a href="get_started.php">Getting Started</a></li>
    <li class="on"><a href="api.php">API Documentation</a>
        <ul>
            <li><a href="authentication.php">Authentication</a></li>
            <li><a href="formats.php">Request / Response Formats</a></li>
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

<h2>API Documentation</h2>
<p>VC4A exposes its data via a RESTful Application Programming Interface (API), so developers can interact in a programmatic way with the VC4A platform.
    This document is the official reference for that functionality. The current API version is 1.0.</p>
<ul>
<li><a href="authentication.php">Authentication</a></li>
<li><a href="formats.php">Request / Response Formats</a></li>
<li><a href="rate_limiting.php">Rate Limiting</a></li>
<li><a href="badges.php">Badges</a></li>
<li><a href="users.php">Users</a></li>
<li><a href="ventures.php">Ventures</a></li>



</ul>
</div>

<?php include( 'footer.php' ); ?>  
    
</body>
</html>