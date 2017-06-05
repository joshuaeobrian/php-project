/**
 *  makes a post request to the server
 *  then takes the data and places it into the
 *  proper fields.
 * @param ipAddress
 */
function setIpInfo(ipAddress){
    var ip = {
        "ip":ipAddress,
    };
    $.ajax({
        type: "POST",
        url: "/etailinsights/api/lookup_service.php",
        data: ip,
        // success: set(response),
        dataType: "json",
        success: function(response)
        {
            const info = response;
            $("#ip").html(info['ip']);
            $("#cc").html(info['country_code']);
            $("#cn").html(info['country_name']);
            $("#rc").html(info['region_code']);
            $("#rn").html(info['region_name']);
            $("#city").html(info['city']);
            $("#zip").html(info['zip_code']);
            $("#tzone").html(info['time_zone']);
            $("#lat").html(info['latitude']);
            $("#long").html(info['longitude']);
            $("#mc").html(info['metro_code']);

        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });

}

$(document).ready(function() {
    //when button is clicked in the IP Lookup field
	$("#ip-btn").click(function (e) {
		e.preventDefault();
		const ipAddress = $('#ip-input').val();

		var temp = ipAddress.split(".");

		if(temp.length === 4 && (temp[0] < 255 && temp[1] < 255 && temp[2] < 255 && temp[3] < 255) && temp[3] !==""){

            setIpInfo(ipAddress);
        }

    });

});
