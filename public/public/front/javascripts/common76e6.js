function w3_open() {	
	$("#DrawerMenuTrigger").click();
   // document.getElementById("DrawerMenu").style.display = "block";
}
function w3_close() {
  	$("#DrawerMenuTrigger").click();
 // document.getElementById("DrawerMenu").style.display = "none";
}
function hidelayer(lay)
{	
	document.getElementById([lay]).style.display = "none";
}

function showlayer(lay)
{
	document.getElementById([lay]).style.display = "block";
}
/* Show the login form on the header */
var showLoginFrom = false;
function showLoginForm() {
	document.getElementById('hdrLogin').style.display='block';
	
		if ($("#hdrLogin form[name=frmHdrLogin] input[name=email]").val().length > 0) {
			$("#hdrLogin form[name=frmHdrLogin] input[name=password]").focus();
		} else {
			$("#hdrLogin form[name=frmHdrLogin] input[name=email]").focus();
		}
		
}
function showCategory() {
	document.getElementById('hdrCategory').style.display='block';
}
var retryTryLoginCount = 0;
function relogin() {	
	if ($("#hdrLogin").data("success") != "1") {		
		//Relogin		
		if (retryTryLoginCount < 3) {
			retryTryLoginCount++;
			dologin($("#hdrLogin").data("formName"));
		} else {
			retryTryLoginCount = 0;
			$("#hdrLogin").html(html).show();
			$("#hdrTool").hide();
			$("#hdrLoginProgress").hide();
		}
	}
}
function doLogin(formName) {
	var email = $("#hdrLogin form[name=" + formName + "] input[name=email]").val();
	var password = $("#hdrLogin form[name=" + formName + "] input[name=password]").val();
	$("#hdrLogin").hide();
	
	$("#hdrLoginProgress").show().html('<img src="./images/loading1.gif" with=51 height=19 align=absmiddle> Đang đăng nhập');
	
	
	$.ajax({
	  url: "/ajax/ajax_login.php",
	  cache: false,
	  type: "POST",
      data: "email=" + email + "&password=" + password,
	  timeout: 20000,
	  success: function(html){
		$("#hdrTool").html(html);		
		
		//document.location.href = "./store.php?action=myroom";
	  },
	  error: function() {
		 alert('Lỗi không đăng nhập được, bạn hãy thử lại sau vài giây.');
		 $("#linkLogin").show();
		 $("#linkRegister").show();
		 $("#hdrLogin").show();
		 $("#hdrTool").hide();
		 $("#hdrLoginProgress").hide();		
	  }
	});
}

function doLoginStatus(formName) {
	
	if ($('#userLoggedIn') &&  $('#userLoggedIn').val() == "1") {
		$.ajax({
		  url: "/ajax/ajax_login_status.php",
		  cache: false,
		  type: "GET",
		  data: "",
		  timeout: 20000,
		  success: function(html){
			$("#hdrTool").html(html);
			$("#linkLogin").hide();
			$("#linkRegister").hide();
			
		  },
		  error: function() {
			 //alert('Lỗi không đăng nhập được, bạn hãy thử lại sau vài giây.');
			 $("#linkLogin").show();
			 $("#linkRegister").show();
			 
			 $("#hdrTool").hide();
			 $("#hdrLoginProgress").hide();
			 $("#divLoginHome").show(1);
			 $("#divMemberHome").hide(1);
		  }
		});
		return;
	} else {		
		 $("#linkLogin").show();
		 $("#linkRegister").show();
		 //$("#hdrLogin").show();
		 $("#hdrTool").hide();
		 $("#hdrLoginProgress").hide();	
		 $("#divLoginHome").show(1);
		 $("#divMemberHome").hide(1);
	}
	
}

function logout() {	
	//$("#hdrLoginProgress").show().html('<img src="/images/loading1.gif" with=51 height=19 align=absmiddle> Đang thoát&nbsp;');
	$.ajax({
	  url: "/ajax/ajax_logout.php",
	  cache: false,
	  type: "GET",
	  timeout: 30000,
	  success: function(html){
		$("#hdrLogin").html(html).hide();				
		$("#linkLogin").show();
		$("#linkRegister").show();
		$("#hdrTool").hide();		
	  },
	  error: function() {
		 alert('Lỗi không thoát được, bạn hãy thử lại sau vài giây.');
	  }
	});
}

