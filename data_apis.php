<?php include( 'header.php' ); ?> 

<div id="interiorContainer" class="clearfix">
    
<ul id="index">

<li><a href="get_started.php">Getting Started</a></li>
    <li class="on"><a href="api.php">API Documentation</a>
        <ul>
            <li><a href="formats.php">Request / Response Formats</a></li>
            <li><a href="rate_limiting.php">Rate Limiting</a></li>
            <li class="on"><a href="data_apis.php">Data APIs</a></li>                        
            <li><a href="badges.php">Badges</a></li>
            <li><a href="users.php">Users</a></li>
            <li><a href="ventures.php">Ventures</a></li>
        </ul>
    </li>
    <li><a href="best_practices.php">Best Practices</a></li>
    <li><a href="changelog.php">Revision History</a></li>

</ul>
    
    
<div id="content">

<h2>VC4A Data APIs</h2>
<p>Here at VC4A, we see over 8 billion clicks a month, and millions of new links a day. We love looking through this enormous set of data to find interesting stuff -- and we're extremely excited to open up some of the system-wide data endpoints we use, for you to build cool things too! <strong>Just <a href="http://VC4A.com/O1jFFY">fill out this form</a> and tell us a little bit about yourself to request access.</strong> You can find documentation for these API endpoints below. We're excited to see what you build!</p>
<div id="apitoc"><ul>
<li><a href="#beta_highvalue">/beta/highvalue</a></li>
<li><a href="#v3_realtime_bursting_phrases">/v3/realtime/bursting_phrases</a></li>
<li><a href="#v3_realtime_hot_phrases">/v3/realtime/hot_phrases</a></li>
<li><a href="#v3_realtime_clickrate">/v3/realtime/clickrate</a></li>
<li><a href="#v3_link_info">/v3/link/info</a></li>
<li><a href="#v3_link_content">/v3/link/content</a></li>
<li><a href="#v3_link_content_keywords">/v3/link/content_keywords</a></li>
<li><a href="#v3_link_category">/v3/link/category</a></li>
<li><a href="#v3_link_social">/v3/link/social</a></li>
<li><a href="#v3_link_location">/v3/link/location</a></li>
<li><a href="#v3_link_language">/v3/link/language</a></li>
</ul></div>

<div class="apiendpoint" id="beta_highvalue">

<h2>/beta/highvalue</h2>
<p>Returns a specified number of "high-value" VC4A hashes, corresponding to links that are popular across VC4A at this particular moment.</p>
<p>Authentication: <a href="authentication.php">oauth2</a></p>
<h3>Parameters</h3>
<ul>
<li>limit - the maximum number of high-value hashes to return.</li>
</ul>
<h3>Example Request</h3>
<pre class="example">API Address: https://api-ssl.VC4A.com
GET /beta/highvalue?access_token=ACCESS_TOKEN&amp;limit=2</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">{
  &quot;data&quot;: {
    &quot;outputs&quot;: {
      &quot;values&quot;: [
        &quot;MjFcMj&quot;,
        &quot;N6s5Pr&quot;
      ]
    },
    &quot;params&quot;: {
      &quot;lang&quot;: &quot;en&quot;,
      &quot;limit&quot;: 2,
      &quot;retries&quot;: 3
    }
  },
  &quot;status_code&quot;: 200,
  &quot;status_txt&quot;: &quot;OK&quot;
}</pre>

</div>

<div class="apiendpoint" id="v3_realtime_bursting_phrases">

