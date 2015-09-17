<?php include( 'header.php' ); ?> 

<div id="interiorContainer" class="clearfix">

<?php include( 'api_toc.php' ); ?> 

<div id="content">

<h1>Users</h1>

<div id="apitoc"><ul>
<li><a href="#v1_user_info">/v1/users</a></li>
<li><a href="#v1_user_id">/v1/users/:user_id</a></li>
<li><a href="#v1_user_badges">/v1/users/:user_id/badges</a></li>
<li><a href="#v1_user_ventures">/v1/users/:user_id/ventures</a></li>
<li><a href="#v1_user_followers">/v1/users/:user_id/followers</a></li>
<li><a href="#v1_user_following">/v1/users/:user_id/following</a></li>
<li><a href="#v1_user_activity">/v1/users/:user_id/activity</a></li>
<li><a href="#v1_user_groups">/v1/users/:user_id/groups</a></li>
</ul></div>

<div class="apiendpoint" id="v1_user_info">

<h2>/v1/users</h2>
<p>Returns an array of compact user objects, according to default
    record offset and limit. (OAuth and user authorization
    required).</p>
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
<li>id - the unique vc4a identifier for the user.</li>
<li>userLogin - the corresponding login name for the user.</li>
<li>firstName - the corresponding first name for the user.</li>
<li>lastName - the corresponding last name for the user.</li>
<li>displayName - the display name chosen by the user (defaults to first/last name).</li>
<li>lastActive - a <code>timestamp</code> representing the user's last activity.</li>
<li>metadata - <code>offset</code>, <code>limit</code> and <code>totalCount</code>.</li>
</ul>
<h3>Example Request</h3>
<pre class="example">API Address: https://api.vc4africa.biz
GET /v1/users?offset=0&limit=5</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">
{
    "users": [{
        "id": "1580",
        "userLogin": "nelsonkana",
        "firstName": "Nelson",
        "lastName": "Kana",
        "displayName": "Nelson Kana",
        "lastActive": "2012-09-19 13:59:27"
    }, {
        "id": "7573",
        "userLogin": "davidvandijk",
        "firstName": "David",
        "lastName": "van Dijk",
        "displayName": "David van Dijk",
        "lastActive": "2012-07-24 08:00:32"
    }, {
        "id": "1156",
        "userLogin": "benwhite",
        "firstName": "Ben",
        "lastName": "White",
        "displayName": "Ben White",
        "lastActive": "2012-10-09 10:05:53"
    }, {
        "id": "9155",
        "userLogin": "ebottabi",
        "firstName": "Ebot",
        "lastName": "Tabi",
        "displayName": "Ebot Tabi",
        "lastActive": "2012-07-24 08:01:17"
    }, {
        "id": "121",
        "userLogin": "billzimmerman",
        "firstName": "Bill",
        "lastName": "Zimmerman",
        "displayName": "Bill Zimmerman",
        "lastActive": "2012-03-27 13:02:26"
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

<div class="apiendpoint" id="v1_user_id">

<h2>/v1/users/:user_id</h2>
<p>Returns extended profile information for a given user and associated metadata.</p>
<h3>Parameters</h3>
<ul>
<li>
<p>user_id -  the unique vc4a identifier for the user.</p>
</li>
</ul>
<p><strong>Note</strong></p>
<ul>
<li><code>user_id</code> is a required parameter.</li>
</ul>
<h3>Return Values</h3>
<ul>
<li>id - the unique vc4a identifier for the user.</li>
<li>firstName - the corresponding first name for the user.</li>
<li>lastName - the corresponding last name for the user.</li>
<li>displayName - the display name chosen by the user (defaults to first/last name).</li>
<li>lastActive - a <code>timestamp</code> representing the user's last activity.</li>
<li>title - the corresponding title for the user.</li>
<li>organization - the corresponding organization for the user.</li>
<li>city - the city where the user is located.</li>
<li>country - the country where the user is located.</li>
</ul>
<h3>Example Request</h3>
<pre class="example">API Address: https://api.vc4africa.biz
GET /v1/users/1580</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">
{
    "user": [{
        "id": "1580",
        "firstName": "Nelson",
        "lastName": "Kana",
        "lastActive": "2012-09-19 13:59:27",
        "title": "Head of Ecosystem",
        "organization": "Zinger Systems",
        "city": "Buea",
        "country": "Cameroon"
    }]
},
  &quot;status_code&quot;: 200,
  &quot;status_txt&quot;: &quot;OK&quot;
}
</pre>

</div>


<div class="apiendpoint" id="v1_user_badges">

<h2>/v1/users/:user_id/badges</h2>
<p>Returns a compact array of badges unlocked by a given user.</p>
<h3>Parameters</h3>
<ul>
<li>
<p>user_id -  the unique vc4a identifier for the user.</p>
</li>
</ul>
<p><strong>Note</strong></p>
<ul>
<li><code>user_id</code> is a required parameter.</li>
</ul>
<h3>Return Values</h3>
<ul>
<li>id - the unique vc4a identifier for the badge.</li>
<li>actionCount - the number of action counts recorded for the given badge.</li>
<li>name - the corresponding name for the badge.</li>
<li>description - the corresponding description for the badge.</li>
<li>slug - a URL friendly version of the resource name.</li>
<li>unlockedAt - a <code>timestamp</code> representing the time at which the badge was unlocked.</li>
<li>metadata - <code>offset</code>, <code>limit</code> and <code>totalCount</code>.</li>
</ul>
<h3>Example Request</h3>
<pre class="example">API Address: https://api.vc4africa.biz
GET /v1/users/1/badges</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">
{
    "badges": [{
        "id": "3",
        "actionCount": "1",
        "name": "Green Entrepreneur",
        "description": "You posted a green venture.",
        "slug": "green-entrepreneur",
        "unlockedAt": "2012-07-23 15:27:15"
    }, {
        "id": "1",
        "actionCount": "1",
        "name": "Crowd Favorite",
        "description": "Your venture was voted to the rop in 30 days ranking.",
        "slug": "crowd-favorite",
        "unlockedAt": "2012-07-23 15:29:52"
    }, {
        "id": "10",
        "actionCount": "1",
        "name": "DEMO-Africa Judge",
        "description": "You are a judge for DEMO-Africa",
        "slug": "demo-judge",
        "unlockedAt": "2012-09-08 10:42:32"
    }],
    "_metadata": {
        "offset": "0",
        "limit": "20",
        "totalCount": 3
    }
},
  &quot;status_code&quot;: 200,
  &quot;status_txt&quot;: &quot;OK&quot;
}
</pre>

</div>

<div class="apiendpoint" id="v1_user_ventures">

<h2>/v1/users/:user_id/ventures</h2>
<p>Returns a compact array of ventures for a given user.</p>
<h3>Parameters</h3>
<ul>
<li>
<p>user_id -  the unique vc4a identifier for the user.</p>
</li>
</ul>
<p><strong>Note</strong></p>
<ul>
<li><code>user_id</code> is a required parameter.</li>
</ul>
<h3>Return Values</h3>
<ul>
<li>id - the unique vc4a identifier for the venture.</li>
<li>name - the corresponding name of the venture.</li>
<li>sectors - the primary sector(s) the ventures is engaged in.</li>
<li>tags - a comma-delimited list of tags for the venture.</li>
<li>fundStatus - the corresponding fundraising status for the venture.</li>
<li>country - the primary country where the venture is based.</li>
<li>latitude - the north-south distance from the equator, expressed in degrees and minutes.</li>
<li>longitude - the east-west distance from the meridian, expressed in degrees and minutes.</li>
</ul>
<h3>Example Request</h3>
<pre class="example">API Address: https://api.vc4africa.biz
GET /v1/users/1/ventures</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">
[{
    "user": {
        "id": "9",
        "name": "Miniature Vancouver",
        "sectors": "Electronics,Leisure",
        "tags": "video,documentary,entertainment,cities",
        "fundStatus": "Raising Capital",
        "country": "Ethiopia",
        "latitude": "4.287556427760489",
        "longitude": "10.689018062500054"
    }
}, {
    "user": {
        "id": "16",
        "name": "Anvil Studio",
        "sectors": "Consumer,Manufacturing",
        "tags": "widgets",
        "fundStatus": "Round Pending",
        "country": "Cameroon",
        "latitude": "4.199906782278597",
        "longitude": "11.216361812500054"
    }
}, {
    "user": {
        "id": "18",
        "name": "Space Tourism",
        "sectors": "Tourism",
        "tags": "space,rockets,zero-g",
        "fundStatus": "Seeking Investor",
        "country": "Cape Verde",
        "latitude": "15.210222837556922",
        "longitude": "-23.88184306249991"
    }
}],
  &quot;status_code&quot;: 200,
  &quot;status_txt&quot;: &quot;OK&quot;
}
</pre>

