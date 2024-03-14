<?php
$prodi = [
    "Sistem Informasi" => "Sistem Informasi",
    "Teknik Informatika" => "Teknik Informatika",
    "Bisnis Digital" => "Bisnis Digital",
];

$skill = [
    "HTML" => 25,
    "CSS" => 15,
    "JavaScript" => 20,
    "RWD Bootstrap" => 20,
    "PHP" => 40,
    "Python" => 30,
    "Java" => 50,
];

$domisili = [
    "Jakarta" => "Jakarta",
    "Depok" => "Depok",
    "Bogor" => "Bogor",
    "Tangerang" => "Tangerang",
    "Bekasi" => "Bekasi",
    "Medan" => "Medan"
]
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php if (isset($_POST["nim"])) {
        $nim = $_POST['nim'];
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $prodi = $_POST['prodi'];
        $skills = $_POST['skill'];
        $domisili = $_POST['domisili'];
        $email = $_POST['email'];

        $point = 0;
        if (isset($_POST['skill'])) {
            foreach ($skills as $skillt) {
                if (isset($skill[$skillt])) {
                    $point += $skill[$skillt];
                }
            }
        }

        $kategori = "";
        if ($point == 0) {
            $kategori = "Tidak Memadai";
        } elseif ($point > 0 && $point <= 40) {
            $kategori = "Kurang";
        } elseif ($point > 40 && $point <= 60) {
            $kategori = "Cukup";
        } elseif ($point > 60 && $point <= 100) {
            $kategori = "Baik";
        } elseif ($point > 100 && $point <= 200) {
            $kategori = "Sangat Baik";
        }
    ?>
        <div class="judul">
            <h2 class="hasil text-center">Hasil Registrasi</h2>
            <hr>
            <h3 class="text-center" >Selamat Anda Sudah Berhasil Registrasi </h3>
        </div>
        <div class="container p-2">
            <table class="table table-bordered">
                <tr>
                    <td>NIM</td>
                    <td class="hasil"><?= $nim ?></td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td class="hasil"><?= $name ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td class="hasil"><?= $gender ?></td>
                </tr>
                <tr>
                    <td>Program Studi</td>
                    <td class="hasil"><?= $prodi ?></td>
                </tr>
                <tr>
                    <td>Skills Web & Programming</td>
                    <td class="hasil">
                        <?php
                        $point = 0;
                        if (isset($_POST['skill'])) {
                            foreach ($_POST['skill'] as $skills) {
                                foreach ($skill as $key => $value) {
                                    if ($skills == $key) {
                                        $point += $value;
                                        echo $skills . ",";
                                    }
                                }
                            }
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Point Skill</td>
                    <td class="hasil"><?= $point ?></td>
                </tr>
                <tr>
                    <td>Kategori Skill</td>
                    <td class="hasil"><?= $kategori ?></td>
                </tr>
                <tr>
                    <td>Domisili</td>
                    <td class="hasil"><?= $domisili ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td class="hasil"><?= $email ?></td>
                </tr>
            </table>
            <a href="form_registrasi.php"><button name="submit" type="submit" class="btn btn-dark back">Back</button></a>
        </div>

    <?php } else { ?>

        <div class="judul1">
            <h2 class="subjudul text-center">Form Registrasi</h2>
            <hr>
            <h3 class="text-center" >Silahkan Isi Form Di Bawah Ini</h3>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12 my-3">
                    <form method="post">
                        <div class="form-group row">
                            <label for="nim" class="col-4 col-form-label">NIM</label>
                            <div class="col-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-adn"></i>
                                        </div>
                                    </div>
                                    <input id="nim" name="nim" placeholder="Masukkan NIM" type="text" class="form-control" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-4 col-form-label">Nama Lengkap</label>
                            <div class="col-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-address-card"></i>
                                        </div>
                                    </div>
                                    <input id="name" name="name" placeholder="Masukkan Nama Lengkap" type="text" class="form-control" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4">Jenis Kelamin</label>
                            <div class="col-8">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input name="gender" id="gender_0" type="radio" required="required" class="custom-control-input" value="Laki-Laki">
                                    <label for="gender_0" class="custom-control-label">Laki-Laki</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input name="gender" id="gender_1" type="radio" required="required" class="custom-control-input" value="Perempuan">
                                    <label for="gender_1" class="custom-control-label">Perempuan</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="prodi" class="col-4 col-form-label">Program Studi</label>
                            <div class="col-8">
                                <select id="prodi" name="prodi" class="custom-select" required="required">
                                    <option value="" disabled selected hidden>~ Pilih Prodi ~</option>
                                    <?php foreach ($prodi as $prodikey => $prodivalue) { ?>
                                        <option value='<?= $prodikey ?>'><?= $prodivalue ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="skill" class="col-4">Skills Web & Programming</label>
                            <div class="col-8">
                                <?php foreach ($skill as $skillkey => $skillvalue) { ?>
                                    <input class="checkbox ml-2" type="checkbox" value="<?= $skillkey ?>" name="skill[]" id="<?= $skillkey ?>">
                                    <label class="label" for="<?= $skillkey ?>"><?= $skillkey ?></label>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="domisili" class="col-4 col-form-label">Tempat Domisili</label>
                            <div class="col-8">
                                <select id="domisili" name="domisili" class="custom-select" required="required">
                                    <option value="" disabled selected hidden>~ Pilih Domisili ~</option>
                                    <?php foreach ($domisili as $domisilikey => $domisilivalue) { ?>
                                        <option value='<?= $domisilikey ?>'><?= $domisilivalue ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-4 col-form-label">Email</label>
                            <div class="col-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-gg-circle"></i>
                                        </div>
                                    </div>
                                    <input id="email" name="email" placeholder="Masukkan email" type="text" class="form-control" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-4 col-8">
                                <button name="submit" type="submit" class="btn btn-success">Simpan</button>
                                <button name="reset" type="reset" class="btn btn-danger batal ml-2">Batal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

        <<?php } ?> </body>

</html>