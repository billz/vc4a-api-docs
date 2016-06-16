<?php include( 'header.php' ); ?> 

<div id="interiorContainer" class="clearfix">

<ul id="index">

<?php include( 'api_toc.php' ); ?>

<div id="content">

<div id="apitoc">

<div class="apiendpoint" id="">
<h2>Authentication</h2>
<p>All private VC4A API endpoints require that authentication credentials be supplied. For the v1 release, API key authentication is supported.
In the near future, the VC4A API will support the OAuth 2 draft specification.
</p>


<h2><a id="apikey"></a>API Key authentication</h2>
<p>API requests to endpoints that accept a <code>partnerID</code> and <code>apiKey</code> may be made to <code>https://api.vc4a.com/</code>.
Authentication via API key is suggested only for situations in which you will be using the VC4A API on behalf of a single user or site.</p>

<p>   
Here is an example of passing the partnerID and API key in a <strong>GET</strong> request from a minimal Python client:

<pre class="prettyprint lang-js">
import json
import requests
from requests.auth import HTTPDigestAuth    
  
url = 'https://api.vc4a.com/v1/ventures.json'
payload = {'offset':'0', 'limit':'40'}    
response = requests.get (url, auth = HTTPDigestAuth('partnerID', '6a12b9124461a2e3b9d363152897a15'), params=payload )
data = json.loads(response.content)
</pre>
<b>Please note:</b> the above parterID and API key are examples only&#151;they will not authenticate with the API.
</p>

<h2>Obtaining a VC4A PartnerID and API key</h2>
<p>API keys and partner logins are available to interested parties. Please direct your request to <a href='&#109;&#97;&#105;&#108;&#116;&#111;&#58;&#100;&#101;&#118;&#101;&#108;&#111;&#112;&#101;&#114;&#115;&#64;&#118;&#99;&#52;&#97;&#46;&#99;&#111;&#109;'>&#100;&#101;&#118;&#101;&#108;&#111;&#112;&#101;&#114;&#115;&#64;&#118;&#99;&#52;&#97;&#46;&#99;&#111;&#109;</a>. We will reply with a login/key pair for you to get started.</p> 
</div>

</div>

<?php include( 'footer.php' ); ?> 

</body>
</html>