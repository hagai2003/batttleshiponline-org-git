<h3 class="pageName"><?php p('a124');?></h3>
<br/>
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
  .gsc-control-cse {
    font-family: Georgia, serif;
    border-color: #FFBA00;
    background-color: #000000;
	font-size:100%;
  }
  .gsc-control-cse .gsc-table-result {
    font-family: Georgia, serif;
	font-size:100%;
  }
  input.gsc-input {
    border-color: #D3BCA1;
	font-size:100%;
  }
  input.gsc-search-button {
    border-color: #000000;
    background-color: #D2D2D2;
	font-size:100%;
  }
  .gsc-tabHeader.gsc-tabhInactive {
    border-color: #A25B08;
	font-size:100%;
    background-color: #A25B08;
  }
  .gsc-tabHeader.gsc-tabhActive {
    border-color: #461200;
	font-size:100%;
    background-color: #461200;
  }
  .gsc-tabsArea {
    border-color: #461200;
	font-size:100%;
  }
  .gsc-webResult.gsc-result,
  .gsc-results .gsc-imageResult {
    border-color: #000000;
    background-color: #000000;
	font-size:100%;
  }
  .gsc-webResult.gsc-result:hover,
  .gsc-imageResult:hover {
    border-color: #FFFFFF;
    background-color: #000000;
	font-size:100%;
  }
  .gsc-webResult.gsc-result.gsc-promotion:hover {
    border-color: #FFFFFF;
    background-color: #000000;
	font-size:100%;
  }
  .gs-webResult.gs-result a.gs-title:link,
  .gs-webResult.gs-result a.gs-title:link b,
  .gs-imageResult a.gs-title:link,
  .gs-imageResult a.gs-title:link b {
    color: #FF6600;
	font-size:100%;
  }
  .gs-webResult.gs-result a.gs-title:visited,
  .gs-webResult.gs-result a.gs-title:visited b,
  .gs-imageResult a.gs-title:visited,
  .gs-imageResult a.gs-title:visited b {
    color: #FF6600;
	font-size:100%;
  }
  .gs-webResult.gs-result a.gs-title:hover,
  .gs-webResult.gs-result a.gs-title:hover b,
  .gs-imageResult a.gs-title:hover,
  .gs-imageResult a.gs-title:hover b {
    color: #950000;
	font-size:100%;
  }
  .gs-webResult.gs-result a.gs-title:active,
  .gs-webResult.gs-result a.gs-title:active b,
  .gs-imageResult a.gs-title:active,
  .gs-imageResult a.gs-title:active b {
    color: #950000;
	font-size:100%;
  }
  .gsc-cursor-page {
    color: #FF6600;
	font-size:100%;
  }
  a.gsc-trailing-more-results:link {
    color: #FF6600;
	font-size:100%;
  }
  .gs-webResult .gs-snippet,
  .gs-imageResult .gs-snippet,
  .gs-fileFormatType {
    color: white;
	font-size:100%;
  }
  .gs-webResult div.gs-visibleUrl,
  .gs-imageResult div.gs-visibleUrl {
    color: #FFBA00;
	font-size:100%;
  }
  .gs-webResult div.gs-visibleUrl-short {
    color: #ffffff;
	font-size:100%;
  }
  .gs-webResult div.gs-visibleUrl-short {
    display: none;
	font-size:100%;
  }
  .gs-webResult div.gs-visibleUrl-long {
    display: block;
	font-size:100%;
  }
  .gs-promotion div.gs-visibleUrl-short {
    display: none;
	font-size:100%;
  }
  .gs-promotion div.gs-visibleUrl-long {
    display: block;
	font-size:100%;
  }
  .gsc-cursor-box {
    border-color: #000000;
	font-size:100%;
  }
  .gsc-results .gsc-cursor-box .gsc-cursor-page {
    border-color: #A25B08;
	font-size:100%;
    background-color: #000000;
    color: #FF6600;
  }
  .gsc-results .gsc-cursor-box .gsc-cursor-current-page {
    border-color: #461200;
	font-size:100%;
    background-color: #461200;
    color: #FF6600;
  }
  .gsc-webResult.gsc-result.gsc-promotion {
    border-color: #FEFEDC;
	font-size:100%;
    background-color: #000000;
  }
  .gsc-completion-title {
    color: #FF6600;
	font-size:100%;
  }
  .gsc-completion-snippet {
    color: black;
	font-size:100%;
  }
  .gs-promotion a.gs-title:link,
  .gs-promotion a.gs-title:link *,
  .gs-promotion .gs-snippet a:link {
    color: #0000CC;
	font-size:100%;
  }
  .gs-promotion a.gs-title:visited,
  .gs-promotion a.gs-title:visited *,
  .gs-promotion .gs-snippet a:visited {
    color: #0000CC;
	font-size:100%;
  }
  .gs-promotion a.gs-title:hover,
  .gs-promotion a.gs-title:hover *,
  .gs-promotion .gs-snippet a:hover {
    color: #0000CC;
	font-size:100%;
  }
  .gs-promotion a.gs-title:active,
  .gs-promotion a.gs-title:active *,
  .gs-promotion .gs-snippet a:active {
    color: #0000CC;
	font-size:100%;
  }
  .gs-promotion .gs-snippet,
  .gs-promotion .gs-title .gs-promotion-title-right,
  .gs-promotion .gs-title .gs-promotion-title-right *  {
    color: #333333;
	font-size:100%;
  }
  .gs-promotion .gs-visibleUrl,
  .gs-promotion .gs-visibleUrl-short {
    color: #A25B08;
	font-size:100%;
  }

  .gcsc-branding-text
  {
	color:white;
  }
  </style> 