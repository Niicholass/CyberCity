<?php include "../../includes/template.php";
/** @var $conn */

if (!authorisedAccess(false, true, true)) {
    header("Location:../../index.php");
}

?>
<div class = 'wideBox'>
         <div class = 'title'>
    <title>Cyber City - Challenges</title>

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/moduleList.css">




    <h1>Challenges</h1>

    <?php
        // Get all Enabled Modules.
        $moduleList = $conn->query("SELECT ID, challengeTitle,PointsValue,moduleID FROM Challenges WHERE Enabled = 1");

        while ($challengeData = $moduleList->fetch()) {

            $challengeID = $challengeData["ID"];
            $moduleID = $challengeData["moduleID"];
            $moduleQuery = $conn->query("SELECT Image from RegisteredModules WHERE ID = $moduleID");
            $moduleInformation = $moduleQuery->fetch();

        echo "<div class='product_wrapper'><a href='challengeDisplay.php?moduleID=" . $moduleID . "'>";

            // Check if the "Modules" have an image attached to it.
            if ($moduleInformation['Image']) {
                // Display Module Image.
                echo "<div class='image'><img src='" . BASE_URL ."assets/img/challengeImages/" . $moduleInformation['Image'] . " ' width='100' height='100'></div></a>";
            } else {
                // Display Placeholder Image
                echo "<div class='image'><img src='" . BASE_URL ."assets/img/challengeImages/Image Not Found.jpg' width='100' height='100'></div></a>";
            }


            echo"<div class='name'> ".$challengeData["challengeTitle"] ." </div>";
            echo"<div class='price'> Points: ". $challengeData["PointsValue"] ." </div>";

            echo "</div>";}

    ?>
             <!-- CUSTOM WEBPAGES GO HERE -->
             <div class='product_wrapper' style='text-align: center;'><a href='backupDieselGenerators.php'>
                 <!-- CUSTOM WEBPAGE CHALLENGE TEST -->
                 <div class='image'><img style= 'width: 100px; height: 100px' src='../../assets/img/challengeImages/toilet.jpg'</img></div>
                 <a>Custom Webpage Challenge Test</a>
                 <p>Points: 0</p>
             </a></div>

             <div class='product_wrapper' style='text-align: center;'><a href='biolabShutdown.php'>
                 <!-- BIOLAB SHUTDOWN TEST-->
                 <div class='image'><img style= 'width: 100px; height: 100px' src='../../assets/img/challengeImages/Biolab.png'</img></div>
                 <a>Biolab Shutdown</a>
                 <p>Points: 500</p>
             </a></div>

         </div>

</div>



