<?php include( 'header.php' ); ?> 

<div id="interiorContainer" class="clearfix">

<?php include( 'api_toc.php' ); ?> 

<div id="content">

<h1>Fundraising</h1>

<div id="apitoc"><ul>
<li><a href="#v1_fundraising_info">/v1/fundraising</a></li>
<li><a href="#v1_fundraising_stages">/v1/fundraising/stages</a></li>
<li><a href="#v1_fundraising_search">/v1/fundraising/search</a></li>
<!--li><a href="#v1_fundraising_ventures_id">/v1/fundraising/:venture_id</a></li-->
</ul></div>

<div class="apiendpoint" id="v1_fundraising_info">

<h2>/v1/fundraising</h2>
<p>Returns an array of compact user objects, according to default record offset and limit.</p>
<h3>Parameters</h3>
<ul>
<li>
<p>status - <strong>(required)</strong> a string value corresponding to the fundraising enumerated type.</p>
</li>
<li>
<p>limit - refers to the number of records returned in the request.</p>
</li>
<li>
<p>offset - refers to the record offset, for pagination purposes.<p>
</li>
</ul>
<p><strong>Note</strong></p>
<ul>
<li>if the <code>status</code> parameter is not included, a 400 Error: 'Missing required parameters' will be returned.</li>
<li>the <code>status</code> parameter accepts one of the following fundraising status values: <code>r_fundraising</code>, <code>r_dealmaking</code>, <code>r_completed</code>, <code>r_pending</code>, or <code>r_closed</code>.</li>
<li><code>limit</code> is optional (defaults to 20).</li>
<li><code>offset</code> is optional (defaults to 0).</li>
<li>VC4A API key authorization required.</li>
</ul>
<h3>Return Values</h3>
<ul>
<li>id - the unique vc4a identifier for the round.</li>
<li>post_date - a <code>timestamp</code> corresponding to the date the round was posted.</li>
<li>title - the corresponding title for the round.</li>
<li>fundStatus - the status corresponding to the round.</li>
<li>venture_id - the unique vc4a identifier corresponding to the associated venture.</li>
<li>capital - the amount of capital in USD for the round.</li>
</ul>
<h3>Example Request</h3>
<pre class="example">API Address: https://api.vc4a.com
GET /v1/fundraising.json?status=r_fundraising&limit=5</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">
{
    "fundraising": [{
        "id": "41209",
        "post_date": "2015-04-20 12:48:07",
        "title": "Pareto Biotechnologies - funding round",
        "fundStatus": "Raising Capital",
        "venture_id": "40578",
        "capital": "10000000"
    }, {
        "id": "40210",
        "post_date": "2015-04-20 11:58:50",
        "title": "Stayful Booking - funding round",
        "fundStatus": "Raising Capital",
        "venture_id": "40753",
        "capital": "125000"
    }, {
        "id": "41651",
        "post_date": "2015-04-15 15:44:35",
        "title": "Remit2Kenya - funding round",
        "fundStatus": "Raising Capital",
        "venture_id": "39517",
        "capital": "75000"
    }, {
        "id": "41324",
        "post_date": "2015-04-15 14:57:53",
        "title": "SaferMotos - funding round",
        "fundStatus": "Raising Capital",
        "venture_id": "38691",
        "capital": "500000"
    }, {
        "id": "41046",
        "post_date": "2015-04-09 21:14:39",
        "title": "SokoConnect - funding round",
        "fundStatus": "Raising Capital",
        "venture_id": "40416",
        "capital": "250000"
    }],
    "_metadata": [{
        "offset": "0",
        "limit": "5",
        "totalCount": 5
    }]
},
  &quot;status_code&quot;: 200,
  &quot;status_txt&quot;: &quot;OK&quot;
}
</pre>

</div>

<div class="apiendpoint" id="v1_fundraising_stages">

<h2>/v1/fundraising/stages</h2>
<p>Returns an array of compact objects, according to default record offset and limit.</p>
<h3>Parameters</h3>
<ul>
<li>
<p>None</p>
</li>
</ul>
<h3>Return Values</h3>
<ul>
<li>stages - the values corresponding to venture financing stages.</li>
</ul>
<h3>Example Request</h3>
<pre class="example">API Address: https://api.vc4a.com
GET /v1/fundraising/stages.json</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">
{
  "stages": [{
    "1st-round-series-a",
    "2nd-round-working-cap",
    "3rd-round-mezzanine",
    "4th-round-bridge",
    "founder-capital",
    "seed",
    "start-up",
    "uncategorized"
  }],
  "_metadata": [{
      "totalCount": 8
    }]
}
  &quot;status_code&quot;: 200,
  &quot;status_txt&quot;: &quot;OK&quot;
}
</pre>

