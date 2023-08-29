


<?php
include "db_connect.php";








// إنشاء مصفوفة تحتوي على موردين فريدين
$query = "SELECT `prenom`, `nom` FROM `ressources2`";
$result1 = mysqli_query($conn, $query);
$uniqueResources = array();
while ($row1 = mysqli_fetch_assoc($result1)) {
    $resourceName = $row1['prenom'] . ' ' . $row1['nom'];
    if (!in_array($resourceName, $uniqueResources)) {
        $uniqueResources[] = $resourceName;
    }
}




?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Data Planification</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.10/xlsx.full.min.js"></script>
	<link rel="stylesheet" href="main.css">


</head>
<body>
<div class="accueil-header">
  <img class="header-log" id="logo-men" src="LOGO.png" style="width: 240px;">
</div>
 <p class="title">Planning  la semaine :
        
    
    
        <?php
        
        
        
        
        
        
        
        if(isset($_POST['semaine'])) {
        $selectedWeek = $_POST['semaine'];
        
        
        // Connexion à votre base de données ici
        
        // Requête pour récupérer les données de la semaine sélectionnée
        $query = "SELECT * FROM emploi_du_temps WHERE date BETWEEN :start_date AND :end_date";
        // Calcul des dates de début et de fin de semaine en fonction de la semaine sélectionnée
        list($year, $week) = explode('-', $selectedWeek);
        $startDate = date("Y-m-d", strtotime($year . "W" . $week));
        $endDate = date("Y-m-d", strtotime($year . "W" . $week . "7"));
    
        // Exécutez la requête avec les paramètres de dates
        // Utilisez PDO ou MySQLi pour éviter les injections SQL
        // $stmt = $pdo->prepare($query);
        // $stmt->bindParam(':start_date', $startDate);
        // $stmt->bindParam(':end_date', $endDate);
        // $stmt->execute();
        
        // Ici, vous devrez itérer sur les résultats de la requête et utiliser les données récupérées de la base de données
    
        // Afficher la période de la semaine sélectionnée
        echo "  du $startDate au $endDate</p>";}
        ?>


    
    <table  style="width:100%" id="tabledata" >
        <thead >
            <tr>
                <th colspan="2">Date / Ressource</th>
                <?php
                // عرض أسماء الموردين كعناوين للأعمدة
                foreach ($uniqueResources as $resourceName) {
                    echo "<th>$resourceName</th>";
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            if(isset($_POST['semaine'])) {
                $selectedWeek = $_POST['semaine'];
                
                // Connexion à votre base de données ici
                
                // Requête pour récupérer les données de la semaine sélectionnée
                $query = "SELECT * FROM emploi_du_temps WHERE date BETWEEN :start_date AND :end_date";
                // Calcul des dates de début et de fin de semaine en fonction de la semaine sélectionnée
                list($year, $week) = explode('-', $selectedWeek);
                $startDate = date("Y-m-d", strtotime($year . "W" . $week));
                $endDate = date("Y-m-d", strtotime($year . "W" . $week . "7"));
            

            
           
            // عرض تفاصيل المشروعات لكل يوم
            $daysOfWeek = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
            foreach ($daysOfWeek as $day) {
                echo "<tr>";
                echo "<th rowspan='2'>$day</th>";
                echo '<td style="width:1%"> am </td>';

            
                // Calculate the start and end dates within this loop
                $startDate = date("Y-m-d", strtotime($year . "W" . $week));
                $endDate = date("Y-m-d", strtotime($year . "W" . $week . "7"));
            

                $queryForDay = "SELECT * FROM `planification` WHERE DAYNAME(date) = '$day' AND date BETWEEN '$startDate' AND '$endDate'";
                $resultForDay = mysqli_query($conn, $queryForDay);

                // إنشاء مصفوفة تخزن المشروعات لكل مورد لهذا اليوم
                $projectsForDay = array();

                while ($row = mysqli_fetch_assoc($resultForDay)) {
                    $resourceName = $row['ressources'];
                    $projectName = $row['project'];
                    $time = $row['time'];
                
                    // Organiser les projets en fonction de leur temps
                    if ($time == 'am') {
                        $projectsForMorning[$resourceName] = $projectName;
                    } elseif ($time == 'pm') {
                        $projectsForEvening[$resourceName] = $projectName;
                    } elseif ($time == 'tj') {
                        $projectsForFullDay[$resourceName] = $projectName;
                    }
                }


                    foreach ($uniqueResources as $resourceName) {

                        $morningProjects = [];
                     $morningQuery = "SELECT  * FROM `planification` WHERE DAYNAME(date) = '$day' AND date BETWEEN '$startDate' AND '$endDate' AND (`time` = 'am' )";
        $morningResult = $conn->query($morningQuery);
        $resultForDay1 = mysqli_query($conn, $morningQuery);

        
        while ($row = $morningResult->fetch_assoc()) {
            $morningProjects[$resourceName][] = $row['project'];
        }

        $tjProjects = [];
        $tjQuery = "SELECT  * FROM `planification` WHERE DAYNAME(date) = '$day' AND date BETWEEN '$startDate' AND '$endDate' AND (`time` = 'tj' )";
        $tjResult = $conn->query($tjQuery);
        
        while ($row = $tjResult->fetch_assoc()) {
            $tjProjects[$resourceName][] = $row['project'];
        }


        // إنشاء مصفوفة تخزن المشروعات لكل مورد لهذا اليوم
        

        // عرض المشروعات لكل مورد لهذا اليوم

        echo "<td >";
        if (
            isset($projectsForFullDay[$resourceName]) &&
            isset($tjProjects[$resourceName]) &&
            in_array($projectsForFullDay[$resourceName], $tjProjects[$resourceName])
        ) { 
            echo $projectsForFullDay[$resourceName];
            
        }if
         (
            isset($projectsForMorning[$resourceName]) &&
            isset($morningProjects[$resourceName]) &&
            in_array($projectsForMorning[$resourceName], $morningProjects[$resourceName])
        ) {
            echo $projectsForMorning[$resourceName];
           
        }



        
      
            
            

}
            
            echo "</tr>";echo "<tr>";
            echo '<td style="width:1%"> pm </td>';

            foreach ($uniqueResources as $resourceName) {

           
            
                        $afternoonProjects = [];
            $afternoonQuery = "SELECT  * FROM `planification` WHERE DAYNAME(date) = '$day' AND date BETWEEN '$startDate' AND '$endDate' AND ( `time` = 'pm')";
            $afternoonResult = $conn->query($afternoonQuery);
            
            while ($row = $afternoonResult->fetch_assoc()) {
                $afternoonProjects[$resourceName][] = $row['project'];
            }

            $tjProjects = [];
        $tjQuery = "SELECT  * FROM `planification` WHERE DAYNAME(date) = '$day' AND date BETWEEN '$startDate' AND '$endDate' AND (`time` = 'tj' )";
        $tjResult = $conn->query($tjQuery);
        
        while ($row = $tjResult->fetch_assoc()) {
            $tjProjects[$resourceName][] = $row['project'];
        }
            echo "<td>";

                            if (
            isset($projectsForFullDay[$resourceName]) &&
            isset($tjProjects[$resourceName]) &&
            in_array($projectsForFullDay[$resourceName], $tjProjects[$resourceName])
        ) {
            echo $projectsForFullDay[$resourceName];
            echo "</td>";
        }if (
                isset($projectsForEvening[$resourceName]) &&
                isset($afternoonProjects[$resourceName]) &&
                in_array($projectsForEvening[$resourceName], $afternoonProjects[$resourceName])
            ) {
                echo $projectsForEvening[$resourceName];
                
            }
     

            
            
            }}}
            echo "</tr>";








            
        
        
                 
            
            ?>
        </tbody>
    </table>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>
    <button id="exportButton" class="Btn1">
   <svg class="svgIcon" viewBox="0 0 384 512" height="1em" xmlns="http://www.w3.org/2000/svg"><path d="M169.4 470.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 370.8 224 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 306.7L54.6 265.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"></path></svg>
   <span class="icon2"></span>
   <span class="tooltip">Explor to Excel</span>
</button>
<script>
        document.addEventListener("DOMContentLoaded", function() {
          const exportButton = document.getElementById("exportButton");
          const table = document.getElementById("tabledata"); // ID de votre tableau

          exportButton.addEventListener("click", function() {
            const sheet = XLSX.utils.table_to_sheet(table);
            const workbook = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(workbook, sheet, "Data");
            const excelBuffer = XLSX.write(workbook, { bookType: "xlsx", type: "array" });

            saveAsExcel(excelBuffer, "planning.xlsx"); // Utilisation de la bibliothèque FileSaver.js
          });
        });

        function saveAsExcel(buffer, filename) {
          const blob = new Blob([buffer], { type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" });
          const url = window.URL.createObjectURL(blob);
          const a = document.createElement("a");
          a.href = url;
          a.download = filename;
          a.click();
          window.URL.revokeObjectURL(url);
        }
    </script>

    <a href="index.php" ><button class="Btn">
  
  <div class="sign"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>
  
  <div class="text">Exit</div>
</button>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>







</body>
</html>




