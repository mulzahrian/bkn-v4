<!DOCTYPE html>
<head>
    <meta chartset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
    .line-title{
        border: 0;
        border-style: inset;
        border-top: 2px solid #000;
        }
    </style>
    
</head>
    <body>
<img src="assets/img/logo/logo-kanreg.png"style= " position: absolute; width: 40px; height: auto;">

<table style="width: 100%;">
    <tr>
        <td align="center">
            <span style="line-height: 1.6; font-weight: bold;"> 
                PEMERINTAH KOTA PEKANBARU
                <br>Badan Kepegawaian Negara

            </span>
        </td>
    </tr>
</table>
<hr class="line-title">


<table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIP</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Instansi</th>
                        <th scope="col">Layanan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $sm) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $sm['nip']; ?></td>
                            <td><?= $sm['nama']; ?></td>
                            <td><?= $sm['instansi']; ?></td>
                            <td><?= $sm['layanan']; ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
</body>

</html>