<h2>/v3/realtime/bursting_phrases</h2>
<p>Returns phrases that are receiving an uncharacteristically high volume of click traffic, and the individual links (hashes) driving traffic to pages containing these phrases.</p>
<p>Authentication: <a href="authentication.php">oauth2</a></p>
<h3>Example Request</h3>
<pre class="example">API Address: https://api-ssl.VC4A.com
GET /v3/realtime/bursting_phrases?access_token=ACCESS_TOKEN</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">{
  &quot;data&quot;: {
    &quot;current_lag&quot;: 4,
    &quot;phrases&quot;: [
      {
        &quot;N&quot;: 7470,
        &quot;ghashes&quot;: [
          {
            &quot;ghash&quot;: &quot;RwiTZY&quot;,
            &quot;visitors&quot;: 130
          },
          {
            &quot;ghash&quot;: &quot;TPDeGV&quot;,
            &quot;visitors&quot;: 108
          },
          {
            &quot;ghash&quot;: &quot;Nby5dj&quot;,
            &quot;visitors&quot;: 81
          },
          {
            &quot;ghash&quot;: &quot;P9fASI&quot;,
            &quot;visitors&quot;: 72
          },
          {
            &quot;ghash&quot;: &quot;OGFFHf&quot;,
            &quot;visitors&quot;: 35
          }
        ],
        &quot;mean&quot;: 0.02,
        &quot;phrase&quot;: &quot;london 24&quot;,
        &quot;rate&quot;: 0.34999999999999998,
        &quot;std&quot;: 0.0048762641930334208
      },
      {
        &quot;N&quot;: 122161,
        &quot;ghashes&quot;: [
          {
            &quot;ghash&quot;: &quot;Qi3hlC&quot;,
            &quot;visitors&quot;: 100
          },
          {
            &quot;ghash&quot;: &quot;PLaFLH&quot;,
            &quot;visitors&quot;: 61
          },
          {
            &quot;ghash&quot;: &quot;NNGO1F&quot;,
            &quot;visitors&quot;: 59
          },
          {
            &quot;ghash&quot;: &quot;NB1Wf8&quot;,
            &quot;visitors&quot;: 58
          },
          {
            &quot;ghash&quot;: &quot;PMoMjM&quot;,
            &quot;visitors&quot;: 29
          },
          {
            &quot;ghash&quot;: &quot;MH1URL&quot;,
            &quot;visitors&quot;: 26
          }
        ],
        &quot;mean&quot;: 0.14000000000000001,
        &quot;phrase&quot;: &quot;pussy riot&quot;,
        &quot;rate&quot;: 0.28999999999999998,
        &quot;std&quot;: 0.030332211923478136
      }
    ],
    &quot;selectivity&quot;: 3,
    &quot;time&quot;: 1345477468
  },
  &quot;status_code&quot;: 200,
  &quot;status_txt&quot;: &quot;OK&quot;
}</pre>

</div>

<div class="apiendpoint" id="v3_realtime_hot_phrases">

<h2>/v3/realtime/hot_phrases</h2>
<p>Returns phrases that are receiving a consistently high volume of click traffic, and the individual links (hashes) driving traffic to pages containing these phrases.</p>
<p>Authentication: <a href="authentication.php">oauth2</a></p>
<h3>Example Request</h3>
<pre class="example">API Address: https://api-ssl.VC4A.com
GET /v3/realtime/hot_phrases?access_token=ACCESS_TOKEN</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">{
  &quot;data&quot;: {
    &quot;lag&quot;: 4,
    &quot;phrases&quot;: [
      {
        &quot;ghashes&quot;: [
          {
            &quot;ghash&quot;: &quot;QSQsPh&quot;,
            &quot;visitors&quot;: 998
          },
          {
            &quot;ghash&quot;: &quot;ScRWYS&quot;,
            &quot;visitors&quot;: 266
          },
          {
            &quot;ghash&quot;: &quot;ScHTDa&quot;,
            &quot;visitors&quot;: 194
          },
          {
            &quot;ghash&quot;: &quot;QSxSab&quot;,
            &quot;visitors&quot;: 131
          },
          {
            &quot;ghash&quot;: &quot;NW3HC7&quot;,
            &quot;visitors&quot;: 101
          },
          {
            &quot;ghash&quot;: &quot;P9c0rD&quot;,
            &quot;visitors&quot;: 47
          },
          {
            &quot;ghash&quot;: &quot;SbjnSG&quot;,
            &quot;visitors&quot;: 26
          },
          {
            &quot;ghash&quot;: &quot;QghCiw&quot;,
            &quot;visitors&quot;: 23
          },
          {
            &quot;ghash&quot;: &quot;Rvip6f&quot;,
            &quot;visitors&quot;: 22
          },
          {
            &quot;ghash&quot;: &quot;Sb02kE&quot;,
            &quot;visitors&quot;: 21
          },
          {
            &quot;ghash&quot;: &quot;NWxRS6&quot;,
            &quot;visitors&quot;: 18
          },
          {
            &quot;ghash&quot;: &quot;NbDukJ&quot;,
            &quot;visitors&quot;: 17
          },
          {
            &quot;ghash&quot;: &quot;OGqPAx&quot;,
            &quot;visitors&quot;: 17
          }
        ],
        &quot;phrase&quot;: &quot;top gun&quot;,
        &quot;rate&quot;: 1.0414969999999999
      },
      {
        &quot;ghashes&quot;: [
          {
            &quot;ghash&quot;: &quot;PyyGlF&quot;,
            &quot;visitors&quot;: 914
          },
          {
            &quot;ghash&quot;: &quot;SIDJ3h&quot;,
            &quot;visitors&quot;: 209
          },
          {
            &quot;ghash&quot;: &quot;OQQbkR&quot;,
            &quot;visitors&quot;: 35
          },
          {
            &quot;ghash&quot;: &quot;NBn40C&quot;,
            &quot;visitors&quot;: 29
          },
          {
            &quot;ghash&quot;: &quot;SIv7K3&quot;,
            &quot;visitors&quot;: 29
          },
          {
            &quot;ghash&quot;: &quot;QhQMGI&quot;,
            &quot;visitors&quot;: 21
          }
        ],
        &quot;phrase&quot;: &quot;iphone 5&quot;,
        &quot;rate&quot;: 0.76665669999999997
      }
    ],
    &quot;time&quot;: 1345477932.46945
  },
  &quot;status_code&quot;: 200,
  &quot;status_txt&quot;: &quot;OK&quot;
}</pre>

