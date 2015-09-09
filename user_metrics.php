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
            <li><a href="rate_limiting.php">Rate Limiting</a></li>              
            <li><a href="badges.php">Badges</a></li>
            <li><a href="users.php">Users</a></li>
            <li class="on"><a href="user_metrics.php">User Metrics</a></li>            
            <li><a href="ventures.php">Ventures</a></li>
        </ul>
    </li>
    <li><a href="best_practices.php">Best Practices</a></li>
    <li><a href="changelog.php">Revision History</a></li>

</ul>

<div id="content">

<h1>User Metrics</h1>

<div id="apitoc"><ul>
<li><a href="#v3_user_clicks">/v3/user/clicks</a></li>
<li><a href="#v3_user_countries">/v3/user/countries</a></li>
<li><a href="#v3_user_popular_links">/v3/user/popular_links</a></li>
<li><a href="#v3_user_referrers">/v3/user/referrers</a></li>
<li><a href="#v3_user_referring_domains">/v3/user/referring_domains</a></li>
<li><a href="#v3_user_share_counts">/v3/user/share_counts</a></li>
<li><a href="#v3_user_share_counts_by_share_type">/v3/user/share_counts_by_share_type</a></li>
<li><a href="#v3_user_shorten_counts">/v3/user/shorten_counts</a></li>
</ul></div>

<div class="apiendpoint" id="v3_user_clicks">

<h2>/v3/user/clicks</h2>
<p>Returns the aggregate number of clicks on all of the authenticated user's VC4A links.</p>
<p>Authentication: <a href="authentication.php">oauth2</a></p>
<h3>Parameters</h3>
<ul>
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
<p><strong>Note:</strong> without the parameter <code>unit</code> this endpoint returns a legacy response format which assumes <code>rollup=false</code>, <code>unit=day</code> and <code>units=7</code>.</p>
<h3>Return Values</h3>
<ul>
<li>tz_offset - the offset for the specified <code>timezone</code>, in hours.</li>
<li>unit - an echo of the specified <code>unit</code> value.</li>
<li>units - an echo of the specified <code>units</code> value.</li>
<li>days - the number of days for which data is provided (ONLY returned if <code>unit</code> is not specified).</li>
<li>user_clicks - the number of clicks on this user's links. If <code>rollup</code> = <code>false</code>, the following values are returned for each specified <code>unit</code>:<ul>
<li>dt: a unix timestamp representing the beginning of this <code>unit</code>.</li>
<li>day_start: a unix timestamp representing the beginning of the specified day (ONLY returned if <code>unit</code> is not specified).</li>
<li>clicks: the number of clicks on this user's links in the specified timeframe.</li>
</ul>
</li>
</ul>
<h3>Example Request</h3>
<pre class="example">API Address: https://api-ssl.VC4A.com
GET /v3/user/clicks?access_token=ACCESS_TOKEN</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">{
  &quot;data&quot;: {
    &quot;clicks&quot;: [
      {
        &quot;clicks&quot;: 3,
        &quot;day_start&quot;: 1331784000
      },
      {
        &quot;clicks&quot;: 129,
        &quot;day_start&quot;: 1331697600
      },
      {
        &quot;clicks&quot;: 53,
        &quot;day_start&quot;: 1331611200
      },
      {
        &quot;clicks&quot;: 151,
        &quot;day_start&quot;: 1331524800
      },
      {
        &quot;clicks&quot;: 2,
        &quot;day_start&quot;: 1331438400
      },
      {
        &quot;clicks&quot;: 5,
        &quot;day_start&quot;: 1331352000
      },
      {
        &quot;clicks&quot;: 45,
        &quot;day_start&quot;: 1331265600
      }
    ],
    &quot;days&quot;: 7,
    &quot;total_clicks&quot;: 388
  },
  &quot;status_code&quot;: 200,
  &quot;status_txt&quot;: &quot;OK&quot;
}</pre>

</div>

