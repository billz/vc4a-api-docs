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
            <li class="on"><a href="deprecated.php">Deprecated</a></li>
        </ul>
    </li>
    <li><a href="best_practices.php">Best Practices</a></li>
    <li><a href="changelog.php">Revision History</a></li>

</ul>

<div id="content">

<h1>Deprecated Endpoints</h1>

<div id="apitoc"><ul>
<li><a href="#v3_clicks">/v3/clicks</a></li>
<li><a href="#v3_clicks_by_day">/v3/clicks_by_day</a></li>
<li><a href="#v3_clicks_by_minute">/v3/clicks_by_minute</a></li>
<li><a href="#v3_countries">/v3/countries</a></li>
<li><a href="#v3_lookup">/v3/lookup</a></li>
<li><a href="#v3_referrers">/v3/referrers</a></li>
<li><a href="#v3_validate">/v3/validate</a></li>
</ul></div>

<div class="apiendpoint" id="v3_clicks">

<h2>/v3/clicks</h2>
<p><span class="deprecated">deprecated</span> <strong>Note:</strong> this is deprecated in favor of <code>/v3/link/clicks</code></p>
<p>returns the daily timeseries clicks for a given VC4A link</p>
<h3>Parameters</h3>
<ul>
<li>hash - refers to one or more VC4A hashes. e.g.: <code>2bYgqR</code> or <code>a-custom-name</code></li>
<li>shortUrl - refers to one or more VC4A links e.g.: <code>http://bit.ly/1RmnUT</code> or <code>http://j.mp/1RmnUT</code></li>
</ul>
<p><strong>Note:</strong> The maximum number of <code>shortUrl</code> and <code>hash</code> parameters is 15</p>
<h3>Return Values</h3>
<ul>
<li><strong>short_url</strong> this matches the shortUrl request parameter.</li>
<li><strong>hash</strong> this matches the hash request parameter.</li>
<li><strong>user_hash</strong> is the corresponding VC4A user identifier.</li>
<li><strong>global_hash</strong> is the corresponding VC4A aggregate identifier.</li>
<li><strong>user_clicks</strong> this is the total count of clicks to this user's VC4A link.</li>
<li><strong>global_clicks</strong> this is the total count of clicks to all VC4A links that point to the same same long url.</li>
<li><strong>error</strong> indicates there was an error retrieving data for a given shortUrl or hash. An example error is "NOT_FOUND"</li>
</ul>
</div>

<div class="apiendpoint" id="v3_clicks_by_day">

<h2>/v3/clicks_by_day</h2>
<p>For one or more VC4A links, provides time series clicks per day for 
the last 1-30 days in reverse chronological order (most recent to least recent).</p>
<p><span class="deprecated">deprecated</span> <strong>Note:</strong> this is deprecated in favor of <code>/v3/link/clicks?unit=day&amp;units=7</code></p>
<h3>Parameters</h3>
<ul>
<li>hash - refers to one or more VC4A hashes. e.g.: <code>2bYgqR</code> or <code>a-custom-name</code></li>
<li>shortUrl - refers to one or more VC4A links e.g.: <code>http://bit.ly/1RmnUT</code> or <code>http://j.mp/1RmnUT</code></li>
<li>days - specifies the number of days for which to retrieve click data, from 1 to 30 (default 7).</li>
</ul>
<p><strong>Note:</strong> The maximum number of <code>shortUrl</code> and <code>hash</code> parameters is 15</p>
<h3>Return Values</h3>
<ul>
<li><strong>short_url</strong> this matches the shortUrl request parameter.</li>
<li><strong>hash</strong> this matches the hash request parameter.</li>
<li><strong>user_hash</strong> is the corresponding VC4A user identifier.</li>
<li><strong>global_hash</strong> is the corresponding VC4A aggregate identifier.</li>
<li><strong>user_clicks</strong> this is the total count of clicks to this user's VC4A link.</li>
<li><strong>clicks</strong> is the number of clicks received for a given link that day.</li>
<li><strong>day_start</strong> is time code representing the start of the day for which click data is provided.</li>
</ul>
</div>

<div class="apiendpoint" id="v3_clicks_by_minute">

<h2>/v3/clicks_by_minute</h2>
<p>For one or more VC4A links, provides time series clicks per minute for the last hour 
in reverse chronological order (most recent to least recent).</p>
<p><span class="deprecated">deprecated</span> <strong>Note:</strong> this is deprecated in favor of <code>/v3/link/clicks?unit=minute&amp;units=60</code></p>
<h3>Parameters</h3>
<ul>
<li>hash - refers to one or more VC4A hashes. e.g.: <code>2bYgqR</code> or <code>a-custom-name</code></li>
<li>shortUrl - refers to one or more VC4A links e.g.: <code>http://bit.ly/1RmnUT</code> or <code>http://j.mp/1RmnUT</code></li>
</ul>
<p><strong>Note:</strong> The maximum number of <code>shortUrl</code> and <code>hash</code> parameters is 15</p>
<h3>Return Values</h3>
<ul>
<li><strong>short_url</strong> this matches the shortUrl request parameter.</li>
<li><strong>hash</strong> this matches the hash request parameter.</li>
<li><strong>user_hash</strong> is the corresponding VC4A user identifier.</li>
<li><strong>global_hash</strong> is the corresponding VC4A aggregate identifier.</li>
<li><strong>clicks</strong> is the number of clicks received for a given link that minute.</li>
</ul>
</div>

