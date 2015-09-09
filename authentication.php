<?php include( 'header.php' ); ?> 

<div id="interiorContainer" class="clearfix">

<ul id="index">

<li><a href="get_started.php">Getting Started</a></li>
    <li class="on"><a href="api.php">API Documentation</a>
        <ul>
            <li class="on"><a href="authentication.php">Authentication</a></li> <!-- this also includes Oauth2 Overview (the authentication) -->
            <li><a href="formats.php">Request / Response Formats</a></li>
            <li><a href="rate_limiting.php">Rate Limiting</a></li>
            <li><a href="badges.php">Badges</a></li>
            <li><a href="users.php">Users</a></li>
            <li><a href="ventures.php">Ventures</a></li>
        </ul>
    </li>
    <li><a href="best_practices.php">Best Practices</a></li>
    <li><a href="changelog.php">Revision History</a></li>

</ul>

<div id="content">

<div id="apitoc">

<div class="apiendpoint" id="">
<h2>Authentication</h2>
<p>All VC4A API endpoints require that authentication credentials be supplied. For the initial v1 release, API key authentication is supported.
In the near future, the VC4A API will support the OAuth 2 draft specification.
</p>



<!--
<p>Most VC4A API endpoints require an OAuth access token. <strong>If you only need a token for your own account and will 
        not be authenticating any additional end-users, we suggest using the <a href="#basicauth">basic auth flow</a> documented below to 
        retrieve a single access_token for your account by calling the <a href="#oauthaccesstoken">/oauth/access_token</a> endpoint via 
        HTTP <code>POST</code> request.</strong></p>
<h2>OAuth</h2>
<p>VC4A currently supports the OAuth 2 draft specification. All OAuth2 requests MUST use the SSL 
endpoint available at <code>https://api-ssl.VC4A.com/</code></p>
<p>OAuth 2.0 is a simple and secure authentication mechanism. It allows web applications to acquire 
an access token for VC4A via a quick redirect to the VC4A site. Once a web application has an access token,
        it can access a user's link metrics, and shorten links using that user's VC4A account. Authentication with OAuth
        can be accomplished in the following steps:</p>
<p>Oauth authentication is made by adding the <code>access_token</code> parameter with a users access token. 
All requests with Ouath tokens must be made over <strong>SSL</strong> to <code>https://api-ssl.VC4A.com/</code>. We strongly 
recommend using Oauth for any situation in which you will be using the VC4A API on behalf of multiple users.</p>
<pre><code>access_token=**access_token**
</code></pre>
<h2>OAuth Web Flow</h2>
<p>Web applications can easily acquire an OAuth access token for a VC4A end user by following these steps:</p>
<ul>
<li>
<p>Register your application <a href="http://VC4A.com/a/oauth_apps">here</a> -- your 
application will be assigned a <code>client_id</code> and a <code>client_secret</code>.</p>
</li>
<li>
<p>Redirect the user to <code>https://VC4A.com/oauth/authorize</code>, using the <code>client_id</code> and <code>redirect_uri</code> 
parameters to pass your client ID and the page you would like to redirect to upon acquiring an access token. 
An example redirect URL looks like: <code>https://VC4A.com/oauth/authorize?client_id=...&amp;redirect_uri=http://myexamplewebapp.com/oauth_page</code></p>
</li>
<li>
<p>Upon authorizing your application, the user is directed to the page specified in the <code>redirect_uri</code> 
parameter. We append a <code>code</code> parameter to this URI, that contains a value that can be exchanged for an 
OAuth access token using the oauth/access_token endpoint documented below. For example, if you passed a 
<code>redirect_uri</code> value of <code>http://myexamplewebapp.com/oauth_page</code>, a successful authentication will redirect 
the user to <code>http://myexamplewebapp.com/oauth_page?code=....</code></p>
</li>
<li>
<p>Use the /oauth/access_token API endpoint documented below to acquire an 
OAuth access token, passing the <code>code</code> value appended by VC4A to the previous redirect and the same 
<code>redirect_uri</code> value that was used previously. This API endpoint will return an OAuth access token, as 
well as the specified VC4A user's login and API key, allowing your application to utilize the VC4A API 
on that user's behalf.</p>
</li>
</ul>
<h2>OAuth XAuth Flow</h2>
<p>For applications where OAuth web flow cannot be used (for example, mobile applications without a browser 
layer), an OAuth access token can be acquired by making a single call to 
the /oauth/access_token API endpoint documented below, and passing the end-user's VC4A account 
credentials with the <code>x_auth_username</code> and <code>x_auth_password</code> parameters. Note that the end-user need only 
enter his/her username and password once for the application to authenticate -- applications using XAuth 
<strong>SHOULD NOT</strong> store VC4A end-user passwords. Authentication via XAuth must be requested by e-mailing 
api@VC4A.com.</p>
<h2><a id="basicauth"></a>OAuth Basic Authentication Flow</h2>
<p>For some applications it's impractical to use a web flow for one-time access tokens (ie: command line 
scripts). An OAuth access token can be acquired by making a single call to 
the /oauth/access_token API endpoint documented below. The easiest way to do so is by running the <code>curl</code> command
        documented below from your browser's terminal.</p>
