<!--
    Pane pop up so the user can dig more into the logs
    to see who came to the site
-->
<div id="overlay">
    <div class="detail-view">
        <button id="close-detail" class="btn right">X</button>
        <div>
            <h5>Details on <span id="ip-detail">192.168.x.x</span></h5>
        <div id="content" >
            <!-- this is just a template that gets replace when the view link is clicked-->
            <fieldset>
                <legend>192.168.16.12</legend>
                <p class="col s3">Date: <span>12/25/2017</span></p>
                <p class="col s3">Time: <span>12/25/2017</span></p>
                <p class="col s6">Location: <span>State, Country</span></p>
                <p class="col s6">Request Type: <span>GET /CXz?qqren009922ff HTTP/1.1</span></p>
                <p class="col s6">Http Response: <span>404</span></p>
                <p class="col s12">Url: <span>www.google.com</span></p>
            </fieldset>
        </div>

        </div>
    </div>

</div>