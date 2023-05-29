<?php
include_once("koneksi.php");   
if ( isset($_POST['addData'])){
    $tambahKlub = $_POST["tambahKlub"];
    $cekData = mysqli_query($koneksi, "SELECT * FROM klasemen1 where namaKlub = '$tambahKlub'");
    $validasi = mysqli_num_rows($cekData);
    if ($validasi > 0 ) {
        echo " Data ini sudah ada di dalam database";
        header("location:".BASE_URL. "");
    } else {
    $queryTambah = mysqli_query($koneksi, "INSERT INTO klasemen1 (namaKlub) VALUES ('$tambahKlub')");

    if ($queryTambah){
        echo "Data berhasil disimpan";
        header("location:".BASE_URL. "");
        exit();
    }else{
        echo "Ada Kesalahan, tidak bisa menambahkan";
    }

    }
}    

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="edit.css">
    <title> Klasement Pertandingan </title>
</head>
<body>

<h2> Pertandingan Bola </h2>




<div class="pengumuman-wrapper">
    <h2> Perhatian, Sebelum Melakukan Input Data</h2>
    <ul> 
       <li> Data Klasemen Muncul Pada Saat Anda Sudah Menambahkan Klub.  </li>
       <li> Jika anda menerima pesan berhasil, maka data tim ada sudah tersimpan. </li>
       <li> Masukan Nama dan Score Tim yang akan bertanding. </li>
       <li> Klasemen akan berubah setelah anda menekan tombol Simpan Data </li>
       <li> Terima Kasih, Semoga Lulus, Amiin </li>
    </ul>
</div>









<div class="wrapper">

        <h2> Masukan Tim Favorit anda </h2>
            <div class="input-wrapper">
            <form action="" method=POST >   
                <label for="tambahKlub"> Masukan Klub Baru 
                <input type="text" class="tambahKlub" name="tambahKlub">
                </label>
            </div>
            <button type="submit" name="addData"> Add Team </button>
    </form>
</div>


<?php
if(isset($_POST['saveData'])){
    $team1 = $_POST['team1'];
    $team2 = $_POST['team2'];
    $score1 = $_POST['ScoreTeam1'];
    $score2 = $_POST['ScoreTeam2'];
    $valuePertandingan = count($team1);

    // Validasi Form
    $validMatch = true;
    for ($i = 0; $i < $valuePertandingan; $i++ ){
        if ($team1[$i] == $team2[$i]){
            $validMatch = false;
            echo "Team 1 atau Team 2 tidak boleh sama pada pertandingan ke ".($i + 1). "<br>";
        }
    }

    if ($validMatch){
        for ($i = 0; $i < $valuePertandingan; $i++){
            $namaTeam1 = mysqli_real_escape_string($koneksi, $team1[$i]);
            $namaTeam2 = mysqli_real_escape_string($koneksi, $team2[$i]);
           

            // VALIDASI DATA SEBELUM INSERT
            $checkTeam = mysqli_query($koneksi, "SELECT * FROM jadwalpertandingan WHERE team1 ='$namaTeam1' AND team2 ='$namaTeam2'");
            if (mysqli_num_rows($checkTeam) > 0 ){
                echo "Data pertandingan antara $namaTeam1 dan $namaTeam2 sudah ada<br>";
            } else {
                $ScoreTeam1 = (int) $score1[$i];
                $ScoreTeam2 = (int) $score2[$i];
    
                $ScoreTeam1 = isset($score1[$i]) ? (int) $score1[$i] : 0;
                $ScoreTeam2 = isset($score2[$i]) ? (int) $score2[$i] : 0;
    
                $pointTeam1 = 0;
                $pointTeam2 = 0;
    
                if ($ScoreTeam1 > $ScoreTeam2){
                    $pointTeam1 = 3;
                } elseif ($ScoreTeam1 < $ScoreTeam2){
                    $pointTeam2 = 3;
                } else {
                    $pointTeam1 = $pointTeam2 = 1;
                }
                $tambahPertandingan = mysqli_query($koneksi, "INSERT INTO jadwalpertandingan (team1, team2, ScoreTeam1, ScoreTeam2, pointTeam1, pointTeam2) VALUES ('$namaTeam1', '$namaTeam2', $ScoreTeam1, $ScoreTeam2, $pointTeam1, $pointTeam2)");

                if(!$tambahPertandingan){
                    echo "Terjadi kesalahan saat menambahkan data pertandingan ke-$i<br>";
                }
            }
        }

        if(!$validMatch){
            echo "Data Pertandingan tidak Valid, Silahkan Periksa Kembali";
        } else {
            $tampilMatch = mysqli_query($koneksi, "SELECT * FROM jadwalpertandingan ORDER BY id ASC");

            echo '<div class="klasemen-wrapper">
                    <h2> Hasil Pertandingan</h2>
                    <table>
                    <thead>
                        <tr>
                            <td> No </td>
                            <td> Tim 1 </td>
                            <td> Tim 2 </td>
                            <td> Skor 1 </td>
                            <td> Skor 2 </td>
                            <td> Poin Tim 1 </td>
                            <td> Poin Tim 2 </td>
                        </tr>
                    </thead>
                    <tbody>';

            $no = 1;
            while ($row = mysqli_fetch_assoc($tampilMatch)){
                echo '<tr>
                        <td>'.$no.'</td>
                        <td>'.$row['team1'].'</td>
                        <td>'.$row['team2'].'</td>
                        <td>'.$row['ScoreTeam1'].'</td>
                        <td>'.$row['ScoreTeam2'].'</td>
                        <td>'.$row['pointTeam1'].'</td>
                        <td>'.$row['pointTeam2'].'</td>
                    </tr>';
                $no++;
            }

            echo '</tbody></table></div>';
        }
    }
}
?>



