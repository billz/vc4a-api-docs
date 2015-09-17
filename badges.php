<?php include( 'header.php' ); ?> 

<div id="interiorContainer" class="clearfix">

<?php include( 'api_toc.php' ); ?>

<div id="content">

<h1>Badges</h1>

<div id="apitoc"><ul>
<li><a href="#v1_badges">/v1/badges</a></li>
<li><a href="#v1_badgeid">/v1/badges/:badge_id</a></li>
</ul></div>

<div class="apiendpoint" id="v1_badges">

<h2>/v1/badges</h2>
<p>Returns an array of compact badge objects, according to default record limit and offset.</p>
<p>Authentication: <a href="authentication.php#apikey">api key</a></p>
<h3>Parameters</h3>
<ul>
<li>
<p>limit - refers to the number of records returned in the request.</p>
</li>
<li>
<p>offset - refers to the record offset, for pagination purposes.<p>
</li>
</ul>
<p><strong>Note</strong></p>
<ul>
<li><code>limit</code> is optional (defaults to 20).</li>
<li><code>offset</code> is optional (defaults to 0).</li>
</ul>
<h3>Return Values</h3>
<ul>
<li>id - the unique vc4a identifier for the badge.</li>
<li>name - the corresponding name for the badge.</li>
<li>slug - a URL friendly version of the resource name.</li>
<li>uri - the URI for the badge on the host server.</li>
<li>description - the corresponding descriptive text for the badge.</li>
</ul>
<h3>Example Request</h3>
<pre class="example">API Address: https://api.vc4africa.biz
GET /v1/badges?offset=0&limit=5</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">
{
    "badges": [{
        "id": "1",
        "name": "Crowd Favorite",
        "slug": "crowd-favorite",
        "uri": "http://vc4africa.biz/badges/crowd-favorite",
        "description": "[Descriptive text]."
    }, {
        "id": "2",
        "name": "VC4A Investor",
        "slug": "vc4a-investor",
        "uri": "http://vc4africa.biz/badges/vc4a-investor",
        "description": "[Descriptive text]."
    }, {
        "id": "3",
        "name": "Green Entrepreneur",
        "slug": "green-entrepreneur",
        "uri": "http://vc4africa.biz/badges/green-entrepreneur",
        "description": "[Descriptive text]."
    }, {
        "id": "4",
        "name": "Jetsetter",
        "slug": "jetsetter",
        "uri": "http://vc4africa.biz/badges/jetsetter",
        "description": "[Descriptive text]."
    }, {
        "id": "5",
        "name": "On Fire",
        "slug": "on-fire",
        "uri": "http://vc4africa.biz/badges/on-fire",
        "description": "[Descriptive text]."
    }],
    "_metadata": {
        "offset": "0",
        "limit": "5",
        "totalCount": 5
    }
},
  &quot;status_code&quot;: 200,
  &quot;status_txt&quot;: &quot;OK&quot;
}</pre>

</div>

<div class="apiendpoint" id="v1_badgeid">

<h2>/v1/badges/:badge_id</h2>
<p>Returns detailed information for a specific badge, including users who have unlocked it and associated metadata.
.</p>
<h3>Parameters</h3>
<ul>
<li>badge_id -  the unique vc4a identifier for the badge.</li>
</ul>
<p><strong>Note</strong></p>
<ul>
<li><code>badge_id</code> is a required parameter.</li>
</ul>
<h3>Return Values</h3>
<ul>
<li>id - the unique identifier for the badge.</li>
<li>name - the corresponding name for the badge.</li>
<li>slug - a URL friendly version of the resource name.</li>
<li>picture_id - the unique identifier of the media resource associated with the badge.</li>
<li>description - the corresponding descriptive text for the badge.</li>
<li>users - an array of identifiers for the users who have unlocked the badge.</li>
</ul>
<h3>Example Request</h3>
<pre class="example">API Address: https://api.vc4africa.biz/v1/badges/1
GET /v1/badges/1</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">
  {
    "id": "4",
    "name": "Jetsetter",
    "slug": "jetsetter",
    "picture_id": "52",
    "description": "You traveled a long distance to attend a  meetup.",
    "users": [{
        "user_id": "1"
    }, {
        "user_id": "156"
    }, {
        "user_id": "155"
    }, {
        "user_id": "157"
    }]
},
  &quot;status_code&quot;: 200,
  &quot;status_txt&quot;: &quot;OK&quot;
}</pre>

</div>


</div>

<?php include( 'footer.php' ); ?> 

</body>
</html>