<div class="apiendpoint" id="v3_user_countries">

<h2>/v3/user/countries</h2>
<p>Returns aggregate metrics about the countries referring click traffic to all of the authenticated user's VC4A links.</p>
<p>Authentication: <a href="authentication.php">oauth2</a></p>
<h3>Parameters</h3>
<ul>
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
<p><strong>Note:</strong> without the parameter <code>unit</code> this endpoint returns a legacy response format which assumes <code>rollup=false</code>, <code>unit=day</code> and <code>units=7</code>. When a <code>unit</code> is specified, <code>rollup</code> is always <code>true</code>.</p>
<h3>Return Values</h3>
<ul>
<li>tz_offset - the offset for the specified <code>timezone</code>, in hours.</li>
<li>unit - an echo of the specified <code>unit</code> value.</li>
<li>units - an echo of the specified <code>units</code> value.</li>
<li>days - the number of days for which data is provided (ONLY returned if <code>unit</code> is not specified).</li>
<li>countries - a list of countries referring traffic to this user's links. Each country returns the following fields:<ul>
<li>clicks - the number of clicks referred from this country.</li>
<li>country - the two-letter code of the referring country.</li>
</ul>
</li>
</ul>
<h3>Example Request</h3>
<pre class="example">API Address: https://api-ssl.VC4A.com
GET /v3/user/countries?access_token=ACCESS_TOKEN</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">{
  &quot;data&quot;: {
    &quot;countries&quot;: [
      [
        {
          &quot;clicks&quot;: 3,
          &quot;country&quot;: &quot;US&quot;
        }
      ],
      [
        {
          &quot;clicks&quot;: 96,
          &quot;country&quot;: &quot;US&quot;
        },
        {
          &quot;clicks&quot;: 19,
          &quot;country&quot;: &quot;None&quot;
        },
        {
          &quot;clicks&quot;: 4,
          &quot;country&quot;: &quot;CA&quot;
        },
        {
          &quot;clicks&quot;: 3,
          &quot;country&quot;: &quot;GB&quot;
        },
        {
          &quot;clicks&quot;: 2,
          &quot;country&quot;: &quot;NZ&quot;
        },
        {
          &quot;clicks&quot;: 2,
          &quot;country&quot;: &quot;IE&quot;
        },
        {
          &quot;clicks&quot;: 1,
          &quot;country&quot;: &quot;DE&quot;
        },
        {
          &quot;clicks&quot;: 1,
          &quot;country&quot;: &quot;HK&quot;
        },
        {
          &quot;clicks&quot;: 1,
          &quot;country&quot;: &quot;AU&quot;
        }
      ],
      [
        {
          &quot;clicks&quot;: 41,
          &quot;country&quot;: &quot;US&quot;
        },
        {
          &quot;clicks&quot;: 8,
          &quot;country&quot;: &quot;None&quot;
        },
        {
          &quot;clicks&quot;: 3,
          &quot;country&quot;: &quot;PL&quot;
        },
        {
          &quot;clicks&quot;: 1,
          &quot;country&quot;: &quot;GB&quot;
        }
      ],
      [
        {
          &quot;clicks&quot;: 113,
          &quot;country&quot;: &quot;US&quot;
        },
        {
          &quot;clicks&quot;: 21,
          &quot;country&quot;: &quot;None&quot;
        },
        {
          &quot;clicks&quot;: 4,
          &quot;country&quot;: &quot;CA&quot;
        },
        {
          &quot;clicks&quot;: 4,
          &quot;country&quot;: &quot;GB&quot;
        },
        {
          &quot;clicks&quot;: 3,
          &quot;country&quot;: &quot;NO&quot;
        },
        {
          &quot;clicks&quot;: 1,
          &quot;country&quot;: &quot;CL&quot;
        },
        {
          &quot;clicks&quot;: 1,
          &quot;country&quot;: &quot;AR&quot;
        },
        {
          &quot;clicks&quot;: 1,
          &quot;country&quot;: &quot;SE&quot;
        },
        {
          &quot;clicks&quot;: 1,
          &quot;country&quot;: &quot;IN&quot;
        },
        {
          &quot;clicks&quot;: 1,
          &quot;country&quot;: &quot;IE&quot;
        },
        {
          &quot;clicks&quot;: 1,
          &quot;country&quot;: &quot;PL&quot;
        }
      ],
      [
        {
          &quot;clicks&quot;: 1,
          &quot;country&quot;: &quot;US&quot;
        },
        {
          &quot;clicks&quot;: 1,
          &quot;country&quot;: &quot;TH&quot;
        }
      ],
      [
        {
          &quot;clicks&quot;: 4,
          &quot;country&quot;: &quot;US&quot;
        },
        {
          &quot;clicks&quot;: 1,
          &quot;country&quot;: &quot;None&quot;
        }
      ],
      [
        {
          &quot;clicks&quot;: 40,
          &quot;country&quot;: &quot;US&quot;
        },
        {
          &quot;clicks&quot;: 2,
          &quot;country&quot;: &quot;None&quot;
        },
        {
          &quot;clicks&quot;: 2,
          &quot;country&quot;: &quot;CA&quot;
        },
        {
          &quot;clicks&quot;: 1,
          &quot;country&quot;: &quot;PL&quot;
        }
      ]
    ],
    &quot;days&quot;: 7
  },
  &quot;status_code&quot;: 200,
  &quot;status_txt&quot;: &quot;OK&quot;
}</pre>

