<?php
////
// Author: Sean Colombo
// Date: 20061231
//
// This special page just shows which songs have the most failed requests from
// the LyricWiki SOAP.
//
// The structure of this special page was just copied from Teknomunk's
// Batch Move special page.
//
//DROP TABLE IF EXISTS lw_soap_failures;
//CREATE TABLE lw_soap_failures(
//	request_artist VARCHAR(255) NOT NULL,
//	request_song VARCHAR(255) NOT NULL,
//	numRequests INT(11) DEFAULT 1,
//	PRIMARY KEY (request_artist, request_song)
//);
//
////

if(!defined('MEDIAWIKI')) die();

// Allows anyone to view the page.
$wgAvailableRights[] = 'soapfailures';
$wgGroupPermissions['*']['soapfailures'] = true;
$wgGroupPermissions['user']['soapfailures'] = true;
$wgGroupPermissions['sysop']['soapfailures'] = true;

$wgExtensionFunctions[] = 'wfSetupSoapFailures';
$wgExtensionCredits['specialpage'][] = array(
	'name' => 'SOAP Failures',
	'author' => '[http://www.lyricwiki.org/User:Sean_Colombo Sean Colombo]',
	'description' => 'SOAP Failures Log special page',
	'version' => '0.1',
);

function wfSetupSoapFailures(){
	global $IP, $wgMessageCache;
	require_once($IP . '/includes/SpecialPage.php');
	SpecialPage::addPage(new SpecialPage('Soapfailures', 'soapfailures', true, 'wfSoapFailures', false));
	$wgMessageCache->addMessage('soapfailures', 'SOAP Page Failures');
}

