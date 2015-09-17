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
<p>API requests to endpoints that accept a <code>partnerID</code> and <code>apiKey</code> may be made to <code>https://api.vc4africa.biz/</code>.
Authentication via API key is suggested only for situations in which you will be using the VC4A API on behalf of a single user or site.</p>

<p>   
Here is an example of passing the partnerID and API key in a <strong>GET</strong> request from a minimal Python client:

<pre class="prettyprint lang-js">
import json
import requests
from requests.auth import HTTPDigestAuth    
  
url = 'https://api.vc4africa.biz/v1/ventures.json'
payload = {'offset':'0', 'limit':'40'}    
response = requests.get (url, auth = HTTPDigestAuth('myParterId', 'cd91007e366c099bb6b526a4'), params=payload )
data = json.loads(response.content)
</pre>
</p>

<h2>Obtaining a VC4A PartnerID and API key</h2>
<p>API keys and partner logins are available to interested parties. During the VC4A API v1 beta phase, please direct your request to
<a  href="&#109&#97&#105&#108&#116&#111&#58&#115&#117&#112&#112&#111&#114&#116&#64&#118&#99&#52&#97&#102&#114&#105&#99&#97&#46&#98&#105&#122&#63&#115&#117&#98&#106&#101&#99&#116&#61&#80&#97&#114&#116&#110&#101&#114&#32&#108&#111&#103&#105&#110&#32&#97&#110&#100&#32&#65&#80&#73&#32&#75&#101&#121"  >&#115&#117&#112&#112&#111&#114&#116&#64&#118&#99&#52&#97&#102&#114&#105&#99&#97&#46&#98&#105&#122</a>.    
    
We will reply with a login/key pair for you to get started.</p> 
</div>

</div>

<?php include( 'footer.php' ); ?> 

</body>
</html>