</div>

<div class="apiendpoint" id="v3_user_popular_links">

<h2>/v3/user/popular_links</h2>
<p>Returns the authenticated user's most-clicked VC4A links (ordered by number of clicks) in a given time period.</p>
<p><strong>Note:</strong> This replaces the <code>realtime_links</code> endpoint.</p>
<p>Authentication: <a href="authentication.php">oauth2</a></p>
<h3>Parameters</h3>
<ul>
<li>unit - <code>minute</code> | <code>hour</code> | <code>day</code> | <code>week</code> | <code>month</code> default:<code>day</code> <br/>
    <strong>Note:</strong> when <code>unit</code> is <code>minute</code> the maximum value for <code>units</code> is <code>60</code></li>
<li>units = an integer representing the time units to query data for. pass <code>-1</code> to return all units of time.</li>
<li>timezone - an integer hour offset from UTC (-12..12), or a timezone string default:<code>America/New_York</code>.</li>
<li>limit=1..1000 (default=100)</li>
<li>unit_reference_ts - an epoch timestamp, indicating the most recent time for which to pull metrics. default:<code>now</code> <br/>
    <strong>Note:</strong> the value of <code>unit_reference_ts</code> rounds to the nearest <code>unit</code>. <br/>
    <strong>Note:</strong> historical data is stored hourly beyond the most recent 60 minutes. If a <code>unit_reference_ts</code> is specified, <code>unit</code> cannot be <code>minute</code>.</li>
</ul>
<h3>Return Values</h3>
<ul>
<li>tz_offset - the offset for the specified <code>timezone</code>, in hours.</li>
<li>unit - an echo of the specified <code>unit</code> value.</li>
<li>units - an echo of the specified <code>units</code> value.</li>
<li>popular_links - the links that have received click traffic in the specified timeframe. Each link returns:<ul>
<li>link: a VC4A link.</li>
<li>clicks: the number of clicks on that VC4A link in the specified timeframe.</li>
</ul>
</li>
</ul>
<h3>Example Request</h3>
<pre class="example">API Address: https://api-ssl.VC4A.com
GET /v3/user/popular_links?access_token=ACCESS_TOKEN</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">{
  &quot;data&quot;: {
    &quot;popular_links&quot;: [
      {
        &quot;clicks&quot;: 6150,
        &quot;link&quot;: &quot;http://bit.ly/123456&quot;
      },
      {
        &quot;clicks&quot;: 3647,
        &quot;link&quot;: &quot;http://bit.ly/234567&quot;
      },
      {
        &quot;clicks&quot;: 1814,
        &quot;link&quot;: &quot;http://bit.ly/abc123&quot;
      },
      {
        &quot;clicks&quot;: 1813,
        &quot;link&quot;: &quot;http://bit.ly/bcd234&quot;
      }
    ],
    &quot;tz_offset&quot;: -4,
    &quot;unit&quot;: &quot;day&quot;,
    &quot;units&quot;: -1
  },
  &quot;status_code&quot;: 200,
  &quot;status_txt&quot;: &quot;OK&quot;
}</pre>

