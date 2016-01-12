<?php include( 'header.php' ); ?> 

<div id="interiorContainer" class="clearfix">

<ul id="index">

<li><a href="get_started.php">Getting Started</a></li>
    <li><a href="api.php">API Documentation</a></li>
    <li class="on"><a href="best_practices.php">Best Practices</a></li>
    <li><a href="changelog.php">Revision History</a></li>

</ul>

<div id="content">

<h2>VC4A API Best Practices</h2>
<p><em>Please follow these guidelines when using the VC4A API</em></p>
<h4>Rate Limiting</h4>
<p>VC4A does not currently institute rate limits for its v1 API, although we will set reasonable limits for API users post-beta.
We will ensure that our default limits are more than sufficient for nearly all use cases.
<em>Even so, please read through this documentation in its entirety to avoid common causes of rate limiting issues which may occur in the future.</em></p>

<h4>Caching</h4>
<p>Since <em>VC4A links never change or expire</em>, we ask that you cache data locally wherever possible.</p>
<h4>Avoiding API Calls on Page Loads</h4>
<p>Most rate limiting issues are caused by extraneous API calls. We ask that you avoid making calls to the VC4A API on page loads, and instead make these calls based on explicit user actions (such as clicking a “share” button).</p>
<h4>API Key / OAuth Token Security</h4>
<p>To ensure the security of your API key and/or OAuth access token, we strongly suggest that you make requests to the VC4A API server-side whenever possible.</p>
<p>Any requests to the VC4A API made via client-side Javascript present the risk of your OAuth token or API key being compromised,
  but there are steps you can take to partially mitigate this risk. Most importantly, never include your API key or access token inline in the page. Keep any references to your API key or access oken in code that is contained in external javascript files which are included in the page.
  For additional security, don't have the key or token itself contained anywhere in your javascript code, but rather make an ajax call to load it, and keep it in a variable stored in a privately scoped method. <!--For an example of this implementation, please see our sample <a href="static/js_examples/api_key.php">html</a> and included <a href="static/js_examples/api_key_include.js">javascript</a> files--></p>
<p>If you have any specific questions about API key and access token security, please don't hesitate to contact us at api@vc4a.com.</p>

<h4>HTTP Response Status Codes</h4>
<p>Please note that all valid responses in json and xml format will carry an HTTP Response Status Code of 200. This means that <strong>invalid, malformed or rate-limited json and xml requests may still return an HTTP response status code of 200</strong>. In json and xml responses, the <code>status_code</code> and <code>status_txt</code> values indicate whether a request is well formed and valid. For txt format calls, the HTTP Response Status Codes 403, 500 and 503 are used denote rate limiting, a problem with the request format, or an unknown error.</p>
<h4>Checking for Errors</h4>
<p>An invalid or rate limited request to the VC4A API will not return requested data.  Please check all API responses for errors, and fallback if necessary.  Invalid or rate limited API calls made via Javascript will often return <code>https://api.vc4a.com/undefined</code> -- if you are seeing such links, please check the <code>status_code</code> and <code>status_txt</code> values for errors.</p>
<h4>Efficient Query Patterns</h4>
<p>The VC4A API does not support multiple queries in a single API call. However, API endpoints such as <code>/v1/ventures/search</code> allow for compound queries with several optional parameters including <code>country</code>, <code>sector</code>, <code>fundStatus</code> and so on.
These may be combined to create complex queries. Rather than iterating through all ventures, we suggest that you design your app in such a way as to make use of these query patterns.</p>
<h4>High-Volume Requests</h4>
<p>If you need to make a large number of requests to the VC4A API, we recommend that you leave ample time to spread these requests out over many hours. To inquire about a high-volume VC4A Enterprise license, please contact enterprisehelp@vc4a.com.</p>

</div>

<?php include( 'footer.php' ); ?>    
    
</body>
</html>