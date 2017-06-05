<!--
    Displays the main content and layout for the ip lookup field
-->
<div class="col s12">
    <fieldset >
        <legend>IP Lookup</legend>
        <form class="col s3 ip-search-form">
            <input id="ip-input" class="col s10" type="search" placeholder="Lookup IP">
            <button id="ip-btn" class="btn col s2 search-btn" type="submit"><i class="material-icons">search</i></button>
        </form>
        <div id="ip-detail-view" class="col s12">
            <h6 class="col s12">IP Address: <span id="ip"></span></h6>
            <h6 class="col s4">Country Code: <span id="cc"></span></h6>
            <h6 class="col s4">Country Name: <span id="cn"></span></h6>
            <h6 class="col s4">Region Code: <span id="rc"></span></h6>
            <h6 class="col s4">Region Name: <span id="rn"></span></h6>
            <h6 class="col s4">City: <span id="city"></span></h6>
            <h6 class="col s4">Zip Code: <span id="zip"></span></h6>
            <h6 class="col s4">Time Zone: <span id="tzone"></span></h6>
            <h6 class="col s4">Latitude: <span id="lat"></span></h6>
            <h6 class="col s4">Longitude: <span id="long"></span></h6>
            <h6 class="col s4">Metro Code: <span id="mc"></span></h6>
        </div>
    </fieldset>
</div>