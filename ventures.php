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
            <li class="on"><a href="ventures.php">Ventures</a></li>
        </ul>
    </li>
    <li><a href="best_practices.php">Best Practices</a></li>
    <li><a href="changelog.php">Revision History</a></li>

</ul>

<div id="content">

<h1>Ventures</h1>

<div id="apitoc"><ul>
<li><a href="#v1_ventures">/v1/ventures</a></li>
<li><a href="#v1_ventures_id">/v1/ventures/:venture_id</a></li>
<li><a href="#v1_ventures_activity">/v1/ventures/:venture_id/activity</a></li>
<li><a href="#v1_ventures_team">/v1/ventures/:venture_id/team</a></li>
<li><a href="#v1_ventures_search">/v1/ventures/search</a></li>
</ul></div>

<div class="apiendpoint" id="v1_ventures">

<h2>/v1/ventures</h2>
<p>Returns an array of compact venture objects including title, pitch text, country and map coordinates (latitude and longitude).
Default record offset and limits apply.</p>
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
<li>id - the unique identifier for the venture.</li>
<li>title - the corresponding name for the venture.</li>
<li>pitch - the corresponding pitch for the venture.</li>
<li>country - the primary country where the venture is based.</li>
<li>latitude - the north-south distance from the equator, expressed in degrees and minutes.</li>
<li>longitude - the east-west distance from the meridian, expressed in degrees and minutes.</li>
</ul>
<h3>Example Request</h3>
<pre class="example">API Address: https://api.vc4africa.biz
GET /v1/ventures?offset=0&limit=5</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">
{
    "ventures": [{
        "id": "9",
        "title": "Miniature Vancouver",
        "pitch": "Vivamus ac lorem metus. Sed eu sapien risus, sed vehicula nulla.",
        "country": "Ethiopia",
        "latitude": "4.287556427760489",
        "longitude": "10.689018062500054"
    }, {
        "id": "12",
        "title": "Panda Whale",
        "pitch": "We are a consumer Internet service for organizing and sharing great content.",
        "country": "Zambia",
        "latitude": "-13.667338259654947",
        "longitude": "28.6962890625"
    }, {
        "id": "13",
        "title": "Mino Monsters",
        "pitch": "Discover which of your friends are voters and campaign with them to elect Pokemon.",
        "country": "Cameroon",
        "latitude": "5.2509943447956795",
        "longitude": "12.007377437500054"
    }, {
        "id": "16",
        "title": "Anvil Studio",
        "pitch": "Maker of the finest widgets to simplify your modern life.",
        "country": "Cameroon",
        "latitude": "4.199906782278597",
        "longitude": "11.216361812500054"
    }, {
        "id": "18",
        "title": "Space Tourism",
        "pitch": "We launch people into space. 'Nuff said.",
        "country": "Cape Verde",
        "latitude": "15.210222837556922",
        "longitude": "-23.88184306249991"
    }],
    "_metadata": [{
        "offset": "0",
        "limit": "5",
        "totalCount": 5
    }],
  &quot;status_code&quot;: 200,
  &quot;status_txt&quot;: &quot;OK&quot;
}
</pre>

</div>

<div class="apiendpoint" id="v1_ventures_id">

<h2>/v1/ventures/:venture_id</h2>
<p>Returns detailed information and metadata for a given venture, including followers, summary plan text, fundraising status, sectors, tags, venture owner ID and so on.</p>
<h3>Parameters</h3>
<ul>
<li>venture_id - the unique vc4a identifier for the venture.</li>
</ul>
<p><strong>Note</strong></p>
<ul>
<li><code>venture_id</code> is required.    
</ul>
<h3>Return Values</h3>
<ul>
<li>id - the unique vc4a identifier for the venture.</li>
<li>owner - the unique identifier for the venture owner.</li>
<li>title - the corresponding title for the venture.</li>
<li>pitch - the corresponding pitch for the venture.</li>
<li>sector - the primary sector the ventures is engaged in.</li>
<li>tags - a comma-delimted list of tags associated with the venture.</li>
<li>fundStatus - the current fundraising status of the venture.</li>
<li>country - the primary country where the venture is based.</li>
<li>latitude - the north-south distance from the equator, expressed in degrees and minutes.</li>
<li>longitude - the east-west distance from the meridian, expressed in degrees and minutes.</li>
<li>followers - an array of unique identifiers for the users who are following the venture.</li>

</ul>
<h3>Example Request</h3>
<pre class="example">API Address: https://api.vc4africa.biz
GET /v1/ventures/18</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">{
    "id": "18",
    "owner": "1",
    "title": "Space Tourism",
    "pitch": "We launch people into space. 'Nuff said.",
    "sector": "tourism",
    "tags": "space,rockets,zero-g",
    "fundStatus": "Seeking Investor",
    "country": "Cape Verde",
    "latitude": "15.210222837556922",
    "longitude": "-23.88184306249991",
    "followers": [{
        "follower_id": "1"
    }]
},
  &quot;status_code&quot;: 200,
  &quot;status_txt&quot;: &quot;OK&quot;
}</pre>

</div>

<div class="apiendpoint" id="v1_ventures_activity">