</div>

<div class="apiendpoint" id="v3_user_referrers">

<h2>/v3/user/referrers</h2>
<p>Returns aggregate metrics about the pages referring click traffic to all of the authenticated user's VC4A links.</p>
<p>Authentication: <a href="authentication.php">oauth2</a></p>
<h3>Parameters</h3>
<ul>
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
<p><strong>Note:</strong> without the parameter <code>unit</code> this endpoint returns a legacy response format which assumes <code>rollup=false</code>, <code>unit=day</code> and <code>units=7</code>. When a <code>unit</code> is specified, <code>rollup</code> is always <code>true</code>.</p>
<h3>Return Values</h3>
<ul>
<li>tz_offset - the offset for the specified <code>timezone</code>, in hours.</li>
<li>unit - an echo of the specified <code>unit</code> value.</li>
<li>units - an echo of the specified <code>units</code> value.</li>
<li>days - the number of days for which data is provided (ONLY returned if <code>unit</code> is not specified).</li>
<li>referrers - a list of URLs referring traffic to this user's links. Each URL returns the following fields:<ul>
<li>clicks - the number of clicks referred from this URL.</li>
<li>referrer - the URL referring clicks.</li>
</ul>
</li>
</ul>
<h3>Example Request</h3>
<pre class="example">API Address: https://api-ssl.VC4A.com
GET /v3/user/referrers?access_token=ACCESS_TOKEN</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">{
  &quot;data&quot;: {
    &quot;days&quot;: 7,
    &quot;referrers&quot;: [
      [
        {
          &quot;clicks&quot;: 5,
          &quot;referrer&quot;: &quot;direct&quot;
        },
        {
          &quot;clicks&quot;: 3,
          &quot;referrer&quot;: &quot;https://twitter.com/&quot;
        }
      ],
      [
        {
          &quot;clicks&quot;: 24,
          &quot;referrer&quot;: &quot;direct&quot;
        },
        {
          &quot;clicks&quot;: 7,
          &quot;referrer&quot;: &quot;https://twitter.com/&quot;
        },
        {
          &quot;clicks&quot;: 1,
          &quot;referrer&quot;: &quot;http://www.linkedin.com/home&quot;
        },
        {
          &quot;clicks&quot;: 1,
          &quot;referrer&quot;: &quot;http://mobile.twitter.com/&quot;
        }
      ],
      [
        {
          &quot;clicks&quot;: 11,
          &quot;referrer&quot;: &quot;direct&quot;
        },
        {
          &quot;clicks&quot;: 1,
          &quot;referrer&quot;: &quot;https://twitter.com/&quot;
        },
        {
          &quot;clicks&quot;: 1,
          &quot;referrer&quot;: &quot;http://www.linkedin.com/home&quot;
        }
      ],
      [
        {
          &quot;clicks&quot;: 27,
          &quot;referrer&quot;: &quot;direct&quot;
        },
        {
          &quot;clicks&quot;: 13,
          &quot;referrer&quot;: &quot;https://twitter.com/&quot;
        },
        {
          &quot;clicks&quot;: 2,
          &quot;referrer&quot;: &quot;http://hootsuite.com/dashboard&quot;
        }
      ],
      [
        {
          &quot;clicks&quot;: 1,
          &quot;referrer&quot;: &quot;http://blog.VC4Aenterprise.com/&quot;
        }
      ],
      [
        {
          &quot;clicks&quot;: 2,
          &quot;referrer&quot;: &quot;https://twitter.com/&quot;
        },
        {
          &quot;clicks&quot;: 1,
          &quot;referrer&quot;: &quot;direct&quot;
        }
      ],
      [
        {
          &quot;clicks&quot;: 6,
          &quot;referrer&quot;: &quot;direct&quot;
        },
        {
          &quot;clicks&quot;: 2,
          &quot;referrer&quot;: &quot;https://twitter.com/&quot;
        },
        {
          &quot;clicks&quot;: 1,
          &quot;referrer&quot;: &quot;http://www.facebook.com/home.php&quot;
        }
      ]
    ]
  },
  &quot;status_code&quot;: 200,
  &quot;status_txt&quot;: &quot;OK&quot;
}</pre>

