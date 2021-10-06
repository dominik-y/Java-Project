    <form>
        <h2> Phone Number </h2>
        <?php 
        $content = "<table border='1'><tr><th>Last Name</th><th>First Name</th><th>Phone Type</th><th>Country Code</th><th>Number</th></tr>\n";
       
        foreach ($data as $phone) { 
            $content .= "<tr><td>$phone->last_name</td>" .
                "<td>$phone->first_name</td>" .
                "<td>$phone->phone_type</td>" .
                "<td>$phone->country_code</td>" .
                "<td>$phone->phone_number</td></tr>\n";
        }
        $content .= "</table><br>\n";
        $content .= "<a href='" . URL_ROOT . "index.php?page=person&method=getAll'>Go back to Person view</a>\n";
        echo $content;
        ?>
    </form>