<h2><a id="oauthaccesstoken"></a>/oauth/access_token</h2>
<p>This endpoint is used to acquire an access_token. It is the 3rd step for OAuth Web Flow and the only 
step for OAuth XAuth Flow and OAuth Basic Authentication Flow, documented above.</p>
<h3>Parameters for OAuth Web flow</h3>
<ul>
<li>client_id - your application's VC4A client id.</li>
<li>client_secret - your application's VC4A client secret.</li>
<li>code - the OAuth verification code acquired via OAuth's web authentication protocol.</li>
<li>redirect_uri - the page to which a user was redirected upon successfully authenticating.</li>
</ul>
<h3>Parameters for OAuth Xauth</h3>
<ul>
<li>client_id - your application's VC4A client id.</li>
<li>client_secret - your application's VC4A client secret.</li>
<li>x_auth_username - the end-user's VC4A username. for XAuth authentication only.</li>
<li>x_auth_password - the end-user's VC4A password. for XAuth authentication only.</li>
</ul>
<h3>Parameters for OAuth Basic Authentication flow</h3>
<ul>
<li>client_id - (optional) your application's VC4A client id.</li>
<li>client_secret - (optional) your application's VC4A client secret.</li>
</ul>
<p>If <code>client_id</code> is not specified, an access token will be generated under a <code>VC4A API</code> application.</p>
<pre><code>curl -u "username:password" -X POST "https://api-ssl.VC4A.com/oauth/access_token"
</code></pre>
<p><strong>Note:</strong></p>
<ul>
<li>This request MUST be a HTTP <code>POST</code> request.</li>
<li>This endpoint is only available on <code>https://api-ssl.VC4A.com/</code></li>
<li>The <code>x_auth_username</code> and <code>x_auth_password</code> are only to be used when authentication via web
  redirect is not possible (for example, mobile applications without a browser layer). Access to
  these parameters must be requested by e-mailing api@VC4A.com.</li>
</ul>
<h3>Response Value</h3>
<p>URL encoded string in the format of <code>access_token=%s&amp;login=%s&amp;apiKey=%s</code></p>
<ul>
<li>access_token - the OAuth access token for specified user</li>
<li>login - the end-user's VC4A username</li>
<li>apiKey - the end-user's VC4A API key</li>
</ul>
-->
<h2><a id="apikey"></a>API Key authentication</h2>
<p>API requests to endpoints that accept a <code>partnerID</code> and <code>apiKey</code> may be made to <code>http://api.vc4africa.biz/</code> 
or <code>https://api.vc4africa.biz/</code>. Authentication via API key is suggested only for situations in which you will be using the VC4A API on 
behalf of a single user or site.</p>

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
<p>API keys and partner logins are available at no cost to interested parties. During the VC4A API beta phase, please direct your request to
<a  href="&#109&#97&#105&#108&#116&#111&#58&#115&#117&#112&#112&#111&#114&#116&#64&#118&#99&#52&#97&#102&#114&#105&#99&#97&#46&#98&#105&#122&#63&#115&#117&#98&#106&#101&#99&#116&#61&#80&#97&#114&#116&#110&#101&#114&#32&#108&#111&#103&#105&#110&#32&#97&#110&#100&#32&#65&#80&#73&#32&#75&#101&#121"  >&#115&#117&#112&#112&#111&#114&#116&#64&#118&#99&#52&#97&#102&#114&#105&#99&#97&#46&#98&#105&#122</a>.    
    
We will reply with a login/key pair for you to get started.</p> 
</div>

</div>

<?php include( 'footer.php' ); ?> 

</body>
</html>