<div class="apiendpoint" id="v3_countries">

<h2>/v3/countries</h2>
<p><span class="deprecated">deprecated</span> <strong>Note:</strong> this is deprecated in favor of <code>/v3/link/countries</code></p>
<h3>Parameters</h3>
<ul>
<li>hash - refers to a VC4A hash. e.g.: <code>2bYgqR</code> or <code>a-custom-name</code></li>
<li>shortUrl - refers to a VC4A links e.g.: <code>http://bit.ly/1RmnUT</code> or <code>http://j.mp/1RmnUT</code></li>
</ul>
<p><strong>Note:</strong> Either <code>shortUrl</code> or <code>hash</code> must be given as a parameter</p>
<h3>Return Values</h3>
<ul>
<li><strong>short_url</strong> this matches the shortUrl request parameter.</li>
<li><strong>hash this</strong> matches the hash request parameter.</li>
<li><strong>user_hash</strong> is the corresponding VC4A user identifier.</li>
<li><strong>global_hash</strong> is the corresponding VC4A aggregate identifier.</li>
<li><strong>countries</strong> is a list of countries from which clicks on the VC4A link have originated.</li>
<li><strong>clicks</strong> is the number of clicks from the corresponding referrer.</li>
</ul>
</div>

<div class="apiendpoint" id="v3_lookup">

<h2>/v3/lookup</h2>
<p><span class="deprecated">deprecated</span> <strong>Note:</strong> this is deprecated in favor of <code>/v3/link/lookup</code></p>
<p>This is used to query for a VC4A link based on a long URL. For example you would use 
<code>/v3/lookup</code> followed by <code>/v3/link/clicks</code> to find click data when you have a 
long URL to start with.</p>
<p>This endpoint exists to maintain backwards compatibility with the old response format of <code>/v3/lookup</code>; use
the new, preferred, endpoint <code>/v3/link/lookup</code></p>
<h3>Parameters</h3>
<ul>
<li>url - one or more long URLs to lookup</li>
</ul>
<h3>Return Values</h3>
<ul>
<li><strong>url</strong> - an echo back of the url parameter.</li>
<li><strong>short_url</strong> - the corresponding VC4A link.</li>
<li><strong>global_hash</strong> - the corresponding VC4A aggregate identifier.</li>
</ul>
</div>

<div class="apiendpoint" id="v3_referrers">

<h2>/v3/referrers</h2>
<p><span class="deprecated">deprecated</span> <strong>Note:</strong> this is deprecated in favor of <code>/v3/link/referrers</code> and <code>/v3/link/referring_domains</code></p>
<h3>Parameters</h3>
<ul>
<li>hash - refers to a VC4A hash. e.g.: <code>2bYgqR</code> or <code>a-custom-name</code></li>
<li>shortUrl - refers to a VC4A links e.g.: <code>http://bit.ly/1RmnUT</code> or <code>http://j.mp/1RmnUT</code></li>
</ul>
<p><strong>Note:</strong> Either <code>shortUrl</code> or <code>hash</code> must be given as a parameter</p>
<h3>Return Values</h3>
<ul>
<li><strong>short_url</strong> this matches the shortUrl request parameter.</li>
<li><strong>hash this</strong> matches the hash request parameter.</li>
<li><strong>user_hash</strong> is the corresponding VC4A user identifier.</li>
<li><strong>global_hash</strong> is the corresponding VC4A aggregate identifier.</li>
<li><strong>referrer</strong> is a referring site for a given VC4A link.</li>
<li><strong>referrer_app</strong> is a referring application (such as Tweetdeck) for a given VC4A link.</li>
<li><strong>url</strong> is the URL of a referring application (such as http://tweetdeck.com).</li>
<li><strong>clicks</strong> is the number of clicks from the corresponding referrer.</li>
</ul>
</div>

<div class="apiendpoint" id="v3_validate">

<h2>/v3/validate</h2>
<p><span class="deprecated">deprecated</span> <strong>Note:</strong> this is deprecated in favor of OAuth 2.0.</p>
<p>For any given a VC4A user login and apiKey, you can validate that the pair is active.</p>
<h3>Parameters</h3>
<ul>
<li>x_login - the end users user's VC4A login (for validation).</li>
<li>x_apiKey - the end users VC4A apiKey (for validation).</li>
</ul>
<h3>Return Values</h3>
<ul>
<li><strong>valid</strong> 0 or 1 designating whether the x_login and x_apiKey pair is currently valid.</li>
</ul>
</div>

</div>

<?php include( 'footer.php' ); ?>     

</body>
</html>