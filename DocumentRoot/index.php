<?php
    $dir = scandir("/app");
    $projects = [];
    $dir_exclude = ['.', '..'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/nes.css@latest/css/nes.min.css" rel="stylesheet" />
    <title>Dashboard</title>
    <style>
        .container {
            height: 100vh;
            display: flex;
            align-items: center;
            flex-direction: column;
            margin-top: 50px;
        }
        .projects {
            margin-top: 50px;
        }
        .projects td {
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenue sur Lamp_dev</h1>
        <h2>Projets</h2>
        <div class="projects">
            <table>
                <?php foreach($dir as $d): ?>
                    <?php if(is_dir($d) && !in_array($d, $dir_exclude)): ?>
                    <tr>
                        <td>
                            <?= "<a href='".$d."'>".$d."</a>"; ?>
                            <?php echo ($d == 'errors')? '<- dossier des pages d\'erreurs !' : '' ?>
                            
                        </td>
                    </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
                <tr>
                
                </tr>
            </table>
            
        </div>
        <iframe 
            width="560" 
            height="315" 
            src="https://www.youtube.com/embed/DDU-rZs-Ic4" 
            title="YouTube video player" 
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
            allowfullscreen>
        </iframe>
    </div>
    
    
</body>
</html>