</div>

<div class="apiendpoint" id="v3_realtime_clickrate">

<h2>/v3/realtime/clickrate</h2>
<p>Returns the click rate for content containing a specified phrase.</p>
<p>Authentication: <a href="authentication.php">oauth2</a></p>
<h3>Parameters</h3>
<ul>
<li>phrase - the phrase for which you'd like to get the click rate.</li>
</ul>
<h3>Example Request</h3>
<pre class="example">API Address: https://api-ssl.VC4A.com
GET /v3/realtime/clickrate?access_token=ACCESS_TOKEN&amp;phrase=obama</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">{
  &quot;data&quot;: {
    &quot;ghash&quot;: null,
    &quot;lag&quot;: 4,
    &quot;phrase&quot;: &quot;obama&quot;,
    &quot;rate&quot;: 1.123823,
    &quot;time&quot;: 1342623038
  },
  &quot;status_code&quot;: 200,
  &quot;status_txt&quot;: &quot;OK&quot;
}</pre>

</div>

<div class="apiendpoint" id="v3_link_info">

<h2>/v3/link/info</h2>
<p>Returns metadata about a single VC4A link.</p>
<p>Authentication: <a href="authentication.php">oauth2</a></p>
<h3>Parameters</h3>
<ul>
<li>link - a VC4A link.</li>
</ul>
<h3>Example Request</h3>
<pre class="example">API Address: https://api-ssl.VC4A.com
GET /v3/link/info?access_token=ACCESS_TOKEN&amp;link=http%3A%2F%2Fbit.ly%2FMwSGaQ</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">{
  &quot;data&quot;: {
    &quot;canonical_url&quot;: &quot;http://blog.VC4A.com/post/26449494972/happy-independence-day-america&quot;,
    &quot;category&quot;: &quot;text&quot;,
    &quot;content_length&quot;: 19582,
    &quot;content_type&quot;: &quot;text/html; charset=UTF-8&quot;,
    &quot;domain&quot;: &quot;blog.VC4A.com&quot;,
    &quot;favicon_url&quot;: &quot;http://VC4A.com/s/beta/graphics/vis/VC4A-favicon-trans.png&quot;,
    &quot;global_hash&quot;: &quot;LNY08h&quot;,
    &quot;html_title&quot;: &quot;VC4A blog - Happy Independence Day, America!&quot;,
    &quot;http_code&quot;: 200,
    &quot;indexed&quot;: 1341355564,
    &quot;linktags_other&quot;: [
      [
        &quot;icon&quot;,
        &quot;http://VC4A.com/s/beta/graphics/vis/VC4A-favicon-trans.png&quot;
      ],
      [
        &quot;alternate&quot;,
        &quot;http://blog.VC4A.com/rss&quot;
      ]
    ],
    &quot;metatags_name&quot;: [
      [
        &quot;color:background&quot;,
        &quot;#666&quot;
      ],
      [
        &quot;color:content background&quot;,
        &quot;#fff&quot;
      ],
      [
        &quot;color:header background&quot;,
        &quot;#fff&quot;
      ],
      [
        &quot;color:title&quot;,
        &quot;#555555&quot;
      ],
      [
        &quot;color:description&quot;,
        &quot;#fff&quot;
      ],
      [
        &quot;color:date&quot;,
        &quot;#666&quot;
      ],
      [
        &quot;color:permalinks&quot;,
        &quot;#4AADF0&quot;
      ],
      [
        &quot;color:post title&quot;,
        &quot;#222&quot;
      ],
      [
        &quot;color:text&quot;,
        &quot;#222&quot;
      ],
      [
        &quot;color:inline link&quot;,
        &quot;#ff9900&quot;
      ],
      [
        &quot;color:quote&quot;,
        &quot;#333&quot;
      ],
      [
        &quot;color:quote source&quot;,
        &quot;#666&quot;
      ],
      [
        &quot;color:link post&quot;,
        &quot;#ff9900&quot;
      ],
      [
        &quot;color:conversation background 1&quot;,
        &quot;#f4f4f4&quot;
      ],
      [
        &quot;color:conversation background 2&quot;,
        &quot;#e8e8e8&quot;
      ],
      [
        &quot;color:conversation border&quot;,
        &quot;#ccc&quot;
      ],
      [
        &quot;color:conversation text&quot;,
        &quot;#000&quot;
      ],
      [
        &quot;color:photo background&quot;,
        &quot;#ccc&quot;
      ],
      [
        &quot;color:video background&quot;,
        &quot;#eee&quot;
      ],
      [
        &quot;viewport&quot;,
        &quot;width=675&quot;
      ]
    ],
    &quot;original_url&quot;: &quot;http://blog.VC4A.com/post/26449494972/happy-independence-day-america&quot;,
    &quot;robots_allowed&quot;: true,
    &quot;source_domain&quot;: &quot;blog.VC4A.com&quot;,
    &quot;url&quot;: &quot;http://blog.VC4A.com/post/26449494972/happy-independence-day-america&quot;,
    &quot;url_fetched&quot;: &quot;http://blog.VC4A.com/post/26449494972/happy-independence-day-america&quot;
  },
  &quot;status_code&quot;: 200,
  &quot;status_txt&quot;: &quot;OK&quot;
}</pre>