<div class="klub-data">
<h2> Klub Yang Sudah Ditambahkan </h2>
        <div class="klub-wrapper">
<?php
    $ambilNamaKlub = mysqli_query($koneksi, "SELECT namaKlub FROM klasemen1 Order By id ASC");
    while ($row = mysqli_fetch_assoc($ambilNamaKlub)){

      
            
            echo '<div class="nama-klub">
                <h4>'.$row['namaKlub'].'</h4>
        
        </div>';

    }

?>
</div>
</div>



<div class="container-match">
    <h2>LIVE MATCH SCORE</h2>
    <div class="match-wrapper">
        <div class="input-wrapper">
            <form action="" method="POST">
                <table>
                    <thead>
                        <tr>
                            <td>Tim 1</td>
                            <td>Tim 2</td>
                            <td>Skor 1</td>
                            <td>Skor 2</td>
                        </tr>
                    </thead>
                    <tbody id="matchTableBody">
                        <tr>
                            <td><input type="text" name="team1[]" required></td>
                            <td><input type="text" name="team2[]" required></td>
                            <td><input type="number" name="ScoreTeam1[]" required></td>
                            <td><input type="number" name="ScoreTeam2[]" required></td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" name="saveData" class="saveData">Simpan Data</button>
            </form>
            <button type="submit" name="addMatch" onclick="addMatch()" class="addMatch"> Tambah Pertandingan </button>
        </div>
    </div>
</div>

















<div class="klasemen-wrapper">
    <h2>Klasemen Sementara Liga Saat ini</h2>
    <table>
        <thead>
            <tr>
                <td>No</td>
                <td>Klub</td>
                <td>Ma</td>
                <td>Me</td>
                <td>Se</td>
                <td>K</td>
                <td>GM</td>
                <td>GK</td>
                <td>Point</td>
            </tr>
        </thead>

        <?php
$queryKlub = "SELECT DISTINCT team1 FROM jadwalpertandingan";
$resultKlub = mysqli_query($koneksi, $queryKlub);


$no = 1;

