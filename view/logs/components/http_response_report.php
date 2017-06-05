<!--
    shows a count of each http response
-->
<div class="col s3">
    <fieldset>
        <legend>Http Responses</legend>
        <div >
            <h6 class="col s9">200 - Success: </h6><h6 id="200" class="col s3"><?php echo $countOf200; ?></h6>
            <h6 class="col s9">300 - Redirect: </h6><h6 id="300" class="col s3"><?php echo $countOf300; ?></h6>
            <h6 class="col s9">400 - Client Errors: </h6><h6 id="400" class="col s3"><?php echo $countOf400; ?></h6>
            <h6 class="col s9">500 - Server Errors: </h6><h6 id="500" class="col s3"><?php echo $countOf500; ?></h6>
        </div>
    </fieldset>
</div>