</div>



<div class="apiendpoint" id="v1_fundraising_search">

<h2>/v1/fundraising/search</h2>
<p>Queries fundraising rounds by name, country, sector, tag, fundraising status or ID. Returns an array of compact venture objects with associated financial details.</p>
<h3>Parameters</h3>
<ul>
<li>name - the corresponding name of the fundraising round.</li>
<li>country - the country associated with the fundraising round.</li>
<li>sector - the primary sector associated with the fundraising round.</li>
<li>tag - a tags associated with the fundraising round.</li>
<li>status - the type of fundraising round.</li>
</ul>
<p><strong>Note</strong></p>
<ul>
<li><code>status</code> is a required parameter.</li>
<li>VC4A API key authorization required.</li>
</ul>
<h3>Return Values</h3>
<ul>
<li>id - the unique vc4a identifier for the fundraising venture.</li>
<li>ownerid - the unique identifier for the fundraising round owner.</li>
<li>title - the corresponding title for the venture.</li>
<li>pitch - the summary pitch for the venture.</li>
<li>capital - the amount of capital in USD for the round.</li>
<li>network_strength - a decimal value corresponding to the calculated signal strength of the venture.</li>
<li>shorturl - the corresponding short URL which redirects to the full URI of the venture.</li>
<li>country - the primary country where the venture is based.</li>
<li>latitude - the north-south distance from the equator, expressed in degrees and minutes.</li>
<li>longitude - the east-west distance from the meridian, expressed in degrees and minutes.</li>
<li>metadata - <code>offset</code>, <code>limit</code> and <code>totalCount</code>.</li>
</ul>
</ul>
<h3>Example Request</h3>
<pre class="example">API Address: https://api.vc4a.com
GET /v1/fundraising/search.json?status=r_completed&limit=5</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">
{
    "fundraising": [{
        "id": "40572",
        "ownerid": "21615",
        "title": "SaharaBranded",
        "date_created": "2015-03-11 14:22:54",
        "pitch": "Review, select and buy a wide variety of artisanal crafts made in the Sahara.",
        "capital": "20000",
        "network_strength": "0.94",
        "shorturl": "http://vc4afri.ca/cl1j4",
        "country": "Mali",
        "latitude": "4.287556427760489",
        "longitude": "10.689018062500054"
    }, {
        "id": "36030",
        "ownerid": "16521",
        "title": "OrinokoPay",
        "date_created": "2015-11-26 18:39:09",
        "pitch": "Reliable mobile card payment services that work anywhere.",
        "capital": "450000",
        "network_strength": "0.81",
        "shorturl": "http://vc4afri.ca/5cqso",
        "country": "Nigeria",
        "latitude": "-13.667338259654947",
        "longitude": "28.6962890625"
    }, {
        "id": "35182",
        "ownerid": "6778",
        "title": "Democratize",
        "date_created": "2015-04-13 10:25:49",
        "pitch": "Discover which of your friends are voters and campaign with them.",
        "capital": "600000",
        "network_strength": "0.83",
        "shorturl": "http://vc4afri.ca/oergq",
        "country": "Cameroon",
        "latitude": "5.2509943447956795",
        "longitude": "12.007377437500054"
    }, {
        "id": "35924",
        "ownerid": "15911",
        "title": "Sustainable Energy",
        "date_created": "2015-7-12 15:43:03",
        "pitch": "We aim to end kerosene consumption in Africa. Our patented ethanol gel stoves are safe and clean.",
        "capital": "250000",
        "network_strength": "0.91",
        "shorturl": "http://vc4afri.ca/7gxmk",
        "country": "Kenya",
        "latitude": "4.199906782278597",
        "longitude": "11.216361812500054"
    }, {
        "id": "35761",
        "ownerid": "22798",
        "title": "StudentPrep",
        "date_created": "2015-09-08 21:52:40",
        "pitch": "An e-learning platform that helps students succeed in school.",
        "capital": "75000",
        "network_strength": "0.72",
        "shorturl": "http://vc4afri.ca/5dqg5",
        "country": "Cape Verde",
        "latitude": "15.210222837556922",
        "longitude": "-23.88184306249991"
    }]
},
  &quot;status_code&quot;: 200,
  &quot;status_txt&quot;: &quot;OK&quot;
}
</pre>
</div>

<?php include( 'footer.php' ); ?> 

</body>
</html>