function insertHTML(value, id)
{	
	// Get the editor instance that we want to interact with.
	var oEditor = eval('CKEDITOR.instances.' + id);
	

	// Check the active editing mode.
	if ( oEditor.mode == 'wysiwyg' )
	{
		// Insert HTML code.
		// http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.editor.html#insertHtml
		oEditor.insertHtml( value );
	}
	else
		alert( 'You must be in WYSIWYG mode!' );
}
function focusYoutubeField(fieldId) {
	if ($('#' + fieldId).val() == 'Nhập đường dẫn hoặc mã nhúng của clip...') {
		$('#' + fieldId).val('');
	}	
}
function blurYoutubeField(fieldId) {
	if ($('#' + fieldId).val() == '') {
		$('#' + fieldId).val('Nhập đường dẫn hoặc mã nhúng của clip...');
	}	
}
function insertYoutubeClip(fieldId, editorId) {
	var code = $('#' + fieldId).val();
	var data = "code=" + code;
	$.ajax({
	  type: "POST",
	  url: "/ajax/store/ajax_insert_youtube_clip.php",
	  data: data,
	  processData: false,
	  success: function(html) {
		
			//alert(data.html);
			//alert(data.html.replace("\\",""));
			if (html.indexOf("ERROR", 0) == 0) {
				alert("Có lỗi: " + html);
			} else if (html.indexOf("EMBED_DETECTED", 0) == 0) {
				insertHTML(code, editorId);
			} else {
				insertHTML(html, editorId);
			}
		
	  },
	  error: function(XMLHttpRequest, textStatus, errorThrown) {
		 alert('Xin lỗi, chức năng chèn phim không hoạt động vào lúc này.' + textStatus + " errorThrown=" + errorThrown);
		 
	  }
	});
}
function showSearchArea() {	
	$("#searchArea").toggle();
}
function viewFunc(type, id, cat, author, postid, idx) {
	var data = "type=" + type + "&id=" + id + "&cat=" + cat + "&author=" + author + "&postid=" + postid + "&idx=" + idx;
	var linkObj;
	if (type == 'reply' || type == 'reply_forum') {
		linkObj = $("#r" + id);
	} else if (type == 'post' || type == 'forum') {
		linkObj = $("#p" + id);
	}  else if (type == 'comment') {
		linkObj = $("#div_comment_" + id);
	}
	linkObj.data("html", linkObj.html());
	linkObj.html('<img src="images/loading.gif" with=16 height=16 align=absmiddle>');
	$.ajax({
	  type: "GET",
	  url: "/ajax/ajax_view_func.php",
	  data: data,
      timeout: 30000,
	  processData: false,
	  success: function(html){
		linkObj.html(html);
		linkObj.show();
	  },
	  error: function() {
		 alert('Có lỗi, bạn hãy thử lại sau vài giây.');		
		 linkObj.html(linkObj.data("html"));
	  }
	});
}
/*
(function($){
	$.clock={version:"2.0.1",locale:{}};t=[];
	$.fn.clock=function(d){
		var c={en:{weekdays:["Chủ nhật","Thứ Hai","Thứ Ba","Thứ Tư","Thứ Năm","Thứ Sáu","Thứ Bảy"],months:["Tháng 1","Tháng 2","Tháng 3","Tháng 4","Tháng 5","Tháng 6","Tháng 7","Tháng 8","Tháng 9","Tháng 10","Tháng 11","Tháng 12"]}};
		return this.each(function(){$.extend(c,$.clock.locale);d=d||{};d.timestamp=d.timestamp||"z";y=new Date().getTime();d.sysdiff=0;if(d.timestamp!="z"){d.sysdiff=d.timestamp-y}d.langSet=d.langSet||"en";d.format=d.format||((d.langSet!="en")?"24":"12");d.calendar=d.calendar||"true";if(!$(this).hasClass("jqclock")){$(this).addClass("jqclock")}var e=function(g){if(g<10){g="0"+g}return g},f=function(j,n){var r=$(j).attr("id");if(n=="destroy"){clearTimeout(t[r])}else{m=new Date(new Date().getTime()+n.sysdiff);var p=m.getHours(),l=m.getMinutes(),v=m.getSeconds(),u=m.getDay(),i=m.getDate(),k=m.getMonth(),q=m.getFullYear(),o="",z="",w=n.langSet;if(n.format=="12"){o=" AM";if(p>11){o=" PM"}if(p>12){p=p-12}if(p==0){p=12}}p=e(p);l=e(l);v=e(v);if(n.calendar!="false"){z=((w=="en")?"<span class='clockdate'>"+c[w].weekdays[u]+", "+i+" " + c[w].months[k]+ ", " + q+"</span>":"<span class='clockdate'>"+c[w].weekdays[u]+", "+i+" "+c[w].months[k]+" "+q+"</span>")}$(j).html(z+"<span class='clocktime'>"+p+":"+l+":"+v+o+"</span>");
		t[r]=setTimeout(function(){f($(j),n)},1000)}};f($(this),d)})
		};return this
	}
)(jQuery);
*/