</div>

<div class="apiendpoint" id="v3_user_referring_domains">

<h2>/v3/user/referring_domains</h2>
<p>Returns aggregate metrics about the domains referring click traffic to all of the authenticated user's VC4A links.</p>
<p>Authentication: <a href="authentication.php">oauth2</a></p>
<h3>Parameters</h3>
<ul>
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
<p><strong>Note:</strong> without the parameter <code>unit</code> this endpoint returns a legacy response format which assumes <code>rollup=false</code>, <code>unit=day</code> and <code>units=7</code>. When a <code>unit</code> is specified, <code>rollup</code> is always <code>true</code>.</p>
<h3>Return Values</h3>
<ul>
<li>tz_offset - the offset for the specified <code>timezone</code>, in hours.</li>
<li>unit - an echo of the specified <code>unit</code> value.</li>
<li>units - an echo of the specified <code>units</code> value.</li>
<li>days - the number of days for which data is provided (ONLY returned if <code>unit</code> is not specified).</li>
<li>referring_domains - a list of domains referring traffic to this user's links. Each domain returns the following fields:<ul>
<li>clicks - the number of clicks referred from this domain.</li>
<li>domain - the domain referring clicks.</li>
<li>url - the complete URL of the domain referring clicks.</li>
</ul>
</li>
</ul>
<h3>Example Request</h3>
<pre class="example">API Address: https://api-ssl.VC4A.com
GET /v3/user/referring_domains?access_token=ACCESS_TOKEN</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">{
  &quot;data&quot;: {
    &quot;days&quot;: 7,
    &quot;referring_domains&quot;: [
      {
        &quot;dt&quot;: 1333339200,
        &quot;values&quot;: [
          {
            &quot;clicks&quot;: 1,
            &quot;domain&quot;: &quot;direct&quot;
          }
        ]
      },
      {
        &quot;dt&quot;: 1333252800,
        &quot;values&quot;: [
          {
            &quot;clicks&quot;: 3,
            &quot;domain&quot;: &quot;direct&quot;
          }
        ]
      },
      {
        &quot;dt&quot;: 1333166400,
        &quot;values&quot;: [
          {
            &quot;clicks&quot;: 7,
            &quot;domain&quot;: &quot;t.co&quot;,
            &quot;url&quot;: &quot;http://t.co/&quot;
          },
          {
            &quot;clicks&quot;: 4,
            &quot;domain&quot;: &quot;direct&quot;
          }
        ]
      },
      {
        &quot;dt&quot;: 1333080000,
        &quot;values&quot;: [
          {
            &quot;clicks&quot;: 36,
            &quot;domain&quot;: &quot;t.co&quot;,
            &quot;url&quot;: &quot;http://t.co/&quot;
          },
          {
            &quot;clicks&quot;: 6,
            &quot;domain&quot;: &quot;direct&quot;
          },
          {
            &quot;clicks&quot;: 5,
            &quot;domain&quot;: &quot;twitter.com&quot;,
            &quot;url&quot;: &quot;http://twitter.com/&quot;
          },
          {
            &quot;clicks&quot;: 1,
            &quot;domain&quot;: &quot;hootsuite.com&quot;,
            &quot;url&quot;: &quot;http://hootsuite.com/&quot;
          }
        ]
      },
      {
        &quot;dt&quot;: 1332993600,
        &quot;values&quot;: [
          {
            &quot;clicks&quot;: 96,
            &quot;domain&quot;: &quot;t.co&quot;,
            &quot;url&quot;: &quot;http://t.co/&quot;
          },
          {
            &quot;clicks&quot;: 21,
            &quot;domain&quot;: &quot;direct&quot;
          },
          {
            &quot;clicks&quot;: 15,
            &quot;domain&quot;: &quot;twitter.com&quot;,
            &quot;url&quot;: &quot;http://twitter.com/&quot;
          },
          {
            &quot;clicks&quot;: 3,
            &quot;domain&quot;: &quot;hootsuite.com&quot;,
            &quot;url&quot;: &quot;http://hootsuite.com/&quot;
          },
          {
            &quot;clicks&quot;: 1,
            &quot;domain&quot;: &quot;www.linkedin.com&quot;,
            &quot;url&quot;: &quot;http://www.linkedin.com/&quot;
          }
        ]
      },
      {
        &quot;dt&quot;: 1332907200,
        &quot;values&quot;: [
          {
            &quot;clicks&quot;: 49,
            &quot;domain&quot;: &quot;t.co&quot;,
            &quot;url&quot;: &quot;http://t.co/&quot;
          },
          {
            &quot;clicks&quot;: 33,
            &quot;domain&quot;: &quot;direct&quot;
          },
          {
            &quot;clicks&quot;: 4,
            &quot;domain&quot;: &quot;twitter.com&quot;,
            &quot;url&quot;: &quot;http://twitter.com/&quot;
          },
          {
            &quot;clicks&quot;: 2,
            &quot;domain&quot;: &quot;mail.verizon.com&quot;,
            &quot;url&quot;: &quot;http://mail.verizon.com/&quot;
          },
          {
            &quot;clicks&quot;: 2,
            &quot;domain&quot;: &quot;hootsuite.com&quot;,
            &quot;url&quot;: &quot;http://hootsuite.com/&quot;
          }
        ]
      },
      {
        &quot;dt&quot;: 1332820800,
        &quot;values&quot;: [
          {
            &quot;clicks&quot;: 16,
            &quot;domain&quot;: &quot;t.co&quot;,
            &quot;url&quot;: &quot;http://t.co/&quot;
          },
          {
            &quot;clicks&quot;: 16,
            &quot;domain&quot;: &quot;direct&quot;
          },
          {
            &quot;clicks&quot;: 1,
            &quot;domain&quot;: &quot;twitter.com&quot;,
            &quot;url&quot;: &quot;http://twitter.com/&quot;
          },
          {
            &quot;clicks&quot;: 1,
            &quot;domain&quot;: &quot;www.google.com&quot;,
            &quot;url&quot;: &quot;http://www.google.com/&quot;
          }
        ]
      }
    ]
  },
  &quot;status_code&quot;: 200,
  &quot;status_txt&quot;: &quot;OK&quot;
}</pre>

