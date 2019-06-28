<?php
	// not showing ads on search results page
	global $showPacxonSideAd;
	$showPacxonSideAd=false;
?>
<h3 class="pageName"><?php p('a124');?></h3>
<div id="cse" style="width: 100%;font-family:Times New Roman',Georgia,Serif;"><?php p('h110');?></div>
<script src="http://www.google.com/jsapi" type="text/javascript"></script>
<script type="text/javascript"> 
  google.load('search', '1', {language : '<?php echo $GLOBALS['google_cse_lang'];?>', style : google.loader.themes.ESPRESSO});
  google.setOnLoadCallback(function() {
    var customSearchOptions = {};  var customSearchControl = new google.search.CustomSearchControl(
      '<?php echo $GLOBALS['google_cse_unique_id']?>', customSearchOptions);
    customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
	customSearchControl.setLinkTarget(google.search.Search.LINK_TARGET_SELF);
    customSearchControl.draw('cse');
    function parseParamsFromUrl() {
      var params = {};
      var parts = window.location.search.substr(1).split('\x26');
      for (var i = 0; i < parts.length; i++) {
        var keyValuePair = parts[i].split('=');
        var key = decodeURIComponent(keyValuePair[0]);
        params[key] = keyValuePair[1] ?
            decodeURIComponent(keyValuePair[1].replace(/\+/g, ' ')) :
            keyValuePair[1];
      }
      return params;
    }

    var urlParams = parseParamsFromUrl();
    var queryParamName = "q";
    if (urlParams[queryParamName]) {
      customSearchControl.execute(urlParams[queryParamName]);
    }
  }, true);
</script>
<style type="text/css">

  input.gsc-input {
    border-color: #D3BCA1;
  }
  input.gsc-search-button {
    border-color: #300D00;
    background-color: #D2D2D2;
	color: black;
  }

  .gsc-control-cse {
    font-family: Arial, sans-serif;
    border-color: #FFFFFF;
    background-color: #000000;
  }
  .gsc-control-cse .gsc-table-result {
    font-family: Arial, sans-serif;
  }
  input.gsc-input, .gsc-input-box, .gsc-input-box-hover, .gsc-input-box-focus {
    border-color: #D3BCA1;
  }
  input.gsc-search-button, input.gsc-search-button:hover, input.gsc-search-button:focus {
    border-color: #300D00;
    background-color: #D2D2D2;
    background-image: none;
    filter: none;
  }
  .gsc-tabHeader.gsc-tabhInactive {
    border-color: #CCCCCC;
    background-color: #000000;
  }
  .gsc-tabHeader.gsc-tabhActive {
    border-color: #CCCCCC;
    border-bottom-color: #000000;
    background-color: #000000;
  }
  .gsc-tabsArea {
    border-color: #CCCCCC;
  }
  .gsc-webResult.gsc-result,
  .gsc-results .gsc-imageResult {
    border-color: #FFFFFF;
    background-color: #000000;
  }
  .gsc-webResult.gsc-result:hover,
  .gsc-imageResult:hover {
    border-color: #FFFFFF;
    background-color: #000000;
  }
  .gs-webResult.gs-result a.gs-title:link,
  .gs-webResult.gs-result a.gs-title:link b,
  .gs-imageResult a.gs-title:link,
  .gs-imageResult a.gs-title:link b {
    color: #EAEC02;
  }
  .gs-webResult.gs-result a.gs-title:visited,
  .gs-webResult.gs-result a.gs-title:visited b,
  .gs-imageResult a.gs-title:visited,
  .gs-imageResult a.gs-title:visited b {
    color: #EAEC02;
  }
  .gs-webResult.gs-result a.gs-title:hover,
  .gs-webResult.gs-result a.gs-title:hover b,
  .gs-imageResult a.gs-title:hover,
  .gs-imageResult a.gs-title:hover b {
    color: #EAEC02;
  }
  .gs-webResult.gs-result a.gs-title:active,
  .gs-webResult.gs-result a.gs-title:active b,
  .gs-imageResult a.gs-title:active,
  .gs-imageResult a.gs-title:active b {
    color: #EAEC02;
  }
  .gsc-cursor-page {
    color: #EAEC02;
  }
  a.gsc-trailing-more-results:link {
    color: #EAEC02;
  }
  .gs-webResult .gs-snippet,
  .gs-imageResult .gs-snippet,
  .gs-fileFormatType {
    color: #c0c0c0;
  }
  .gs-webResult div.gs-visibleUrl,
  .gs-imageResult div.gs-visibleUrl {
    color: #777;
  }
  .gs-webResult div.gs-visibleUrl-short {
    color: #777;
  }
  .gs-webResult div.gs-visibleUrl-short {
    display: none;
  }
  .gs-webResult div.gs-visibleUrl-long {
    display: block;
  }
  .gs-promotion div.gs-visibleUrl-short {
    display: none;
  }
  .gs-promotion div.gs-visibleUrl-long {
    display: block;
  }
  .gsc-cursor-box {
    border-color: #FFFFFF;
  }
  .gsc-results .gsc-cursor-box .gsc-cursor-page {
    border-color: #CCCCCC;
    background-color: #000000;
    color: #EAEC02;
  }
  .gsc-results .gsc-cursor-box .gsc-cursor-current-page {
    border-color: #CCCCCC;
    background-color: #000000;
    color: #EAEC02;
  }
  .gsc-webResult.gsc-result.gsc-promotion {
    border-color: #F6F6F6;
    background-color: #000000;
  }
  .gsc-completion-title {
    color: #EAEC02;
  }
  .gsc-completion-snippet {
    color: #c0c0c0;
  }
  .gs-promotion a.gs-title:link,
  .gs-promotion a.gs-title:link *,
  .gs-promotion .gs-snippet a:link {
    color: #EAEC02;
  }
  .gs-promotion a.gs-title:visited,
  .gs-promotion a.gs-title:visited *,
  .gs-promotion .gs-snippet a:visited {
    color: #EAEC02;
  }
  .gs-promotion a.gs-title:hover,
  .gs-promotion a.gs-title:hover *,
  .gs-promotion .gs-snippet a:hover {
    color: #EAEC02;
  }
  .gs-promotion a.gs-title:active,
  .gs-promotion a.gs-title:active *,
  .gs-promotion .gs-snippet a:active {
    color: #EAEC02;
  }
  .gs-promotion .gs-snippet,
  .gs-promotion .gs-title .gs-promotion-title-right,
  .gs-promotion .gs-title .gs-promotion-title-right *  {
    color: #ffffff;
  }
  .gs-promotion .gs-visibleUrl,
  .gs-promotion .gs-visibleUrl-short {
    color: #ffffff;
  }
  
  .gcsc-branding-text
  {
	color:white;
  }
  
</style> 