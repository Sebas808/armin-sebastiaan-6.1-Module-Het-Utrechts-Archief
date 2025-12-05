<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utrechtse Archief</title> 
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <?php include 'db.connection.php'; ?>

    <!-- POPUP -->
    <div id="info_popup" style="display:none; position:absolute; background:rgba(0,0,0,0.8); color:white; padding:10px; border-radius:5px; max-width:200px; z-index:100;"></div>

    <?php
    // foto's ophalen
    $photos_result = mysqli_query($conn, "SELECT * FROM photos");
    ?>

    <div class="foto_pana">
    <?php while ($photo = mysqli_fetch_assoc($photos_result)): ?>
        <div class="foto_wrap">
            <!-- FOTO -->
            <img src="<?= $photo['file_path']; ?>" class="foto_item" alt="Utrechtse Archief">

            <!-- HOTSPOTS OPHALEN -->
            <?php
            $photo_id = $photo['id'];
            $hotspots_result = mysqli_query($conn, "SELECT * FROM photo_hotspots WHERE photo_id = $photo_id");
            ?>

            <?php while ($spot = mysqli_fetch_assoc($hotspots_result)): ?>
                <div class="hotspot_point"  
                     style="left: <?= $spot['x_percent']; ?>%; top: <?= $spot['y_percent']; ?>%;"
                     title="<?= htmlspecialchars($spot['info_text']); ?>">
                    i
                </div>
            <?php endwhile; ?>

        </div>
    <?php endwhile; ?>
    </div>

    <script>
    const popup = document.getElementById('info_popup');

    // Voor alle hotspots
    document.querySelectorAll('.hotspot_point').forEach(point => {
        point.addEventListener('click', (e) => {
            // tekst uit title halen
            const info = point.getAttribute('title');

            // popup vullen
            popup.innerText = info;

            // popup positioneren op de muispositie
            popup.style.left = e.pageX + 'px';
            popup.style.top = e.pageY + 'px';
            popup.style.display = 'block';

            // voorkom dat document click direct sluit
            e.stopPropagation();
        });
    });

    // Sluit popup als je ergens anders klikt
    document.addEventListener('click', () => {
        popup.style.display = 'none';
    });
    </script>
</body>
</html>