</div>

<div class="apiendpoint" id="v3_user_share_counts">

<h2>/v3/user/share_counts</h2>
<p>Returns the number of shares by the authenticated user in a given time period.</p>
<p>Authentication: <a href="authentication.php">oauth2</a></p>
<h3>Parameters</h3>
<ul>
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
<h3>Return Values</h3>
<ul>
<li>tz_offset - the offset for the specified <code>timezone</code>, in hours.</li>
<li>unit - an echo of the specified <code>unit</code> value.</li>
<li>units - an echo of the specified <code>units</code> value.</li>
<li>share_counts - the number of shares from this user's account. If <code>rollup</code>=<code>false</code>, returns timeseries data per <code>unit</code>:<ul>
<li>dt - timestamp corresponding to the specified <code>unit</code>.</li>
<li>shares - the number of shares in that timeframe.</li>
</ul>
</li>
</ul>
<h3>Example Request</h3>
<pre class="example">API Address: https://api-ssl.VC4A.com
GET /v3/user/share_counts?access_token=ACCESS_TOKEN</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">{
  &quot;data&quot;: {
    &quot;share_metrics&quot;: 17,
    &quot;tz_offset&quot;: -4,
    &quot;unit&quot;: &quot;day&quot;,
    &quot;units&quot;: -1
  },
  &quot;status_code&quot;: 200,
  &quot;status_txt&quot;: &quot;OK&quot;
}</pre>

