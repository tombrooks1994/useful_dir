<?php
/**
 * Created by PhpStorm.
 * User: tbrooks
 * Date: 04/08/2017
 * Time: 19:58
 */

echo "Hello world this is working without internet";
echo "<style>
        a {
        color:blue;
        font-weight: bold;
        }
        a:hover {
        border-bottom:1px solid red;
        }
      </style>";

require_once("notes_class.php");

$notes = new notes_class();

$notes->__header();

?>

    <div class="content">
        <h1>Welcome to the test system</h1>
        <fieldset>
            <legend>Test System</legend>

            Who are you:
            <form class="test_form" method="post">
                <input type="text" name="name"/>
                <input type="submit"/>
            </form>
            <div class="hello"></div>
            <?php
            if (isset($_POST['name'])) {
                echo "Welcome to the test system <strong>" . $_POST['name'] . "</strong><br/>
                      What would you like to do dude?";
                ?>
                <br/><br/>
                <form method="post">
                    Select an option dude:
                    <input name="name" type="hidden" value="<?php echo $_POST['name'] ?>"/>
                    <br/><br/><select class="options" name="options">
                        <option disabled selected>Select...</option>
                        <option>Programming</option>
                        <option name="chilling">Chilling</option>
                        <option name="pun">Give me a pun</option>
                        <option name="nothing">Nothing.</option>
                    </select><br/><br/>
                    <input type="submit" value="Make you choice be known"/>
                </form>
                <?php

//                switch ($_POST) {
//                    case 1:
                if (isset($_POST['options'])) {
                    if ($_POST['options'] == "Programming") {
                        if ($_POST['name'] == "Thomas Brooks") {

                            echo "Dude, you created me... Why are you practising that?
                                Chill out and watch <a
                                 target='_blank' href='https://netflix.com'>Netflix</a>";
                        } else {
                            echo "Let's get started " . $_POST['name'];
                            echo "<br/><br/><iframe width='100%' height='100%' src='https://www.freecodecamp.org/'></iframe>";
                        }
                    }
                    if ($_POST['options'] == "Give me a pun") {
                        $ch = curl_init();
                        $url = "http://www.punoftheday.com/cgi-bin/arandompun.pl";
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        $output = curl_exec($ch);
                        $trim = explode("')", $output);
                        echo "<h3>" . substr($trim[0], 16) . "</h3>";
                        echo "<p><strong style='color:blue'>HAHAHAHAHA</strong>
                            <a target='_blank' href='http://www.punoftheday.com'>punny</a>...</p>";
                    }

                    if ($_POST['options'] == "Chilling") {
                        echo "<style>
                                   .binural_videos {
                                       background-color:blue;
                                       border: 1px solid black;
                                       height:200px;
                                       margin-top:20px;
                                   }
                                  .binural_videos:hover {
                                       background-color:lightgrey   ;
                                       border: 1px solid black;
                                       height:200px;
                                       margin-top:20px;
                                    }
                                   .test_sys_btn {
                                        color:white;
                                        background-color:black;
                                   }
                                   .test_sys_btn:hover {
                                        color:white;
                                        background-color:darkgrey;
                                   }
                                   .mind_blown {
                                        margin-left:30%;
                                        margin-top:6.5%;
                                        color:blue;
                                   }
                              </style>
                              <script>
                              $('.mind_blown').hover()
                              </script>
                              
                              
                              ";
                        echo "Take your time to meditate and listen to binural beats.<br/>";
                        echo "These are some of the songs you should liste to: ";
                        echo "<div class='binural_videos'>
                                <h1 class='mind_blown'>WOAHHHH MIND BLOWING</h1>
                                <!--<button class='test_sys_btn' src='https://www.youtube.com/'>Binural 1</button>-->

                              </div>";
                    }
                }
            }
            ?>
        </fieldset>

    </div>

<?php

//print_r($_POST);