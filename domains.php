<?php include( 'header.php' ); ?> 

<div id="interiorContainer" class="clearfix">

<ul id="index">

<li><a href="get_started.php">Getting Started</a></li>
    <li class="on"><a href="api.php">API Documentation</a>
        <ul>
            <li><a href="formats.php">Request / Response Formats</a></li>
            <li><a href="rate_limiting.php">Rate Limiting</a></li>                  
            <li><a href="badges.php">Badges</a></li>
            <li><a href="users.php">Users</a></li>
            <li><a href="ventures.php">Ventures</a></li>
            <li class="on"><a href="domains.php">Domains</a></li>
        </ul>
    </li>
    <li><a href="best_practices.php">Best Practices</a></li>
    <li><a href="changelog.php">Revision History</a></li>

</ul>

<div id="content">

<h1>Domains</h1>

<div id="apitoc"><ul>
<li><a href="#v3_VC4A_pro_domain">/v3/VC4A_pro_domain</a></li>
<li><a href="#v3_user_tracking_domain_clicks">/v3/user/tracking_domain_clicks</a></li>
<li><a href="#v3_user_tracking_domain_shorten_counts">/v3/user/tracking_domain_shorten_counts</a></li>
</ul></div>

<div class="apiendpoint" id="v3_VC4A_pro_domain">

<h2>/v3/VC4A_pro_domain</h2>
<p>Query whether a given domain is a valid VC4A pro domain. 
Keep in mind that VC4A custom short domains are restricted to less 
than 15 characters in length.</p>
<h3>Parameters</h3>
<ul>
<li>domain - A short domain. ie: <code>nyti.ms</code>.</li>
</ul>
<h3>Return Values</h3>
<ul>
<li>VC4A_pro_domain - <code>0</code> or <code>1</code> designating whether this is a current VC4A domain.</li>
<li>domain - an echo back of the request parameter.</li>
</ul>
<h3>Example Request</h3>
<pre class="example">API Address: https://api-ssl.VC4A.com
GET /v3/VC4A_pro_domain?access_token=ACCESS_TOKEN&amp;domain=1.usa.gov</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">{
  &quot;data&quot;: {
    &quot;VC4A_pro_domain&quot;: true,
    &quot;domain&quot;: &quot;1.usa.gov&quot;
  },
  &quot;status_code&quot;: 200,
  &quot;status_txt&quot;: &quot;OK&quot;
}</pre>

</div>

<div class="apiendpoint" id="v3_user_tracking_domain_clicks">

<h2>/v3/user/tracking_domain_clicks</h2>
<p>Returns the number of clicks on VC4A links pointing to the specified tracking domain that have occured in a given time period.</p>
<p>Users can register a tracking domain from their VC4A <a href="https://VC4A.com/a/settings">settings page</a></p>
<p>Authentication: <a href="authentication.php">oauth2</a></p>
<h3>Errors</h3>
<ul>
<li><code>500</code>, <code>TRACKING_DOMAIN_NOT_REGISTERED</code></li>
</ul>
<h3>Parameters</h3>
<ul>
<li>
<p>domain - a tracking domain as returned from <code>/v3/user/tracking_domain_list</code></p>
</li>
<li>
<p>unit - <code>minute</code> | <code>hour</code> | <code>day</code> | <code>week</code> | <code>month</code> default:<code>day</code> <br/>
    <strong>Note:</strong> when <code>unit</code> is <code>minute</code> the maximum value for <code>units</code> is <code>60</code></p>
</li>
<li>units = an integer representing the time units to query data for. pass <code>-1</code> to return all units of time.</li>
<li>timezone - an integer hour offset from UTC (-12..12), or a timezone string default:<code>America/New_York</code>.</li>
<li>rollup - <code>true</code> | <code>false</code>. Return data for multiple units rolled up to a single result instead of a separate value for each period of time.</li>
<li>limit=1..1000 (default=100)</li>
<li>unit_reference_ts - an epoch timestamp, indicating the most recent time for which to pull metrics. default:<code>now</code> <br/>
    <strong>Note:</strong> the value of <code>unit_reference_ts</code> rounds to the nearest <code>unit</code>. <br/>
    <strong>Note:</strong> historical data is stored hourly beyond the most recent 60 minutes. If a <code>unit_reference_ts</code> is specified, <code>unit</code> cannot be <code>minute</code>.</li>
