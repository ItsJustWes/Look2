var isDOM = (document.getElementById ? true : false); 
var isIE4 = ((document.all && !isDOM) ? true : false);
var isNS4 = (document.layers ? true : false);

function getElement(id)
{
 if (isDOM) { return document.getElementById(id); }
 if (isIE4) { return document.all[id]; }
 if (isNS4) { return document.layers[id]; }
}

var selectedPageSheet=null;

function onMainPageLoad()
{
 var _q=getElement('q');
 if(_q){_q.focus();}
 selectedPageSheet = getElement('web_center');
}

function pageSheetClick(pageSheet)
{
	if ( pageSheet && pageSheet.id )
	{
		
		if ( selectedPageSheet && selectedPageSheet.id )
		{
			selectedPageSheet.className = 'bookmarkCenter';
			pId = selectedPageSheet.id.split('_');
			var pLeft = getElement(pId[0] + '_left');
			if ( pLeft ) { pLeft.className = 'bookmarkLeft'; }
			var pRight = getElement(pId[0] + '_right');
			if ( pRight ) { pRight.className = 'bookmarkRight'; }
		}
		
		pageSheet.className = 'bookmarkCenterSel';
		var pId = pageSheet.id.split('_');
		var pLeft = getElement(pId[0] + '_left');
		if ( pLeft ) { pLeft.className = 'bookmarkLeftSel'; }
		var pRight = getElement(pId[0] + '_right');
		if ( pRight ) { pRight.className = 'bookmarkRightSel'; }
		selectedPageSheet = pageSheet;
		var pMode = getElement('mode');
		if ( pMode ) { pMode.value = pId[0]; }
	}
}