</div>

<div class="apiendpoint" id="v1_user_followers">

<h2>/v1/users/:user_id/followers</h2>
<p>Returns an array of compact user objects representing the followers of a given user.</p>
<h3>Parameters</h3>
<ul>
<li>
<p>user_id -  the unique vc4a identifier for the user.</p>
</li>
</ul>
<p><strong>Note</strong></p>
<ul>
<li><code>user_id</code> is a required parameter.</li>
</ul>
<h3>Return Values</h3>
<ul>
<li>id - the unique vc4a identifier for the follower.</li>
<li>metadata - <code>offset</code>, <code>limit</code> and <code>totalCount</code>.</li>
</ul>
<h3>Example Request</h3>
<pre class="example">API Address: https://api.vc4africa.biz
GET /v1/users/1/followers</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">
{
    "followers": [{
        "id": "14"
    }, {
        "id": "17"
    }, {
        "id": "24"
    }, {
        "id": "24"
    }, {
        "id": "25"
    }, {
        "id": "32"
    }, {
        "id": "37"
    }, {
        "id": "47"
    }, {
        "id": "48"
    }, {
        "id": "51"
    }, {
        "id": "104"
    }],
    "_metadata": [{
        "offset": "0",
        "limit": "20",
        "totalCount": 11
    }]
},
  &quot;status_code&quot;: 200,
  &quot;status_txt&quot;: &quot;OK&quot;
}
</pre>

