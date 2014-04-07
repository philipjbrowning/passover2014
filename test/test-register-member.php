<?php
/**
 * Created by PhpStorm.
 * User: philipjbrowning
 * Date: 4/6/14
 * Time: 11:03 PM
 */
include("../includes/initialize.php");

// Save variables
$lateRegistration = 'F';
$member_id     = 10;
$register_time = date("Y-m-d H:i:s");
$registerer_id = 3;
echo "<p>$registerer_id</p>";


// Query
$sql = "UPDATE `passover2014`.`members`
        SET `register_time` = '".$register_time."',
            `late_registration` = '".$lateRegistration."',
            `registerer_id` = '".$registerer_id."'
        WHERE `members`.`id` = ".$member_id.";";
echo "<p>$sql</p>";
// UPDATE `passover2014`.`members` SET `register_time` = '2014-04-07 00:12:16', `late_registration` = 'F', `registerer_id` = '3' WHERE `members`.`id` = 10;
// UPDATE `passover2014`.`members` SET `register_time` = '2014-04-07 00:18:41', `late_registration` = 'F', `registerer_id` = '3' WHERE `members`.`id` = 10;

// Add update to database
global $database;
echo "<p>database</p>";
$database->open_connection();
echo "<p>open_connection</p>";

if (!$database->query($sql)) {
    printf("<p>Errormessage: %s</p>\n", $database->error);
} else {
    printf("<p>Success: %s</p>\n", $database->affected_rows());
}

$database->close_connection();
echo "<p>close_connection</p>";
?>
<div class="loaded-section">
    <h2>Add Member<span id="validationText"></span></h2>
    <form id="search-form" action="">

    <fieldset>
        <input id="search-member" type="text" value="" name="search-member" class="text" placeholder="Register member by searching here" />
    </fieldset>
    </form>

    <button id="search-button" name="search-button" value="Search">Search</button>
</div> <!-- End of .loaded-section -->
<div class="loaded-section">
    <h2>Search Results</h2>
    <div id="register-list-wrap">
        <ol id="search-results">
            <li>No search results.</li>
        </ol> <!-- End of #search-results -->
</div> <!-- End of #member-list -->
</div> <!-- End of .loaded-section -->

<!-- scripts concatenated and minified via ant build script-->
<script type="text/javascript" src="../js/libs/jquery-1.10.2.min.js"></script> <!--  // Link modified -->
<!-- <script type="text/javascript" src="../js/script.js"></script> -->
<script type="text/javascript">
    var searchInput = $('#search-member');
    var runSearch = null;

    function startTimer() {
        runSearch = setTimeout(function() {
            searchMember(searchInput.val());
        }, 200);
    }

    function clearTimer() {
        clearTimeout(runSearch);
        runSearch = null;
    }

    searchInput.keydown(function(e) { // FIX NUMERIC KEYPAD ZERO
        var myRe = /[a-z,A-Z,0-9]$/g;
        if (myRe.test(String.fromCharCode(e.which)) || (e.which == 189)) {
            if (runSearch) {
                clearTimer();
                startTimer();
            } else {
                startTimer();
            }
        } else if ((e.which == 8) || (e.which == 32)) {
            // Allow backspace = 8 and spacebar = 32
        } else if (e.which == 13) {
            clearTimer();
            searchMember(searchInput.val());
        } else {
            e.preventDefault();
        }
    });

    function searchMember( searchInput ) {
        runSearch = null;
        var task = null;
        if ($('#search-results').parent().attr('id') == 'confirm-list-wrap') {
            task = 'confirm';
        } else if ($('#search-results').parent().attr('id') == 'register-list-wrap') {
            task = 'register';
        }
        console.log($('#search-results').parent().attr('id'));
        console.log( task );
        $.ajax({
            type : "POST",
            url  : "../includes/search-member.php", // Link modified
            data: {
                'task'      : task,
                'queryText' : searchInput
            }
        }).done(function( htmlData ) {
            $('#search-results').html( htmlData );
        }).fail(function() {
            console.log( "Fail" );
        });
    }

    function registerMember(member_id, user_id) {
        if(confirm('Are you sure you want to register this member?')) {
            console.log("registerMember");

            var request = $.ajax({
                type : "POST",
                url  : "../includes/register-member.php", // Link modified
                data: {
                    'member_id'     : member_id,
                    'registerer_id' : user_id
                }
            })
            request.done(function( htmlData ) {
                console.log( htmlData );
            })
            request.fail(function() {
                console.log( "Fail" );
            });
        }
    }
</script>