/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myFunction(eleId) {
	
    var x;
	if (eleId) {
		x = document.getElementById(eleId);
	} else {
		x = document.getElementById("myTopnav");
	}	
    if (x.className === "topnav w3-round") {
        x.className += " responsive";
    } else {
        x.className = "topnav w3-round";
    }
	
}


/* drop down layer */
/*
$(function(){

    var config = {    
         sensitivity: 3, // number = sensitivity threshold (must be 1 or higher)    
         interval: 200,  // number = milliseconds for onMouseOver polling interval    
         over: doOpen,   // function = onMouseOver callback (REQUIRED)    
         timeout: 200,   // number = milliseconds delay before onMouseOut    
         out: doClose    // function = onMouseOut callback (REQUIRED)    
    };
    
    function doOpen() {
        $(this).addClass("hover");
        $('ul:first',this).css('visibility', 'visible');
    }
 
    function doClose() {
        $(this).removeClass("hover");
        $('ul:first',this).css('visibility', 'hidden');
    }

    $("ul.dropdown li").hoverIntent(config);
    
    $("ul.dropdown li ul li:has(ul)").find("a:first").append(" &raquo; ");

});


(function($){
	
	$.fn.hoverIntent = function(f,g) {
		// default configuration options
		var cfg = {
			sensitivity: 7,
			interval: 100,
			timeout: 0
		};
		// override configuration options with user supplied object
		cfg = $.extend(cfg, g ? { over: f, out: g } : f );

		// instantiate variables
		// cX, cY = current X and Y position of mouse, updated by mousemove event
		// pX, pY = previous X and Y position of mouse, set by mouseover and polling interval
		var cX, cY, pX, pY;

		// A private function for getting mouse position
		var track = function(ev) {
			cX = ev.pageX;
			cY = ev.pageY;
		};

		// A private function for comparing current and previous mouse position
		var compare = function(ev,ob) {
			ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t);
			// compare mouse positions to see if they've crossed the threshold
			if ( ( Math.abs(pX-cX) + Math.abs(pY-cY) ) < cfg.sensitivity ) {
				$(ob).unbind("mousemove",track);
				// set hoverIntent state to true (so mouseOut can be called)
				ob.hoverIntent_s = 1;
				return cfg.over.apply(ob,[ev]);
			} else {
				// set previous coordinates for next time
				pX = cX; pY = cY;
				// use self-calling timeout, guarantees intervals are spaced out properly (avoids JavaScript timer bugs)
				ob.hoverIntent_t = setTimeout( function(){compare(ev, ob);} , cfg.interval );
			}
		};

		// A private function for delaying the mouseOut function
		var delay = function(ev,ob) {
			ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t);
			ob.hoverIntent_s = 0;
			return cfg.out.apply(ob,[ev]);
		};

		// A private function for handling mouse 'hovering'
		var handleHover = function(e) {
			// next three lines copied from jQuery.hover, ignore children onMouseOver/onMouseOut
			var p = (e.type == "mouseover" ? e.fromElement : e.toElement) || e.relatedTarget;
			while ( p && p != this ) { try { p = p.parentNode; } catch(e) { p = this; } }
			if ( p == this ) { return false; }

			// copy objects to be passed into t (required for event object to be passed in IE)
			var ev = jQuery.extend({},e);
			var ob = this;

			// cancel hoverIntent timer if it exists
			if (ob.hoverIntent_t) { ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t); }

			// else e.type == "onmouseover"
			if (e.type == "mouseover") {
				// set "previous" X and Y position based on initial entry point
				pX = ev.pageX; pY = ev.pageY;
				// update "current" X and Y position based on mousemove
				$(ob).bind("mousemove",track);
				// start polling interval (self-calling timeout) to compare mouse coordinates over time
				if (ob.hoverIntent_s != 1) { ob.hoverIntent_t = setTimeout( function(){compare(ev,ob);} , cfg.interval );}

			// else e.type == "onmouseout"
			} else {
				// unbind expensive mousemove event
				$(ob).unbind("mousemove",track);
				// if hoverIntent state is true, then call the mouseOut function after the specified delay
				if (ob.hoverIntent_s == 1) { ob.hoverIntent_t = setTimeout( function(){delay(ev,ob);} , cfg.timeout );}
			}
		};

		// bind the function to the two event listeners
		return this.mouseover(handleHover).mouseout(handleHover);
	};
	
})(jQuery);
*/
/* Set the width of the side navigation to 250px */
function openNav() {
  document.getElementById("mySidenav").style.width = "100%";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

function myFunctionAccountClick() {
  var x = document.getElementById("memberLoginMenu");
  if (x.className.indexOf("w3-show") == -1) { 
	x.className += " w3-show";
  } else {
	x.className = x.className.replace(" w3-show", "");
  }
}