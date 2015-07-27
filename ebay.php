<?php

error_reporting(E_ALL);  // Turn on all errors, warnings and notices for easier debugging

// API request variables
$endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';  // URL to call
$version = '1.0.0';  // API version supported by your application
$appid = 'TGCDTf0df-e86e-4950-a0d6-2ba07fe1ea3';  // Replace with your own AppID
$globalid = 'EBAY-US';  // Global ID of the eBay site you want to search (e.g., EBAY-DE)
$query = $_POST['cardName'] . " " . $_POST['cardNumber'];  // You may want to supply your own query
$safequery = urlencode($query);  // Make the query URL-friendly
$i = '0';  // Initialize the item filter index to 0

// Create a PHP array of the item filters you want to use in your request
$filterarray =
  array(
    array(
    'name' => 'LocatedIn',
    'value' => 'WorldWide',
    'paramName' => '',
    'paramValue' => ''),
  );

// Generates an indexed URL snippet from the array of item filters
function buildURLArray ($filterarray) {
  global $urlfilter;
  global $i;
  // Iterate through each filter in the array
  foreach($filterarray as $itemfilter) {
    // Iterate through each key in the filter
    foreach ($itemfilter as $key =>$value) {
      if(is_array($value)) {
        foreach($value as $j => $content) { // Index the key for each value
          $urlfilter .= "&itemFilter($i).$key($j)=$content";
        }
      }
      else {
        if($value != "") {
          $urlfilter .= "&itemFilter($i).$key=$value";
        }
      }
    }
    $i++;
  }
  return "$urlfilter";
} // End of buildURLArray function

// Build the indexed item filter URL snippet
buildURLArray($filterarray);

// Construct the findItemsByKeywords HTTP GET call 
$apicall = "$endpoint?";
$apicall .= "OPERATION-NAME=findItemsByKeywords";
$apicall .= "&SERVICE-VERSION=$version";
$apicall .= "&SECURITY-APPNAME=$appid";
$apicall .= "&GLOBAL-ID=$globalid";
$apicall .= "&keywords=$safequery";
$apicall .= "&sortOrder=PricePlusShippingLowest";
$apicall .= "&paginationInput.entriesPerPage=5";
$apicall .= "$urlfilter";

// Load the call and capture the document returned by eBay API
$resp = simplexml_load_file($apicall);

// Check to see if the request was successful, else print an error
if ($resp->ack == "Success") {
  $results = '';
  // If the response was loaded, parse it and build links  
  foreach($resp->searchResult->item as $item) {



    $sellingStatus   = $item->sellingStatus;
    $sellerUserName   = $item->sellerInfo->sellerUserName;
    $convertedCurrentPrice   = sprintf("%01.2f", $item->sellingStatus->convertedCurrentPrice);
    $currencyId   = $item->sellingStatus->convertedCurrentPrice['currencyId'];
    $shippingServiceCost   = sprintf("%01.2f", $item->shippingInfo->shippingServiceCost);
    $convertedBuyItNowPrice   = sprintf("%01.2f", $item->listingInfo->convertedBuyItNowPrice);



    $pic   = $item->galleryURL;
    $link  = $item->viewItemURL;
    $title = $item->title;
    $listingType = $item->listingInfo->listingType;
    $location = $item->location;
  
    // For each SearchResultItem node, build a link and append it to $results
    $results .= '<div class="row" style="border-radius: 5px; background-color: lightGrey; padding:5px; margin-bottom: 5px; width: inherit;"><div class="col-md-3"><img src="' . $pic . '"></div><div class="col-md-9"><strong><a href="' . $link . '" target="_blank">' . $title . '</a></strong> ';
    $results .= '<br/>'. $sellerUserName . ' ' . $location . '<br/>' . $sellingStatus . ' $' . $convertedCurrentPrice . ' ($' . $convertedBuyItNowPrice . ') + $' . $shippingServiceCost . '</div></div>';
  }
}
// If the response does not indicate 'Success,' print an error
else {
  $results  = "<h3>Oops! The request was not successful. Make sure you are using a valid ";
  $results .= "AppID for the Production environment.</h3>";
}
?>

<div style=" padding: 5px;">
<?php echo $results;?>
</div>