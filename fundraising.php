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
<li>the <code>status</code> parameter accepts one of the following fundraising status values: <code>r_fundraising</code>, <code>r_completed</code>, or <code>r_pending</code>.</li>
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
<p>Returns an array of compact objects.</p>
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
<li>status - <b>(required)</b> a string value corresponding to the fundraising enumerated type.</li>
<li>name - the corresponding name of the fundraising round.</li>
<li>country - the country associated with the fundraising round.</li>
<li>sector - the primary <a href="ventures.php#v1_ventures_sectors">sector</a> associated with the fundraising round.</li>
<li>stage - the <a href="#v1_fundraising_stages">stage</a> associated with the fundraising round.</li>
<li><del>tag - tags associated with the fundraising round.</del></li>

</ul>
<p><strong>Note</strong></p>
<ul>
<li>if the <code>status</code> parameter is not included, a 400 Error: 'Missing required parameters' will be returned.</li>
<li>the <code>status</code> parameter accepts one of the following fundraising status values: <code>r_fundraising</code>, <code>r_completed</code>, or <code>r_pending</code>.</li>
<li>VC4A API key authorization required.</li>
</ul>
<h3>Return Values</h3>
<ul>
<li>id - the unique vc4a identifier for the fundraising venture.</li>
<li>ownerid - the unique identifier for the fundraising round owner.</li>
<li>title - the corresponding title for the venture.</li>
<li>date_created - the date the venture was created.
<li>pitch - the summary pitch for the venture.</li>
<li>capital - an array of objects representing the capitalization history, including financing stage, amount (USD) and date.</li>
<li>network_strength - a decimal value corresponding to the calculated signal strength of the venture.</li>
<li>shorturl - the corresponding short URL which redirects to the full URI of the venture.</li>
<li>country - the primary  country where the venture is based.</li>
<li>latitude - the north-south distance from the equator, expressed in degrees and minutes.</li>
<li>longitude - the east-west distance from the meridian, expressed in degrees and minutes.</li>
<li>metadata - <code>offset</code>, <code>limit</code> and <code>totalCount</code>.</li>
</ul>
</ul>
<h3>Example Request</h3>
<pre class="example">API Address: https://api.vc4a.com
GET /v1/fundraising/search.json?status=r_completed&amp;sector=Education&amp;country=Nigeria&amp;limit=5</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">
{
    "ventures": [{
        "id": "102793",
        "ownerid": "29933",
        "title": "Verilearn",
        "date_created": "2018-03-11 14:22:54",
        "pitch": "We improve students’ learning and knowledge retention.",
        "capital": [{
          "stage": "Start-up",
          "amount": "2800",
          "date": "2018-03-26 00:00:00"
        },{
          "stage": "Founder capital",
          "amount": "20000",
          "date": "2018-01-19 00:00:00"
        },{
          "stage": "Founder capital",
          "amount": "1500",
          "date": "2017-03-19 00:00:00"
        }],
        "network_strength": "0.94",
        "shorturl": "http://vc4afri.ca/3w3",
        "country": "Nigeria",
        "latitude": "6.4561564",
        "longitude": "3.437744699"
    }, {
        "id": "100147",
        "ownerid": "71986",
        "title": "Geek Code Planet",
        "date_created": "2018-04-10 22:33:07",
        "pitch": "Kids learn concepts in different coding platforms and get to make real life projects.",
        "capital": [{
          "stage": "Founder capital",
          "amount": "270",
          "date": "2018-04-10 00:00:00"
        }],
        "network_strength": "0.81",
        "shorturl": "http://vc4afri.ca/377",
        "country": "Nigeria",
        "latitude": "9.1089348",
        "longitude": "7.4110988"
    }, {
        "id": "99344",
        "ownerid": "73456",
        "title": "Traindemy Limited",
        "date_created": "2018-04-03 13:04:02",
        "pitch": "Online learning platform where people can acquire vocational skills and talent coaching.",
        "capital": [{
          "stage": "Start-up",
          "amount": "1000",
          "date": "2018-01-15 00:00:00"
        }],
        "network_strength": "0.83",
        "shorturl": "http://vc4afri.ca/32r",
        "country": "Nigeria",
        "latitude": "6.4369911",
        "longitude": "3.4883181"
    }, {
        "id": "99242",
        "ownerid": "73225",
        "title": "Tembo Education",
        "date_created": "2018-03-30 17:11:57",
        "pitch": "Tembo sends one education activity per day, to parents, via text messages.",
        "capital": [{
          "stage": "Start-up",
          "amount": "127000",
          "date": "2018-03-30 00:00:00"
        }],
        "network_strength": "0.91",
        "shorturl": "http://vc4afri.ca/322",
        "country": "Nigeria",
        "latitude": "6.535233",
        "longitude": "3.3489671"
    }, {
        "id": "96227",
        "ownerid": "69336",
        "title": "Tertary Nigeria",
        "date_created": "2018-02-21 12:10:20",
        "pitch": "We help univerity students secure internship positions to build their practical skills.",
        "capital": [{
          "stage": "Seed",
          "amount": "5000",
          "date": "2017-11-21 00:00:00"
        },{
          "stage": "Founder capital",
          "amount": "3000",
          "date": "2016-12-30 00:00:00"
        }],
        "network_strength": "0.72",
        "shorturl": "http://vc4afri.ca/2gx",
        "country": "Nigeria",
        "latitude": "6.4979884",
        "longitude": "3.3439291"
    }]
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

<?php include( 'footer.php' ); ?> 

</body>
</html>