</div>

<div class="apiendpoint" id="v1_user_following">

<h2>/v1/users/:user_id/following</h2>
<p>Returns an array of compact user objects representing the users followed by a given user.</p>
<h3>Parameters</h3>
<ul>
<li>
<p>user_id -  the unique vc4a identifier for the user.</p>
</li>
</ul>
<p><strong>Note</strong></p>
<ul>
<li><code>user_id</code> is a required parameter.</li>
</ul>
<h3>Return Values</h3>
<ul>
<li>id - the unique vc4a identifier for the user being followed.</li>
<li>metadata - <code>offset</code>, <code>limit</code> and <code>totalCount</code>.</li>
</ul>
<h3>Example Request</h3>
<pre class="example">API Address: https://api.vc4africa.biz
GET /v1/users/1/following</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">
{
    "following": [{
        "id": "6"
    }, {
        "id": "76"
    }, {
        "id": "74"
    }, {
        "id": "43"
    }, {
        "id": "42"
    }, {
        "id": "59"
    }, {
        "id": "102"
    }, {
        "id": "17"
    }, {
        "id": "14"
    }, {
        "id": "34"
    }],
    "_metadata": [{
        "offset": "0",
        "limit": "20",
        "totalCount": 10
    }]
},
  &quot;status_code&quot;: 200,
  &quot;status_txt&quot;: &quot;OK&quot;
}
</pre>

</div>

<div class="apiendpoint" id="v1_user_activity">

