<?php
$imageCount = 25;
function LoadMore($count) {
    return $count+25;
}
print '<h1>Need help creating models? Search for some reference images.</h1>';
print '<form method="post">
    <input type="text" name="searchValue"';
if(isset($_POST['submit']))  {
    print 'value='.$_POST['searchValue'].'';
}

print'>
    <button type="submit" name="submit">Search</button>
</form>';


if(isset($_POST['submit'])) {
    $curl = curl_init();

    $query = str_replace(' ', '%20', $_POST['searchValue']);
    curl_setopt_array($curl, [
        CURLOPT_URL => "https://bing-image-search1.p.rapidapi.com/images/search?q='" . $query . "'&count=50",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "x-rapidapi-host: bing-image-search1.p.rapidapi.com",
            "x-rapidapi-key: 9644aa1a3bmsh5e5a9faf02a31b4p1b311djsne202181b2216"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        #print $response;
        $data = json_decode($response, true);

        /*Dynamically generating rows & columns*/
        print '<div style="margin: 0; width: 95%">';
        if(count($data["value"]) == 0) {
            print "<h1>No images found...</h1>";
        } else {

            foreach ($data["value"] as $value) {
                print '<img src=' . $value['thumbnailUrl'] . '>';
            }
            print '</div>';
        }
    }
}