</ul>
<h4>Return Values</h4>
<ul>
<li>tz_offset - the offset for the specified <code>timezone</code>, in hours.</li>
<li>unit - an echo of the specified <code>unit</code> value.</li>
<li>units - an echo of the specified <code>units</code> value.</li>
<li>tracking_domain_clicks - the number of the number of clicks on VC4A links pointing to the specified tracking domain in the specified time.</li>
</ul>
<h3>Example Request</h3>
<pre class="example">API Address: https://api-ssl.VC4A.com
GET /v3/user/tracking_domain_clicks?access_token=ACCESS_TOKEN&amp;domain=usa.gov</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">{
  &quot;data&quot;: {
    &quot;tracking_domain_clicks&quot;: 206,
    &quot;tz_offset&quot;: -4,
    &quot;unit&quot;: &quot;day&quot;,
    &quot;units&quot;: -1
  },
  &quot;status_code&quot;: 200,
  &quot;status_txt&quot;: &quot;OK&quot;
}</pre>

</div>

<div class="apiendpoint" id="v3_user_tracking_domain_shorten_counts">

<h2>/v3/user/tracking_domain_shorten_counts</h2>
<p>Returns the number of links, pointing to a specified tracking domain, shortened (encoded) in a given time period by all VC4A users.</p>
<p>Users can register a tracking domain from their VC4A <a href="https://VC4A.com/a/settings">settings page</a></p>
<p>Authentication: <a href="authentication.php">oauth2</a></p>
<h3>Errors</h3>
<ul>
<li><code>500</code>, <code>TRACKING_DOMAIN_NOT_REGISTERED</code></li>
</ul>
<h3>Parameters</h3>
<ul>
<li>domain - a tracking domain as returned from <code>/v3/user/tracking_domain_list</code></li>
<li>unit - <code>minute</code> | <code>hour</code> | <code>day</code> | <code>week</code> | <code>month</code> default:<code>day</code> <br/>
    <strong>Note:</strong> when <code>unit</code> is <code>minute</code> the maximum value for <code>units</code> is <code>60</code></li>
<li>units = an integer representing the time units to query data for. pass <code>-1</code> to return all units of time.</li>
<li>timezone - an integer hour offset from UTC (-12..12), or a timezone string default:<code>America/New_York</code>.</li>
<li>rollup - <code>true</code> | <code>false</code>. Return data for multiple units rolled up to a single result instead of a separate value for each period of time.</li>
<li>limit=1..1000 (default=100)</li>
<li>unit_reference_ts - an epoch timestamp, indicating the most recent time for which to pull metrics. default:<code>now</code> <br/>
    <strong>Note:</strong> the value of <code>unit_reference_ts</code> rounds to the nearest <code>unit</code>. <br/>
    <strong>Note:</strong> historical data is stored hourly beyond the most recent 60 minutes. If a <code>unit_reference_ts</code> is specified, <code>unit</code> cannot be <code>minute</code>.</li>
</ul>
<h4>Return Values</h4>
<ul>
<li>tz_offset - the offset for the specified <code>timezone</code>, in hours.</li>
<li>unit - an echo of the specified <code>unit</code> value.</li>
<li>units - an echo of the specified <code>units</code> value.</li>
<li>tracking_domain_shorten_counts - the number of links to the specified tracking domain shortened (encoded) by all VC4A users in the specified time.</li>
</ul>
<h3>Example Request</h3>
<pre class="example">API Address: https://api-ssl.VC4A.com
GET /v3/user/tracking_domain_shorten_counts?access_token=ACCESS_TOKEN&amp;domain=usa.gov</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">{
  &quot;data&quot;: {
    &quot;tracking_domain_shorten_counts&quot;: 88,
    &quot;tz_offset&quot;: -4,
    &quot;unit&quot;: &quot;day&quot;,
    &quot;units&quot;: -1
  },
  &quot;status_code&quot;: 200,
  &quot;status_txt&quot;: &quot;OK&quot;
}</pre>

</div>

</div>

<?php include( 'footer.php' ); ?>     

</body>
</html>