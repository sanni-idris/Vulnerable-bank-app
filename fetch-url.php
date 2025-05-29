<?php
if (isset($_GET['url'])) {
    $url = $_GET['url'];
    $response = file_get_contents($url);
    echo "<h2>Fetched content from: $url</h2>";
    echo "<pre>" . htmlspecialchars($response) . "</pre>";
} else {
?>
    <form method="GET">
        <label>Enter a URL to fetch:</label>
        <input type="text" name="url" placeholder="http://example.com" />
        <input type="submit" value="Fetch" />
    </form>
<?php
}
?>