</div>

<div class="apiendpoint" id="v3_link_content">

<h2>/v3/link/content</h2>
<p>Returns the “main article” from the linked page, as determined by the content extractor, in either HTML or plain text format.</p>
<p>Authentication: <a href="authentication.php">oauth2</a></p>
<h3>Parameters</h3>
<ul>
<li>link - a VC4A link.</li>
<li>content_type (optional) - specifies whether to return the content as html or plain text (default: html)._</li>
</ul>
<h3>Example Request</h3>
<pre class="example">API Address: https://api-ssl.VC4A.com
GET /v3/link/content?access_token=ACCESS_TOKEN&amp;link=http%3A%2F%2Fbit.ly%2FMwSGaQ</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">{
  &quot;data&quot;: {
    &quot;content&quot;: &quot;&lt;div class=\&quot;regular\&quot;&gt;\r\n  &lt;h2&gt;\r\n&lt;a href=\&quot;http://blog.VC4A.com/post/26449494972/ ....&quot;,
    &quot;content_type&quot;: &quot;html&quot;
  },
  &quot;status_code&quot;: 200,
  &quot;status_txt&quot;: &quot;OK&quot;
}</pre>

</div>

<div class="apiendpoint" id="v3_link_category">

<h2>/v3/link/category</h2>
<p>Returns the detected categories for a document, in descending order of confidence.</p>
<p>Authentication: <a href="authentication.php">oauth2</a></p>
<h3>Parameters</h3>
<ul>
<li>link - a VC4A link.</li>
</ul>
<h3>Example Request</h3>
<pre class="example">API Address: https://api-ssl.VC4A.com
GET /v3/link/category?access_token=ACCESS_TOKEN&amp;link=http%3A%2F%2Fbit.ly%2F1234</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">{
  &quot;data&quot;: {
    &quot;categories&quot;: [
      &quot;Social Media&quot;,
      &quot;Advertising&quot;,
      &quot;Software and Internet&quot;,
      &quot;Technology&quot;,
      &quot;Business&quot;
    ]
  },
  &quot;status_code&quot;: 200,
  &quot;status_txt&quot;: &quot;OK&quot;
}</pre>

