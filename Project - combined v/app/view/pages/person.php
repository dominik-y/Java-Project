<form>
    <h2> Person </h2>
    <?php
    $content = "<table border='1'><tr><th>Person ID</th><th>Last Name</th><th>First Name</th><th>Nick Name</th></tr>\n";

    if (is_object($data)) {
        $content .= "<tr><td><a href='" . URL_ROOT . "index.php?page=phone&method=getAllJoinedBy&param=" . $data->id . "'>"
                . $data->id . "</td>" .
                "<td>$data->last_name</td>" .
                "<td>$data->first_name</td>" .
                "<td>$data->nick_name</td></tr>\n";
    } else {
        foreach ($data as $person) {
            $content .= "<tr><td><a href='" . URL_ROOT . "index.php?page=phone&method=getAllJoinedBy&param=" . $person->id . "'>"
                    . $person->id . "</td>" .
                    "<td>$person->last_name</td>" .
                    "<td>$person->first_name</td>" .
                    "<td>$person->nick_name</td></tr>\n";
        }
    }

    $content .= "</table>\n";
    echo $content;
    ?>
</form>
