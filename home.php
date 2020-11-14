<!DOCTYPE html>
<html>
    <head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>UPM</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="http://10.150.236.115:8080/auth/js/keycloak.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="jwt-decode.min.js"></script>
<link rel="stylesheet" href="style.css">
<style type="text/css">
	.lgt{
		float: right !important;position: absolute;right: 63px;top: 43px;
	}
</style>
    </head>
    <body>
        <section class="main1" style="background-image: url(banner2.png); height: 625px;background-repeat: no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-8" style="position: relative;min-height: 600px;">
                        <div class="row">
                            <div class="col-sm-6 head" style="position:relative;">
                             <div class="logo">
                                 <a href="index.html"><img src="logo.png" alt="logo" width="200px"></a>
                        </div>
                        <div class="header">
                            <h1>Hospital Pengajar</h1>
                            <p>Universiti Putra Malaysia</p>
                           
                        </div>
                        <div class="lgt">
                        	  <button type="button" class="btn btn-dark" onclick="keycloak.logout({'redirectUri':'http://10.150.236.116/hpupmnew/'})">LOGOUT</button>
                        </div>
                            </div>
                        </div>
                        <hr>
                       <div class="icon">
                           <div class="row groupdata"></div>
                    	</div>
                        <p class="copy">Hakcipta &copy Hospital Pengajar Universiti Putra Malaysia</p>
                     </div>                    
            </div>
            </div>
        </section>
        <script>
            var keycloak = Keycloak('./keycloak.json');
       
           var token = keycloak.token;
          
            var loadData = function() {
                keycloak.loadUserProfile().success(function() {
                    //document.getElementById('subject').innerHTML = keycloak.subject;
                    if (keycloak.profile) {                                           
                        var token = keycloak.token;                        
                        var decoded = jwt_decode(token);                        
                        var groups = decoded.groups;
                        console.log(decoded);
                     
                        if(groups.length > 0){
                        	$.ajax({
                        		url:"ajax_call.php",
                        		data:{'groups':groups},
                        		type:"post",
                        		dataType:'json',
                        		success:function(jsonResponse){
                        			if(jsonResponse.status){
                        				$('.groupdata').html(jsonResponse.htmlData);
                        			}
                        		},
                        		error:function(jsonResponse){
                        			
                        		}
                        	});                        	
                        }
                        
                        //document.getElementById('username').innerHTML = keycloak.profile.username;
                        //document.getElementById('email').innerHTML = keycloak.profile.email;
                        //document.getElementById('firstName').innerHTML = keycloak.profile.firstName;
                        //document.getElementById('lastName').innerHTML = keycloak.profile.lastName;
                        //document.getElementById('profile').innerHTML = keycloak.profile.attributes.LDAP_ENTRY_DN;
                        // document.getElementById('output').innerHTML = output(keycloak.token);
                       
    
                    }
                });
            };
    
    
            var loadFailure = function() {
                document.getElementById('message').innerHTML = '<b>Failed to load data.  Check console log</b>';
            };
    
            var reloadData = function() {
                console.log("reloadData");
                keycloak.updateToken(10)
    
                    .success(loadData)
                    .error(function() {
                        document.getElementById('message').innerHTML = '<b>Failed to load data.  User is logged out.</b>';
                    });
            }
            keycloak.init({
                    onLoad: 'login-required',
                    "checkLoginIframe": false
                })
                .success(reloadData)
                .error(function(errorData) {
                    document.getElementById('message').innerHTML = '<b>Failed to load data. Error: ' + JSON.stringify(errorData) + '</b>';
                });
    
            function output(data) {
                if (typeof data === 'object') {
                    data = '<pre style="font-size: 1em; border: none; background-color: #fff">' + JSON.stringify(data, null, '  ') + '</pre>';
                }
                document.getElementById('token').innerHTML = data;
            }
            // function parseJwt(token) {
            //     var base64Url = token.split('.')[1];
            //     var base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
            //     var jsonPayload = decodeURIComponent(atob(base64).split('').map(function(c) {
            //         return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
            //     }).join(''));
    
            //     return JSON.parse(jsonPayload);
            // };
    
    
            //var token = token;
    
            //var decoded = jwt_decode(token);
    
    
    
    
    
    
            // window.onload = (event) => {
            //     console.log('page is fully loaded');
            //     loadData();
            // };
        </script>
    </body>
</html>
