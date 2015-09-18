<?php include( 'header.php' ); ?> 

<div id="interiorContainer" class="clearfix">

<?php include( 'api_toc.php' ); ?>

<div id="content">

<h1>Ventures</h1>

<div id="apitoc"><ul>
<li><a href="#v1_ventures">/v1/ventures</a></li>
<li><a href="#v1_ventures_id">/v1/ventures/:venture_id</a></li>
<li><a href="#v1_ventures_activity">/v1/ventures/:venture_id/activity</a></li>
<li><a href="#v1_ventures_team">/v1/ventures/:venture_id/team</a></li>
<li><a href="#v1_ventures_search">/v1/ventures/search</a></li>
<li><a href="#v1_ventures_countries">/v1/ventures/countries</a></li>
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
<li>ownerid - the unique identifier for the venture owner.</li>
<li>title - the corresponding name for the venture.</li>
<li>date_created - the date/time the venture was created.</li>
<li>pitch - the corresponding pitch for the venture.</li>
<li>network strength - a decimal value corresponding to the calculated signal strength of the venture.</li>
<li>shorturl - the short URL which redirects to the full URI of the venture.</li>
<li>country - the primary country where the venture is based.</li>
<li>latitude - the north-south distance from the equator, expressed in degrees and minutes.</li>
<li>longitude - the east-west distance from the meridian, expressed in degrees and minutes.</li>
</ul>
<h3>Example Request</h3>
<pre class="example">API Address: https://api.vc4africa.biz
GET /v1/ventures.json?offset=0&limit=5</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">
{
    "ventures": [{
        "id": "9",
        "ownerid": "13",
        "title": "Miniature Vancouver",
        "date_created": "2015-04-15 10:51:26",
        "pitch": "Vivamus ac lorem metus. Sed eu sapien risus, sed vehicula nulla.",
        "network_strength": "0.24",
        "shorturl": "http://vc4afri.ca/cl8j4",
        "country": "Ethiopia",
        "latitude": "4.287556427760489",
        "longitude": "10.689018062500054"
    }, {
        "id": "12",
        "ownerid": "22",
        "title": "Panda Whale",
        "date_created": "2015-04-14 11:31:53",
        "pitch": "We are a consumer Internet service for organizing and sharing great content.",
        "network_strength": "0.61",
        "shorturl": "http://vc4afri.ca/7cqso",
        "country": "Nigeria",
        "latitude": "-13.667338259654947",
        "longitude": "28.6962890625"
    }, {
        "id": "13",
        "ownerid": "19",
        "title": "Mino Monsters",
        "date_created": "2015-04-13 10:25:49",
        "pitch": "Discover which of your friends are voters and campaign with them to elect Pokemon.",
        "network_strength": "0.83",
        "shorturl": "http://vc4afri.ca/ogrgq",
        "country": "Cameroon",
        "latitude": "5.2509943447956795",
        "longitude": "12.007377437500054"
    }, {
        "id": "16",
        "ownerid": "44",
        "title": "Anvil Studio",
        "date_created": "2015-04-12 15:43:03",
        "pitch": "Maker of the finest widgets to simplify your modern life.",
        "network_strength": "0.55",
        "shorturl": "http://vc4afri.ca/7xxmk",
        "country": "Kenya",
        "latitude": "4.199906782278597",
        "longitude": "11.216361812500054"
    }, {
        "id": "18",
        "ownerid": "30",
        "title": "Space Tourism",
        "date_created": "2015-04-12 09:07:29",
        "pitch": "We launch people into space. 'Nuff said.",
        "network_strength": "0.91",
        "shorturl": "http://vc4afri.ca/jdq55",
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
<li>id - the unique identifier for the venture.</li>
<li>ownerid - the unique identifier for the venture owner.</li>
<li>title - the corresponding title for the venture.</li>
<li>pitch - the corresponding textual pitch for the venture.</li>
<li>pitch_type - a string value corresponding to the type of pitch (elevator, longer, complex).</li>
<li>risky - a boolean value; high-risk venture that offers potentially high-rewards.</li>
<li>nda - a boolean value; venture owner requires NDA before sharing business plan.</li>
<li>ambitious - a boolean value; founder has the business savvy and persistence.</li>
<li>network - a boolean value; venture team is able to get introduced to the right people.</li>
<li>build - a string value corresponding to how the product/service is built (internal or external).</li>
<li>team - the summary text describing the venture team members.</li>
<li>state - a string value corresponding to the current state of the venture (none, prototype, working).</li>
<li>ip - a boolean value; venture team owns the intellectual property for the product.</li>
<li>oss - a boolean value; the product/service is based on open source technology.</li>
<li>product - the summary text corresponding to the product description.</li>
<li>community - a boolean value; plan to start by building a community of passionate customers.</li>
<li>advertising  - a boolean value; have identified one or more revenue streams.</li>
<li>prognosis - a boolean value; have a cash-flow prognosis.</li>
<li>revenue - a string value corresponding to the basic revenue plan (soon or now).</li>
<li>revenue_plan - the summary text corresponding to the revenue plan text.</li>
<li>notes - supplementary notes as added by the VC4A team.</li>
<li>quickscan_last_updated - date/time stamp corresponding to the last time the QuickScan was updated.</li>
<li>address - the cooresponding street address where the venture is based.</li>
<li>sectors - an array of sectors the venture is engaged in.</li>
<li>interest_regions - an array of regions the ventures is focused on.</li>
<li>interest_countries - an array of countries the ventures is focused on.</li>
<li>tags - an array of tags associated with the venture.</li>
<li>fundStatus - the current fundraising status of the venture.</li>
<li>country - the primary country where the venture is based.</li>
<li>latitude - the north-south distance from the equator, expressed in degrees and minutes.</li>
<li>longitude - the east-west distance from the meridian, expressed in degrees and minutes.</li>
<li>followers - an array of unique identifiers for the users who are following the venture.</li>
</ul>
<h3>Example Request</h3>
<pre class="example">API Address: https://api.vc4africa.biz
GET /v1/ventures/18.json</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">{
    "id": "18",
    "ownerid": "30",
    "title": "Space Tourism",
    "pitch": "We launch people into space. 'Nuff said.",
    "pitch_type: "elevator",
    "risky": true,
    "nda": false,
    "ambitious": true,
    "network": true,
    "build": "internal",
    "team": "We're a bunch of rocket scientists.",
    "state": "working",
    "ip": true,
    "oss": false,
    "product": "We have developed a medium-lift rocket and a crew capsule.",
    "community": true,
    "advertising": true,
    "prognosis": true,
    "revenue": "now",
    "revenue_plan": "We are a profit-making business in a niche market.",
    "notes": null,
    "quickscan_last_updated": "2015-03-10 05:51:47",
    "address": null,
    "sectors": [{
        "Aerospace",
        "Engineering",
        "Manufacturing",
    }],
    "interest_regions": [{
        "East Africa",
        "Southern Africa",
        "West Africa"
    }],
    "interest_countries": [{
        "Kenya",
        "Botswana",
        "Ghana"
    }],
    "tags": [{
        "space",
        "rockets",
        "awesome"
    }],
    "fundStatus": "Seeking Investor",
    "country": "Cape Verde",
    "latitude": "15.210222837556922",
    "longitude": "-23.88184306249991",
    "followers": [{
        "userid": "1"
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
<li>action - the recorded action of the activity item, including a URI to the profile of the actor.</li>
<li>content - (optional) the textual content of the activity update for the venture.</li>
<li>metadata - <code>offset</code>, <code>limit</code> and <code>totalCount</code>.</li>
</ul>
</li>
</ul>
<h3>Example Request:</h3>
<pre class="example">API Address: https://api.vc4africa.biz
GET /v1/ventures/18/activity.json</pre>

<h3>Example Response:</h3>
<pre class="prettyprint lang-js">{
    "venture_activity": [{
        "id": "150596",
        "date": "2012-09-05 15:32:23",
        "action": "<a href="https://vc4africa.biz/members/paul/" title="Paul">Paul</a> created the venture <a href="">GreenGlow Stoves</a>.",
        "content": ""
    }, {
        "id": "150623",
        "date": "2012-10-04 09:06:55",
        "action": "<a href="https://vc4africa.biz/members/alice/" title="Alice">Alice</a> posted an update in the venture <a href="">GreenGlow Stoves</a>",
        "content": "Great things happening here!"
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
GET /v1/ventures/18/team.json</pre>

<h3>Return Values</h3>
<ul>
<li>team_members: an array of unique identifiers corresponding to the team members.</li>
<li>metadata - <code>offset</code>, <code>limit</code> and <code>totalCount</code>.</li>
</ul>
<h3>Example Response:</h3>
<pre class="prettyprint lang-js">{
    "team_members": [{
        "userid": "1580",
        "userid": "1210",
        "userid": "930",
        "userid": "9107"
    }],
    "_metadata": [{
        "offset": "0",
        "limit": "20",
        "totalCount": 4
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
</ul>
<p><strong>Note</strong></p>
<ul>
<li>at least one of the above parameters is required, otherwise a 400 Error: 'Missing required parameters' will be returned.</li>
<li>the <code>status</code> parameter accepts one of the following fundraising status values: <code>r_fundraising</code>, <code>r_dealmaking</code>, <code>r_completed</code>, <code>r_pending</code> or <code>r_closed</code>.</li>
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
GET /v1/ventures/search.json?country=Ethiopia&status=r_fundraising</pre>

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
            "userid": "60"
        }, {
            "userid": "25"
        }, {
            "userid": "1"
        }, {
            "userid": "14"
        }, {
            "userid": "71"
        }, {
            "userid": "36"
        }]
    }],
    "_metadata": [{
        "offset": "0",
        "limit": "20",
        "totalCount": 1
    }]
}</pre>
</div>

<div class="apiendpoint" id="v1_ventures_countries">

<h2>/v1/ventures/countries</h2>
<p>Returns an array of base countries.</p>
<h3>Parameters</h3>
<ul>
<li>None.</li>
    
</ul>
<p><strong>Note</strong></p>
<ul>
<li>These values are useful as parameters for searching ventures by country. Refer to <a href="#v1_ventures_search">/v1/ventures/search</a>.</li>
</ul>

<h3>Return Values</h3>
<ul>
<li>countries - an array of string values corresponding to venture base countries, in alpha ascending order.</li>
<li>metadata - <code>totalCount</code>.</li>
</ul>

<h3>Example Request:</h3>
<pre class="example">API Address: https://api.vc4africa.biz
GET /v1/ventures/countries.json</pre>

<h3>Example Response:</h3>
<pre class="prettyprint lang-js">{
    "countries": [{
        "Algeria",
        "Angola",
        "Benin",
        "Botswana",
        "Burkina Faso",
        "Burundi",
        "Cameroon",
        "Cape Verde",
        "Central African Rep",
        "Chad",
        "Congo",
        "Dem. Rep. Congo",
        "Djibouti",
        "Egypt",
        "Ethiopia",
        ...
        }]
    }],
    "_metadata": [{
        "totalCount": 47
    }]
}</pre>
</div>
</div>


<?php include( 'footer.php' ); ?> 
    
</body>
</html>