<?php include( 'header.php' ); ?> 

<div id="interiorContainer" class="clearfix">

<?php include( 'api_toc.php' ); ?>

<div id="content">

<h2>Request / Response Formats</h2>
<p>The VC4A API supports multiple formats including <strong>xml</strong>, <strong>javascript</strong>, <strong>html</strong>, <strong>json</strong> and a simple <strong>txt</strong> format. The VC4A API defaults to <strong>json</strong>, as it’s the closest thing developers have to a universal language.
Even if the back end is built in Ruby on Rails, PHP, Java, Python etc., most projects probably touch JavaScript for the front end. It also has the advantage of being less verbose than <strong>xml</strong>, which is an important consideration for mobile app developers.
</p>

<p>If a format is not specified in the request, <strong>json</strong> will be returned by default. If another format is desired, simply append the format type as an extension to the endpoint.
    For example, to return <strong>xml</strong> use <code>/v1/ventures.xml</code>. Likewise, to return <strong>javascript</strong> use <code>/v1/ventures.js</code>. 
    
<ul>
<li>
<p>All API requests should be against the domain <code>api.vc4africa.biz</code>.</p>
</li>
<li>
<p>All API endpoints should begin with the version number. For example, <code>/v1/ventures</code>.</p>
</li>
<li>
<p>HTTP Response Status Code is <code>200</code> on all valid response in <strong>json</strong> and <strong>xml</strong> formats. In json and xml responses, the <code>status_code</code> and <code>status_txt</code> values indicate whether a request is well formed and valid.</p>
</li>
<li>
<p>For <strong>txt</strong> format calls, the HTTP Response Status Codes are used to indicate a problem with the request, rate limiting, or other errors.The response body will be equivalent to <code>status_txt</code> in <em>json</em> and <em>xml</em> calls for all non <code>200</code> response codes.</p>
</li>
<li>
<p>The <strong>status_code</strong> is <code>200</code> for a successful request, <code>403</code> when rate limited, <code>503</code> for temporary unavailability, <code>404</code> to indicate not-found responses, and <code>500</code> for all other invalid requests or responses.</p>
</li>
<li>
<p><strong>status_txt</strong> will be a value that describes the nature of any error encountered. Common values are <code>ERROR_MISSING_REQUEST_ARG</code> to denote a missing URL parameter and <code>ERROR_INVALID_ACTION_REQUEST</code> to denote an invalid value in a request parameter. </p>
</li>
</ul>
<p><em>Example Outputs:</em></p>
<ul>
<li>json <code>{ "status_code": 200, "status_txt": "OK", "data" : ... }</code></li>
<li>json <code>{ "status_code": 400, "status_txt": "ERROR_INVALID_URL_PROMPT_FORMAT", "data" : null }</code></li>
<li>json <code>{ "status_code": 403, "status_txt": "ERROR_INVALID_SECRET_KEY_NO", "data" : null }</code></li>
<li>json <code>{ "status_code": 404, "status_txt": "ERROR_INVALID_ACTION_REQUEST_NO", "data" : null }</code></li>
<li>json <code>{ "status_code": 500, "status_txt": "INVALID_URI", "data" : null }</code></li>
<li>json <code>{ "status_code": 503, "status_txt": "UNKNOWN_ERROR", "data" : null }</code></li>
<li>jsonp <code>callback_method({ "status_code": 200, "status_txt": "OK", "data" : ... })</code></li>
<li>
<p>xml </p>
<pre><code>&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;response&gt;
     &lt;status_code&gt;200&lt;/status_code&gt;
     &lt;status_txt&gt;OK&lt;/status_txt&gt;
     &lt;data&gt;
         ...
     &lt;/data&gt;
&lt;/response&gt;
</code></pre>
</li>
</ul>
</div>

<?php include( 'footer.php' ); ?> 

</body>
</html>