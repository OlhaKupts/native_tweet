		<H1>Register</H1>
	    <BR>
        <div class='w3-section'>
            <form action="processes/register.php" method="POST">
                First Name: <input type='text' name='first'><BR><BR>
                Last Name: <input type='text' name='last'><BR><BR>
                Email: <input type='text' name='email'><BR><BR>
                Country of Origin: 
                <select name='country_origin'>
                <option>Choose Country</option>
                <option value="1" selected>United States of America</option>
                <?php
                //Need a dynamic drop down list of countries
                // Define the API URL
                    $countryDataURL = $mainURL."/api/countries";
                    $countryResponse  = getJSONFromURL($countryDataURL);
                    $countries = $countryResponse["data"];
                    foreach($countries as $country){
                        echo "<option value='".$country["COUNTRY_ID"]."'>";
                        echo $country["COUNTRY_NAME"];
                        echo "</option>"; 
                    }
                ?>
            </select>
            <br><br>

            Spoken Language:
            <select name='language_ids[]' multiple>
                <?php
                    // Language API
                    $languageDataURL = $mainURL."/api/languages";
                    $languageResponse = getJSONFromURL($languageDataURL);
                    $languages = $languageResponse["data"];

                    foreach($languages as $language){
                        echo "<option value='".$language["LANGUAGE_ID"]."'>";
                        echo $language["LANGUAGE_NAME"];
                        echo "</option>";
                }
            ?>
        </select>
        <br>

        <br><br>

                
                Password: <input type='password' name='pass'><BR><BR>
                <input type='submit' value='Register'><BR>
            </form>
        </div>