function wfSoapFailures(){
	global $wgOut;
	global $wgRequest, $wgUser;

	$wgOut->setPageTitle("SOAP Page Failures");
	
	// This processes any requested for removal of an item from the list.
	if(isset($_GET['artist']) && isset($_GET['song'])){
		$artist = $_GET['artist'];
		$song = $_GET['song'];
		$songResult = array();
		$failedLyrics = "Not found";
		
		/*
		GLOBAL $IP;
		define('LYRICWIKI_SOAP_FUNCS_ONLY', true); // so that we can use the SOAP functions but not actually instantiate a SOAP server & process a request.
		include_once 'server.php'; // the SOAP functions

		$songResult = getSong($artist, $song);*/
		
		// Pull in the NuSOAP code
		require_once('nusoap.php');
		// Create the client instance
		$client = new soapclient('http://lyrics.wikia.com/lyrics/Special:ServerWrapper?wsdl', true);
		$err = $client->getError();
		if ($err) {
			echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
		} else {
			// Create the proxy
			$proxy = $client->getProxy();
			GLOBAL $LW_USERNAME,$LW_PASSWORD;
			if(($LW_USERNAME != "") || ($LW_PASSWORD != "")){
				$headers = "<username>$LW_USERNAME</username><password>$LW_PASSWORD</password>\n";
				$proxy->setHeaders($headers);
			}
			$songResult = $proxy->getSongResult($artist, $song);
		}

		if(($songResult['lyrics'] == $failedLyrics) || ($songResult['lyrics'] == "")){
			print "<div style='background-color:#fcc'>Sorry, but $artist:$song song still failed.</div>\n";
		} else {
			$artist = str_replace("'", "\\'", $artist);
			$song = str_replace("'", "\\'", $song);

			$db = &wfGetDB(DB_MASTER)->getProperty('mConn');
			
			print "Deleting record... ";
			if(mysql_query("DELETE FROM lw_soap_failures WHERE request_artist='$artist' AND request_song='$song'", $db)){
				print "Deleted.";
			} else {
				print "Failed. ".mysql_error();
			}
			print "<br/>Clearing the cache... ";
			$wgMemc->delete($cacheKey); // purge the entry from memcached

			print "<div style='background-color:#cfc'>The song was retrieved successfully and ";
			print "was removed from the failed requests list.";
			print "</div>\n";
		}
		print "<br/>Back to <a href='/Special:Soapfailures'>SOAP Failures</a>\n";
		exit; // wiki system throws database-connection errors if the page is allowed to display itself.
	} else {
		$msg = "";

		GLOBAL $wgMemc;
		$cacheKey = "LW_SOAP_FAILURES";

		// Allow the cache to be manually cleared.
		if(isset($_GET['cache']) && $_GET['cache']=="clear"){
			$msg.= "Forced clearing of the cache...\n";
			$wgMemc->delete($cacheKey); // purge the entry from memcached
			unset($_GET['cache']);
			$_SERVER['REQUEST_URI'] = str_replace("?cache=clear", "", $_SERVER['REQUEST_URI']);
			$_SERVER['REQUEST_URI'] = str_replace("&cache=clear", "", $_SERVER['REQUEST_URI']);
		}

		$content = $wgMemc->get($cacheKey);
		if(!$content){
			ob_start();

			$db = &wfGetDB(DB_SLAVE)->getProperty('mConn');

			print "<em>Once you have created a missing page, made a redirect for it, or otherwise fixed it so that it should ";
			print "no longer be a failed request... click the \"fixed\" link next to the title and the SOAP webservice will test the song again. ";
			print "If the song is then retrieved successfully, it will be removed from the failures list and the cache will be cleared ";
			print "so that you can see the updated list right away.</em><br/>";
			print "<br/>";
			print "Discuss the [[LyricWiki_talk:SOAP|SOAP webservice]].\n";
			print "<br/><br/>\n";

			print "This page is cached every 2 hours - \n";
			print "last cached: <strong>".date('m/d/Y \a\t g:ia')."</strong>\n";
			$queryString = "SELECT * FROM lw_soap_failures ORDER BY numRequests DESC LIMIT 50";
			$totFailures = 0;
			if($result = mysql_query($queryString,$db)){
				if(($numRows = mysql_num_rows($result)) && ($numRows > 0)){
					print "<table>\n";
					print "<tr><th nowrap='nowrap'>Requests</th><th>Artist</th><th>Song</th></tr>\n";
					$REQUEST_URI = $_SERVER['REQUEST_URI'];
					for($cnt=0; $cnt<$numRows; $cnt++){
						$artist = mysql_result($result, $cnt, "request_artist");
						$song = mysql_result($result, $cnt, "request_song");
						$numRequests = mysql_result($result, $cnt, "numRequests");
						$totFailures += $numRequests;
						print utf8_encode("<tr".((($cnt%2)!=0)?" class='odd'":"")."><td>$numRequests</td><td>[[$artist]]</td><td>[[$artist:$song|$song]]");
						$delim = "&amp;";
						$prefix = "";

						// If the short-url is in the REQUEST_URI, make sure to add the index.php?title= prefix to it.
						if(strpos($REQUEST_URI, "index.php?title=") === false){
							$prefix = "/index.php?title=";
							
							// If we're adding the index.php ourselves, but the request still started with a slash, remove it because that would break the request if it came after the "title="
							if(substr($REQUEST_URI,0,1) == "/"){
								$REQUEST_URI = substr($REQUEST_URI, 1);
							}
						}
						print "	- (report as [{{SERVER}}$prefix$REQUEST_URI$delim"."artist=".urlencode($artist)."&amp;song=".urlencode($song)." fixed])";
						print "</td></tr>";
					}
					print "</table>\n";
					print "<br/>Total of <strong>$totFailures</strong> requests in the top 50.  This number will increase slightly over time, but we should fight to keep it as low as possible!";
				} else {
					print "<em>No results found.</em>\n";
				}
			} else {
				print "<br/><br/><strong>Error: with query</strong><br/><em>$queryString</em><br/><strong>Error message: </strong>".mysql_error($db);
			}

			$content = ob_get_clean();
			$wgMemc->set($cacheKey, $content, strtotime("+2 hour"));
		}
		$msg = ($msg==""?"":"<pre>$msg</pre>");
		$wgOut->addHTML("<style>table{border-collapse:collapse;}tr.odd{background-color:#eef}</style>\n");
		$wgOut->addWikiText("$msg$content");
	}
}

?>
