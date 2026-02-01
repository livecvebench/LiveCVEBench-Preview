function find_me_on_ajax_saveOrder(){
	$('sortOrderData').value = Sortable.serialize("displayDiv");	
}

function selectionChanged(){


	var label = $("instruction");
	var dropdown = $("networkDropdown");
	var settingInput = $("addSettingInput");
	var addButton = $("addButton");
	
	if(dropdown.selectedIndex != 0){
		var currentSelection = dropdown.options[dropdown.selectedIndex]
		label.innerHTML = currentSelection.getAttribute('instruction');
		settingInput.value = '';
		addButton.disabled = false;
	}	
	else{
		label.innerHTML = '';
		settingInput.value = '';
		addButton.disabled = true;
	}
	
}

function selectionUpdate(){


	var label = $("url");
	var dropdown = $("configuredDropdown");
	var settingInput = $("addSettingInput");
	var addButton = $("addButton");
	
	if(dropdown.selectedIndex != 0){
		var currentSelection = dropdown.options[dropdown.selectedIndex]
		label.innerHTML = currentSelection.getAttribute('url');
		settingInput.value = '';
		addButton.disabled = false;
	}	
	else{
		label.innerHTML = '';
		settingInput.value = '';
		addButton.disabled = true;
	}
	
}

function onTextKeyDown(){
	if(event.keyCode == 13){
		find_me_on_ajax_addNetwork(
			document.getElementById('networkDropdown').selectedIndex - 1,
			document.getElementById('addSettingInput'),
			document.getElementById('responseDiv')
		);
	}
}

function onDropToTrash(){
	var span = $('trash').firstChild.nextSibling;
	if(span){
		find_me_on_ajax_delete_network(span.id.split('_')[1]);
		span.parentNode.removeChild(span);
	}
	
}

function addLoadingIcon(){
	var img = Builder.node('span',{
						id:'loadingImage',
						className:'linkWrapper',
						title:'Loading',
						style:'position:relative;'},
						Builder.node('img',{src:'../images/ajax-loader.gif',style:'margin:2px'},''));
	//console.log(img);
	$('displayDiv').appendChild(img);
}


/*
function find_me_on_ajax_addNetwork(selectedIndex,textInput,responseDiv){

 	var siteID = $('networkDropdown').options[selectedIndex].value;
 	var mysack = new sack(getWordpressBaseLocation()+"wp-admin/admin-ajax.php" );    
	
	//console.log('Adding network '+siteID+ ': '+textInput);
	
	mysack.execute = 1;
	mysack.method = 'POST';
	mysack.setVar( "action", "find_me_on_add_network" );
	mysack.setVar( "siteID", siteID );
	mysack.setVar( "value", textInput.value );
	mysack.encVar( "cookie", document.cookie, false );
	mysack.onError = function() { alert('Ajax error while adding new network' )};
	mysack.runAJAX();
	
	alert('added');
	createSortables();

  	return true;

}
*/

function find_me_on_ajax_addNetwork(selectedIndex,textInput,responseDiv){
	
	var siteID = $('networkDropdown').options[selectedIndex].value;
	var mysack = new sack(getWordpressBaseLocation()+"wp-admin/admin-ajax.php" );    
	
	mysack.execute = 1;
	mysack.method = 'POST';
	mysack.setVar( "action", "find_me_on_add_network" );
	mysack.setVar( "siteID", siteID );
	mysack.setVar( "value", textInput.value );
	mysack.encVar( "cookie", document.cookie, false );
	mysack.onError = function() { alert('Ajax error while adding new network' )};
	
	mysack.runAJAX();
	
	
	return true;
	
}

function find_me_on_ajax_delete_network(linkId){
	
	var mysack = new sack(getWordpressBaseLocation()+"wp-admin/admin-ajax.php" );    
	
	mysack.execute = 1;
	mysack.method = 'POST';
	mysack.setVar( "action", "find_me_on_delete_network" );
	mysack.setVar( "linkId", linkId );
	mysack.encVar( "cookie", document.cookie, false );
	mysack.onError = function() { alert('Ajax error while adding new network' )};
	
	mysack.runAJAX();
	
	createSortables();

alert('deleted')
	
	return true;
}

function createSortables(){
	Sortable.destroy('displayDiv');
	Sortable.destroy('trash');

	targets = $$('.drop_target');
		Sortable.create('trash',{tag:'span',containment:targets,constraint:false,dropOnEmpty:true,
		onUpdate: function(){
			onDropToTrash();
		}
	});
	Sortable.create('displayDiv',{tag:'span',containment:targets,overlap:'horizontal',constraint:false});

}

function getWordpressBaseLocation(){
	return $('callBackUrl').value.split('wp-content/')[0];
}

function changeDivContent( nameOfDiv, newContent )
{
	var div = document.getElementById( nameOfDiv );
if( div )
{
	div.innerHTML = newContent;
}
}
   


/***********************************************
* Dynamic Ajax Content- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

var bustcachevar=1 //bust potential caching of external pages after initial request? (1=yes, 0=no)
var loadedobjects=""
var rootdomain="http://"+window.location.hostname
var bustcacheparameter=""

function ajaxpage(url, containerid){
var page_request = false
if (window.XMLHttpRequest) // if Mozilla, Safari etc
page_request = new XMLHttpRequest()
else if (window.ActiveXObject){ // if IE
try {
page_request = new ActiveXObject("Msxml2.XMLHTTP")
} 
catch (e){
try{
page_request = new ActiveXObject("Microsoft.XMLHTTP")
}
catch (e){}
}
}
else
return false
page_request.onreadystatechange=function(){
loadpage(page_request, containerid)
}
if (bustcachevar) //if bust caching of external page
bustcacheparameter=(url.indexOf("?")!=-1)? "&"+new Date().getTime() : "?"+new Date().getTime()
page_request.open('GET', url+bustcacheparameter, true)
page_request.send(null)
}

function loadpage(page_request, containerid){
if (page_request.readyState == 4 && (page_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(containerid).innerHTML=page_request.responseText
}

function loadobjs(){
if (!document.getElementById)
return
for (i=0; i<arguments.length; i++){
var file=arguments[i]
var fileref=""
if (loadedobjects.indexOf(file)==-1){ //Check to see if this object has not already been added to page before proceeding
if (file.indexOf(".js")!=-1){ //If object is a js file
fileref=document.createElement('script')
fileref.setAttribute("type","text/javascript");
fileref.setAttribute("src", file);
}
else if (file.indexOf(".css")!=-1){ //If object is a css file
fileref=document.createElement("link")
fileref.setAttribute("rel", "stylesheet");
fileref.setAttribute("type", "text/css");
fileref.setAttribute("href", file);
}
}
if (fileref!=""){
document.getElementsByTagName("head").item(0).appendChild(fileref)
loadedobjects+=file+" " //Remember this object as being already added to page
}
}
}