</div>

<div class="apiendpoint" id="v3_link_social">

<h2>/v3/link/social</h2>
<p>Returns the "social score" for a specified VC4A link. Note that social score are highly dependent upon activity (clicks) occurring on the VC4A link. It there haven't been clicks on a VC4A link within the last 24 hours, it it possible a social score for that link does not exist.</p>
<p>Authentication: <a href="authentication.php">oauth2</a></p>
<h3>Parameters</h3>
<ul>
<li>link - a VC4A link.</li>
</ul>
<h3>Example Request</h3>
<pre class="example">API Address: https://api-ssl.VC4A.com
GET /v3/link/social?access_token=ACCESS_TOKEN&amp;link=http%3A%2F%2Fbit.ly%2FMwSGaQ</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">{
  &quot;data&quot;: {
    &quot;social_scores&quot;: {
      &quot;http://bit.ly/MwSGaQ&quot;: &quot;76&quot;
    }
  },
  &quot;status_code&quot;: 200,
  &quot;status_txt&quot;: &quot;OK&quot;
}</pre>

</div>

<div class="apiendpoint" id="v3_link_location">

<h2>/v3/link/location</h2>
<p>Returns the significant locations for the VC4A link or None if locations do not exist. Note that locations are highly dependent upon activity (clicks) occurring on the VC4A link. It there haven't been clicks on a VC4A link within the last 24 hours, it it possible that location data for that link does not exist.</p>
<p>Authentication: <a href="authentication.php">oauth2</a></p>
<h3>Parameters</h3>
<ul>
<li>link - a VC4A link.</li>
</ul>
<h3>Example Request</h3>
<pre class="example">API Address: https://api-ssl.VC4A.com
GET /v3/link/location?access_token=ACCESS_TOKEN&amp;link=http%3A%2F%2Fbit.ly%2FMZGoYV</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">{
  &quot;data&quot;: {
    &quot;locations&quot;: [
      &quot;us-ny-new york&quot;,
      &quot;us-ny-brooklyn&quot;
    ]
  },
  &quot;status_code&quot;: 200,
  &quot;status_txt&quot;: &quot;OK&quot;
}</pre>

</div>

<div class="apiendpoint" id="v3_link_language">

<h2>/v3/link/language</h2>
<p>Returns the significant languages for the VC4A link. Note that languages are highly dependent upon activity (clicks) occurring on the VC4A link. It there haven't been clicks on a VC4A link within the last 24 hours, it it possible that language data for that link does not exist.</p>
<p>Authentication: <a href="authentication.php">oauth2</a></p>
<h3>Parameters</h3>
<ul>
<li>link - a VC4A link.</li>
</ul>
<h3>Example Request</h3>
<pre class="example">API Address: https://api-ssl.VC4A.com
GET /v3/link/language?access_token=ACCESS_TOKEN&amp;link=http%3A%2F%2Fbit.ly%2FMwSGaQ</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">{
  &quot;data&quot;: {
    &quot;languages&quot;: {
      &quot;http://bit.ly/MwSGaQ&quot;: &quot;en&quot;
    }
  },
  &quot;status_code&quot;: 200,
  &quot;status_txt&quot;: &quot;OK&quot;
}</pre>

</div>

</div>

<?php include( 'footer.php' ); ?> 

</body>
</html>