<h2>/v1/users/:user_id/activity</h2>
<p>Returns an array of activity items for a given user.</p>
<h3>Parameters</h3>
<ul>
<li>
<p>user_id -  the unique vc4a identifier for the user.</p>
</li>
</ul>
<p><strong>Note</strong></p>
<ul>
<li><code>user_id</code> is a required parameter.</li>
</ul>
<h3>Return Values</h3>
<ul>
<li>id - the unique vc4a identifier for the activity item.</li>
<li>component - the name of the component for the activity item.</li>
<li>type - the corresponding type for the activity item.</li>
<li>action - the corresponding action for the activity item.</li>
<li>content - the content of the activity item.</li>
<li>dateRecorded - a <code>timestamp</code> representing the time at which the activity item was recorded.</li>
<li>metadata - <code>offset</code>, <code>limit</code> and <code>totalCount</code>.</li>
</ul>
<h3>Example Request</h3>
<pre class="example">API Address: https://api.vc4africa.biz
GET /v1/users/1/activity?limit=3</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">
{
    "0": {
        "activity": {
            "id": "147802",
            "component": "xprofile",
            "type": "profile_updated",
            "action": "User Status",
            "content": "Integer sit amet libero id est tristique fringilla.",
            "dateRecorded": "2012-12-16 11:01:22"
        }
    },
    "1": {
        "activity": {
            "id": "147803",
            "component": "xprofile",
            "type": "profile_updated",
            "action": "User Status",
            "content": "Etiam faucibus nunc vitae ipsum blandit scelerisque laoreet vel lorem.",
            "dateRecorded": "2012-12-12 19:24:11"
        }
    },
    "2": {
        "activity": {
            "id": "147804",
            "component": "xprofile",
            "type": "profile_updated",
            "action": "User Status",
            "content": ". Nulla gravida viverra urna. Aenean condimentum.",
            "dateRecorded": "2012-12-01 09:34:38"
        }
    },
    "_metadata": [{
        "offset": "0",
        "limit": "3",
        "totalCount": "2620"
    }]
},
  &quot;status_code&quot;: 200,
  &quot;status_txt&quot;: &quot;OK&quot;
}
</pre>

</div>

<div class="apiendpoint" id="v1_user_groups">

<h2>/v1/users/:user_id/groups</h2>
<p>Returns an array of groups a given user is a member of.</p>
<h3>Parameters</h3>
<ul>
<li>
<p>user_id -  the unique vc4a identifier for the user.</p>
</li>
</ul>
<p><strong>Note</strong></p>
<ul>
<li><code>user_id</code> is a required parameter.</li>
</ul>
<h3>Return Values</h3>
<ul>
<li>id - the unique vc4a identifier for the group.</li>
<li>creator_id - the unique  identifier for the creator of the group.</li>
<li>name - the corresponding name of the group.</li>
<li>slug - a URL friendly version of the group name.</li>
<li>description - the corresponding description of the group.</li>
<li>metadata - <code>offset</code>, <code>limit</code> and <code>totalCount</code>.</li>
</ul>
<h3>Example Request</h3>
<pre class="example">API Address: https://api.vc4africa.biz
GET /v1/users/1/groups</pre>

<h3>Example Response</h3>
<pre class="prettyprint lang-js">
{
    "0": {
        "user": {
            "id": "4",
            "creator_id": "1",
            "name": "Telecoms Group",
            "slug": "telecoms-group",
            "description": "A group for members interested in the telecommunications sector."
        }
    },
    "1": {
        "user": {
            "id": "10",
            "creator_id": "1",
            "name": "Cameroon Group",
            "slug": "cameroon",
            "description": "A group dedicated to members with an interest in Cameroon."
        }
    },
    "2": {
        "user": {
            "id": "15",
            "creator_id": "1",
            "name": "Ethiopia Group",
            "slug": "ethiopia",
            "description": "A group dedicated to members with an interest in Ethiopia."
        }
    },
    "3": {
        "user": {
            "id": "17",
            "creator_id": "1",
            "name": "Swaziland Group",
            "slug": "swaziland",
            "description": "A group for people who really dig Swaziland."
        }
    },
    "_metadata": [{
        "offset": "0",
        "limit": "20",
        "totalCount": 4
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