</div>

<div class="apiendpoint" id="v3_user_share_counts_by_share_type">

<h2>/v3/user/share_counts_by_share_type</h2>
<p>Returns the number of shares by the authenticated user, broken down by share 
type (ie: twitter, facebook, email) in a given time period.</p>
<p>Authentication: <a href="authentication.php">oauth2</a></p>
<h3>Parameters</h3>
<ul>
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
<h3>Return Values</h3>
<ul>
<li>tz_offset - the offset for the specified <code>timezone</code>, in hours.</li>
<li>unit - an echo of the specified <code>unit</code> value.</li>
<li>units - an echo of the specified <code>units</code> value.</li>
<li>share_counts_by_share_type - the number of shares from this user's account for each <code>share_type</code>. Each type of share returns:<ul>
<li>dt - timestamp corresponding to the specified <code>unit</code>. Included in timeseries response only if <code>rollup</code>=<code>false</code>.</li>
<li>share_type - the type of share (twitter, email, facebook).</li>
<li>shares - the number of shares of the specified type in that timeframe.</li>
</ul>
</li>
</ul>
<h3>Example Request</h3>
<pre class="example">API Address: https://api-ssl.VC4A.com
GET /v3/user/share_counts_by_share_type?access_token=ACCESS_TOKEN</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">{
  &quot;data&quot;: {
    &quot;share_counts_by_share_type&quot;: [
      {
        &quot;share_type&quot;: &quot;twitter&quot;,
        &quot;shares&quot;: 10
      },
      {
        &quot;share_type&quot;: &quot;email&quot;,
        &quot;shares&quot;: 7
      }
    ],
    &quot;tz_offset&quot;: -4,
    &quot;unit&quot;: &quot;day&quot;,
    &quot;units&quot;: -1
  },
  &quot;status_code&quot;: 200,
  &quot;status_txt&quot;: &quot;OK&quot;
}</pre>

</div>

<div class="apiendpoint" id="v3_user_shorten_counts">

<h2>/v3/user/shorten_counts</h2>
<p>Returns the number of links shortened (encoded) in a given time period by the authenticated user.</p>
<p>Authentication: <a href="authentication.php">oauth2</a></p>
<h3>Parameters</h3>
<ul>
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
<h3>Return Values</h3>
<ul>
<li>tz_offset - the offset for the specified <code>timezone</code>, in hours.</li>
<li>unit - an echo of the specified <code>unit</code> value.</li>
<li>units - an echo of the specified <code>units</code> value.</li>
<li>user_shorten_counts - the number of shortens made by the specified user in the specified time.</li>
</ul>
<h3>Example Request</h3>
<pre class="example">API Address: https://api-ssl.VC4A.com
GET /v3/user/shorten_counts?access_token=ACCESS_TOKEN</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">{
  &quot;data&quot;: {
    &quot;tz_offset&quot;: -4,
    &quot;unit&quot;: &quot;day&quot;,
    &quot;units&quot;: -1,
    &quot;user_shorten_counts&quot;: 1254
  },
  &quot;status_code&quot;: 200,
  &quot;status_txt&quot;: &quot;OK&quot;
}</pre>

</div>

</div>

<?php include( 'footer.php' ); ?> 
    
</body>
</html>