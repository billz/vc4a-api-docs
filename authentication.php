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
response = requests.get (url, auth = HTTPDigestAuth('myParterId', 'cd91007e366c099bb6b526a4'), params=payload )
data = json.loads(response.content)
</pre>
</p>

<h2>Obtaining a VC4A PartnerID and API key</h2>
<p>API keys and partner logins are available to interested parties. During the VC4A API v1 beta phase, please direct your request to
<script type="text/javascript">
//<![CDATA[
<!--
var x="function f(x){var i,o=\"\",l=x.length;for(i=0;i<l;i+=2) {if(i+1<l)o+=" +
"x.charAt(i+1);try{o+=x.charAt(i);}catch(e){}}return o;}f(\"ufcnitnof x({)av" +
" r,i=o\\\"\\\"o,=l.xelgnhtl,o=;lhwli(e.xhcraoCedtAl(1/)3=!46{)rt{y+xx=l;=+;" +
"lc}tahce({)}}of(r=i-l;1>i0=i;--{)+ox=c.ahAr(t)i};erutnro s.buts(r,0lo;)f}\\" +
"\"(0),9\\\"\\\\34\\\\06\\\\02\\\\\\\\36\\\\0r\\\\\\\\\\\\01\\\\04\\\\03\\\\" +
"\\\\7@01\\\\\\\\s#7r17\\\\\\\\{5{-Vafab|earG\\\\\\\\20\\\\0m\\\\22\\\\0s\\\\"+
"23\\\\0H\\\\_@]C10\\\\05\\\\00\\\\\\\\QzFWPWMEd>PyP:VHa+vwsx|e`1hch$d<Epqpq" +
"m3p01\\\\\\\\16\\\\0F\\\\24\\\\06\\\\01\\\\\\\\25\\\\01\\\\02\\\\\\\\26\\\\" +
"03\\\\03\\\\\\\\(W4N02\\\\\\\\24\\\\02\\\\00\\\\\\\\07\\\\0N\\\\14\\\\0P\\\\"+
"BI07\\\\04\\\\00\\\\\\\\02\\\\02\\\\02\\\\\\\\14\\\\06\\\\02\\\\\\\\24\\\\0" +
"L\\\\25\\\\06\\\\01\\\\\\\\3:?(>4\\\"\\\\f(;} ornture;}))++(y)^(iAtdeCoarch" +
"x.e(odrChamCro.fngriSt+=;o27=1y%i;+=)y90==(iif){++;i<l;i=0(ior;fthnglex.l=\\"+
"\\,\\\\\\\"=\\\",o iar{vy)x,f(n ioctun\\\"f)\")"                             ;
while(x=eval(x));
//-->
//]]>
</script>

    
We will reply with a login/key pair for you to get started.</p> 
</div>

</div>

<?php include( 'footer.php' ); ?> 

</body>
</html>