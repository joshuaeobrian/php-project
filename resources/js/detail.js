/**
 * calls the log service api and returns the data for that ip
 * then triggers loadDetailPage to create the elements in
 * the view
 * @param ipAddress
 */
function getDetailedData(ipAddress){
    var ip = {
        "ip":ipAddress,
    };
    $.ajax({
        type: "POST",
        url: "/etailinsights/api/log_service.php",
        data: ip,
        dataType: "json",
        success: function(response)
        {

            loadDetailPage(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}
/**
 *  creates the elements for the detail section
 *  of the site visited
 * @param classType
 * @param subject
 * @param info
 * @returns {Element}
 */
function createElement(classType,subject,info) {
    //if the log contains more than 1 request and contain 404 it
    //reviews the 404 so it doesn't show and shows just the other request
    if(subject.indexOf('Http') !== -1 && info.length > 3){
        info = info.replace("404","");

        info.trim();
    }
    //if a url then it makes and returns a textarea
    if(subject.indexOf('Url') !== -1){
        const textArea = document.createElement("textarea");
        textArea.className = "col s12";
        textArea.textContent = info;
        textArea.disabled = true;
        textArea.style.height = '5em';
        return textArea;
    }
    //returns a Paragraph element that contains the subject and the info
    const p = document.createElement('p');
    p.className = classType;
    p.textContent = subject+" "+info;
    return p;

}
/**
 * takes a child element and a parent and appends
 * the child to it.
 * @param parentElement
 * @param child
 */
function appendElement(parentElement,child) {
    parentElement.appendChild(child);
}

function loadDetailPage(data) {
    $("#content").find('fieldset').remove();
    const div = document.getElementById("content");
    $("#ip-detail").html(data['location']['ip']);
    //if region name is null the display "" instead of null
    const region = (data['location']['region_name'] === null)? "": data['location']['region_name'];
    //if country name is null the display "" instead of null
    const country =(data['location']['country_name'] === null)? "":data['location']['country_name'];
    //if region and country are both not empty then add comma
    const padding = (region != ""&& country!="")? ", ":"";
    for(var i = 0; i < data['logs'].length;i++){

        const fieldset = document.createElement("fieldset");

        const legend = document.createElement("legend");
        legend.textContent = "IP Address: "+ data['logs'][i]['ip'];

        const label = document.createElement("label");
        label.textContent = "URL:";
        label.style.color= '#000';
        //appends all the elements that make up 1 visit
        appendElement(fieldset,legend);
        appendElement(fieldset,createElement('col s3','Date:',data['logs'][i]['date']));
        appendElement(fieldset,createElement('col s3','Time:',data['logs'][i]['time']));
        appendElement(fieldset,createElement('col s6','Location:',region+padding+country));
        appendElement(fieldset,createElement('col s6','Request Type:',data['logs'][i]['requestType']));
        appendElement(fieldset,createElement('col s6','Http Response:',data['logs'][i]['httpResponse']));
        appendElement(fieldset,label);
        appendElement(fieldset,createElement('col s12','Url',data['logs'][i]['url']));
        appendElement(div,fieldset);


    }
}

$(document).ready(function () {
    //when button clicked gets the ip from the dom for that row
    //then send it to the webservice to get the proper logs
    //then shows them in a modal
    $(".view-details").on('click',function (e) {
        e.preventDefault();
        $('.detail-view').toggle('.detail-view');
        const ip = $(this).parent().parent().find(".ip-box").text();
        getDetailedData(ip);


    });
    //Hides modal
    $("#close-detail").on('click',function (e) {
        e.preventDefault();
        $('.detail-view').toggle('.detail-view');

    });
});
