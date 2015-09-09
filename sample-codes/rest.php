<?php
 /**
 * RESTful Client based on PHP CURL
 * 
 * @author      Ebot Tabi <ebot.tabi@gmail.com>
 * @link		https://github.com/vc4africa/restful_php_client.git
 * @version 	1.0.0
 * @date		05.12.2012
 */
class Rest {

	// global vars
    public  $url;
    public  $authtype;
    public  $authorization;
    private $function;
    private $method;
    private $data;

	// init. 
    function __construct($url, $authtype='', $username='', $password=''){
        $this->url=$url;
        $this->authtype=$authtype; // basic or digest
        $this->authorization=$username . ":" . $password;
    }

	// post method
    function post($fun, $data=false){
        $this->method='POST';
        $this->function=$fun;
        $this->data=$data;
        return $this->curlExec();
    }

	// get method
    function get($fun, $data=false){
        
        $this->method='GET';
        $this->function=$fun;
        $this->data=$data;
        //print "ok up to here and url is: {$this->url}{$this->function}";
        return $this->curlExec();
    }

	

	// put method
    function put($fun, $data=false){
        $this->method='PUT';
        $this->function=$fun;
        $this->data=$data;
        return $this->curlExec();
    }

	// delete method
    function delete($fun, $data=false){
        $this->method='DELETE';
        $this->function=$fun;
        $this->data=$data;
        return $this->curlExec();
    }


    /**
     * MakeUrl
     * Takes a base url and an array of parameters and sanitizes the data, then creates a complete
     * url with each parameter as a GET parameter in the URL
     * @param String $url The base URL to append the query string to (without any query data)
     * @param Array $params The parameters to pass to the URL
     */
    private function MakeUrl($url,$params){
        if(!empty($params) && $params){
            foreach($params as $k=>$v) $kv[] = "$k=$v";
            $url_params = str_replace(" ","+",implode('&',$kv));
            $url = trim($url) . '?' . $url_params;
        }
        //print "MakeUrl:".$url;
        return $url;
    }



	// curl stuff
    private function curlExec(){
		
		// init. curl
        $curl = curl_init();

		// Switch methods
        switch ($this->method){
            case 'GET': // for regular use
            if ($this->data){
                $this->url = $this->MakeUrl($this->url.$this->function, $this->data);
            }else{
                $this->url = $this->url.$this->function;
            }
            break;

            case 'POST':
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($this->data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $this->data);
            break;

            case 'PUT':
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
            if ($this->data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($this->data));
            break;

            case 'DELETE':
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
            if ($this->data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($this->data));
            break;
        }

		// Switch authorization type
        switch ($this->authtype){
            case 'basic':
                curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
                curl_setopt($curl, CURLOPT_USERPWD, $this->authorization);
            break;

            case 'digest':
                curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
                curl_setopt($curl, CURLOPT_USERPWD, $this->authorization);
            break;
        }

        if ( isset($_SERVER['HTTP_USER_AGENT']) ) {
            curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT'] );
        }else {
            // Handle the useragent like we are Google Chrome
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.X.Y.Z Safari/525.13.');
        }
        curl_setopt($ch , CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($curl, CURLOPT_URL, $this->url);
        //print $this->url.$this->function;
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		// return response from server
        return curl_exec($curl);
    }

} // end class -- 