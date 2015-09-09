<?php include( 'header.php' ); ?> 

<div id="interiorContainer" class="clearfix">

<ul id="index">

<li><a href="get_started.php">Getting Started</a></li>
    <li class="on"><a href="api.php">API Documentation</a>
        <ul>
            <li><a href="authentication.php">Authentication</a></li>
            <li><a href="formats.php">Request / Response Formats</a></li>
            <li class="on"><a href="rate_limiting.php">Rate Limiting</a></li>
            <li><a href="badges.php">Badges</a></li>
            <li><a href="users.php">Users</a></li>
            <li><a href="ventures.php">Ventures</a></li>
        </ul>
    </li>
    <li><a href="best_practices.php">Best Practices</a></li>
    <li><a href="changelog.php">Revision History</a></li>

</ul>

<div id="content">

<h2>Rate Limiting</h2>
<p>In its initial v1 release, VC4A does not limit requests from its API beta partners. As the API is opened to additional users post-beta,
    default limits will be put into place that are more than sufficient for most API usage. Please review our <a href="best_practices.php">best practices</a> for using the VC4A API.

<h3>High-volume users</h3>
<p>If you anticipate high-volume usage of the VC4A API, please contact us at <a  href="&#109&#97&#105&#108&#116&#111&#58&#97&#112&#105&#64&#118&#99&#52&#97&#102&#114&#105&#99&#97&#46&#98&#105&#122">&#97&#112&#105&#64&#118&#99&#52&#97&#102&#114&#105&#99&#97&#46&#98&#105&#122</a> to discuss your options.</p>
<!--p>When contacting VC4A support include a description of how you are using the VC4A API, which API endpoints you are using, an estimate of current request volumes for a 24 hour period, and your VC4A partnerID and API Key</a>.</p-->
</div>

<?php include( 'footer.php' ); ?> 
    
</body>
</html>