<?php
    // jadwal.php
    include 'data/content.php';
    include 'includes/header.php';
?>

<section class="page-intro">
    <div class="container">
        <h2>Jadwal Pengangkutan Sampah Kampung Baru</h2>
        <p class="subtitle">Mohon letakkan sampah sesuai jenis dan jadwal di bawah ini. Waktu pengangkutan adalah estimasi.</p>
    </div>
</section>

<section class="schedule-table">
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Hari Pengangkutan</th>
                    <th>Jenis Sampah</th>
                    <th>Zona Pengambilan</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($jadwal_sampah as $item): ?>
                <tr style="border-left: 5px solid <?php echo $item['warna_box']; ?>;">
                    <td><strong><?php echo $item['hari']; ?></strong></td>
                    <td class="jenis-sampah">
                        <span class="label" style="background-color: <?php echo $item['warna_box']; ?>;">
                            <?php echo $item['jenis']; ?>
                        </span>
                    </td>
                    <td><?php echo $item['zona']; ?></td>
                    <td><?php echo $item['waktu']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

<section class="action-call text-center">
    <div class="container">
        <p>Penting: Sampah harus sudah diletakkan 1 jam sebelum waktu pengangkutan dimulai.</p>
    </div>
</section>

<?php
    include 'includes/footer.php';
?>