<h2>/v1/ventures/:venture_id/activity</h2>
<p>Returns the activity of a given venture.</p>
<h3>Parameters</h3>
<ul>
<li>venture_id - the unique vc4a identifier for the venture.</li>
</ul>
<p><strong>Note</strong></p>
<ul>
<li><code>venture_id</code> is required.    
</ul>
<h3>Return Values</h3>
<ul>
<li>id - the unique vc4a identifier for the venture activity item.</li>
<li>date - a <code>timestamp</code> representing the time at which the activity was created.</li>
<li>content - the content of the activity update for the venture.</li>
<li>metadata - <code>offset</code>, <code>limit</code> and <code>totalCount</code>.</li>
</ul>
</li>
</ul>
<h3>Example Request:</h3>
<pre class="example">API Address: https://api.vc4africa.biz
GET /v1/ventures/18/activity</pre>

<h3>Example Response:</h3>
<pre class="prettyprint lang-js">{
    "venture_activity": [{
        "id": "150596",
        "date": "2012-09-05 15:32:23",
        "content": "We have just welcomed our 50,000th user."
    }, {
        "id": "150623",
        "date": "2012-10-04 09:06:55",
        "content": "Pikachu for president."
    }],
    "_metadata": [{
        "offset": "0",
        "limit": "20",
        "totalCount": 2
    }]
  },
  &quot;status_code&quot;: 200,
  &quot;status_txt&quot;: &quot;OK&quot;
}</pre>

</div>


<div class="apiendpoint" id="v1_ventures_team">

<h2>/v1/ventures/:venture_id/team</h2>
<p>Returns a list of IDs for the team member(s) associated with a given venture.</p>
<h3>Parameters</h3>
<ul>
<li>venture_id - the unique vc4a identifier for the venture.</li>
</ul>
<p><strong>Note</strong></p>
<ul>
<li><code>venture_id</code> is required.    
</ul>

<h3>Example Request:</h3>
<pre class="example">API Address: https://api.vc4africa.biz
GET /v1/ventures/18/team</pre>

<h3>Return Values</h3>
<ul>
<li>user_id: a unique identifier corresponding to the team member.</li>
<li>metadata - <code>offset</code>, <code>limit</code> and <code>totalCount</code>.</li>
</ul>
<h3>Example Response:</h3>
<pre class="prettyprint lang-js">{
    "team_members_id": [{
        "user_id": "1580",
        "user_id": "1210",
        "user_id": "930",
        "user_id": "9107"
    }],
    "_metadata": [{
        "offset": "0",
        "limit": "20",
        "totalCount": 1
    }]
}</pre>
</div>

<div class="apiendpoint" id="v1_ventures_search">

<h2>/v1/ventures/search</h2>
<p>Queries ventures by name, country, sector, tag, fundraising status or ID. Returns an array of compact venture objects.</p>
<h3>Parameters</h3>
<ul>
<li>name - the corresponding name of the venture.</li>
<li>country - the country where the venture is located.</li>
<li>sector - the primary sector the venture is engaged in.</li>
<li>tag - a list of tags associated with the venture.</li>
<li>status - the current fundraising status of the venture.</li>
<li>id - the unique vc4a identifier for the venture.</li>
    
</ul>
<p><strong>Note</strong></p>
<ul>
<li>at least one of the above parameters is required, otherwise a 400 Error: 'Missing required parameters' will be returned.</li>
<li>the <code>status</code> parameter accepts one of the following fundraising status values: <code>r_fundraising</code>, <code>r_dealmaking</code> or <code>r_pending</code>.</li>
</ul>

<h3>Return Values</h3>
<ul>
<li>id - the unique vc4a identifier for the venture.</li>
<li>owner - the unique identifier for the venture owner.</li>
<li>title - the corresponding title for the venture.</li>
<li>pitch - the corresponding pitch for the venture.</li>
<li>sector - the primary sector the ventures is engaged in.</li>
<li>tags - a comma-delimted list of tags associated with the venture.</li>
<li>fundStatus - the current fundraising status of the venture.</li>
<li>country - the primary country where the venture is based.</li>
<li>latitude - the north-south distance from the equator, expressed in degrees and minutes.</li>
<li>longitude - the east-west distance from the meridian, expressed in degrees and minutes.</li>
<li>followers - an array of unique identifiers for the users who are following the venture.</li>
<li>metadata - <code>offset</code>, <code>limit</code> and <code>totalCount</code>.</li>
</ul>

<h3>Example Request:</h3>
<pre class="example">API Address: https://api.vc4africa.biz
GET /v1/ventures/search?country=Ethiopia&status=r_fundraising</pre>

<h3>Example Response:</h3>
<pre class="prettyprint lang-js">{
    "ventures": [{
        "id": "9",
        "owner": "1",
        "title": "Miniature Vancouver",
        "pitch": "Vivamus ac lorem metus. Sed eu sapien risus, sed vehicula nulla.",
        "sector": "Electronics,Leisure",
        "tags": "video,documentary,entertainment,cities",
        "fundStatus": "Raising Capital",
        "country": "Ethiopia",
        "latitude": "4.287556427760489",
        "longitude": "10.689018062500054",
        "followers": [{
            "follower_id": "60"
        }, {
            "follower_id": "25"
        }, {
            "follower_id": "1"
        }, {
            "follower_id": "14"
        }, {
            "follower_id": "71"
        }, {
            "follower_id": "36"
        }]
    }],
    "_metadata": [{
        "offset": "0",
        "limit": "20",
        "totalCount": 1
    }]
}</pre>
</div>
</div>

<?php include( 'footer.php' ); ?> 
    
</body>
</html>