while ($rowKlub = mysqli_fetch_assoc($resultKlub)) {
    $namaKlub = $rowKlub['team1'];


    $cekDataKlub = mysqli_query($koneksi, "SELECT * FROM klasemen1 Where namaKlub = '$namaKlub'");
    if(mysqli_num_rows($cekDataKlub) > 0){

    // Deklarasikan variabel untuk melacak jumlah gol dan jumlah kemasukan bola

    $jumlahGol = array();
    $jumlahKemasukan = array();
    $jumlahMain = 0;
    $jumlahSeri = 0;
    $jumlahMenang = 0;
    $jumlahKalah = 0;
    $jumlahPoint = 0;
    $status = '';

    $queryMatch = mysqli_query($koneksi, "SELECT * FROM jadwalpertandingan WHERE team1 = '$namaKlub' OR team2 = '$namaKlub'");
    while ($rowMatch = mysqli_fetch_assoc($queryMatch)) {
        $team1 = $rowMatch['team1'];
        $team2 = $rowMatch['team2'];
        $ScoreTeam1 = $rowMatch['ScoreTeam1'];
        $ScoreTeam2 = $rowMatch['ScoreTeam2'];

        // Perbarui jumlah gol dan jumlah kemasukan bola
        if (!isset($jumlahGol[$team1])) {
            $jumlahGol[$team1] = 0;
            $jumlahKemasukan[$team1] = 0;
        }
        $jumlahGol[$team1] += $ScoreTeam1;
        $jumlahKemasukan[$team1] += $ScoreTeam2;

        if (!isset($jumlahGol[$team2])) {
            $jumlahGol[$team2] = 0;
            $jumlahKemasukan[$team2] = 0;
        }
        $jumlahGol[$team2] += $ScoreTeam2;
        $jumlahKemasukan[$team2] += $ScoreTeam1;

        // Perhitungan jumlah pertandingan, kemenangan, kekalahan, dan seri
        $jumlahMain++;
        if ($ScoreTeam1 > $ScoreTeam2) {
            $jumlahMenang++;
        } elseif ($ScoreTeam1 < $ScoreTeam2) {
            $jumlahKalah++;
        } else {
            $jumlahSeri++;
        }
   
    
    }

    // Hitung total point
    $jumlahPoint = $jumlahMenang * 3 + $jumlahSeri;

    // Update atau insert data ke tabel klasemen1
        $queryUpdateKlasemen = mysqli_query($koneksi, "UPDATE klasemen1 SET Main = '$jumlahMain', Menang = '$jumlahMenang', Kalah =         '$jumlahKalah', Seri = '$jumlahSeri', GoalMenang = '$jumlahGol[$namaKlub]', GoalKalah = '$jumlahKemasukan[$namaKlub]', Point =         '$jumlahPoint' WHERE namaKlub = '$namaKlub'");
    if (!$queryUpdateKlasemen) {
        $queryInsertKlasemen = mysqli_query($koneksi, 
        "INSERT INTO klasemen1 (namaKlub, Main, Menang, Kalah, Seri, GoalMenang,GoalKalah, Point) 
        VALUES ('$namaKlub', '$jumlahMain', '$jumlahMenang', '$jumlahKalah', '$jumlahSeri', '$jumlahGol[$namaKlub]',    '$jumlahKemasukan[$namaKlub]', '$jumlahPoint')");
    }

    echo '<tbody>
        <tr>
            <td>' . $no . '</td>
            <td>' . $namaKlub . '</td>
            <td>' . $jumlahMain . '</td>
            <td>' . $jumlahMenang . '</td>
            <td>' . $jumlahSeri . '</td>
            <td>' . $jumlahKalah . '</td>
            <td>' . $jumlahGol[$namaKlub] . '</td>
            <td>' . $jumlahKemasukan[$namaKlub] . '</td>
            <td>' . $jumlahPoint . '</td>
        </tr>
    </tbody>';

    $no++;  
} else {
    echo "Klub $namaKlub tidak ada dalam database. Silakan tambahkan klub terlebih dahulu. <br>";
}
}
?>
</table>
</div>


<script src="edit.js"></script>
</body>
</html>