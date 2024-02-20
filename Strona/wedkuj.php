<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wędkowanie</title>
    <link rel="stylesheet" href="styl_1.css">
</head>
<body>
    <nav>
        <h1>Portal dla wędkarzy</h1>
    </nav>
    <main>
        <div id="lewy1">
            <h3>Ryby zamieszkujace rzeki</h3>
            <ol>
                <?php
                $conn=mysqli_connect('localhost','root','','wedkowanie') or die("zle wykonane polaczenie");
                $zapytanie='SELECT ryby.nazwa, lowisko.akwen, lowisko.wojewodztwo FROM lowisko inner join ryby on ryby.id=lowisko.Ryby_id
                WHERE lowisko.rodzaj=3';
                $result=mysqli_query($conn,$zapytanie);
                while($row=mysqli_fetch_assoc($result))
                {
                    echo "<li>".$row['nazwa']." pływa w rzece ".$row['akwen'].", ".$row['wojewodztwo']."</li>";
                }
                mysqli_close($conn);
                ?>
            </ol>
        </div>
        <div id="prawy">
<img src="../ryba1.jpg" alt="Sum" srcset="">
<br>
<a href="kwerendy.txt">Pobierz kwerendy</a>
        </div>         
        <div id="lewy2">
            <h3>Ryby drapieżne naszych wód</h3>
            <table>
                <tr>
                    <th>L.p.</th>
                    <th>Gatunek</th>
                    <th>Występowanie</th>
                </tr>
                <?php
                $conn=mysqli_connect('localhost','root','','wedkowanie') or die("zle polaczono");
                $zapytanie='SELECT ryby.id, ryby.nazwa, ryby.wystepowanie FROM ryby
                WHERE ryby.styl_zycia=1';
                $result=mysqli_query($conn,$zapytanie);
                while($row=mysqli_fetch_row($result))
                {
                    echo "<tr>";
                    for($i=0; $i<3; $i++)
                    {
                        echo "<td>".$row[$i]."</td>";
                    }
                    echo "</tr>";
                }
                mysqli_close($conn);
                ?>
            </table>
        </div> 
    </main>
    <footer>
        <p>Stronę wykonał 000000000</p>
    </footer>


</body>
</html>