<div class="post-facebook">
    <?php
    include_once './facebook.php';
    $config = array(
        'appId' => '247960398662463',
        'secret' => '080c4c52eafc809534af3bef3909dcc5',
        'fileUpload' => TRUE,
    );
    $returnUrl = 'http://pichnil.com/facebook/example.php';
    $permission = 'manage_pages, publish_stream';
    $objFb = new Facebook($config);
    $fbUser = $objFb->getUser();
    $photos = 'http://pichnil.com/img/development.png';
// If user logged in
    if ($fbUser) {
        try {
            $msg = array(
                'picture' => $photos,
                'message' => 'Message here',
                'link' => 'http://pichnil.com',
                'name' => 'Pichnil',
                'description' => 'Sell hosting and domain name!'
            );
            $url = '/' . $_POST['pageid'] . '/feed';
            $result = $objFb->api($url, 'POST', $msg);
            if ($result) {
                echo 'Message have post!';
            }
        } catch (FacebookApiException $error) {
            echo $error->getMessage();
        }
        try {
            $qry = "select page_id, name from page where page_id in (select page_id from page_admin where uid=$fbUser)";
            $arr = array(
                'method' => 'fql.query',
                'query' => $qry
            );
            $pages = $objFb->api($arr);
            if (empty($pages)) {
                echo 'User has no page!';
            } else {
                echo '<form method="post" action="">';
                echo 'Page: <select name="pageid">';
                foreach ($pages as $page) {
                    echo '<option value="' . $page['page_id'] . '">' . $page['name'] . '</option>';
                }
                echo '</select><br />';
                echo 'Message:';
                echo '<textarea name="msg"></textarea><br />';
                echo '<input type="submit" name="post" value="Post to Facebook" /><br />';
                echo '</form>';
            }
        } catch (FacebookApiException $error) {
            echo $error->getMessage();
        }
    } else {
        $loginUrl = $objFb->getLoginUrl(array('scope' => $permission, 'redirect-uri' => $returnUrl));
        echo 'You are not login, please login! <a href="' . $loginUrl . '">Login</a>';
    }
    ?>
</div>